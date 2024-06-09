@extends('layouts.sidebar')
@section('container')

<form method="post"
    action="{{ isset($configuration) ? route('configuration.update', $configuration->id) : route('configuration.store') }}"
    autocomplete="off">
    @csrf
    @if (isset($configuration))
        @method('put')
    @endif

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="hospital_name">Hospital Name</label>
                <input type="text" id="hospital_name" name="hospital_name" class="form-control @error('hospital_name') is-invalid @enderror"
                    value="{{ isset($configuration) ? $configuration->hospital_name : old('hospital_name') }}">
                @error('hospital_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="number" id="phone_number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror"
                    value="{{ isset($configuration) ? $configuration->phone_number : old('phone_number') }}">
                @error('phone_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address"
                    class="form-control @error('address') is-invalid @enderror">{{ isset($configuration) ? $configuration->address : old('address') }}</textarea>
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                       value="{{ isset($configuration) ? $configuration->email : old('email') }}">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="service_text">Service Teks</label>
                <input type="text" id="service_text" name="service_text" class="form-control @error('service_text') is-invalid @enderror"
                    value="{{ isset($configuration) ? $configuration->service_text : old('service_text') }}">
                @error('service_text')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="doctor_text">Doctor Teks</label>
                <input type="text" id="doctor_text" name="doctor_text" class="form-control @error('doctor_text') is-invalid @enderror"
                    value="{{ isset($configuration) ? $configuration->doctor_text : old('doctor_text') }}">
                @error('doctor_text')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="about_text">About Teks</label>
                <input type="text" id="about_text" name="about_text" class="form-control @error('about_text') is-invalid @enderror"
                    value="{{ isset($configuration) ? $configuration->about_text : old('about_text') }}">
                @error('about_text')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="reason">Reason Teks</label>
                <input type="text" id="reason" name="reason" class="form-control @error('reason') is-invalid @enderror"
                    value="{{ isset($configuration) ? $configuration->reason : old('reason') }}">
                @error('reason')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="about_youtube_link">Youtube</label>
                <input type="text" id="about_youtube_link" name="about_youtube_link" class="form-control @error('about_youtube_link') is-invalid @enderror"
                    value="{{ isset($configuration) ? $configuration->about_youtube_link : old('about_youtube_link') }}">
                @error('about_youtube_link')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <a href="{{ route('configuration.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
    </div>
</form>

@endsection
