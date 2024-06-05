@extends('layouts.sidebar')
@section('container')

<form method="post" action="{{ isset($brand) ? route('brand.update', $brand->id) : route('brand.store') }}" autocomplete="off">
    @csrf
    @if (isset($brand))
        @method('put')
    @endif

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" id="brand" name="brand" class="form-control @error('brand') is-invalid @enderror" value="{{ isset($brand) ? $brand->brand : old('brand') }}">
                @error('brand')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('brand.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</form>
@endsection
