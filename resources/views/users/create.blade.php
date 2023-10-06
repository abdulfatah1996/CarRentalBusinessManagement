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
                                <a href="#">User Create</a>
                            </li>
                            <!--end nav-item-->
                        </ol>
                    </div>
                    <h4 class="page-title">User Create</h4>
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
                        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row border-bottom mb-1 py-1">
                                <h3 class="text-pink fw-bolder">Form user create</h3>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 col-lg-4 my-2">
                                    <label for="name"
                                        class="form-label fw-bolder text-pink font-15">{{ __('Name') }}</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Enter the username (Fname and Lname)">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 col-lg-4 my-2">
                                    <label for="name"
                                        class="form-label fw-bolder text-pink font-15">{{ __('Bio') }}</label>
                                    <textarea name="bio" id="bio" rows="2" class="form-control @error('bio') is-invalid @enderror"
                                        placeholder="Write a biography about the user, which should be at least 30 characters."></textarea>
                                    @error('bio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 col-lg-4 my-2">
                                    <label for="name"
                                        class="form-label fw-bolder text-pink font-15">{{ __('E-mail') }}</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Enter Email Address">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 col-lg-4 my-2">
                                    <label for="name"
                                        class="form-label fw-bolder text-pink font-15">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="Enter Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 col-lg-4 my-2">
                                    <label for="name"
                                        class="form-label fw-bolder text-pink font-15">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Enter Confirm Password">
                                </div>

                                <div class="col-md-6 col-lg-4 my-2">
                                    <label for="name"
                                        class="form-label fw-bolder text-pink font-15">{{ __('Role') }}</label>
                                    <select id="role" name="role"
                                        class="form-select @error('role') is-invalid @enderror" size="3"
                                        value="{{ old('role') }}" required>
                                        <option value="administrator">Administrator</option>
                                        <option value="merchant">Merchant</option>
                                        <option value="client">Client</option>
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-lg-4 my-2 mx-auto">
                                    <label for="name"
                                        class="form-label fw-bolder text-pink font-15">{{ __('Uplode picture of user') }}</label>
                                    <div class="col-md-4 mx-auto p-2 mb-3 rounded-circle">
                                        <img src="{{ asset('assets/images/users/user-profile.png') }}" alt="img of user"
                                            class="img-fluid rounded-circle">
                                    </div>
                                    <div class="row mb-3">
                                        <input id="picture" type="file"
                                            class="form-control @error('picture') is-invalid @enderror" name="picture"
                                            value="{{ old('picture') }}" autocomplete="picture">
                                        @error('picture')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 my-2 text-center">
                                    <button type="submit" class="btn fw-bolder btn-pink">
                                        {{ __('Add Account') }}
                                    </button>
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
