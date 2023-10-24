<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "full_name" => "required|string|min:5|max:255",
            "email" => "required|string|email",
            "phone_number" => "required|numeric|digits_between:5,15",
        ]);

        Contact::create($validated);

        // return redirect('/contact-u')->with('success', 'Terima Kasih ! Kamu akan mengontak Anda segera');
        return redirect()->route('contact-us.index')->with('success', 'Terima Kasih ! Kamu akan mengontak Anda segera');
    }
}
