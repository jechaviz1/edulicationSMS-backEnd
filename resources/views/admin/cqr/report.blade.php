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
                <h4 class="card-title"> Client Qualifications Register (CQR) Report
                </h4>
            </div>
            <div class="card-block p-3">
                <h6 class="form-title"><span>Generate Report</span></h6>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <!--End for WWB-400-->
                            <div style="float:right">
                            <input type="radio" name="groupView" checked="" onclick="location.href='CQRreport'" checked> New Report &nbsp;&nbsp;
                            <input type="radio" name="groupView" onclick="location.href='CQRreporthistory'"> Report History</div>
                        </div>
                </div>
                    <form action="{{ route('company.CQR.store')}}" method="post" >
                    @csrf()
                    @method('POST')
                    <div class="row">
                        <div class="col-4">Reporting State</div>
                        <div class="col-8">
                            <select class="form-control" name="reportingState" id="reportingState">
                               @foreach ($states as $state)
                               <option value="{{ $state->id }}">{{ $state->name }}</option>
                               @endforeach
                            </select>
                        </div>
                    </div>
                <div class="row mt-3">
                    <div class="col-4">Certificate Issue Date From</div>
                    <div class="col-8">
                        <input type="date" name="exportDateFrom" id="exportDateFrom" class="form-control" >
                        </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">Certificate Issue Date To</div>
                    <div class="col-8"><input type="date" name="exportDateTo" id="exportDateTo" class="form-control">
                        </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <input type="checkbox" name="qualification" value="qualification">&nbsp;Qualifications&nbsp;
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <input type="checkbox" name="soa" value="soa">&nbsp;Statement of Attainment&nbsp;<img
                            data-toggle="tooltip" title="" src="../images/icon_k.gif" id="soaReport"
                            data-original-title="Select to create a list of each unit completed by learners along with their certificate/parchment number, suitable for upload to STELA">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <input type="checkbox" name="deletedcertificates" value="deletedcertificates">&nbsp;Deleted
                        Certificates&nbsp;<img src="../images/icon_k.gif" id="deletedCertificatesReport"
                            data-toggle="tooltip" title=""
                            data-original-title="Select to create a list of all deleted certificates">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12"><button type="submit" class="btn btn-primary">Generate</button></div>
                </div>
            </form>


            </div>
        </div>
    @stop
    @push('scripts')
    @endpush
