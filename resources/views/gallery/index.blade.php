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

<a href="{{ route('gallery.create') }}" class="btn btn-success mb-3">Add</a>
<table id="datatable1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="5%">Id.</th>
            <th>Photo</th>
            <th width="10%">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($galleries as $index => $galleri)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td class="align-middle text-center">
                    <a onclick="showDetailImageModal('{{ URL::to('storage/'. $galleri->photo) }}')" class="btn btn-link" data-toggle="modal" data-target="#detailImageModal">
                        <img src="{{asset('storage/' . $galleri->photo)}}" alt="Image" style="width: 100px; height: auto;">
                    </a>
                </td>
                <td class="align-middle text-center">
                    <div class="d-flex justify-content-center">
                        <form action="{{ URL::to('gallery/' .$galleri->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin mau menghapus data ini {{ $galleri->photo }} ?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



@endsection
