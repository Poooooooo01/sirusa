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

<a href="{{ route('brand.create') }}" class="btn btn-success mb-3">Add</a>
<table id="datatable1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="5%">Id.</th>
            <th>Brand</th>
            <th width="10%">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($brands as $index => $brand)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $brand->brand }}</td>
                <td class="align-middle text-center">
                    <div class="d-flex justify-content-center">
                        <a href="{{ URL::to('brand/' .$brand->id). '/edit' }}" class="btn btn-sm btn-warning mr-2">Edit</a>

                        <form action="{{ URL::to('brand/' .$brand->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin mau menghapus data ini {{ $brand->name }} ?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



@endsection
