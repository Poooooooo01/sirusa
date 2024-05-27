@extends('layouts.sidebar')
@section('container')

@if(session()->has("errorMessage"))
    <div class="alert alert-danger">
        {{ session("errorMessage") }}
    </div>
@endif
@if(session()->has("successMessage"))
    <div class="alert alert-success">
        {{ session("successMessage") }}
    </div>
@endif

<a href="{{ route('patientadmin.create') }}" class="btn btn-primary mb-3">
    <i class="fas fa-plus" aria-hidden="true"></i>Add</a>

<table id="datatable1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="50px">No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Date Of Birth</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Emergency Contact</th>
            <th width="100px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($patients as $index => $patient)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $patient->nik }}</td>
            <td>{{ $patient->nama }}</td>
            <td>{{ $patient->date_of_birth }}</td>
            <td>{{ $patient->gender }}</td>
            <td>{{ $patient->address }}</td>
            <td>{{ $patient->emergency_contact }}</td>            
            <td>
                <div class="d-flex">
                    <a href="{{ route('patientadmin.show', $patient->id) }}" class="btn btn-sm btn-info mr-2">Show</a>
                    <a href="{{ route('patientadmin.edit', $patient->id) }}" class="btn btn-sm btn-warning mr-2">Edit</a>

                    <form action="{{ route('patientadmin.destroy', $patient->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin mau menghapus data ini {{ $patient->name }}?')">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
