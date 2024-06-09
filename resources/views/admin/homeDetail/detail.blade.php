@extends('layouts.sidebar')
@section('container')

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="email">title</label>
            <input type="text" id="title" name="title" class="form-control"
            value="{{ $homeDetail->title }}" readonly>
        </div>
        <div class="form-group">
            <label for="name">description</label>
            <input type="text" id="description" name="description" class="form-control"
            value="{{ $homeDetail->description }}" readonly>
        </div>

        <a href="{{ route('homeDetail.index') }}" class="btn btn-sm btn-secondary">Back</a>
    </div>
</div>

@endsection
