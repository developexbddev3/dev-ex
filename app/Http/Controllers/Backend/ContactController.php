<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function all() {
        $this->data['contacts'] = Contact::orderBy('created_at', 'DESC')->paginate(30);
        $this->data['contact_active'] = 'active';
        return view('backend.contact.all_contact', $this->data);
    }
    public function mark_read(Contact $contact) {
        $contact->update([
            'is_read' => true,
        ]);
        return response()->json([
            'success' => 'Contact marked as read'
        ]);
    }
    public function search(Request $request) {
        $contacts = Contact::where('email', 'like', '%'.$request->email.'%')
                            ->orWhere('name', 'like', '%'.$request->email.'%')
                            ->orWhere('phone', 'like', '%'.$request->email.'%')
                            ->orderBy('created_at', 'DESC')
                            ->limit(30)->get();
        return view('backend.contact.filter_list', compact('contacts'));
        // return Contact::where('email', $request->email)->limit(30);
    }
    public function delete(Contact $contact) {
        $contact->delete();
        return response()->json([
            'success' => 'Contact deleted successfully!'
        ]);
    }
}
