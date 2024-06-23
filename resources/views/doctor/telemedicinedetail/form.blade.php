@extends('layouts.doctor')
@section('container')
<div class="container">
    <h2>Add Telemedicine Detail</h2>
    <form id="telemedicine-form" action="{{ route('telemedicinedoctor.details.store', ['telemedicine' => $telemedicine->id]) }}" method="post">
        @csrf

        <div class="form-group">
            <label for="detail_description">Detail Description</label>
            <input type="text" class="form-control" id="detail_description" name="detail_description">
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount">
        </div>
        <div class="form-group">
            <label for="drug_id">Drug</label>
            <select class="form-control" id="drug_id" name="drug_id">
                @foreach($drugs as $drug)
                    <option value="{{ $drug->id }}" data-price="{{ $drug->price }}" data-stock="{{ $drug->stock }}">{{ $drug->drug_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" readonly>
        </div>
        <div class="alert alert-danger" id="stock-alert" style="display:none;">
            Insufficient stock for the selected drug.
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#drug_id').change(function() {
            var selectedOption = $(this).find(':selected');
            var selectedPrice = selectedOption.data('price');
            $('#price').val(selectedPrice);
        });

        $('#amount, #drug_id').change(function() {
            var selectedOption = $('#drug_id').find(':selected');
            var stock = selectedOption.data('stock');
            var amount = $('#amount').val();

            if (amount > stock) {
                $('#stock-alert').show();
            } else {
                $('#stock-alert').hide();
            }
        });

        // Trigger change event to set initial price when the page loads
        $('#drug_id').change();

        $('#telemedicine-form').submit(function(event) {
            var selectedOption = $('#drug_id').find(':selected');
            var stock = selectedOption.data('stock');
            var amount = $('#amount').val();

            if (amount > stock) {
                event.preventDefault();
                alert('Insufficient stock for the selected drug.');
            }
        });
    });
</script>
@endsection
