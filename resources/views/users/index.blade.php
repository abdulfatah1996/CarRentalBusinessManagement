@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-end">
                        <a href="{{ route('users.create') }}" class="btn btn-pink btn-sm">
                            Create User
                        </a>
                    </div>
                    <h4 class="page-title text-pink">Users Page</h4>
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
                                <table class="table table-light text-center py-3" id="myTable">
                                    <thead class="fw-bolder table-active">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">E-mail</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Balance</th>
                                            <th scope="col" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>
                                                    <div
                                                        class="col-md-6 rounded-circle d-flex align-items-center text-nowrap">
                                                        @if ($user->picture == null)
                                                            <img src="assets/images/users/user-2.jpg" alt=""
                                                                class="thumb-sm rounded-circle me-2">
                                                            {{ $user->name }}
                                                        @else
                                                            <img src="{{ asset($user->picture) }}"
                                                                alt="img of user {{ $user->name }}"
                                                                class="thumb-sm rounded-circle me-2">
                                                            {{ $user->name }}
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>{{ $user->email }}</td>
                                                <td class="text-capitalize">{{ $user->role }}</td>
                                                <td>
                                                    @if ($user->status == 'active')
                                                        <small class="badge text-bg-success">Active</small>
                                                    @else
                                                        <small class="badge text-bg-danger">Inactive</small>
                                                    @endif
                                                </td>
                                                <td>{{ $user->created_at->diffforhumans() }}</td>
                                                <td>
                                                    {{ $user->balance }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="button-items">
                                                        <a class="btn btn-outline-primary btn-icon-circle btn-icon-circle-sm"
                                                            href="{{ route('users.edit', ['user' => $user]) }}">
                                                            <i class="fas fa-user-edit"></i>
                                                        </a>
                                                        <a class="btn btn-outline-dark btn-icon-circle btn-icon-circle-sm"
                                                            href="{{ route('users.show', ['user' => $user]) }}">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        @if ($user->status == 'active')
                                                            <a class="btn btn-outline-success btn-icon-circle btn-icon-circle-sm"
                                                                href="{{ route('user.active', ['id' => $user->id]) }}">
                                                                <i class="fas fa-user-lock"></i>
                                                            </a>
                                                        @else
                                                            <a class="btn btn-outline-dark btn-icon-circle btn-icon-circle-sm"
                                                                href="{{ route('user.active', ['id' => $user->id]) }}">
                                                                <i class="fas fa-user-check"></i>
                                                            </a>
                                                        @endif
                                                        <form action="{{ route('users.destroy', ['user' => $user]) }}"
                                                            method="POST" class="d-inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger  btn-icon-circle btn-icon-circle-sm">
                                                                <i class="fas fa-user-times"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
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
@endsection

@section('scripts')
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
