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
                <h4 class="card-title">Document Update</h4>
            </div>
            <div class="card-block p-3">
                <div class="row">
                    <div class="col-6 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                     
                        <form action="{{ route('document.upload.update') }}" method="POST"  enctype="multipart/form-data">
                            @csrf()
                            @method('POST')
                                    <input type="hidden" name="template_id" value="{{$id}}" >
                                    <label for="">Document Name</label>
                                    <input type="text" class="form-control" name="document_name" value="{{$template->document_name}}">
                                    <label class="mt-3" for="">Upload</label>
                                    <input type="file" class="form-control" name="file">
                                    <button class="btn btn-primary mt-3" type="submit">Save</button>
                        </form>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop