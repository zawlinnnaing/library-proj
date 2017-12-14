<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable =['title','author','stock_count','img_dir','availability','description','barcode_no','book_category'];

   	protected $table = 'books';

   	public function users(){
   		return $this->belongsToMany('App\User','books_users','book_id','user_id')
            ->withPivot('issue_date','return_date');
   	}

   	public function category(){
   		return $this->hasOne('App\Category','book_id');
   	}

   	public function reservation(){
   	    return $this->hasOne('App\Reservation');
    }

}
