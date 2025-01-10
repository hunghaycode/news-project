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
                        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Create +</a>

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
                                    <th>Image</th>
                                    <th>Tiêu đề</th>
                                    <th>Status</th>
                                    <th>In Breaking</th>
                                    <th>In Slider</th>
                                    <th>In Popular</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><img src="{{ asset($item->image) }}" width="100px" alt="Image"></td>
                                        <td>{!!truncate($item->title,50)!!}</td>
                                        <td>
                                            <div class="col-3">
                                                <div class="form-check form-switch">
                                                    <input {{ $item->status == 1 ? 'checked' : '' }}
                                                        class="form-check-input toggle-status" name="status"
                                                        type="checkbox" id="flexSwitchCheckDefault"
                                                        data-id="{{ $item->id }}" data-name="status" value="1">

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-3">
                                                <div class="form-check form-switch">
                                                    <input {{ $item->is_breaking_news == 1 ? 'checked' : '' }}
                                                        class="form-check-input toggle-status" name="is_breaking_news"
                                                        type="checkbox" id="flexSwitchCheckDefault"
                                                        data-id="{{ $item->id }}" data-name="is_breaking_news"
                                                        value="1">

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-3">
                                                <div class="form-check form-switch">
                                                    <input {{ $item->show_at_slider == 1 ? 'checked' : '' }}
                                                        class="form-check-input toggle-status" name="show_at_slider"
                                                        type="checkbox" id="flexSwitchCheckDefault"
                                                        data-id="{{ $item->id }}" data-name="show_at_slider"
                                                        value="1">

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-3">
                                                <div class="form-check form-switch">
                                                    <input {{ $item->show_at_popular == 1 ? 'checked' : '' }}
                                                        class="form-check-input toggle-status" name="show_at_popular"
                                                        type="checkbox" id="flexSwitchCheckDefault"
                                                        data-id="{{ $item->id }}" data-name="show_at_popular"
                                                        value="1">

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                         
											<a href="{{route('admin.news.edit',$item->id)}}" type="button" class="btn btn-sm btn-warning"><i
												class="bx bx-edit"></i></a>
                                                <a href="{{ route('admin.news.destroy', $item->id) }}"
                                                    class="btn btn-danger delete-item">De</a>
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
					url:"{{route('admin.toggle-news-status')}}",

                    data: {
                        name: name,
                        id: id,
                        status: status
                    },
					success: function(data){
						if(data.status === 'success'){
                            Toast.fire({
                                icon: 'success',
                                title: data.item
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
