@extends('layouts.sidebar')
@section('container')

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="email">title</label>
            <input type="text" id="title" name="title" class="form-control"
            value="{{ $aboutDetail->title }}" readonly>
        </div>
        <div class="form-group">
            <label for="name">description</label>
            <input type="text" id="description" name="description" class="form-control"
            value="{{ $aboutDetail->description }}" readonly>
        </div>

        <a href="{{ route('aboutDetail.index') }}" class="btn btn-sm btn-secondary">Back</a>
    </div>
</div>

@endsection
