@extends('frontend.layouts.master')

@section('content')
<link href="{{asset('auth/assets/css/styles.css')}}" rel="stylesheet">
        <!-- register -->
        <section class="wrap__section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- register -->
                        <!-- Form Register -->
    
                        <div class="card mx-auto" style="max-width:520px;">
                            <article class="card-body">
                                <header class="mb-4">
                                    <h4 class="card-title">Sign up</h4>
                                </header>
                                <a href="#" class="btn btn-facebook btn-block mb-2 text-white"> <i
                                    class="fa fa-facebook"></i> &nbsp; Sign
                                in
                                with
                                Facebook</a>
                            <a href="#" class="btn btn-primary btn-block mb-4"> <i class="fa fa-google"></i>
                                &nbsp;
                                Sign in with
                                Google</a>
                                <form action="#">
                                    <div class="form-row">
                                        <div class="col form-group">
                                            <label>First name</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div> <!-- form-group end.// -->
                                        <div class="col form-group">
                                            <label>Last name</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row end.// -->
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="">
                                        <small class="form-text text-muted">We'll never share your email with anyone
                                            else.</small>
                                    </div> <!-- form-group end.// -->

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Create password</label>
                                            <input class="form-control" type="password">
                                        </div> <!-- form-group end.// -->
                                        <div class="form-group col-md-6">
                                            <label>Repeat password</label>
                                            <input class="form-control" type="password">
                                        </div> <!-- form-group end.// -->
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block"> Register </button>
                                    </div> <!-- form-group// -->
                                    
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox"> <input type="checkbox"
                                                class="custom-control-input" checked="">
                                            <span class="custom-control-label"> I am agree with <a href="#">terms and
                                                    contitions</a> </span>
                                        </label>
                                    </div> <!-- form-group end.// -->
                        <p class="text-center mt-4 mb-0">Don't have account? <a href="{{route('user.login')}}">Sign up</a></p>

                                </form>
                            </article><!-- card-body.// -->
                        </div>
                        <!-- end register -->
                    </div>
                </div>
            </div>
        </section>
        <!-- end register -->
    
    
@endsection