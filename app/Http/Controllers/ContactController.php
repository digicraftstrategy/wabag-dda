<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;

class ContactController extends Controller
{
    public function index()
    {
        return view('public.contact');
    }

    public function send(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ];

        if (!app()->environment('local')) {
            $rules['g-recaptcha-response'] = 'required';
        }

        $request->validate($rules);

        Mail::to('info@wabagdda.gov.pg')
            ->send(new ContactMessage($request->all()));

        return back()->with('success', 'Your message has been sent successfully!');
    }

}

