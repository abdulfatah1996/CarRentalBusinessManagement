@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    @if (Auth::user()->role != 'administrator')
                        <div class="float-end">
                            <a href="{{ route('suggestions.create') }}" class="btn btn-pink btn-sm">
                                Create Suggestion
                            </a>
                        </div>
                    @endif
                    <h4 class="page-title text-pink">Suggestions Page</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-light py-3" id="myTable">
                                    <thead class="fw-bolder table-active">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">E-mail</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Content</th>
                                            <th scope="col">Updated At</th>
                                            <th scope="col">Created At</th>
                                            @if (Auth::user()->role != 'administrator')
                                                <th scope="col" class="text-center">Actions</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($suggestions as $suggestion)
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>{{ $suggestion->user->name }}</td>
                                                <td>{{ $suggestion->user->email }}</td>
                                                <td>{{ $suggestion->title }}</td>
                                                <td>{{ $suggestion->content }}</td>
                                                <td>{{ $suggestion->created_at->diffforhumans() }}</td>
                                                <td>{{ $suggestion->updated_at->diffforhumans() }}</td>
                                                @if (Auth::user()->role != 'administrator')
                                                    <td class="text-center">
                                                        <div class="btn-group btn-group-lg" role="group">
                                                            <a href="{{ route('suggestions.edit', ['suggestion' => $suggestion]) }}"
                                                                class="btn btn-primary">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <button type="button" id="{{ $suggestion->id }}"
                                                                class="btn btn-danger suggestion-destroy">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div><!-- container -->
@endsection


@section('css_custom')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection

@section('scripts')
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $('.suggestion-destroy').click(function(e) {
                e.preventDefault();
                var id = this.id;
                $.ajax({
                    type: "DELETE",
                    url: "/suggestions/" + id,
                    dataType: "JSON",
                    success: function(response) {
                        console.log(response.success);
                        toastr.error(response.success, 'Suggestion Destroy', {
                            timeOut: 5000
                        })
                        window.location.reload();
                    }
                });
            });
        });
    </script>
@endsection
