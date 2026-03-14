<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        return view('contact', compact('settings'));
    }

    public function store(Request $request)
    {
        $settings = Setting::first();

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        ContactMessage::create($data);

        return back()->with('success', 'Your message has been sent successfully.');
    }
}