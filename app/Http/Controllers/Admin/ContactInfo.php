<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactInfo extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        return view('admin.contact-info.index',compact('contact'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'address' => ['nullable', 'max:500'],
            'phone' => ['nullable', 'max:255'],
            'email' => ['nullable', 'max:255'],
        ]);
        Contact::updateOrCreate(
            [],
            [
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email
            ],
        );
        toast(__('Cap nhap thanh cong'), 'success')->width('300');

        return redirect()->back();
    }
}
