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
                                <a href="{{ route('suggestions.index') }}">Suggestions</a>
                            </li>
                            <!--end nav-item-->
                            <li class="breadcrumb-item fw-bolder">
                                <a href="{{ route('suggestions.edit', ['suggestion' => $suggestion]) }}">Suggestion Edit</a>
                            </li>
                            <!--end nav-item-->
                        </ol>
                    </div>
                    <h4 class="page-title">Suggestion Edit</h4>
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
                        <form method="POST" action="{{ route('suggestions.update', ['suggestion' => $suggestion]) }}">
                            @csrf
                            @method('PATCH')
                            <div class="row border-bottom mb-1 py-1">
                                <h3 class="text-pink fw-bolder">Form Suggestion Edit</h3>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 col-lg-6 my-2">
                                    <label for="title"
                                        class="form-label fw-bolder text-pink font-15 text-capitalize">{{ __('title') }}</label>
                                    <input id="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{ $suggestion->title }}" required autocomplete="title" autofocus
                                        placeholder="Enter title for suggestion">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-lg-6 my-2">
                                    <label for="content"
                                        class="form-label fw-bolder text-pink font-15 text-capitalize">{{ __('content') }}</label>
                                    <textarea id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content"
                                        value="{{ old('content') }}" required autocomplete="content" autofocus placeholder="Enter content for suggestion"
                                        rows="4">{{ $suggestion->content }}</textarea>
                                    @error('content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mx-auto my-2 text-center border-top py-2 border-pink border-2">
                                    <button type="submit" class="btn fw-bolder btn-pink">
                                        {{ __('Edit Suggestion') }}
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
