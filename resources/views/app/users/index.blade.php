@extends('layouts.app')
@section('content')


    <div class="">
        <div class="row">
            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ul>
                <h1 class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <span class="line-header"></span>
                            Users
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <a href="{{ url('users/add') }}" class="btn btn-primary float-right"><i
                                    class="fa fa-plus "></i> Tambah </a>
                            <div class="float-none;"></div>
                        </div>
                    </div>

                </h1>
                <hr class="mb-4">
                <div class="mb-5">
                    <div class="card">
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    {{ $message }}
                                </div>
                            @endif
                            <div id="flash-message" style="display: none;"></div>


                            <div class="table-responsive">
                                <table class="table table-hover  nowrap data-users">
                                    <thead class="text-center">
                                    <tr>
                                        <th width="2%">No.</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th width="10%">Actions</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @push('scripts')
            <script>
                let table;
                $(document).ready(function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    table = $('.data-users').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('users.json') }}",
                        columns: [
                            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                            {data: 'name', name: 'name'},
                            {data: 'jabatan', name: 'jabatan'},
                            {data: 'email', name: 'email'},
                            {
                                data: null,
                                name: 'komisi',
                                render: data => {
                                    if(data.role === "komisi") {
                                        color = "primary"
                                    }else{
                                        color = "yellow"
                                    }
                                    return '<center> <span class="badge badge-'+ color + '  text-center">'+data.role+'</span> </center> '
                                }
                            },



                            {data: 'action', name: 'action', orderable: false, searchable: false},
                        ]
                    });


                });

                $('body').on('click', '.delete', function () {

                    const id = $(this).data("id");
                    if (confirm("Are You sure want to delete !")) {
                        $.ajax({
                            type: "GET",
                            url: "{{ url('users/delete') }}" + '/' + id,
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
    @endpush
