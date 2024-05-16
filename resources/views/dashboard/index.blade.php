@extends('layouts.app-master')
@section('content')
 <!-- start: page toolbar -->
 <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
  <div class="container-fluid">
    <div class="row g-3 mb-3 align-items-center">
      <div class="col">
        <ol class="breadcrumb bg-transparent mb-0">
          <li class="breadcrumb-item"><a class="text-secondary" href="index.html">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
      </div>
    </div> <!-- .row end -->
  </div>
</div>
<!-- start: page body -->
<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
  <div class="container-fluid">
    <div class="row g-3 row-deck">
      <div class="row row-cols-xxl-5 row-cols-xxl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 g-3 mb-3 row-deck">
        <div class="col">
            <div class="card">
            <div class="card-body d-flex align-items-center">
                <div class="avatar rounded-circle no-thumbnail bg-light"><i class="fa fa-address-book fa-lg"></i></div>
                <div class="flex-fill ms-3 text-truncate">
                <div class="small text-uppercase">New Customers</div>
                <div><span class="h6 mb-0 fw-bold">925</span> <small class="text-success">+34%</small></div>
                </div>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <div class="card-body d-flex align-items-center">
                <div class="avatar rounded-circle no-thumbnail bg-light"><i class="fa fa-product-hunt fa-lg"></i></div>
                <div class="flex-fill ms-3 text-truncate">
                <div class="small text-uppercase">New Products</div>
                <div><span class="h6 mb-0 fw-bold">18</span> <small class="text-danger">-17%</small></div>
                </div>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <div class="card-body d-flex align-items-center">
                <div class="avatar rounded-circle no-thumbnail bg-light"><i class="fa fa-briefcase fa-lg"></i></div>
                <div class="flex-fill ms-3 text-truncate">
                <div class="small text-uppercase">New Leads</div>
                <div><span class="h6 mb-0 fw-bold">89</span> <small class="text-success">+8%</small></div>
                </div>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <div class="card-body d-flex align-items-center">
                <div class="avatar rounded-circle no-thumbnail bg-light"><i class="fa fa-dollar fa-lg"></i>
                </div>
                <div class="flex-fill ms-3 text-truncate">
                <div class="small text-uppercase">Today's Profit</div>
                <div><span class="h6 mb-0 fw-bold">$8,925</span> <small class="text-danger">-3%</small></div>
                </div>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <div class="card-body d-flex align-items-center">
                <div class="avatar rounded-circle no-thumbnail bg-light"><i class="fa fa-file-text fa-lg"></i></div>
                <div class="flex-fill ms-3 text-truncate">
                <div class="small text-uppercase">Contracts closed</div>
                <div><span class="h6 mb-0 fw-bold">25</span> <small class="text-danger">-12%</small></div>
                </div>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <div class="card-body d-flex align-items-center">
                <div class="avatar rounded-circle no-thumbnail bg-light"><i class="fa fa-user-plus fa-lg"></i></div>
                <div class="flex-fill ms-3 text-truncate">
                <div class="small text-uppercase">Active Client</div>
                <div><span class="h6 mb-0 fw-bold">11</span> <small class="text-danger">-4%</small></div>
                </div>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <div class="card-body d-flex align-items-center">
                <div class="avatar rounded-circle no-thumbnail bg-light"><i class="fa fa-copy fa-lg"></i></div>
                <div class="flex-fill ms-3 text-truncate">
                <div class="small text-uppercase">Running Projects</div>
                <div><span class="h6 mb-0 fw-bold">23</span> <small class="text-success">+7%</small></div>
                </div>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <div class="card-body d-flex align-items-center">
                <div class="avatar rounded-circle no-thumbnail bg-light"><i class="fa fa-user-secret fa-lg"></i></div>
                <div class="flex-fill ms-3 text-truncate">
                <div class="small text-uppercase">Active Admin</div>
                <div><span class="h6 mb-0 fw-bold">3</span></div>
                </div>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <div class="card-body d-flex align-items-center">
                <div class="avatar rounded-circle no-thumbnail bg-light"><i class="fa fa-money fa-lg"></i></div>
                <div class="flex-fill ms-3 text-truncate">
                <div class="small text-uppercase">Total Expenses</div>
                <div><span class="h6 mb-0 fw-bold">$2,908</span> <small class="text-danger">-6%</small></div>
                </div>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <div class="card-body d-flex align-items-center">
                <div class="avatar rounded-circle no-thumbnail bg-light"><i class="fa fa-money fa-lg"></i></div>
                <div class="flex-fill ms-3 text-truncate">
                <div class="small text-uppercase">Avg Contract Value</div>
                <div><span class="h6 mb-0 fw-bold">$4,580</span> <small class="text-danger">-10%</small></div>
                </div>
            </div>
            </div>
        </div>
      </div> <!-- .row end -->
      <div class="row g-2 mb-5 row-deck">
          <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
            <div class="card">
              <ul class="nav nav-tabs tab-card pt-3 " role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-bs-toggle="tab" href="#nav-BTC" id="nav_BTC" role="tab">
                    <span class="d-inline d-sm-none">
                      <img class="avatar sm me-1" src="{{asset('public/assets/img/coin/BTC.svg')}}" alt="BTC">BTC </span>
                    <span class="d-none d-sm-inline">Bitcoin</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#nav-ETC" id="nav_ETC" role="tab">
                    <span class="d-inline d-sm-none">
                      <img class="avatar sm me-1" src="{{asset('public/assets/img/coin/ETC.svg')}}" alt="BTC">ETC </span>
                    <span class="d-none d-sm-inline">Ethereum</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#nav-STL" role="tab">
                    <span class="d-inline d-sm-none">
                      <img class="avatar sm me-1" src="{{asset('public/assets/img/coin/stellar.svg')}}" alt="BTC">STL </span>
                    <span class="d-none d-sm-inline">Stellar</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#nav-XRP" role="tab">
                    <span class="d-inline d-sm-none">
                      <img class="avatar sm me-1" src="{{asset('public/assets/img/coin/XRP.svg')}}" alt="BTC">XRP </span>
                    <span class="d-none d-sm-inline">Ripple</span>
                  </a>
                </li>
              </ul>
              <div class="card-body">
                <div class="d-flex justify-content-between flex-wrap align-items-center">
                  <div class="d-none d-sm-block">
                    <div class="btn-group" role="group">
                      <input type="radio" class="btn-check" name="btn-radio" id="btn-radio1" checked="">
                      <label class="btn btn-sm btn-outline-secondary" for="btn-radio1">1M</label>
                      <input type="radio" class="btn-check" name="btn-radio" id="btn-radio2">
                      <label class="btn btn-sm btn-outline-secondary" for="btn-radio2">6M</label>
                      <input type="radio" class="btn-check" name="btn-radio" id="btn-radio3">
                      <label class="btn btn-sm btn-outline-secondary" for="btn-radio3">1Y</label>
                      <input type="radio" class="btn-check" name="btn-radio" id="btn-radio4">
                      <label class="btn btn-sm btn-outline-secondary" for="btn-radio4">YTD</label>
                    </div>
                  </div>
                  <div>
                    <span class="me-3"><span class="h5 mb-0">$3,056</span>
                      <span class="small text-danger">- 0.73 <i class="fa fa-level-down"></i></span></span>
                    <span class="me-3">
                      <span class="text-muted">High:</span>
                      <span class="small text-success">451,325</span>
                    </span>
                    <span class="me-3">
                      <span class="text-muted">Low:</span>
                      <span class="small text-danger">351,325</span>
                    </span>
                  </div>
                </div>
                <div class="tab-content mt-2">
                  <div class="tab-pane fade show active" id="nav-BTC" role="tabpanel">
                    <div id="apex-BTC"></div>
                  </div>
                  <div class="tab-pane fade" id="nav-ETC" role="tabpanel">
                    <div id="apex-ETC"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div> <!-- .row end -->
    </div> <!-- .row end -->
  </div>
</div>
@endsection