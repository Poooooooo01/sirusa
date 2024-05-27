@extends('layouts.sidebar')
@section('container')

<form method="post" action="{{ isset($user) ? route('useradmin.update', $user->id) : route('useradmin.store') }}" autocomplete="off">
    @csrf
    @if (isset($user))
        @method('put')
    @endif

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                       value="{{ isset($user) ? $user->email : old('email') }}">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" 
                       value="{{ isset($user) ? $user->username : old('username') }}">
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control @error('role') is-invalid @enderror" name="role" id="role">
                    <option value="admin" {{ isset($user) && $user->role === 'admin' ? "selected" : "" }}>Admin</option>
                    <option value="superadmin" {{ isset($user) && $user->role === 'superadmin' ? "selected" : "" }}>SuperAdmin</option>
                </select>
                @error('role')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
            <a href="{{ route('useradmin.index') }}" class="btn btn-sm btn-secondary">Back</a>
        </div>
    </div>
</form>

@endsection
