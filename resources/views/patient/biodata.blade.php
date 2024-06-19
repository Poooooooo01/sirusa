@extends('layouts.patient')

@section('container')
@if (session()->has("warning"))
    <div class="alert alert-danger">
        {{ session("warning") }}
    </div>
@endif
@if (Auth::check()) 
    <div class="container mt-4">
        <h1>Biodata Diri</h1>

        @if (isset($patient))
            <div class="card">
                <div class="card-header">
                    Biodata {{ $patient->nama }}
                </div>
                <div class="card-body">
                    <p class="card-title"><strong>NIK:</strong> {{ $patient->nik }}</p>
                    <p class="card-text"><strong>Nama:</strong> {{ $patient->nama }}</p>
                    <p class="card-text"><strong>Tanggal Lahir:</strong> {{ $patient->date_of_birth }}</p>
                    <p class="card-text"><strong>Gender:</strong> {{ $patient->gender }}</p>
                    <p class="card-text"><strong>Alamat:</strong> {{ $patient->address }}</p>
                    <p class="card-text"><strong>Kontak Darurat:</strong> {{ $patient->emergency_contact }}</p>
                    <a href="{{ URL::to('patient') }}" class="btn btn-primary">Back to list</a>
                    <div class="mt-3">
                        <p>Jika Anda ingin memperbarui biodata, silakan hubungi admin.</p>
                    </div>
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
