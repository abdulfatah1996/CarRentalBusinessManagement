@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-end">
                        <a href="{{ route('cars.rentals') }}" class="btn btn-pink btn-sm">
                            Cars Rentals
                        </a>
                    </div>
                    <h4 class="page-title text-pink">Cars Rentals</h4>
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
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-light py-3" id="myTable">
                                    <thead class="fw-bolder table-active">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Car</th>
                                            @if (Auth::user()->role == 'merchant')
                                                <th scope="col">Client</th>
                                            @else
                                                <th scope="col">Merchant</th>
                                            @endif

                                            <th scope="col">Start Rental</th>
                                            <th scope="col">End Rental</th>
                                            <th scope="col" class="text-center">Cost</th>
                                            <th scope="col" class="text-center">Tax</th>
                                            <th scope="col" class="text-center">Total</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($rentals as $rental)
                                            @if (Auth::user()->role == 'merchant')
                                                @if ($rental->car->user->id == Auth::user()->id)
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
                                                        <td class="text-center">
                                                            ${{ $rental->car->rentalCost * 0.1 }}
                                                        </td>
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
                                                        <td>
                                                            <div class="btn-group text-uppercase" role="group">
                                                                <a href="{{ route('rental', ['rental' => $rental]) }}"
                                                                    class="btn btn-soft-info btn-sm">
                                                                    <i class="fa fa-print me-1"></i>
                                                                    Print
                                                                </a>
                                                                @if ($rental->status != 'complete')
                                                                    <a href="{{ route('rental.end', ['rental' => $rental]) }}"
                                                                        class="btn btn-soft-success btn-sm">
                                                                        <i
                                                                            class="fa-sharp fa-solid fa-badge-check me-1"></i>
                                                                        <i class="fa fa-clipboard-check"></i>
                                                                        End
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endif
                                            @if (Auth::user()->role == 'client')
                                                @if ($rental->user->id == Auth::user()->id)
                                                    <tr class="text-capitalize">
                                                        <td>{{ $count++ }}</td>
                                                        <td>
                                                            <img src="{{ asset($rental->car->picture) }}"
                                                                alt="{{ $rental->car->picture }}"
                                                                class="img-fluid rounded-circle mx-1"
                                                                style="width: 30px; height: 30px;">
                                                            {{ $rental->car->name }}
                                                        </td>
                                                        <td>
                                                            {{ $rental->car->user->name }}
                                                        </td>
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
                                                        <td class="text-center">
                                                            ${{ $rental->car->rentalCost * 0.1 }}
                                                        </td>
                                                        <td class="text-center">
                                                            @if ($rental->total != null)
                                                                ${{ $rental->total }}
                                                            @else
                                                                $0.00
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span>
                                                                @if ($rental->status == 'incomplete')
                                                                    <span class="badge bg-warning">
                                                                        {{ $rental->status }}
                                                                    </span>
                                                                @else
                                                                    <span class="badge bg-primary">
                                                                        {{ $rental->status }}
                                                                    </span>
                                                                @endif
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('rental', ['rental' => $rental]) }}"
                                                                class="btn btn-soft-info btn-sm">
                                                                Go Details
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
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


@section('css_custom')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('scripts')
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
