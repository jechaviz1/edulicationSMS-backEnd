<!-- Extends template page-->
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
    <style>
        @media (min-width: 1200px) {
            .modal-xxl {
                --bs-modal-width: 1502px;
            }
        }
    </style>
    @if ($message = Session::get('success'))
        <div class="alert alert-primary alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i
                        class="fa-solid fa-xmark"></i></span>
            </button>
            <strong>Success!</strong> {{ $message }}
        </div>
    @endif
    <div class="col-xl-12 events">
        <div class="card dz-card" id="accordion-four">
            <div class="card-header">
                <h4 class="card-title">Add Background Template</h4>
            </div>
            <div class="card-block p-3">
                <div class="row">
                    <div class="col-6 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                     
                        <form action="{{ route('document.certificate.template.update') }}" method="POST"  enctype="multipart/form-data">
                            @csrf()
                            @method('POST')
                                    <input type="hidden" name="template_id" value="{{$certificate->id}}" >
                                   <label for="">Template Name</label>
                                   <input type="text" class="form-control" name="name" value="{{$certificate->name}}">
                                   <p> Image Format: jpg | gif | png;</p>
                                   <label for="">Image Size:</label>
                                   <div class="col-sm-10">
                                    <label for="template" class="">Image Size:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dpi" id="flexRadioDefault1" value="72dpi" @if($certificate->dpi == "72dpi") checked  @endif>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            1117x793 pixels for A4 - 72 dpi
                                        </label>
                                    </div>
                                    {{-- @dd($certificate) --}}
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dpi" id="flexRadioDefault2" value="300dpi" @if($certificate->dpi == "300dpi") checked  @endif>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            4656x3297 pixels for A4 - 300 dpi
                                        </label>
                                    </div>
                                </div>
                                    <button class="btn btn-primary mt-3" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop