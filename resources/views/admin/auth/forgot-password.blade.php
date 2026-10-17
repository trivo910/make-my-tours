@extends('admin.auth.layout')
@section('title', 'Reset password')
@section('content')
    <a class="auth-mobile-brand brand" href="{{ url('/') }}"><span class="brand-mark">M</span><span>Make My Tours<small>CONTROL ROOM</small></span></a>
    <span class="eyebrow">ACCOUNT RECOVERY</span><h1>Reset your<br>password</h1><p class="auth-intro">Enter your account email and we’ll send a secure reset link.</p>
    @unless($emailConfigured)<div class="notice notice-warning">Email delivery isn’t configured yet. Ask your site administrator to complete the email setup before requesting a reset link.</div>@endunless
    @if (session('status'))<div class="notice notice-success" role="status">{{ session('status') }}</div>@endif
    <form class="form-stack" action="{{ route('admin.password.email') }}" method="post">@csrf<label class="field-label" for="email">Email address</label><input class="text-input" id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required placeholder="you@company.com">@error('email')<p class="field-error">{{ $message }}</p>@enderror<button class="button-primary" type="submit" @unless($emailConfigured)disabled title="Configure email to enable password recovery"@endunless><span>Email reset link</span><span aria-hidden="true">↗</span></button></form>
    <a class="back-link" href="{{ route('admin.login') }}">← Back to sign in</a>
@endsection
