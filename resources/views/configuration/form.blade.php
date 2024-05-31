@extends('layouts.sidebar')
@section('container')

<form method="post"
    action="{{ isset($configuration) ? route('configuration.update', $configuration->id) : route('configuration.store') }}"
    autocomplete="off">
    @csrf
    @if (isset($configuration))
        @method('put')
    @endif

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="hospital_name">Hospital Name</label>
                <input type="text" id="hospital_name" name="hospital_name" class="form-control @error('hospital_name') is-invalid @enderror"
                    value="{{ isset($configuration) ? $configuration->hospital_name : old('hospital_name') }}">
                @error('hospital_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="number" id="phone_number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror"
                    value="{{ isset($configuration) ? $configuration->phone_number : old('phone_number') }}">
                @error('phone_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address"
                    class="form-control @error('address') is-invalid @enderror">{{ isset($configuration) ? $configuration->address : old('address') }}</textarea>
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <a href="{{ route('configuration.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
    </div>
</form>

@endsection