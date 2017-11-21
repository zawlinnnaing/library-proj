<?php

namespace App\Http\Controllers;

//use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\User;
use App\Book;
use App\Category;


use App\Reservation;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
//    protected $users,$books,$categories,$reservations;

    public function __construct()
    {
//    	$this->users = User::all();
//    	$this->books = Book::all();
//    	$this->reservations = Reservation::all();
        }
    public function panel()
    {
        $users = User::all();
        $books = Book::all();
        $fifteenBooks = $books->take(10);
        $reservations = Reservation::all();
        $reservations = $reservations->where('reserved_time', '>=', date('Y-m-d'));
        return view('admin.panel', ['users' => $users, 'books' => $fifteenBooks, 'reservations' => $reservations, 'books_count' => $books->count()]);
    }

    public function insert_book(Request $request)
    {
        $this->validate($request, ['title' => 'required', 'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);
        $data = $request->except('image');
        $book = Book::create($data);


        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();

            request()->image->move(public_path('uploads'), $imageName);
            Book::updateOrCreate(['title' => $request->title], ['img_dir' => $imageName]);
        }

        if ($request->has('type')) {

            $book->category()->create(Input::get('type'));

        }

        Session::flash('success_message', 'Book added Successfully');
        return redirect()->route('admin.panel');
    }

    public function add_book()
    {
        return view('admin.add_book');
    }

    public function insert_member(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'stud_id' => 'required|string|max:255|unique:users',
            'roll_no' => 'required|string|max:150',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $password = bcrypt($request->password);
        $data = $request->except('image');
        //creating user and updating password
        $user = User::create($data);
        $user->update(['password' => $password]);


        if ($request->hasFile('image')) {
            //moving image to profiles directory
//            $imageName = $request->file('image')->getClientOriginalName();
//            request()->image->move(public_path('profiles'), $imageName);
//
//            $user->update(['img_dir' => $imageName]);
            $this->uploadImage($request, $user, 'profiles');

        }
        Session::flash('success_message', 'User added successfully');
        return redirect()->route('admin.panel');

    }

    public function overdue_books()
    {
        $books = Book::all();

//        $books = Book::find(1);
        return view('admin.overdue_books', ['books' => $books]);

    }

    public function delete_overdue($book_id, $user_id)
    {
        $book = Book::find($book_id);
        $book->users()->detach($user_id);
        if (url()->previous() == route('admin.overdue_books')) {
            return redirect()->action('AdminController@overdue_books');
        } else {
            return redirect()->action('AdminController@edit_user', ['id' => $user_id]);
        }
    }

    public function manage_users()
    {
        $users = User::paginate(15);
        return view('admin.manage_users', ['users' => $users]);

    }

    public function delete_user($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('success_message', 'User deleted successfully');
//        return redirect()->action('AdminController@manage_users');
        return redirect()->route('admin.manage_users');
    }

    public function edit_user($id)
    {
        $user = User::find($id);
        return view('admin.edit_user', ['user' => $user]);
    }

    public function update_user($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'roll_no' => 'required|string|max:150',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $request->except('image');
        $user = User::find($id);
        $user->update($data);

        if ($request->hasFile('image')) {
            $this->uploadImage($request, $user, 'profiles');
        }

        Session::flash('success_message', 'User updated successfully');
        return redirect()->route('admin.manage_users');
    }

    public function uploadImage(Request $request, $model, $path)
    {
        //moving image to profiles directory
        $imageName = $request->file('image')->getClientOriginalName();
        request()->image->move(public_path($path), $imageName);

        $model->update(['img_dir' => $imageName]);
    }

    public function reservations()
    {
        $reservations = Reservation::with(['book', 'user'])->get();
        return view('admin.reservations', ['reservations' => $reservations]);
    }

    public function deleteReservation($id)
    {
        Reservation::find($id)->delete();
        Session::flash('success_message', 'Reservations deleted successfully');
        return redirect()->route('admin.reservations');
    }

    public function bookList()
    {
        $books = Book::paginate(20);
        return view('admin.book_list', ['books' => $books]);
    }

    public function editBook($id)
    {
        $book = Book::find($id);
        return view('admin.edit_book', ['book' => $book]);
    }

    public function deleteBook($id)
    {
        Book::find($id)->delete();
        Session::flash('success_message', 'Book deleted successfully');
        return redirect()->route('admin.book_list');
    }

    public function updateBook(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string|max:1000',
            'author' => 'required|string|max:500',
            'description' => 'string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);
        $data = $request->except('image');
        $book = Book::find($id);
        $book->update($data);
        if ($request->hasFile('image')) {
            $this->uploadImage($request, $book, 'uploads');
        }
        Session::flash('success_message', 'Book updated successfully');
        return redirect()->route('admin.book_list');

    }

    public function changePassword(Request $request)
    {
        Validator::make($request->all(), [
            'old_password' => 'required|old_password:' . Auth::user()->password,
            'password' => 'required|string|min:6|confirmed',
        ], ['old_password' => 'old password has to match'])->validate();
        $new_password = bcrypt($request->password);
        $request->user()->update(['password' => $new_password]);
        return redirect()->route('admin.panel');
    }



}
