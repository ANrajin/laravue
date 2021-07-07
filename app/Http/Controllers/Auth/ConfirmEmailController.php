<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ConfirmEmailController extends Controller
{
    /**
     * 
     */
    public function index(Request $request)
    {
        $token = $request->token;

        $user = User::where('confirm_token', $token)->first();

        if ($user) {
            $user->confirm();
            session()->flash('Success', 'Your email has been confirmed.');
            return redirect('/');
        } else {
            session()->flash('Error', 'Oop! We cannot recognise the token.');
            return redirect('/');
        }
    }
}
