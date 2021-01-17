@extends('layouts.app')
@section('content')

<div class="">
    <div class="row">
        <div class="col-xl-12">

            <div class="row">
                <div class="col-10">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Add Users</h4>
                    </div>
                </div>
               
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            @if($errors->any())
                                <div class="alertx alert-danger" role="alert">
                                    <strong> {!! implode('', $errors->all('<div>:message</div>')) !!} </strong>
                                </div>
                            @endif


                            <form method="POST" action="{{ route('users.store') }}" class="needs-validation" novalidate>
                                @csrf
                                <div class="form-group">
                                    <label for="">Nama </label>
                                    <input type="text" name="name" class="form-control" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="">Email </label>
                                    <input type="email" name="email" class="form-control" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="">Password </label>
                                    <input type="password" name="password" class="form-control" required autocomplete="off">
                                </div>

                                <div class="form-group ">
                                    <label for="role" class="col-form-label text-md-right">Role </label>
                                    <div class="custom-control custom-radio mb-3">
                                        <input type="radio" id="customRadio1" name="role" value="admin" class="custom-control-input" required>
                                        <label class="custom-control-label" for="customRadio1">Admin </label>
                                    </div>
                                    <div class="custom-control custom-radio mb-3">
                                        <input type="radio" id="customRadio2" name="role" value="users" class="custom-control-input" required>
                                        <label class="custom-control-label" for="customRadio2">User </label>
                                    </div>
                                </div>
                              
                                <button class="btn btn-primary" type="submit"> Simpan  </button>
                            </form>
                          

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('#sub_role').hide();
            $('#role').change(function(){
                if( $('#role').val() === 'komisi' || $('#role').val() === "pimpinan" ) {
                        $('#sub_role').show();
                } else {
                    $('#sub_role').hide();
                }
            });
        });
    </script>
@endsection
