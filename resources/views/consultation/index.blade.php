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

<a href="{{ route('consultation.create') }}" class="btn btn-primary mb-3">
    <i class="fas fa-plus" aria-hidden="true"></i>Add</a>
<table id="datatable1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="5%">Id</th>
            <th>Patient</th>
            <th>Doctor</th>
            <th>Consultation Date</th>
            <th>Status</th>
            <th>Notes</th>
            <th width="10%">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($consultations as $index => $consultation)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $consultation->patient->nama }}</td>
                <td>{{ $consultation->doctor->name }}</td>
                <td>{{ $consultation->consultation_date }}</td>
                <td>{{ $consultation->status }}</td>
                <td>{{ $consultation->notes }}</td>
                <td class="align-middle text-center">
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('consultation.show', $consultation->id) }}"
                            class="btn btn-sm btn-info mr-2">Show</a>

                        <form action="{{ route('consultation.destroy', $consultation->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this consultation?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection