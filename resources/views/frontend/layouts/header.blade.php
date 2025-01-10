<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <div class="topbars">
            <div class="content-topbar container h-100">
                <div class="left-topbar">
         

                    <a href="{{ route('news-about') }}" class="left-topbar-item">
                        About
                    </a>

                    <a href="{{ route('contact') }}" class="left-topbar-item">
                        Contact
                    </a>
                    @if (!auth()->check())
                        <a href="{{ route('register') }}" class="left-topbar-item">
                            Sing up
                        </a>

                        <a href="{{ route('login') }}" class="left-topbar-item">
                            Log in
                        </a>
                    @endif
                </div>
                
                <div class="right-topbar">
                    <a href="{{ route('dashboard') }}" class="left-topbar-item">
                        <small style="font-size: 12px;">
                            @if (auth()->guard('web')->check())
                                Hello: {{ auth()->guard('web')->user()->name }}
                            @else
                                Hello: Guest
                            @endif

                        </small> </a>
                    @foreach ($socials as $social)
                        <a href="{{ $social->url }}">
                            <span class="{{ $social->icon }}"></span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="{{ route('home') }}"><img src="{{ asset('frontend/assets/images/icons/Frame 1.png') }}"
                        width="160px" alt="IMG-LOGO"></a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="topbar-mobile">
           
                <li class="left-topbar">
                    <a href="{{ route('news-about') }}" class="left-topbar-item">
                        About
                    </a>

                    <a href="{{ route('contact') }}" class="left-topbar-item">
                        Contact
                    </a>
                    @if (!auth()->check())
                        <a href="{{ route('register') }}" class="left-topbar-item">
                            Sing up
                        </a>

                        <a href="{{ route('login') }}" class="left-topbar-item">
                            Log in
                        </a>
                    @endif

                </li>

                <li class="right-topbar">
                    @foreach ($socials as $social)
                        <a href="{{ $social->url }}">
                            <span class="{{ $social->icon }}"></span>
                        </a>
                    @endforeach

                </li>
            </ul>

            <ul class="main-menu-m ">
                <li>
                    <a href="{{ route('home') }}">Home</a>


                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>

                <li>
                    <a href="category-01.html">News</a>
                </li>

                <li>
                    <a href="category-02.html">Entertainment </a>
                </li>

                <li>
                    <a href="category-01.html">Business</a>
                </li>

                <li>
                    <a href="category-02.html">Travel</a>
                </li>

                <li>
                    <a href="category-01.html">Life Style</a>
                </li>

                <li>
                    <a href="category-02.html">Video</a>
                </li>

                <li>
                    <a href="#">Features</a>
                    <ul class="sub-menu-m">
                        <li><a href="category-01.html">Category Page v1</a></li>
                        {{-- <li><a href="category-02.html">Category Page v2</a></li>
                        <li><a href="blog-grid.html">Blog Grid Sidebar</a></li>
                        <li><a href="blog-list-01.html">Blog List Sidebar v1</a></li>
                        <li><a href="blog-list-02.html">Blog List Sidebar v2</a></li>
                        <li><a href="{{route('news-detail',$item->slug)}}">Blog Detail Sidebar</a></li>
                        <li><a href="blog-detail-02.html">Blog Detail No Sidebar</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="contact.html">Contact Us</a></li> --}}
                    </ul>

                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>
            </ul>
        </div>

        <!--  -->
        <div class="wrap-logo container">
            <!-- Logo desktop -->
            <div class="logo">
                <a href="{{ route('home') }}"><img src="{{ asset('frontend/assets/images/icons/Frame 1.png') }}"
                        width="160px" alt="LOGO"></a>
            </div>
            <?php
            $ad = \App\Models\Ad::first();
            $categoryShowNav = \App\Models\Category::where(['status' => 1, 'show_nav' => 1])->get();
            $categories = \App\Models\Category::where(['status' => 1, 'show_nav' => 0])->get();
            $news = \App\Models\News::where(['status' => 1, 'show_at_popular' => 1])
                ->orderBy('id', 'DESC')
                ->take(2)
                ->get();
            ?>

            <!-- Banner -->
            <div class="banner-header">
                <a href="{{ @$ad->ad_herder_url }}"><img src="{{ asset(@$ad->ad_header) }}" alt="IMG"></a>
            </div>
        </div>

        <!--  -->
        <div class="wrap-main-nav">
            <div class="main-nav">
                <!-- Menu desktop -->
                <nav class="menu-desktop">
                    <a class="logo-stick" href="index.html">
                        <img src="{{ asset('frontend/assets/images/icons/Frame 1.png') }}" width="160px"
                            alt="LOGO">
                    </a>

                    <ul class="main-menu">
                        <li class="main-menu-active">
                            <a href="{{ route('home') }}">Home</a>

                        </li>
                        @foreach ($categoryShowNav as $category)
                            <li class="mega-menu-item">
                                <a href="{{ route('search-blog-list', ['category' => $category->slug]) }}"
                                    {{ $category->id }}>{{ $category->name }}</a>

                                <div class="sub-mega-menu">
                                    <div class="nav flex-column nav-pills" role="tablist">
                                        <a class="nav-link active" data-toggle="pill" href="#news-{{ $category->id }}"
                                            role="tab">Mới</a>

                                    </div>

                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="news-{{ $category->id }}"
                                            role="tabpanel">
                                            <div class="row">
                                                @foreach ($category->newsItems()->take(4)->get() as $item)
                                                    <div class="col-3">
                                                        <!-- Item post -->
                                                        <div>
                                                            <a href="{{ route('news-detail', $item->slug) }}"
                                                                class="wrap-pic-w hov1 trans-03">
                                                                <img src="{{asset( $item->image) }}" alt="IMG">
                                                            </a>

                                                            <div class="p-t-10">
                                                                <h5 class="p-b-5">
                                                                    <a href="{{ route('news-detail', $item->slug) }}"
                                                                        class="f1-s-5 cl3 hov-cl10 trans-03">
                                                               {!!truncate($item->title, 65)!!}
                                                                    </a>
                                                                </h5>

                                                                <span class="cl8">
                                                                    <a href="#"
                                                                        class="f1-s-6 cl8 hov-cl10 trans-03">
                                                                        {{ $item->category->name }}
                                                                    </a>

                                                                    <span class="f1-s-3 m-rl-3">
                                                                        -
                                                                    </span>

                                                                    <span class="f1-s-3">
                                                                        {{ date('D m Y', strtotime($item->created_at)) }}
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </li>
                        @endforeach

                        <li>
                            <a href="#">More</a>

                            <ul class="sub-menu">
                                @foreach ($categories as $category)
                                    <li><a
                                            href="{{ route('search-blog-list', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach

                            </ul>

                        </li>


                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
