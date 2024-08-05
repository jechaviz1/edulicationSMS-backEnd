<!-- Extends template page-->
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
    <style>
        @media (min-width: 1200px) {
            .modal-xxl {
                --bs-modal-width: 1502px;
            }
        }
    </style>
    @if ($message = Session::get('success'))
        <div class="alert alert-primary alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i
                        class="fa-solid fa-xmark"></i></span>
            </button>
            <strong>Success!</strong> {{ $message }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row marg_10">
            <div class="col-sm-12 col-lg-12">
                <h5>Enquiries</h5>
                    <div class="row">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-secondary ms-2 w-100">Filter</button>
                            <button type="button" class="btn btn-secondary ms-2 w-100">Bilk Email</button>
                            <button type="button" class="btn btn-secondary ms-2 w-100">Bulk SMS</button>
                            <button type="button" class="btn btn-secondary ms-2 w-100"><i class="fa-solid fa-copy"></i></button>
                            <button type="button" class="btn btn-secondary ms-2 w-100"><i class="fa-solid fa-copy"></i></button>
                            <button type="button" class="btn btn-secondary ms-2 w-100"><i class="fa-solid fa-copy"></i></button>
                          </div>
                    </div>
                  <div class="mt-4">
                    <table id="example4" class="display table mt-3" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Course Code</th>
                                <th>Location</th>
                                <th>Last Action</th>
                                <th>Assigned To</th>
                                <th>InfoPAK sent?</th>
                                <th>Chance</th>
                                <th>Actions</th>
                            </th>
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach ($enuiries as $enuiry)
                            <tr>
                                <td>{{ $enuiry->created_at }}</td>
                                <td>{{ $enuiry->student->first_name }} . {{ $enuiry->student->last_name }}</td>
                                <td>{{ $enuiry->course->code }}</td>
                                <td>
                                    @php
                                    foreach(json_decode($enuiry->cityList) as $row_city){
                                       $city =  App\Models\City::where('id',$row_city)->first(); 
                                        echo $city->name . '<br>';
                                    }
                                @endphp
                                    </td>
                                    <td>{{ $enuiry->updated_at }}</td>
                                <td>{{ $enuiry->assignTo }}</td>
                                <td>N</td>
                                <td> {{ $enuiry->important}}</td>
                                <td>
                                    <i title="Edit Enquiry" class="fa fa-pencil fa-2x mr-2 text-info" aria-hidden="true" onclick="editEnquiry({{$enuiry->id}});"></i>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </table>
                  </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script>
     function  editEnquiry(id){
            console.log(id)
        }
    </script>
@stop
