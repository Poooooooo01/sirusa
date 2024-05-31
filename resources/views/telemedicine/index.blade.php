@extends('layouts.sidebar')
@section('container')

@if (session()->has("successMessage"))
    <div class="alert alert-success">
        {{ session("successMessage") }}
    </div>
@endif

@if (session()->has("errorMessage"))
    <div class="alert alert-danger">
        {{ session("errorMessage") }}
    </div>
@endif

<a href="{{ route('telemedicine.create') }}" class="btn btn-success mb-3">Add</a>
<table id="datatable1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th>Service Name</th>
            <th>Description</th>
            <th>Doctor</th>
            <th>Price</th>
            <th width="10%">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($telemedicines as $index => $telemedicine)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $telemedicine->service_name }}</td>
                <td>{{ $telemedicine->description }}</td>
                <td>{{ $telemedicine->consultation->doctor->name }}</td>
                <td>{{ $telemedicine->price }}</td>
                <td class="align-middle text-center">
                    <div class="d-flex justify-content-center">
                        <a href="{{ URL::to('telemedicine/' .$telemedicine->id) }}" class="btn btn-sm btn-info mr-2">Show</a>
                        <a href="{{ URL::to('telemedicine/' .$telemedicine->id). '/edit' }}" class="btn btn-sm btn-warning mr-2">Edit</a>

                        <form action="{{ URL::to('telemedicine/' .$telemedicine->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin mau menghapus data ini {{ $telemedicine->name }} ?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



@endsection