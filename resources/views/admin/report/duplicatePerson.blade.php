@php
    use Carbon\Carbon;
@endphp
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
    <div class="col-xl-12 events">
        <div class="card dz-card" id="accordion-four">
            <div class="card-header">
                <h4 class="card-title">Reports - DUPLICATED PERSONS</h4>
            </div>
            <div class="card-block p-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="duplicatePerson_wrapper" class="dataTables_wrapper no-footer">
                            <div class="dataTables_length" id="duplicatePerson_length"><label>Show <select
                                        name="duplicatePerson_length" aria-controls="duplicatePerson" class=""
                                        fdprocessedid="gu6gn8">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label></div>
                            <div id="duplicatePerson_filter" class="dataTables_filter"><label>Search:<input type="search"
                                        class="" placeholder="" aria-controls="duplicatePerson"></label></div>
                            <table id="duplicatePerson" class="table dataTable no-footer" cellpadding="0" cellspacing="0"
                                width="100%" role="grid" aria-describedby="duplicatePerson_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 1617px;">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd">
                                        <td valign="top" colspan="1" class="dataTables_empty">No data available in
                                            table</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="dataTables_info" id="duplicatePerson_info" role="status" aria-live="polite">Showing
                                0 to 0 of 0 entries</div>
                            <div class="dataTables_paginate paging_simple_numbers" id="duplicatePerson_paginate"><a
                                    class="paginate_button previous disabled" aria-controls="duplicatePerson"
                                    data-dt-idx="0" tabindex="-1" id="duplicatePerson_previous">Previous</a><span></span><a
                                    class="paginate_button next disabled" aria-controls="duplicatePerson" data-dt-idx="1"
                                    tabindex="-1" id="duplicatePerson_next">Next</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @stop
