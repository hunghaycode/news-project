@extends('frontend.layouts.master')
@section('title', @$news->title)

@section('content')
    <link href="{{ asset('auth/assets/css/styles.css') }}" rel="stylesheet">

    <!-- Breadcrumb -->
    <div class="container">
        <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="{{ route('home') }}" class="breadcrumb-item f1-s-3 cl9">
                    Home
                </a>

                <a href="blog-list-01.html" class="breadcrumb-item f1-s-3 cl9">
                    Blog
                </a>

                <span class="breadcrumb-item f1-s-3 cl9">
                    Nulla non interdum metus non laoreet nisi tellus eget aliquam lorem pellentesque
                </span>
            </div>

            <form action="{{ route('search-blog-list') }}" method="get">
                <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
                    <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="search" name="search" placeholder="Search">
                    <button type="submit" class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
                        <i class="zmdi zmdi-search"></i>
                    </button>

                </div>
            </form>
        </div>
    </div>

    <!-- Content -->
    <section class="bg0 p-b-140 p-t-10">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-30">
                    <div class="p-r-10 p-r-0-sr991">
                        <!-- Blog Detail -->
                        <div class="p-b-70">
                            <a href="#" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
                                {{ $news->category->name }}
                            </a>

                            <div class="f1-l-3 cl2 p-b-16 p-t-33 respon2">
                                {{ $news->title }}
                            </div>

                            <div class="flex-wr-s-s p-b-40">
                                <span class="f1-s-3 cl8 m-r-15">
                                    <a href="{{route('news-detail',$news->slug)}}" class="f1-s-4 cl8 hov-cl10 trans-03">
                                        {{ $news->author->name }}
                                    </a>

                                    <span class="m-rl-3">-</span>

                                    <span>
                                        {{ date('M d Y', strtotime($news->created_at)) }}
                                    </span>
                                </span>

                                <span class="f1-s-3 cl8 m-r-15">
                                    {{ $news->views }} Views
                                </span>

                                <a href="#" class="f1-s-3 cl8 hov-cl10 trans-03 m-r-15">
                                    0 Comment
                                </a>
                            </div>

                            <div class="wrap-pic-max-w p-b-30">
                                <img src="{{ asset($news->image) }}" alt="IMG">
                            </div>

                            <p class="f1-s-11 cl6 p-b-25">
                                {!! $news->content !!}
                            </p>


                            <!-- Tag -->
                            <div class="flex-s-s p-t-12 p-b-15">
                                @foreach ($news->tags as $tag)
                                    <span class="f1-s-12 cl5 m-r-8">
                                        {{ $tag->name }}
                                    </span>
                                @endforeach


                                <div class="flex-wr-s-s size-w-0">
                                    <a href="#" class="f1-s-12 cl8 hov-link1 m-r-15">
                                        Streetstyle
                                    </a>

                                    <a href="#" class="f1-s-12 cl8 hov-link1 m-r-15">
                                        Crafts
                                    </a>
                                </div>
                            </div>

                            <!-- Share -->
                            <div class="flex-s-s">
                                <span class="f1-s-12 cl5 p-t-1 m-r-15">
                                    Share:
                                </span>

                                <div class="flex-wr-s-s size-w-0">
                                    <a href="#"
                                        class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                        <i class="fab fa-facebook-f m-r-7"></i>
                                        Facebook
                                    </a>

                                    <a href="#"
                                        class="dis-block f1-s-13 cl0 bg-twitter borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                        <i class="fab fa-twitter m-r-7"></i>
                                        Twitter
                                    </a>

                                    <a href="#"
                                        class="dis-block f1-s-13 cl0 bg-google borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                        <i class="fab fa-google-plus-g m-r-7"></i>
                                        Google+
                                    </a>

                                    <a href="#"
                                        class="dis-block f1-s-13 cl0 bg-pinterest borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                        <i class="fab fa-pinterest-p m-r-7"></i>
                                        Pinterest
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Leave a comment -->

                        @auth


                            <!-- Comment  -->
                            <div id="comments" class="comments-area">
                                <h3 class="comments-title">{{ $news->comments()->count() }} Comments:</h3>

                                <ol class="comment-list">
                                    @foreach ($news->comments()->whereNull('parent_id')->get() as $comment)
                                        <li class="comment">
                                            <aside class="comment-body">
                                                <div class="comment-meta">
                                                    <div class="comment-author vcard">
                                                        <img src="images/news2.jpg" class="avatar" alt="image">
                                                        <b class="fn">{{ $comment->user->name }}</b>
                                                        <span class="says">says:</span>
                                                    </div>

                                                    <div class="comment-metadata">
                                                        <a href="#">
                                                            <span>{{ date('Y m D H:i', strtotime($comment->created_at)) }}</span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="comment-content">
                                                    <p>{{ $comment->comments }}
                                                    </p>
                                                </div>

                                                <div class="reply">
                                                    <a href="#" class="comment-reply-link" data-toggle="modal"
                                                        data-target="#exampleModal-{{ $comment->id }}">Reply</a>
                                                    <span>
                                                        <i class="fas fa-minus-circle delete-comment"
                                                            data-id='{{ $comment->id }}'></i>
                                                    </span>
                                                </div>
                                            </aside>

                                            @if ($comment->reply()->count() > 0)
                                                @foreach ($comment->reply as $reply)
                                                    <ol class="children">
                                                        <li class="comment">
                                                            <aside class="comment-body">
                                                                <div class="comment-meta">
                                                                    <div class="comment-author vcard">
                                                                        <img src="images/news3.jpg" class="avatar"
                                                                            alt="image">
                                                                        <b class="fn">{{ $reply->user->name }}</b>
                                                                        <span class="says">says:</span>
                                                                    </div>

                                                                    <div class="comment-metadata">
                                                                        <a href="#">
                                                                            <span>{{ date('Y m D H:i', strtotime($reply->created_at)) }}</span>
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="comment-content">
                                                                    <p>{{ $reply->comments }}
                                                                </div>

                                                                <div class="reply">
                                                                    <a href="#" class="comment-reply-link"
                                                                        data-toggle="modal"
                                                                        data-target="#exampleModal-{{ $comment->id }}">Reply</a>
                                                                    <span>
                                                                        <i class="fas fa-minus-circle delete-comment"
                                                                            data-id='{{ $reply->id }}'></i>

                                                                    </span>
                                                                </div>
                                                            </aside>
                                                        </li>
                                                    </ol>
                                                @endforeach
                                            @endif
                                        </li>
                                        <!-- Modal -->
                                        <div class="comment_modal">
                                            <div class="modal fade" id="exampleModal-{{ $comment->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Write Your Comment
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('news-comment-reply') }}" method="POST">
                                                                @csrf
                                                                <textarea cols="30" rows="7" placeholder="Type. . ." name="reply"></textarea>
                                                                <input type="hidden" name="news_id"
                                                                    value="{{ $news->id }}">
                                                                <input type="hidden" name="parent_id"
                                                                    value="{{ $comment->id }}">
                                                                <button type="submit">submit</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </ol>

                                <div class="comment-respond">
                                    <h3 class="comment-reply-title">Leave a Reply</h3>

                                    <form class="comment-form" action="{{ route('news-comment') }}" method="POST">
                                        @csrf
                                        <p class="comment-form-comment">
                                            <label for="comment">Comment</label>
                                            <input type="hidden" name="news_id" value="{{ $news->id }}">
                                            <input type="hidden" name="parent_id">
                                            <textarea name="comments" id="comment" cols="45" rows="5"></textarea>
                                            @error('comments')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        </p>


                                        <p class="form-submit mb-0">
                                            <input type="submit" name="submit" id="submit" class="submit"
                                                value="Post Comment">
                                        </p>
                                    </form>
                                </div>
                            </div>
                        @else
                            <section class="jumbotron py-3"
                                style="background-color: rgb(240, 229, 110);box-shadow: 0.1px 0.2px 1px;">
                                <div class="container py-2">
                                    <h1 class="lead text-dark" style="font-weight: 600">Please login to comment in the post !!
                                    </h1>
                                    <hr>
                                    <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Login Now
                                        !</a>
                                </div>
                            </section>
                        @endauth


                        <!-- end comment -->

                        <!-- end comment -->
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-md-10 col-lg-4 p-b-30">
                    <div class="p-l-10 p-rl-0-sr991 p-t-70">
                        <!-- Category -->
                        <div class="p-b-60">
                            <div class="how2 how2-cl4 flex-s-c">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    Category
                                </h3>
                            </div>
                            {{-- <form action="{{ route('search-blog-list') }}" method="GET"> --}}
                            <ul class="p-t-35">
                                @foreach ($categories as $category)
                                    <li class="how-bor3 p-rl-4">
                                        <a href="{{ route('search-blog-list', ['category' => $category->slug]) }}"
                                            class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13"
                                           >
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            {{-- </form> --}}


                        </div>

                        <!-- Archive -->
                        <div class="p-b-37">
                            <div class="how2 how2-cl4 flex-s-c">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    Archive
                                </h3>
                            </div>

                            <ul class="p-t-32">
                                @foreach ($archives as $archive)
                                    <li class="p-rl-4 p-b-19">
                                        <a href="{{ route('news.archive', ['year' => $archive->year, 'month' => $archive->month]) }}"
                                            class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
                                            <span>{{ $archive->month }} {{ $archive->year }}</span>
                                            <span>({{ $archive->count }})</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>

                        <!-- Popular Posts -->
                        <div class="p-b-30">
                            <div class="how2 how2-cl4 flex-s-c">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    Popular Post
                                </h3>
                            </div>

                            <ul class="p-t-35">
                                @foreach ($newPopular as $popular)
                                    <li class="flex-wr-sb-s p-b-30">
                                        <a href="#" class="size-w-10 wrap-pic-w hov1 trans-03">
                                            <img src="{{ asset($popular->image) }}" alt="IMG">
                                        </a>

                                        <div class="size-w-11">
                                            <h6 class="p-b-4">
                                                <a href="{{ route('news-detail', $popular->slug) }}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    {{ $popular->title }}
                                                </a>
                                            </h6>

                                            <span class="cl8 txt-center p-b-24">
                                                <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                    {{ $popular->category->name }}
                                                </a>

                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>

                                                <span class="f1-s-3">
                                                    {{ date('D m y', strtotime($popular->created_at)) }}
                                                </span>
                                            </span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Tag -->
                        <div>
                            <div class="how2 how2-cl4 flex-s-c m-b-30">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    Tags
                                </h3>
                            </div>

                            <div class="flex-wr-s-s m-rl--5">
                                @foreach ($tagsCount as $tag)
                                    <a href="{{ route('search-blog-list', ['tag' => $tag->name]) }}"
                                        class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                        {{ $tag->name }}
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('content')
    <script>
        $(document).ready(function(e) {
            $('.delete-comment').on('click', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: 'DELETE',
                            url: "{{ route('news-comment-destroy') }}",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                if (data.status === 'success') {
                                    Swal.fire(
                                        'Deleted!',
                                        data.message,
                                        'success'
                                    )
                                    window.location.reload();
                                } else if (data.status === 'error') {
                                    Swal.fire(
                                        'Error!',
                                        data.message,
                                        'error'
                                    )
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });


                    }
                })
            })
        })
    </script>
@endpush
