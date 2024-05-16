@extends('layouts.app-master')
@section('content')

<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
  <div class="container">
    <div class="row g-3 mb-3 align-items-center">
      <div class="col">
        <ol class="breadcrumb bg-transparent mb-0">
          <li class="breadcrumb-item"><a class="text-secondary" href="{{route('users.index')}}">Account</a></li>
          <li class="breadcrumb-item"><a class="text-secondary" href="{{route('users.index')}}">User Management</a></li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
  <div class="container">
    <div class="row g-3">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h6 class="card-title mb-0">Admin Information</h6>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('users.update', $user->id) }}" class="row g-3 justify-content-center">
                @method('patch')
                @csrf
              <div class="col-lg-8 col-md-6 col-sm-6">
                <label class="form-label">Full Name</label>
                <fieldset class="form-icon-group left-icon position-relative">
                  <input value="{{ $user->name }}"  type="text"   class="form-control"  name="name"   placeholder="Name" required readonly>
                  <div class="form-icon position-absolute">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                    </svg>
                  </div>
                </fieldset>
                @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
              </div>
              <div class="col-lg-8 col-md-6 col-sm-6">
                <label class="form-label">Email Address</label>
                <fieldset class="form-icon-group left-icon position-relative">
                  <input value="{{ $user->email }}" type="email"  class="form-control"  name="email" placeholder="Email address" required readonly>
                  <div class="form-icon position-absolute">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                      <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                    </svg>
                  </div>
                </fieldset>
                @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
              </div>
              <div class="col-lg-8 col-md-6 col-sm-6">
                <label class="form-label">Roles</label>
                <fieldset class="form-icon-group left-icon position-relative">
                    <select class="form-control" name="role" required><option value="">Select role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}"
                                {{ in_array($role->name, $userRole) 
                                    ? 'selected'
                                    : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                  <div class="form-icon position-absolute">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                    </svg>
                  </div>
                </fieldset>
                @if ($errors->has('role'))
                    <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                @endif
              </div>
              <div class="col-lg-8 col-md-6 col-sm-6 text-md-end">
                <button class="btn btn-primary" type="submit">Update User</button>
                <a href="{{route('users.index')}}" class="btn btn-outline-secondary">Back</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@push('js')
@endpush
@endsection