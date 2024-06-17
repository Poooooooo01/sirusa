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

<br><br>
<table id="datatable1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th>Service Name</th>
            <th>Description</th>
            <th>Doctor</th>
            <th>Patient</th>
            <th>Status</th>
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
                <td>{{ $telemedicine->status }}</td>
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
