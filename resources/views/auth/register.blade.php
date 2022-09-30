@extends('auth.layouts.main')

@section('container')
    <h1 class="auth-title">Sign Up</h1>
    <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

    <form action="/register" method="POST" class="user">
        @csrf
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="text" class="form-control form-control-xl @error('name') is-invalid @enderror" placeholder="Nama"
            id="name" name="name" value="{{ old('name') }}">
            <div class="form-control-icon">
                <i class="bi bi-person-badge"></i>
            </div>
            @error('name')
            <div class="text-danger">{{ $message }}</div>
                @enderror
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="email" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Email"
            id="email" name="email" value="{{ old('email') }}">
            <div class="form-control-icon">
                <i class="bi bi-envelope"></i>
            </div>
            @error('email')
            <div class="text-danger">{{ $message }}</div>
                @enderror
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="text" class="form-control form-control-xl @error('username') is-invalid @enderror" placeholder="Username"
            id="username" name="username" value="{{ old('username') }}">
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
            @error('username')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password"
            id="password" name="password" value="{{ old('password') }}">
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
            @error('password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
    </form>
    <div class="text-center mt-5 text-lg fs-4">
        <p class='text-gray-600'>Already have an account? <a href="/login" class="font-bold">Log
                in</a>.</p>
    </div>
@endsection
