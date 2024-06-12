<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>
</head>
<body>
    <h1>Email Verification</h1>
    <p>Terima kasih telah mendaftar. Silakan klik link di bawah ini untuk memverifikasi alamat email Anda:</p>
    <a href="{{ route('verify.email', $token) }}">Verifikasi Email</a>
</body>
</html>
