<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socials = Social::all();
        return view('admin.social.index',compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.social.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'icon'=>['required'],
            'count_fan'=>['required','max:255'],
            'type_fan'=>['required','max:255'],
            'button'=>['required','max:255'],
            'color'=>['required','max:255'],
         
        ]);
        $social = new Social();
        $social->icon = $request->icon;
        $social->count_fan = $request->count_fan;
        $social->type_fan = $request->type_fan;
        $social->button = $request->button;
        $social->color = $request->color;
        $social->url = $request->url;
        $social->status = $request->status;
        $social->save();
        toast(__('Them moi thanh cong'), 'success');
        return redirect()->route('admin.social.index');
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
        $social = Social::findOrFail($id);
        return view('admin.social.edit',compact('social'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon'=>['nullable'],
            'count_fan'=>['required','max:255'],
            'type_fan'=>['required','max:255'],
            'button'=>['required','max:255'],
            'color'=>['required','max:255'],
         
        ]);
        $social = Social::findOrFail($id);
        $social->icon = $request->icon;
        $social->count_fan = $request->count_fan;
        $social->type_fan = $request->type_fan;
        $social->button = $request->button;
        $social->color = $request->color;
        $social->url = $request->url;
        $social->status = $request->status;
        $social->save();
        toast(__('Cap nhap thanh cong'), 'success');
        return redirect()->route('admin.social.index');
    }
    public function statusToggle(Request $request)
    {

        $social = Social::find($request->id);
        $social->{$request->name} = $request->status;
        $social->save();

        return response(['status' => 'success', 'message' => __('admin.Updated successfully!')]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $social = Social::findOrFail($id);
        $social->delete();
        return response(['status' => 'success', 'message' => 'Xoa thanh cong']);
    }
}
