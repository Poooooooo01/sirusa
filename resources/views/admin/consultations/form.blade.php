@extends('layouts.sidebar')
@section('container')

<form method="post"
    action="{{ isset($patient) ? route('patientadmin.update', $patient->id) : route('patientadmin.store') }}"
    autocomplete="off">
    @csrf
    @if (isset($patient))
        @method('put')
    @endif

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" id="nik" name="nik" class="form-control @error('nik') is-invalid @enderror"
                    value="{{ isset($patient) ? $patient->nik : old('nik') }}">
                @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror"
                    value="{{ isset($patient) ? $patient->nama : old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date Of Birth</label>
                <input type="date" id="date_of_birth" name="date_of_birth"
                    class="form-control @error('date_of_birth') is-invalid @enderror"
                    value="{{ isset($patient) ? $patient->date_of_birth : old('date_of_birth') }}">
                @error('date_of_birth')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender">
                    <option value="male" {{ isset($patient) && $patient->gender === 'male' ? "selected" : "" }}>Male
                    </option>
                    <option value="female" {{ isset($patient) && $patient->gender === 'female' ? "selected" : "" }}>Female
                    </option>
                </select>
                @error('gender')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address"
                    class="form-control @error('address') is-invalid @enderror">{{ isset($patient) ? $patient->address : old('address') }}</textarea>
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="emergency_contact">Emergency Contact</label>
                <input type="text" id="emergency_contact" name="emergency_contact"
                    class="form-control @error('emergency_contact') is-invalid @enderror"
                    value="{{ isset($patient) ? $patient->emergency_contact : old('emergency_contact') }}">
                @error('emergency_contact')
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
            
            <input type="hidden" name="role" value="pasien">
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <a href="{{ route('patientadmin.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
    </div>
</form>

@endsection