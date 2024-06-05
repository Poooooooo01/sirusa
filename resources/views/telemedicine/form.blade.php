@extends('layouts.sidebar')
@section('container')

<form method="post" action="{{ isset($telemedicine) ? route('telemedicine.update', $telemedicine->id) : (isset($consultation) ? route('telemedicine.storeFromConsultation') : route('telemedicine.store')) }}" autocomplete="off">
    @csrf
    @if (isset($telemedicine))
        @method('put')
    @endif

    @if (isset($consultation))
        <input type="hidden" name="consultation_id" value="{{ $consultation->id }}">
        @if ($consultation->doctor) <!-- Menambahkan pengecekan apakah konsultasi memiliki dokter -->
            <input type="hidden" name="doctor_id" value="{{ $consultation->doctor->id }}">
        @endif
    @endif

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="service_name">Service Name</label>
                <input type="text" id="service_name" name="service_name" class="form-control @error('service_name') is-invalid @enderror" value="{{ isset($telemedicine) ? $telemedicine->service_name : (old('service_name') ?? (isset($consultation) ? 'Telemedicine for Consultation #'.$consultation->id : '')) }}">
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
                    <label for="consultation_id">Doctor</label>
                    <select class="form-control" name="consultation_id" id="consultation_id" disabled> <!-- Menambahkan atribut disabled untuk mencegah pengeditan -->
                        @foreach ($consultations as $consult)
                            <option value="{{ $consult->id }}" {{ isset($telemedicine) && $telemedicine->consultation_id == $consult->id ? 'selected' : '' }}>
                                {{ optional($consult->doctor)->name ?? 'No Doctor Assigned' }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('telemedicine.indexByConsultation', $consultation->id) }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</form>
@endsection
