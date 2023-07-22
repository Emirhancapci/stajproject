<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }

    public function store(Request $request)
    {
        $request ->validate([
            'name' => 'required',
            'phone'=> 'required',
            'email'=> 'required',
            'note' => 'required',
        ]);

        $formData = $request->only(['id','name', 'phone', 'email', 'note']);
        Contact::create($formData);
        Alert::success('TEBRİKLER', 'Mesajınız alındı.');
        return back()->with('success');
    }
}

