<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function index()
    {
        return view('auth.verify-email');
    }

    public function verificate(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('/');
    }

    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}
