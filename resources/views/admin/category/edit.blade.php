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
                            <li class="breadcrumb-item active" aria-current="page">News Edit</li>
                        </ol>
                    </nav>
                </div>
                {{-- <div class="ms-auto">
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
                </div> --}}
            </div>
            <!--end breadcrumb-->

            <div class="row">
                <div class="col-xl-9 mx-auto">

                    {{-- <h6 class="mb-0 text-uppercase">File input</h6> --}}
                    {{-- <hr /> --}}
                    {{-- <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Default file input example</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>

                        </div>
                    </div> --}}
                    {{-- <h6 class="mb-0 text-uppercase">Input Mask</h6> --}}
                    <h6 class="mb-0 text-uppercase">News Edit</h6>

                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="form-label">Name:</label>
                                    <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 col-lg-6">
                                        <label for="Inputstatus" class="form-label">Show_Nav</label>
                                        <select class="form-select" id="Inputstatus" name="show_nav"
                                            aria-label="Default select example">

                                            <option {{ $category->show_nav == 1 ? 'selected' : '' }} value="1">Yes</option>
                                            <option {{ $category->show_nav == 0 ? 'selected' : '' }} value="0">No</option>

                                        </select>
                                    </div>
                                    <div class="col-6 col-lg-6">
                                        <label for="Inputstatus" class="form-label">status</label>
                                        <select class="form-select" id="Inputstatus" name="status"
                                            aria-label="Default select example">

                                            <option {{ $category->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                            <option {{ $category->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="mb-3">
										<h6 class="mb-0 text-uppercase">Form text editor</h6>
										<hr/>
										<div id="editor" name="">

										  </div> --}}
                                <div class="py-4">
                                    <button type="submit" class="btn btn-info px-5 float-end">Update</button>
                                </div>
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
