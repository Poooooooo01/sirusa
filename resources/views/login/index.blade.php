<!-- resources/views/login/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('gaya/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Login Sebagai</h2>
        <div class="row justify-content-center mt-4">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Super Admin</h5>
                        <p class="card-text">Login sebagai admin untuk mengelola sistem.</p>
                        <a href="{{ URL::to('login/admin') }}" class="btn btn-primary">Login Admin</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Pasien</h5>
                        <p class="card-text">Login sebagai pasien untuk mengakses layanan kesehatan.</p>
                        <a href="{{ URL::to('login/patient') }}" class="btn btn-primary">Login Pasien</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Dokter</h5>
                        <p class="card-text">Login sebagai dokter untuk mengakses sistem medis.</p>
                        <a href="#" class="btn btn-primary">Login Dokter</a>
                    </div>
                </div>
            </div>
        </div>
        
        <a href="{{ URL::to('/') }}" class="btn btn-secondary back-btn">Kembali</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.amazonaws.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('gaya/script.js') }}"></script>
</body>
</html>
