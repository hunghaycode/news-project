<!-- Headline -->
<div class="container">
    {{-- <span class="text-uppercase cl2 p-r-8 ">
        <h4>Trending Now:</h4>
    </span> --}}
    <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">

        <div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">

            <span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown"
                data-out="fadeOutDown">
                @foreach ($isBreakingNews as $isBreakingNew)
                        <a  style="color: darkslategrey" href="{{route('news-detail',$isBreakingNew->slug)}}" class="dis-inline-block slide100-txt-item animated visible-false">
                            <img src="{{ asset($isBreakingNew->image) }}"
                                style="width: 100px; height: 70px; object-fit: cover; margin-right: 20px; float: left;"
                                alt="Interest Rate Angst">

                            <span style="display: block; overflow: hidden;">
                                <span class="badge badge-success">{{ $isBreakingNew->author->name }}</span>
                                <p> {!!truncate($isBreakingNew->title)!!} <br>
                                    {{-- <small class="f1-s-11 cl6 p-b-25">
                                        {!!$isBreakingNew->content!!}
                                        </small> --}}
                                </p>
                            </span> 
                        </a>
                    </a>
                @endforeach
            </span>
        </div>
        <form action="{{route('search-blog-list')}}" method="get">
        <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
            <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="search" name="search" placeholder="Search">
            <button type="submit" class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
                <i class="zmdi zmdi-search"></i>
            </button>
       
        </div>
    </form>
    </div>
</div>
