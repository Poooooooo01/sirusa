@extends('layouts.sidebar')
@section('container')

<div class="row">
<div class="col-12">
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" id="category" name="category" class="form-control" value="{{ $category->category }}" readonly>
        </div>
</div>

@endsection
