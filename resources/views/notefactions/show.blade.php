@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">CAR Rent</a>
                            </li>
                            <!--end nav-item-->
                            <li class="breadcrumb-item fw-bolder"><a href="{{ route('notefactions.index') }}">Notefactions</a>
                            </li>
                            <!--end nav-item-->
                        </ol>
                    </div>
                    <h4 class="page-title">Notefaction Show</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body notefactions">
                        <small class="float-end text-muted ps-2">
                            {{ $notefaction->created_at->diffforhumans() }}
                        </small>
                        <h4>
                            {{ $notefaction->title }}
                        </h4>
                        <p>
                            {{ $notefaction->notification }}
                        </p>
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
    <style>
        .notefactions .dropdown-item:hover {
            border: 1px solid #41cbd8 !important;
        }
    </style>
@endsection
