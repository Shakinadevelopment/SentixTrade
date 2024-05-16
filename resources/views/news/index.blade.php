@extends('layouts.app-master')
@section('content')

<style>
  label {
  display: block;
}
</style>

<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
    <div class="container-fluid">
        <div class="row g-3 mb-3 align-items-center">
        <div class="col">
            <ol class="breadcrumb bg-transparent mb-0">
            <li class="breadcrumb-item"><a class="text-secondary" href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">News calendar</li>
            </ol>
        </div>
        </div> <!-- .row end -->
    </div>
</div>
<!-- start: page body -->
<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
    <div class="container-fluid">
        <div class="row g-2 mb-5 row-deck">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between flex-wrap align-items-center">
                    <div id="economicCalendarWidget" height="2200px" ></div>
               
                  </div>
                </div>
              </div>
            </div>
            
          </div> <!-- .row end -->
       
    </div>
</div>
@endsection

