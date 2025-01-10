<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterInfo;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class FooterInfoController extends Controller
{
    use FileUploadTrait;
    public function index()  {
        $footerInfo = FooterInfo::first();
        return view('admin.footer-info.index',compact('footerInfo'));
    }
    public function update(Request $request)
    {
      
        $request->validate([
            'logo' => [ 'image', 'max:3000'],
            'description' => [ 'nullable'],
            'copyright' => [ 'max:255'],
        ]);

        $footerInfo= FooterInfo::first();
        $imagePath = $this->handleFileUpload($request,'logo',  !empty($footerInfo) ? $footerInfo->logo: '');
        FooterInfo::updateOrCreate(
            [],
            [
                'logo' =>  !empty($imagePath) ? $imagePath : $footerInfo->logo,
                'description' => $request->description,
                'copyright' => $request->copyright
            ],
        );
        toast(__('Cap nhap thanh cong'), 'success');

        return redirect()->back();
    }
}
