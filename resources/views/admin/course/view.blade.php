    <!-- Show modal content -->
    <div id="showModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">View Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" style="overflow: scroll;">
                    <!-- Details View Start -->
                    <!--<h4><mark class="text-primary">View:</mark> {{ $row->title }}</h4>-->
                    <hr/>
                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
                                <p><mark class="text-primary">Course Name:</mark> {{ $row->name}}</p>
                                <p><mark class="text-primary">Course Code:</mark> {{ $row->code }}</p>
                                <p><mark class="text-primary">Course Category:</mark> {{ $row->course_category_id }}</p>
                                <p><mark class="text-primary">Course Cost:</mark> {{ $row->default_course_cost }}</p>
                                <p><mark class="text-primary">Course Description:</mark> {{ $row->description }}</p>
                                <p><mark class="text-primary">Course Comment:</mark> {{ $row->comments }}</p>
                                
                            </div>
                            <div class="col-md-6">
                                <p><mark class="text-primary">Course Follow Enquiry:</mark> {{ $row->follow_up_enquiry }}</p>
                                <p><mark class="text-primary">Course Delivery Method:</mark> {{ $row->delivery_method }}</p>
                                <p><mark class="text-primary">Course No of Unit:</mark> {{ $row->required_no_of_unit }}</p>
                                <p><mark class="text-primary">Course Core Unit:</mark> {{ $row->core_unit }}</p>
                                <p><mark class="text-primary">Reporting This Course:</mark> {{ $row->reporting_this_course }}</p>
                                <p><mark class="text-primary">Course TGA Package:</mark> {{ $row->tga_package }}</p>
                                
                            </div>

                        </div>
                    </div>
                    <!-- Details View End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                </div>
            </div>
        </div>
    </div>