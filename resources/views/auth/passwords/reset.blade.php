@extends('layouts.auth-master')
@section('content')

<div class="card shadow-sm w-100 p-4 p-md-5" style="max-width: 32rem;">
    <!-- Form -->
    <form class="row g-3" action="{{ route('password.update') }}" method="POST">
      @csrf
      <input type="hidden" name="token" value="{{ $token }}">
      <div class="col-12 text-center mb-5">
        <h1>Create Your New Password</h1>
        <span>Free access to our dashboard.</span>
      </div>
      <div class="col-12">
        <label class="form-label">Email address</label>
        <input type="email" class="form-control form-control-lg" name="email"  id="email_address"  placeholder="name@example.com"  required="required" autofocus>
      </div>
      @if ($errors->has('email'))
        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
      @endif
      <div class="col-12">
        <label class="form-label">Password</label>
        <input type="password" class="form-control form-control-lg"  id="password" name="password" required="required" placeholder="*********" autofocus>
      </div>
      @if ($errors->has('password'))
        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
      @endif
      <div class="col-12">
        <label class="form-label">Confirm password</label>
        <input type="password" class="form-control form-control-lg" id="password-confirm" name="password_confirmation" required="required" placeholder="*********" autofocus>
      </div>
      @if ($errors->has('password_confirmation'))
        <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
      @endif
      <div class="col-12 text-center mt-4">
        <button class="btn btn-lg btn-block btn-dark lift text-uppercase" type="submit">RESET PASSWORD</button>
     </div>
    </form>
    <!-- End Form -->
</div>
@endsection