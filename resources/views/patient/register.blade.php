<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Load Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Load your custom CSS if any -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register.patient') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" id="nik" name="nik"
                                            class="form-control @error('nik') is-invalid @enderror"
                                            value="{{ isset($patient) ? $patient->nik : old('nik') }}">
                                        @error('nik')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" id="nama" name="nama"
                                            class="form-control @error('nama') is-invalid @enderror"
                                            value="{{ isset($patient) ? $patient->nama : old('nama') }}">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="date_of_birth">Date Of Birth</label>
                                        <input type="date" id="date_of_birth" name="date_of_birth"
                                            class="form-control @error('date_of_birth') is-invalid @enderror"
                                            value="{{ isset($patient) ? $patient->date_of_birth : old('date_of_birth') }}">
                                        @error('date_of_birth')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select class="form-control @error('gender') is-invalid @enderror" name="gender"
                                            id="gender">
                                            <option value="male" {{ isset($patient) && $patient->gender === 'male' ? "selected" : "" }}>Male
                                            </option>
                                            <option value="female" {{ isset($patient) && $patient->gender === 'female' ? "selected" : "" }}>Female
                                            </option>
                                        </select>
                                        @error('gender')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea id="address" name="address"
                                            class="form-control @error('address') is-invalid @enderror">{{ isset($patient) ? $patient->address : old('address') }}</textarea>
                                        @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="emergency_contact">Emergency Contact</label>
                                        <input type="text" id="emergency_contact" name="emergency_contact"
                                            class="form-control @error('emergency_contact') is-invalid @enderror"
                                            value="{{ isset($patient) ? $patient->emergency_contact : old('emergency_contact') }}">
                                        @error('emergency_contact')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <input type="hidden" name="role" value="pasien">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">{{ __('Username') }}</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="username" name="username" value="{{ old('username') }}" required
                                    autocomplete="username" autofocus>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Load Bootstrap JS and other scripts if needed -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Load your custom scripts if any -->
</body>

</html>