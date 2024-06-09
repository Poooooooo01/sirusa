@extends('layouts.sidebar')
@section('container')

<div class="container mt-4">
    <h1>Consultation Details</h1>

    <div class="card">
        <div class="card-header">
            Consultation #{{ $consultation->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Patient: {{ $consultation->patient->nama }}</h5><br>
            <h5 class="card-title">Doctor: {{ $consultation->doctor->name }}</h5><br>
            <h5 class="card-text">Date: {{ $consultation->consultation_date }}</h5>
            <h5 class="card-text">Status: {{ ucfirst($consultation->status) }}</h5>
            <!-- Form for Accept and Update Status -->
            <form action="{{ route('consultation.updateStatus', $consultation->id) }}" method="post" style="display:inline-block;">
                            @csrf
                            @method('patch')
                            <div class="input-group">
                                <select name="status" class="form-select form-select-sm">
                                    <option value="scheduled" @if($consultation->status == 'scheduled') selected @endif>Scheduled</option>
                                    <option value="completed" @if($consultation->status == 'completed') selected @endif>Completed</option>
                                    <option value="canceled" @if($consultation->status == 'canceled') selected @endif>Canceled</option>
                                    <option value="rejected" @if($consultation->status == 'rejected') selected @endif>Rejected</option>
                                </select>
                                <button type="submit" class="btn btn-success btn-sm">Update</button>
                            </div>
                        </form>
                        <br>
            <p class="card-text">Notes: {{ $consultation->notes }}</p>
            <a href="{{ route('consultation.index') }}" class="btn btn-primary">Back to list</a>
        </div>
    </div>
</div>

@endsection
