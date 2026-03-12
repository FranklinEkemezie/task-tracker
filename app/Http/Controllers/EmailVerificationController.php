<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    //

    public function index(Request $request)
    {

        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard'));
        }

        return view('auth.verify-email');
    }

    public function verify(EmailVerificationRequest $request)
    {

        $request->fulfill();

        return redirect()->intended(route('dashboard'));
    }

    public function send(Request $request)
    {
       if ($request->user()->hasVerifiedEmail()) {
           return redirect()->intended(route('dashboard'));
       }

       $request->user()->sendEmailVerificationNotification();

       return back()->with('message', 'Verification link sent!');
    }
}
