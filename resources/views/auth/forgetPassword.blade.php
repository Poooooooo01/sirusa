<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forget Password</title>
</head>
<body>
    @if (session('error'))
        <div>{{ session('error') }}</div>
    @endif
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <form action="{{ route('forgetpassword') }}" method="post">
        @csrf
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Send Password Reset Link</button>
    </form>
</body>
</html>
