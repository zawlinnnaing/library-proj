<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
// Page routes
Route::get('/', 'PageController@index')->name('index');
Route::get('/#panel')->name('main_page');
Route::get('/detail/{id}','PageController@detail')->name('detail');
Route::get('/about',function (){
	return view('about');
})->name('about');
Route::get('/profile','PageController@profile')->name('profile')->middleware('auth');
Route::get('/categories/{keyword}','PageController@categories')->name('categories');
Route::get('/archives/{keyword}','PageController@archives')->name('archives');
Route::get('/archives/advanced_search/{keyword}','SearchController@advancedSearch')->name('archives.advanced_search');
Route::post('/reserve_book/{id}','PageController@reserveBook')->name('reserve_book');

Auth::routes();

Route::get('/home', 'PageController@index')->name('home');


// AdminRoutes
Route::group(['middleware' => ['auth','isAdmin']], function (){

Route::get('/admin/panel', 'AdminController@panel')->name('admin.panel');
Route::get('/admin/add_book', 'AdminController@add_book')->name('admin.add_book');
Route::post('/admin/insert_book', 'AdminController@insert_book')->name('admin.insert_book');
Route::get('/admin/add_a_member', function () {
    return view('admin.add_a_member');
})->name('admin.add_a_member');
Route::post('/admin/insert_member', 'AdminController@insert_member')->name('admin.insert_member');
Route::get('/admin/overdue_books', 'AdminController@overdue_books')->name('admin.overdue_books');
Route::get('/admin/delete_overdue/{book_id}/{user_id}', 'AdminController@delete_overdue')->name('admin.delete_overdue');
Route::get('/admin/manage_users', 'AdminController@manage_users')->name('admin.manage_users');
Route::get('/admin/delete_user/{id}', 'AdminController@delete_user')->name('admin.delete_user');
Route::get('/admin/edit_user/{id}', 'AdminController@edit_user')->name('admin.edit_user');
Route::post('/admin/update_user/{id}', 'AdminController@update_user')->name('admin.update_user');
Route::get('/admin/reservations', 'AdminController@reservations')->name('admin.reservations');
Route::get('/admin/delete_reservation/{id}', 'AdminController@deleteReservation')->name('admin.delete_reservation');
Route::get('/admin/book_list', 'AdminController@bookList')->name('admin.book_list');
Route::get('/admin/edit_book/{id}', 'AdminController@editBook')->name('admin.edit_book');
Route::get('/admin/delete_book/{id}', 'AdminController@deleteBook')->name('admin.delete_book');
Route::post('/admin/update_book/{id}', 'AdminController@updateBook')->name('admin.update_book');
Route::get('/admin/issue_book',function(){
	return view('admin.issue_book');
})->name('admin.issue_book');
Route::get('/admin/change_password_form', function () {
    return view('admin.change_password');
})->name('admin.change_password_form');
Route::post('/admin/change_password', 'AdminController@changePassword')->name('admin.change_password');
Route::post('/admin/lend_book','AdminController@lendBook')->name('admin.lend_book');
Route::get('/admin/print_book','AdminController@printBook')->name('admin.print_book');
   });

Route::get('/user_search', 'SearchController@userSearch')->name('user_search');
Route::get('/book_search', 'SearchController@bookSearch')->name('book_search');

