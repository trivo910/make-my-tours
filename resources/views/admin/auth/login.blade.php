@extends('admin.auth.layout')
@section('title', 'Sign in')
@section('content')
    <a class="auth-mobile-brand brand" href="{{ url('/') }}"><span class="brand-mark">M</span><span>Make My Tours<small>CONTROL ROOM</small></span></a>
    <span class="eyebrow">WELCOME BACK</span><h1>Sign in to your<br>workspace</h1><p class="auth-intro">Use your administrator account to continue.</p>
    @if (session('status')) <div class="notice notice-success" role="status">{{ session('status') }}</div> @endif
    <form class="form-stack" action="{{ route('admin.login.store') }}" method="post">@csrf
        <label class="field-label" for="email">Email address</label><input class="text-input" id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="username" required autofocus placeholder="you@company.com">@error('email')<p class="field-error" role="alert">{{ $message }}</p>@enderror
        <div class="password-label"><label class="field-label" for="password">Password</label><a href="{{ route('admin.password.request') }}">Forgot password?</a></div>
        <div class="password-wrap"><input class="text-input" id="password" name="password" type="password" autocomplete="current-password" required placeholder="Enter your password"><button class="show-password" type="button" data-password-toggle="password" aria-label="Show password">Show</button></div>
        @error('password')<p class="field-error" role="alert">{{ $message }}</p>@enderror
        <label class="check-row"><input type="checkbox" name="remember" value="1"><span>Keep me signed in</span></label>
        <button class="button-primary" type="submit"><span>Sign in</span><span aria-hidden="true">↗</span></button>
    </form>
    <p class="auth-footnote"><span class="lock-icon">▣</span> Protected admin access · Secure session</p>
@endsection
