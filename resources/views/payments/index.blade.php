@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-end">
                        <a href="{{ route('payments.create') }}" class="btn btn-pink btn-sm">
                            Create Payment
                        </a>
                    </div>
                    <h4 class="page-title text-pink">Payments Page</h4>
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
                                            <th scope="col">E-mail</th>
                                            <th scope="col">Payment</th>
                                            <th scope="col">Updated At</th>
                                            <th scope="col" class="text-center">Actions</th>
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
                                                <td class="text-center">
                                                    <a href="{{ route('payments.edit', ['payment' => $payment]) }}"
                                                        class="btn btn-sm btn-soft-info">
                                                        <i class="fa fas fa-print mx-2"></i>
                                                        Print Payment
                                                    </a>
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
