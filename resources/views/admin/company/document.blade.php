@php
    use Carbon\Carbon;
@endphp
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
    <div class="col-xl-12 events">
        <div class="card dz-card" id="accordion-four">
            <div class="card-header">
                <h4 class="card-title">Company Documents</h4>
            </div>
            <div class="card-block p-3">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                       <h6>InfoPAK</h6> 
                       <form action="{{ route('document.upload.file')}}" method="POST" enctype="multipart/form-data">
                        @csrf()
                        @method('POST')
                        <input type="hidden" class="form-control" name="type"  value="info">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="row mb-3">
                                    <label for="upload" class="col-sm-2 col-form-label">Upload</label>
                                    <div class="col-sm-10">
                                      <input type="file" name="file" class="form-control" id="upload" required>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="row mb-3">
                                    <label for="document_name" class="col-sm-2 col-form-label">Document Name</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" name="document_name" id="document_name">
                                    </div>
                                    <button type="submit" class="btn btn-primary col-sm-2">Upload</button>
                                  </div>
                            </div>
                        </div>
                       </form>
                    </div>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Document Name</th>
                            <th scope="col">File Name</th>
                            <th scope="col">Uploaded By</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            {{-- @dd($documents) --}}
                            @foreach ($infos as $companyDoc)
                            @php
                            $formattedDate = Carbon::parse($companyDoc->created_at)->format(
                                'd/m/Y',
                            );
                        @endphp
                            <tr>
                                <th>{{ $companyDoc->document_name }}</th>
                                <td><a href="{{ asset($companyDoc->file_name)}}" target="_blank">{{ $companyDoc->file_name }}</a></td>
                                <td>{{ $formattedDate }}</td>
                                <td>
                                    <a href="{{ route('document.upload.delete',$companyDoc->id)}}"><i class="fa fa-trash"></i></a>

                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
            <div class="card-block p-3">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                       <h6>Confirmation Email</h6> 
                       <form action="{{ route('document.upload.file')}}" method="POST" enctype="multipart/form-data">
                        @csrf()
                        @method('POST')
                        <input type="hidden" class="form-control" name="type" value="email">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="row mb-3">
                                    <label for="upload" class="col-sm-2 col-form-label">Upload</label>
                                    <div class="col-sm-10">
                                      <input type="file" name="file" class="form-control" id="upload" required>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="row mb-3">
                                    <label for="document_name" class="col-sm-2 col-form-label">Document Name</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" name="document_name" id="document_name">
                                    </div>
                                    <button type="submit" class="btn btn-primary col-sm-2">Upload</button>
                                  </div>
                            </div>
                        </div>
                       </form>
                    </div>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Document Name</th>
                            <th scope="col">File Name</th>
                            <th scope="col">Uploaded By</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($email as $companyDoc)
                            @php
                            $formattedDate = Carbon::parse($companyDoc->created_at)->format(
                                'd/m/Y',
                            );
                            @endphp
                            <tr>
                                <th>{{ $companyDoc->document_name }}</th>
                                <td><a href="{{ asset($companyDoc->file_name)}}" target="_blank">{{ $companyDoc->file_name }}</a></td>
                                <td>{{ $formattedDate }}</td>
                                <td>
                                    <a href="{{ route('document.upload.delete',$companyDoc->id)}}"><i class="fa fa-trash"></i></a>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
@stop
                