<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DisplaySetting;
use Illuminate\Http\Request;

class DisplaySettingController extends Controller
{
    public function index()
    {
       
        return view('admin.display-setting.index');
    }
    public function update(Request $request)
    {
        DisplaySetting::updateOrCreate(
            [],
            [
                'category_display_one' => $request->category_display_one,
                'category_display_two' => $request->category_display_two,
                'category_display_three' => $request->category_display_three
            ]
        );
        // dd($request->all());
        toast(__('Cap nhap thanh cong'), 'success')->width('300');

        return redirect()->back();
    }
}
