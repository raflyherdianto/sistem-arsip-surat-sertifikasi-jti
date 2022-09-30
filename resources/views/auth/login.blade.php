@extends('auth.layouts.main')

@section('container')
            <h1 class="auth-title">Log in.</h1>
            <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

            <form action="/login" method="POST" class="user">
                @csrf
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
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class="text-gray-600">Don't have an account? <a href="/register" class="font-bold">Sign
                        up</a>.</p>
            </div>

@endsection
