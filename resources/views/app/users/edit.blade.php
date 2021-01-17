@extends('layouts.app')
@section('content')
    <div class="">
        <div class="row">
            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
                </ul>
                <h1 class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <span class="line-header"></span>
                            Edit User
                        </div>
                    </div>

                </h1>
                <hr class="mb-4">

                <div class="mb-5">
                    <div class="card">
                        <div class="card-body">

                            <form method="POST" action="{{ route('users.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <div class="form-group">
                                    <label for="">Nama </label>
                                    <input type="text" name="name" class="form-control" required autocomplete="off" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Email </label>
                                    <input type="email" name="email" class="form-control" required autocomplete="off" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Jabatan </label>
                                    <input type="text" name="jabatan" class="form-control" required autocomplete="off" value="{{ $user->jabatan }}">
                                </div>

                                <div class="form-group ">
                                    <label for="role" class="col-form-label text-md-right">Role</label>
                                    <select name="role" class="form-control" required >
                                        <option value=""> Pilih </option>
                                        <option value="admin" {{ ($user->role == "admin") ? "selected":"" }} > Admin  </option>
                                        <option value="komisi" {{ ($user->role == "komisi") ? "selected":"" }} >Komisi   </option>
                                        <option value="pimpinan" {{ ($user->role == "pimpinan") ? "selected":"" }} >Pimpinan </option>
                                        <option value="sekwan" {{ ($user->role == "sekwan") ? "selected":"" }} >Sekretaris Dewan</option>
                                        <option value="kabid"  {{ ($user->role == "kabid") ? "selected":"" }} >Kepala Bidang</option>
                                        <option value="kasubag" {{ ($user->role == "kasubag") ? "selected":"" }} >Kepala Sub Bagian</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary" type="submit"> <i class="fa fa-undo-alt "></i> Update  </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
