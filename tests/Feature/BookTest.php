<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    public function testBook()
    {
        $reponse = $this->json('GET', '/detail/1');

        $reponse->assertStatus(200);
    }

    public function testUser()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)
            ->get('/profile');
        $response->assertStatus(200);
    }

    public function testAdvancedSearchReference()
    {
        $reponse = $this->json('get', '/archives/advanced_search', ['major' => 'Civil', 'year' => 2013]);

        $reponse->assertStatus(200);
    }

    public function testBookSearch (){
        $response = $this->json('get','/book_search',['term'=>'et']);
        $response->assertStatus(200);
    }


}
