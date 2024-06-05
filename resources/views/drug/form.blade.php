@extends('layouts.sidebar')
@section('container')

<form method="post" action="{{ isset($drug) ? route('drug.update', $drug->id) : route('drug.store') }}" enctype="multipart/form-data" autocomplete="off">
    @csrf
    @if (isset($drug))
        @method('put')
    @endif

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ isset($drug) && $drug->category_id === $category->id ? 'selected' : '' }}>
                            {{ $category->categories }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="drug_name">Drug Name</label>
                <input type="text" id="drug_name" name="drug_name"
                    class="form-control @error('drug_name') is-invalid @enderror"
                    value="{{ isset($drug) ? $drug->drug_name : old('drug_name') }}">
                @error('drug_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="brand_id">Brand</label>
                <select class="form-control" name="brand_id" id="brand_id">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ isset($drug) && $drug->brand_id === $brand->id ? 'selected' : '' }}>
                            {{ $brand->brand }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id="description" name="description"
                    class="form-control @error('description') is-invalid @enderror"
                    value="{{ isset($drug) ? $drug->description : old('description') }}">
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id="price" name="price"
                    class="form-control @error('price') is-invalid @enderror"
                    value="{{ isset($drug) ? $drug->price : old('price') }}">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid
                @enderror" placeholder="Image">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                @if(isset($drug))
                    <img src="{{ URL::to('storage/' . $drug->image) }}" width="20%" alt="">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('drug.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</form>
@endsection