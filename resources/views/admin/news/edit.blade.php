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
                            <form action="{{ route('admin.news.update',$news->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="py-4">
                                    <button type="submit" class="btn btn-info px-5 float-end">Save</button>
                                </div>
                                <div class="mb-3">
                                    <label for="single-select-field" class="form-label">Categories</label>
                                    <select  name="category" class="form-select" id="single-select-field"
                                        data-placeholder="Choose one thing">
                                        <option></option>
                                        @foreach ($categories as $category)
                                        <option {{$category->id == $news->category->id ?'selected':''}} value="{{ $category->id }}">{{ $category->name }}</option>

                                        @endforeach

                                    </select>
                                </div>
                                @error('category')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                                <h6 class="mb-0 text-uppercase">Image</h6>
                                <hr />
                                <img
                                    src="{{asset($news->image)}}"
                                    class="img-fluid rounded-top mb-3"
                                    alt=""
                                    width="150px"
                                />
                                
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Default file input example</label>
                                            <input name="image" class="form-control" type="file" id="formFile">
                                        </div>
            
                                    </div>
                                    @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                                
                                <h6 class="mb-0 text-uppercase">Input Mask</h6>
                                <hr />
                                <div class="mb-3">
                                    <label class="form-label">Title:</label>
                                    <input type="text" value="{{$news->title}}" name="title" class="form-control">
                                    @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-group col-md-12">
                                        <label for="input1" class="form-label"> Description</label>
                                        <textarea id="summernote" name="content">{{$news->content}}</textarea>


                                        @error('content')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    </div>
                    
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tags</label>
                                    <input type="text" name="tags" value="{{ formatTags($news->tags()->pluck('name')->toArray()) }}" class="form-control" data-role="tagsinput">
                                    @error('tags')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Title:</label>
                                    <input type="text" value="{{$news->meta_title}}" name="meta_title" class="form-control">
                                    @error('meta_title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                       
                                <div class="mb-3">
                                    <label class="form-label">Meta Description:</label>

                                    <input type="text " value="{{$news->meta_description}} " name="meta_description" class="form-control">
                                    @error('meta_description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                                <div class="row mb-3">
                                    <div class="col-3">
                                        <div class="form-check form-switch">
                                            <input {{$news->status == 1 ?'checked':''}} class="form-check-input" name="status" type="checkbox"
                                                id="flexSwitchCheckDefault" value="1">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Status
                                                input</label>
                                        </div>
                                        @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    </div>
                                    <div class="col-3">
                                        <div class="form-check form-switch">
                                            <input {{$news->is_breaking_news == 1 ?'checked':''}} class="form-check-input" name="is_breaking_news" type="checkbox"
                                                id="flexSwitchCheckDefault"  value="1">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">.Is Breaking
                                                News</label>
                                                @error('is_breaking_news')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                    <div class="col-3">
                                        <div class="form-check form-switch">
                                            <input {{$news->show_at_slider == 1 ?'checked':''}} class="form-check-input" name="show_at_slider" type="checkbox"
                                                id="flexSwitchCheckDefault"  value="1">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Show At
                                                Slider</label>
                                        </div>
                                        @error('show_at_slider')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    </div>
                                    <div class="col-3">
                                        <div class="form-check form-switch">
                                            <input {{$news->show_at_popular == 1 ?'checked':''}} class="form-check-input" name="show_at_popular" type="checkbox"
                                                id="flexSwitchCheckDefault"  value="1">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Show At
                                                Popular</label>
                                        </div>
                                        @error('show_at_popular')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    </div>
                                    <div class="py-4">
                                        <button type="submit" class="btn btn-info px-5 float-end">Save</button>
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
