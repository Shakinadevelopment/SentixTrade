@extends('layouts.app-master')

<style>
.preview-image img
{
  padding: 10px;
  max-width: 100px;
}
</style>
@section('content')

<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
  <div class="container">
    <div class="row g-3 mb-3 align-items-center">
      <div class="col">
        <ol class="breadcrumb bg-transparent mb-0">
          <li class="breadcrumb-item"><a class="text-secondary" href="{{route('indicator.index')}}">Indicator</a></li>
          <li class="breadcrumb-item"><a class="text-secondary" href="{{route('indicator.index')}}">List</a></li>
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
            <h6 class="card-title m-0"> Add Indicator</h6>
            <div class="dropdown morphing scale-left">
              <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
             
            </div>
          </div>
          <div class="card-body">
            <form action="{{ route('indicator.store') }}" method="post" enctype="multipart/form-data"  class="row g-3">
              @csrf
              <div class="row g-3">
                <div class="col-sm-4">
                  <label class="form-label">Book Title</label>
                  <input type="text" class="form-control form-control-lg" name="title" placeholder="Title" required>
                </div>
                @error('title')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <div class="col-sm-4">
                  <label class="form-label">Book Link</label>
                  <input type="text" class="form-control form-control-lg" name="link" placeholder="Link" required>
                </div>
                @error('link')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <div class="col-sm-4">
                  <label class="form-label">Book Price</label>
                  <input type="text" class="form-control form-control-lg"  name="price" placeholder="RM12.29" required>
                </div>
                @error('price')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <div class="col-sm-4">
                  <label class="form-label">Book Brand</label>
                  <input type="text" class="form-control form-control-lg" name="brand" placeholder="Brand" required>
                </div>
                @error('brand')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <div class="col-sm-4">
                  <label class="form-label">Book Manufacture</label>
                  <input type="text" class="form-control form-control-lg" name="manufacture" placeholder="Manufacture" required>
                </div>
                @error('manufacture')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <div class="col-sm-12">
                  <label class="form-label">Upload Photo</label>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="file" name="images[]" id="imageUpload" multiple required>
                    <div id="preview" class="mt-3"></div>  
                  </div>
                  @error('images')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-sm-12">
                  <label class="form-label">Book Description</label>
                  <textarea class="summernote" name="description" placeholder="Please enter product description..." required></textarea>
                </div>
                @error('description')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                {{-- <div class="col-lg-12 col-md-12 col-sm-12">
                  <label class="form-label">Related Book</label>
                  <select class="form-control show-tick ms select2" name="related[]" id="id_select2_example" multiple data-placeholder="Please Choose Related Book">
                    @foreach($indicators as $indicator)
                      @foreach(json_decode($indicator->image_path) as $key)
                        @if($key == 0)
                          <option value="{{ $indicator->id }}">{{ $indicator->title }}</option>
                        @endif
                      @endforeach
                    @endforeach
                  </select>
                </div> --}}
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <label class="form-label">Related Book</label>
                    <select class="form-control show-tick ms select2" name="related[]" multiple data-placeholder="Please Choose Related Book">
                      @foreach($indicators as $indicator)
                        <option value="{{ $indicator->id }}">{{ $indicator->title }}</option>
                      @endforeach
                  </select>
                </div>
                @error('related')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
              </div>
          </div>
          <div class="card-footer text-md-end">
            <button type="submit" class="btn btn-primary">Add</button>
            <a href="{{route('indicator.index')}}" class="btn btn-secondary">Cancel</a>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
