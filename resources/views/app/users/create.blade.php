@extends('layouts.app')
@section('content')
    <div class="">
        <div class="row">
            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                    <li class="breadcrumb-item active">Tambah User</li>
                </ul>
                <h1 class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <span class="line-header"></span>
                            Tambah User
                        </div>
                    </div>

                </h1>
                <hr class="mb-4">

                <div class="mb-5">
                    <div class="card">
                        <div class="card-body">

                            <form method="POST" action="{{ route('users.store') }}">
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
                                    <label for="">Jabatan </label>
                                    <input type="text" name="jabatan" class="form-control" required autocomplete="off">
                                </div>

                                <div class="form-group ">
                                    <label for="role" class="col-form-label text-md-right">Role</label>
                                    <select name="role" class="form-control" id="role" required >
                                        <option value=""> Pilih </option>
                                        <option value="admin"> Admin  </option>
                                        <option value="komisi">Komisi   </option>
                                        <option value="pimpinan">Pimpinan </option>
                                        <option value="sekwan">Sekretaris Dewan</option>
                                        <option value="kabid">Kepala Bidang</option>
                                        <option value="kasubag">Kepala Sub Bagian</option>
                                    </select>
                                </div>
                                <div id="sub_role">
                                    <div class="form-group ">
                                        <label for="sub_role" class="col-form-label text-md-right">Sub Role</label>
                                        <select name="sub_role" class="form-control"  >
                                            <option value=""> Pilih </option>
                                            <option value="ketua"> Ketua DPRD  </option>
                                            <option value="wakil_ketua"> Wakil Ketua DPRD  </option>
                                            <option value="komisi_a"> Komisi A  </option>
                                            <option value="komisi_b">Komisi B  </option>
                                            <option value="komisi_c">Komisi C </option>
                                            <option value="komisi_d">Komisi D</option>
                                            <option value="komisi_e">Komisi E</option>
                                        </select>
                                    </div>
                                </div>


                                <button class="btn btn-primary" type="submit"> Simpan  </button>
                            </form>
                            <br>
                            <div class="alertx alert-info">
                            	<strong>**</strong>   Password akun user otomatis : <b>12345</b>
                            </div>

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
