@extends('layouts.sidebar')
@section('container')

<form method="post" action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}" autocomplete="off">
    @csrf
    @if (isset($category))
        @method('put')
    @endif

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="categories">Category</label>
                <input type="text" id="categories" name="categories" class="form-control @error('categories') is-invalid @enderror" value="{{ isset($category) ? $category->categories : old('categories') }}">
                @error('categories')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('category.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</form>
@endsection
