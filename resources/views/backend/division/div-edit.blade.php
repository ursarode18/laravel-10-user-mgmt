@extends('main-layouts.back-master')
@section('title','dashboard')
@section('heading','Division Section')

@section('content')
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Edit Division</h3>
                    <div class="">
                        <div class="d-flex justify-content-end my-3">
                            <a href="{{route('div-show')}}" class="btn btn-primary">Back</a
                        </div>
                    </div>

                    <div class="py-3">
                        <form action="{{route('div-upd',$data->id)}}" class="row d-flex justify-content-center" method="POST">
                            @csrf
                            <div class="col-md-8 ">
                                <div class="mb-3">
                                    <label for="division" class="form-label">Division Short Name</label>
                                    <input type="text" name="div_name" value="{{ $data->div_name }}" class="form-control @error('div_name') is-invalid @enderror" id="division">
                                    @error('div_name')
                                    <div  class="invalid-feedback">
                                        $message
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="div_long" class="form-label">Division Full Name:</label>
                                    <textarea class="form-control"  name="div_long" id="div_long" rows="3">{{ $data->div_long }}</textarea>
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
