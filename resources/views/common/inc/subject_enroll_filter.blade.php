<div class="form-group">
  <label for="faculty">Faculty <span>*</span></label>
  <select class="form-control faculty" name="faculty" id="faculty" required>
		<option value="">Select</option>
		@if(isset($faculties))
		@foreach( $faculties->sortBy('title') as $faculty )
		<option value="{{ $faculty->id }}" @isset($row) {{ $row->program->faculty_id == $faculty->id ? 'selected' : '' }} @endisset>{{ $faculty->title }}</option>
		@endforeach
		@endif
	</select>

	<div class="invalid-feedback">
		Select Faculty
	</div>
</div>
<div class="form-group">
  <label for="program">Program <span>*</span></label>
  <select class="form-control program" name="program" id="program" required>
		<option value="">Select</option>
		@if(isset($programs))
		@foreach( $programs->sortBy('title') as $program )
		<option value="{{ $program->id }}" @isset($row) {{ $row->program_id == $program->id ? 'selected' : '' }} @endisset>{{ $program->title }}</option>
		@endforeach
		@endif
	</select>

	<div class="invalid-feedback">
		Select Program
	</div>
</div>
<div class="form-group">
  <label for="semester">Semester <span>*</span></label>
  <select class="form-control semester" name="semester" id="semester" required>
		<option value="">Select</option>
		@if(isset($semesters))
		@foreach( $semesters->sortBy('id') as $semester )
		<option value="{{ $semester->id }}" @isset($row) {{ $row->semester_id == $semester->id ? 'selected' : '' }} @endisset>{{ $semester->title }}</option>
		@endforeach
		@endif
	</select>

	<div class="invalid-feedback">
		Select Semester
	</div>
</div>
<div class="form-group">
  <label for="section">Section<span>*</span></label>
  <select class="form-control section" name="section" id="section" required>
		<option value="">Select</option>
		@if(isset($sections))
		@foreach( $sections->sortBy('title') as $section )
		<option value="{{ $section->id }}" @isset($row) {{ $row->section_id == $section->id ? 'selected' : '' }} @endisset>{{ $section->title }}</option>
		@endforeach
		@endif
	</select>

	<div class="invalid-feedback">
		Select Section
	</div>
</div>


<script src="https://code.jquery.com/jquery.min.js"></script>

<script type="text/javascript">
 
    "use strict";
    $(".faculty").on('change',function(e){
      e.preventDefault();
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
            $('.program').append('<option value="">Select</option>');
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
      e.preventDefault();
      var semester=$(".semester");
      var subject=$(".subject");
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
            $('.semester').append('<option value="">Select</option>');
            $.each(response, function(){
              $('<option/>', {
                'value': this.id,
                'text': this.title
              }).appendTo('.semester');
            });
          }

      });

      $.ajax({
        type:'POST',
        url: "{{ route('filter-subject') }}",
        data:{
          _token:$('input[name=_token]').val(),
          program:$(this).val()
        },
        success:function(response){
            // var jsonData=JSON.parse(response);
            $('option', subject).remove();
            $.each(response, function(){
              $('<option/>', {
                'value': this.id,
                'text': this.code +' - '+ this.title
              }).appendTo('.subject');
            });
          }

      });
    });

    $(".semester").on('change',function(e){
      e.preventDefault();
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
            $('.section').append('<option value="">Select</option>');
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