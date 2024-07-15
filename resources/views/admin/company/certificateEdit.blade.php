@php
    use Carbon\Carbon;

@endphp
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
                <h4 class="card-title"> Edit Template
                </h4>
            </div>
            <div class="card-block p-3">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <!-- Button trigger modal -->
                        <a class="btn btn-primary" href="{{ route('company.certificate') }}">
                            Add Certificate Template
                        </a>
                        <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">Laypout
                                    Setting</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">Background
                                    Template </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                    type="button" role="tab" aria-controls="contact" aria-selected="false">Associated
                                    Courses</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="text_editor-tab" data-bs-toggle="tab"
                                    data-bs-target="#text_editor" type="button" role="tab" aria-controls="text_editor"
                                    aria-selected="false">Text Editor</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">

                                <form action="{{ route('certificate.template.update', $template->id) }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf()
                                    @method('PUT')
                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <div class="mb-3 row">
                                                <label for="template_name" class="col-sm-2 col-form-label">Template
                                                    Name:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" value="{{ $template->newCertificateName }}"
                                                        class="form-control" name="newCertificateName" id="template_name">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="leading_text" class="col-sm-2 col-form-label">Leading
                                                    Text:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" value="{{ $template->leading_text }}"
                                                        class="form-control" id="leading_text"
                                                        value="{{ $template->leading_text }}" name="leading_text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3 row">
                                                <label for="inputPassword"
                                                    class="col-sm-2 col-form-label">Orientation:</label>
                                                <div class="col-sm-10">
                                                    <div class="d-flex">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="portrait"
                                                                name="orientation" id="portrait"
                                                                @if ($template->orientation == 'portrait') checked @endif>
                                                            <label class="form-check-label" for="portrait">
                                                                Portrait
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input ms-3" type="radio"
                                                                value="landscape" name="orientation" id="landscape"
                                                                @if ($template->orientation == 'landscape') checked @endif>
                                                            <label class="form-check-label" for="landscape">
                                                                Landscape
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Size:</label>
                                                <div class="col-sm-10">
                                                    <div class="d-flex">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="A4"
                                                                name="size" id="a4"
                                                                @if ($template->size == 'A4') checked @endif>
                                                            <label class="form-check-label" for="a4">
                                                                A4
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input ms-3" type="radio"
                                                                value="A3" name="size" id="a3"
                                                                @if ($template->size == 'A3') checked @endif>
                                                            <label class="form-check-label" for="a3">
                                                                A3
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="trailing_text" class="col-sm-2 col-form-label">Trailing
                                                    Text:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" value="{{ $template->trailing_text }}"
                                                        class="form-control" name="trailing_text" id="trailing_text">
                                                </div>
                                            </div>

                                        </div>

                                        @php
                                            $p = json_decode($template->signing_authority, true);
                                            $q = json_decode($template->secound_signing, true);
                                            // dd($p);
                                        @endphp
                                        <div class="row">
                                            {{-- @dd($p['signing_authority_name']) --}}
                                            <div class="col-sm-6">
                                                <div class="mt-3">
                                                    <h5>Signing Authority </h5>
                                                    <div class="mb-3 row">
                                                        <label for="signing_authority_name"
                                                            class="col-sm-2 col-form-label">Name:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text"
                                                                value="@if ($p != null) {{ $p['signing_authority_name'] }} @endif"
                                                                name="signing_authority_name" class="form-control"
                                                                id="signing_authority_name">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="signing_authority_title"
                                                            class="col-sm-2 col-form-label">Title:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text"
                                                                value="@if ($p != null) {{ $p['signing_authority_title'] }} @endif"
                                                                name="signing_authority_title" class="form-control"
                                                                id="signing_authority_title">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mt-3">
                                                    <h5>Second Signing Authority</h5>
                                                    <div class="mb-3 row">
                                                        <label for="secound_signing_name"
                                                            class="col-sm-2 col-form-label">Name:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text"
                                                                value="@if ($q != null) {{ $q['secound_signing_name'] }} @endif"
                                                                name="secound_signing_name" value=""
                                                                class="form-control" id="secound_signing_name">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="secound_signing_title"
                                                            class="col-sm-2 col-form-label">Title:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text"
                                                                value="@if ($q != null) {{ $q['secound_signing_title'] }} @endif"
                                                                name="secound_signing_title" class="form-control"
                                                                id="secound_signing_title">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary"> Save Setting <button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal"
                                    data-bs-target="#background_template">
                                    Add Background Template
                                </button>
                                <p class="mt-2">Choose the Background Template which will be used in the generation of
                                    this Certificate Template</p>
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <form action="{{ route('update.background.template')}}" method="post" >
                                            @csrf()
                                            @method('POST')
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Template</th>
                                                    <th scope="col">Added By</th>
                                                    <th scope="col">Upload On</th>
                                                    <th scope="col">Dpi</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($backgroundTemplate as $template)
                                                    @php
                                                        $formattedDate = Carbon::parse($template->created_at)->format(
                                                            'd/m/Y',
                                                        );
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="template" id="tatemple" value="{{$template->id}}" @if($template->select == '1') checked @endif>
                                                            </div>
                                                        </td>
                                                        <td>{{ $template->name }}</td>
                                                        <td>{{ $template->added_by }}</td>
                                                        <td>{{ $formattedDate }}</td>
                                                        <td>{{ $template->dpi }}</td>
                                                        <td><a style="cursor: pointer;background: #20a8d8;color:#fff;padding:5px;"
                                                                href="{{ asset($template->image) }}"
                                                                target="_blank">Preview</a>
                                                            <a style="cursor: pointer;background: #f8cb00;color:#fff;padding:5px;"
                                                                href="{{ asset($template->image) }}"
                                                                target="_blank">Edit</a>
                                                        </td>
                                                    </tr>
                                                        
                                                @endforeach
                                                   
                                            </tbody>
                                        </table>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </form>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td style="font-size:1rem; margin-bottom:1rem;" colspan="2"><b>
                                                    <div style="margin-bottom:1.5rem;">software</div>
                                                </b></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="courses" disabled="" id="course2565"
                                                    value="2565">
                                            </td>
                                            <td>
                                                <label style="font-size:0.9rem;margin:0.2rem 0.1rem;"
                                                    for="course2565">BSB40820 - Certificate IV in marketing and
                                                    communication</label>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="text_editor" role="tabpanel" aria-labelledby="contact-tab">
                                <textarea name="" id="" cols="30" rows="10" class="form-control mt-3">

                                </textarea>
                                <div class="mt-3">
                                  <button class="btn btn-primary">Save</button>
                                  <button class="btn btn-primary">Preview</button>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="background_template" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Background Template</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        <div class="row">
                                            <div class="col-sm-12">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <form action="{{ route('certificate.template.background') }}" class=""
                                            method="POST" enctype="multipart/form-data">
                                            @csrf()
                                            @method('POST')
                                            <input type="hidden" class="form-control" name="templates_id"
                                                value="{{ $template->id }}">
                                            <div class=" row p-3">
                                                <label for="template" class="col-sm-3 col-form-label">Template Name
                                                </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="template"
                                                        id="newCertificateName" placeholder="Template Name">
                                                </div>
                                            </div>
                                            <div class="row p-3">
                                                <label for="template" class="col-sm-3 col-form-label">File</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control" name="image">
                                                    <p class="m-0">Image Format: jpg | gif | png;
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="mb-3 row p-3">
                                                <div class="col-sm-2"> </div>
                                                <div class="col-sm-10">
                                                    <label for="template" class="">Image Size:</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dpi"
                                                            id="flexRadioDefault1" value="72dpi">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            1117x793 pixels for A4 - 72 dpi
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dpi"
                                                            id="flexRadioDefault2" value="300dpi">
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            4656x3297 pixels for A4 - 300 dpi
                                                        </label>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                        </form>
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
