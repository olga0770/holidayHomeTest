<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostsControllerTest extends TestCase
{

    use RefreshDatabase;


    /** @test */
    public function cant_reach_posts_form_as_guest()
    {
        $response = $this->get('/p');

        $response->assertRedirect('/login');
    }


    /** @test */
    public function can_reach_posts_form_when_logged_in() {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/p');

        $response->assertOk();
    }

    /** @test */
    public function cant_get_the_create_form_as_guest() {
        $response = $this->get('/p/create');

        $response->assertRedirect('/login');
    }


    /** @test */
    public function can_get_the_create_form_when_logged_in() {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/p/create');

        $response->assertOk();
    }



}
