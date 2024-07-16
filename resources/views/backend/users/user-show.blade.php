@extends('main-layouts.back-master')
@section('title','dashboard')
@section('heading','User Section')

@section('content')
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">All Users List</h3>

                    @if(Session::has('msg'))
                        <div class="alert alert-success alert-dismissible fade show py-4" role="alert">
                            <strong>{{Session::get('msg')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="py-3">
                        <div class="d-flex justify-content-end my-3">
                            <a href="{{route('user-create')}}" class="btn btn-primary">Add User</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Sr.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email Address</th>
                                    <th scope="col">Division</th>
                                    <th scope="col">Roles</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($datas as $data )
                                    <tr class="">
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td class="text-capitalize">{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->div_name }}</td>
                                        <td>

                                            @if($data->AQUA == 1)
                                                <span class="badge rounded-pill text-bg-primary">AQUA</span>
                                                @endif

                                                @if($data->FRHPHM == 1)
                                                <span class="badge rounded-pill text-bg-primary">FRHPHM</span>
                                                @endif

                                                @if($data->FNBP == 1)
                                                <span class="badge rounded-pill text-bg-primary">FNBP</span>
                                                @endif

                                                @if($data->AEHM == 1)
                                                <span class="badge rounded-pill text-bg-primary">AEHM</span>
                                                @endif

                                                @if($data->FGB == 1)
                                                <span class="badge rounded-pill text-bg-primary">FGB</span>
                                                @endif

                                                @if($data->FEES == 1)
                                                <span class="badge rounded-pill text-bg-primary">FEES</span>
                                                @endif

                                                @if($data->IT_CELL == 1)
                                                <span class="badge rounded-pill text-bg-primary">IT-CELL</span>
                                                @endif

                                                @if($data->FINANCE == 1)
                                                <span class="badge rounded-pill text-bg-primary">FINANCE</span>
                                                @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('user-edit',$data->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                                            <a href="{{ route('user-del',$data->id) }}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
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
            $('#example').DataTable();

        } );
    </script>
@endpush

