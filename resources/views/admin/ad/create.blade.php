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
                            <form action="{{ route('admin.ad.update',1) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                <h6 class="mb-0 text-uppercase">Image</h6>
                                <hr />
                                <div class="card">

                                    <div class="card-body ">
                        <img src="{{ asset(@$ad->ad_header) }}" width="200px" alt=""> <br>

                                        <div class="mb-3 py-3">
                                            <label for="formFile" class="form-label py-2">Header Ad</label>
                                            <input name="ad_header" class="form-control" type="file" id="formFile">
                                        </div>
                                        <div class="mb-3 py-3">
                                        <label for="">Header Ad url</label>
                                        <input type="text" class="form-control" type="text" name="ad_herder_url"
                                            value="{{@$ad->ad_herder_url}}">
                                        </div>
                                        <div class="col-3 py-3">
                                            <div class="form-check form-switch">
                                                <input {{@$ad->ad_header_status ==1 ?'checked':''}} class="form-check-input" name="ad_header_status" type="checkbox"
                                                    id="flexSwitchCheckDefault" value="1">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Header Status
                                                    </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
          

                                    <div class="card-body ">
                                        <img src="{{ asset(@$ad->ad_sidebar) }}" width="200px" alt=""> <br>
                                        <div class="mb-3 py-3">
                                            <label for="formFile" class="form-label py-2">Side Bar Ad</label>
                                            <input name="ad_sidebar" class="form-control" type="file" id="formFile">
                                        </div>
                                        <div class="mb-3 py-3">
                                            <label for="">Side Bar Ad url</label>
                                            <input type="text" class="form-control" type="text" name="ad_sidebar_url"
                                                value="{{@$ad->ad_sidebar_url}}">
                                            </div>
                                        <div class="col-3 py-3">
                                            <div class="form-check form-switch">
                                                <input {{@$ad->ad_sidebar_status ==1 ?'checked':''}} class="form-check-input" name="ad_sidebar_status" type="checkbox"
                                                    id="flexSwitchCheckDefault" value="1">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Status
                                                    Url</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body ">
                        <img src="{{ asset(@$ad->ad_main) }}" width="200px" alt=""> <br>

                                        <div class="mb-3 py-3">
                                            <label for="formFile" class="form-label py-2">Main Ad</label>
                                            <input name="ad_main" class="form-control" type="file" id="formFile">
                                        </div>
                                        <div class="mb-3 py-3">
                                            <label for="">Main Ad url</label>
                                            <input type="text" class="form-control" type="text" name="ad_main_url"
                                                value="{{@$ad->ad_main_url}}">
                                            </div>
                                        <div class="col-3 py-3">
                                            <div class="form-check form-switch">
                                                <input {{@$ad->ad_main_status ==1 ?'checked':''}} class="form-check-input" name="ad_main_status" type="checkbox"
                                                    id="flexSwitchCheckDefault" value="1">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Status
                                                    Url</label>
                                            </div>
                                        </div>
                                    </div>
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
