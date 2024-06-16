@extends('layouts.doctor')

@section('container')
<div class="container">
    <h1>Telemedicine for Consultation #{{ $consultation->id }}</h1>

    @if (session('successMessage'))
        <div class="alert alert-success">
            {{ session('successMessage') }}
        </div>
    @endif

    @if($telemedicines->isEmpty())
        <div class="alert alert-info">
            No telemedicine sessions yet.
        </div>
    @else
        <table id="datatable1" class="table table-striped">
            <thead>
                <tr>
                    <th>Service Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($telemedicines as $telemedicine)
                    <tr>
                        <td>{{ $telemedicine->service_name }}</td>
                        <td>{{ $telemedicine->description }}</td>
                        <td>
                            <a href="{{ route('telemedicinepatient.details', $telemedicine->id) }}" class="btn btn-secondary">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
