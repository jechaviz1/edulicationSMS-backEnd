
 
<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-primary alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
    </button>
    <strong>Success!</strong> {{ $message }}
</div>
@endif
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="col-lg-12">
											<div class="card dz-card" id="buttons-with-icon">
												<div class="card-header flex-wrap d-flex justify-content-between border-0 ">
													<div>
														<h4 class="card-title">Class Routine List</h4>
													</div>
												
												</div>
												<div class="tab-content" id="myTabContent-1">
													<div class="tab-pane fade show active" id="Buttons-Icon" role="tabpanel" aria-labelledby="home-tab-1">
														<div class="card-body pt-0">
														<a href="{{ URL::route('add-classroutine') }}" class="btn btn-primary light"><i class="fa-solid fa-plus"></i> Add New</a>
                                                        <a href="{{ URL::route('classroutine-list') }}" class="btn btn-secondary"><i class="fa-solid fa-arrows-rotate"></i> Refresh</a>
															<button type="button" class="btn btn-success"><i class="fa fa-download color-warning me-2"></i> Print</button>
														</div>
													</div>
													
												</div>	
												<div class="row">
													<div class="col-lg-12">
														<div class="card-body">
															<div class="form-validation">
																<form class="needs-validation" novalidate method="get" action="{{ route('classroutine-list') }}">
																	<div class="row">
																		
																			<div class="col-lg-2">
																				<label class="row-lg-4 col-form-label" for="faculty">Faculty
																					<span class="text-danger">*</span>
																				</label>
																				<div class="row-lg-12">
																					<div class="dropdown bootstrap-select default-select wide form-control">
																						<select class="default-select wide form-control faculty" id="faculty" name="faculty" tabindex="null">
																						<option value="">Select</option>
                                                                                             @if(isset($faculties))
                                                                                            @foreach( $faculties->sortBy('title') as $faculty )
                                                                                            <option value="{{ $faculty->id }}" @if( $selected_faculty == $faculty->id) selected @endif>{{ $faculty->title }}</option>
                                                                                            @endforeach
                                                                                            @endif
																						</select>
																						
																						<div class="invalid-feedback">
																							Please select a one.
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="col-lg-2">
																				<label class="row-lg-4 col-form-label" for="program">Program
																					<span class="text-danger">*</span>
																				</label>
																				<div class="row-lg-12">
																					<div class="dropdown bootstrap-select default-select wide form-control">
																						<select class="default-select wide form-control program" id="program" name="program" tabindex="null">
																						<option value="">Select</option>
                                                                                        @if(isset($programs))
                                                                                        @foreach( $programs->sortBy('title') as $program )
                                                                                        <option value="{{ $program->id }}" @if( $selected_program == $program->id) selected @endif>{{ $program->title }}</option>
                                                                                        @endforeach
                                                                                        @endif
																						</select>
																						
																						<div class="invalid-feedback">
																							Please select a one.
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="col-lg-2">
																				<label class="row-lg-4 col-form-label" for="session">Session
																					<span class="text-danger">*</span>
																				</label>
																				<div class="row-lg-12">
																					<div class="dropdown bootstrap-select default-select wide form-control">
																						<select class="default-select wide form-control session" id="session" name="session" tabindex="null">
																						<option value="">Select</option>
                                                                                        @if(isset($sessions))
                                                                                        @foreach( $sessions->sortByDesc('id') as $session )
                                                                                        <option value="{{ $session->id }}" @if( $selected_session == $session->id) selected @endif>{{ $session->title }}</option>
                                                                                        @endforeach
                                                                                        @endif
																						</select>
																						
																						<div class="invalid-feedback">
																							Please select a one.
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="col-lg-2">
																				<label class="row-lg-4 col-form-label" for="semester">Semester
																					<span class="text-danger">*</span>
																				</label>
																				<div class="row-lg-12">
																					<div class="dropdown bootstrap-select default-select wide form-control">
																						<select class="default-select wide form-control semester" id="semester" name="semester" tabindex="null">
																						<option value="">Select</option>
																						@if(isset($semesters))
                                                                                        @foreach( $semesters->sortBy('id') as $semester )
                                                                                        <option value="{{ $semester->id }}" @if( $selected_semester == $semester->id) selected @endif>{{ $semester->title }}</option>
                                                                                        @endforeach
                                                                                        @endif
																						</select>
																						
																						<div class="invalid-feedback">
																							Please select a one.
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="col-lg-2">
																				<label class="row-lg-4 col-form-label" for="section">Section
																					<span class="text-danger">*</span>
																				</label>
																				<div class="row-lg-12">
																					<div class="dropdown bootstrap-select default-select wide form-control">
																						<select class="default-select wide form-control section" id="section" name="section" tabindex="null">
																						
																						<option value="">Select</option>
                                                                                        @if(isset($sections))
                                                                                        @foreach( $sections->sortBy('title') as $section )
                                                                                        <option value="{{ $section->id }}" @if( $selected_section == $section->id) selected @endif>{{ $section->title }}</option>
                                                                                        @endforeach
                                                                                        @endif
																						</select>
																						
																						<div class="invalid-feedback">
																							Please select a one.
																						</div>
																					</div>
																				</div>
																			</div>
																			
																		
																			
																			
																			<div class="col-lg-2 pt-4">
																				
																				<div class="col-lg-8 ms-auto">
																					<button type="submit" class="btn btn-primary light"><i class="fas fa-search"></i>  Search</button>
																				</div>
																			</div>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>	
											</div>
										</div>
										<!-- /Column  -->
                                       
                                        
