@extends('layouts.sidebar')
@section('container')

<form method="post"
    action="{{ isset($doctor) ? route('doctoradmin.update', $doctor->id) : route('doctoradmin.store') }}"
    autocomplete="off">
    @csrf
    @if (isset($doctor))
        @method('put')
    @endif

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" id="nik" name="nik" class="form-control @error('nik') is-invalid @enderror"
                    value="{{ isset($doctor) ? $doctor->nik : old('nik') }}">
                @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ isset($doctor) ? $doctor->name : old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="specialization">Specialization</label>
                <input type="text" id="specialization" name="specialization" class="form-control @error('specialization') is-invalid @enderror"
                    value="{{ isset($doctor) ? $doctor->specialization : old('specialization') }}">
                @error('specialization')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="education">Education</label>
                <input type="text" id="education" name="education" class="form-control @error('education') is-invalid @enderror"
                    value="{{ isset($doctor) ? $doctor->education : old('education') }}">
                @error('education')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="office_number">Office Number</label>
                <input type="text" id="office_number" name="office_number" class="form-control @error('office_number') is-invalid @enderror"
                    value="{{ isset($doctor) ? $doctor->office_number : old('office_number') }}">
                @error('office_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                       value="{{ isset($user) ? $user->email : old('email') }}">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" 
                       value="{{ isset($user) ? $user->username : old('username') }}">
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            
            <input type="hidden" name="role" value="dokter">
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <a href="{{ route('patientadmin.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
    </div>
</form>

@endsection