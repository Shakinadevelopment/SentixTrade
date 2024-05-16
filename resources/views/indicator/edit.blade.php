@extends('layouts.app-master')

@section('content')

<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
  <div class="container">
    <div class="row g-3 mb-3 align-items-center">
      <div class="col">
        <ol class="breadcrumb bg-transparent mb-0">
          <li class="breadcrumb-item"><a class="text-secondary" href="{{route('indicator.index')}}">Indicators</a></li>
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
            <h6 class="card-title m-0"> Add Indicators</h6>
            <div class="dropdown morphing scale-left">
              <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
             
            </div>
          </div>
          <div class="card-body">
              <form action="{{ route('indicator.update', $indicators->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                @method('PUT')
              <div class="row g-3">
                <div class="col-sm-4">
                  <label class="form-label">Book Title</label>
                  <input type="text" class="form-control form-control-lg"   value="{{$indicators->title}}" name="title" placeholder="Title" required>
                </div>
                @error('title')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <div class="col-sm-4">
                  <label class="form-label">Book Link</label>
                  <input type="text" class="form-control form-control-lg"  value="{{$indicators->link}}" name="link" placeholder="Link" required>
                </div>
                @error('link')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <div class="col-sm-4">
                  <label class="form-label">Book Price</label>
                  <input type="text" class="form-control form-control-lg" name="price"  value="{{$indicators->price}}" placeholder="RM12.29" required>
                </div>
                @error('price')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <div class="col-sm-4">
                  <label class="form-label">Book Brand</label>
                  <input type="text" class="form-control form-control-lg" name="brand"   value="{{$indicators->brand}}" placeholder="Brand" required>
                </div>
                @error('brand')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <div class="col-sm-4">
                  <label class="form-label">Book Manufacture</label>
                  <input type="text" class="form-control form-control-lg" name="manufacture"   value="{{$indicators->manufacture}}" placeholder="Manufacture" required>
                </div>
                @error('manufacture')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
               
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <label class="form-label">Upload Product Image</label>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    @foreach(json_decode($indicators->image_path) as $image)
                      <div class="image-item">
                        <a href="{{ asset($image) }}" data-fancybox="gallery">
                          <img src="{{ asset($image) }}" alt="Image" style="height: 150px">
                        </a>
                        <input type="hidden" name="existing_images[]" value="{{ $image }}">
                        <button type="button" class="remove-image-btn" data-image="{{ $image }}">Remove</button>
                      </div>
                    @endforeach      
                    <br>
                    <input type="hidden" name="deleted_images[]" id="deleted-images">
                    <!-- File input for new images -->
                    <input type="file" name="images[]" id="imageUpload"  multiple>
                    <div id="preview" class="mt-3"></div>  
                  </div>
                  @error('images')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-sm-12">
                  <label class="form-label">Product Description</label>
                  <textarea class="summernote" name="description" required>{{$indicators->description}}</textarea>
                </div>
                @error('description')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <label class="form-label">Related</label>
                    <select class="form-control show-tick ms select2" name="related[]" id="id_select2_example" multiple data-placeholder="Please Choose Related Book">
                        @if(!empty($allIndicators->related))
                            @foreach(explode(',', $indicators->related) as $relatedItemId)
                            @php
                                $relatedItem = \App\Models\Indicator::find($relatedItemId);
                            @endphp
                            @foreach($allIndicators as $item)
                            @if($relatedItem)
                                <li class="list-group-item d-flex px-0">
                                    <div class="flex-fill ms-3">
                                    <h6 class="mb-0"><strong class="d-block"><a href="{{ route('i.show', $relatedItem->slug) }}">{{$relatedItem->title }}</a></strong></h6>
                                    
                                    </div>
                                </li>
                                @endif
                            @endforeach
                            {{-- Check if $selectedIndicators contains the current item --}}
                            <option value="{{ $item->id }}" {{ $isSelected ? 'selected' : '' }} data-img_src="{{ asset('public/uploads/indicators/' . $item->photo) }}">
                                {{ $item->name }}
                            </option
                            @endforeach
                        @endif


                    </select>
                </div>
                @error('related')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
              </div>
          </div>
          <div class="card-footer text-md-end">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{route('indicator.index')}}" class="btn btn-secondary">Cancel</a>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@push('js')
@endpush
@endsection