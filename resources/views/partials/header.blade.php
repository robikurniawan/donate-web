<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            
            <div class="navbar-brand-box">
                <a href="{{ route('dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('uploads/'.profil()->logo.'') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('uploads/'.profil()->logo.'') }}" alt="" height="20">
                    </span>
                </a>

                <a href="{{ route('dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('uploads/'.profil()->logo.'') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('uploads/'.profil()->logo.'') }}" alt="" height="20">
                    </span>
                </a>

            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...  ">
                    <span class="uil-search"></span>
                </div>
            </form>
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="uil-search"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="https://ui-avatars.com/api/?background=cef2ef&color=249286&name={{ auth()->user()->name }} "
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ml-1 font-weight-medium font-size-15">
                        {{ auth()->user()->name }} </span>
                    <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('users.edit',auth()->user()->id ) }}"><i
                            class="uil uil-user-circle font-size-18 align-middle text-muted mr-1"></i> <span
                            class="align-middle"> Profile</span></a>

                    <a class="dropdown-item" href="{{ route('users.edit',auth()->user()->id ) }}"><i
                            class="uil uil-lock-alt font-size-18 align-middle mr-1 text-muted"></i> <span
                            class="align-middle">Ubah Password</span></a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="uil uil-sign-out-alt font-size-18 align-middle mr-1 text-muted"></i>
                        <span class="align-middle">Keluar </span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>



                </div>
            </div>


        </div>
    </div>
</header>
