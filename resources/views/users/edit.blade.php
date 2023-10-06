@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
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
                                <a href="{{ route('users.edit', ['user' => $user]) }}">User Edit</a>
                            </li>
                            <!--end nav-item-->
                        </ol>
                    </div>
                    <h4 class="page-title">Form User Edit</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-body row d-flex">
                        <div class="col-md-4">
                            <div class="card border-0 shadow-lg">
                                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                                    <h4 class="fw-bolder text-pink">Edit User Form</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('users.update', ['user' => $user]) }}"
                                        class="col-11 mx-auto" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row mb-3">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ $user->name }}" required autocomplete="name" autofocus
                                                placeholder="Enter the username (Fname and Lname)">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="row mb-3">
                                            <textarea name="bio" id="bio" rows="5" class="form-control @error('bio') is-invalid @enderror"
                                                placeholder="Write a biography about the user, which should be at least 30 characters.">{{ $user->bio }}</textarea>
                                            @error('bio')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="row mb-3">
                                            <select id="role" name="role"
                                                class="form-select @error('role') is-invalid @enderror" size="3"
                                                value="{{ $user->role }}" required>
                                                <option @if ($user->role == 'administrator') selected @endif
                                                    value="administrator">
                                                    Administrator</option>
                                                <option @if ($user->role == 'merchant') selected @endif value="merchant">
                                                    Merchant
                                                </option>
                                                <option @if ($user->role == 'client') selected @endif value="client">
                                                    Client</option>
                                            </select>
                                            @error('role')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="row mb-3 ">
                                            <div class="col-md-6 mx-auto p-2 mb-3 rounded-circle">
                                                @if ($user->picture == null)
                                                    <img src="{{ asset('assets/images/users/user-profile.png') }}"
                                                        alt="img of user {{ $user->name }}"
                                                        class="img-fluid rounded-circle"
                                                        style="width: 100px;height: 100px;">
                                                @else
                                                    <img src="{{ asset($user->picture) }}"
                                                        alt="img of user {{ $user->name }}"
                                                        class="img-fluid rounded-circle"
                                                        style="width: 100px;height: 100px;">
                                                @endif
                                            </div>
                                            <div class="row mb-3">
                                                <input id="picture" type="file"
                                                    class="form-control @error('picture') is-invalid @enderror"
                                                    name="picture" value="{{ $user->picture }}" autocomplete="picture">
                                                @error('picture')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-12 text-center mb-0">
                                            <button type="submit" class="btn btn-sm fw-bolder btn-pink text-nowrap">
                                                {{ __('Edit User') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 shadow-lg">
                                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                                    <h4 class="fw-bolder text-pink">Change E-mail</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('user.change.email', ['user' => $user]) }}"
                                        class="col-8 mx-auto">
                                        @csrf
                                        <div class="row mb-3">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ $user->email }}" required autocomplete="email"
                                                placeholder="Enter Email Address">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 text-center mb-0">
                                            <button type="submit" class="btn btn-sm fw-bolder btn-pink text-nowrap">
                                                {{ __('Change E-mail') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 shadow-lg">
                                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                                    <h4 class="fw-bolder text-pink">Change Password</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('user.change.password', ['user' => $user]) }}"
                                        class="col-8 mx-auto">
                                        @csrf
                                        <div class="row mb-3">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password"
                                                placeholder="Enter Password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="row mb-3">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password"
                                                placeholder="Enter Confirm Password">
                                        </div>
                                        <div class="col-12 text-center mb-0">
                                            <button type="submit" class="btn btn-sm fw-bolder btn-pink text-nowrap">
                                                {{ __('Change Password') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
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
