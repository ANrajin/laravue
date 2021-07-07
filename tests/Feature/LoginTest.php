<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 
     */
    public function test_correct_response_after_user_login()
    {
        $user = User::factory()->make();

        $this->postJson('/login', [
            'email' => $user->email,
            'password' => 'password'
        ])
            ->assertStatus(200)
            ->assertJson([
                'status' => 'success'
            ]);
    }


    /**
     * 
     */
    public function test_a_user_get_validation_msg_passing_wrong_cred()
    {
        $user = User::factory()->make();

        $this->postJson('/login', [
            'email' => $user->email,
            'password' => 'wrong'
        ])
            ->assertStatus(422)
            ->assertJson([
                'message' => 'Invalid email or password given!'
            ]);
    }
}
