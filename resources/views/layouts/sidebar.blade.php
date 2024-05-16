<div class="sidebar p-2 py-md-3 @@cardClass">
    <div class="container-fluid">
      <!-- sidebar: title-->
      <div class="title-text d-flex align-items-center mb-4 mt-1">
        <h4 class="sidebar-title mb-0 flex-grow-1">
          <span class="sm-txt">SentiXTrade</span>
        </h4>
        <div class="dropdown morphing scale-left">
          <a class="dropdown-toggle more-icon" href="#" role="button" data-bs-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
          <ul class="dropdown-menu shadow border-0 p-2 mt-2" data-bs-popper="none">
            <li class="fw-bold px-2">Quick Actions</li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="../landing/index.html" aria-current="page">Homepage</a></li>
          </ul>
        </div>
      </div>
    
      <!-- sidebar: menu list -->
      <div class="main-menu flex-grow-1">
        <ul class="menu-list">
          <li>
            <a class="m-link" href="{{route('dashboard')}}">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                <path class="fill-secondary" fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
              </svg>
              <span class="ms-2">My Dashboard</span>
            </a>
          </li>
          {{-- @auth
          @role('admin') --}}
          @can('users.index')
          <li class="collapsed">
            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Account" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2 1C1.46957 1 0.960859 1.21071 0.585786 1.58579C0.210714 1.96086 0 2.46957 0 3L0 13C0 13.5304 0.210714 14.0391 0.585786 14.4142C0.960859 14.7893 1.46957 15 2 15H14C14.5304 15 15.0391 14.7893 15.4142 14.4142C15.7893 14.0391 16 13.5304 16 13V3C16 2.46957 15.7893 1.96086 15.4142 1.58579C15.0391 1.21071 14.5304 1 14 1H2ZM1 3C1 2.73478 1.10536 2.48043 1.29289 2.29289C1.48043 2.10536 1.73478 2 2 2H14C14.2652 2 14.5196 2.10536 14.7071 2.29289C14.8946 2.48043 15 2.73478 15 3V13C15 13.2652 14.8946 13.5196 14.7071 13.7071C14.5196 13.8946 14.2652 14 14 14H2C1.73478 14 1.48043 13.8946 1.29289 13.7071C1.10536 13.5196 1 13.2652 1 13V3ZM2 5.5C2 5.36739 2.05268 5.24021 2.14645 5.14645C2.24021 5.05268 2.36739 5 2.5 5H6C6.13261 5 6.25979 5.05268 6.35355 5.14645C6.44732 5.24021 6.5 5.36739 6.5 5.5C6.5 5.63261 6.44732 5.75979 6.35355 5.85355C6.25979 5.94732 6.13261 6 6 6H2.5C2.36739 6 2.24021 5.94732 2.14645 5.85355C2.05268 5.75979 2 5.63261 2 5.5ZM2 8.5C2 8.36739 2.05268 8.24021 2.14645 8.14645C2.24021 8.05268 2.36739 8 2.5 8H6C6.13261 8 6.25979 8.05268 6.35355 8.14645C6.44732 8.24021 6.5 8.36739 6.5 8.5C6.5 8.63261 6.44732 8.75979 6.35355 8.85355C6.25979 8.94732 6.13261 9 6 9H2.5C2.36739 9 2.24021 8.94732 2.14645 8.85355C2.05268 8.75979 2 8.63261 2 8.5ZM2 10.5C2 10.3674 2.05268 10.2402 2.14645 10.1464C2.24021 10.0527 2.36739 10 2.5 10H6C6.13261 10 6.25979 10.0527 6.35355 10.1464C6.44732 10.2402 6.5 10.3674 6.5 10.5C6.5 10.6326 6.44732 10.7598 6.35355 10.8536C6.25979 10.9473 6.13261 11 6 11H2.5C2.36739 11 2.24021 10.9473 2.14645 10.8536C2.05268 10.7598 2 10.6326 2 10.5Z" />
                <path class="fill-secondary" d="M8.5 11C8.5 11 8 11 8 10.5C8 10 8.5 8.5 11 8.5C13.5 8.5 14 10 14 10.5C14 11 13.5 11 13.5 11H8.5ZM11 8C11.3978 8 11.7794 7.84196 12.0607 7.56066C12.342 7.27936 12.5 6.89782 12.5 6.5C12.5 6.10218 12.342 5.72064 12.0607 5.43934C11.7794 5.15804 11.3978 5 11 5C10.6022 5 10.2206 5.15804 9.93934 5.43934C9.65804 5.72064 9.5 6.10218 9.5 6.5C9.5 6.89782 9.65804 7.27936 9.93934 7.56066C10.2206 7.84196 10.6022 8 11 8V8Z" />
              </svg>
              <span class="ms-2">Account</span>
              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
            </a>
            <!-- Menu: Sub menu ul -->
            <ul class="sub-menu collapse" id="menu-Account">
              @can('users.index')
              <li><a class="ms-link" href="{{route('users.index')}}">User Management</a></li>
              @endcan
              @can('roles.index')
              <li><a class="ms-link" href="{{route('roles.index')}}">Roles</a></li>
              @endcan
              @can('permissions.index')
              <li><a class="ms-link" href="{{route('permissions.index')}}">Permissions</a></li>
              @endcan
            </ul>
          </li>
          @endcan
          {{-- @endrole
          @endauth --}}
          <li class="collapsed">
            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Expert" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                <path d="M15.985 8.50001H8.20698L2.70698 14C3.82973 14.9906 5.20793 15.6461 6.68482 15.8922C8.1617 16.1383 9.678 15.9649 11.0613 15.3919C12.4445 14.8189 13.6392 13.8692 14.5095 12.6508C15.3797 11.4325 15.8916 9.99434 15.985 8.50001ZM1.99998 13.292C1.00944 12.1693 0.353862 10.7911 0.107801 9.31418C-0.138261 7.83729 0.0350724 6.32099 0.608086 4.93774C1.1811 3.55448 2.1308 2.35979 3.34916 1.48954C4.56752 0.619291 6.00565 0.108414 7.49998 0.0150146V7.79302L1.99998 13.293V13.292Z" />
                <path class="fill-secondary" d="M8.5 7.50001V0.0150146C10.4452 0.136897 12.279 0.964622 13.6572 2.34279C15.0354 3.72097 15.8631 5.5548 15.985 7.50001H8.5Z" />
              </svg>
              <span class="ms-2">Traders Sentiment</span>
            </a>
            <ul class="sub-menu collapse" id="menu-Expert">
              @can('admin.dashboard')
              <li><a class="ms-link" href="{{route('admin.dashboard')}}">Dashboard</a></li>
              @endcan
              <li><a class="ms-link" href="{{route('admin.chart')}}">Chart</a></li>
            </ul>
          </li>
  
          <li>
            <a class="m-link" href="{{route('news.index')}}">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                <path d="M0 3H16V4H0V3Z" />
                <path d="M9 1H14V6H9V1Z" />
                <path d="M0 13H16V14H0V13Z" />
                <path d="M9 11H14V16H9V11Z" />
                <path class="fill-secondary" d="M0 8H16V9H0V8Z" />
                <path class="fill-secondary" d="M2 6H7V11H2V6Z" />
              </svg>
              <span class="ms-2">News Calendar</span>
            </a>
          </li>
  
          <li class="collapsed">
            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Expert" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                    <path class="fill-secondary" d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"></path>
                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"></path>
                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"></path>
                </svg>
              <span class="ms-2">Expert Advisors</span>
              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
            </a>
            <!-- Menu: Sub menu ul -->
            <ul class="sub-menu collapse" id="menu-Expert">
              @can('expert.index')
              <li><a class="ms-link" href="{{route('expert.index')}}">List</a></li>
              @endcan
              <li><a class="ms-link" href="{{route('expert.list')}}">List</a></li>
            </ul>
          </li>
  
          <li class="collapsed">
            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Indicator" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                  <path class="fill-secondary" d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"></path>
                  <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"></path>
                  <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"></path>
              </svg>
            <span class="ms-2">Indicator</span>
            <span class="arrow fa fa-angle-right ms-auto text-end"></span>
          </a>
          <!-- Menu: Sub menu ul -->
          <ul class="sub-menu collapse" id="menu-Indicator">
            @can('indicator.index')
            <li><a class="ms-link" href="{{route('indicator.index')}}">List</a></li>
            @endcan
            <li><a class="ms-link" href="{{route('indicator.list')}}">List</a></li>
          </ul>
          </li>
          {{-- <li>
            <a class="m-link" href="{{ route('order.index') }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 18 18">
                <path class="fill-secondary" d="M12.7732 7.14823C12.8789 7.04261 12.9382 6.89935 12.9382 6.74998C12.9382 6.60061 12.8789 6.45735 12.7732 6.35173C12.6676 6.24611 12.5244 6.18677 12.375 6.18677C12.2256 6.18677 12.0824 6.24611 11.9767 6.35173L8.99998 9.3296L7.71073 8.03923C7.65843 7.98693 7.59634 7.94544 7.52801 7.91714C7.45968 7.88884 7.38644 7.87427 7.31248 7.87427C7.23852 7.87427 7.16528 7.88884 7.09695 7.91714C7.02861 7.94544 6.96653 7.98693 6.91423 8.03923C6.86193 8.09153 6.82044 8.15361 6.79214 8.22195C6.76384 8.29028 6.74927 8.36352 6.74927 8.43748C6.74927 8.51144 6.76384 8.58468 6.79214 8.65301C6.82044 8.72134 6.86193 8.78343 6.91423 8.83573L8.60173 10.5232C8.65398 10.5756 8.71605 10.6172 8.78439 10.6455C8.85273 10.6739 8.92599 10.6885 8.99998 10.6885C9.07397 10.6885 9.14723 10.6739 9.21557 10.6455C9.2839 10.6172 9.34598 10.5756 9.39823 10.5232L12.7732 7.14823V7.14823Z" />
                <path d="M0.5625 1.125C0.413316 1.125 0.270242 1.18426 0.164752 1.28975C0.0592632 1.39524 0 1.53832 0 1.6875C0 1.83668 0.0592632 1.97976 0.164752 2.08525C0.270242 2.19074 0.413316 2.25 0.5625 2.25H1.81125L2.26237 4.05788L3.94763 13.041C3.97175 13.1699 4.04016 13.2863 4.14102 13.3701C4.24189 13.4539 4.36886 13.4999 4.5 13.5H5.625C5.02826 13.5 4.45597 13.7371 4.03401 14.159C3.61205 14.581 3.375 15.1533 3.375 15.75C3.375 16.3467 3.61205 16.919 4.03401 17.341C4.45597 17.7629 5.02826 18 5.625 18C6.22174 18 6.79403 17.7629 7.21599 17.341C7.63795 16.919 7.875 16.3467 7.875 15.75C7.875 15.1533 7.63795 14.581 7.21599 14.159C6.79403 13.7371 6.22174 13.5 5.625 13.5H13.5C12.9033 13.5 12.331 13.7371 11.909 14.159C11.4871 14.581 11.25 15.1533 11.25 15.75C11.25 16.3467 11.4871 16.919 11.909 17.341C12.331 17.7629 12.9033 18 13.5 18C14.0967 18 14.669 17.7629 15.091 17.341C15.5129 16.919 15.75 16.3467 15.75 15.75C15.75 15.1533 15.5129 14.581 15.091 14.159C14.669 13.7371 14.0967 13.5 13.5 13.5H14.625C14.7561 13.4999 14.8831 13.4539 14.984 13.3701C15.0848 13.2863 15.1532 13.1699 15.1774 13.041L16.8649 4.041C16.8801 3.95982 16.8772 3.87628 16.8565 3.79633C16.8357 3.71638 16.7977 3.64198 16.7449 3.5784C16.6922 3.51483 16.6261 3.46365 16.5514 3.42849C16.4767 3.39334 16.3951 3.37508 16.3125 3.375H3.25125L2.79562 1.55137C2.76526 1.42963 2.69506 1.32154 2.5962 1.24428C2.49733 1.16702 2.37547 1.12503 2.25 1.125H0.5625ZM4.96687 12.375L3.48975 4.5H15.6352L14.1581 12.375H4.96687V12.375ZM6.75 15.75C6.75 16.0484 6.63147 16.3345 6.42049 16.5455C6.20952 16.7565 5.92337 16.875 5.625 16.875C5.32663 16.875 5.04048 16.7565 4.82951 16.5455C4.61853 16.3345 4.5 16.0484 4.5 15.75C4.5 15.4516 4.61853 15.1655 4.82951 14.9545C5.04048 14.7435 5.32663 14.625 5.625 14.625C5.92337 14.625 6.20952 14.7435 6.42049 14.9545C6.63147 15.1655 6.75 15.4516 6.75 15.75V15.75ZM14.625 15.75C14.625 16.0484 14.5065 16.3345 14.2955 16.5455C14.0845 16.7565 13.7984 16.875 13.5 16.875C13.2016 16.875 12.9155 16.7565 12.7045 16.5455C12.4935 16.3345 12.375 16.0484 12.375 15.75C12.375 15.4516 12.4935 15.1655 12.7045 14.9545C12.9155 14.7435 13.2016 14.625 13.5 14.625C13.7984 14.625 14.0845 14.7435 14.2955 14.9545C14.5065 15.1655 14.625 15.4516 14.625 15.75V15.75Z" />
              </svg>
              {{ Cart::getTotalQuantity()}}
              <span class="ms-2">Cart</span>
              
            </a>
          </li> --}}
        </ul>
      </div>
    </div>
  </div>