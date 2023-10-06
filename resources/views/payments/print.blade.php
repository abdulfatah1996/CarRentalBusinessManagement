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
                                <a href="{{ route('payments.index') }}">Payments</a>
                            </li>
                            <!--end nav-item-->
                        </ol>
                    </div>
                    <h4 class="page-title">Payment Print</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body invoice-head">
                        <div class="row">
                            <div class="col-md-6 align-self-center">
                                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm me-1"
                                    height="24">
                                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="logo-large"
                                    class="logo-lg brand-dark" height="16">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="logo-large"
                                    class="logo-lg brand-light" height="16">
                                <p class="mt-2 mb-0 text-muted">
                                    Invoice details payments for merchants
                                </p>
                            </div><!--end col-->
                            <div class="col-md-6 align-self-center">
                                <ul class="list-inline mb-0 contact-detail float-end">
                                    <li class="list-inline-item">
                                        <div class="ps-3 text-center">
                                            <i class="mdi mdi-web"></i>
                                            <p class="text-muted mb-0">https://www.carrent.com</p>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="ps-3 text-center">
                                            <i class="mdi mdi-email"></i>
                                            <p class="text-muted mb-0">sanadhaqwie@gmail.com</p>
                                        </div>
                                    </li>
                                </ul>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end card-body-->
                    <div class="card-body">
                        <div class="row row-cols-2 d-flex justify-content-md-between">
                            <div class="col-md-6 d-print-flex">
                                <div class="">
                                    <address class="font-13 text-center">
                                        <strong class="font-14">Merchant Details :</strong><br>
                                        {{ $payment->user->name }}<br>
                                        {{ $payment->user->email }}<br>
                                    </address>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6 d-print-flex">
                                <div class="">
                                    <address class="font-13 text-center">
                                        <strong class="font-14">Manger Details :</strong><br>
                                        {{ Auth::user()->name }}<br>
                                        {{ Auth::user()->email }}<br>
                                    </address>
                                </div>
                            </div> <!--end col-->
                        </div><!--end row-->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive project-invoice">
                                    <table class="table mb-0 text-center font-15 fw-bolder">
                                        <thead class="table-success">
                                            <tr class="fw-bolder">
                                                <th>Name</th>
                                                <th>E-mail</th>
                                                <th>Payment</th>
                                                <th>Created At</th>
                                                <th>No. Cars</th>
                                            </tr><!--end tr-->
                                        </thead>
                                        <tbody>
                                            <tr class="items-center">
                                                <td>{{ $payment->user->name }}</td>
                                                <td>{{ $payment->user->email }}</td>
                                                <td>
                                                    <span class="badge bg-success font-15">
                                                        $ {{ $payment->payment }}
                                                    </span>
                                                </td>
                                                <td>{{ $payment->created_at }}</td>
                                                <td>{{ $payment->user->cars->count() }}</td>
                                            </tr>
                                            <!--end tr-->
                                        </tbody>
                                    </table><!--end table-->
                                </div> <!--end /div-->
                            </div> <!--end col-->
                        </div><!--end row-->
                        <hr>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-12 col-xl-6 ms-auto align-self-center text-center">
                                <div class="text-center">
                                    <strong class="font-12 text-dark">
                                        Thank you very much for doing business with us.
                                    </strong>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-12 col-xl-6">
                                <div class="float-end d-print-none mt-2 mt-md-0">
                                    <a href="javascript:window.print()"
                                        class="btn btn-pink btn-sm fw-bolder text-uppercase">
                                        <i class="fa fa-print mx-1"></i>
                                        Print
                                    </a>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
        </div>
        <!--end row-->
    </div><!-- container -->
@endsection
