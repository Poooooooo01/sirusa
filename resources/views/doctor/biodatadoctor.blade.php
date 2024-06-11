@extends('layouts.doctor')

@section('container')

    @if (Auth::check())
        <div class="container mt-4">
            <h1>Biodata Doctor</h1>

            @foreach ($doctors as $doctor)
            <div class="card">
                <div class="card-header">
                    Biodata {{ $doctor->name }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">NIK: {{ $doctor->nik }}</h5>
                    <h5 class="card-title">Nama: {{ $doctor->name }}</h5>
                    <p class="card-text">Specialization: {{ $doctor->specialization }}</p>
                    <p class="card-text">Education: {{ $doctor->education }}</p>
                    <p class="card-text">Office number: {{ $doctor->office_number }}</p>
                    <a href="{{ URL::to('doctor') }}" class="btn btn-primary">Back to list</a>
                </div>
            </div>
@endforeach
        </div>
    @else
        <p>You need to be logged in to view your biodata. Please <a href="{{ route('login') }}">login</a>.</p>
    @endif

@endsection
