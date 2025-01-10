@extends('admin.layouts.master')

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-nActive d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Forms</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">News Create</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->

            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h6 class="mb-0 text-uppercase">Display Setting</h6>
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.display-settings.update') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <?php
                                $categories = \App\Models\Category::get();
                                @$displaySettings = \App\Models\DisplaySetting::first();
                                ?>

                                <div class="mb-4">
                                    <label for="select-category-1" class="form-label">Display One 1</label>
                                    <select class="form-select" id="select-category-1" name="category_display_one">
                                        <option></option>
                                        @foreach ($categories as $category)
                                            <option {{@$displaySettings->category_display_one == $category->id ? 'selected':''}} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="select-category-2" class="form-label">Display One 2</label>
                                    <select class="form-select" id="select-category-2" name="category_display_two">
                                        <option></option>
                                        @foreach ($categories as $category)
                                            <option {{@$displaySettings->category_display_two == $category->id ? 'selected':''}} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="select-category-3" class="form-label">Display One 3</label>
                                    <select class="form-select" id="select-category-3" name="category_display_three">
                                        <option></option>
                                        @foreach ($categories as $category)
                                            <option {{@$displaySettings->category_display_three == $category->id ? 'selected':''}} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="py-4">
                                    <button type="submit" class="btn btn-info px-5 float-end">Save</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
    <!--end page wrapper -->
@endsection
@push('scripts')
    <script>
        $(function() {
            "use strict";

            $('.form-select').select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style',
                placeholder: $(this).data('placeholder'),
            });
        });
    </script>
@endpush
