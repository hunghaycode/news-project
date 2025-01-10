@extends('admin.layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                <!-- News Card -->
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-4 border-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">News</p>
                                    <h4 class="my-1 text-info">  {{ $publishedNews }}</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto">
                                    <i class='bx bxs-news'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Messages Card -->
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-4 border-danger">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Messages</p>
                                    <h4 class="my-1 text-danger">  {{ $mailReceived }}</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto">
                                    <i class='bx bxs-envelope'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Categories Card -->
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-4 border-success">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Categories</p>
                                    <h4 class="my-1 text-success">  {{ $Categories }}</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                    <i class='bx bxs-category'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Socials Card -->
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-4 border-warning">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Socials</p>
                                    <h4 class="my-1 text-warning">  {{ $socials }}</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto">
                                    <i class='bx bxs-share'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end row-->
        </div>
    </div>
@endsection
