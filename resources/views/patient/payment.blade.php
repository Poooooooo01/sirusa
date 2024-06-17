<!-- resources/views/patient/payment.blade.php -->

@extends('layouts.patient')

@section('container')
    @if(isset($error) && $error)
        <p>{{ $error }}</p>
    @else
        <!-- Your payment form with snapToken -->
        <p>Token: {{ $snapToken }}</p>
        <!-- Include the Snap.js library -->
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
        <button id="pay-button">Pay!</button>
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
