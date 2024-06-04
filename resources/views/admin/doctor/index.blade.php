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

<a href="{{ route('doctoradmin.create') }}" class="btn btn-primary mb-3">
    <i class="fas fa-plus" aria-hidden="true"></i>Add</a>

<table id="datatable1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="50px">No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Spesialis</th>
            <th>Pendidikan</th>
            <th>Nomer Ruangan</th>
            <th>Image</th>
            <th width="100px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($doctors as $index => $doctor)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $doctor->nik }}</td>
            <td>{{ $doctor->name }}</td>
            <td>{{ $doctor->specialization }}</td>
            <td>{{ $doctor->education }}</td>
            <td>{{ $doctor->office_number }}</td>
            <td><a onclick="showDetailImageModal('{{ URL::to('storage/'. $doctor->image) }}')" class="btn btn-link" data-toggle="modal" data-target="#detailImageModal">
                <img src="{{asset('storage/' . $doctor->image)}}" alt="Image" style="width: 100px; height: auto;">
            </a>
            </td>
            <td>
                <div class="d-flex">
                    <a href="{{ route('doctoradmin.show', $doctor->id) }}" class="btn btn-sm btn-info mr-2">Show</a>
                    <a href="{{ route('doctoradmin.edit', $doctor->id) }}" class="btn btn-sm btn-warning mr-2">Edit</a>

                    <form action="{{ route('doctoradmin.destroy', $doctor->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin mau menghapus data ini {{ $doctor->name }}?')">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
