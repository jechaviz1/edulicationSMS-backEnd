@extends('admin.layout.header')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-primary alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i
                        class="fa-solid fa-xmark"></i></span>
            </button>
            <strong>Success!</strong> {{ $message }}
        </div>
    @endif
    <div class="col-xl-12 events">
            <div class="row p-3">
                <div class="col-sm-12">
                        <style>
                            .avatar-upload {
                                position: relative;
                                max-width: 150px;
                            }

                            .avatar-upload .avatar-edit {
                                position: absolute;
                                right: 12px;
                                z-index: 1;
                                top: 10px;
                            }

                            .avatar-upload .avatar-edit input {
                                display: none;
                            }

                            .avatar-upload .avatar-edit input+label {
                                display: inline-block;
                                width: 34px;
                                height: 34px;
                                margin-bottom: 0;
                                border-radius: 100%;
                                background: #d6cfcf;
                                border: 1px solid transparent;
                                box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
                                cursor: pointer;
                                font-weight: normal;
                                transition: all .2s ease-in-out;
                            }

                            .avatar-upload .avatar-edit input+label:hover {
                                background: #f1f1f1;
                                border-color: #d6d6d6;
                            }

                            .avatar-upload .avatar-edit input+label:after {
                                content: "\f040";
                                font-family: 'FontAwesome';
                                color: #757575;
                                position: absolute;
                                top: 10px;
                                left: 0;
                                right: 0;
                                text-align: center;
                                margin: auto;
                            }

                            .avatar-upload .avatar-preview {
                                width: 140px;
                                height: 140px;
                                position: relative;
                                border-radius: 100%;
                                border: 6px solid #d9d7d7;
                                box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
                            }

                            .avatar-upload .avatar-preview>div {
                                width: 100%;
                                height: 100%;
                                border-radius: 100%;
                                background-size: cover;
                                background-repeat: no-repeat;
                                background-position: center;
                            }
                        </style>
                            <div class="row">
                                <div class="col-sm-12 bg-primary p-3">
                                    <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                        data-bs-target="#tax">
                                        % Taxes
                                    </button>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                        data-bs-target="#discount">
                                        + Discounts
                                    </button>
                                    <button id="btnSendInvoice"
                                        class="btnSendInvoice btn btn-large btn-success float-end"data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"><i class="fa fa-envelope me-2"></i>Send
                                        Invoice</button>
                                    <button id="btnPreview" class="btnPreview btn btn-large btn-info float-end mx-2"><i
                                            class="fa fa-search-plus"></i> Preview / Print</button>
                                    <button id="btnPreviewPdf" type="button"
                                        class="btnPreviewPdf btn btn-large btn-info float-end mx-2"><i
                                            class="fa fa-download"></i> PDF</button>
                                </div>
                            </div>
                            {{-- invoice modal taxes start --}}
                            <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="tax" tabindex="-1"
                                aria-labelledby="exampleModalLabel " aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Taxes
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="">
                                                <table class="table table-bordered" id="taxTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Value</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($tax as $t)
                                                        <tr>
                                                            <th><input type="text" data-var="name"
                                                                    name="taxes[2][name]" id="Tax2Name" value="{{ $t->name}}"
                                                                    class="form-control"></th>
                                                            <td><input class="form-control" data-var="val" type="text"
                                                                    name="taxes[2][value]" id="Tax2Value" value="{{ $t->value}}">
                                                            </td>
                                                            <td>
                                                                <button href="#"
                                                                    class="btn btn-danger btn-mini remove-tax">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </form>
                                            <button id="addTax" class="btn btn-success"><i
                                                    class="icon-plus-sign icon-white"></i> Add Tax</button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="save-discount">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- invoice modal taxes end --}}
                            {{-- invoice modal Discount start --}}
                            <!-- Modal -->
                            <div class="modal fade" id="discount" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Discount</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        {{-- @dd($discount) --}}
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-xs-2">
                                                    <label>Type</label>
                                                </div>
                                                <div class="col-xs-4">
                                                    <select id="discountType" class="form-control"
                                                        fdprocessedid="e96frk">
                                                        <option value="percent" @if($discount->type == "percent") selected @endif>Percentage</option>
                                                        <option value="flat" @if($discount->type == "flat") selected @endif>Fixed Amount</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-2">
                                                    <label>Value</label>
                                                </div>
                                                <div class="col-xs-4">
                                                    <input type="text" placeholder="Enter Fixed Amount"
                                                        id="flatDiscountInput"
                                                        class="input-small dim-value form-control" value="{{ $discount->value }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="discounts">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- invoice modal Discount end --}}
                            {{-- invoice email start --}}
                            <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Send invoice to client</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.invoice.mail.send') }}" method="post">
                                                @csrf()
                                                @method('post')
                                                <div class="mb-3">
                                                    <label for="formGroupExampleInput" class="form-label">Client Name</label>
                                                    <input type="text" class="form-control"
                                                        id="formGroupExampleInput" placeholder="Your Name">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="formGroupExampleInput2" class="form-label">Your Email
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        id="formGroupExampleInput2" placeholder="Your Email">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="formGroupExampleInput2" class="form-label">Client
                                                        Name</label>
                                                    <input type="text" class="form-control"
                                                        id="formGroupExampleInput2" placeholder="Client Name">
                                                </div>
                                                <div class="mb-3">
                                                  <label for="formGroupExampleInput2" class="form-label">Contact</label>
                                                  <Select name="contact" class="form-select">
                                                    @foreach ($contacts as $contact)
                                                    <option value="{{ $contact->id }}" >{{ $contact->name }}</option>
                                                    @endforeach
                                                  </Select>
                                              </div>
                                                <div class="mb-3">
                                                    <label for="formGroupExampleInput2" class="form-label">Client's
                                                        Email</label>
                                                    <input type="text" class="form-control"
                                                        id="formGroupExampleInput2" placeholder="Client's Email">
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckChecked" checked>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Receive online payments for this invoice</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckChecked" checked>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Send a copy of the sent invoice to my email address (BCC)
                                                </div>
                                                <button class="btn btn-primary" id="btnSaveInvoice"
                                                    data-loading-text="Sending..." fdprocessedid="4yxc78">Send to
                                                    client</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- invoice email end --}}
                            <div class="container mt-5">
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10">
                                        <div class="invoice">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input type='file' id="imageUpload"
                                                                accept=".png, .jpg, .jpeg" />
                                                            <label for="imageUpload"></label>
                                                        </div>
                                                        <div class="avatar-preview">
                                                            <div id="imagePreview"
                                                                style="background-image: url({{ asset('admin/images/default-logo.png') }});">
                                                                <input type="file" id="invoice_logo" class="d-none" name="invoice_logo">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="mb-3">
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="10">
[Business Name]
ABN: [ABN]
[Business Address 1]
[City], [State] [Postal Code]
[Business Phone Number]
[Business Email Address]</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" value="Tax Invoice">
                                                </div>
                                            </div>
                                            <div class="border-line mt-3 mb-3">
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" name="" value="Bill To">
                                                </div>
                                                <div class="col-sm-6">
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="7">[Client Name ]
[Client Address line 1]
[City], [State] [Postal code]</textarea>
                                                </div>
                                                <div class="col-sm-4">
                                                    <table class="">
                                                        <thead>
                                                          <tr>
                                                            <th><input type="text" style="width: 150px;margin-left: 4px;" value="Invoice Number"></th>
                                                            <th><input type="text" style="width: 150px;margin-left: 4px;" value="2001321"></th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="mt-2">
                                                                <th><input type="text" style="width: 150px;margin-left: 4px;margin-top: 4px" value="Date"></th>
                                                                <th><input type="text" style="width: 150px;margin-left: 4px;margin-top: 4px" value="10/2/2024"></th>
                                                              </tr>
                                                          <tr class="mt-2">
                                                            <th><input type="text" style="width: 150px;margin-left: 4px;margin-top: 4px" value="Due Date"></th>
                                                            <th><input type="text" style="width: 150px;margin-left: 4px;margin-top: 4px" value="10/2/2024"></th>
                                                          </tr>
                                                          <tr class="mt-2">
                                                            <th><input type="text" style="width: 150px;margin-left: 4px;margin-top: 4px" value=""></th>
                                                            <th><input type="text" style="width: 150px;margin-left: 4px;margin-top: 4px" value=""></th>
                                                          </tr>
                                                          <tr class="mt-2">
                                                            <th><input type="text" style="width: 150px;margin-left: 4px;margin-top: 4px" value=""></th>
                                                            <th><input type="text" style="width: 150px;margin-left: 4px;margin-top: 4px" value=""></th>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                              <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Description</th>
                                                        <th>Quantity</th>
                                                        <th>Unit price</th>
                                                        <th class="tax-columns-placeholder">Tax</th>
                                                        @if ($tax->count() >= 2)
                                                            <th class="tax-columns-placeholder">Other Tax</th>
                                                        @endif
                                                        <th>Amount</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="table-body">
                                                    <tr>
                                                        <td><textarea data-key="description" class="editable input-block-level">Product name</textarea></td>
                                                        <td><input data-key="qty" class="editable input-mini" value="0" oninput="calculateSubtotal(this)"></td>
                                                        <td><input data-key="unit_price" class="editable input-mini" value="0" oninput="calculateSubtotal(this)"></td>
                                                        @if ($tax->count() >= 2)
                                                            <td data-key="taxes" class="taxes">
                                                                <select name="" class="form-select" id="">
                                                                  <option value="">Option Other Tax</option>  
                                                                    @foreach ($tax as $t)
                                                                        <option value="{{ $t->value }}">{{ $t->name }} - {{ $t->value }}%</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td data-key="othertax" class="othertax">
                                                                <select name="" class="form-select" id="">
                                                                  <option value="">Option Other Tax</option>  
                                                                  @foreach ($tax as $t)
                                                                        <option value="{{ $t->value }}">{{ $t->name }} - {{ $t->value }}%</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        @else
                                                            <td data-key="taxes" class="taxes">
                                                                <select name="" class="form-select" id="">
                                                                  <option value="">Option Other Tax</option>  
                                                                    @foreach ($tax as $t)
                                                                        <option value="{{ $t->value }}">{{ $t->name }} - {{ $t->value }}%</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        @endif
                                                        <td data-key="subtotal" class="subtotal">$0.00</td>
                                                        <td><button class="btn btn-danger btn-sm remove-item"><i class="fas fa-trash"></i></button></td>
                                                    </tr>
                                                </tbody>
                                                {{-- @dd($discount) --}}
                                                <tfoot id="TotalsSection">
                                                  <tr>
                                                    <td colspan="3"></td>
                                                    <td>Discount</td>
                                                    <td><span id="discount_in" data-var="{{ $discount->type }}">{{ $discount->value }}</span></td>
                                                </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <button id="AddProduct" class="btn btn-primary">Add Row</button>
                                                        </td>
                                                        <td>Total with Tax</td>
                                                        <td><span id="total">$0.00</span></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>
                            </div> 


                </div>
        </div>
        <style>
            .modal-backdrop {
                display: none;
            }
            .border-line {
    border-top: 1px solid #000;
    border-bottom: 1px solid #000;
    padding: 2px;
}
        </style>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

        <script>
            // Function to calculate subtotal for each row
            function calculateSubtotal(element) {
              var row = $(element).closest('tr');
              var qty = parseFloat(row.find('input[data-key="qty"]').val()) || 0;
              var unitPrice = parseFloat(row.find('input[data-key="unit_price"]').val()) || 0;
              var subtotal = qty * unitPrice;
              row.find('th[data-key="subtotal"]').text(subtotal.toFixed(2));
              updateTotalWithoutGST();
            }
          
            // Function to update total without GST (subtotal)
            function updateTotalWithoutGST() {
              var totalWithoutGST = 0;
              $('#table-body tr').each(function() {
                var subtotal = parseFloat($(this).find('th[data-key="subtotal"]').text()) || 0;
                totalWithoutGST += subtotal;
              });
              $('#subtotal').text('$' + totalWithoutGST.toFixed(2));
              updateGSTandTotalWithGST(totalWithoutGST);
            }
          
            // Function to update GST and total with GST
            function updateGSTandTotalWithGST(totalWithoutGST) {
              var gstRate = 0.10;  // Example 10% GST
              var gstAmount = totalWithoutGST * gstRate;
              var totalWithGST = totalWithoutGST + gstAmount;
              $('#gst').text('$' + gstAmount.toFixed(2));
              $('#total').text('$' + totalWithGST.toFixed(2));
              updateBalance();  // Call this to update balance when total changes
            }
          
            // Function to update balance (Total - Paid Amount)
            function updateBalance() {
              var totalWithGST = parseFloat($('#total').text().replace('$', '')) || 0;
              var paidAmount = parseFloat($('#paid').val()) || 0;
              var balanceDue = totalWithGST - paidAmount;
              $('#unpaid').text('$' + balanceDue.toFixed(2));
            }
          
            // Add new row functionality
            // $('#AddProduct').click(function() {
            //   let newRow = `
            //     <tr>
            //       <th><textarea data-key="description" class="editable input-block-level" style="overflow-wrap: break-word; resize: none; height: 40px;">Product name</textarea></th>
            //       <th><input data-key="qty" class="editable input-mini" value="0" oninput="calculateSubtotal(this)"></th>
            //       <th><input data-key="unit_price" class="editable input-mini" value="0" oninput="calculateSubtotal(this)"></th>
            //       <th>$0.00</th>
            //       <th>$0.00</th>
            //       <th data-key="subtotal" class="subtotal">0.00</th>
            //       <th><button class="btn btn-danger btn-sm remove-item"><i class="fas fa-trash"></i></button></th>
            //     </tr>
            //   `;
            //   $('#table-body').append(newRow);
            // });
          
            // Remove row functionality
            $(document).on('click', '.remove-item', function() {
              $(this).closest('tr').remove();
              updateTotalWithoutGST();  // Recalculate total after row removal
            });
          </script>
          
        <script>
            function switchTab(element) {
                var $row = $(element).closest('tr');

                $row.find('.module_enrolment_date').toggle();
                $row.find('.module_activity_start').toggle();
                $row.find('.out_comes').toggle();
                $row.find('.hour_attandence').toggle();
                $row.find('.module_note').toggle();
                $row.find('.module_action').toggle();
            }

            function showHideText(code, id) {
                console.log(code, id)
                var newOptions = '';
                var funding = '';
                if (code == "Commonwealth specific funding program (13)") {
                    newOptions = `<option value="0" selected=""></option>
                <option value="42" selected="">Adult Migrant English Program</option>
                <option value="93">Commonwealth funded - VET AMC</option>
                <option value="92">Dual award - HE AMC </option>
                <option value="91">Dual award - VET AMC </option>
                <option value="23">Foundation Skills for Your Future Program</option>
                <option value="14">Industry Skills Fund</option>
                <option value="99">Other Commonwealth government funding</option>
                <option value="22">PaTH - Employability Skills Training</option>
                <option value="21">Skills for Education and Employment Program</option>`;
                    funding = `<option value="BET">Better Skills Better Care</option>
                <option value="DEO">DEEWR Funded Programs (Other)</option>
                <option value="DEV">DEEWR Funded Programs (Vouchers)</option>
                <option value="IGN">Ignite</option>
                <option value="DPE">Productivity General Existing Worker</option>
                <option value="DPJ">Productivity General Job Seeker</option>
                <option value="DHP">Productivity General/Health Existing Worker</option>
                <option value="DHE">Productivity Health Existing Worker</option>
                <option value="DHJ">Productivity Health Job Seeker</option>
                <option value="SED">Southern Edge Training</option>
                            <option value="TIF">TIFIARRC</option>`;
                    $("#input_funding_identifier_" + id).html(newOptions);
                    $("#fundingStateId_" + id).html(funding);
                }
                if (code == "Commonwealth and state general purpose recurrent (11)") {
                    $("#input_funding_identifier_" + id).attr(disabled, 'disabled');
                    $("#fundingStateId_" + id).attr(disabled, 'disabled');
                }
            }

            function chkModeId(value, id) {
                consoel.log(value, id)
            }

            function changetemplate(id) {
                console.log(id);
            }
        </script>
        <script>
            // Function to toggle all checkboxes in the table body based on the header checkbox
            function toggleAllCheckBoxes(checkbox) {
                var checkboxes = document.getElementsByClassName('coreunits');
                for (var i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = checkbox.checked;
                }
            }

            function toggleAllCheckElective(checkbox) {
                var checkboxes = document.getElementsByClassName('electiveunits');
                for (var i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = checkbox.checked;
                }
            }
        </script>
        <script>
            function editEnrolmentNote(id, category) {
                var element = document.getElementById('block_element');
                var block = document.getElementById('taable_note');
                element.style.display = 'block';
                block.style.display = 'none';
                document.getElementById('note_id').value = id;
                document.getElementById('note_category_update').value = category;
                $.ajax({
                    url: "{{ route('api.note.find') }}",
                    type: 'GET',
                    data: {
                        'id': id,
                    }, // Pass the scheduleId as a query parameter
                    success: function(response) {
                        console.log(response.note)
                        document.getElementById('note_update').value = response.note.note;

                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(error);
                    }
                });

            }

            function closeelement() {
                var element = document.getElementById('block_element');
                var block = document.getElementById('taable_note');
                element.style.display = 'none';
                block.style.display = 'block';
            }
        </script>
        <script>
            function loadStudentList() {
                var searchby = $('#searchByThis').val();
                var searchvalue = $('#searchValueIs').val();
                $('#studentList').empty();
                $.ajax({
                    url: "{{ route('api.people.find') }}",
                    type: 'GET',
                    data: {
                        'search_filled': searchby,
                        'searchvalue': searchvalue
                    }, // Pass the scheduleId as a query parameter
                    success: function(response) {
                        response.students.forEach(student => {
                            var field = student[searchby];
                            $('#studentList').append(new Option(field + " (id:" + student.id + ")", student
                                .id));
                        });

                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(error);
                    }
                });
            }
        </script>
        <script>
            var taxIndex = 3; // Start with the next index

            // Add new row on button click
            $('#addTax').click(function(e) {
                e.preventDefault();

                // Create a new row with incremented index for names and IDs
                var newRow = `
                    <tr>
                        <th><input type="text" data-var="name" name="taxes[` + taxIndex + `][name]" id="Tax` +
                    taxIndex + `Name" value="Tax ` + taxIndex + `" class="form-control"></th>
                        <td><input class="form-control" data-var="val" type="text" name="taxes[` + taxIndex +
                    `][value]" id="Tax` + taxIndex + `Value" value="0"></td>
                        <td>
                            <button href="#" class="btn btn-danger btn-mini remove-tax">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;

                // Append the new row to the table body
                $('#taxTable tbody').append(newRow);

                // Increment the taxIndex for next row
                taxIndex++;
            });

            // Remove row on button click
            $(document).on('click', '.remove-tax', function(e) {
                e.preventDefault();
                $(this).closest('tr').remove();
            });
        </script>
    @stop

    @push('scripts')
        <script type="text/javascript">
            var menu = document.querySelector('.edit-mode-wrap');
            var origOffsetY = menu.offsetTop;

            function scroll() {
                if (jQuery(window).scrollTop() > 0) {
                    jQuery('.navbar').addClass('sticky-nav');
                    jQuery('.toggle-hide').hide();
                    jQuery('.toggle-show').show();

                } else {
                    jQuery('.navbar').removeClass('sticky-nav');
                    jQuery('.toggle-show').hide();
                    jQuery('.toggle-hide').show();
                }
            }

            document.onscroll = scroll;
            $(document).ready(function() {
                setTimeout(function() {
                    invoiceItems.each(function(iitem) {
                        iitem.calculateSubtotal();
                    });
                }, 400);



                if (is_pre_filled == 'true') {
                    setTimeout(function() {


                        var tmp1 = localStorage.getItem('last_invoice');
                        localStorage.clear();
                        localStorage.setItem('last_invoice', tmp1);
                        taxes.each(function(iitem) {
                            taxes.remove(iitem);

                        });

                        invoiceItems.each(function(iitem) {
                            invoiceItems.remove(iitem);
                        });

                        console.log('{"index":0,"name":"GST","val":"10"}');
                        taxes.add(new Tax({
                            "index": 0,
                            "name": "GST",
                            "val": "10"
                        }));
                        var ii = null;
                        var ii2 = null;
                        taxes.each(function(iitem) {
                            if (iitem.attributes.name == 'GST') {

                                ii = iitem;
                            }
                            if (iitem.attributes.name == '') {

                                ii2 = iitem;
                            }
                        });
                        invoiceItems.add(new Item({
                            tax2: ii2,
                            tax1: ii,
                            description: 'Product name',
                            qty: 10,
                            unit_price: 10
                        }));

                        invoiceItems.each(function(iitem) {
                            iitem.calculateSubtotal();
                        });

                        invoice.calculateTotals();
                        invoiceAttribes.currency = 'EUR';

                        invoiceItems.each(function(iitem) {
                        });
                    }, 1000);
                }
                setTimeout(function() {
                    $('#notes').attr('placeholder', 'Type your notes here');
                }, 2000);

            });

        </script>
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                        $('#imagePreview').hide();
                        $('#imagePreview').fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#imageUpload").change(function() {
                readURL(this);
            });
        </script>

        <script>
            $(document).ready(function () {
    $('#save-discount').on('click', function () {
        // Create an array to store tax data
        let taxData = [];
        // Loop through each row in the table body
        $('#taxTable tbody tr').each(function () {
            let taxName = $(this).find('input[data-var="name"]').val();
            let taxValue = $(this).find('input[data-var="val"]').val();
            // Store each row's data in an object and push it to the taxData array
            taxData.push({
                name: taxName,
                value: taxValue
            });
        });
       
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.ajax({
    url: "{{ route('invoice.discount') }}",
    method: 'POST',
    data: { taxes: taxData },
    success: function(response) {
        $('#tax').modal('hide'); 
        window.location.reload();

    },
    error: function(error) {
        console.error('Error saving data:', error);
    }
});

    });
});

$(document).ready(function () {
    $('#discounts').on('click', function () {
        let discountType = $('#discountType').val();
        let discountValue = $('#flatDiscountInput').val();
        
        // Get CSRF token from meta tag
        let csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Prepare data to send
        let data = {
            type: discountType,
            value: discountValue,
            _token: csrfToken // Include CSRF token
        };

        // AJAX request to save data
        $.ajax({
            url: "{{ route('invoice.discounts') }}", // Replace with your server endpoint
            method: 'POST',
            data: data,
            success: function (response) {
                console.log('Discount saved successfully:', response);
                $('#discount').modal('hide'); // Close modal on success
            },
            error: function (error) {
                console.error('Error saving discount:', error);
            }
        });
    });
});
        </script>





        <script>
          function previewImage() {
    const file = document.getElementById("imageUpload").files[0];
    const reader = new FileReader();
    
    reader.onloadend = function() {
        // Update the preview image
        document.getElementById("imagePreview").style.backgroundImage = "url('" + reader.result + "')";
        
        // Optionally, you can set the hidden input to the selected file's data
        document.getElementById("invoice_logo").files = document.getElementById("imageUpload").files;
    };

    if (file) {
        reader.readAsDataURL(file); // Read the image file as a data URL
    }
}
// Function to calculate the subtotal for each row with taxes included
function calculateSubtotal(inputElement) {
    const row = $(inputElement).closest('tr');
    const qty = parseFloat(row.find('[data-key="qty"]').val()) || 0;
    const unitPrice = parseFloat(row.find('[data-key="unit_price"]').val()) || 0;

    // Retrieve the selected tax values, defaulting to 0 if not selected
    const taxValue = parseFloat(row.find('[data-key="taxes"] select').val()) || 0;
    const otherTaxValue = parseFloat(row.find('[data-key="othertax"] select').val()) || 0;

    // Calculate subtotal without tax
    const subtotalWithoutTax = qty * unitPrice;

    // Calculate tax amounts
    const taxAmount = subtotalWithoutTax * (taxValue / 100);
    const otherTaxAmount = subtotalWithoutTax * (otherTaxValue / 100);

    // Calculate subtotal including both taxes
    const subtotalWithTax = subtotalWithoutTax + taxAmount + otherTaxAmount;

    // Display the subtotal with tax in the Amount column
    row.find('[data-key="subtotal"]').text('$' + subtotalWithTax.toFixed(2));

    // Update the total for all items
    updateTotal();
}

// Function to update the total with discount applied
function updateTotal() {
    let totalWithTax = 0;

    // Loop through each row and sum up the subtotals with taxes included
    $('#table-body tr').each(function() {
        const row = $(this);
        const subtotal = parseFloat(row.find('[data-key="subtotal"]').text().replace('$', '')) || 0;
        totalWithTax += subtotal;
    });

    // Retrieve discount type and value from the discount span
    const discountType = $('#discount_in').data('var'); 
    const discountValue = parseFloat($('#discount_in').text()) || 0;
    
    // Calculate the discount amount based on type
    let discountAmount = 0;
    if (discountType === 'percent') {
        discountAmount = totalWithTax * (discountValue / 100);
    } else if (discountType === 'flat') {
        discountAmount = discountValue;
    }

    // Calculate the final total after applying discount
    const finalTotal = totalWithTax - discountAmount;

    // Display the Total with Tax and Discount
    $('#total').text('$' + finalTotal.toFixed(2));
}

// Event listeners for quantity, unit price, and tax dropdown changes
$('#table-body').on('input', '[data-key="qty"], [data-key="unit_price"]', function() {
    calculateSubtotal(this);
});

$('#table-body').on('change', '[data-key="taxes"] select, [data-key="othertax"] select', function() {
    calculateSubtotal(this);
});

// Add row function
$('#AddProduct').on('click', function() {
    const newRow = $('#table-body tr:first').clone(); // Clone the first row as a template for new rows
    newRow.find('textarea').val(''); // Reset the description
    newRow.find('input').val(0); // Reset quantity and unit price
    newRow.find('.subtotal').text('$0.00'); // Reset subtotal
    $('#table-body').append(newRow); // Append the new row
    updateTotal(); // Update totals
});

// Remove row function
$('#table-body').on('click', '.remove-item', function() {
    $(this).closest('tr').remove();
    updateTotal(); // Recalculate totals
});

$(document).ready(function() {
  $('#btnPreviewPdf').on('click', function() {
    // Collect the invoice data
    var invoiceData = {
        description: [],
        quantity: [],
        unitPrice: [],
        tax: [],
        total: $('#total').text(),
        discount: $('#discount_in').text(), // Assuming the discount is inside an element with ID "discount_in"
    };

    // Collect data from table rows
    $('#table-body tr').each(function() {
        var description = $(this).find('[data-key="description"]').val();
        var quantity = $(this).find('[data-key="qty"]').val();
        var unitPrice = $(this).find('[data-key="unit_price"]').val();
        var tax = $(this).find('[data-key="taxes"] select').val();

        // Push to the invoiceData arrays
        invoiceData.description.push(description);
        invoiceData.quantity.push(quantity);
        invoiceData.unitPrice.push(unitPrice);
        invoiceData.tax.push(tax);
    });

    // Create a FormData object to handle the file upload along with other data
    var formData = new FormData();

    // Append invoice data as JSON string (this is just an example, depending on your backend, you may need to format it differently)
    formData.append('invoiceData', JSON.stringify(invoiceData));

    // Get the image file and append it to the form data
    var invoiceLogo = $('#invoice_logo')[0].files[0];  // Getting the file from the hidden input
    if (invoiceLogo) {
        formData.append('invoice_logo', invoiceLogo);
    }

    // Collect additional data from other inputs (e.g., Business Info, Client Info, etc.)
    formData.append('business_name', $('textarea#exampleFormControlTextarea1').val());
    formData.append('invoice_number', $('input[type="text"][value="2001321"]').val());
    formData.append('invoice_date', $('input[type="text"][value="10/2/2024"]').val());
    formData.append('due_date', $('input[type="text"][value="10/2/2024"]').val());

    // Add CSRF token for security
    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

    // Send the data to the server using AJAX
    $.ajax({
        url: "{{ route('invoice.pdf.download') }}",  // The route where you handle PDF generation
        method: 'POST',
        data: formData,
        processData: false,  // Prevent jQuery from processing the data
        contentType: false,  // Prevent jQuery from setting content-type (it must be multipart/form-data)
        success: function(response) {
            // If the server returns a PDF URL or content, download or show it
            var pdfUrl = response.pdfUrl;
            window.open(pdfUrl, '_blank');
        },
        error: function(xhr, status, error) {
            console.error('AJAX error:', status, error);
        }
    });
});
});

        </script>
    @endpush