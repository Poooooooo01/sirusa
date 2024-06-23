<!-- resources/views/patient/payment.blade.php -->

@extends('layouts.patient')

@section('container')
    @if(isset($error) && $error)
        <p>{{ $error }}</p>
    @else
        <!-- Your payment form with snapToken -->
        {{-- <p>Token: {{ $snapToken }}</p> --}}
        <div class="card">
            <div class="card-header">
                Telemedecine 
            </div>
            <div class="card-body">
                <p class="card-text"><strong>Service Name:</strong> {{ $telemedicine->service_name}}</p>
                <p class="card-text"><strong>Description:</strong> {{ $telemedicine->description }}</p>
                <p class="card-text"><strong>Total:</strong> Rp. {{number_format($totalAmount, 0, ',', '.') }}</p>
            </div>
        </div>

        <!-- Include the Snap.js library -->
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
        <button id="pay-button" class="btn btn-success">Pay!</button>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function(){
                snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) {
                        // Redirect to telemedicine page with success message
                        window.location.href = "{{ route('telemedicine.indexByConsulPatient', ['consultationId' => $telemedicine->consultation_id]) }}";
                    },
                    onPending: function(result) {
                        // Handle pending status
                    },
                    onError: function(result) {
                        // Handle error status
                        alert('Payment failed: ' + result.status_message);
                    }
                });
            };
        </script>
    @endif
@endsection
