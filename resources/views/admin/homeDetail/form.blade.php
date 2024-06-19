@extends('layouts.sidebar')
@section('container')

<form method="post" action="{{ isset($homeDetail) ? route('homeDetail.update', $homeDetail->id) : route('homeDetail.store') }}" autocomplete="off">
    @csrf
    @if (isset($homeDetail))
        @method('put')
    @endif

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="font-weight-bold">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $homeDetail->title ?? '') }}">

                <!-- error message untuk title -->
                @error('title')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5">{{ old('description', $homeDetail->description ?? '') }}</textarea>

                <!-- error message untuk description -->
                @error('description')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
            <a href="{{ route('homeDetail.index') }}" class="btn btn-sm btn-secondary">Back</a>
        </div>
    </div>
</form>

@endsection
