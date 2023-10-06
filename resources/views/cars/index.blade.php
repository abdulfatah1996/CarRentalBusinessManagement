@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-end">
                        <a href="{{ route('cars.create') }}" class="btn btn-pink btn-sm">
                            Create Car
                        </a>
                    </div>
                    <h4 class="page-title text-pink">Cars Page</h4>
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
                                            <th scope="col">Name</th>
                                            <th scope="col">Company</th>
                                            <th scope="col">Year</th>
                                            <th scope="col">Doors</th>
                                            <th scope="col">Size</th>
                                            <th scope="col">Cost</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Fuel</th>
                                            <th scope="col" class="text-center">Actions</th>
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
                                                        class="img-fluid rounded-circle mx-1"
                                                        style="width: 30px; height: 30px;">
                                                    {{ $car->name }}
                                                </td>
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
                                                <td>{{ $car->rentalCost }}</td>
                                                <td>
                                                    @if ($car->status == 'unavailable')
                                                        <span class="badge bg-warning">unavailable</span>
                                                    @else
                                                        <span class="badge bg-success">available</span>
                                                    @endif
                                                </td>
                                                <td>{{ $car->fuelType }}</td>
                                                <td>
                                                    <div class="button-items">
                                                        <a class="btn btn-sm btn-outline-purple btn-icon-circle btn-icon-circle-sm"
                                                            href="{{ route('cars.edit', ['car' => $car]) }}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a class="btn btn-sm btn-outline-dark btn-icon-circle btn-icon-circle-sm"
                                                            href="{{ route('cars.show', ['car' => $car]) }}">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <form action="{{ route('cars.destroy', ['car' => $car]) }}"
                                                            method="POST" class="d-inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger  btn-icon-circle btn-icon-circle-sm">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
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
