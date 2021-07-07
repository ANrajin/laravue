<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmEmail;
use App\Models\User;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase;


    /**
     * Test
     * User can register
     */
    public function test_a_user_can_successfully_register()
    {
        $this->post('/register', [
            'name' => 'Rajin',
            'email' => 'rajin@gmail.com',
            'password' => 'password'
        ])->assertRedirect();
    }


    /**
     * Test
     * Email verification
     */
    public function test_an_email_is_sent_to_new_user_for_email_verification()
    {
        $this->withExceptionHandling();
        $this->withOutMiddleware();

        Mail::fake();

        $this->post('/register', [
            'name' => 'Rajin',
            'email' => 'rajin@gmail.com',
            'password' => 'password'
        ])->assertRedirect();

        // Assert that no mailables were sent...
        Mail::assertNothingSent();

        Mail::assertSent(ConfirmEmail::class);
    }


    /**
     * Email Verification test
     */
    public function test_a_user_has_a_token_after_registration()
    {
        Mail::fake();

        $this->withExceptionHandling();
        $this->withOutMiddleware();

        $this->post('/register', [
            'name' => 'Rajin',
            'email' => 'rajin@gmail.com',
            'password' => 'password'
        ])->assertRedirect();

        $user = User::find(1);

        $this->assertNotNull($user->confirm_token);
        // $this->assertFalse($user->isConfirmed());
    }
}
