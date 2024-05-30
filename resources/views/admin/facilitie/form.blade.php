@extends('layouts.sidebar')
@section('container')

<form method="post" action="{{ isset($facilitie) ? route('facilitie.update', $facilitie->id) : route('facilitie.store') }}" autocomplete="off">
    @csrf
    @if (isset($facilitie))
        @method('put')
    @endif

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="font-weight-bold">facility_name</label>
                <input type="text" class="form-control @error('facility_name') is-invalid @enderror" name="facility_name" value="{{ old('facility_name') }}">
            
                <!-- error message untuk facility_name -->
                @error('facility_name')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold">description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5">{{ old('description') }}</textarea>
            
                <!-- error message untuk description -->
                @error('description')
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
