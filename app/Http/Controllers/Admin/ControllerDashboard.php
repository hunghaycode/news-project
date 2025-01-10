<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MailReceived;
use App\Models\News;
use App\Models\Social;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ControllerDashboard extends Controller
{
    public function index() : View
    {
        $publishedNews = News::where(['status' => 1])->count();
        $mailReceived = MailReceived::where([ 'replied' => 0])->count();
        $Categories = Category::count();
        $socials = Social::count();
        return view('admin.dashboard.index', compact('publishedNews', 'mailReceived', 'Categories', 'socials'));
    }
   
}
