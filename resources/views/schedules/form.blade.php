@extends('layouts.sidebar')
@section('container')

<form method="post" action="{{ isset($schedule) ? route('schedules.update', $schedule->id) : route('schedules.store') }}" autocomplete="off">
    @csrf
    @if (isset($schedule))
        @method('put')
    @endif

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="doctor_id">Doctor</label>
                <select class="form-control" name="doctor_id" id="doctor_id">
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}" {{ isset($schedule) && $schedule->doctor_id === $doctor->id ? 'selected' : '' }}>
                            {{ $doctor->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="available_date">Available Date</label>
                <input type="datetime-local" id="available_date" name="available_date" class="form-control @error('available_date') is-invalid @enderror" value="{{ isset($schedule) ? date('Y-m-d\TH:i', strtotime($schedule->available_date)) : old('available_date') }}">
                @error('available_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</form>

@endsection
