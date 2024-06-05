@extends('layouts.sidebar')
@section('container')

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" class="form-control" 
            value="{{ $user->email }}" readonly>
        </div>
        <div class="form-group">
            <label for="name">Username</label>
            <input type="text" id="username" name="username" class="form-control" 
            value="{{ $user->username }}" readonly>
        </div>
        <div class="form-group">
            <label for="name">Role</label>
            <input type="text" id="role" name="role" class="form-control" 
            value="{{ $user->role }}" readonly>
        </div>
        <a href="{{ route('useradmin.index') }}" class="btn btn-sm btn-secondary">Back</a>
    </div>
</div>

@endsection
