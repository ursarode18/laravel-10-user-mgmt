@extends('main-layouts.back-master')
@section('title','dashboard')
@section('heading','Division Section')

@section('content')
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Create User</h3>
                    <div class="">
                        <div class="d-flex justify-content-end my-3">
                            <a href="{{route('user-show')}}" class="btn btn-primary">Back</a>
                        </div>
                    </div>

                    <div class="py-3">
                        <form action="{{route('user-store')}}" class="row d-flex justify-content-center" method="POST">
                            @csrf
                            <div class="col-md-8 ">
                                <div class="mb-3">
                                    <label for="division" class="form-label">Full Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="division">
                                    @error('name')
                                    <div  class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email ID</label>
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email">
                                    @error('email')
                                    <div  class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                                    @error('password')
                                    <div  class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="confirm_password" class="form-label">Confirm Password</label>
                                    <input type="text" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password">
                                    @error('confirm_password')
                                    <div  class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="division_id" class="form-label">Select Division</label>
                                    <select class="form-select @error('division_id') is-invalid @enderror" id="division_id" name="division_id" >
                                        <option disabled readonly selected>Select Division</option>
                                        @foreach ( $datas as $data)
                                            <option value="{{ $data->id }}">{{ $data->div_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('division_id')
                                    <div  class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-check  mb-3">
                                            <input class="form-check-input" type="checkbox" name="AQUA" value="1" id="AQUA">
                                            <label class="form-check-label" for="AQUA">
                                              AQUA
                                            </label>
                                        </div>

                                        <div class="form-check  mb-3">
                                            <input class="form-check-input" type="checkbox" name="FRHPHM" value="1" id="FRHPHM">
                                            <label class="form-check-label" for="FRHPHM">
                                                FRHPHM
                                            </label>
                                        </div>

                                        <div class="form-check  mb-3">
                                            <input class="form-check-input" type="checkbox" name="FNBP" value="1" id="FNBP">
                                            <label class="form-check-label" for="FNBP">
                                                FNBP
                                            </label>
                                        </div>

                                        <div class="form-check  mb-3">
                                            <input class="form-check-input" type="checkbox" name="AEHM" value="1" id="AEHM">
                                            <label class="form-check-label" for="AEHM">
                                                AEHM
                                            </label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-check  mb-3">
                                            <input class="form-check-input" type="checkbox" name="FGB" value="1" id="FGB">
                                            <label class="form-check-label" for="FGB">
                                              FGB
                                            </label>
                                        </div>

                                        <div class="form-check  mb-3">
                                            <input class="form-check-input" type="checkbox" name="FEES" value="1" id="FEES">
                                            <label class="form-check-label" for="FEES">
                                                FEES
                                            </label>
                                        </div>

                                        <div class="form-check  mb-3">
                                            <input class="form-check-input" type="checkbox" name="IT_CELL" value="1" id="IT-CELL">
                                            <label class="form-check-label" for="IT-CELL">
                                                IT-CELL
                                            </label>
                                        </div>

                                        <div class="form-check  mb-3">
                                            <input class="form-check-input" type="checkbox" name="FINANCE" value="1" id="FINANCE">
                                            <label class="form-check-label" for="FINANCE">
                                                FINANCE
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
@endsection
