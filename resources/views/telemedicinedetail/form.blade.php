@extends('layouts.sidebar')
@section('container')
<div class="container">
    <h2>Add Telemedicine Detail</h2>
    <form action="{{ route('telemedicine.details.store', ['telemedicine' => $telemedicine->id]) }}" method="post">
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
                    <option value="{{ $drug->id }}">{{ $drug->drug_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <select class="form-control" id="price" name="price">
                @foreach($drugs as $drug)
                    <option value="{{ $drug->id }}">{{ $drug->price }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
@endsection