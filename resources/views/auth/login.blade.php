@extends('layouts.auth-master')
@section('content')

<div class="card shadow-sm w-100 p-4 p-md-5" style="max-width: 32rem;">
    <!-- Form -->
    <form class="row g-3" method="post" action="{{ route('login') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="col-12 text-center mb-5">
        <h1>Sign in</h1>
        @include('layouts.partials.messages')
        <span class="text-muted">Free access to our dashboard.</span>
        </div>
        <div class="col-12 text-center mb-4 d-none">
        <a class="btn btn-lg btn-outline-secondary btn-block" href="#">
            <span class="d-flex justify-content-center align-items-center">
            <img class="avatar xs me-2" src="{{asset('public/assets/img/google.svg')}}" alt="Image Description"> Sign in with Google </span>
        </a>
        <span class="dividers text-muted mt-4">OR</span>
        </div>
        <div class="col-12">
            <div class="mb-2">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control form-control-lg" placeholder="name@example.com"  name="email" value="{{ old('email') }}" required="required" autofocus>
            </div>
            {{-- @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif --}}
        </div>
        <div class="col-12">
            <div class="mb-2">
                <div class="form-label">
                  <span class="d-flex justify-content-between align-items-center"> Password 
                    @if (Route::has('password.request'))
                        <a class="text-primary" href="{{ route('password.request') }}">Forgot Password?
                        </a>
                    @endif
                  </span>
                </div>
                <input type="password" class="form-control form-control-lg"  id="password" name="password" required="required" placeholder="*********"  value="{{ old('password') }}" autofocus>
              </div>
            {{-- @if ($errors->has('password'))
            <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif --}}
        </div>
        <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault"> Remember me </label>
        </div>
        </div>
        <div class="col-12 text-center mt-4">
            <button class="btn btn-lg btn-block btn-dark lift text-uppercase" type="submit">Sign in</button>
        </div>
        <div class="col-12 text-center mt-4">
        <span class="text-muted">Don't have an account yet? 
            @if (Route::has('register'))
                <a class="nav-link" href="{{ route('register') }}">Sign up here</a>
            @endif
        </div>
        @include('auth.partials.copy')
    </form>
    <!-- End Form -->
</div>
@endsection