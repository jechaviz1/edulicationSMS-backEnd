    <!-- Edit modal content -->
    <div id="payModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <form class="needs-validation" novalidate action="{{ route('payroll_pay', $payroll_data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Pay</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!-- View Start -->
                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
                                <p><mark class="text-primary">Staff ID:</mark> #{{ $row->id }}</p><hr/>

                                <p><mark class="text-primary">Contract Type:</mark> 
                                    @if( $row->contract_type == 1 )
                                    Full Time
                                    @elseif( $row->contract_type == 2 )
                                    Part Time
                                    @endif
                                </p><hr/>
                            </div>
                            <div class="col-md-6">
                                <p><mark class="text-primary">Name:</mark> {{ $row->first_name }} {{ $row->last_name }}</p><hr/>

                                <p><mark class="text-primary">Basic Salary: </mark>{{ round($row->salary, 2) }} $ 
                                    / 
                                    @if( $row->salary_type == 1 )
                                    Fixed
                                    @elseif( $row->salary_type == 2 )
                                    Hourly
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <!-- View End -->

                    <!-- Form Start -->
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="net_salary" class="form-label">Net Salary $ <span>*</span></label>
                            <input type="text" class="form-control" name="net_salary" id="net_salary" value="{{ round($payroll_data->net_salary, 0) }}" required readonly>

                            <div class="invalid-feedback">
                              please enter net salary
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="salary_month" class="form-label">Salary Month <span>*</span></label>
                            <input type="text" class="form-control" name="salary_month" id="salary_month" value="{{ date("F Y", strtotime($payroll_data->salary_month)) }}" required readonly>

                            <div class="invalid-feedback">
                              please enter month
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="pay_date" class="form-label">Pay Date <span>*</span></label>
                            <input type="date" class="form-control date" name="pay_date" id="pay_date" value="{{ date('Y-m-d') }}" required>

                            <div class="invalid-feedback">
                              please enter pay date
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="payment_method" class="form-label">Payment Method <span>*</span></label></br>
                            <select class="default-select wide form-control" name="payment_method" id="payment_method" required>
                                <option value="">{{ __('select') }}</option>
                                <option value="1" @if( old('payment_method') == 1 ) selected @endif>Card</option>
                                <option value="2" @if( old('payment_method') == 2 ) selected @endif>Cash</option>
                                <option value="3" @if( old('payment_method') == 3 ) selected @endif>Cheque</option>
                                <option value="4" @if( old('payment_method') == 4 ) selected @endif>Bank</option>
                                <option value="5" @if( old('payment_method') == 5 ) selected @endif>E-Wallet</option>
                            </select>

                            <div class="invalid-feedback">
                              please select payment method
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="note">Note</label>
                            <input type="text" class="form-control" name="note" id="note" value="{{ old('note') }}">

                            <div class="invalid-feedback">
                              please enter note
                            </div>
                        </div>
                    </div>
                    <!-- Form End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-money-check"></i> Pay</button>
                </div>
              </form>
            </div>
        </div>
    </div>