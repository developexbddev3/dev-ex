<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $this->data['settings'] = SiteSetting::first();
        return view('frontend.pages.contact', $this->data);
    }
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'email|nullable',
            'message' => 'required'
        ]);
        Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message
        ]);

        // Send thanks mail

        //notification
        $notification = array(
            'message' =>'Message sent Successfully',
            'alert-type' =>'success'
        );
        return back()->with('success', 'Message sent Successfully');
        
    }
}
