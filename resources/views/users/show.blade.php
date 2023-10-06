@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row mb-3">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">CAR Rent</a>
                            </li>
                            <!--end nav-item-->
                            <li class="breadcrumb-item">
                                <a href="{{ route('users.index') }}">Users</a>
                            </li>
                            <!--end nav-item-->
                            <li class="breadcrumb-item fw-bolder">
                                <a href="{{ route('users.show', ['user' => $user]) }}">User Show</a>
                            </li>
                            <!--end nav-item-->
                        </ol>
                    </div>
                    <h4 class="page-title">Information User</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg border-0">
                    <div class="card-body row d-flex justify-content-around">
                        <div
                            class="col-md-4 border-end border-2 border-pink d-flex justify-content-center align-items-center">
                            <div class="p-2 mb-3">
                                @if ($user->picture == null)
                                    <img src="{{ asset('assets/images/users/user-profile.png') }}"
                                        alt="img of user {{ $user->name }}" class="img-fluid rounded-circle"
                                        style="width: 300px; height:300px">
                                @else
                                    <img src="{{ asset($user->picture) }}" alt="img of user {{ $user->name }}"
                                        class="img-fluid rounded-circle" style="width: 300px; height:300px">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 d-flex flex-column">
                            <div class="p-2 text-center">
                                <h1 class="text-pink fw-bolder">
                                    User Information
                                </h1>
                            </div>
                            <div class="p-2">
                                <span class="text-dark fw-bolder">Name of User : </span>
                                <span class="text-pink fw-bolder">{{ $user->name }}</span>
                            </div>
                            <div class="p-2">
                                <span class="text-dark fw-bolder">Role of User : </span>
                                <span class="text-pink fw-bolder">{{ $user->role }}</span>
                            </div>
                            <div class="p-2">
                                <span class="text-dark fw-bolder">Status of User : </span>
                                @if ($user->status == 'active')
                                    <span class="badge rounded-pill badge-soft-success">Success</span>
                                @else
                                    <span class="badge rounded-pill badge-soft-warning">Success</span>
                                @endif
                            </div>
                            <div class="p-2">
                                <span class="text-dark fw-bolder">Bio of User : </span>
                                <span class="text-pink fw-bolder">{{ $user->bio }}</span>
                            </div>
                            <div class="p-2">
                                <span class="text-dark fw-bolder">E-mail of User : </span>
                                <span class="text-pink fw-bolder">{{ $user->email }}</span>
                            </div>
                            <div class="p-2">
                                <span class="text-dark fw-bolder">Created At of User : </span>
                                <span class="text-pink fw-bolder">{{ $user->created_at->diffforhumans() }}</span>
                            </div>
                            <div class="p-2">
                                <span class="text-dark fw-bolder">Updated At of User : </span>
                                <span class="text-pink fw-bolder">{{ $user->updated_at->diffforhumans() }}</span>
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
