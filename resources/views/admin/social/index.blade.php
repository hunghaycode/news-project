@extends('admin.layouts.master')

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Tables</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('admin.social.create') }}" class="btn btn-primary">Create +</a>

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <h6 class="mb-0 text-uppercase">DataTable Import</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>icon</th>
                                    <th>count_fan</th>
                                    <th>type_fan</th>
                                    <th>button</th>
                                    <th>color</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                          @foreach ($socials as $social)
                              
                
                                    <tr>
                                        <td>{{$social->id}}</td>
                                        <td><i  style="font-size: 20px" class="{{$social->icon}}"></i></td>
                                        <td>{{$social->count_fan}}</td>
                                        <td>{{$social->type_fan}}</td>
                                        <td>{{$social->button}}</td>
                                        <td><div style="background-color: {{$social->color}}"><i class="fas fa-fill-drip"></i></div></td>
                     
                                        <td>
                                            <div class="col-3">
                                                <div class="form-check form-switch">
                                                    <input {{ $social->status == 1 ? 'checked' : '' }}
                                                        class="form-check-input toggle-status" name="status"
                                                        type="checkbox" id="flexSwitchCheckDefault"
                                                        data-id="{{ $social->id }}" data-name="status"
                                                        value="1">

                                                </div>
                                            </div>
                                        </td>
                        
                                        <td>
                                         
											<a href="{{route('admin.social.edit',$social->id)}}" type="button" class="btn btn-sm btn-warning"><i
												class="fas fa-edit"></i></a>
                                                <a href="{{ route('admin.social.destroy', $social->id) }}" class="btn btn-danger delete-item"><i
                                                    class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach

                                <!-- Các hàng tiếp theo tương tự -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Tiêu đề</th>
                                    <th>Mô tả</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection
@push('scripts')

    <script>
        $(document).ready(function() {
            $('.toggle-status').on('click', function() {
                let name = $(this).data('name');
                let id = $(this).data('id');
                let status = $(this).prop('checked') ? 1 : 0;
                $.ajax({
                    method: 'GET',
					url:"{{route('admin.toggle-social-status')}}",

                    data: {
                        name: name,
                        id: id,
                        status: status
                    },
					success: function(data){
						if(data.status === 'success'){
                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            })
                        }
					},
					error:function(data){

					}
                })

            })
        })
    </script>
@endpush
