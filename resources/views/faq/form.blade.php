@extends('layouts.sidebar')
@section('container')

<form method="post"
    action="{{ isset($faq) ? route('faq.update', $faq->id) : route('faq.store') }}"
    autocomplete="off">
    @csrf
    @if (isset($faq))
        @method('put')
    @endif

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="question">Question</label>
                <input type="text" id="question" name="question" class="form-control @error('question') is-invalid @enderror"
                    value="{{ isset($faq) ? $faq->question : old('question') }}">
                @error('question')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="answer">Answer</label>
                <textarea id="answer" name="answer" class="form-control @error('answer') is-invalid @enderror">{{ isset($faq) ? $faq->answer : old('answer') }}</textarea>
                @error('answer')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <a href="{{ route('faq.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
    </div>
</form>

@endsection
