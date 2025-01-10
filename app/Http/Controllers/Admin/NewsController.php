<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Traits\FileUploadTrait;

class NewsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = News::all();
        return view('admin.news.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create', compact('categories'));
    }
    public function statusToggle(Request $request)
    {

        $news = News::find($request->id);
        $news->{$request->name} = $request->status;
        $news->save();

        return response(['status' => 'success', 'message' => __('admin.Updated successfully!')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'category' => ['required'],
            'image' => ['required', 'max:3000', 'image'],
            'title' => ['required', 'max:255', 'unique:news,title'],
            'content' => ['required'],
            'meta_title' => ['max:255'],
            'meta_description' => ['max:255'],
            'tags' => ['required'],
            'is_breaking_news' => ['boolean'],
            'show_at_slider' => ['boolean'],
            'show_at_popular' => ['boolean'],
            'status' => ['boolean'],
        ]);
        $imagePath =   $this->handleFileUpload($request, 'image');
        $news = new News();
        $news->category_id = $request->category;
        $news->author_id = Auth::guard('admin')->user()->id;
        $news->image = $imagePath;
        $news->title = $request->title;
        $news->slug = \Str::slug($request->title);
        $news->content = $request->content;
        $news->meta_title = $request->meta_title;
        $news->meta_description = $request->meta_description;
        $news->is_breaking_news = $request->is_breaking_news  == 1 ? 1 : 0;
        $news->show_at_slider = $request->show_at_slider == 1 ? 1 : 0;
        $news->show_at_popular = $request->show_at_popular == 1 ? 1 : 0;
        $news->status = $request->status == 1 ? 1 : 0;

        $news->save();
        $tags = explode(',', $request->tags);
        $tagIds = [];

        foreach ($tags as $tag) {
            $item = new Tag();
            $item->name = $tag;
            $item->save();

            $tagIds[] = $item->id;
        }

        $news->tags()->attach($tagIds);



        toast(__('Them moi thanh cong'), 'success')->width('300');
        return redirect()->route('admin.news.index');
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
        $news = News::find($id);
        $categories = Category::all();
        return view('admin.news.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $newsId = $this->route('news');
        $request->validate( [
            'category'=>['required'],
            'image'=>['nullable','max:3000','image'],
            'title'=>['required','max:255'],
            'content'=>['required'],
            'meta_title'=>['max:255'],
            'meta_description'=>['max:255'],
            'tags'=>['required'],
            'is_breaking_news'=>['boolean'],
            'show_at_slider'=>['boolean'],
            'show_at_popular'=>['boolean'],
            'status'=>['boolean'],
        ]);
        $news =  News::findOrFail($id);
        $imagePath = $this->handleFileUpload($request, 'image');

        $news->category_id = $request->category;
        $news->image = !empty($imagePath) ? $imagePath : $news->image;
        $news->title = $request->title;
        $news->slug = \Str::slug($request->title);
        $news->content = $request->content;
        $news->meta_title = $request->meta_title;
        $news->meta_description = $request->meta_description;
        $news->is_breaking_news = $request->is_breaking_news  == 1 ? 1 : 0;
        $news->show_at_slider = $request->show_at_slider == 1 ? 1 : 0;
        $news->show_at_popular = $request->show_at_popular == 1 ? 1 : 0;
        $news->status = $request->status == 1 ? 1 : 0;
        $news->save();
        $tags = explode(',', $request->tags);
        $tagIds = [];
        $news->tags()->delete();

        /** detach tags form pivot table */
        $news->tags()->detach($news->tags);
        foreach ($tags as $tag) {
            $item = new Tag();
            $item->name = $tag;

            $item->save();

            $tagIds[] = $item->id;
        }

        $news->tags()->attach($tagIds);

        toast(__('admin.Update Successfully!'), 'success')->width('330');

        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);
        $this->deleteFile($news->image);
        $news->tags()->delete();
        $news->delete();

       return response(['status'=>'success','message'=>'Delete Success']);

    }
}
