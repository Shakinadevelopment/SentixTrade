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
          <li class="breadcrumb-item"><a class="text-secondary" href="">Indicator</a></li>
          <li class="breadcrumb-item active" aria-current="page">List</li>
        </ol>
      </div>
      <div class="col text-md-end">
        <a class="btn btn-primary" href="{{route('indicator.create')}}"><i class="fa fa-plus me-2"></i>Add New Indicator</a>
      </div>
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
            <h6 class="card-title mb-0">Indicators</h6>
          </div>
          <div class="card-body">
            <p class="fs-6">This is user management where only Superadmin can add multiple admin for full control access</p>
          </div>
        </div>
      </div>
      <div class="col-md-12 mt-4">
        <div class="card">
          {{-- <div class="card-header">
            <h6 class="card-title mb-0">Recent Transactions</h6>
            <div class="dropdown morphing scale-left">
              <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
            
            </div>
          </div> --}}
          <div class="card-body">
            <table class="myDataTable table table-hover align-middle mb-0">
              <thead>
                <tr>
                  <th>#</th>
                  {{-- <th>Photo</th> --}}
                  <th>Title</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($indicators as $indicator)
                <tr>
                    <td>{{ $indicator->id }}</td>
                    {{-- @foreach(json_decode($indicators->image_path) as $key => $imagePath)
                      @if($key == 0)
                        <div class="item">
                          <td><img src="{{ asset($imagePath) }}" alt="" style="height: 200px;" class="img-fluid img-thumbnail"></td>
                        </div>
                      @endif
                    @endforeach --}}
                    {{-- @if($indicator->image_path)
                      @foreach(json_decode($indicator->image_path) as $imagePath)
                        <td><img src="{{ asset($imagePath) }}" alt="Image"></td>
                      @endforeach
                    @else
                      <td>No images</td>
                    @endif --}}

                    <td>{{ $indicator->title }}</td>
                    <td>
                        <a href="{{ route('indicator.show', $indicator->slug) }}"><button class="btn btn-sm btn-primary">
                          <i class="fa fa-eye"></i></button></a>

                          <a href="{{ route('indicator.edit', $indicator->id) }}"><button class="btn btn-sm btn-success">
                            <i class="fa fa-pencil"></i></button></a>
                   
                      <form method="POST" action="{{ route('indicator.destroy', $indicator->id) }}" style="display:inline">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-sm btn-danger confirm-button"><i class="fa fa-trash"></i></button>
                      </form>
                  </td>
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