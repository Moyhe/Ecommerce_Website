<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contact-us.index');
    }


    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'message' => 'required'
        ]);

        Mail::to('mohyemahmoud123@gmail.com')->send(new ContactMail($validated['name'], $validated['email'], $validated['message']));

        return $request->all();
    }
}
