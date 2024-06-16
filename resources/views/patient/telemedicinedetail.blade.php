@extends('layouts.patient')
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

<h2>Details for {{ $telemedicine->service_name }}</h2>

<table id="datatable1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th>Detail Description</th>
            <th>Amount</th>
            <th>Drug</th>
            <th>Price</th>
            <th>Image</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($details as $index => $detail)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $detail->detail_description }}</td>
                <td>{{ $detail->amount }}</td>
                <td>{{ $detail->drug->drug_name }}</td>
                <td>{{ $detail->drug->price }}</td>
                <td class="align-middle text-center">
                    <a onclick="showDetailImageModal('{{ URL::to('storage/'. $detail->drug->image) }}')" class="btn btn-link" data-toggle="modal" data-target="#detailImageModal">
                        <img src="{{asset('storage/' . $detail->drug->image)}}" alt="Image" style="width: 100px; height: auto;">
                    </a>
                </td>
                <td>{{ $detail->total }}</td>
                <td>
                    <form action="{{ route('telemedicinedetails.destroy', $detail->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin mau menghapus data ini {{ $detail->name }} ?')">Delete</button>
                    </form>
                </td>
                <!-- Add more cells as needed -->
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">No data available</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
