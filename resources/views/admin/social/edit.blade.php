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
                            <li class="breadcrumb-item active" aria-current="page">Social Edit</li>
                        </ol>
                    </nav>
                </div>
         
            </div>
            <!--end breadcrumb-->

            <div class="row">
                <div class="col-xl-9 mx-auto">
                           <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.social.update',$social->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="single-select-field" class="form-label">Icon</label>
                                    <!-- Button tag -->
                                    {{-- <button class="btn btn-secondary" role="iconpicker"></button> --}}
                                    <!-- Div tag -->
                                 
                        <div name="icon" data-icon="{{$social->icon}}" role= "iconpicker"></div>

                                    @error('icon')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                 
           
                                <div class="mb-3">
                                    <label class="form-label">Url:</label>
                                    <input class="form-control" type="text" name="url"  value="{{$social->url}}">
                                    @error('url')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                    


                                <div class="mb-3">
                                    <label class="form-label">Fan Count</label>
                                    <input class="form-control" type="text"  value="{{$social->count_fan}}" name="count_fan">
                                    @error('count_fan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Fan Type:</label>
                                    <input class="form-control" type="text" value="{{$social->type_fan}}" name="type_fan">
                                    @error('type_fan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div> 
                                <div class="mb-3">
                                    <label class="form-label">Color:</label>
                                    <div class="input-group colorpickerinput">
                                        <input name="color" value="{{$social->color}}" type="text" class="form-control">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="fas fa-fill-drip" ></i>
                                            </div>
                                        </div>
                                        @error('color')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    </div>

                                </div>
                               
                                <div class="mb-3">
                                    <label class="form-label">Button text:</label>

                                    <input class="form-control" type="text" value="{{$social->button}}" name="button">
                                    @error('button')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                                <div class="row mb-3">
                                    <div class="col-3">
                                        <label for="Inputstatus" class="form-label">status</label>
                                        <select class="form-select" id="Inputstatus" name="status"
                                            aria-label="Default select example">
                                            <option {{$social->status==1?'selected':''}} value="1">Active</option>
                                            <option {{$social->status==0?'selected':''}} value="0">Inactive</option>
                                        </select>
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
@push('scripts')
    <script>
        $(".colorpickerinput").colorpicker({
            format: 'hex',
            component: '.input-group-append',
        });
    </script>
@endpush