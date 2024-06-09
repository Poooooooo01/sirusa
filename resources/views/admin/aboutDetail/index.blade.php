@extends('layouts.sidebar')
@section('container')

@if(session()->has("errorMessage"))
    <div class="alert alert-danger">
        {{ session("errorMessage") }}
    </div>
@endif

<a href="{{ route('aboutDetail.create') }}" class="btn btn-primary mb-3">
    <i class="fas fa-plus" aria-hidden="true"></i>Add</a>

<table id="datatable1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="50px">No</th>
            <th><Title></Title></th>
            <th>Description</th>
            <th width="100px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($aboutDetails as $i => $aboutDetail)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $aboutDetail->title }}</td>
            <td>{{ $aboutDetail->description }}</td>
            <td>
                <div class="d-flex">
                    <a href="{{ route('aboutDetail.show', $aboutDetail->id) }}" class="btn btn-sm btn-info mr-2">Show</a>
                    <a href="{{ route('aboutDetail.edit', $aboutDetail->id) }}" class="btn btn-sm btn-warning mr-2">Edit</a>

                    <form action="{{ route('aboutDetail.destroy', $aboutDetail->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin mau menghapus data ini {{ $aboutDetail->title }}?')">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
