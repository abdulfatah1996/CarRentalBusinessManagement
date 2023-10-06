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
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <!--end nav-item-->
                        </ol>
                    </div>
                    <h4 class="page-title">Car Rental Contract</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card border-0 shadow-lg">
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
                                    This document is a contract between the merchant and the customer. The contract is
                                    printed by the merchant after agreement with the customer.
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
                                        <strong class="font-14">Client Details :</strong><br>
                                        {{ $rental->user->name }}<br>
                                        {{ $rental->user->email }}<br>
                                    </address>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6 d-print-flex">
                                <div class="">
                                    <address class="font-13 text-center">
                                        <strong class="font-14">Merchant Details :</strong><br>
                                        {{ Auth::user()->name }}<br>
                                        {{ Auth::user()->email }}<br>
                                    </address>
                                </div>
                            </div> <!--end col-->
                        </div><!--end row-->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive project-invoice">
                                    <table class="table table-bordered mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Name</th>
                                                <th>Company</th>
                                                <th>Fuel</th>
                                                <th>Cost</th>
                                            </tr><!--end tr-->
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    {{ $rental->car->name }}
                                                </td>
                                                <td>
                                                    {{ $rental->car->company }}
                                                </td>
                                                <td>
                                                    {{ $rental->car->fuelType }}
                                                </td>
                                                <td>
                                                    ${{ $rental->car->rentalCost }}
                                                </td>
                                            </tr>
                                            <!--end tr-->
                                            <tr>
                                                <td colspan="2" class="border-0"></td>
                                                <td class="border-0 font-14 text-dark"><b>Sub Total</b></td>
                                                <td class="border-0 font-14 text-dark">
                                                    <b>${{ $rental->car->rentalCost }}</b>
                                                </td>
                                            </tr><!--end tr-->
                                            <tr>
                                                @php
                                                    $taxRate = $rental->car->rentalCost * 0.1;
                                                    $total = $rental->car->rentalCost + $taxRate;
                                                @endphp
                                                <th colspan="2" class="border-0"></th>
                                                <td class="border-0 font-14 text-dark"><b>Tax Rate</b></td>
                                                <td class="border-0 font-14 text-dark">
                                                    <b>${{ $taxRate }}</b>
                                                </td>
                                            </tr><!--end tr-->
                                            <tr class="bg-black text-white">
                                                <th colspan="2" class="border-0"></th>
                                                <td class="border-0 font-14"><b>Total</b></td>
                                                <td class="border-0 font-14"><b>${{ $total }}</b></td>
                                            </tr><!--end tr-->
                                        </tbody>
                                    </table><!--end table-->
                                </div> <!--end /div-->
                            </div> <!--end col-->
                        </div><!--end row-->

                        <div class="row">
                            <div class="col-lg-12">
                                <h5 class="mt-4">Terms And Condition :</h5>
                                <ul class="ps-3">
                                    <li>
                                        <small class="font-12">
                                            The contract is considered a legal right. The customer will be held accountable
                                            if he does not go to the merchant.
                                        </small>
                                    </li>
                                    <li>
                                        <small class="font-12">
                                            After confirming the rental request, the customer will go to the merchant, sign
                                            the contract and pay the costs.
                                        </small>
                                    </li>
                                    <li>
                                        <small class="font-12">
                                            Rental is <strong class="text-pink fw-bolder">only 24 hours</strong>, and in the
                                            event of a delay in the
                                            delivery time, the
                                            customer will be held accountable for the delay
                                        </small>
                                    </li>
                                </ul>
                            </div> <!--end col-->
                            <div class="col-lg-12 align-self-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="col-md-6 text-center mb-3">
                                        <strong class="text-muted fw-bolder mb-2">Merchant signature</strong>
                                    </div>
                                    <div class="col-md-6 text-center mb-3">
                                        <strong class="text-muted fw-bolder mb-2">Client signature</strong>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                        <hr>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-12 col-xl-4 ms-auto align-self-center">
                                <div class="text-center">
                                    <strong class="font-12 text-dark">
                                        Thank you very much for doing business with us.
                                    </strong>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-12 col-xl-4">
                                <div class="float-end d-print-none mt-2 mt-md-0">
                                    <a href="javascript:window.print()" class="btn btn-de-info btn-sm">Print</a>
                                    @if (Auth::user()->role == 'merchant')
                                        @if ($rental->end_rental == null)
                                            <a href="{{ route('rental.submit', ['rental' => $rental]) }}"
                                                class="btn btn-de-primary btn-sm">
                                                Submit
                                            </a>
                                        @endif
                                    @endif
                                    <a href="{{ route('cars.rentals') }}" class="btn btn-de-danger btn-sm">Cancel</a>
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
