@extends('layouts.sidebar')
@section('container')

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" id="nik" name="nik" class="form-control" 
            value="{{ $patient->nik }}" readonly>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control" 
            value="{{ $patient->nama }}" readonly>
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date Of Birth</label>
            <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" 
            value="{{ $patient->date_of_birth }}" readonly>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <input type="text" id="gender" name="gender" class="form-control" 
            value="{{ $patient->gender }}" readonly>
        </div>
        <div class="form-group">
            <label for="emergency_contact">Emergency Contact</label>
            <input type="text" id="emergency_contact" name="emergency_contact" class="form-control" 
            value="{{ $patient->emergency_contact}}" readonly>
        </div>
        <div class="form-group">
            <label for="user_id">Pasien</label>
            <input type="text" id="user_id" name="user_id" class="form-control" 
            value="{{ $patient->user_id }}" readonly>
        </div>
      
        <a href="{{ route('patientadmin.index') }}" class="btn btn-sm btn-secondary">Back</a>
    </div>
</div>

@endsection
