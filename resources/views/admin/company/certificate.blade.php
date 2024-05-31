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
                <h4 class="card-title">Certificate Templates
                </h4>
            </div>
            <div class="card-block p-3">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Add Certificate Template
                        </button>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Template Name</th>
                                <th scope="col">Default</th>
                                <th scope="col">Background  Template </th>
                                <th scope="col">Associated course</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($templates as $template)
                            {{-- @dd($template) --}}
                            <tr>
                                <th scope="row">{{ $template->newCertificateName  }}</th>
                                <td> @if($template->is_default != 0) Yes @else <a href="?makeDefault={{$template->id}}">Make Default</a> @endif</td>
                                <td>{{ $template->default }}</td>
                                <td>{{ $template->default }}</td>
                                <td>
                                    <a href="{{ route('certificate.copy',$template->id)}}"><i class="fa fa-clone"></i></a>
                                    <a href="{{ route('certificate.template.edit',$template->id)}}"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('certificate.template.destroy',$template->id)}}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach 
                            </tbody>
                          </table>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Certificate Template</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        <div class="row">
                                            <div class="col-sm-12">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <form action="{{ route('certificate.template') }} " method="POST">
                                            @csrf()
                                            @method('Post')
                                            <div class="mb-3 row p-3">
                                                <label for="template" class="col-sm-2 col-form-label">Template Name </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="newCertificateName"
                                                        id="newCertificateName">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal End-->
    <style>
        .modal-backdrop {
            display: none;
        }
    </style>
    <script type="text/javascript"></script>
@stop
@push('scripts')
@endpush
