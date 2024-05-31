@extends('layouts.sidebar')
@section('container')

<form method="post" action="{{ isset($telemedicine) ? route('telemedicine.update', $telemedicine->id) : route('telemedicine.store') }}" autocomplete="off">
    @csrf
    @if (isset($telemedicine))
        @method('put')
    @endif

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="service_name">Service Name</label>
                <input type="text" id="service_name" name="service_name" class="form-control @error('service_name') is-invalid @enderror" value="{{ isset($telemedicine) ? $telemedicine->service_name : old('service_name') }}">
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
            <div class="form-group">
                <label for="consultation_id">Doctor</label>
                <select class="form-control" name="consultation_id" id="consultation_id">
                    @foreach ($consultations as $consultation)
                        <option value="{{ $consultation->id }}" {{ isset($consultation) && $consultation->consultation_id === $consultation->id ? 'selected' : '' }}>
                            {{ $consultation->doctor }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="price">price</label>
                <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ isset($consultation) ? $consultation->price : old('price') }}">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('telemedicine.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</form>
@endsection
