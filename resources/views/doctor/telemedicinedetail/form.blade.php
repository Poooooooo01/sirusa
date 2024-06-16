@extends('layouts.doctor')
@section('container')
<div class="container">
    <h2>Add Telemedicine Detail</h2>
    <form action="{{ route('telemedicinedoctor.details.store', ['telemedicine' => $telemedicine->id]) }}" method="post">
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
                    <option value="{{ $drug->id }}" data-price="{{ $drug->price }}">{{ $drug->drug_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#drug_id').change(function() {
            var selectedPrice = $(this).find(':selected').data('price');
            $('#price').val(selectedPrice);
        });

        // Trigger change event to set initial price when the page loads
        $('#drug_id').change();
    });
</script>
@endsection
