@extends('layouts.doctor')

@section('container')

@if (Auth::check())
    <div class="container mt-4">
        <h1 class="mb-4">Biodata Doctor</h1>

        @foreach ($doctors as $doctor)
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <a onclick="showDetailImageModal('{{ URL::to('storage/'. $doctor->image) }}')" class="btn btn-link p-0" data-toggle="modal" data-target="#detailImageModal">
                            <img src="{{ asset('storage/' . $doctor->image) }}" alt="Doctor Image" class="card-img" style="width: 100%; height: auto;">
                        </a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Dr. {{ $doctor->name }}</h5>
                            <p class="card-text"><strong>NIK:</strong> {{ $doctor->nik }}</p>
                            <p class="card-text"><strong>Specialization:</strong> {{ $doctor->specialization }}</p>
                            <p class="card-text"><strong>Education:</strong> {{ $doctor->education }}</p>
                            <p class="card-text"><strong>Office Number:</strong> {{ $doctor->office_number }}</p>
                            <a href="{{ URL::to('doctor') }}" class="btn btn-primary mt-3">Back to list</a>
                            <p class="mt-3">If you want to update the biodata, please contact the admin.</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @if($doctors->isEmpty())
            <p>No doctor biodata available. <a href="{{ route('doctor.create') }}" class="btn btn-primary mb-3">Add Doctor</a></p>
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="detailImageModal" tabindex="-1" aria-labelledby="detailImageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailImageModalLabel">Doctor Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img id="detailImage" src="" alt="Doctor Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

@else
    <p>You need to be logged in to view the doctor biodata. Please <a href="{{ route('login') }}">login</a>.</p>
@endif

@endsection

@section('scripts')
<script>
    function showDetailImageModal(imageUrl) {
        document.getElementById('detailImage').src = imageUrl;
    }
</script>
@endsection