<script src="https://code.jquery.com/jquery.min.js"></script>

<script type="text/javascript">
    "use strict";
    $(".faculty").on('change',function(e){
      
      e.preventDefault(e);
      var program=$(".program");
     
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type:'POST',
        url: "{{ route('filter-program') }}",
        data:{
          _token:$('input[name=_token]').val(),
          faculty:$(this).val()
        },
        success:function(response){
            // var jsonData=JSON.parse(response);
            $('option', program).remove();
            $('.program').append('<option value="">{{ __("select") }}</option>');
            $.each(response, function(){
              $('<option/>', {
                'value': this.id,
                'text': this.title
              }).appendTo('.program');
            });
          }

      });
    });

    $(".program").on('change',function(e){
      e.preventDefault(e);
      var session=$(".session");
      var semester=$(".semester");
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type:'POST',
        url: "{{ route('filter-session') }}",
        data:{
          _token:$('input[name=_token]').val(),
          program:$(this).val()
        },
        success:function(response){
            // var jsonData=JSON.parse(response);
            $('option', session).remove();
            $('.session').append('<option value="">{{ __("select") }}</option>');
            $.each(response, function(){
              $('<option/>', {
                'value': this.id,
                'text': this.title
              }).appendTo('.session');
            });
          }

      });

      $.ajax({
        type:'POST',
        url: "{{ route('filter-semester') }}",
        data:{
          _token:$('input[name=_token]').val(),
          program:$(this).val()
        },
        success:function(response){
            // var jsonData=JSON.parse(response);
            $('option', semester).remove();
            $('.semester').append('<option value="">{{ __("select") }}</option>');
            $.each(response, function(){
              $('<option/>', {
                'value': this.id,
                'text': this.title
              }).appendTo('.semester');
            });
          }

      });
    });

    $(".semester").on('change',function(e){
      e.preventDefault(e);
      var section=$(".section");
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type:'POST',
        url: "{{ route('filter-section') }}",
        data:{
          _token:$('input[name=_token]').val(),
          semester:$(this).val(),
          program:$('.program option:selected').val()
        },
        success:function(response){
            // var jsonData=JSON.parse(response);
            $('option', section).remove();
            $('.section').append('<option value="">{{ __("select") }}</option>');
            $.each(response, function(){
              $('<option/>', {
                'value': this.id,
                'text': this.title
              }).appendTo('.section');
            });
          }

      });
    });
</script>
@endsection