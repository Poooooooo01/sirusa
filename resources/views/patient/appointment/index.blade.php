@extends('layouts.patient')

@section('container')
<div class="container">
<a href="{{ route('appointment.create') }}" class="btn btn-success mb-3">Add</a>
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
        <table class="table table-striped">
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
                            @if($consultation->status == 'scheduled')
                            <a href="{{ route('conversations.show', $consultation->id) }}" class="btn btn-primary">Conversation</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
