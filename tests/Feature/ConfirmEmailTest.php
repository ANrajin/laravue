<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ConfirmEmailTest extends TestCase
{
    use RefreshDatabase;


    public function test_a_user_can_confirm_email()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->make();

        $this->get("/register/confirm/?token={$user->confirm_token}")
            ->assertRedirect('/')
            ->assertSessionHas('Success', 'Your email has been confirmed.');

        $this->assertTrue($user->fresh()->isConfirmed());
    }


    public function test_a_user_is_redirected_if_token_is_wrong()
    {
        $user = User::factory()->make();

        $this->get("/register/confirm/?token=WrongToken")
            ->assertRedirect('/')
            ->assertSessionHas('Error', 'Oop! We cannot recognise the token.');
    }
}
