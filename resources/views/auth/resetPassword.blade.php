<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
</head>
<body>
    @if (session('error'))
        <div>{{ session('error') }}</div>
    @endif
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <form action="{{ route('resetpassword') }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="email" name="email" placeholder="Enter your email" required>
        <input type="password" name="password" placeholder="Enter your new password" required>
        <input type="password" name="password_confirmation" placeholder="Confirm your new password" required>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
