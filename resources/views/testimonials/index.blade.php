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
<table id="datatable1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="5%">Id.</th>
            <th>Name</th>
            <th>Commentar</th>
            <th width="10%">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($testimonials as $index => $testimonial)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $testimonial->nama }}</td>
                <td>{{ $testimonial->commentar }}</td>
                <td class="align-middle text-center">
                    <div class="d-flex justify-content-center">

                    <form action="{{ route('testimon.destroy', $testimonial->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



@endsection
