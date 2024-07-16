@extends('main-layouts.back-master')
@section('title','dashboard')
@section('heading','Category Section')

@section('content')
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Edit Category</h3>
                    <div class="">
                        <div class="d-flex justify-content-end my-3">
                            <a href="{{route('cat-show')}}" class="btn btn-primary">Back</a>
                        </div>
                    </div>

                    <div class="py-3">
                        <form action="{{route('cat-upd',$data->id)}}" class="row d-flex justify-content-center" method="POST">
                            @csrf
                            <div class="col-md-8 ">
                                <div class="mb-3">
                                    <label for="cat" class="form-label">Category Name</label>
                                    <input type="text" name="cat_name" value="{{ $data->cat_name }}" class="form-control @error('cat_name') is-invalid @enderror" id="cat">
                                    @error('cat_name')
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
