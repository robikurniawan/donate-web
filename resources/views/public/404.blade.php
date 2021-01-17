@extends('layouts.public')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Tracking Aspirasi</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-4">
                            <div class="alert alert-danger  fade show  px-4 mb-0 text-center" role="alert">
                                <i class="uil uil-sad d-block display-4 mt-2 mb-3 text-danger"></i>
                                <h5 class="text-danger"> Oops. Maaf ID <b>{{ $id }}</b>  tidak ditemukan </h5>
                            </div>
                        </div>
                    </div>

                    <form class="" method="POST" action="{{ route('public.aspirasi-tracking') }}" style="margin-top:10px;">
                        @csrf
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-4">
                                <input type="text" class="form-control" name="id" placeholder="Masukan ID Aspirasi Anda Disini.">
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-block btn-primary"><i class="uil-search-alt"></i> Cari...</button>
                            </div>
                            <div class="col-md-3"></div>

                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>


@endsection
