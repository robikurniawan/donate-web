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
    <link href="{{ asset('static/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }} " rel="stylesheet" type="text/css" />
    <link href="{{ asset('static/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }} " rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('static/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }} "
        rel="stylesheet" type="text/css" />
    <script src="{{ asset('static/libs/jquery/jquery.min.js ') }} "></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="https://bfintal.github.io/Counter-Up/jquery.counterup.min.js"></script>

    <style>
        body {
            font-family: -apple-system, "Segoe UI", Roboto, sans-serif !important;
        }

        .mm-active .active i {
            color: #FFF !important;
        }

        .page-title-box h4 {
            font-size: 28px !important;
            font-weight: 500;
            border-bottom: 3px solid #FF9800;
        }

        h4,
        h5,
        h6 {
            color: #005ba4 !important;
        }

        .alertx {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .bold {
            font-weight: bold;
        }

        .verti-timeline .event-list {
            border-left: 2px solid #005ba4 !important;
            position: relative;
            padding: 0 0 20px 30px !important;
        }

    </style>
</head>


<body data-sidebar="colored">

    <!-- Begin page -->
    <div id="layout-wrapper">


        @include('partials.header')

        @include('partials.navbar')


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
                                Dev with <i class="mdi mdi-heart text-danger"></i> 
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <script src="{{ asset('static/libs/bootstrap/js/bootstrap.bundle.min.js ') }} "></script>
    <script src="{{ asset('static/libs/metismenu/metisMenu.min.js ') }} "></script>
    <script src="{{ asset('static/libs/simplebar/simplebar.min.js ') }} "></script>
    <script src="{{ asset('static/libs/node-waves/waves.min.js ') }} "></script>

    <script src="{{ asset('static/libs/datatables.net/js/jquery.dataTables.min.js') }} "></script>
    <script src="{{ asset('static/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }} "></script>


    <script src="{{ asset('static/libs/parsleyjs/parsley.min.js') }} "></script>
    <script src="{{ asset('static/js/pages/form-validation.init.js') }} "></script>
    <script src="{{ asset('static/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js') }} "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    {{--<script src="{{ asset('assets/js/custom.js') }}"></script>--}}
    {{--<script src="{{ asset('assets/js/mask.js') }}"></script>--}}
    <script src="{{ asset('static/js/app.js') }} "></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
   
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


        $(".alert").fadeTo(8000, 8000).slideUp(1000, function () {
            $(".alert").slideUp(2000);
        });

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

        $(document).ready(function () {
            // Format mata uang.
            $('.uang').mask('000.000.000.000', {
                reverse: true
            });
        })

        


        //
        // function goBack() {
        //     window.history.back();
        // }
        //
        // $('.btn').on('click', function () {
        //     let $this = $(this);
        //     $this.button('loading');
        // });

        /* $(function () {
             $('.select2').each(function () {
                 $(this).select2({
                     theme: 'bootstrap4',
                     width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                     placeholder: $(this).data('placeholder'),
                     allowClear: Boolean($(this).data('allow-clear')),
                 });
             });
         });*/

    </script>


</body>

</html>
