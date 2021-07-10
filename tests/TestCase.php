<?php

namespace Tests;

use App\Models\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function loginAdmin()
    {
        $user = User::factory()->make();

        Config::push('laravue.admins', $user->email);

        $this->actingAs($user);
    }
}
