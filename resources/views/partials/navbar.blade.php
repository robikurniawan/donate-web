<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">


        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('uploads/'.profil()->logo.'') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('uploads/'.profil()->logo.'') }} " alt="" height="40"
                    style="margin-top: 15px;width: 85%;height: 50px;">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="uil-home-alt "></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('donatur.index') }}" class="waves-effect">
                        <i class="uil-database-alt"></i>
                        <span>Donatur</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('pengeluaran.index') }}" class="waves-effect">
                        <i class="uil-database-alt"></i>
                        <span>Pengeluaran </span>
                    </a>
                </li>


                <li>
                    <a href="{{  route('setting.index') }}" class="waves-effect">
                        <i class="uil-shutter-alt"></i>
                        <span>Profil</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('slide.index') }}" class="waves-effect">
                        <i class="uil-images"></i>
                        <span>Slide</span>
                    </a>
                </li>


                <li class="menu-title">Data Master</li>


        

                <li>
                    <a href="#">
                        <i class="uil-user"></i>
                        <span>Manajemen User</span>
                    </a>
                </li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
