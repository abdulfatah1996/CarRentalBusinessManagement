@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row mb-0">
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
                                <a href="{{ route('cars.edit', ['car' => $car]) }}">Car Edit</a>
                            </li>
                            <!--end nav-item-->
                        </ol>
                    </div>
                    <h4 class="page-title">Car Edit</h4>
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
                        <form method="POST" action="{{ route('cars.update', ['car' => $car]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row border-bottom mb-1 py-1">
                                <h3 class="text-pink fw-bolder">Form Car Edit</h3>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 col-lg-4 my-2">
                                    <label for="name"
                                        class="form-label fw-bolder text-pink font-15">{{ __('Name') }}</label>
                                    <input id="name" type="text"
                                        class="form-control fw-bolder text-purple @error('name') is-invalid @enderror"
                                        name="name" value="{{ $car->name }}" required autocomplete="name" autofocus
                                        placeholder="Enter name of car">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-lg-4 my-2">
                                    <label for="company"
                                        class="form-label fw-bolder text-pink font-15">{{ __('Company') }}</label>
                                    <input id="company" type="text"
                                        class="form-control fw-bolder text-purple @error('company') is-invalid @enderror"
                                        name="company" value="{{ $car->company }}" required autocomplete="company"
                                        placeholder="Enter company of car">
                                    @error('company')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-lg-4 my-2">
                                    <label for="year"
                                        class="form-label fw-bolder text-pink font-15">{{ __('Year') }}</label>
                                    <input id="year" type="number"
                                        class="form-control fw-bolder text-purple @error('year') is-invalid @enderror"
                                        name="year" value="{{ $car->year }}" required autocomplete="year"
                                        placeholder="Enter year of car">
                                    @error('year')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-lg-4 my-2">
                                    <label for="numberDoors"
                                        class="form-label fw-bolder text-pink font-15">{{ __('Number Doors') }}</label>
                                    <input id="year" type="number"
                                        class="form-control fw-bolder text-purple @error('numberDoors') is-invalid @enderror"
                                        name="numberDoors" value="{{ $car->numberDoors }}" required
                                        autocomplete="numberDoors" placeholder="Enter number doors of car">
                                    @error('numberDoors')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-lg-4 my-2">
                                    <label for="size"
                                        class="form-label fw-bolder text-pink font-15">{{ __('Size Car') }}</label>
                                    <select id="size"
                                        class="form-control fw-bolder text-purple font-15 @error('size') is-invalid @enderror"
                                        name="size" required autocomplete="size">
                                        <option @if ($car->size == 'small') selected @endif value="small">
                                            Small size car
                                        </option>
                                        <option @if ($car->size == 'middle') selected @endif value="middle">
                                            Middle size car
                                        </option>
                                        <option @if ($car->size == 'big') selected @endif value="big">
                                            Big size car
                                        </option>
                                    </select>
                                    @error('size')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-lg-4 my-2">
                                    <label for="rentalCost"
                                        class="form-label fw-bolder text-pink font-15">{{ __('Rental Cost') }}</label>
                                    <input id="year" type="number"
                                        class="form-control fw-bolder text-purple @error('rentalCost') is-invalid @enderror"
                                        name="rentalCost" value="{{ $car->rentalCost }}" required autocomplete="rentalCost"
                                        placeholder="Enter rental cost doors of car">
                                    @error('rentalCost')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-lg-4 my-2">
                                    <label for="fuelType"
                                        class="form-label fw-bolder text-pink font-15">{{ __('Fuel Type') }}</label>
                                    <input id="year" type="text"
                                        class="form-control fw-bolder text-purple @error('fuelType') is-invalid @enderror"
                                        name="fuelType" value="{{ $car->fuelType }}" required autocomplete="fuelType"
                                        placeholder="Enter rental fuel type of car">
                                    @error('fuelType')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-lg-4 my-2 row d-flex">
                                    <img src="{{ asset($car->picture) }}" alt="{{ $car->picture }}"
                                        class="img-preview mx-auto" style="width: 200px">
                                    <label for="picture"
                                        class="form-label fw-bolder text-pink font-15">{{ __('Uplode picture of car') }}</label>
                                    <input id="year" type="file"
                                        class="form-control fw-bolder text-purple @error('picture') is-invalid @enderror"
                                        name="picture" value="{{ $car->picture }}" autocomplete="picture"
                                        placeholder="uplode picture of car">
                                    @error('picture')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-5 text-center mx-auto border-pink border-3 border-top mt-3 py-2">
                                    <button type="submit" class="btn fw-bolder btn-pink d-block mx-auto">
                                        {{ __('Edit Car') }}
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
