@extends('layouts.sidebar')
@section('container')

@if(session()->has("errorMessage"))
    <div class="alert alert-danger">
        {{ session("errorMessage") }}
    </div>
@endif

<a href="{{ route('useradmin.create') }}" class="btn btn-primary mb-3">
    <i class="fas fa-plus" aria-hidden="true"></i>Add</a>

<table id="datatable1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="50px">No</th>
            <th>Email</th>
            <th>Username</th>
            <th>Role</th>
            <th width="100px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $index => $user)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->role }}</td>
            <td>
                <div class="d-flex">
                    <a href="{{ route('useradmin.show', $user->id) }}" class="btn btn-sm btn-info mr-2">Show</a>
                    <a href="{{ route('useradmin.edit', $user->id) }}" class="btn btn-sm btn-warning mr-2">Edit</a>

                    <form action="{{ route('useradmin.destroy', $user->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin mau menghapus data ini {{ $user->name }}?')">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
