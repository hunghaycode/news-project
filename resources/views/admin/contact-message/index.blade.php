@extends('admin.layouts.master')

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-messages-center mb-3">
                <div class="breadcrumb-title pe-3">Tables</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-message"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-message active" aria-current="page">Data Table</li>
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
                                    <th>{{ __('admin.Email') }}</th>
                                    <th>{{ __('admin.Subject') }}</th>
                                    <th>{{ __('admin.Message') }}</th>
                                    <th>{{ __('admin.Replied') }}</th>
                                    <th>{{ __('admin.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $message)
                                    <tr>
                                        <td>{{ $message->id }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ $message->subject }}</td>
                                        <td>{{ $message->message }}</td>
                                        <td>
                                            @if ($message->replied)
                                                <i class="fas fa-check text-primary"></i>
                                            @else
                                                <i class="fas fa-clock text-warning"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <a type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal-{{ $message->id }}"><i
                                                class="fas fa-envelope"></i></a>
                                            <a href="{{ route('admin.news.edit', $message->id) }}" type="button" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>

                                    <!-- Modal for this specific message -->
                                    <div class="modal fade" id="myModal-{{ $message->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Message Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.contact.send-replay') }}" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="">{{ __('admin.Subject') }}</label>
                                                            <input type="text" name="subject" id="" class="form-control">
                                                            <input type="hidden" name="email" value="{{ $message->email }}" id=""
                                                                class="form-control">
                                                            <input type="hidden" name="message_id" value="{{ $message->id }}" id=""
                                                                class="form-control">
                                                            @error('subject')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">{{ __('admin.Message') }}</label>
                                                            <textarea name="message" class="form-control" style="height: 200px !important;"></textarea>
                                                            @error('message')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ __('admin.Close') }}</button>
                                                            <button type="submit" class="btn btn-primary">{{ __('admin.Send') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Replied</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->

    {{-- Optional: Include Bootstrap JS --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script> --}}

@endsection
