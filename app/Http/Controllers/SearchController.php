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
        if ($users->count() > 0) {
            foreach ($users as $value) {
                $results [] = array('id' => $value->id, 'value' => $value->name);

            }
        } else {
            $results [] = array('id' => 0, 'value' => 'No results found');
        }
        return json_encode($results);
    }

    public function bookSearch()
    {
        $books = Book::where('title', 'LIKE', '%' . Input::get('term') . '%')->take(5)->get();
        if ($books->count() > 0) {
            foreach ($books as $book) {
                $results [] = array('id' => $book->id, 'value' => $book->title);
            }
        } else {
            $results [] = array('id' => 0, 'value' => 'No results found');
        }
        return response()->json($results);
    }

    public function advancedSearch(Request $request, $keyword)
    {
        $itemPerPage = 10;
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
            })->paginate($itemPerPage);
        } elseif (!isset($this->major) && isset($this->year)) {
            $books = Book::whereHas('category', function ($query) {
                $query->where([
                    ['type', '=', $this->keyword],
                    ['year', '=', (string)$this->year]
                ]);
            })->paginate($itemPerPage);

        } else {
            $books = Book::whereHas('category', function ($query) {
                $query->where([
                    ['type', '=', $this->keyword],
                    ['major', '=', $this->major],
                    ['year', '=', (string)$this->year]
                ]);
            })->paginate($itemPerPage);
        }
        return view('categories', ['books' => $books, 'title' => $keyword]);

    }
}
