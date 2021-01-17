@extends('layouts.app')
@section('content')
    <div class="">
        <div class="row">
            <div class="col-xl-12">

                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Edit Slide</h4>
                </div>


                <div class="mb-5">
                    <div class="card">
                        <div class="card-body">

                            <form id="form" method="POST" action="{{ route('slide.update')  }}" data-parsley-validate="" enctype="multipart/form-data">
                                @CSRF
                                <input type="hidden" name="id" value="{{ $slide->id }}">
                                <div class="form-group">
                                    <label>Update Slide </label>
                                    <input type="file" name="images" class="form-control" required data-parsley-trigger="keyup" autocomplete="off"/>
                                </div>
                                <img src="{{ asset('uploads/'.$slide->images.'') }}" width="300px" alt="">
                                
                                <div class="form-group mt-3">
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
