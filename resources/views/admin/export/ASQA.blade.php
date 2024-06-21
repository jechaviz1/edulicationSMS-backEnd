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
                <h4 class="card-title">Export ASQA</h4>
            </div>
            <div class="card-block p-3">
                <h6 class="form-title"><span>Export ASQA</span></h6>
                <div class="row">
                    <div class="col-lg-6">
                        <h6>Filters</h6>
                        <form action="{{ route('exportASQA.export') }}" method="post"  enctype="multipart/form-data">
                            @csrf()
                            @method('POST')
                            <div class="row mt-3">
                                <div class="col-3">Enrolment Date</div>
                                <div class="col-5">
                                    <input type="date" id="ASQAdivFrom1" name="ASQAdivFrom1" placeholder="From"
                                        class="form-control">
                                </div>
                                <div class="col-4">
                                    <input type="date" id="ASQAdivTo1" name="ASQAdivTo1" placeholder="To"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3">Completion Date</div>
                                <div class="col-5">
                                    <input type="date" id="ASQAdivFrom2" name="ASQAdivFrom2" placeholder="From"
                                        class="form-control">
                                </div> 
                                <div class="col-4">
                                    <input type="date" id="ASQAdivTo2" name="ASQAdivTo2" placeholder="To"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3">Activity Start Date</div>
                                <div class="col-5">
                                    <input type="date" id="ASQAdivFrom3" name="ASQAdivFrom3" placeholder="From"
                                        class="form-control">
                                </div>
                                <div class="col-4">
                                    <input type="date" id="ASQAdivTo3" name="ASQAdivTo3" placeholder="To"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3">Activity End Date</div>
                                <div class="col-5">
                                    <input type="date" id="ASQAdivFrom4" name="ASQAdivFrom4" placeholder="From"
                                        class="form-control">
                                </div>
                                <div class="col-4">
                                    <input type="date" id="ASQAdivTo4" name="ASQAdivTo4" placeholder="To"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3">Certificate Issue Date</div>
                                <div class="col-5">
                                    <input type="date" id="ASQAdivFrom6" name="ASQAdivFrom6" placeholder="From"
                                        class="form-control">
                                </div>
                                <div class="col-4">
                                    <input type="date" id="ASQAdivTo6" name="ASQAdivTo6" placeholder="To"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3">
                                    <select class="js-example-basic-single form-control" name="qualificationOpt[]" multiple>
                                        <option value="AL">Alabama</option>
                                        
                                      </select>
                                </div>
                                <div class="col-5">
                                    <input autocomplete="off" type="date" id="ASQAdivFrom5"
                                        name="ASQAdivFrom5" placeholder="From" class="form-control">
                                </div>
                                <div class="col-4">
                                    <input autocomplete="off" type="date" id="ASQAdivTo5"
                                        name="ASQAdivTo5" placeholder="To" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3">Courses</div>
                                <div class="col-5">
                                    <select class="js-example-basic-single form-control" name="filter_course[]" id="filter_course" multiple>
                                        <option value="AL">jinaba</option>
                                        
                                      </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h6>Column Options</h6>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3">Activity Start Date</div>
                                <div class="col-9">
                                    <select id="colActivityStartDate" name="colActivityStartDate" class="form-control" fdprocessedid="pl7qk">
                                        <option value="1">Course Commencement Date</option>
                                        <option value="2">Enrolment Date</option>
                                        <option value="3">First Unit Start Date</option>															
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3">Activity End Date</div>
                                <div class="col-9">
                                    <select id="colActivityEndDate" name="colActivityEndDate" class="form-control" fdprocessedid="52atq2">
                                        <option value="1">Only use the date the Qualification Status was updated</option>
                                        <option value="2">Only use the Anticipated Course Completion Date</option>
                                        <option value="3">Use the earlier of the Qualification Status or Anticipated Course Completion Date</option>	
                                        <option value="4">The latest date the learner completed any unit</option>
                                        <option value="5">The last date of the Course Event in which the learner was enrolled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-primary" value="Generate" fdprocessedid="s1tms">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-2"></div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
        </div>
    @stop