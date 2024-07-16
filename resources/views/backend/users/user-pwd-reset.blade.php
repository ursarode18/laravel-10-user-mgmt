@extends('main-layouts.back-master')
@section('title','dashboard')
@section('heading','Setting Section')

@section('content')
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">User Password Reset</h3>

                    @if(Session::has('msg'))
                        <div class="alert alert-success alert-dismissible fade show py-4" role="alert">
                            <strong>{{Session::get('msg')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="py-3">
                        <form action="{{route('user-pwd-store')}}" class="row d-flex justify-content-center" method="POST">
                            @csrf
                            <div class="col-md-8 ">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                                    @error('password')
                                    <div  class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="confirm_password" class="form-label">Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password">
                                    @error('confirm_password')
                                    <div  class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
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
