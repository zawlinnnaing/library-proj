<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Reference;

class SearchController extends Controller
{
    //
    protected $keyword;
    protected $major;
    protected $year;

    public function userSearch()
    {
        $users = User::where('name', 'LIKE', '%' . Input::get('term') . '%')->take(5)->get();
        foreach ($users as $value) {
            $results [] = array('id' => $value->id, 'value' => $value->name);

        }
        return json_encode($results);
    }

    public function bookSearch()
    {
        $books = Book::where('title', 'LIKE', '%' . Input::get('term') . '%')->take(5)->get();
        foreach ($books as $book) {
            $results [] = array('id' => $book->id, 'value' => $book->title);
        }
        return json_encode($results);
    }

    public function advancedSearch(Request $request, $keyword)
    {
        $this->validate($request, [
            'year' => 'digits:4|nullable'
        ]);
        $this->keyword = $keyword;
        $this->year = $request->input('year');
        $this->major = $request->input('major');

        $this->keyword = $keyword;
        if (!isset($this->year) && isset($this->major)) {
            $books = Book::whereHas('category', function ($query) {
                $query->where([
                    ['type', '=', $this->keyword],
                    ['major', '=', $this->major]
                ]);
            })->get();
        } elseif (!isset($this->major) && isset($this->year)) {
            $books = Book::whereHas('category', function ($query) {
                $query->where([
                    ['type', '=', $this->keyword],
                    ['year', '=', (string)$this->year]
                ]);
            })->get();

        } else {
            $books = Book::whereHas('category', function ($query) {
                $query->where([
                    ['type', '=', $this->keyword],
                    ['major', '=', $this->major],
                    ['year', '=',(string)$this->year]
                ]);
            })->get();
        }
            return view('categories', ['books' => $books, 'title' => $keyword]);

    }
}
