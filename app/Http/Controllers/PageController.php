<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;

class PageController extends Controller
{
    //

//    protected $keyword;
//    protected $itemPerPage;
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
        $user = Auth::user();
        $expired_date = date_create($user->expired_date);
        $today = date_create();
        $date_diff = date_diff($expired_date, $today);

        return view('profile', ['user' => Auth::user(), 'date_diff' => $date_diff->format("%a")]);
    }

    public function categories($keyword)
    {
        $itemPerPage = 10;
        switch ($keyword) {
            case 0:
                $books = Book::whereBetween('book_category', [0, 99])->paginate($itemPerPage);
                $title = 'Generalities';
                break;
            case 1:
                $books = Book::whereBetween('book_category', [100, 199])->paginate($itemPerPage);
                $title = 'Philosophy & Psychology';
                break;
            case 2;
                $books = Book::whereBetween('book_category', [200, 299])->paginate($itemPerPage);
                $title = 'Religion';
                break;
            case 3:
                $books = Book::whereBetween('book_category', [300, 399])->paginate($itemPerPage);
                $title = 'Social sciences';
                break;
            case 4:
                $books = Book::whereBetween('book_category', [400, 499])->paginate($itemPerPage);
                $title = 'Language';
                break;
            case 5:
                $books = Book::whereBetween('book_category', [500, 599])->paginate($itemPerPage);
                $title = 'Natural sciences & mathematics';
                break;
            case 6:
                $books = Book::whereBetween('book_category', [600, 699])->paginate($itemPerPage);
                $title = 'Technology(Applied sciences)';
                break;
            case 7:
                $books = Book::whereBetween('book_category', [700, 799])->paginate($itemPerPage);
                $title = 'The arts Fine and decorative arts';
                break;
            case 8:
                $books = Book::whereBetween('book_category', [800, 899])->paginate($itemPerPage);
                $title = 'Literature & rhetoric';
                break;
            case 9:
                $books = Book::whereBetween('book_category', [900, 999])->paginate($itemPerPage);
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
        if ($keyword == 'Old-questions') {
            $keyword = 'Old question';
        }
        $books = Book::whereHas('category', function ($query) use ($keyword) {
            $query->where('type', '=', $keyword);
        })->paginate(10);
        return view('categories', ['books' => $books, 'title' => $keyword]);

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
                'user_id'       => $user->id,
                'reserved_time' => $request->reserved_time
            ]);
            $book->stock_count--;
            $book->save();
            Session::flash('msg', 'Book reserved successfully');
        } else {
            Session::flash('msg', 'Error occured');
        }
        return redirect()->back();
    }

    public function changePassword(Request $request)
    {
        Validator::make($request->all(), [
            'old_password' => 'required|old_password:' . Auth::user()->password,
            'password'     => 'required|string|min:6|confirmed',
        ], ['old_password' => 'old password has to match'])->validate();
        $new_password = bcrypt($request->password);
        $request->user()->update(['password' => $new_password]);
        Session::flash('success_message', 'Password changed successfully');
        return redirect()->back();
    }

}
