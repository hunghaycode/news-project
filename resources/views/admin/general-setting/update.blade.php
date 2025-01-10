@extends('admin.layouts.master')

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Forms</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">News Edit</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Settings</button>
                        <button type="button"
                            class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                                href="javascript:;">Action</a>
                            <a class="dropdown-item" href="javascript:;">Another action</a>
                            <a class="dropdown-item" href="javascript:;">Something else here</a>
                            <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                                link</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="row">
                <div class="col-xl-9 mx-auto">



                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.general-setting.update')}}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                <hr />
                                <div class="mb-4">
                                    <label class="form-label">Site Name:</label>
                                    <input type="text" value="{{@$settings['site_name']}}" name="site_name" class="form-control">
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>  <hr />
                              
                                <img src="{{asset(@$settings['site_logo'])}}" class="img-fluid rounded-top mb-3" alt=""
                                    width="150px" />

                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Site Logo</label>
                                            <input name="site_logo" class="form-control" type="file" id="formFile">
                                        </div>

                                    </div>
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <img src="{{asset(@$settings['site_favicon'])}}" class="img-fluid rounded-top mb-3" alt=""
                                width="150px" />
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Site Favicon</label>
                                            <input name="site_favicon" class="form-control" type="file" id="formFile">
                                        </div>

                                    </div>
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
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
