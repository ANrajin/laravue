<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmEmail;

class RegisterController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        return view('auth.register');
    }


    /**
     * Register new user
     * 
     */
    public function register(RegisterRequest $request)
    {
        try {
            $user = $request->store();

            if ($user) {
                Auth::login($user);

                event(new Registered($user));

                Mail::to($user->email)->send(new ConfirmEmail($user));

                return response()->json(['status' => 'success'], 200);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Server error occured!'], 503);
        }
    }
}
