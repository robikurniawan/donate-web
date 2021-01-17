@extends('layouts.app')
@section('content')

    <div class="">
        <div class="row">
            <div class="col-xl-12">

                <div class="row">
                    <div class="col-10">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Edit</h4>
                        </div>
                    </div>
                
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{  route('setting.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-5">
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Judul Donasi</label>
                                        <div class="col-md-10">
                                            <input class="form-control"  name="judul" type="text" value="{{ $setting->judul }}" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Deskripsi</label>
                                        <div class="col-md-10">
                                            <textarea name="deskripsi" class="form-control">{{  $setting->deskripsi }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Alamat </label>
                                        <div class="col-md-10">
                                            <textarea name="alamat" class="form-control">{{  $setting->alamat }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Kontak</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="kontak" type="text" value="{{ $setting->kontak }}" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Logo</label>
                                        <div class="col-md-10">
                                            <input class="form-control-file" name="logo" type="file">
                                            <p class="mt-3">
                                                <img src="{{ asset('uploads/'.$setting->logo.' ') }}" alt="" width="100px" style="border-radius: 8px;">

                                            </p>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Nomor Rekening </label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="norek" type="text" value="{{ $setting->norek }}" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Bank Rekening </label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="bank" type="text" value="{{ $setting->bank }}" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Atas Nama Rekening </label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="an_bank" type="text" value="{{ $setting->an_bank }}" id="example-text-input">
                                        </div>
                                    </div>


                                    <button class="btn btn-primary"> <i class="uil-refresh"></i> Update </button>
                                </form>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>



            </div>
        </div>
    </div>
    
@endsection
