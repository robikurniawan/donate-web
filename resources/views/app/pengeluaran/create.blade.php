@extends('layouts.app')
@section('content')

<div class="">
    <div class="row">
        <div class="col-xl-12">

            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Tambah Pengeluaran</h4>
            </div>


            <div class="mb-5">
                <div class="card">
                    <div class="card-body">
                        <form id="form" method="POST" action="{{ route('pengeluaran.store')  }}" data-parsley-validate="">
                            @csrf
                            <div class="form-group">
                                <label>Nama Pengeluaran </label>
                                <input type="text" name="item" class="form-control" required
                                    data-parsley-trigger="keyup" autocomplete="off" />
                            </div>

                            <div class="form-group">
                                <label>Jumlah  </label>
                                <div class="input-group mb-2 mr-sm-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input type="text" name="jumlah" class="form-control uang" id="inlineFormemail2">
                                </div>

                            </div>
                            <div class="form-group">
                                <label>Tanggal Donasi </label>
                                <input type="date" name="tanggal" class="form-control" required data-parsley-trigger="keyup" autocomplete="off" />
                            </div>


                            <div class="form-group">
                                <button type="submit" name="submit" id="load1" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Processing " class="btn btn-primary"> Simpan </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
