<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
            <span class="d-none d-lg-block">GU Election</span>
        </a>
        {{-- <i class="bi bi-list toggle-sidebar-btn"></i> --}}
    </div><!-- End Logo -->

    
    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center mr-5">
            <li class="nav-item dropdown pe-3">
             
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <!--<img src="{{asset('assets/img/mla/ranjit.png')}}" alt="Profile" class="rounded-circle">-->
                <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->name}}</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                    <h6></h6>
                    <span>{{Auth::user()->name}}</span>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form1').submit();">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                        <form id="logout-form1" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                </li>
                    <!--<li>
                    <a class="dropdown-item d-flex align-items-center" href="" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-key" aria-hidden="true"></i>
                    <span>Change Passsword</span>
                    </a>
                </li>-->

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->
        </ul>
    </nav><!-- End Icons Navigation -->

</header>
