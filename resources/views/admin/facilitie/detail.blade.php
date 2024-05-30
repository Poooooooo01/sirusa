@extends('layouts.sidebar')
@section('container')

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="email">facility_name</label>
            <input type="text" id="facility_name" name="facility_name" class="form-control" 
            value="{{ $facilitie->facility_name }}" readonly>
        </div>
        <div class="form-group">
            <label for="name">description</label>
            <input type="text" id="description" name="description" class="form-control" 
            value="{{ $facilitie->description }}" readonly>
        </div>
      
        <a href="{{ route('facilitie.index') }}" class="btn btn-sm btn-secondary">Back</a>
    </div>
</div>

@endsection
