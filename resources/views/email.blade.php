<!-- resources/views/auth/passwords/email.blade.php -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <form action="{{ route('password.email') }}" method="post">
        @csrf
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Send Password Reset Link</button>
    </form>
</body>
</html>
