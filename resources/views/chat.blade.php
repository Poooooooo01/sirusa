<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Chat with our bot</h1>
    <!-- Bottom Chat Area -->
<div id="bottom-chat">
    <div id="messages"></div>
    <input type="text" id="user-message" placeholder="Type your message...">
    <button id="send-message">Send</button>
</div>
<!-- End Bottom Chat Area -->

<script>
    $(document).ready(function () {
        // Toggle sidebar
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

        // Toggle chat area
        $('#btn-chat').on('click', function () {
            $('#bottom-chat').toggle();
        });

        // Send message
        $('#send-message').click(function () {
            var message = $('#user-message').val();

            if (message.trim() !== '') {
                $.ajax({
                    url: '/chat',
                    method: 'POST',
                    contentType: 'application/json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: JSON.stringify({ message: message }),
                    success: function (response) {
                        $('#messages').append('<div>User: ' + message + '</div>');
                        $('#messages').append('<div>Bot: ' + response.message + '</div>');
                        $('#user-message').val('');
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                    }
                });
            } else {
                console.log('Message is empty');
            }
        });
    });
</script>

</body>
</html>
