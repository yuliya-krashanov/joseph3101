<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use App\ContactForm;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.contact.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);

        $contactForm = ContactForm::create($request->all());

        \Mail::send('emails.contact', ['contactForm' => $contactForm], function ($message) use ($contactForm) {
            $message->from($contactForm->email, 'Pizza');
            $message->to('yuliya-krashanov@yandex.ua', 'Yuliya')->subject('Pizza | New message from client');

        });

        session()->flash('flash_message', 'Contact form was send successfully. Thank you');

        return redirect('/');
    }

}
