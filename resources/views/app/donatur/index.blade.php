@extends('layouts.app')
@section('content')

    <div class="">
        <div class="row">
            <div class="col-xl-12">

                <div class="row">
                    <div class="col-10">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Donatur</h4>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col mb-2">
                        <a href="{{ url('donatur/add') }}" class="btn btn-primary btn-block"><i class="fa fa-plus "></i> Tambah </a>
                        <div class="float-none;"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-5">
                                    <div class="">
                                        <div class="">
                                            @if ($message = Session::get('success'))
                                                <div class="alert alert-success">
                                                    {{ $message }}
                                                </div>
                                            @endif
                                            <div id="flash-message" style="display: none;"></div>

                                            <div class="input-group flex-nowrap search-group">
                                                <div class="input-group-prepend"> <span class="input-group-text" id="addon-wrapping"><i class="fa fa-search"></i></span> </div>
                                                <input type="text" class="form-control search-text" placeholder="Pencarian Data ... " id="mySearchText" autocomplete="off"/>
                                            </div>


                                            <div class="table-responsive">
                                                <table class="table table-hover  nowrap" id="donatur">
                                                    <thead class="text-center">
                                                    <tr>
                                                        <th width="2%">No.</th>
                                                        <th>Nama Donatur</th>
                                                        <th>Jumlah</th>
                                                        <th>Tanggal</th>
                                                        <th width="10%">#</th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>



            </div>
        </div>
    </div>
    <script>
        let table;
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            table = $('#donatur').DataTable({
                lengthChange: false,
                aaSorting: [],
                ordering: false,
                responsive: true,

                columnDefs: [
                    {
                        responsivePriority: 2,
                        targets: 0
                    },
                    {
                        responsivePriority: 3,
                        targets: -1
                    }
                ],

                initComplete: function () {
                    $("#donatur_filter").hide();
                },

                processing: true,
                serverSide: true,
                ajax: "{{ route('donatur.json') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'nama_donatur', name: 'nama_donatur'},
                    {data: 'jumlahDonasi', name: 'jumlahDonasi'},
                    {data: 'tanggalDonasi', name: 'tanggalDonasi'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('#mySearchText').on('keyup ', function () {
                table.search($('#mySearchText').val()).draw();
            });


        });

        $('body').on('click', '.delete', function () {

            const id = $(this).data("id");
            if (confirm("Are You sure want to delete !")) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('donatur/delete') }}" + '/' + id,
                    success: function (data) {
                        table.draw();
                        $('#flash-message').addClass('alert alert-danger').show(function () {
                            $(this).html(data.message)
                        }).delay(2000).slideUp(300);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    },


                });
            }
        });


    </script>
@endsection