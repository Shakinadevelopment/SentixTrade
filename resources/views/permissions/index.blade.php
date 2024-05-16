@extends('layouts.app-master')
@section('content')

<style>
    label {
    display: block;
}
</style>
 <!-- start: page toolbar -->
<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
  <div class="container">
    <div class="row g-3 mb-3 align-items-center">
      <div class="col">
        <ol class="breadcrumb bg-transparent mb-0">
          <li class="breadcrumb-item"><a class="text-secondary" href="">Permission Management</a></li>
          <li class="breadcrumb-item active" aria-current="page">List</li>
        </ol>
      </div>
      {{-- <div class="col text-md-end">
        <a class="btn btn-primary" href="{{ route('permissions.create') }}"><i class="fa fa-plus me-2"></i>Add New Permissions</a>
      </div> --}}
    </div>
  </div>
</div>
<!-- start: page body -->
<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
  <div class="container">
    <div class="row g-2 clearfix">
      <div class="col-12">
        @if(session('success'))
            <div class="alert alert-success" id="successMessage">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
          <div class="card-header">
            <h6 class="card-title mb-0">Permissions Management</h6>
          </div>
          <div class="card-body">
            <p class="fs-6">This is permission management where only Superadmin can add multiple permission for full control access</p>
          </div>
        </div>
      </div>
      <div class="col-md-12 mt-4">
        <div class="card">
          <div class="card-body">
            <table class="myDataTable table table-hover align-middle mb-0">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Permission Name</th>
                    <th width="280px">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($permissions as $key => $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>
                        @can('permissions.edit')
                        <a href="{{ route('permissions.edit', $permission->id) }}"><button class="btn btn-sm btn-success">
                            <i class="fa fa-pencil"></i></button></a>
                        @endcan
                        @can('permissions.destroy')
                        <form method="POST" action="{{ route('permissions.destroy', $permission->id) }}" style="display:inline">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger confirm-button"><i class="fa fa-trash"></i></button>
                        </form>
                        @endcan
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div> <!-- .row end -->
  </div>
</div>

@endsection