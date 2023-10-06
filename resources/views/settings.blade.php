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
                                <a href="{{ route('settings.edit') }}">Settings</a>
                            </li>
                            <!--end nav-item-->
                        </ol>
                    </div>
                    <h4 class="page-title">Settings</h4>
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
                        <form method="POST" action="{{ route('settings.update', ['user' => $user]) }}">
                            @csrf
                            <div class="row d-flex justify-content-between">
                                <div class="p-4">
                                    <div class="row  mb-2">
                                        <h3 class="text-pink">Form change user password</h3>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row mb-3">
                                            <label for="password"
                                                class="form-label text-pink fw-bolder">{{ __('Password') }}</label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password-confirm"
                                                class="form-label text-pink fw-bolder">{{ __('Confirm Password') }}</label>
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="row mb-3 d-flex justify-content-between">
                                        <div class="text-pink mb-3">
                                            Notifications can be activated so that notifications are displayed to the user
                                            in the notifications box in the main menu.
                                        </div>
                                        <div class="form-check form-switch form-switch-pink">
                                            <input class="form-check-input" type="checkbox" name="notification"
                                                id="notification" @if ($user->notification == 'on') checked @endif>
                                            <label class="form-check-label text-pink" for="notification">
                                                Enable notification
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-pink">
                                                {{ __('Update Password') }}
                                            </button>
                                        </div>
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
