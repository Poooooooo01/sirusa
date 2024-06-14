@extends('layouts.patient')

@section('container')
    @if (Auth::check()) 
        <div class="container mt-4">
            <h1>Biodata Diri</h1>

            @if (isset($patient))
                <div class="card">
                    <div class="card-header">
                        Biodata {{ $patient->nama }}
                    </div>
                    <div class="card-body">
                        <p class="card-title">NIK: {{ $patient->nik }}</p><br>
                        <p class="card-title">Nama: {{ $patient->nama }}</p>
                        <p class="card-text">Tanggal Lahir: {{ $patient->date_of_birth }}</p>
                        <p class="card-text">Gender: {{ $patient->gender }}</p>
                        <p class="card-text">Address: {{ $patient->address }}</p>
                        <p class="card-text">Emergency Contact: {{ $patient->emergency_contact }}</p>
                        <a href="{{ URL::to('patient') }}" class="btn btn-primary">Back to list</a>
                    </div>
                </div>
            @else
                <p>Belum ada biodata. <a href="{{ route('biodata.create') }}" class="btn btn-primary mb-3">Tambah Biodata</a></p>
            @endif

        </div>
    @else 
        <p>You need to be logged in to view your biodata. Please <a href="{{ route('login') }}">login</a>.</p>
    @endif
@endsection

@section('scripts')
    <script>
        // Your custom JavaScript code
        function openForm() {
            $('#exampleModal').modal('show');
        }
    </script>
@endsection
