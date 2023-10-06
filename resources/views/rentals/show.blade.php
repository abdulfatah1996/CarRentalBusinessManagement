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
                                <a href="{{ route('cars.index') }}">Cars</a>
                            </li>
                            <!--end nav-item-->
                            <li class="breadcrumb-item fw-bolder">
                                <a href="{{ route('cars.show', ['car' => $car]) }}">Car Show</a>
                            </li>
                            <!--end nav-item-->
                        </ol>
                    </div>
                    <h4 class="page-title">Information Car</h4>
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
                                @if ($car->picture == null)
                                    <img src="{{ asset('assets/images/cars/car_defalte.jpeg') }}"
                                        alt="img of user {{ $car->name }}" class="img-fluid rounded-circle"
                                        style="width: 300px; height:300px">
                                @else
                                    <img src="{{ asset($car->picture) }}" alt="img of user {{ $car->name }}"
                                        class="img-fluid rounded-circle" style="width: 300px; height:300px">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 d-flex flex-column">
                            <div class="p-2 text-center">
                                <h1 class="text-pink fw-bolder">
                                    Car Information
                                </h1>
                            </div>
                            <div class="p-2">
                                <span class="text-dark fw-bolder">Name of car : </span>
                                <span class="text-pink fw-bolder">{{ $car->name }}</span>
                            </div>
                            <div class="p-2">
                                <span class="text-dark fw-bolder">Company of car : </span>
                                <span class="text-pink fw-bolder">{{ $car->company }}</span>
                            </div>
                            <div class="p-2">
                                <span class="text-dark fw-bolder">Year of car : </span>
                                <span class="text-pink fw-bolder">{{ $car->year }}</span>
                            </div>
                            <div class="p-2">
                                <span class="text-dark fw-bolder">Number doors of car : </span>
                                <span class="text-pink fw-bolder">{{ $car->numberDoors }}</span>
                            </div>
                            <div class="p-2 text-uppercase">
                                <span class="text-dark fw-bolder text-capitalize">Size of car : </span>
                                @if ($car->size == 'small')
                                    <span class="badge bg-info">small</span>
                                @elseif ($car->size == 'middle')
                                    <span class="badge bg-primary">small</span>
                                @else
                                    <span class="badge bg-success">big</span>
                                @endif
                            </div>
                            <div class="p-2">
                                <span class="text-dark fw-bolder">Fuel type of car : </span>
                                <span class="text-pink fw-bolder">{{ $car->fuelType }}</span>
                            </div>
                            <div class="p-2">
                                <span class="text-dark fw-bolder">Status of car : </span>
                                @if ($car->status == 'available')
                                    <span class="badge rounded-pill badge-soft-success">available</span>
                                @else
                                    <span class="badge rounded-pill badge-soft-warning">unavailable</span>
                                @endif
                            </div>
                            <div class="p-2">
                                <span class="text-dark fw-bolder">Created At of car : </span>
                                <span class="text-pink fw-bolder">{{ $car->created_at->diffforhumans() }}</span>
                            </div>
                            <div class="p-2">
                                <span class="text-dark fw-bolder">Updated At of car : </span>
                                <span class="text-pink fw-bolder">{{ $car->updated_at->diffforhumans() }}</span>
                            </div>
                            <div class="text-center p-2">
                                <a href="{{ route('rental.contract', ['car' => $car]) }}" class="btn btn-sm btn-pink">
                                    Go to submit a car rental contract</a>
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
