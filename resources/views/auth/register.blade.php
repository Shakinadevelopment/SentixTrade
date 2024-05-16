@extends('layouts.auth-master')
@section('content')

<div class="card shadow-sm w-100 p-4 p-md-5" style="max-width: 32rem;">
    <!-- Form -->
    <form class="row g-3" method="post" action="{{ route('register') }}">
        @csrf      
      <div class="col-12 text-center mb-5">
        <h1>Create account</h1>
        <span>Free access to our dashboard.</span>
      </div>
      <div class="col-12">
        <label class="form-label">Full name</label>
        <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  placeholder="Full Name" required autocomplete="name" autofocus>
      </div>
      @if ($errors->has('name'))
        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
      @endif
      <div class="col-12">
        <label class="form-label">Email address</label>
        <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="name@example.com" required autocomplete="email" autofocus>
      </div>
      @if ($errors->has('email'))
        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
      @endif
      <div class="col-12">
        <label class="form-label">Password</label>
        <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="*********" autofocus>

      </div>
      @if ($errors->has('password'))
        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
      @endif
      <div class="col-12">
        <label class="form-label">Confirm Password</label>
        <input type="password" class="form-control form-control-lg" name="password_confirmation"  required autocomplete="new-password" placeholder="*********" autofocus>
      </div>
      <div class="col-12 text-center mt-4">
        <button class="btn btn-lg btn-block btn-dark lift text-uppercase" type="submit">SIGN UP</button>
     </div>
      <div class="col-12 text-center mt-4">
        <span class="text-muted">Already have an account? <a href="{{route('login')}}">Sign in here</a></span>
      </div>
    </form>
    <!-- End Form -->
</div>

@endsection