    <!-- Edit modal content -->
    <div id="editunit-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <form class="needs-validation" novalidate action="{{ route('update-unit',$row->id ) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Edit Unit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <!-- Form Start -->
                    <input type="hidden" name="course_id" id="course_id" value="{{ $course->id }}">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="net_salary" class="form-label">Code <span>*</span></label>
                            <input type="text" class="form-control" placeholder="Code" name="code" id="code" required value="{{$row->code}}">

                            <div class="invalid-feedback">
                              please enter Code
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="salary_month" class="form-label">Name <span></span></label>
                            <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="{{$row->name}}">

                            <div class="invalid-feedback">
                              please enter Name
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="net_salary" class="form-label">Field of Education <span></span></label>
                            <input type="text" class="form-control" placeholder="Field of Education" name="field_of_education" id="field_of_education" value="{{$row->field_of_education}}">

                            <div class="invalid-feedback">
                              please enter field of education
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="salary_month" class="form-label">Nominal Hours. <span>*</span></label>
                            <input type="text" class="form-control" placeholder="Nominal Hour" name="nominal_hour" id="nominal_hour" required value="{{$row->nominal_hours}}">

                            <div class="invalid-feedback">
                              please enter Nominal Hour
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="pay_date" class="form-label">VET <span></span></label></br>
                            <select class="default-select wide form-control" name="vet" id="vet">
                                <option value="0" {{ @$row->vet == '0' ? 'selected' : '' }}>No</option>
                                <option value="1" {{ @$row->vet == '1' ? 'selected' : '' }}>Yes</option>
                            </select>

                            <div class="invalid-feedback">
                              please select vet
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="payment_method" class="form-label">Competency Flag <span></span></label></br>
                            <select class="default-select wide form-control" name="competency_flag" id="competency_flag">
                                <option value="0" {{ @$row->competency_flag == '0' ? 'selected' : '' }}>Competency</option>
                                <option value="1" {{ @$row->competency_flag == '1' ? 'selected' : '' }}>Module</option>
                            </select>

                            <div class="invalid-feedback">
                              please select compentency flag
                            </div>
                        </div>

                    </div>
                    <!-- Form End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-money-check"></i> Submit</button>
                </div>
              </form>
            </div>
        </div>
    </div>