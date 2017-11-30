<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

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
    protected $keyword;
    public function index()
    {
        $books = Book::all()->sortByDesc('created_at')->take(4);
        return view('index', ['books' => $books]);
    }

    public function detail($id)
    {
        $book = Book::find($id);
        return view('detail', ['book' => $book]);
    }

    public function profile()
    {
        $user         = Auth::user();
        $expired_date = date_create($user->expired_date);
        $today        = date_create();
        $date_diff    = date_diff($expired_date, $today);

        return view('profile', ['user' => Auth::user(), 'date_diff' => $date_diff->format("%a")]);
    }

    public function categories($keyword)
    {
        switch ($keyword) {
            case 0:
                $books = Book::whereBetween('book_category', [0, 99])->paginate(10);
                $title = 'Generalities';
                break;
            case 1:
                $books = Book::whereBetween('book_category', [100, 199])->paginate(10);
                $title = 'Philosophy & Psychology';
                break;
            case 2;
                $books = Book::whereBetween('book_category', [200, 299])->paginate(10);
                $title = 'Religion';
                break;
            case 3:
                $books = Book::whereBetween('book_category', [300, 399])->paginate(10);
                $title = 'Social sciences';
                break;
            case 4:
                $books = Book::whereBetween('book_category', [400, 499])->paginate(10);
                $title = 'Language';
                break;
            case 5:
                $books = Book::whereBetween('book_category', [500, 599])->paginate(10);
                $title = 'Natural sciences & mathematics';
                break;
            case 6:
                $books = Book::whereBetween('book_category', [600, 699])->paginate(10);
                $title = 'Technology(Applied sciences)';
                break;
            case 7:
                $books = Book::whereBetween('book_category', [700, 799])->paginate(10);
                $title = 'The arts Fine and decorative arts';
                break;
            case 8:
                $books = Book::whereBetween('book_category', [800, 899])->paginate(10);
                $title = 'Literature & rhetoric';
                break;
            case 9:
                $books = Book::whereBetween('book_category', [900, 999])->paginate(10);
                $title = 'Geography & history';
                break;
            default:
                # code...
                break;
        }
        return view('categories', ['books' => $books, 'title' => $title]);
    }

    public function archives($keyword)
    {
        $this->keyword = $keyword;
        if ($keyword == 'Old-questions') {
            $this->keyword = 'Old questions';
        }
        $books = Book::whereHas('category', function ($query) {
            $query->where('type', '=', $this->keyword);
        })->get();
        return view('categories', ['books' => $books, 'title' => $this->keyword]);

    }
    public function reserveBook(Request $request, $id)
    {
        $this->validate($request, [
            'reserved_time' => 'required',
        ]);
        $book = Book::find($id);
        if (Auth::check()) {
            $user = Auth::user();
            $book->reservation()->create([
                'user_id' => $user->id,
                'reserved_time' => $request->reserved_time
            ]);
            $book->stock_count--;
            $book->save();
            Session::flash('msg','Book reserved successfully');
        }
        else{
            Session::flash('msg','Error occured');
        }
        return redirect()->back();
    }

}
