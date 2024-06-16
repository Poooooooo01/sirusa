@extends('layouts.doctor')

@section('container')
<div class="container">
    <h1>My Consultations</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($consultations->isEmpty())
        <div class="alert alert-info">
            You have not made any appointments yet.
        </div>
    @else
        <table id="datatable1" class="table table-striped">
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Doctor Name</th>
                    <th>Consultation Date</th>
                    <th>Status</th>
                    <th>Notes</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($consultations as $consultation)
                    <tr>
                        <td>{{ $consultation->patient->nama }}</td>
                        <td>{{ $consultation->doctor->name }}</td>
                        <td>{{ $consultation->consultation_date }}</td>
                        <td>{{ $consultation->status }}</td>
                        <td>{{ $consultation->notes }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Actions">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Change Status
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('consultation.status', ['id' => $consultation->id, 'status' => 'offering']) }}">Offering</a>
                                        <a class="dropdown-item" href="{{ route('consultation.status', ['id' => $consultation->id, 'status' => 'rejected']) }}">Rejected</a>
                                        <a class="dropdown-item" href="{{ route('consultation.status', ['id' => $consultation->id, 'status' => 'scheduled']) }}">Scheduled</a>
                                        <a class="dropdown-item" href="{{ route('consultation.status', ['id' => $consultation->id, 'status' => 'completed']) }}">Completed</a>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('conversationdoctor.show', $consultation->id) }}" class="btn btn-primary">Conversation</a>
                            <a href="{{ route('telemedicine.indexByConsul', $consultation->id) }}" class="btn btn-primary">Telemedicine</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
