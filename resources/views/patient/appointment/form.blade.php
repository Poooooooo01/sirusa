@extends('layouts.patient')

@section('container')
<div class="container">
    <h1>Request a Consultation</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('appointment.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="doctor_id">Choose a Doctor</label>
            <select name="doctor_id" id="doctor_id" class="form-control" required>
                <option value="">Select a Doctor</option>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }} ({{ $doctor->specialization }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="consultation_date">Consultation Date and Time</label>
            <input type="datetime-local" name="consultation_date" id="consultation_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="notes">Notes</label>
            <textarea name="notes" id="notes" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
