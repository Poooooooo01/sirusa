@extends('layouts.doctor')

@section('container')
<style>
    /* Set maximum height for the messages container and enable scrolling */
    .messages-container {
        max-height: 240px; /* This height will show approximately 6 messages at a time */
        overflow-y: auto;
        border: 1px solid #ddd; /* Optional: border for better visualization */
        padding: 10px;
        margin-bottom: 20px;
    }

    /* Style for individual messages */
    .message {
        padding: 10px;
        margin: 5px 0;
        border-radius: 5px;
        max-width: 70%;
        position: relative; /* For positioning the timestamp and checkmark */
    }

    /* Style for messages sent by the doctor */
    .message-doctor {
        background-color: #d1e7dd; /* Light green */
        text-align: right;
        margin-left: auto; /* Align to the right */
    }

    /* Style for messages sent by the patient */
    .message-patient {
        background-color: #f8d7da; /* Light red */
        text-align: left;
        margin-right: auto; /* Align to the left */
    }

    /* Style for the timestamp */
    .timestamp {
        display: block;
        font-size: 0.8em;
        color: #888;
        margin-top: 5px;
    }

    /* Style for the checkmark */
    .checkmark {
        font-size: 1em;
        color: #28a745; /* Green color */
        position: absolute;
        right: 10px;
        bottom: 10px;
    }

    /* Adjust position for messages and timestamp */
    .message-doctor .timestamp {
        margin-right: 25px; /* Space for checkmark */
    }

    .message-patient .timestamp {
        margin-left: 0; /* No need for extra space */
    }
</style>
<div class="container">
    @if($consultation)
        <h1>Chat with Patient {{ $consultation->patient->nama }}</h1>
    @endif

    <div class="messages-container">
        <div class="messages">
            @foreach($messages as $message)
                <div class="message {{ $message->sender == 'doctor' ? 'message-doctor' : 'message-patient' }}">
                    <strong>{{ ucfirst($message->sender) }}:</strong> {{ $message->message }}
                    <span class="timestamp">{{ $message->created_at->format('h:i A, M d') }}</span>
                    @if($message->sender == 'doctor')
                        <span class="checkmark">&#10003;</span> <!-- Checkmark symbol -->
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <form action="{{ route('conversationdoctor.store') }}" method="POST">
        @csrf
        <input type="hidden" name="consultation_id" value="{{ $consultation_id }}">
        <input type="hidden" name="sender" value="doctor">
        <textarea name="message" class="form-control" placeholder="Type your message"></textarea>
        <button type="submit" class="btn btn-primary mt-2">Send</button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var messagesContainer = document.querySelector('.messages-container');
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    });
</script>
@endsection
