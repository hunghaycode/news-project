<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    use FileUploadTrait;
    public function index()
    {
       
        return view('admin.general-setting.update');
    }
    public function updateGeneralSetting(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'site_name'=>['required', 'max:255'],
                'site_logo'=>['nullable', 'image','max:3000'],
                'site_favicon'=>['nullable', 'image','max:1000'],
            ]
        ) ;
        // dd($request->all());
        $logoPath = $this->handleFileUpload($request, 'site_logo');
        $faviconPath = $this->handleFileUpload($request, 'site_favicon');

        GeneralSetting::updateOrCreate(
            ['key' => 'site_name'],
            ['value' => $request->site_name],
        );
        
        if (!empty($logoPath)) {
            GeneralSetting::updateOrCreate(
                ['key' => 'site_logo'],
                ['value' => $logoPath]
            );
        }
        if (!empty($faviconPath)) {
            GeneralSetting::updateOrCreate(
                ['key' => 'site_favicon'],
                ['value' => $faviconPath]
            );
        }
        toast(__('Cap nhap thanh cong'), 'success');

        return redirect()->back();
    }
}
