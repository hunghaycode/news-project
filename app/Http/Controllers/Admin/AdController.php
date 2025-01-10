<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class AdController extends Controller
{
        /**
     * Update the specified resource in storage.
     */
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ad = Ad::first();

        return view('admin.ad.create',compact('ad'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'ad_header' => ['image', 'nullable', 'max:3000'],
            'ad_header_status' => ['boolean'],
            'ad_sidebar' => ['image', 'nullable', 'max:3000'],
            'ad_sidebar_status' => ['boolean'],
            'ad_main' => ['image', 'nullable', 'max:3000'],
            'ad_main_status' => ['boolean'],
            'ad_herder_url' => ['url', 'nullable'],
            'ad_sidebar_url' => ['url', 'nullable'],
            'ad_main_url' => ['url', 'nullable'],
        ]);
        $ad_header = $this->handleFileUpload($request, 'ad_header');
        $ad_sidebar = $this->handleFileUpload($request, 'ad_sidebar');
        $ad_main = $this->handleFileUpload($request, 'ad_main');
        $ad = Ad::first();
        Ad::updateOrCreate(
            ['id' => $id],
            [
                'ad_header' => !empty($ad_header) ? $ad_header : $ad->ad_header,

                'ad_sidebar' => !empty($ad_sidebar) ? $ad_sidebar : $ad->ad_sidebar,

                'ad_main' => !empty($ad_main) ? $ad_main : $ad->ad_main,


                'ad_main_status' => $request->ad_main_status == 1 ? 1 : 0,
                'ad_header_status' => $request->ad_header_status == 1 ? 1 : 0,
                'ad_sidebar_status' => $request->ad_sidebar_status == 1 ? 1 : 0,

                'ad_herder_url' => $request->ad_herder_url,
                'ad_sidebar_url' => $request->ad_sidebar_url,
                'ad_main_url' => $request->ad_main_url,
            ]
        );
        toast(__('Update thanh cong'), 'success');
        return redirect()->route('admin.ad.index');
        return view('admin.ad.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
