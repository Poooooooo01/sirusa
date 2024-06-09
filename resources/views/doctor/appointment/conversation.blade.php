@extends('layouts.doctor')

@section('container')
    <div class="container">
        @if($consultation)
            <h1>Chat with Patient {{ $consultation->patient->nama }}</h1>
        @endif

        <div class="messages">
            @foreach($messages as $message)
                <div class="message">
                    <strong>{{ $message->sender }}:</strong> {{ $message->message }}
                </div>
            @endforeach
        </div>

        <form action="{{ route('conversationdoctor.store') }}" method="POST">
            @csrf
            <input type="hidden" name="consultation_id" value="{{ $consultation_id }}">
            <input type="hidden" name="sender" value="doctor">
            <textarea name="message" class="form-control" placeholder="Type your message"></textarea>
            <button type="submit" class="btn btn-primary mt-2">Send</button>
        </form>
    </div>
@endsection
