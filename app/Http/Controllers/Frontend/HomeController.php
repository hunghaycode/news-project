<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\About;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\DisplaySetting;
use App\Models\MailReceived;
use App\Models\News;
use App\Models\Social;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $isBreakingNews = News::where('is_breaking_news', 1)->ActiveEntries()->orderBy('id', 'DESC')->take(10)->get();
        $heroSlider = News::with(['category', 'author'])->where('show_at_slider', 1)->ActiveEntries()->orderBy('id', 'DESC')->take(7)->get();
        $newPopular = News::with(['category'])->where('show_at_popular', 1)->ActiveEntries()->orderBy('created_at', 'DESC')->take(5)->get();
        $LatestArticles = News::with(['category'])->where('show_at_popular', 1)->ActiveEntries()->orderBy('id', 'DESC')->take(6)->get();
        $displaySetting = DisplaySetting::first();
        $showCategoryOne = News::where('category_id', $displaySetting->category_display_one)->ActiveEntries()->orderBy('updated_at', 'DESC')->take(4)->get();
        $showCategoryTwo = News::where('category_id', $displaySetting->category_display_two)->ActiveEntries()->orderBy('updated_at', 'DESC')->take(4)->get();
        $showCategoryThree = News::where('category_id', $displaySetting->category_display_three)->ActiveEntries()->orderBy('updated_at', 'DESC')->take(4)->get();
        $tagsCount = $this->tagCount();
        $socials = Social::where('status', 1)->take(7)->get();
        $ad = Ad::first();
       
     

        return view('frontend.home', compact(
            'isBreakingNews',
            'heroSlider',
            'newPopular',
            'LatestArticles',
            'showCategoryOne',
            'showCategoryTwo',
            'showCategoryThree',
            'tagsCount',
            'ad',
            'socials',
         
        ));
    }

    public function newDetail(string $slug)
    {
        $ad = Ad::first();

        $news = News::with(['author', 'tags', 'comments'])->where('slug', $slug)->ActiveEntries()->orderBy('id', 'DESC')->take(10)->first();
        $this->viewCount($news);
        $categories = Category::where('status', 1)->orderBy('id', 'DESC')->take(6)->get();

        $newPopular = News::with(['category'])->where('show_at_popular', 1)->ActiveEntries()->orderBy('created_at', 'DESC')->take(5)->get();
        $archives = News::select(
            \DB::raw('YEAR(created_at) as year, MONTHNAME(created_at) as month, COUNT(*) as count')
        )
            ->groupBy(\DB::raw('YEAR(created_at),  MONTHNAME(created_at)'))
            ->orderByRaw('YEAR(created_at) desc, MONTHNAME(created_at)')
            ->get();
        $tagsCount = $this->tagCount();

        return view('frontend.news-details', compact('news', 'categories', 'archives', 'newPopular', 'tagsCount','ad'));
    }

    public function tagCount()
    {
        return Tag::select('name', \DB::raw('COUNT(*) as count'))->groupBy('name')->orderByDesc('count')->take(13)->get();
    }
    public function viewCount($news)
    {
       if ($news) {
        if (session()->has('list_post')) {
            $postId = session('list_post');
            if (!in_array($news->id, $postId)) {
                $postId[] = $news->id;
                $news->increment('views');
            }
            session(['list_post' => $postId]);
        } else {
            session(['list_post' => [$news->id]]);
            $news->increment('views');
        }
       }
    }
  
    public function archiveDetail($year, $month)
    {
        $ad = Ad::first();

        // Lấy danh sách các tin tức theo năm và tháng
        $newsList = News::whereYear('created_at', $year)
            ->whereMonth('created_at', date('m', strtotime($month)))
            ->get();
            $newPopular = News::with(['category'])->where('show_at_popular', 1)->ActiveEntries()->orderBy('created_at', 'DESC')->take(5)->get();
            $tagsCount = $this->tagCount();
        // Trả về view để hiển thị danh sách các tin tức
        return view('frontend.news-archive', compact('newsList', 'year', 'month','newPopular','tagsCount','ad'));
    }
    public function searchList(Request $request)
    {
        $news = News::query();
        $ad = Ad::first();

        $news->when($request->has('tag'), function ($query) use ($request) {
            $query->whereHas('tags', function ($query) use ($request) {
                $query->where('name', $request->tag);
            });
        });
        $news->when($request->has('category') && !empty($request->category), function ($query) use ($request) {
            $query->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->category);
            });
        });

        $news->when($request->has('search'), function ($query) use ($request) {
            $query->where(function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('content', 'like', '%' . $request->search . '%');
            })->orWhereHas('category', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            });
        });


        $news = $news->with(['category', 'author', 'tags'])->ActiveEntries()->paginate(4);

    
        $newPopular = News::with(['category'])->where('show_at_popular', 1)->ActiveEntries()->orderBy('created_at', 'DESC')->take(5)->get();
        $tagsCount = $this->tagCount();

        return view('frontend.search-blog-list', compact('news','newPopular','tagsCount','ad'));
    }
    public function comment(Request $request)
    {
        $request->validate([
            'comments' => ['required', 'string', 'max:1000']
        ]);
        $comment = new Comment();
        $comment->news_id = $request->news_id;
        $comment->parent_id = $request->parent_id;
        $comment->user_id = Auth::user()->id;
        $comment->comments = $request->comments;
        $comment->save();
        toast(__('Them moi thanh cong'), 'success')->width('300');
        return redirect()->back();
    }
    public function commentReply(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'reply' => ['required', 'string', 'max:1000']
        ]);
        $comment = new Comment();
        $comment->news_id = $request->news_id;
        $comment->parent_id = $request->parent_id;
        $comment->user_id = Auth::user()->id;
        $comment->comments = $request->reply;
        $comment->save();
        toast(__('Them moi thanh cong'), 'success')->width('300');
        return redirect()->back();
    }
    public function commentDestroy(Request $request)
    {

        $comment = Comment::findOrFail($request->id);
        if (Auth::user()->id === $comment->user_id) {
            $comment->delete();
            return response(['status' => 'success', 'message' => 'Delete Successfully !']);
        }
        return response(['status' => 'error', 'message' => 'Something went wrong ! !']);
    }
    public function newsAbout(Request $request)
    {
        
        $about = About::first();
        return view('frontend.news-about', compact('about'));
    }


    public function contact()
    {  
        $newPopular = News::with(['category'])->where('show_at_popular', 1)->ActiveEntries()->orderBy('created_at', 'DESC')->take(5)->get();

        $contact = Contact::first();
        return view('frontend.contact', compact('contact','newPopular'));
    }
    public function handleContactForm(Request $request)
    {
      
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'max:255'],
            'message' => ['required', 'max:500']
        ]);

        try {
            $toMail = Contact::first();

            /** Send Mail */
            Mail::to($toMail->email)->send(new ContactMail($request->subject, $request->message, $request->email));

            /** store the mail */

            $mail = new MailReceived();
            $mail->email = $request->email;
            $mail->subject = $request->subject;
            $mail->message = $request->message;
            $mail->save();
        } catch (\Exception $e) {
            toast(__($e->getMessage()));
        }

        toast(__('frontend.Message sent successfully!'), 'success');

        return redirect()->back();
    }
}
