@extends('layouts.app')
@section('content')

<div class="">
    <div class="row">
        <div class="col-xl-12">

            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0"> Users</h4>
            </div>


            <div class="card">
                <div class="card-body">
                    @if($errors->any())
                    <div class="alertx alert-danger" role="alert">
                        <strong> {!! implode('', $errors->all('<div>:message</div>')) !!} </strong>
                    </div>
                    @endif

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <h4>Profil </h4>
                            <form method="POST" action="{{ route('users.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <div class="form-group">
                                    <label for="">Nama </label>
                                    <input type="text" name="name" class="form-control" required autocomplete="off"
                                        value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Email </label>
                                    <input type="email" name="email" class="form-control" required autocomplete="off"
                                        value="{{ $user->email }}">
                                </div>
                                @if(auth()->user()->role == "admin")
                                <div class="form-group ">
                                    <label for="role" class="col-form-label text-md-right">Role </label>
                                    <div class="custom-control custom-radio mb-3">
                                        <input type="radio" id="customRadio1"
                                            {{ ($user->role == "admin") ? "checked":"" }} name="role" value="admin"
                                            class="custom-control-input" required>
                                        <label class="custom-control-label" for="customRadio1">Admin </label>
                                    </div>
                                    <div class="custom-control custom-radio mb-3">
                                        <input type="radio" id="customRadio2"
                                            {{ ($user->role == "users") ? "checked":"" }} name="role" value="users"
                                            class="custom-control-input" required>
                                        <label class="custom-control-label" for="customRadio2">User </label>
                                    </div>
                                </div>
                                @else 
                                <input type="hidden" name="role" value="{{ $user->role }}">
                                @endif
                                
                                <button class="btn btn-primary" type="submit"> <i class="fa fa-undo-alt "></i> Update
                                    Profil </button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <h4>Update Password </h4>
                            <form method="POST" action="{{ route('users.update-password') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">

                                <div class="form-group">
                                    <label for="">Password Baru </label>
                                    <input type="text" name="password" class="form-control" required autocomplete="off" >
                                </div>
                                <div class="form-group">
                                    <label for="">Ketik Ulang Password Baru </label>
                                    <input type="text" name="password_confirmation" class="form-control" required autocomplete="off">
                                </div>

                                <button class="btn btn-danger" type="submit"> <i class="fa fa-lock "></i> Update
                                    Password </button>
                            </form>
                        </div>

                    </div>



                </div>
            </div>
        </div>
    </div>
    @endsection
