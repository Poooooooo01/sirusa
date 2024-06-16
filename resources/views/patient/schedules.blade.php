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

<table id="datatable1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="5%">Id</th>
            <th>Doctor Name</th>
            <th>Day</th>
            <th>Start Time</th>
            <th>End Time</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($schedules as $index => $schedule)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $schedule->doctor->name }}</td>
                <td>{{ $schedule->day }}</td>
                <td>{{ $schedule->start_time }}</td>
                <td>{{ $schedule->end_time }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
