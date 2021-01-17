@extends('layouts.app')
@section('content')

<div class="">
    <div class="row">
        <div class="col-xl-12">

            <div class="row">
                <div class="col-10">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Pengaturan</h4>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 col mb-2">
                    <a href="{{ route('setting.edit') }}" class="btn btn-primary btn-block"><i class="uil-edit"></i>
                        Edit </a>
                    <div class="float-none;"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{ $message }}
                            </div>
                            @endif


                            <div class="mb-5">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Judul Donasi</label>
                                    <div class="col-md-10">
                                        <p class="mt-2"> 
                                            {{  $setting->judul }}
                                        </p>
                                       
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Deskripsi</label>
                                    <div class="col-md-10">
                                        <p class="mt-2"> 
                                            {{  $setting->deskripsi }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Alamat </label>
                                    <div class="col-md-10">
                                        <p class="mt-2"> 
                                            {{  $setting->alamat }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">No Handphone
                                    </label>
                                    <div class="col-md-10">
                                        <p class="mt-2"> 
                                            {{  $setting->kontak }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Logo </label>
                                    <div class="col-md-10">
                                        <p class="mt-2"> 
                                            <img src="{{ asset('uploads/'.$setting->logo.' ') }}" alt="" width="100px" style="border-radius: 8px;">

                                        </p>
                                    </div>
                                </div>

                                <hr>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Nomor Rekening
                                    </label>
                                    <div class="col-md-10">
                                        <p class="mt-2"> 
                                            {{  $setting->norek }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Bank Rekening
                                    </label>
                                    <div class="col-md-10">
                                        <p class="mt-2"> 
                                            {{  $setting->bank }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Atas Nama Rekening
                                    </label>
                                    <div class="col-md-10">
                                        <p class="mt-2"> 
                                            {{  $setting->an_bank }}
                                        </p>
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

@endsection
