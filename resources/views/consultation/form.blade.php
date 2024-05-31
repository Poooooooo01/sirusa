@extends('layouts.sidebar')
@section('container')

<form method="post" action="{{ isset($consultation) ? route('consultation.update', $consultation->id) : route('consultation.store') }}" autocomplete="off">
    @csrf
    @if (isset($consultation))
        @method('put')
    @endif

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="patient_id">Patient</label>
                <select class="form-control" name="patient_id" id="patient_id">
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}" {{ isset($consultation) && $consultation->patient_id === $patient->id ? 'selected' : '' }}>
                            {{ $patient->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="doctor_id">Doctor</label>
                <select class="form-control" name="doctor_id" id="doctor_id">
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}" {{ isset($consultation) && $consultation->doctor_id === $doctor->id ? 'selected' : '' }}>
                            {{ $doctor->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="consultation_date">Consultation Date and Time</label>
                <input type="datetime-local" id="consultation_date" name="consultation_date" class="form-control @error('consultation_date') is-invalid @enderror" value="{{ isset($consultation) ? \Carbon\Carbon::parse($consultation->consultation_date)->format('Y-m-d\TH:i') : old('consultation_date') }}">
                @error('consultation_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status">
                    <option value="completed" {{ isset($consultation) && $consultation->status === 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="scheduled" {{ isset($consultation) && $consultation->status === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                    <option value="canceled" {{ isset($consultation) && $consultation->status === 'canceled' ? 'selected' : '' }}>Canceled</option>
                </select>
            </div>
            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea id="notes" name="notes" class="form-control @error('notes') is-invalid @enderror">{{ isset($consultation) ? $consultation->notes : old('notes') }}</textarea>
                @error('notes')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('consultation.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</form>
@endsection
