<footer>
    <div class="bg2 p-t-40 p-b-25">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 p-b-20">
                    <div class="size-h-3 flex-s-c ">
                        <a href="index.html">
                            <img class="max-s-full" src="{{ asset('frontend/assets/images/icons/Frame 1.png') }}"
                                width="100px" alt="LOGO">
                        </a>
                    </div>

                    <div>

                        <p class="f1-s-1 cl11 p-b-16">
                            {!! @$footerInfo->description !!}
                        </p>

                        <div class="p-t-15">

                            @foreach ($socials as $social)
                                <a href="{{ $social->url }}" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                    <span class="{{ $social->icon }}"></span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4 p-b-20">
                    <div class="size-h-3 flex-s-c">
                        <h5 class="f1-m-7 cl0">
                            Popular Posts
                        </h5>
                    </div>

                    <ul>
                        @php
                            $newPopular = \App\models\News::with(['category'])
                                ->where('show_at_popular', 1)
                                ->ActiveEntries()
                                ->orderBy('created_at', 'DESC')
                                ->take(5)
                                ->get();

                        @endphp
                        @foreach ($newPopular as $item)
                            <li class="flex-wr-sb-s p-b-20">
                                <a href="#" class="size-w-4 wrap-pic-w hov1 trans-03">
                                    <img src=" {{ asset($item->image) }}" alt="IMG">
                                </a>

                                <div class="size-w-5">
                                    <h6 class="p-b-5">
                                        <a href="{{ route('news-detail', $item->slug) }}"
                                            class="f1-s-5 cl11 hov-cl10 trans-03">
                                            {{ $item->title }}
                                        </a>
                                    </h6>

                                    <span class="f1-s-3 cl6">
                                        {{ date('d M Y', strtotime($item->title)) }}
                                    </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @php
                    $categories = \App\models\Category::where('status', 1)->orderBy('id', 'DESC')->take(6)->get();

                @endphp
                <div class="col-sm-6 col-lg-4 p-b-20">
                    <div class="size-h-3 flex-s-c">
                        <h5 class="f1-m-7 cl0">
                            Category
                        </h5>
                    </div>

                    <ul class="m-t--12">
                        @foreach ($categories as $category)
                            <li class="how-bor1 p-rl-5 p-tb-10">
                                <a href="{{ route('search-blog-list', ['category' => $category->slug]) }}"
                                    class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="bg11">
        <div class="container size-h-4 flex-c-c p-tb-15">
            <span class="f1-s-1 cl0 txt-center">
                Copyright © 2018

                <a href="#"
                    class="f1-s-1 cl10 hov-link1"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="fa fa-heart"
                        aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">MR.Hung</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </span>
        </div>
    </div>
</footer>

<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <span class="fas fa-angle-up"></span>
    </span>
</div>

<!-- Modal Video 01-->
<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document" data-dismiss="modal">
        <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

        <div class="wrap-video-mo-01">
            <div class="video-mo-01">
                <iframe src="https://www.youtube.com/embed/wJnBTPUQS5A?rel=0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
