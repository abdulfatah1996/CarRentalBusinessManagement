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
                            <li class="breadcrumb-item fw-bolder"><a href="#">Notefactions</a>
                            </li>
                            <!--end nav-item-->
                        </ol>
                    </div>
                    <h4 class="page-title">Notefactions</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body notefactions">
                        @foreach ($notefactions as $notefaction)
                            <!-- item-->
                            <a href="{{ route('notefactions.show', ['notefaction' => $notefaction]) }}"
                                class="dropdown-item p-3 border my-1">
                                <small class="float-end text-muted ps-2">
                                    {{ $notefaction->created_at->diffforhumans() }}
                                </small>
                                <div class="media">
                                    @if ($notefaction->status == 'closed')
                                        <div class="avatar-md bg-soft-danger">
                                            <i class="ti ti-bell"></i>
                                        </div>
                                    @else
                                        <div class="avatar-md bg-soft-secondary">
                                            <i class="ti ti-bell"></i>
                                        </div>
                                    @endif
                                    <div class="media-body align-self-center ms-2 text-truncate">
                                        <h6 class="my-0 fw-normal text-dark">
                                            {{ $notefaction->title }}
                                        </h6>
                                        <small class="text-muted mb-0">
                                            {{ $notefaction->notification }}
                                        </small>
                                    </div><!--end media-body-->
                                </div><!--end media-->
                            </a><!--end-item-->
                        @endforeach
                        <div class="mt-3">
                            {{ $notefactions->links() }}
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
    <style>
        .notefactions .dropdown-item:hover {
            border: 1px solid #41cbd8 !important;
        }
    </style>
@endsection
