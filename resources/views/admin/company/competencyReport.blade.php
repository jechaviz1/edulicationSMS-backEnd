@php
    use Carbon\Carbon;
@endphp
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
    <div class="col-xl-12 events">
        <div class="card dz-card" id="accordion-four">
            <div class="card-header">
                <h4 class="card-title">Competency Report</h4>
            </div>
            <div class="row mt-4 p-2">
                <div class="col-sm-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Layout Setting </button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Background Template</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Text Editor</button>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <form method="POST" id="ReportSettingForm" action="{{ route('competency.report.background')}}" class="w-50">
                                @csrf()
                                @method('POST')
                                <div class="mb-3"><span>These layout settings will be applied to all company templates</span></div>
                                <div>
                                    <span class="w-25 d-inline-block">Orientation:</span>
                                    <label for="Portrait" class="ml-3"><input type="radio" name="orientation" value="P" id="Portrait" checked="checked"> Portrait</label>
                                    <label for="Landscape"><input type="radio" name="orientation" value="L" id="Landscape"> Landscape</label>
                                    
                                </div>	
                                <div>	
                                    <span class="w-25 d-inline-block">Size:</span>
                                    <label for="A4" class="ml-3"><input type="radio" name="size" value="A4" id="A4" checked="checked"> A4</label>
                                    <label for="A3"><input type="radio" name="size" value="A3" id="A3"> A3</label>
                                </div>
                        
                                <div>	
                                    <span class="w-25 d-inline-block">Show Footer:</span>
                                    <label for="A4" class="ml-3"><input type="radio" name="show" value="1" id="A4"> Yes</label>
                                    <label for="A3"><input type="radio" name="show" value="0" id="A3" checked="checked"> No</label>
                                </div>
                        
                                <div style="float:left; clear: none;">
                                <button  type="submit" class="btn btn-primary mt-3">Save Settings</button>
                                </div>
                                <div style="float:left; clear;none;">
                                <div id="ResultMessage" style="display:none; font-weight:bold; padding:10px;"></div>
                                </div>
                                <div style="clear:both;"></div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#add-template">
                                Add Template
                            </button>

                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                           <div class="mt-3">

                            <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
                                <div class="mt-3">
                                    <button class="btn btn-primary">Save</button>
                                    <button class="btn btn-primary">Preview</button>
                                </div>
                           </div>
                            
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="add-template" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Add Template</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="p-3">
                    <form action="{{ route('certificate.template.background') }}" class=""
                    method="POST" enctype="multipart/form-data">
                    @csrf()
                    @method('POST')
                    {{-- <input type="hidden" class="form-control" name="templates_id"
                        value="{{ $template->id }}"> --}}
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
    </div>
    <style>
        .modal-backdrop {
            display: none;
        }
    </style>
@stop

                