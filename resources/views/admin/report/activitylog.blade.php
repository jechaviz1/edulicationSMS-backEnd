@php
    use Carbon\Carbon;
@endphp
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
    <div class="col-xl-12 events">
        <div class="card dz-card" id="accordion-four">
            <div class="card-header">
                <h4 class="card-title">Reports - Activity Log</h4>
            </div>
            <div class="card-block p-3">
                <form class="form-inline row align-items-center">
                    <div class="form-group col-md-2">
                        <label for="userselect">User</label>
                        <select id="userselect" class="form-control">
                            <option value=""> </option>
                            <option value="1044">Ahad Chowdhury</option>
                            <option value="1047">Weworkbook Support</option>
                            <option value="1101">HCR Training 2</option>
                            <option value="1252">DD HCR</option>
                        </select>
                    </div>
                    
                    <div class="form-group col-md-2">
                        <label for="searchLearnerName">Learner</label>
                        <input type="text" name="searchLearnerName" id="searchLearnerName" class="form-control form-control-sm">
                    </div>
                    
                    <div class="form-group col-md-5">
                        <label for="fromdate">From</label>
                        <input class="form-control" type="date" id="fromdate" style="width: 45%; display: inline-block;">
                        <label for="todate" class="ml-3">To</label>
                        <input class="form-control" type="date" id="todate" style="width: 45%; display: inline-block;">
                    </div>
                
                    <div class="form-group col-md-3 text-end">
                        <button type="button" class="btn btn-primary" onclick="applyfilters()">Go</button>
                        <button type="button" class="btn btn-secondary" onclick="clearfilters()">Clear</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <script>
       
    </script>
@stop
@push('scripts')
<script>


    $(document).ready(function() {
    // Initialize Select2 with AJAX
    $('#searchLearnerName').select2({
        placeholder: "Select Learner",
        allowClear: true,
        ajax: {
            url: "{{ route('report.activity.search.people')}}",  // Replace with your actual API route
            type: 'POST',
            dataType: 'json',
            delay: 250,  // Add delay to avoid overloading the server with requests
            data: function(params) {
                return {
                    learnerId: params.term,  // Search term
                    _token: '{{ csrf_token() }}'  // CSRF token for Laravel
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            id: item.first_name,  // Use learner's full name or learner ID
                            text: item.middle_name  // Display the full name in the dropdown
                        };
                    })
                };
            },
            cache: true
        }
    });

    // AJAX request when learner is selected
    $('#searchLearnerName').on('change', function() {
        var learnerId = $(this).val();  // Get selected learner's full name or ID
        if (learnerId) {
            $.ajax({
                url: "{{ route('report.activity.search.people')}}",  // Replace with the actual URL to send selected learner data
                method: 'POST',
                data: {
                    learnerId: learnerId,
                    _token: '{{ csrf_token() }}'  // Include CSRF token for Laravel
                },
                success: function(response) {
                    // Handle success response
                    console.log('Learner data sent successfully', response);
                },
                error: function(xhr) {
                    // Handle error response
                    console.error('Error sending learner data', xhr);
                }
            });
        }
    });
});
</script>
@endpush