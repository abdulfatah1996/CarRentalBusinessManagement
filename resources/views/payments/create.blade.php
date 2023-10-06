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
                            <li class="breadcrumb-item fw-bolder">
                                <a href="{{ route('payments.index') }}">Payment Create</a>
                            </li>
                            <!--end nav-item-->
                        </ol>
                    </div>
                    <h4 class="page-title">Payment Create</h4>
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
                        <form method="POST" action="{{ route('payments.store') }}">
                            @csrf
                            <div class="row border-bottom mb-1 py-1">
                                <h3 class="text-pink fw-bolder">Form Payment create</h3>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 col-lg-4 my-2">
                                    <label for="name"
                                        class="form-label fw-bolder text-pink font-15">{{ __('Name') }}</label>
                                    <select name="id" id="id" class="form-select mb-3"
                                        aria-label="Large select example">
                                        <option>Select user</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-lg-4 my-2">
                                    <label for="email"
                                        class="form-label fw-bolder text-pink font-15">{{ __('E-mail') }}</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" readonly autocomplete="email"
                                        placeholder="Enter Email Address">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-lg-4 my-2">
                                    <label for="balance"
                                        class="form-label fw-bolder text-pink font-15">{{ __('Balance') }}</label>
                                    <input id="balance" type="balance"
                                        class="form-control @error('balance') is-invalid @enderror" name="balance"
                                        value="{{ old('balance') }}" readonly autocomplete="balance"
                                        placeholder="balance of user">

                                    @error('balance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 my-2 text-center">
                                    <button type="submit" class="btn fw-bolder btn-pink">
                                        <i class="ti ti-file-invoice"></i>
                                        {{ __('Pay') }}
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


@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#id').on('change', function() {
                var id = $(this).find(":selected").val();
                $.ajax({
                    type: "GET",
                    url: "/payment/user/info/" + id,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response.user);
                        var email = response.user.email;
                        var balance = response.user.balance;

                        $('#email').val(email);
                        $('#balance').val(balance);
                    }
                });
            });
        });
    </script>
@endsection
