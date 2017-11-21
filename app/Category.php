<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';
    public $timestamps = false;

    protected $fillable = ['book_id','type','major','year'];

    public function book(){
    	return $this->belongsTo('App\Book');
    }
}
