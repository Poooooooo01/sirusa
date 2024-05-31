@extends('layouts.sidebar')
@section('container')

<div class="container mt-4">
    <h1>Consultation Details</h1>

    <div class="card">
        <div class="card-header">
            Consultation #{{ $consultation->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Patient: {{ $consultation->patient->nama }}</h5>
            <h5 class="card-title">Doctor: {{ $consultation->doctor->name }}</h5>
            <p class="card-text">Date: {{ $consultation->consultation_date }}</p>
            <p class="card-text">Status: {{ ucfirst($consultation->status) }}</p>
            <p class="card-text">Notes: {{ $consultation->notes }}</p>
            <a href="{{ route('consultation.index') }}" class="btn btn-primary">Back to list</a>
        </div>
    </div>
</div>

@endsection
