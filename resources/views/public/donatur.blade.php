@extends('layouts.public')
@section('content')


    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Para Donatur</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
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
                            </tr>
                            </thead>
                        </table>
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
                ajax: "{{ route('donatur.json-public') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'nama_donatur', name: 'nama_donatur'},
                    {data: 'jumlahDonasi', name: 'jumlahDonasi'},
                    {data: 'tanggalDonasi', name: 'tanggalDonasi'},
                ]
            });

            $('#mySearchText').on('keyup ', function () {
                table.search($('#mySearchText').val()).draw();
            });


        });
    </script>

@endsection
