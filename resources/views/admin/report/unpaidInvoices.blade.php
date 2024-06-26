@php
    use Carbon\Carbon;
@endphp
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
    <div class="col-xl-12 events">
        <div class="card dz-card" id="accordion-four">
            <div class="card-header">
                <h4 class="card-title">Reports - Invoices and Payments</h4>
            </div>
            <div class="card-block p-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="result" class="adminRightPart">

                            <table border="0" align="left" cellpadding="0" cellspacing="0" style="width: 60%;">
                                <tbody>
                                    <tr>
                                        <td align="left" style="vertical-align:middle">
                                            <input checked="" type="radio" id="rptType1" name="rptType"
                                                value="1" onchange="toggleList();">&nbsp;<strong>Fee Schedule and
                                                Raised Invoices</strong>
                                        </td>
                                        <td align="left" style="vertical-align:middle">
                                            <input type="radio" id="rptType2" name="rptType" value="2"
                                                onchange="toggleList();">&nbsp;<strong>Payments Received</strong>
                                        </td>
                                        <td align="left" style="vertical-align:middle">
                                            <input type="radio" id="rptType3" name="rptType" value="3"
                                                onchange="toggleList();">&nbsp;<strong>Unpaid Invoices</strong>
                                        </td>
                                        <td align="left" style="vertical-align:middle">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" colspan="3">
                                            <strong>
                                                <select style="height: 35px;" name="dateType" id="dateType"
                                                    onchange="toggleList();" fdprocessedid="0hrpr5">
                                                    <option selected="" value="1" onchange="toggleList();">Invoice
                                                        Scheduled Date</option>
                                                    <option value="2" onchange="toggleList();">Invoice Date</option>
                                                </select>&nbsp;&nbsp;
                                                From</strong>&nbsp;<input type="text" value="25 June 2023"
                                                name="fromDate" id="fromDate" placeholder="Enter from date"
                                                class="hasDatepicker" fdprocessedid="uhkmph"><img
                                                class="ui-datepicker-trigger" src="../images/calendaricon.gif"
                                                alt="..." title="..."> &nbsp;&nbsp;

                                            <strong>To</strong>&nbsp;<input type="text" value="" name="toDate"
                                                id="toDate" placeholder="Enter to date" class="hasDatepicker"
                                                fdprocessedid="hzrgc5i"><img class="ui-datepicker-trigger"
                                                src="../images/calendaricon.gif" alt="..." title="...">
                                            <button type="button" class="btn btn-primary" style="margin-left:10px;"
                                                onclick="checkSubmittedForm();" fdprocessedid="9wz8zg">Go</button>

                                        </td>
                                        <td align="right" style="padding-right:5px;">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table border="0" align="left" cellpadding="0" cellspacing="0" width="100%">

                                <tbody>
                                    <tr>
                                        <td colspan="7" valign="top">
                                            <div id="unpaidInvoices_wrapper" class="dataTables_wrapper no-footer">
                                                <div class="top">
                                                    <div id="unpaidInvoices_filter" class="dataTables_filter">
                                                        <label>Search:<input type="search" class="" placeholder=""
                                                                aria-controls="unpaidInvoices"></label></div>
                                                    <div class="dt-buttons"><button
                                                            class="buttons-excel buttons-html5 btn btn-primary"
                                                            tabindex="0" aria-controls="unpaidInvoices" type="button"
                                                            title="Export to Excel" fdprocessedid="fz8zo4r"><span><i
                                                                    class="fa fa-file-excel-o fa-2x"></i></span></button>
                                                    </div>
                                                </div>
                                                <table id="unpaidInvoices" class="table table-striped dataTable no-footer"
                                                    cellpadding="0" cellspacing="0" width="100%" role="grid"
                                                    aria-describedby="unpaidInvoices_info" style="width: 100%;">
                                                    <thead>
                                                        <tr role="row">
                                                            <th align="center" class="sorting_asc" tabindex="0"
                                                                aria-controls="unpaidInvoices" rowspan="1"
                                                                colspan="1" aria-sort="ascending"
                                                                aria-label="Student Name: activate to sort column descending"
                                                                style="width: 66px;">Student Name</th>
                                                            <th align="center" class="sorting" tabindex="0"
                                                                aria-controls="unpaidInvoices" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Course Code: activate to sort column ascending"
                                                                style="width: 57px;">Course Code</th>
                                                            <th align="center" class="sorting" tabindex="0"
                                                                aria-controls="unpaidInvoices" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Contact: activate to sort column ascending"
                                                                style="width: 51px;">Contact</th>
                                                            <th align="center" class="sorting" tabindex="0"
                                                                aria-controls="unpaidInvoices" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Email: activate to sort column ascending"
                                                                style="width: 36px;">Email</th>
                                                            <th align="center" class="sorting" tabindex="0"
                                                                aria-controls="unpaidInvoices" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Enrolment Date: activate to sort column ascending"
                                                                style="width: 80px;">Enrolment Date</th>
                                                            <th align="center" class="sorting" tabindex="0"
                                                                aria-controls="unpaidInvoices" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Scheduled Date: activate to sort column ascending"
                                                                style="width: 79px;">Scheduled Date</th>
                                                            <th align="center" class="sorting" tabindex="0"
                                                                aria-controls="unpaidInvoices" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Scheduled Fee: activate to sort column ascending"
                                                                style="width: 77px;">Scheduled Fee</th>
                                                            <th align="center" class="sorting" tabindex="0"
                                                                aria-controls="unpaidInvoices" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Fee Type: activate to sort column ascending"
                                                                style="width: 40px;">Fee Type</th>
                                                            <th align="center" class="sorting" tabindex="0"
                                                                aria-controls="unpaidInvoices" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Invoice #: activate to sort column ascending"
                                                                style="width: 51px;">Invoice #</th>
                                                            <th align="center" class="sorting" tabindex="0"
                                                                aria-controls="unpaidInvoices" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Invoice Amount: activate to sort column ascending"
                                                                style="width: 70px;">Invoice Amount</th>
                                                            <th align="center" class="sorting" tabindex="0"
                                                                aria-controls="unpaidInvoices" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Invoice Date: activate to sort column ascending"
                                                                style="width: 59px;">Invoice Date</th>
                                                            <th align="center" class="sorting" tabindex="0"
                                                                aria-controls="unpaidInvoices" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Invoice Due Date: activate to sort column ascending"
                                                                style="width: 68px;">Invoice Due Date</th>
                                                            <th align="center" class="sorting" tabindex="0"
                                                                aria-controls="unpaidInvoices" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Fees Outstanding: activate to sort column ascending"
                                                                style="width: 93px;">Fees Outstanding</th>
                                                            <th align="center" class="sorting" tabindex="0"
                                                                aria-controls="unpaidInvoices" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Payment Status: activate to sort column ascending"
                                                                style="width: 72px;">Payment Status</th>
                                                            <th align="center" style="width: 35px;" class="sorting"
                                                                tabindex="0" aria-controls="unpaidInvoices"
                                                                rowspan="1" colspan="1"
                                                                aria-label=": activate to sort column ascending"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr class="odd">
                                                            <td valign="top" colspan="15" class="dataTables_empty">No
                                                                data available in table</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="bottom">
                                                    <div class="dataTables_info" id="unpaidInvoices_info" role="status"
                                                        aria-live="polite">Showing 0 to 0 of 0 entries</div>
                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                        id="unpaidInvoices_paginate"><a
                                                            class="paginate_button previous disabled"
                                                            aria-controls="unpaidInvoices" data-dt-idx="0" tabindex="-1"
                                                            id="unpaidInvoices_previous">Previous</a><span></span><a
                                                            class="paginate_button next disabled"
                                                            aria-controls="unpaidInvoices" data-dt-idx="1" tabindex="-1"
                                                            id="unpaidInvoices_next">Next</a></div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="height:10px;"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" align="right"><strong>Total Amount:</strong> $0</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div id="showXERO" style="display:none">
                                <form id="createXEROInvoice">
                                    <input type="hidden" name="enrolmentIdX" value="" class="form-control">
                                    <input type="hidden" name="firstNameX" value="">
                                    <input type="hidden" name="lastNameX" value="">
                                    <input type="hidden" id="feeIdX" name="feeIdX" value="">
                                    <div class="form-group row">
                                        <label for="invoiceDate" class="col-sm-4 col-form-label">Invoice Date</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" id="invoiceDateX"
                                                name="invoiceDateX" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="invoiceAmount" class="col-sm-4 col-form-label">Invoice Amount</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="invoiceAmountX"
                                                name="invoiceAmountX" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="invoiceDescription" class="col-sm-4 col-form-label">Invoice
                                            Description</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="invoiceDescriptionX"
                                                name="invoiceDescriptionX" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dueDate" class="col-sm-4 col-form-label">Due Date</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" id="dueDateX" name="dueDateX"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="paymentType" class="col-sm-4 col-form-label">Payment Type</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="paymentType" name="paymentType">
                                                <option value="Tuition">Tuition</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- add a payrix invoice -->
                            <div id="addPayrixInvoice" style="display:none">
                                <form id="createPayrixInvoice" class="needs-validation" novalidate="">
                                    <input type="hidden" name="feeIdPI" id="feeIdPI" value=""
                                        class="form-control">
                                    <input type="hidden" name="enrolmentId" id="enrolmentId" value=""
                                        class="form-control">
                                    <div class="form-group row">
                                        <label for="prIEmailTemplate" class="col-sm-4 col-form-label">Email
                                            Template</label>
                                        <div class="col-sm-8">
                                            <select class="form-control PR" id="prIEmailTemplate"
                                                name="prIEmailTemplate">
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- add or record an invoice -->
                            <div id="addInvoice" style="display:none">
                                <form id="createInvoice" class="needs-validation" novalidate="">
                                    <input type="hidden" name="feeId" id="feeId" value=""
                                        class="form-control">
                                    <input type="hidden" name="enrolmentId" id="enrolmentId" value=""
                                        class="form-control">
                                    <div class="form-group row">
                                        <label for="invoiceNumber" class="col-sm-4 col-form-label">Invoice Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control IN" id="invoiceNumber"
                                                name="invoiceNumber" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="invoiceDate" class="col-sm-4 col-form-label">Invoice Date</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control ID" id="invoiceDate"
                                                name="invoiceDate" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="invoiceAmount" class="col-sm-4 col-form-label">Invoice Amount</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control IA" id="invoiceAmount"
                                                name="invoiceAmount" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="invoiceDescription" class="col-sm-4 col-form-label">Invoice
                                            Description</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control IDS" id="invoiceDescription"
                                                name="invoiceDescription" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dueDate" class="col-sm-4 col-form-label">Due Date</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control DD" id="dueDate" name="dueDate"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="paymentType" class="col-sm-4 col-form-label">Payment Type</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="paymentType" name="paymentType">
                                                <option value="Tuition">Tuition</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">Make Payment</div>
                                        <div class="col-sm-8">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="noPayment"
                                                    name="isPaid" value="N" checked="">
                                                <label for="isPaid" class="form-check-label">
                                                    No
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="fullPayment"
                                                    name="isPaid" value="Y">
                                                <label for="fullPayment" class="form-check-label">
                                                    Full Payment
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="partPayment"
                                                    name="isPaid" value="N">
                                                <label for="partPayment" class="form-check-label">
                                                    Part Payment
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="hide" style="display: none;">
                                    <div class="form-group row hide" style="display: none;">
                                        <label for="pd" class="col-sm-4 col-form-label">Payment Date</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control PD" id="pd"
                                                name="paymentDate">
                                        </div>
                                    </div>
                                    <div class="form-group row hide" style="display: none;">
                                        <label for="pa" class="col-sm-4 col-form-label">Payment Amount</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control PA" id="pa"
                                                name="paymentAmount">
                                        </div>
                                    </div>
                                    <div class="form-group row hide" style="display: none;">
                                        <label for="payer" class="col-sm-4 col-form-label">Payer</label>
                                        <div class="col-sm-8">
                                            <select class="form-control P" id="payer" name="payer">
                                                <option value="SELF">SELF</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row hide" style="display: none;">
                                        <label for="payerName" class="col-sm-4 col-form-label">Payer Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control PN" id="payerName"
                                                name="payerName" disabled="">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- make a payment -->
                            <div id="makePayment" style="display:none">
                                <form id="createPayment">
                                    <input type="hidden" id="feeId1" name="feeId1" value="">
                                    <input type="hidden" name="enrolmentId" id="enrolmentId" value=""
                                        class="form-control">
                                    <div class="form-group row">
                                        <label for="paymentDateP" class="col-sm-4 col-form-label">Date</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" id="paymentDateP"
                                                name="paymentDateP">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="paymentAmountP" class="col-sm-4 col-form-label">Amount</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="paymentAmountP"
                                                name="paymentAmountP">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="payerP" class="col-sm-4 col-form-label">Payer</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="payerP" name="payerP">
                                                <option value="SELF">SELF</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="payerNameP" class="col-sm-4 col-form-label">Payer Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control " id="payerNamP" name="payerNameP"
                                                disabled="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">Mark Invoice as Fully Paid</div>
                                        <div class="col-sm-8">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="isPaid1"
                                                    name="isPaid1" value="Y">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- add a payment plan -->
                            <div id="showSchedule" style="display:none">
                                <form id="createSchedule">
                                    <input type="hidden" name="enrolmentId" id="enrolmentId" value=""
                                        class="form-control">
                                    <div class="form-group row">
                                        <label for="plans" class="col-sm-4 col-form-label">Saved Schedules</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="planId" name="planId">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="startDate" class="col-sm-4 col-form-label">Start Date</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" id="startDate" name="startDate">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- confirmation box for deleting a fee -->
                            <div id="confirmationFee" style="display:none">
                                <div class="row">
                                    <div class="col">
                                        <p>Do you really want to delete this scheduled fee?</p>
                                    </div>
                                </div>
                            </div>
                            <!-- confirmation box  for deleting a payment-->
                            <div id="confirmationPayment" style="display:none">
                                <div class="row">
                                    <div class="col">
                                        <p>Do you really want to delete this payment?</p>
                                    </div>
                                </div>
                            </div>

                            <!-- edit a fee schedule  -->
                            <div id="showFee" style="display:none">
                                <form action="" id="editFee">
                                    <input type="hidden" id="feeId2" name="feeId2" value="">
                                    <div class="form-group row">
                                        <label for="scheduleDate" class="col-sm-4 col-form-label">Schedule Date</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" id="scheduleDate"
                                                name="scheduleDate">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="scheduleFee" class="col-sm-4 col-form-label">Schedule Fee</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="scheduleFee"
                                                name="scheduleFee">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="feeType" class="col-sm-4 col-form-label">Fee Type</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="feeType" name="feeType">
                                                <option value="Tuition">Tuition</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- edit an invoice  -->
                            <div id="showInvoice" style="display:none">
                                <form action="" id="editInvoice">
                                    <input type="hidden" id="feeId3" name="feeId3" value="">
                                    <div class="form-group row">
                                        <label for="invoiceNumberI" class="col-sm-4 col-form-label">Invoice Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="invoiceNumberI"
                                                name="invoiceNumberI">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="invoiceAmountI" class="col-sm-4 col-form-label">Invoice Amount</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="invoiceAmountI"
                                                name="invoiceAmountI">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="invoiceDueDateI" class="col-sm-4 col-form-label">Invoice Due
                                            Date</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" id="invoiceDueDateI"
                                                name="invoiceDueDateI">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="invoiceDescriptionI" class="col-sm-4 col-form-label">Invoice
                                            Description</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control IDS" id="invoiceDescriptionI"
                                                name="invoiceDescriptionI" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="feeTypeI" class="col-sm-4 col-form-label">Fee Type</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="feeTypeI" name="feeTypeI">
                                                <option value="Tuition">Tuition</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- edit a payment  -->
                            <div id="showPayment" style="display:none">
                                <form action="" id="editPayment">
                                    <input type="hidden" id="paymentId" name="paymentId" value="">
                                    <input type="hidden" id="feeIdS" name="feeIdS" value="">
                                    <div class="form-group row">
                                        <label for="paymentAmountS" class="col-sm-4 col-form-label">Payment Amount</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="paymentAmountS"
                                                name="paymentAmountS">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="paymentDateS" class="col-sm-4 col-form-label">Payment Date</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" id="paymentDateS"
                                                name="paymentDateS">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="payerS" class="col-sm-4 col-form-label">Payer</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="payerS" name="payerS">
                                                <option value="SELF">SELF</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="payerNameP" class="col-sm-4 col-form-label">Payer Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control " id="payerNameS"
                                                name="payerNameS" disabled="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">Mark Invoice as Fully Paid</div>
                                        <div class="col-sm-8">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="isPaidS"
                                                    name="isPaidS" value="Y">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <script>
                                jQuery("#unpaidInvoices").DataTable({
                                    // "columnDefs": [
                                    // 	{"orderable": false, "targets": []},
                                    // ],
                                    // "searching": false,
                                    // "lengthMenu" : [10, 20, 50, 100]
                                    "dom": '<"top"fB>t<"bottom"ip>',
                                    "buttons": [{
                                        extend: 'excel',
                                        title: 'Invoices and Payments',
                                        text: '<i class="fa fa-file-excel-o fa-2x"></i>',
                                        titleAttr: 'Export to Excel',
                                        className: 'btn btn-primary'
                                    }],
                                });

                                jQuery(function() {
                                    jQuery("#fromDate").datepicker({
                                        inline: true,
                                        dateFormat: 'dd MM yy',
                                        yearRange: '1900:+20',
                                        showOn: 'both',
                                        buttonImage: '../images/calendaricon.gif',
                                        buttonImageOnly: true,
                                        changeMonth: true,
                                        changeYear: true,
                                        showOtherMonths: true,
                                        selectOtherMonths: true
                                    });

                                    jQuery("#toDate").datepicker({
                                        inline: true,
                                        dateFormat: 'dd MM yy',
                                        yearRange: '1900:+20',
                                        showOn: 'both',
                                        buttonImage: '../images/calendaricon.gif',
                                        buttonImageOnly: true,
                                        changeMonth: true,
                                        changeYear: true,
                                        showOtherMonths: true,
                                        selectOtherMonths: true
                                    });

                                    jQuery('.btn').removeClass("dt-button");

                                });

                                jQuery(document).ready(function() {

                                    //are we using XERO - determines which buttons we see at top of invoice tab
                                    jQuery.ajax({
                                        url: '../widgetFunctions/checkXERO.php',
                                        data: {},
                                        type: 'POST',
                                        dataType: 'json',
                                        success: function(response, textStatus, jqXHR) {
                                            console.log(response);
                                            if (response.isXero == '1') {
                                                jQuery('#standardButtons').hide();
                                                jQuery('#xeroButtons').show();
                                                jQuery('#connectXero').show();
                                            } else {
                                                jQuery('#standardButtons').show();
                                                jQuery('#xeroButtons').hide();
                                                jQuery('#connectXero').hide();
                                            }
                                            if (response.expired == true) {
                                                jQuery('#reconnectXero').show();
                                                jQuery('#XERO').hide();
                                            } else {
                                                jQuery('#reconnectXero').hide();
                                                jQuery('#XERO').show();
                                            }
                                            jQuery('#lastUpdated').html(response.updated);
                                        },
                                        error: function(xhr, textStatus, errorThrown) {

                                        }
                                    });


                                    jQuery('#reconnectXero').click(function() {
                                        jQuery.ajax({
                                            url: '../xero/reconnect.php',
                                            data: {},
                                            type: 'POST',
                                            dataType: 'json',
                                            success: function(response, textStatus, jqXHR) {
                                                //console.log(response);
                                                if (response == '0') {
                                                    jQuery('#reconnectXero').hide();
                                                    jQuery('#XERO').show();
                                                } else {
                                                    jQuery('#reconnectXero').show();
                                                    jQuery('#XERO').hide();
                                                }
                                            },
                                            error: function(xhr, textStatus, errorThrown) {

                                            }
                                        });
                                    })

                                    jQuery('#syncXero').click(function() {
                                        jQuery.ajax({
                                            url: '../xero/syncXero.php',
                                            data: {},
                                            type: 'POST',
                                            dataType: 'json',
                                            success: function(response, textStatus, jqXHR) {
                                                console.log(response);
                                                if (response == "0") {
                                                    toggleList();
                                                } else {
                                                    toastr.options.positionClass = 'toast-bottom-full-width';
                                                    toastr["warning"]("Nothing to syncronize");
                                                }
                                            },
                                            error: function(xhr, textStatus, errorThrown) {

                                            }
                                        });
                                    })

                                    jQuery('#refreshData').click(function() {
                                        toggleList();
                                        jQuery.ajax({
                                            url: '../xero/getLastUpdated.php',
                                            data: {},
                                            type: 'POST',
                                            dataType: 'json',
                                            success: function(response, textStatus, jqXHR) {
                                                jQuery('#lastUpdated').html(response);
                                            },
                                            error: function(xhr, textStatus, errorThrown) {

                                            }
                                        });
                                    })

                                    jQuery(".hide").hide();

                                    jQuery('#fullPayment').click(function() {
                                        jQuery(".hide").show();
                                        let fee = jQuery('.IA').val();
                                        jQuery('.PA').val(fee);
                                    })
                                    jQuery('#partPayment').click(function() {
                                        jQuery(".hide").show();
                                        jQuery('.PA').val("");
                                    })
                                    jQuery('#noPayment').click(function() {
                                        jQuery(".hide").hide();
                                    })
                                    jQuery('.P').change(function() {
                                        if (jQuery('.P').val() == "Other") {
                                            jQuery('.PN').prop("disabled", false);
                                        } else {
                                            jQuery('.PN').prop("disabled", true);
                                        }
                                    })
                                    jQuery('#payerP').change(function() {
                                        if (jQuery('#payerP').val() == "Other") {
                                            jQuery('#payerNamP').prop("disabled", false);
                                        } else {
                                            jQuery('#payerNamP').prop("disabled", true);
                                        }
                                    })
                                    jQuery('#payerS').change(function() {
                                        if (jQuery('#payerS').val() == "Other") {
                                            jQuery('#payerNameS').prop("disabled", false);
                                        } else {
                                            jQuery('#payerNameS').prop("disabled", true);
                                        }
                                    })

                                    jQuery('#invoiceAdd').click(function() {
                                        showInvoice();
                                    })

                                    jQuery('#invoiceAddXERO').click(function() {
                                        showXeroInvoice();
                                    })

                                    jQuery('.addSchedule').click(function() {
                                        jQuery.ajax({
                                            url: '../widgetFunctions/getSchedulePlans.php',
                                            data: {
                                                "scheduleId": scheduleId
                                            },
                                            type: 'POST',
                                            dataType: 'html',
                                            success: function(response, textStatus, jqXHR) {
                                                jQuery('#planId').html(response);
                                            },
                                            error: function(xhr, textStatus, errorThrown) {

                                            }
                                        });
                                        jQuery("#showSchedule").dialog({
                                            width: "400px",
                                            title: "Add Fee Schedule",
                                            buttons: [{
                                                    text: "Save",
                                                    class: "btn btn-primary",
                                                    click: function() {
                                                        data = jQuery("#createSchedule").serialize();
                                                        jQuery.ajax({
                                                            url: '../widgetFunctions/loadPaymentPlan.php',
                                                            data: data,
                                                            type: 'POST',
                                                            dataType: 'json',
                                                            success: function(response, textStatus, jqXHR) {
                                                                if (response == '0') {
                                                                    console.log(response);
                                                                    toggleList();
                                                                    jQuery("#showSchedule").dialog(
                                                                        "close");
                                                                } else {
                                                                    console.log(response);
                                                                }
                                                            },
                                                            error: function(xhr, textStatus, errorThrown) {
                                                                console.log(xhr);
                                                            }
                                                        });
                                                    }
                                                },
                                                {
                                                    text: "Close",
                                                    class: "btn btn-secondary",
                                                    click: function() {
                                                        jQuery(this).dialog("destroy");
                                                    }
                                                }
                                            ]
                                        });
                                    })


                                }); //end onload

                                function createPayrixInvoice(id) {
                                    jQuery('#feeIdPI').val(id);
                                    jQuery("#addPayrixInvoice").dialog({
                                        width: "400px",
                                        title: "Send Payrix Invoice",
                                        buttons: [{
                                                text: "Send",
                                                class: "btn btn-primary",
                                                click: function() {
                                                    data = jQuery("#createPayrixInvoice").serialize();
                                                    jQuery.ajax({
                                                        url: '../widgetFunctions/addPayrixInvoice.php',
                                                        data: data,
                                                        type: 'POST',
                                                        dataType: 'json',
                                                        success: function(response, textStatus, jqXHR) {
                                                            if (response == '0') {
                                                                toggleList();
                                                                jQuery("#addPayrixInvoice").dialog("destroy");
                                                            } else {
                                                                console.log(response);
                                                            }
                                                        },
                                                        error: function(xhr, textStatus, errorThrown) {
                                                            console.log(xhr);
                                                        }
                                                    });
                                                }
                                            },
                                            {
                                                text: "Close",
                                                class: "btn btn-secondary",
                                                click: function() {
                                                    jQuery(this).dialog("destroy");
                                                }
                                            }
                                        ]
                                    });
                                }

                                function refreshPayrix(id) {
                                    jQuery.ajax({
                                        url: '../widgetFunctions/checkPayrixInvoiceStatus.php',
                                        data: {
                                            "feeId": id
                                        },
                                        type: 'POST',
                                        dataType: 'json',
                                        success: function(response, textStatus, jqXHR) {
                                            if (response == '0') {
                                                toggleList();
                                            } else {
                                                toastr.options.positionClass = 'toast-bottom-full-width';
                                                toastr.error(response);
                                            }
                                        },
                                        error: function(xhr, textStatus, errorThrown) {

                                        }
                                    });
                                }

                                function showInvoice(id, fee) {
                                    let dialogTitle;
                                    jQuery('#feeId').val(id);
                                    jQuery('.IA').val(fee);
                                    if (fee) {
                                        dialogTitle = "Record Invoice";
                                    } else {
                                        dialogTitle = "Add Invoice"
                                    }
                                    jQuery("#addInvoice").dialog({
                                        width: "400px",
                                        title: dialogTitle,
                                        buttons: [{
                                                text: "Save",
                                                class: "btn btn-primary",
                                                click: function() {
                                                    //validate required fields
                                                    if (jQuery('.ID').val() == "") {
                                                        jQuery(".ID").addClass("error");
                                                        jQuery(".ID").focus();
                                                        return false;
                                                    }
                                                    if (jQuery('.DD').val() == "") {
                                                        jQuery(".DD").addClass("error");
                                                        jQuery(".DD").focus();
                                                        return false;
                                                    }
                                                    if (jQuery('.IN').val() == "") {
                                                        jQuery(".IN").addClass("error");
                                                        jQuery(".IN").focus();
                                                        return false;
                                                    }

                                                    data = jQuery("#createInvoice").serialize();
                                                    jQuery.ajax({
                                                        url: '../widgetFunctions/addEnrolmentInvoice.php',
                                                        data: data,
                                                        type: 'POST',
                                                        dataType: 'json',
                                                        success: function(response, textStatus, jqXHR) {
                                                            if (response == '0') {
                                                                toggleList();
                                                                jQuery("#addInvoice").dialog("destroy");
                                                            } else {
                                                                console.log(response);
                                                            }
                                                        },
                                                        error: function(xhr, textStatus, errorThrown) {
                                                            console.log(xhr);
                                                        }
                                                    });
                                                }
                                            },
                                            {
                                                text: "Close",
                                                class: "btn btn-secondary",
                                                click: function() {
                                                    jQuery(this).dialog("destroy");
                                                }
                                            }
                                        ]
                                    });
                                }

                                function showXeroInvoice(id, fee, enrolmentIdX) {
                                    jQuery('#invoiceAmountX').val(fee);
                                    jQuery('#feeIdX').val(id);
                                    jQuery('#enrolmentIdX').val(enrolmentIdX);
                                    jQuery("#showXERO").dialog({
                                        width: "400px",
                                        title: 'Create invoice in XERO',
                                        buttons: [{
                                                text: "Save",
                                                class: "btn btn-primary",
                                                click: function() {
                                                    //validate required fields
                                                    if (jQuery('#invoiceDateX').val() == "") {
                                                        jQuery("#invoiceDateX").addClass("error");
                                                        jQuery("#invoiceDateX").focus();
                                                        return false;
                                                    }
                                                    if (jQuery('#invoiceAmountX').val() == "") {
                                                        jQuery("#invoiceAmountX").addClass("error");
                                                        jQuery("#invoiceAmountX").focus();
                                                        return false;
                                                    }
                                                    if (jQuery('#invoiceDescriptionX').val() == "") {
                                                        jQuery("#invoiceDescriptionX").addClass("error");
                                                        jQuery("#invoiceDescriptionX").focus();
                                                        return false;
                                                    }
                                                    if (jQuery('#dueDateX').val() == "") {
                                                        jQuery("#dueDateX").addClass("error");
                                                        jQuery("#dueDateX").focus();
                                                        return false;
                                                    }
                                                    data = jQuery("#createXEROInvoice").serialize();
                                                    console.log(data);
                                                    jQuery.ajax({
                                                        url: '../widgetFunctions/addXEROInvoice.php',
                                                        data: data,
                                                        type: 'POST',
                                                        dataType: 'json',
                                                        success: function(response, textStatus, jqXHR) {
                                                            if (response == '0') {
                                                                toggleList();
                                                                jQuery("#showXERO").dialog("destroy");
                                                                toastr.options.positionClass =
                                                                'toast-bottom-full-width';
                                                                toastr["success"]("Invoice created successfully");
                                                            } else {
                                                                console.log(response);
                                                            }
                                                        },
                                                        error: function(xhr, textStatus, errorThrown) {
                                                            toggleList();
                                                            jQuery("#showXERO").dialog("destroy");
                                                        }
                                                    });
                                                }
                                            },
                                            {
                                                text: "Close",
                                                class: "btn btn-secondary",
                                                click: function() {
                                                    jQuery(this).dialog("destroy");
                                                }
                                            }
                                        ]
                                    });
                                }

                                function makePayment(id, enrolmentId) {
                                    jQuery('#feeId1').val(id);
                                    jQuery('#enrolmentId').val(enrolmentId);
                                    jQuery("#makePayment").dialog({
                                        width: "400px",
                                        title: "Record Payment",
                                        buttons: [{
                                                text: "Save",
                                                class: "btn btn-primary",
                                                click: function() {
                                                    data = jQuery("#createPayment").serialize();
                                                    jQuery.ajax({
                                                        url: '../widgetFunctions/addEnrolmentPayment.php',
                                                        data: data,
                                                        type: 'POST',
                                                        dataType: 'json',
                                                        success: function(response, textStatus, jqXHR) {
                                                            if (response == '0') {
                                                                toggleList();
                                                                jQuery("#makePayment").dialog("destroy");
                                                            } else {
                                                                console.log(response);
                                                            }
                                                        },
                                                        error: function(xhr, textStatus, errorThrown) {
                                                            console.log(xhr);
                                                        }
                                                    });
                                                }
                                            },
                                            {
                                                text: "Close",
                                                class: "btn btn-secondary",
                                                click: function() {
                                                    jQuery(this).dialog("destroy");
                                                }
                                            }
                                        ]
                                    });
                                }

                                function markPaid(id) {
                                    jQuery.ajax({
                                        url: '../widgetFunctions/markAsPaid.php',
                                        data: {
                                            "feeId": id
                                        },
                                        type: 'POST',
                                        dataType: 'json',
                                        success: function(response, textStatus, jqXHR) {
                                            if (response == '0') {
                                                toggleList();
                                            } else {

                                            }
                                        },
                                        error: function(xhr, textStatus, errorThrown) {

                                        }
                                    });
                                }

                                function deleteFee(id) {
                                    jQuery("#confirmationFee").dialog({
                                        width: "400px",
                                        title: "Just Confirming",
                                        buttons: [{
                                                text: "Yes",
                                                class: "btn btn-primary",
                                                click: function() {
                                                    jQuery.ajax({
                                                        url: '../widgetFunctions/deleteScheduleFee.php',
                                                        data: {
                                                            'feeId': id
                                                        },
                                                        type: 'POST',
                                                        dataType: 'json',
                                                        success: function(response, textStatus, jqXHR) {
                                                            if (response == '0') {
                                                                toggleList();
                                                                jQuery('#confirmationFee').dialog("close");
                                                            } else {
                                                                console.log(response);
                                                            }
                                                        },
                                                        error: function(xhr, textStatus, errorThrown) {
                                                            console.log(xhr);
                                                        }
                                                    });
                                                }
                                            },
                                            {
                                                text: "No",
                                                class: "btn btn-secondary",
                                                click: function() {
                                                    jQuery(this).dialog("destroy");
                                                }
                                            }
                                        ]
                                    });
                                }

                                function deletePayment(id) {
                                    jQuery("#confirmationPayment").dialog({
                                        width: "400px",
                                        title: "Just Confirming",
                                        buttons: [{
                                                text: "Yes",
                                                class: "btn btn-primary",
                                                click: function() {
                                                    jQuery.ajax({
                                                        url: '../widgetFunctions/deletePayment.php',
                                                        data: {
                                                            'paymentId': id
                                                        },
                                                        type: 'POST',
                                                        dataType: 'json',
                                                        success: function(response, textStatus, jqXHR) {
                                                            if (response == '0') {
                                                                toggleList();
                                                                jQuery('#confirmationPayment').dialog("close");
                                                            } else {
                                                                console.log(response);
                                                            }
                                                        },
                                                        error: function(xhr, textStatus, errorThrown) {
                                                            console.log(xhr);
                                                        }
                                                    });
                                                }
                                            },
                                            {
                                                text: "No",
                                                class: "btn btn-secondary",
                                                click: function() {
                                                    jQuery(this).dialog("destroy");
                                                }
                                            }
                                        ]
                                    });
                                }

                                function editInvoice(id) {
                                    jQuery('#feeId3').val(id);
                                    jQuery.ajax({
                                        url: '../widgetFunctions/getFeeDetails.php',
                                        data: {
                                            'feeId': id
                                        },
                                        type: 'POST',
                                        dataType: 'json',
                                        success: function(response, textStatus, jqXHR) {
                                            jQuery('#invoiceNumberI').val(response.invoiceNumber);
                                            jQuery('#invoiceAmountI').val(response.invoiceAmount);
                                            jQuery('#invoiceDueDateI').val(response.invoiceDueDate);
                                            jQuery('#invoiceDescriptionI').val(response.invoiceDescription);
                                            jQuery('#feeTypeI').val(response.paymentType);
                                            jQuery("#showInvoice").dialog({
                                                width: "400px",
                                                title: "Edit Invoice",
                                                buttons: [{
                                                        text: "Save",
                                                        class: "btn btn-primary",
                                                        click: function() {
                                                            data = jQuery("#editInvoice").serialize();
                                                            jQuery.ajax({
                                                                url: '../widgetFunctions/updateInvoice.php',
                                                                data: data,
                                                                type: 'POST',
                                                                dataType: 'json',
                                                                success: function(response, textStatus, jqXHR) {
                                                                    if (response == '0') {
                                                                        toggleList();
                                                                        jQuery('#showInvoice').dialog(
                                                                            "close");
                                                                    } else {
                                                                        console.log(response);
                                                                    }
                                                                },
                                                                error: function(xhr, textStatus, errorThrown) {
                                                                    console.log(xhr);
                                                                }
                                                            });
                                                        }
                                                    },
                                                    {
                                                        text: "Cancel",
                                                        class: "btn btn-secondary",
                                                        click: function() {
                                                            jQuery(this).dialog("destroy");
                                                        }
                                                    }
                                                ]
                                            });
                                        },
                                        error: function(xhr, textStatus, errorThrown) {

                                        }
                                    });

                                }

                                function editFee(id) {
                                    jQuery('#feeId2').val(id);
                                    jQuery.ajax({
                                        url: '../widgetFunctions/getFeeDetails.php',
                                        data: {
                                            'feeId': id
                                        },
                                        type: 'POST',
                                        dataType: 'json',
                                        success: function(response, textStatus, jqXHR) {
                                            jQuery('#scheduleDate').val(response.scheduleDate);
                                            jQuery('#scheduleFee').val(response.scheduleFee);
                                            jQuery('#feeType').val(response.paymentType);
                                            jQuery("#showFee").dialog({
                                                width: "400px",
                                                title: "Edit Scheduled Fee",
                                                buttons: [{
                                                        text: "Save",
                                                        class: "btn btn-primary",
                                                        click: function() {
                                                            data = jQuery("#editFee").serialize();
                                                            jQuery.ajax({
                                                                url: '../widgetFunctions/updateScheduleFee.php',
                                                                data: data,
                                                                type: 'POST',
                                                                dataType: 'json',
                                                                success: function(response, textStatus, jqXHR) {
                                                                    if (response == '0') {
                                                                        toggleList();
                                                                        jQuery('#showFee').dialog("close");
                                                                    } else {
                                                                        console.log(response);
                                                                    }
                                                                },
                                                                error: function(xhr, textStatus, errorThrown) {
                                                                    console.log(xhr);
                                                                }
                                                            });
                                                        }
                                                    },
                                                    {
                                                        text: "Cancel",
                                                        class: "btn btn-secondary",
                                                        click: function() {
                                                            jQuery(this).dialog("destroy");
                                                        }
                                                    }
                                                ]
                                            });
                                        },
                                        error: function(xhr, textStatus, errorThrown) {

                                        }
                                    });


                                }

                                function editPayment(id) {
                                    jQuery('#paymentId').val(id);
                                    jQuery.ajax({
                                        url: '../widgetFunctions/getPaymentDetails.php',
                                        data: {
                                            'paymentId': id
                                        },
                                        type: 'POST',
                                        dataType: 'json',
                                        success: function(response, textStatus, jqXHR) {
                                            jQuery('#paymentAmountS').val(response.paymentAmount);
                                            jQuery('#paymentDateS').val(response.paymentDate);
                                            jQuery('#payerS').val(response.payer);
                                            jQuery('#payerNameS').val(response.payerName);
                                            jQuery('#feeIdS').val(response.feeId);
                                            if (response.payerName != "") {
                                                jQuery('#payerNameS').prop("disabled", false);
                                            }

                                            jQuery("#showPayment").dialog({
                                                width: "400px",
                                                title: "Edit Payment",
                                                buttons: [{
                                                        text: "Save",
                                                        class: "btn btn-primary",
                                                        click: function() {
                                                            data = jQuery("#editPayment").serialize();
                                                            jQuery.ajax({
                                                                url: '../widgetFunctions/updatePayment.php',
                                                                data: data,
                                                                type: 'POST',
                                                                dataType: 'json',
                                                                success: function(response, textStatus, jqXHR) {
                                                                    if (response == '0') {
                                                                        toggleList();
                                                                        jQuery('#showPayment').dialog(
                                                                            "close");
                                                                    } else {
                                                                        console.log(response);
                                                                    }
                                                                },
                                                                error: function(xhr, textStatus, errorThrown) {
                                                                    console.log(xhr);
                                                                }
                                                            });
                                                        }
                                                    },
                                                    {
                                                        text: "Cancel",
                                                        class: "btn btn-secondary",
                                                        click: function() {
                                                            jQuery(this).dialog("destroy");
                                                        }
                                                    }
                                                ]
                                            });
                                        },
                                        error: function(xhr, textStatus, errorThrown) {

                                        }
                                    });

                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @stop
