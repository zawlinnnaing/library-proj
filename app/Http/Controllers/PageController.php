<?php

namespace App\Http\Controllers;

use App\PageRepositries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;

class PageController extends Controller
{
    //

//    public function checkExpiredDate(){
//        if (Auth::check() &&  Auth::user()->expired_date >= date('y-m-d')){
//            $noticount = Auth::user()->noti_count;
//            $noticount ++;
//            Auth::user()->update(['noti_count' => $noticount]);
//            return true;
//        }
//        return false;
//    }

    public function index(){
        $books = Book::all()->sortByDesc('created_at')->take(4);
        return view('index',['books' => $books]);
    }

    public function detail($id){
        $book = Book::find($id);
        return view('detail',['book'=>$book]);
    }
    public function profile(){
    	$user = Auth::user();
    	$expired_date = date_create($user->expired_date);
    	$today = date_create();
    	$date_diff = date_diff($expired_date,$today);

    	return view('profile',['user' => Auth::user(),'date_diff' => $date_diff->format("%a")]);
    }

   }
