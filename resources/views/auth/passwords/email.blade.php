@extends('layouts.auth-master')
@section('content')

<div class="card shadow-sm w-100 p-4 p-md-5" style="max-width: 32rem;">
    <!-- Form -->
    <form class="row g-3" action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="col-12 text-center mb-5">
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
                </div>
            @endif
        <img src="{{asset('public/assets/img/auth-password-reset.svg')}}" class="w240 mb-4" alt="" />
        <h1>Forgot password?</h1>
        <span>Enter the email address you used when you joined and we'll send you instructions to reset your password.</span>
        </div>
        <div class="col-12">
            <div class="mb-2">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control form-control-lg"  id="email_address" placeholder="name@example.com" name="email" required autofocus>
            </div>
        @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
        </div>
        <div class="col-12 text-center mt-4">
            <button class="btn btn-lg btn-block btn-dark lift text-uppercase" type="submit">SUBMIT</button>

        </div>
        <div class="col-12 text-center mt-4">
            {{-- @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif --}}
        <span class="text-muted">
            @if (Route::has('login'))
            <a class="nav-link" href="{{ route('login') }}">Back to Sign in</a>
            @endif
        </span>
        </div>
    </form>
    <!-- End Form -->
</div>

@endsection