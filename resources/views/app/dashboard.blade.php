@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-4">
        <div class="card bg-info">
            <div class="card-body">
                <div>
                    <h1 class="text-white">
                        <div class="counter" data-count="{{ $totalDonasi }}">Rp.0</div>
                    </h1>
                    <p class="text-white mb-0">Total Donasi</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-warning">
            <div class="card-body">
                <div>
                    <h1 class="text-dark">
                        <div class="counter" data-count="{{ $totalKeluar }}">Rp.0</div>
                    </h1>
                    <p class="text-dark mb-0">Total Pengeluaran</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body bg-success">
                <div>
                    <h1 class="text-white">
                        <div class="counter" data-count="{{ $totalDonasi - $totalKeluar }}">Rp.0</div>
                    </h1>
                    <p class="text-white mb-0">Sisa Dana</p>
                </div>
            </div>
        </div>
    </div>


</div>

<div class="row">
    <div class="col-md-6 col-xl-6">

        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
                @endif

                <h4 class="card-title mb-4"> <i class="uil-refresh"></i> Update Donatur</h4>

                <div class="table-responsive">
                    <table class="table table-borderless table-centered table-nowrap">
                        <tbody>
                            @foreach ($donaturs as $item)
                            <tr>
                                <td style="width: 20px;">
                                    <img src="https://ui-avatars.com/api/name={{  $item->nama_donatur }}" class="avatar-xs rounded-circle " alt="...">
                                </td>
                                <td>
                                    <h6 class="font-size-15 mb-1 font-weight-normal">{{  $item->nama_donatur }}</h6>
                                    <small><i class="uil-calendar"></i>  {{  tgl_indo($item->tgl_donasi) }} </small>
                                </td>
                                <td class="text-muted font-weight-semibold text-right">
                                    <i class="icon-xs icon mr-2 text-success" data-feather="trending-up"></i>
                                    Rp. {{ number_format($item->jumlah) }}
                                </td>
                            </tr>
                          
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-center">
                        <a href="{{  route('donatur.index') }}"> Selegkapnya.. </a>
                    </div> 
                </div>

            </div>
        </div>

        
    </div>


    <div class="col-md-6 col-xl-6">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4"><i class="uil-user"></i> Tambah Donatur</h4>
                <form id="form" method="POST" action="{{ route('donatur.store')  }}" data-parsley-validate="">
                    @csrf
                    <input type="hidden" name="from" value="dashboard">
                    <div class="form-group">
                        <label>Nama Donatur </label>
                        <input type="text" name="nama_donatur" class="form-control" required
                            data-parsley-trigger="keyup" autocomplete="off" />
                    </div>

                    <div class="form-group">
                        <label>Jumlah Donasi </label>
                        <div class="input-group mb-2 mr-sm-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp.</div>
                            </div>
                            <input type="text" name="jumlah" class="form-control uang" id="inlineFormemail2">
                        </div>

                    </div>
                    <div class="form-group">
                        <label>Tanggal Donasi </label>
                        <input type="date" name="tgl_donasi" class="form-control" required
                            data-parsley-trigger="keyup" autocomplete="off" />
                    </div>


                    <div class="form-group">
                        <button type="submit" name="submit" id="load1" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Processing " class="btn btn-primary"> Simpan </button>
                    </div>

                </form>

            </div>
        </div>
       
    </div>
</div>




@endsection
