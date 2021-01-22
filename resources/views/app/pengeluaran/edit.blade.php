@extends('layouts.app')
@section('content')
    <div class="">
        <div class="row">
            <div class="col-xl-12">

                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Edit Pengeluaran</h4>
                </div>


                <div class="mb-5">
                    <div class="card">
                        <div class="card-body">

                            <form id="form" method="POST" action="{{ route('pengeluaran.update')  }}" data-parsley-validate="" enctype="multipart/form-data">
                                @CSRF
                                <input type="hidden" name="id" value="{{ $pengeluaran->id }}">
                                <div class="form-group">
                                    <label>Nama Pengeluaran </label>
                                    <input type="text" name="item" value="{{ $pengeluaran->item  }}" class="form-control" required data-parsley-trigger="keyup" autocomplete="off"/>
                                </div>

                                <div class="form-group">
                                    <label>Jumlah </label>
                                    <div class="input-group mb-2 mr-sm-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp.</div>
                                        </div>
                                        <input type="text" name="jumlah" value="{{ $pengeluaran->jumlah }}" class="form-control uang" id="inlineFormemail2">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal  </label>
                                    <input type="date" name="tanggal" value="{{  $pengeluaran->tanggal }}" class="form-control" required data-parsley-trigger="keyup" autocomplete="off" />
                                </div>

                                <div class="form-group">
                                    <label>Update Lampiran </label>
                                    <input type="file" name="images" class="form-control-file">
                                    <p>Lihat Lampiran <a href="{{ asset('uploads/'.$pengeluaran->bukti.'') }}" target="_blank"> Disini </a> </p>
                                    <small>Kosongkan jika tidak ingin mengupdate lampiran </small>
                                </div>



                                <div class="form-group">
                                    <button type="submit" name="submit" id="submit" class="btn btn-primary"> Update </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            // Format mata uang.
            $('.uang').mask('000.000.000.000', {
                reverse: false
            });
        })
    </script>


@endsection
