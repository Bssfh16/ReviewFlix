<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index() {
        return view('pages.contact');
    }

    public function store(Request $request) {
        $validatedData = $request->validate ([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'subject' => 'nullable|string',
            'message' => 'required',
        ]);

        Contact::create($validatedData);

        Mail::to('admin@ehb.be')->send(new \App\Mail\ContactMail($request->all()));

        return redirect('/contact')->with('success', 'Message sent succesfully!');
    }
    
    // Admin: View all messages
    public function adminIndex()
    {
        $contacts = Contact::latest()->paginate(15);
        return view('admin.contacts.index', compact('contacts'));
    }

    // Admin: Delete message
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect(route('contacts.admin-index'))->with('success', 'Message deleted!');
    }
}
