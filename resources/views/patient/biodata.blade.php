@extends('layouts.patient')
@section('container')

@if (Auth::check()) <div class="container mt-4">
    <h1>Biodata Diri</h1>

    @foreach ($patients as $patient)
        <div class="card">
            <div class="card-header">
                Biodata {{ $patient->nama }}
            </div>
            <div class="card-body">
                <h5 class="card-title">NIK: {{ $patient->nik }}</h5>
                <h5 class="card-title">Nama: {{ $patient->nama }}</h5>
                <p class="card-text">Tanggal Lahir: {{ $patient->date_of_birth }}</p>
                <p class="card-text">Gender: {{ $patient->gender }}</p>
                <p class="card-text">Address: {{ $patient->address }}</p>
                <p class="card-text">Emergency Contact: {{ $patient->emergency_contact }}</p>
                <a href="{{ URL::to('patient') }}" class="btn btn-primary">Back to list</a>
            </div>
        </div>
    @endforeach

</div>

@else <p>You need to be logged in to view your biodata. Please <a href="{{ route('login') }}">login</a>.</p>

@endif

@endsection
