
<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
<div class="col-xl-12">
    <div class="card dz-card" id="accordion-four">
        <div class="card-header flex-wrap d-flex justify-content-between">
            <div>
                <h4 class="card-title">Test Bulk USI Verfication</h4>
            </div>
            <div>
                <button type="button" class="btn btn-primary" id="btn_test">Execute <i class="bi bi-caret-right"></i></button>
            </div>
        </div>
        <div class="card-body row">
            <div class="col-md-6">
                <h5>Payload JSON</h5>
                <textarea id="json_usi_payload" style="width:100%" rows=20>[
                {
                    "record_id": 1,
                    "usi": "BNGH7C75FN",
                    "first_name": "Maryam",
                    "family_name": "Fredrick",
                    "date_of_birth": "1966-05-25"
                },
                {
                    "record_id": 2,
                    "usi": "C2P5P4UBHP",
                    "first_name": "Nicholas",
                    "family_name": "Koke",
                    "date_of_birth": "1990-07-02"
                },
                {
                    "record_id": 3,
                    "usi": "BJRVU7U59N",
                    "first_name": "Nick",
                    "family_name": "Smithdd",
                    "date_of_birth": "1990-07-14"
                }
                ]</textarea>
            </div>
            <div class="col-md-6">
                <h5>Response JSON</h5>
                <div id="api-result" class="text-bold"></div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        toastr.options.positionClass = 'toast-bottom-full-width';
        $('#btn_test').on('click', function() {
            // Get the value from the textarea
            $('#api-result').text("Loading...");
            var jsonData = $('#json_usi_payload').val();

            try {
                // Parse the JSON data
                var dataObject = JSON.parse(jsonData);
                $('#btn_test').prop("disabled", true);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('usi.bulk_verify') }}",
                    data: JSON.stringify(dataObject),
                    contentType: 'application/json; charset=utf-8',
                    dataType: 'json',
                    async: true,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#btn_test').prop("disabled", false);
                        $('#api-result').text(JSON.stringify(response, null, 2));
                        toastr["success"]("Bulk USI verfication excute done!");
                    },
                    error: function(xhr, status, error) {
                        $('#btn_test').prop("disabled", false);
                         toastr["error"]("USI Verification Failed!");
                         $('#api-result').text('USI Verification Failed: ' + error.message);
                        //console.error('Error:', error);
                    }
                });
            } catch (error) {
                $('#api-result').text('Invalid JSON: ' + error.message);
            }
        });
    });
</script>

@endsection
