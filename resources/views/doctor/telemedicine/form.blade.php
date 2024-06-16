@extends('layouts.patient')

@section('container')

<form method="post" action="{{ isset($telemedicine) ? route('telemedicine.update', $telemedicine->id) : (isset($consultation) ? route('telemedicine.store') : route('telemedicine.store')) }}" autocomplete="off">
    @csrf
    @if (isset($telemedicine))
        @method('put')
    @endif

    @if (isset($consultation))
        <input type="hidden" name="consultation_id" value="{{ $consultation->id }}">
        @if ($consultation->doctor) <!-- Periksa apakah konsultasi memiliki dokter -->
            <input type="hidden" name="doctor_id" value="{{ $consultation->doctor->id }}">
        @endif
    @elseif (isset($telemedicine))
        <input type="hidden" name="consultation_id" value="{{ $telemedicine->consultation_id }}">
        <input type="hidden" name="doctor_id" value="{{ optional($telemedicine->consultation->doctor)->id }}">
    @endif

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="service_name">Service Name</label>
                <input type="text" id="service_name" name="service_name" class="form-control @error('service_name') is-invalid @enderror" value="{{ isset($telemedicine) ? $telemedicine->service_name : (isset($consultation) ? 'Telemedicine for Consultation #' . $consultation->id : old('service_name')) }}">
                @error('service_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ isset($telemedicine) ? $telemedicine->description : old('description') }}">
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            @if (!isset($consultation))
                <div class="form-group">
                    <label for="doctor_id">Doctor</label>
                    <select class="form-control" name="doctor_id" id="doctor_id" disabled>
                        @foreach ($consultations as $consult)
                            @if ($consult->doctor)
                                <option value="{{ $consult->doctor->id }}" {{ isset($telemedicine) && $telemedicine->consultation_id == $consult->id ? 'selected' : '' }}>
                                    {{ $consult->doctor->name }}
                                </option>
                            @else
                                <option value="" disabled>No Doctor Assigned</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('telemedicine.indexByConsul', isset($consultation) ? $consultation->id : (isset($telemedicine) ? $telemedicine->consultation_id : '')) }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</form>
@endsection
