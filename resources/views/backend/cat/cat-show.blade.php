@extends('main-layouts.back-master')
@section('title','dashboard')
@section('heading','Category Section')

@section('content')
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">All Category List</h3>

                    @if(Session::has('msg'))
                        <div class="alert alert-success alert-dismissible fade show py-4" role="alert">
                            <strong>{{Session::get('msg')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="py-3">
                        <div class="d-flex justify-content-end my-3">
                            <a href="{{route('cat-create')}}" class="btn btn-primary">Add Category</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="cat" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Sr.</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($datas as $data )
                                    <tr class="">
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $data->cat_name }}</td>
                                        <td>{{ $data->created_at }}</td>
                                        <td>{{ $data->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('cat-edit',$data->id) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                            <a href="{{ route('cat-del',$data->id) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                    @empty

                                @endforelse

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('sctipt')
    <script>
        $(document).ready(function() {
            $('#cat').DataTable();

        } );
    </script>
@endpush

