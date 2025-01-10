<!-- Post -->
<?php 
$categories = \App\Models\Category::where('status', 1)->orderBy('id', 'DESC')->get();
$displaySetting =  \App\Models\DisplaySetting::first();
$showAllCategoryOne = \App\Models\Category::where('id', $displaySetting->category_display_one)->get();
$showAllCategoryTwo = \App\Models\Category::where('id', $displaySetting->category_display_two)->get();
$showAllCategoryThree = \App\Models\Category::where('id', $displaySetting->category_display_three)->get();
?>
<section class="bg0 p-t-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="p-b-20">
                    <!-- Entertainment -->
                    <div class="tab01 p-b-20">
                        <div class="tab01-head how2 how2-cl1 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                            <!-- Brand tab -->
                            <h3 class="f1-m-2 cl12 tab01-title">
                                {{ @$showCategoryOne->first()->category->name }}
                            </h3>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tab1-1" role="tab">New</a>
                                </li>

                  

                                <li class="nav-item-more dropdown dis-none">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </a>

                                    <ul class="dropdown-menu">

                                    </ul>
                                </li>
                            </ul>

                            <!--  -->
                            @foreach ($showAllCategoryOne  as $category)
                            <a href="{{ route('search-blog-list', ['category' => $category->slug]) }}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                View all
                                <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                            </a>
                            @endforeach
                        </div>


                        <!-- Tab panes -->
                        <div class="tab-content p-t-35">
                            <!-- - -->
                            <div class="tab-pane fade show active" id="tab1-1" role="tabpanel">
                                <div class="row">
                                    @foreach (@$showCategoryOne as $categoryOne)
                                        @if ($loop->index < 1)
                                            <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                                <!-- Item post -->
                                                <div class="m-b-30">
                                                    
                                                    <a href="{{ route('news-detail', $categoryOne->slug) }}"
                                                        class="wrap-pic-w hov1 trans-03">
                                                        <img src="{{ asset($categoryOne->image) }}" alt="IMG">
                                                    </a>

                                                    <div class="p-t-20">
                                                        <h5 class="p-b-5">
                                                            <a href="{{ route('news-detail', $categoryOne->slug) }}"
                                                                class="f1-m-3 cl2 hov-cl10 trans-03">
                                                               {!!truncate($categoryOne->title, 85)!!}
                                                            </a>
                                                        </h5>

                                                        <span class="cl8">
                                                            <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                                {{ $categoryOne->category->name }}
                                                            </a>

                                                            <span class="f1-s-3 m-rl-3">
                                                                -
                                                            </span>

                                                            <span class="f1-s-3">
                                                                {{ date('D m Y', strtotime($categoryOne->created_at)) }}
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
           
                                            <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                                <!-- Item post -->
                                                @foreach (@$showCategoryOne as $categoryOne)
                                                @if ($loop->index > 0 && $loop->index <= 3)
                                                <div class="flex-wr-sb-s m-b-30">
                                                    <a href="{{route('news-detail',$categoryOne->slug)}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                        <img src="{{ asset($categoryOne->image) }}" alt="IMG">
                                                    </a>

                                                    <div class="size-w-2">
                                                        <h5 class="p-b-5">
                                                            <a href="{{{route('news-detail',$categoryOne->slug)}}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                               {!!truncate($categoryOne->title)!!}
                                                            </a>
                                                        </h5>

                                                        <span class="cl8">
                                                            <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                                {{ $categoryOne->category->name }}
                                                            </a>

                                                            <span class="f1-s-3 m-rl-3">
                                                                -
                                                            </span>

                                                            <span class="f1-s-3">
                                                                {{ date('D m Y', strtotime($categoryOne->created_at)) }}
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                            

                                </div>
                            </div>


                        </div>
                    </div>

                    <!-- Business -->
                    <div class="tab01 p-b-20">
                        <div class="tab01-head how2 how2-cl2 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                            <!-- Brand tab -->
                            <h3 class="f1-m-2 cl13 tab01-title">
                                {{ @$showCategoryTwo->first()->category->name }}
                            </h3>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tab2-1" role="tab">New</a>
                                </li>

                        

                                <li class="nav-item-more dropdown dis-none">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </a>

                                    <ul class="dropdown-menu">

                                    </ul>
                                </li>
                            </ul>

                            <!--  -->
                            @foreach ($showAllCategoryTwo  as $category)
                            <a href="{{ route('search-blog-list', ['category' => $category->slug]) }}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                View all
                                <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                            </a>
                            @endforeach
                        </div>


                        <!-- Tab panes -->
                        <div class="tab-content p-t-35">
                            <!-- - -->
                            <div class="tab-pane fade show active" id="tab2-1" role="tabpanel">
                                <div class="row">
                                    @foreach (@$showCategoryTwo as $categoryTwo)
                                        @if ($loop->index <1)      
                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        <!-- Item post -->
                                        <div class="m-b-30">
                                            <a href="{{route('news-detail',$categoryTwo->slug)}}" class="wrap-pic-w hov1 trans-03">
                                                <img src="{{ asset($categoryTwo->image) }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="p-t-20">
                                                <h5 class="p-b-5">
                                                    <a href="{{route('news-detail',$categoryTwo->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                        {!!truncate($categoryTwo->title)!!}
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                       {{$categoryTwo->category->name}}
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        {{ date('D m Y', strtotime($categoryOne->created_at)) }}
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach

                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        <!-- Item post -->
                                        @foreach (@$showCategoryTwo as $categoryTwo )
                                        @if ($loop->index >0 && $loop->index <=3)   
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a href="{{route('news-detail',$categoryTwo->slug)}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{ asset($categoryTwo->image) }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="{{route('news-detail',$categoryTwo->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        {!!truncate($categoryTwo->title)!!}
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        {{$categoryTwo->category->name}}
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        {{ date('D m Y', strtotime($categoryTwo->created_at)) }}
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach

  
                                    </div>
                                </div>
                            </div>

                            <!-- - -->
                            <div class="tab-pane fade" id="tab2-2" role="tabpanel">
                                <div class="row">
                                    @foreach (@$showCategoryThree as $categoryThree)
                                    @if ($loop->index <1)     
                          
                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        <!-- Item post -->
                                        <div class="m-b-30">
                                            <a href="{{route('news-detail',$categoryThree->slug)}}" class="wrap-pic-w hov1 trans-03">
                                                <img src="{{ asset($categoryThree->image) }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="p-t-20">
                                                <h5 class="p-b-5">
                                                    <a href="{{route('news-detail',$categoryThree->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                     {!!truncate($categoryThree->title)!!}
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                        {{$categoryThree->category->name}}
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        {{ date('D m Y', strtotime($categoryThree->created_at)) }}
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
          
                                </div>
                            </div>

 
                        </div>
                    </div>

                    <!-- Travel -->
                    <div class="tab01 p-b-20">
                        <div class="tab01-head how2 how2-cl3 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                            <!-- Brand tab -->
                            <h3 class="f1-m-2 cl14 tab01-title">
                               {{@$showCategoryThree->first()->category->name}}
                            </h3>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tab3-1"
                                        role="tab">New</a>
                                </li>

                                {{-- <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab3-2" role="tab">Hotels</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab3-3" role="tab">Flight</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab3-4" role="tab">Beachs</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab3-5" role="tab">Culture</a>
                                </li> --}}

                                <li class="nav-item-more dropdown dis-none">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </a>

                                    <ul class="dropdown-menu">

                                    </ul>
                                </li>
                            </ul>

                            <!--  -->
                            @foreach ($showAllCategoryThree  as $category)
                            <a href="{{ route('search-blog-list', ['category' => $category->slug]) }}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                View all
                                <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                            </a>
                            @endforeach
                        </div>


                        <!-- Tab panes -->
                        <div class="tab-content p-t-35">
                            <!-- - -->
                            <div class="tab-pane fade show active" id="tab3-1" role="tabpanel">
                                <div class="row">
                                    @foreach (@$showCategoryThree as $categoryThree)
                                    @if ($loop->index <1)     
                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        <!-- Item post -->
                                        <div class="m-b-30">
                                            <a href="{{route('news-detail',$categoryThree->slug)}}" class="wrap-pic-w hov1 trans-03">
                                                <img src="{{ asset($categoryThree->image) }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="p-t-20">
                                                <h5 class="p-b-5">
                                                    <a href="{{route('news-detail',$categoryOne->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                         {!!truncate($categoryThree->title)!!}
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                        {{$categoryThree->category->name}}
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        {{ date('D m Y', strtotime($categoryOne->created_at)) }}
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach

                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        <!-- Item post -->
                                        @foreach (@$showCategoryThree as $categoryThree)
                                        @if ($loop->index >0 &&$loop->index<=3 ) 
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a href="{{route('news-detail',$categoryThree->slug)}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{ asset($categoryThree->image) }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="{{route('news-detail',$categoryThree->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        {!!truncate($categoryThree->title)!!}
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        {{$categoryThree->category->name}}
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        {{ date('D m Y', strtotime($categoryThree->created_at)) }}

                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                        {{-- <!-- Item post -->
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a href="{{route('news-detail',$categoryOne->slug)}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{ asset('frontend/assets/images/post-16.jpg') }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="{{route('news-detail',$categoryOne->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        Donec metus orci, malesuada et lectus vitae
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        Flight
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 16
                                                    </span>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Item post -->
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a href="{{route('news-detail',$categoryOne->slug)}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{ asset('frontend/assets/images/post-17.jpg') }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="{{route('news-detail',$categoryOne->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        Donec metus orci, malesuada et lectus vitae
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        Culture
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 12
                                                    </span>
                                                </span>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>

                            {{-- <!-- - -->
                            <div class="tab-pane fade" id="tab3-2" role="tabpanel">
                                <div class="row">
                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        <!-- Item post -->
                                        <div class="m-b-30">
                                            <a href="{{route('news-detail',$categoryOne->slug)}}" class="wrap-pic-w hov1 trans-03">
                                                <img src="{{ asset('frontend/assets/images/post-15.jpg') }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="p-t-20">
                                                <h5 class="p-b-5">
                                                    <a href="{{route('news-detail',$categoryOne->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                        You wish lorem ipsum dolor sit amet consectetur
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                        Hotels
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 18
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        <!-- Item post -->
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a href="{{route('news-detail',$categoryOne->slug)}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{ asset('frontend/assets/images/post-16.jpg') }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="{{route('news-detail',$categoryOne->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        Donec metus orci, malesuada et lectus vitae
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        Beachs
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 17
                                                    </span>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Item post -->
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a href="{{route('news-detail',$categoryOne->slug)}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{ asset('frontend/assets/images/post-17.jpg') }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="{{route('news-detail',$categoryOne->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        Donec metus orci, malesuada et lectus vitae
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        Flight
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 16
                                                    </span>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Item post -->
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a href="{{route('news-detail',$categoryOne->slug)}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{ asset('frontend/assets/images/post-18.jpg') }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="{{route('news-detail',$categoryOne->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        Donec metus orci, malesuada et lectus vitae
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        Culture
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 12
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- - -->
                            <div class="tab-pane fade" id="tab3-3" role="tabpanel">
                                <div class="row">
                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        <!-- Item post -->
                                        <div class="m-b-30">
                                            <a href="{{route('news-detail',$categoryOne->slug)}}" class="wrap-pic-w hov1 trans-03">
                                                <img src="{{ asset('frontend/assets/images/post-16.jpg') }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="p-t-20">
                                                <h5 class="p-b-5">
                                                    <a href="{{route('news-detail',$categoryOne->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                        You wish lorem ipsum dolor sit amet consectetur
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                        Hotels
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 18
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        <!-- Item post -->
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a href="{{route('news-detail',$categoryOne->slug)}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{ asset('frontend/assets/images/post-17.jpg') }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="{{route('news-detail',$categoryOne->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        Donec metus orci, malesuada et lectus vitae
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        Beachs
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 17
                                                    </span>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Item post -->
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a href="{{route('news-detail',$categoryOne->slug)}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{ asset('frontend/assets/images/post-18.jpg') }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="{{route('news-detail',$categoryOne->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        Donec metus orci, malesuada et lectus vitae
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        Flight
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 16
                                                    </span>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Item post -->
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a href="{{route('news-detail',$categoryOne->slug)}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{ asset('frontend/assets/images/post-14.jpg') }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="{{route('news-detail',$categoryOne->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        Donec metus orci, malesuada et lectus vitae
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        Culture
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 12
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- - -->
                            <div class="tab-pane fade" id="tab3-4" role="tabpanel">
                                <div class="row">
                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        <!-- Item post -->
                                        <div class="m-b-30">
                                            <a href="{{route('news-detail',$categoryOne->slug)}}" class="wrap-pic-w hov1 trans-03">
                                                <img src="{{ asset('frontend/assets/images/post-17.jpg') }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="p-t-20">
                                                <h5 class="p-b-5">
                                                    <a href="{{route('news-detail',$categoryOne->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                        You wish lorem ipsum dolor sit amet consectetur
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                        Hotels
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 18
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        <!-- Item post -->
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a href="{{route('news-detail',$categoryOne->slug)}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{ asset('frontend/assets/images/post-18.jpg') }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="{{route('news-detail',$categoryOne->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        Donec metus orci, malesuada et lectus vitae
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        Beachs
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 17
                                                    </span>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Item post -->
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a href="{{route('news-detail',$categoryOne->slug)}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{ asset('frontend/assets/images/post-14.jpg') }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="{{route('news-detail',$categoryOne->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        Donec metus orci, malesuada et lectus vitae
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        Flight
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 16
                                                    </span>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Item post -->
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a href="{{route('news-detail',$categoryOne->slug)}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{ asset('frontend/assets/images/post-15.jpg') }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="{{route('news-detail',$categoryOne->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        Donec metus orci, malesuada et lectus vitae
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        Culture
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 12
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- - -->
                            <div class="tab-pane fade" id="tab3-5" role="tabpanel">
                                <div class="row">
                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        <!-- Item post -->
                                        <div class="m-b-30">
                                            <a href="{{route('news-detail',$categoryOne->slug)}}" class="wrap-pic-w hov1 trans-03">
                                                <img src="{{ asset('frontend/assets/images/post-18.jpg') }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="p-t-20">
                                                <h5 class="p-b-5">
                                                    <a href="{{route('news-detail',$categoryOne->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                        You wish lorem ipsum dolor sit amet consectetur
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                        Hotels
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 18
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        <!-- Item post -->
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a href="{{route('news-detail',$categoryOne->slug)}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{ asset('frontend/assets/images/post-17.jpg') }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="{{route('news-detail',$categoryOne->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        Donec metus orci, malesuada et lectus vitae
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        Beachs
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 17
                                                    </span>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Item post -->
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a href="{{route('news-detail',$categoryOne->slug)}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{ asset('frontend/assets/images/post-16.jpg') }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="{{route('news-detail',$categoryOne->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        Donec metus orci, malesuada et lectus vitae
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        Flight
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 16
                                                    </span>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Item post -->
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a href="{{route('news-detail',$categoryOne->slug)}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{ asset('frontend/assets/images/post-15.jpg') }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="{{route('news-detail',$categoryOne->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        Donec metus orci, malesuada et lectus vitae
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        Culture
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        Feb 12
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-10 col-lg-4">
                <div class="p-l-10 p-rl-0-sr991 p-b-20">
                    <!--  -->
                    <div>
                        <div class="how2 how2-cl4 flex-s-c">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Most Popular
                            </h3>
                        </div>

                        <ul class="p-t-35">
                            @foreach ($newPopular as $item)
                                <li class="flex-wr-sb-s p-b-22">
                                    <div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                                        {{ ++$loop->index }}
                                    </div>

                                    <a href="{{route('news-detail',$item->slug)}}" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                                        {!!truncate($item->title)!!}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!--  -->
                    <div class="flex-c-s p-t-8">
                        <a href="{{@$ad->ad_sidebar_url}}">
                            <img class="max-w-full" src="{{ asset(@$ad->ad_sidebar) }}"
                                alt="IMG">
                        </a>
                    </div>

                    <!--  -->
                    <div class="p-t-50">
                        <div class="how2 how2-cl4 flex-s-c">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Stay Connected
                            </h3>
                        </div>

                        <ul class="p-t-35">
                        @foreach ($socials as $social)
                        <li class="flex-wr-sb-c p-b-20">
                            <a href="{{$social->url}}"
                                class="size-a-8 flex-c-c borad-3 size-a-8 fs-16 cl0 hov-cl0" style="background-color: {{$social->color}}">
                                <span class="{{$social->icon}}"></span>
                            </a>

                            <div class="size-w-3 flex-wr-sb-c">
                                <span class="f1-s-8 cl3 p-r-20">
                                    {{$social->count_fan}}  {{$social->type_fan}}
                                </span>

                                <a href="{{$social->url}}" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                    {{$social->button}}
                                </a>
                            </div>
                        </li>
                        @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Banner -->
<div class="container">
    <div class="flex-c-c">
        <a href="{{@$ad->ad_main_url}}">
            <img class="max-w-full" src="{{ asset(@$ad->ad_main) }}" alt="IMG">
        </a>
    </div>
</div>

<!-- Latest -->
<section class="bg0 p-t-60 p-b-35">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 p-b-20">
                <div class="how2 how2-cl4 flex-s-c m-r-10 m-r-0-sr991">
                    <h3 class="f1-m-2 cl3 tab01-title">
                        Latest Articles
                    </h3>
                </div>

                <div class="row p-t-35">
                    @foreach ($LatestArticles as $item)
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item latest -->
                            <div class="m-b-45">
                                <a href="{{route('news-detail',$item->slug)}}" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset($item->image) }}" alt="IMG">
                                </a>

                                <div class="p-t-16">
                                    <h5 class="p-b-5">
                                        <a href="{{route('news-detail',$item->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            {!!truncate($item->title)!!}
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            by {{ $item->author->name }}
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

            <div class="col-md-10 col-lg-4">
                <div class="p-l-10 p-rl-0-sr991 p-b-20">
                    <!-- Video -->
                    <div class="p-b-55">
                        <div class="how2 how2-cl4 flex-s-c m-b-35">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Featured Video
                            </h3>
                        </div>

                        <div>
                            <div class="wrap-pic-w pos-relative">
                                <img src="{{ asset('frontend/assets/images/video-01.jpg') }}" alt="IMG">

                                <button class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03" data-toggle="modal"
                                    data-target="#modal-video-01">
                                    <span class="fab fa-youtube"></span>
                                </button>
                            </div>

                            <div class="p-tb-16 p-rl-25 bg3">
                                <h5 class="p-b-5">
                                    <a href="#" class="f1-m-3 cl0 hov-cl10 trans-03">
                                        Music lorem ipsum dolor sit amet consectetur
                                    </a>
                                </h5>

                                <span class="cl15">
                                    <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                        by John Alvarado
                                    </a>

                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>

                                    <span class="f1-s-3">
                                        Feb 18
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Subscribe -->
                    <div class="bg10 p-rl-35 p-t-28 p-b-35 m-b-55">
                        <h5 class="f1-m-5 cl0 p-b-10">
                            Subscribe
                        </h5>

                        <p class="f1-s-1 cl0 p-b-25">
                            Get all latest content delivered to your email a few times a month.
                        </p>

                        <form class="size-a-9 pos-relative">
                            <input class="s-full f1-m-6 cl6 plh9 p-l-20 p-r-55" type="text" name="email"
                                placeholder="Email">

                            <button class="size-a-10 flex-c-c ab-t-r fs-16 cl9 hov-cl10 trans-03">
                                <i class="fa fa-arrow-right"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Tag -->
                    <div class="p-b-55">
                        <div class="how2 how2-cl4 flex-s-c m-b-30">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Tags
                            </h3>
                        </div>

                        <div class="flex-wr-s-s m-rl--5">
                            @foreach ($tagsCount as $tag)                       
                            <a href="{{ route('search-blog-list', ['tag' => $tag->name]) }}"
                                class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                               {{$tag->name}} ( {{$tag->count}})
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
