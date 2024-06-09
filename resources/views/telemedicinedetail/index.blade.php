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

<h2>Details for {{ $telemedicine->service_name }}</h2>

<a href="{{ route('telemedicine.details.create', $telemedicine->id) }}" class="btn btn-info btn-sm mr-1">Add Detail</a>

<table id="datatable1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th>Detail Description</th>
            <th>Amount</th>
            <th>Drug</th>
            <th>Price</th>
            <th>Action</th>
            <!-- Add more columns as needed -->
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
                <td>
                    <form action="{{ route('telemedicinedetails.destroy', $detail->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Anda yakin mau menghapus data ini {{ $detail->name }} ?')">Delete</button>
                    </form>

                </td>
                <!-- Add more cells as needed -->
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No data available</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection