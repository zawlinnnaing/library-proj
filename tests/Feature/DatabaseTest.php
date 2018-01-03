<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseTest extends TestCase
{
    public function testAdmin(){

        $this->assertDatabaseHas('users',['email' => 'admin@mtu.com']);
    }
}
