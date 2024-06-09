@extends('layouts.sidebar')
@section('container')

<form method="post" action="{{ isset($gallery) ? route('gallery.update', $gallery->id) : route('gallery.store') }}" enctype="multipart/form-data" autocomplete="off">
    @csrf
    @if (isset($gallery))
        @method('put')
    @endif

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid
                @enderror" placeholder="Photo">
                @error('photo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                @if(isset($gallery))
                    <img src="{{ URL::to('storage/' . $gallery->photo) }}" width="20%" alt="">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('gallery.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</form>
@endsection
