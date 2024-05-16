@extends('layouts.app-master')
@section('content')

<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
  <div class="container-fluid">
    <div class="row g-3 mb-3 align-items-center">
      <div class="col">
        <ol class="breadcrumb bg-transparent mb-0">
          <li class="breadcrumb-item"><a class="text-secondary" href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a class="text-secondary" href="#">Account</a></li>
          <li class="breadcrumb-item active" aria-current="page">Settings</li>
        </ol>
      </div>
    </div> <!-- .row end -->
  </div>
</div>
<!-- start: page body -->
<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
  <div class="container-fluid">
    <div class="row g-3">
      <div class="col-xxl-3 col-lg-4 col-md-4">
        <div class="list-group list-group-custom sticky-top me-xl-4" style="top: 100px;">
          <a class="list-group-item list-group-item-action" href="#list-item-1">Profile Details</a>
          <a class="list-group-item list-group-item-action" href="#list-item-2">Change Password</a>
          <a class="list-group-item list-group-item-action" href="#list-item-3">Notifications Settings</a>
          <a class="list-group-item list-group-item-action" href="#list-item-4">Social Profiles</a>
        </div>
      </div>
      <div class="col-xxl-8 col-lg-8 col-md-8">
        <div id="list-item-1" class="card fieldset border border-muted mt-0">
          <!-- form: profile details -->
          <span class="fieldset-tile text-muted bg-body">Profile Details:</span>
          <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                </div>
                <div class="row mb-3">
                  <label class="col-md-3 col-sm-4 col-form-label">Full Name </label>
                  <div class="col-md-8 col-sm-4">
                    <label class="col-md-10 col-sm-4 col-form-label">{{ $user->name }}</label>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-md-3 col-sm-4 col-form-label">Email Address</label>
                  <div class="col-md-8 col-sm-4">
                    <label class="col-md-10 col-sm-4 col-form-label">{{ $user->email }}</label>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <div id="list-item-2" class="card fieldset border border-muted mt-5">
          <!-- form: Change Password -->
          <span class="fieldset-tile text-muted bg-body">Change Password</span>
          <div class="card">
            {{-- <form method="POST" action="{{ route('changePasswordPost') }}">
                @csrf --}}
            <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                @csrf
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <h6 class="pt-2 mt-2 mb-3">Change Password</h6>
                            <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }} mb-3">
                                {{-- <input id="current-password" type="password" class="form-control form-control-lg" placeholder="Current Password" name="current-password" required> --}}
                                <input type="password" name="current_password" class="form-control form-control-lg @error('current_password') is-invalid @enderror" required placeholder="Enter current password">
                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               
                            </div>
                             <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }} mb-1 ">
                                {{-- <input id="new-password" type="password" class="form-control form-control-lg" placeholder="New Password" name="new-password" required> --}}
                                <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" required
                                        placeholder="Enter the new password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                   
                                    @enderror
                                
                                <span class="text-muted small">Minimum 8 characters</span>
                             
                            </div>
                            <div>
                                {{-- <input id="new-password-confirm" type="password" class="form-control form-control-lg" name="new-password_confirmation" placeholder="Confirm New Password"  required> --}}
                                <input type="password" name="confirm_password" class="form-control form-control-lg @error('confirm_password') is-invalid @enderror"required placeholder="Enter same password">
                                @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-lg btn-light me-2" type="reset">Discard</button>
                    <button class="btn btn-lg btn-primary" type="submit">Save Changes</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection