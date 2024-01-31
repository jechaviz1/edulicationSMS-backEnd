<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')

<!-- Start Content-->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Exam Attendance</h5>

                        @can($access.'-import')
                        <a href="#" class="btn btn-dark btn-sm float-right"><i class="fas fa-upload"></i> {{ __('btn_import') }}</a>
                        @endcan
                    </div>
                    <div class="card-block">
                        <form class="needs-validation" novalidate method="get" action="{{ route($route.'.index') }}">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div class="mb-3 row">
                                                <label class="row-lg-6 col-form-label" for="faculty">faculty<span class="text-danger">*</span></label>
                                                    <div class="row-lg-8">
                                                        <select class="form-control faculty" name="faculty" id="faculty" required>
                                                            <option value="">{{ __('select') }}</option>
                                                            @if(isset($faculties))
                                                            @foreach( $faculties->sortBy('title') as $faculty )
                                                            <option value="{{ $faculty->id }}" @if( $selected_faculty == $faculty->id) selected @endif>{{ $faculty->title }}</option>
                                                            @endforeach
                                                            @endif
                                                        </select>
                                                        @error('faculty')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                            </div>
                                        </div>  
                           
                        
                                          <div class="col-xl-3">
                                              <div class="mb-3 row">
                                
                                                <label class="row-lg-6 col-form-label" for="program">Program<span class="text-danger">*</span></label>
                                                    <div class="row-lg-8">
                                                        <select class="form-control program" name="program" id="program" required>
                                                            <option value="">{{ __('select') }}</option>
                                                            @if(isset($programs))
                                                            @foreach( $programs->sortBy('title') as $program )
                                                            <option value="{{ $program->id }}" @if( $selected_program == $program->id) selected @endif>{{ $program->title }}</option>
                                                            @endforeach
                                                            @endif
                                                        </select>
                                                        @error('program')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                  </div>
                                              </div>
                                          </div>


                                    <div class="col-xl-3">
                                        <div class="mb-3 row">
                                    
                                            <label class="row-lg-6 col-form-label" for="session">Session <span class="text-danger">*</span></label>

                                              <div class="row-lg-8">
                                                        <select class="form-control session" name="session" id="session" required>
                                                              <option value="">{{ __('select') }}</option>
                                                              @if(isset($sessions))
                                                              @foreach( $sessions->sortByDesc('id') as $session )
                                                              <option value="{{ $session->id }}" @if( $selected_session == $session->id) selected @endif>{{ $session->title }}</option>
                                                              @endforeach
                                                              @endif
                                                        </select>
                                                        @error('session')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                </div>
                                            </div>
                                        </div>
             
                            
                                    <div class="col-xl-3">
                                        <div class="mb-3 row">
                                    
                                   
                                              <label  class="row-lg-6 col-form-label" for="semester">Semester <span class="text-danger">*</span></label>

                                                        <div class="row-lg-8">
                                                                <select class="form-control semester" name="semester" id="semester" required>
                                                                    <option value="">{{ __('select') }}</option>
                                                                    @if(isset($semesters))
                                                                    @foreach( $semesters->sortBy('id') as $semester )
                                                                    <option value="{{ $semester->id }}" @if( $selected_semester == $semester->id) selected @endif>{{ $semester->title }}</option>
                                                                    @endforeach
                                                                    @endif
                                                              </select>
                                                              @error('semester')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                          </div>
                                                </div>
                                        </div>

                                      <div class="col-xl-3">
                                        <div class="mb-3 row">
                                            <label class="row-lg-3 col-form-label" for="subject">Subject
                                            </label>
                                              <div class="row-lg-8">
                                                <select class="form-control section" name="section" id="section" required>
                                                        <option value="">{{ __('select') }}</option>
                                                        @if(isset($sections))
                                                        @foreach( $sections->sortBy('title') as $section )
                                                        <option value="{{ $section->id }}" @if( $selected_section == $section->id) selected @endif>{{ $section->title }}</option>
                                                        @endforeach
                                                        @endif   
                                                </select>
                                                <div class="invalid-feedback">
                                                    Select Section
                                                </div>
                                              </div>
                                          </div>
                                      </div>
                                    </div>