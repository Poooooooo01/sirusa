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

<h2>Telemedicine for Consultation with {{ $consultation->patient->nama }} and Dr. {{ $consultation->doctor->name }}</h2>

<a href="{{ route('telemedicine.createFromConsultation', $consultation->id) }}" class="btn btn-primary btn-sm mr-2">Telemedicine</a>
<br><br>
<table id="datatable1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th>Service Name</th>
            <th>Description</th>
            <th>Doctor</th>
            <th>Patient</th>
            <th width="15%">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($telemedicines as $index => $telemedicine)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $telemedicine->service_name }}</td>
                <td>{{ $telemedicine->description }}</td>
                <td>{{ $telemedicine->consultation->doctor->name }}</td>
                <td>{{ $telemedicine->consultation->patient->nama }}</td>
                <td class="align-middle text-center">
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('telemedicine.details', $telemedicine->id) }}" class="btn btn-sm btn-secondary mr-1">Detail</a>
                        <form action="{{ URL::to('telemedicine/' . $telemedicine->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin mau menghapus data ini {{ $telemedicine->name }} ?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach

        @if ($telemedicines->isEmpty())
            <tr>
                <td colspan="6" class="text-center">No data available</td>
            </tr>
        @endif
    </tbody>
</table>

@endsection
