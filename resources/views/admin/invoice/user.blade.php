<!-- Extends template page-->
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
<div class="col-xl-12 events">
    <div class="card dz-card" id="accordion-four">
        <div class="card-header bordor-bottom m-4">
          <h4>General Profile Invoice</h4>
        </div>
        {{-- {{ invoice}} --}}
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
    @dd("hello")
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
                            <label for="formGroupExampleInput" class="form-label">Your
                                Name</label>
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
                                <!-- Placeholder for multiple tax columns -->
                                <th class="tax-columns-placeholder">Tax</th>
                                <th>Amount</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody id="table-body">
                              <tr>
                                <td><textarea data-key="description" class="editable input-block-level">Product name</textarea></td>
                                <td><input data-key="qty" class="editable input-mini" value="0" oninput="calculateSubtotal(this)"></td>
                                <td><input data-key="unit_price" class="editable input-mini" value="0" oninput="calculateSubtotal(this)"></td>
                                <!-- Dynamic tax columns will go here -->
                                <td data-key="subtotal" class="subtotal">$0.00</td>
                                <td><button class="btn btn-danger btn-sm remove-item"><i class="fas fa-trash"></i></button></td>
                              </tr>
                            </tbody>
                            <tfoot id="TotalsSection">
                              <tr>
                                <td colspan="3"></td>
                                <td>Total without Tax</td>
                                <td><span id="subtotal">$0.00</span></td>
                              </tr>
                              <!-- Dynamic rows for tax totals -->
                              <tr class="totals-row tax-totals"></tr>
                              <tr>
                                <td colspan="3"></td>
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
</div>
@endsection