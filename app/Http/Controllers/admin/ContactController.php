<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function getContactData()
    {
        $contacts = contact::paginate(5);
        return view('contacts.index', compact('contacts'));
    }

    public function delete($id)
    {
        $contact = contact::find($id);
        $contact->delete();
        return redirect()->route('contacts')->with('success', 'contact deleted successfully!');
    }
}
