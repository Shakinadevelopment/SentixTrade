@extends('layouts.app-master')

@section('content')

<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
  <div class="container">
    <div class="row g-3 mb-3 align-items-center">
      <div class="col">
        <ol class="breadcrumb bg-transparent mb-0">
          <li class="breadcrumb-item"><a class="text-secondary" href="{{route('roles.index')}}">Roles Management</a></li>
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
            <h6 class="card-title m-0">Add Roles</h6>
            <div class="dropdown morphing scale-left">
              <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
             
            </div>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('roles.update', $role->id) }}" class="row g-3 justify-content-center">
                @method('patch')
                @csrf
              <div class="col-lg-8 col-md-6 col-sm-6">
                <label class="form-label">Role Name</label>
                <fieldset class="form-icon-group left-icon position-relative">
                  <input value="{{ $role->name }}"  type="text" class="form-control"  name="name"  placeholder="Name" readonly>
                  <div class="form-icon position-absolute">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                    </svg>
                  </div>
                </fieldset>
              </div>
              <div class="col-lg-8 col-md-6 col-sm-6">
                <label class="form-label">Assign Permission</label>
                <br>

              <table class="table table-striped">
                  <thead>
                      <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                      <th scope="col" width="20%">Name</th>
                      <th scope="col" width="1%">Guard</th> 
                  </thead>

                  @foreach($permissions as $permission)
                      <tr>
                          <td>
                              <input type="checkbox" 
                              name="permission[{{ $permission->name }}]"
                              value="{{ $permission->name }}"
                              class='permission'
                              {{ in_array($permission->name, $rolePermissions) 
                                  ? 'checked'
                                  : '' }}>
                          </td>
                          <td>{{ $permission->name }}</td>
                          <td>{{ $permission->guard_name }}</td>
                      </tr>
                  @endforeach
              </table>
              </div>
              <div class="col-lg-8 col-md-6 col-sm-6 text-md-end">
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{route('roles.index')}}" class="btn btn-outline-secondary">Back</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('[name="all_permission"]').on('click', function() {

            if($(this).is(':checked')) {
                $.each($('.permission'), function() {
                    $(this).prop('checked',true);
                });
            } else {
                $.each($('.permission'), function() {
                    $(this).prop('checked',false);
                });
            }

        });
    });
</script>
@endsection