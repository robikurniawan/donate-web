@extends('layouts.app')
@section('content')
    <div class="">
        <div class="row">
            <div class="col-xl-12">

                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Edit Fraksi</h4>
                </div>



                <div class="mb-5">
                    <div class="card">
                        <div class="card-body">

                            <form id="form" method="POST" action="{{ route('fraksi.update')  }}" data-parsley-validate="">
                                @CSRF
                                <input type="hidden" name="id" value="{{ $fraksi->id }}">
                                <div class="form-group">
                                    <label>Nama Fraksi </label>
                                    <input type="text" name="name" value="{{ $fraksi->name  }}" class="form-control" required data-parsley-trigger="keyup" autocomplete="off"/>
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


@endsection
