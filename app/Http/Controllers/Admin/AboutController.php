<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'content' => ['nullable', 'max:3000']
        ]);
        About::updateOrCreate(
            [],
            ['content' => $request->content]
        );
       toast(__('Cap nhap thanh cong'), 'success')->width('300');

        return redirect()->back();
    }
}
