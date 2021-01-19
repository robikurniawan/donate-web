@extends('layouts.public')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="banner" style="padding:30px 10px;">
            <h1>{{ profil()->judul }}</h1>
            <p>
               {{ profil()->deskripsi }}
            </p>
            <br>


            <a href="#" class="btn btn-success">
                <i class="uil-whatsapp"></i> Bagikan ke WhatsApp
            </a>

            <a href="#" class="btn btn-primary">
                <i class="uil-facebook"></i> Bagikan ke Facebook
            </a>

        </div>
    </div>
    <div class="col-md-6">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox" style="border-radius: 9px;">
                @foreach ($slides as $slide)
                <div class="carousel-item {{ ($loop->iteration == "1") ? "active":""  }}">
                    <img class="d-block img-fluid"
                        src="{{ asset('uploads/'.$slide->images.'') }}"
                       style="width:100%; object-fit: cover; height: 350px;">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-4">
        <div class="card bg-info">
            <div class="card-body">
                <div>
                    <h1 class="text-white">
                        <div class="counter" data-count="{{ $total }}">Rp.0</div>
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
        <div class="card bg-success">
            <div class="card-body ">
                <div>
                    <h1 class="text-white">
                        <div class="counter" data-count="{{ $total - $totalKeluar }}">Rp.0</div>
                    </h1>
                    <p class="text-white mb-0">Sisa Dana</p>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="card mt-4">
    <div class="card-body">
        <ul class="nav nav-pills nav-justified bg-light" role="tablist">
            <li class="nav-item waves-effect waves-light">
                <a class="nav-link active" data-toggle="tab" href="#navpills2-home" role="tab">
                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                    <span class="d-none d-sm-block">Donatur</span>
                </a>
            </li>
            <li class="nav-item waves-effect waves-light">
                <a class="nav-link" data-toggle="tab" href="#navpills2-message" role="tab">
                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                    <span class="d-none d-sm-block">Disbursement</span>
                </a>
            </li>

            <li class="nav-item waves-effect waves-light">
                <a class="nav-link" data-toggle="tab" href="#navpills2-profile" role="tab">
                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                    <span class="d-none d-sm-block">Rekening Donasi</span>
                </a>
            </li>


        </ul>

        <!-- Tab panes -->
        <div class="tab-content p-3 text-muted">
            <div class="tab-pane active" id="navpills2-home" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-borderless table-centered table-nowrap">
                        <tbody>
                            @foreach ($donaturs as $item)
                            <tr>
                                <td style="width: 20px;">
                                    <img src="https://ui-avatars.com/api/name={{  $item->nama_donatur }}" class="avatar-xs rounded-circle " alt="...">
                                </td>
                                <td>
                                    <h6 class="font-size-15 mb-1 font-weight-normal">{{  $item->nama_donatur }}  <small><i class="uil-calendar"></i>  {{  tgl_indo($item->tgl_donasi) }} </small> </h6>

                                    <b> Donasi: Rp. {{ number_format($item->jumlah) }} </b>
                                </td>

                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-center">
                        <a href="{{  route('public.donatur') }}"> Selengkapnya.. </a>
                    </div>
                </div>
            </div>
            <div class="tab-pane " id="navpills2-message" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-border table-centered table-nowrap">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Transaksi</th>
                            <th>Jumlah</th>
                        </tr>
                        <tbody>
                            @foreach ($keluars as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ tgl_indo($item->tanggal) }}</td>
                                <td>
                                    {{ $item->item }}
                                </td>
                                <td>
                                    Rp. {{ number_format($item->jumlah) }}
                                </td>

                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-center">
                        <a href="{{  route('public.disbursement') }}"> Selengkapnya.. </a>
                    </div>
                </div>
            </div>

            <div class="tab-pane " id="navpills2-profile" role="tabpanel">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">  Nomor Rekening :  </label>
                            <h5>{{ profil()->norek }}</h5>
                        </div>
                        <div class="form-group">
                            <label for=""> Bank :  </label>
                            <h5>{{ profil()->bank }}</h5>
                        </div>
                        <div class="form-group">
                            <label for="">  Atas Nama :  </label>
                            <h5>{{ profil()->an_bank }}</h5>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <h6> <i class="uil-map-marker"></i> {{ profil()->alamat }} </h6>
                        <h6> <i class="uil-whatsapp"></i> {{  profil()->kontak }} </h6>
                    </div>

                </div>
            </div>


        </div>
    </div>
</div>



@endsection
