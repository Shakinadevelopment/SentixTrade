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
          <a class="list-group-item list-group-item-action" href="#list-item-3">Download Settings</a>
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
            @if (session('error'))
              <div class="alert alert-danger">
                {{ session('error') }}
              </div>
            @endif
            @if (session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif
            @if($errors)
              @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
              @endforeach
            @endif
            <form class="form-horizontal" method="POST" action="{{ route('changePasswordPost') }}">
                @csrf
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <h6 class="pt-2 mt-2 mb-3">Change Password</h6>
                            <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }} mb-3">
                                <input id="current-password" type="password" class="form-control form-control-lg" name="current-password" placeholder="Current Password" required>
                                @if ($errors->has('current-password'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('current-password') }}</strong>
                                  </span>
                                @endif
                            </div>
                             <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }} mb-1 ">
                                <input id="new-password" type="password" class="form-control form-control-lg" name="new-password"  placeholder="New Password"  required>
                                @if ($errors->has('new-password'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('new-password') }}</strong>
                                  </span>
                                @endif
                              <span class="text-muted small">Minimum 8 characters</span>
                             
                            </div>
                            <div>
                                <input id="new-password-confirm" type="password" class="form-control form-control-lg" name="new-password_confirmation" placeholder="Enter same password" required>
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
        <div id="list-item-3" class="card fieldset border border-muted mt-5">
          <!-- form: Notifications Settings -->
          <span class="fieldset-tile text-muted bg-body">Download Settings</span>
          <div class="card">
            <div class="card-body table-responsive">
              <table class="table card-table mb-0">
                <tbody>
                  <tr>
                    <td class="text-muted">Email Notifications</td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="n_email1" checked>
                        <label class="form-check-label" for="n_email1">Email</label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="n_phone1" checked>
                        <label class="form-check-label" for="n_phone1">Phone</label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-muted">Billing Updates</td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="n_email2">
                        <label class="form-check-label" for="n_email2">Email</label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="n_phone2">
                        <label class="form-check-label" for="n_phone2">Phone</label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-muted">New Team Members</td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="n_email3">
                        <label class="form-check-label" for="n_email3">Email</label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="n_phone3">
                        <label class="form-check-label" for="n_phone3">Phone</label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-muted">Projects Complete</td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="n_email4">
                        <label class="form-check-label" for="n_email4">Email</label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="n_phone4" checked>
                        <label class="form-check-label" for="n_phone4">Phone</label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-muted">Newsletters</td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="n_email5">
                        <label class="form-check-label" for="n_email5">Email</label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="n_phone5" checked>
                        <label class="form-check-label" for="n_phone5">Phone</label>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="card-footer text-end">
              <button class="btn btn-lg btn-light me-2" type="reset">Discard</button>
              <button class="btn btn-lg btn-primary" type="submit">Save Changes</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection