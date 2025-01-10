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
                            <form action="{{ route('admin.footer-info.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                            
                                <div class="mb-4 py-3">
                                    <img src="{{asset(@$footerInfo->logo)}}" width="200px" alt="">
                                    <label for="formFile" class="form-label py-2">LOGO</label>
                                    <input name="logo" class="form-control" type="file" id="formFile">
                                    @error('logo')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                            
                                <div class="mb-4">
                                    <label for="select-category-1" class="form-label">Description</label>
                                    <textarea id="summernote" name="description">{{@$footerInfo->description}}</textarea>
                                    @error('description')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                                <div class="mb-3 py-3">
                                    <label for="formFile" class="form-label py-2">Copyright</label>
                                    <input name="copyright" class="form-control" value="{{@$footerInfo->copyright}}" type="text" id="formFile">
                                    @error('copyright')
                                    <p class="text-danger">{{$message}}</p>
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
