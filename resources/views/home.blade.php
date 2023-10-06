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
                            <li class="breadcrumb-item fw-bolder"><a href="">Dasboard</a>
                            </li>
                            <!--end nav-item-->
                        </ol>
                    </div>
                    <h4 class="page-title">Dasboard</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
        <div class="col-11 mx-auto row">
            @if (Auth::user()->role == 'administrator')
                <div class="card shadow-lg border-0 mb-2">
                    <div class="card-header">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <h4 class="text-pink">Last Active Users</h4>
                            <div>
                                <a href="{{ route('users.index') }}" class="btn btn-pink btn-sm">Go Users</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-light py-3 text-center" id="myTable">
                                <thead class="fw-bolder table-active">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">E-mail</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Balance</th>
                                        <th scope="col">Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($users as $user)
                                        <tr class="text-capitalize">
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td class="text-capitalize">{{ $user->role }}</td>
                                            <td>
                                                @if ($user->status == 'active')
                                                    <small class="badge text-bg-success">Active</small>
                                                @else
                                                    <small class="badge text-bg-danger">Inactive</small>
                                                @endif
                                            </td>
                                            <td>
                                                ${{ $user->balance }}
                                            </td>
                                            <td>{{ $user->created_at->diffforhumans() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end card-->
                </div>
                <div class="card shadow-lg border-0 mb-2">
                    <div class="card-header">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <h4 class="text-pink">Last Active Payments</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table class="table table-light py-3">
                                <thead class="fw-bolder table-active">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">E-mail</th>
                                        <th scope="col">Payment</th>
                                        <th scope="col">Updated At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $payment->user->name }}</td>
                                            <td>{{ $payment->user->email }}</td>
                                            <td>${{ $payment->payment }}</td>
                                            <td>{{ $payment->updated_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end card-->
                </div>
                <div class="card shadow-lg border-0 mb-2">
                    <div class="card-header">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <h4 class="text-pink">Last Active Cars</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-light py-3">
                                <thead class="fw-bolder table-active">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name Car</th>
                                        <th scope="col">Merchant</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Doors</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Cost</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Fuel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($cars as $car)
                                        <tr class="text-capitalize">
                                            <td>{{ $count++ }}</td>
                                            <td>
                                                <img src="{{ asset($car->picture) }}" alt="{{ $car->picture }}"
                                                    class="img-fluid rounded-circle me-2"
                                                    style="width: 30px; height: 30px;">
                                                {{ $car->name }}
                                            </td>
                                            <td>{{ $car->user->name }}</td>
                                            <td>{{ $car->company }}</td>
                                            <td>{{ $car->year }}</td>
                                            <td>{{ $car->numberDoors }}</td>
                                            <td class="text-uppercase">
                                                @if ($car->size == 'small')
                                                    <span class="badge bg-info">small</span>
                                                @elseif ($car->size == 'middle')
                                                    <span class="badge bg-primary">middle</span>
                                                @else
                                                    <span class="badge bg-success">big</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $car->rentalCost }}
                                                <i class="fas fa-dollar-sign mx-1 text-pink"></i>
                                            </td>
                                            <td>
                                                @if ($car->status == 'unavailable')
                                                    <span class="badge bg-warning">unavailable</span>
                                                @else
                                                    <span class="badge bg-success">available</span>
                                                @endif
                                            </td>
                                            <td>{{ $car->fuelType }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end card-->
                </div>
                <div class="card shadow-lg border-0 mb-2">
                    <div class="card-header">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <h4 class="text-pink">Last Active Rentals</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-light py-3">
                                <thead class="fw-bolder table-active">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Car</th>
                                        <th scope="col">Client</th>
                                        <th scope="col">Start Rental</th>
                                        <th scope="col">End Rental</th>
                                        <th scope="col" class="text-center">Cost</th>
                                        <th scope="col" class="text-center">Tax</th>
                                        <th scope="col" class="text-center">Total</th>
                                        <th scope="col" class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($rentals as $rental)
                                        <tr class="text-capitalize">
                                            <td>{{ $count++ }}</td>
                                            <td>
                                                <img src="{{ asset($rental->car->picture) }}"
                                                    alt="{{ $rental->car->picture }}"
                                                    class="img-fluid rounded-circle mx-1"
                                                    style="width: 30px; height: 30px;">
                                                {{ $rental->car->name }}
                                            </td>
                                            <td>{{ $rental->user->name }}</td>
                                            <td>
                                                @if ($rental->end_rental != null)
                                                    {{ \Carbon\Carbon::parse($rental->start_rental)->diffforhumans() }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($rental->end_rental != null)
                                                    {{ \Carbon\Carbon::parse($rental->end_rental)->diffforhumans() }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                ${{ $rental->car->rentalCost }}
                                            </td>
                                            <td class="text-center">10%</td>
                                            <td class="text-center">
                                                @if ($rental->total != null)
                                                    ${{ $rental->total }}
                                                @else
                                                    $0.00
                                                @endif
                                            </td>
                                            <td>
                                                @if ($rental->status == 'incomplete')
                                                    <span class="badge bg-warning">
                                                        {{ $rental->status }}
                                                    </span>
                                                @else
                                                    <span class="badge bg-primary">
                                                        {{ $rental->status }}
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end card-->
                </div>
            @endif
            @if (Auth::user()->role == 'merchant')
                <div class="card shadow-lg border-0 mb-2">
                    <div class="card-header">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <h4 class="text-pink">Last Active Cars</h4>
                            <div>
                                <a href="{{ route('cars.index') }}" class="btn btn-pink btn-sm">Go Cars</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-light py-3">
                                <thead class="fw-bolder table-active">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name Car</th>
                                        <th scope="col">Merchant</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Doors</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Cost</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Fuel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($my_cars as $car)
                                        <tr class="text-capitalize">
                                            <td>{{ $count++ }}</td>
                                            <td>
                                                <img src="{{ asset($car->picture) }}" alt="{{ $car->picture }}"
                                                    class="img-fluid rounded-circle mx-1"
                                                    style="width: 30px; height: 30px;">
                                                {{ $car->name }}
                                            </td>
                                            <td>{{ $car->user->name }}</td>
                                            <td>{{ $car->company }}</td>
                                            <td>{{ $car->year }}</td>
                                            <td>{{ $car->numberDoors }}</td>
                                            <td class="text-uppercase">
                                                @if ($car->size == 'small')
                                                    <span class="badge bg-info">small</span>
                                                @elseif ($car->size == 'middle')
                                                    <span class="badge bg-primary">middle</span>
                                                @else
                                                    <span class="badge bg-success">big</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $car->rentalCost }}
                                                <i class="fas fa-dollar-sign mx-1 text-pink"></i>
                                            </td>
                                            <td>
                                                @if ($car->status == 'unavailable')
                                                    <span class="badge bg-warning">unavailable</span>
                                                @else
                                                    <span class="badge bg-success">available</span>
                                                @endif
                                            </td>
                                            <td>{{ $car->fuelType }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end card-->
                </div>
            @endif
            @if (Auth::user()->role == 'client')
                <div class="d-flex justify-content-between align-items-center client">
                    <div class="row row-cols-1 row-cols-md-3 gx-3">
                        @foreach ($all_cars as $car)
                            <a href="{{ route('rental.show', ['car' => $car]) }}">
                                <div class="col">
                                    <div class="card shadow-lg border-0">
                                        <img src="{{ asset($car->picture) }}" class="card-img-top bg-light-alt"
                                            alt="{{ $car->name }}">
                                        <div class="card-body">
                                            <div class="card-title text-pink fw-bolder mb-3">
                                                {{ $car->name }}
                                                <div class="font-12">
                                                    <strong class="text-purple fw-bolder">
                                                        {{ $car->user->name }} | {{ $car->user->email }}
                                                    </strong>
                                                </div>
                                            </div>
                                            <div class="">
                                                <strong class="card-text text-primary font-10 fw-bolder">
                                                    <i class="fas fa-building mx-1"></i>
                                                    {{ $car->company }}
                                                </strong>
                                                <strong class="card-text text-primary font-10 fw-bolder">
                                                    <i class="fas fa-calendar mx-1"></i>
                                                    {{ $car->year }}
                                                </strong>
                                                <strong class="card-text text-primary font-10 fw-bolder">
                                                    <i class="fas fa-door-closed mx-1"></i>
                                                    {{ $car->numberDoors }}
                                                </strong>
                                                <strong class="card-text text-primary font-10 fw-bolder">
                                                    <i class="fas fa-car mx-1"></i>
                                                    {{ $car->size }}
                                                </strong>
                                            </div>
                                            <div class="">
                                                <strong class="card-text text-primary font-10 fw-bolder">
                                                    <i class="fas fa-donate mx-1"></i>
                                                    {{ $car->rentalCost }}
                                                </strong>
                                                <strong class="card-text text-primary font-10 fw-bolder">
                                                    <i class="fas fa-gas-pump mx-1"></i>
                                                    {{ $car->fuelType }}
                                                </strong>
                                            </div>
                                        </div><!--end card-body-->
                                    </div><!--end card-->
                                </div><!--end col-->
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        <!--end col-->
    </div><!-- container -->
@endsection




@section('css_custom')
    <style>
        .client .card {
            opacity: 0.6;
        }

        .client .card:hover {
            opacity: 1;
        }
    </style>
@endsection
