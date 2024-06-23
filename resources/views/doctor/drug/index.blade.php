@extends('layouts.doctor')
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

<a href="{{ route('drugdoctor.create') }}" class="btn btn-success mb-3">Add</a>
<table id="datatable1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="5%">Id.</th>
            <th>Image</th>
            <th>Drug Name</th>
            <th>Description</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Category</th>
            <th>Stock</th>
            <th width="10%">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($drugs as $index => $drug)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td class="align-middle text-center">
                    <a onclick="showDetailImageModal('{{ URL::to('storage/'. $drug->image) }}')" class="btn btn-link" data-toggle="modal" data-target="#detailImageModal">
                        <img src="{{asset('storage/' . $drug->image)}}" alt="Image" style="width: 100px; height: auto;">
                    </a>
                </td>
                <td>{{ $drug->drug_name }}</td>
                <td>{{ $drug->description }}</td>
                <td>{{ $drug->brand->brand }}</td>
                <td>{{ $drug->price }}</td>
                <td>{{ $drug->category->categories }}</td>
                <td>{{ $drug->stock }}</td>
                <td class="align-middle text-center">
                    <div class="d-flex justify-content-center">
                        <a href="{{ URL::to('drugdoctor/' .$drug->id). '/edit' }}" class="btn btn-sm btn-warning mr-2">Edit</a>

                        <form action="{{ URL::to('drugdoctor/' .$drug->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin mau menghapus data ini {{ $drug->name }} ?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



@endsection
