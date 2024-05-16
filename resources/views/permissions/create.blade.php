@extends('layouts.app-master')

@section('content')

<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
  <div class="container">
    <div class="row g-3 mb-3 align-items-center">
      <div class="col">
        <ol class="breadcrumb bg-transparent mb-0">
          <li class="breadcrumb-item"><a class="text-secondary" href="{{route('permissions.index')}}">Permission Management</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
  <div class="container-fluid">
    <div class="row g-3">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h6 class="card-title m-0">Add Permission</h6>
            <div class="dropdown morphing scale-left">
              <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
             
            </div>
          </div>
          <div class="card-body">

            <form method="POST" action="{{ route('permissions.store') }}"  class="row g-3 justify-content-center">
                @csrf
                <div class="col-lg-8 col-md-8 col-sm-8 ">
                  <label for="name" class="form-label">Permission Name</label>
                  <fieldset class="form-icon-group left-icon position-relative">
                    <input value="{{ old('name') }}"  type="text" class="form-control"  name="name"  placeholder="Name" required>
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

                <div class="card-footer text-md-end">
                  <button type="submit" class="btn btn-primary">Add</button>
                  <a href="{{route('permissions.index')}}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection