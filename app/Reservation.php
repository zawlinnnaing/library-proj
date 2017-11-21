<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $fillable = ['user_id','book_id','reserved_time'];
    protected $table = 'reservations';

    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function book(){
        return $this->belongsTo('App\Book');
    }

}
