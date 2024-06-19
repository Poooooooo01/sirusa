@extends('layouts.sidebar')
@section('container')

<form method="post" action="{{ isset($health) ? route('health.update', $health->id) : route('health.store') }}" autocomplete="off">
    @csrf
    @if (isset($health))
        @method('put')
    @endif

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="font-weight-bold">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $health->title ?? '') }}">
            
                <!-- error message untuk title -->
                @error('title')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5">{{ old('content', $health->content ?? '') }}</textarea>
            
                <!-- error message untuk content -->
                @error('content')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
            <a href="{{ route('facilitie.index') }}" class="btn btn-sm btn-secondary">Back</a>
        </div>
    </div>
</form>

@endsection
