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
                            <li class="breadcrumb-item fw-bolder">
                                <a href="{{ route('profile.edit') }}">Profile</a>
                            </li>
                            <!--end nav-item-->
                        </ol>
                    </div>
                    <h4 class="page-title">Profile</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update', ['user' => $user]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row border-bottom mb-1 py-1">
                                <h3 class="text-pink fw-bolder">Form user create</h3>
                            </div>
                            <div class="row p-3">
                                <div class="col-md-6 p-4 border-end border-2 border-pink">
                                    <div class="row mb-3">
                                        <label for="name"
                                            class="form-label text-pink fw-bolder">{{ __('Name') }}</label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ $user->name }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row mb-3">
                                        <label for="name"
                                            class="form-label text-pink fw-bolder">{{ __('Bio') }}</label>
                                        <textarea name="bio" id="bio" cols="10" class="form-control @error('bio') is-invalid @enderror">{{ $user->bio }}</textarea>
                                        @error('bio')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row mb-3">
                                        <label for="email"
                                            class="form-label text-pink fw-bolder">{{ __('Email Address') }}</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ $user->email }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 p-4 ">
                                    <div class="col-md-6 mx-auto p-2 mb-3 rounded-circle">
                                        @if ($user->picture == null)
                                            <img src="{{ asset('assets/images/users/user-profile.png') }}"
                                                alt="img of user {{ $user->name }}" class="img-fluid rounded-circle"
                                                style="width: 200px;height: 200px;">
                                        @else
                                            <img src="{{ asset(Auth::user()->picture) }}"
                                                alt="img of user {{ $user->name }}" class="img-fluid rounded-circle"
                                                style="width: 200px;height: 200px;">
                                        @endif
                                    </div>
                                    <div class="row mb-3">
                                        <input id="picture" type="file"
                                            class="form-control @error('picture') is-invalid @enderror" name="picture"
                                            value="{{ $user->picture }}" autocomplete="picture">
                                        @error('picture')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-pink">
                                            {{ __('Update Profile') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div><!-- container -->
@endsection
