<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Show the public contact page.
     */
    public function index()
    {
        return view('public.contact');
    }

    /**
     * Store and send a contact message from the public form.
     */
    public function send(Request $request)
    {
        $rules = [
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ];

        if (!app()->environment('local')) {
            $rules['g-recaptcha-response'] = ['required'];
        }

        $validated = $request->validate($rules);

        try {
            // Save message to database
            $contactMessage = Message::create([
                'name'    => $validated['name'],
                'email'   => $validated['email'],
                'subject' => $validated['subject'],
                'message' => $validated['message'],
            ]);

            // Send email notification
            Mail::to('info@wabagdda.gov.pg')->send(
                new ContactMessage($validated)
            );

            return back()->with('success', 'Your message has been sent successfully!');
        } catch (\Throwable $e) {
            Log::error('Contact form submission failed.', [
                'error' => $e->getMessage(),
                'email' => $request->email,
            ]);

            return back()
                ->withInput()
                ->with('error', 'Sorry, your message could not be sent at this time. Please try again.');
        }
    }

    /**
     * Display all stored contact messages (admin side).
     */
    public function messages()
    {
        $messages = Message::latest()->paginate(10);

        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Display a single stored message (admin side).
     */
    public function show($id)
    {
        $message = Message::findOrFail($id);

        return view('admin.messages.show', compact('message'));
    }

    /**
     * Delete a stored message (admin side).
     */
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()
            ->route('admin.messages.index')
            ->with('success', 'Message deleted successfully.');
    }
}