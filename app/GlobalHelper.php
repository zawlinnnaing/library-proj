<?php
/**
 * Created by PhpStorm.
 * User: zhiyu1205
 * Date: 12/17/17
 * Time: 8:09 PM
 */

namespace App;

use Auth;

class GlobalHelper
{

    public static function checkReservation($model,$returnDate){
        if(isset($model->reservation)) {
            foreach ($model->reservation as $reservation) {
                if ($reservation['user_id'] != Auth::id() && $reservation['reserved_time'] < $returnDate) {
                    return true;
                }
            }
        }
            return false;
    }

    public static function instantiate(){
        return new GlobalHelper();
}

    public function checkOutTime($id){
        $book = Book::where('id',$id)->first();
        $latestCheckoutTime = $book->users()->orderBy('pivot_return_date','desc')->first();
        if (!empty($latestCheckoutTime->pivot->return_date)){
            return $latestCheckoutTime->pivot->return_date;
        }
        return null;
    }

}