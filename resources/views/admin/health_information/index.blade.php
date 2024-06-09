@extends('layouts.sidebar')
@section('container')

@if(session()->has("errorMessage"))
    <div class="alert alert-danger">
        {{ session("errorMessage") }}
    </div>
@endif

<a href="{{ route('health.create') }}" class="btn btn-primary mb-3">
    <i class="fas fa-plus" aria-hidden="true"></i>Add</a>

<table id="datatable1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="50px">No</th>
            <th>Title</th>
            <th>Content</th>
            <th width="100px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($healts as $i => $health)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $health->title }}</td>
            <td>{!! $health->content !!}</td>
            <td>
                <div class="d-flex">
                    <a href="{{ route('health.show', $health->id) }}" class="btn btn-sm btn-info mr-2">Show</a>
                    <a href="{{ route('health.edit', $health->id) }}" class="btn btn-sm btn-warning mr-2">Edit</a>

                    <form action="{{ route('health.destroy', $health->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin mau menghapus data ini {{ $health->title }}?')">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
