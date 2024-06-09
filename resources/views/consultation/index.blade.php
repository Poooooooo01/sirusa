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
    <i class="fas fa-plus" aria-hidden="true"></i> Add
</a>
<table id="datatable1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="5%">Id</th>
            <th>Patient</th>
            <th>Doctor</th>
            <th>Consultation Date</th>
            <th>Status</th>
            <th>Notes</th>
            <th width="20%">Action</th>
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
                <td class="align-middle">
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="{{ route('consultation.show', $consultation->id) }}" class="btn btn-info btn-sm mr-2">Show</a>
                        <a href="{{ route('telemedicine.indexByConsultation', $consultation->id) }}" class="btn btn-primary btn-sm mr-2">Telemedicine</a>
                        
                        <form action="{{ route('consultation.destroy', $consultation->id) }}" method="post" style="display:inline-block;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm mr-2" onclick="return confirm('Are you sure you want to delete this consultation?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
