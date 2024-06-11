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
                <label for="day">Day</label>
                <select class="form-control" name="day" id="day">
                    <option value="Senin" {{ isset($schedule) && $schedule->day === 'Senin' ? 'selected' : '' }}>Senin</option>
                    <option value="Selasa" {{ isset($schedule) && $schedule->day === 'Selasa' ? 'selected' : '' }}>Selasa</option>
                    <option value="Rabu" {{ isset($schedule) && $schedule->day === 'Rabu' ? 'selected' : '' }}>Rabu</option>
                    <option value="Kamis" {{ isset($schedule) && $schedule->day === 'Kamis' ? 'selected' : '' }}>Kamis</option>
                    <option value="Jumat" {{ isset($schedule) && $schedule->day === 'Jumat' ? 'selected' : '' }}>Jumat</option>
                </select>
            </div>
            <div class="form-group">
                <label for="start_time">Start Time</label>
                <input type="time" id="start_time" name="start_time" class="form-control @error('start_time') is-invalid @enderror" value="{{ isset($schedule) ? $schedule->start_time : old('start_time') }}">
                @error('start_time')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="end_time">End Time</label>
                <input type="time" id="end_time" name="end_time" class="form-control @error('end_time') is-invalid @enderror" value="{{ isset($schedule) ? $schedule->end_time : old('end_time') }}">
                @error('end_time')
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
