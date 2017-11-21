<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    //

    public function userSearch(){
        $users = User::where('name', 'LIKE', '%'.Input::get('term').'%')->take(5)->get();
        foreach($users as $value){
            $results [] = array('id' => $value->id,'value' => $value->name);

        }
        return json_encode($results);
    }

    public function bookSearch(){
        $books = Book::where('title','LIKE','%'.Input::get('term').'%')->take(5)->get();
        foreach ($books as $book){
            $results [] =array('id' => $book->id,'value' => $book->title);
        }
        return json_encode($results);
    }
}
