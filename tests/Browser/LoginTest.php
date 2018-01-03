<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{

    public function testLogin(){
        $this->browse(function ($browser){
           $browser->loginAs(User::find(1))
           ->visit('/profile');
        });
    }
}
