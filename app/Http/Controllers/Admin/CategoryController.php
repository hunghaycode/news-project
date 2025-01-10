<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
        'name'=>['required','string','max:100'],
        'status'=>['required','boolean'],
        'show_nav'=>['required','boolean'],
      ]);

      $category = new Category();
      $category->name = $request->name;
      $category->slug = \Str::slug($request->name);
      $category->show_nav = $request->show_nav;
      $category->status = $request->status;

      // Save the category
      $category->save();

      // Optionally, you can redirect back with a success message
      return redirect()->route('admin.category.index')->with('success', 'Category created successfully.');
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
        $category= Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>['required','string','max:100'],
            'status'=>['required','boolean'],
            'show_nav'=>['required','boolean'],
          ]);
    
          $category= Category::find($id);

          $category->name = $request->name;
          $category->slug = \Str::slug($request->name);
          $category->show_nav = $request->show_nav;
          $category->status = $request->status;
    
          // Save the category
          $category->save();
    
          // Optionally, you can redirect back with a success message
          return redirect()->route('admin.category.index')->with('success', 'Category update successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Category::findOrFail($id);
          
            $category->delete();
            return response(['status' => 'success', 'message' => __('admin.Deleted Successfully!')]);
        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('admin.something went wrong!')]);
        }

    }
}
