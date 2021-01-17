@extends('layouts.app')
@section('content')

    <div class="">
        <div class="row">
            <div class="col-xl-12">

                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Tambah Slide</h4>
                </div>

                <div class="mb-5">
                    <div class="card">
                        <div class="card-body">
                            <form id="form" method="POST" action="{{ route('slide.store')  }}" data-parsley-validate="" enctype="multipart/form-data">
                                @CSRF
                                <div class="form-group">
                                    <label>Upload Slide </label>
                                    <input type="file" name="images" class="form-control" required data-parsley-trigger="keyup" autocomplete="off"/>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" id="load1" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Processing " class="btn btn-primary"> Upload </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
