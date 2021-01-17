<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>{{ profil()->judul }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ profil()->deskripsi }}" name="description" />
    <meta content="{{ profil()->judul }}" name="author" />
    <link rel="shortcut icon" href="{{ asset('static/images/favicon.ico') }} ">

    <link href="{{ asset('static/css/bootstrap.min.css ') }} " id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('static/css/icons.min.css ') }} " rel="stylesheet" type="text/css" />
    <link href="{{ asset('static/css/app.min.css ') }} " id="app-style" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{ asset('static/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }} " rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('static/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }} " rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('static/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }} "
        rel="stylesheet" type="text/css" />
    <script src="{{ asset('static/libs/jquery/jquery.min.js ') }} "></script>


    <style>
        body {
            font-family: -apple-system, "Segoe UI", Roboto, sans-serif !important;
        }

    </style>
</head>

<!-- <body> -->

<body data-layout="horizontal" data-topbar="colored">

    <!-- Begin page -->
    <div id="layout-wrapper">


        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="#" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('uploads/'.profil()->logo.'') }} " alt="" height="22">
                            </span>
                            <span class="logo-lg ">
                                <img src="{{ asset('uploads/'.profil()->logo.'') }} " alt="" height="60"
                                    style="margin-top:25px;">
                            </span>
                        </a>
                    </div>

                    <button type="button"
                        class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                        data-toggle="collapse" data-target="#topnav-menu-content">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>


                </div>

                <div class="d-flex">


                    <div class="d-inline">

                        <a href="{{ route('login') }}" class=" btn btn-warning mt-3 text-dark">
                            Masuk
                            <i class="uil-sign-out-alt"> </i>
                        </a>
                    </div>


                </div>
            </div>
            <div class="container-fluid">
                <div class="topnav">

                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                        <div class="collapse navbar-collapse" id="topnav-menu-content">
                            <ul class="navbar-nav">

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('homepage')  }}">
                                        <i class="uil-home-alt mr-2"></i> Beranda
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('public.donatur') }}">
                                        <i class="uil-shield mr-2"></i> Donatur
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('public.disbursement') }}">
                                        <i class="uil-shield mr-2"></i> Disbursement
                                    </a>
                                </li>


                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>


        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    @yield('content')
                    <!-- end page title -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())

                            </script>
                            © {{ profil()->judul }}
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Dev with <i class="uil-heart text-danger"></i> 
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- JAVASCRIPT -->
    <script src="{{ asset('static/libs/datatables.net/js/jquery.dataTables.min.js') }} "></script>
    <script src="{{ asset('static/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }} "></script>




    <script src="{{ asset('static/libs/bootstrap/js/bootstrap.bundle.min.js ') }} "></script>
    <script src="{{ asset('static/libs/metismenu/metisMenu.min.js ') }} "></script>
    <script src="{{ asset('static/libs/simplebar/simplebar.min.js ') }} "></script>
    <script src="{{ asset('static/libs/node-waves/waves.min.js ') }} "></script>

  
    <script src="{{ asset('static/libs/waypoints/lib/jquery.waypoints.min.js ') }} "></script>
    <script src="{{ asset('static/libs/jquery.counterup/jquery.counterup.min.js ') }} "></script>

    <script src="{{ asset('static/libs/parsleyjs/parsley.min.js') }} "></script>
    <script src="{{ asset('static/js/pages/form-validation.init.js') }} "></script>
    <script src="{{ asset('static/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js') }} "></script>

    <script src="{{ asset('static/js/app.js') }} "></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#classic-editor'))
            .catch(error => {
                console.error(error);
            });

        function addCommas(nStr) {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + '.' + '$2');
            }
            return x1 + x2;
        }


        $('.counter').each(function () {
            var $this = $(this),
                countTo = $this.attr('data-count');

            $({
                countNum: $this.text()
            }).animate({
                countNum: countTo
            }, {
                duration: 2000,
                easing: 'linear',
                step: function () {
                    $this.text("Rp. " + Math.floor(this.countNum));
                },
                complete: function () {
                    $this.text("Rp. " + addCommas(this.countNum));
                    //alert('finished');
                }

            });

        });

    </script>

</body>

</html>
