@extends('layouts.sidebar')
@section('container')

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="email">Title</label>
            <input type="text" id="title" name="title" class="form-control" 
            value="{{ $health->title }}" readonly>
        </div>
        <div class="form-group">
            <label for="name">content</label>
            <input type="text" id="content" name="content" class="form-control" 
            value="{{ $health->content }}" readonly>
        </div>
      
        <a href="{{ route('health.index') }}" class="btn btn-sm btn-secondary">Back</a>
    </div>
</div>

@endsection
