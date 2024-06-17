@extends('layouts.patient')

@section('container')
<div class="container">
    <h1>Telemedicine for Consultation #{{ $consultation->id }}</h1>

    @if (session('successMessage'))
        <div class="alert alert-success">
            {{ session('successMessage') }}
        </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
        </div>
    @endif

    @if($telemedicines->isEmpty())
        <div class="alert alert-info">
            No telemedicine sessions yet.
        </div>
    @else
        <table id="datatable1" class="table table-striped">
            <thead>
                <tr>
                    <th>Service Name</th>
                    <th>Description</th>
                    <th>Total</th>
                    <th>Status</th> <!-- Added Status column -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($telemedicines as $telemedicine)
                    <tr>
                        <td>{{ $telemedicine->service_name }}</td>
                        <td>{{ $telemedicine->description }}</td>
                        <td>{{ number_format($telemedicine->total, 0, ',', '.') }}</td>
                        <td>{{ ucfirst($telemedicine->status) }}</td> <!-- Display Status -->
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('telemedicinepatient.details', $telemedicine->id) }}" class="btn btn-secondary mr-2">Detail</a>
                                @if ($telemedicine->status === 'unpaid')
                                    <form action="{{ route('telemedicinepatient.checkout') }}" method="POST" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="telemedicine_id" value="{{ $telemedicine->id }}">
                                        <button type="submit" class="btn btn-primary submit-btn" id="pay-button">Bayar Sekarang</button>
                                    </form>
                                @else
                                    <button class="btn btn-success" disabled>Paid</button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
