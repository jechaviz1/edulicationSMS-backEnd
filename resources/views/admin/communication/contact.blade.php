<!-- Extends template page-->
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
<style>
  .fx-20{
    font-size: 20px
  }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title fx-20">Communication - Contact</h2>
                
            </div>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div class="card-body">
                <div class="form-validation">
                    <form action="{{ route('add.contact.person')}}" method="POST" class="row">
                        @csrf()
                        @method('POST')
                        <div class="col-md-4 mt-2">
                            <label for="validationCustom01" class="form-label">Name</label>
                            <input type="text" class="form-control" id="validationCustom01" name="name" value="" required>
                        
                          </div>
                          <div class="col-md-4 mt-2">
                            <label for="validationCustom02" class="form-label">Email</label>
                            <input type="email" class="form-control" id="validationCustom02" name="email" value="" required>
                           
                          </div>
                          <div class="col-md-4 mt-2">
                            <label for="validationCustom02" class="form-label">DOB</label>
                            <input type="date" class="form-control" id="validationCustom02" name="dob" value="" required>
                          
                          </div>
                          <div class="col-md-4 mt-2">
                            <label for="validationCustom02" class="form-label">Phone Number</label>
                            <input type="number" class="form-control" id="validationCustom02" name="phone_number" value="" required>
                           
                          </div>
                          <div class="col-md-4 mt-2">
                            <label for="validationCustom02" class="form-label">Address</label>
                            <input type="text" class="form-control" id="validationCustom02" name="address" value="" required>
                           
                          </div>
                          <div class="col-md-4 mt-2">
                            <label for="validationCustom02" class="form-label">Bussiness</label>
                            <input type="text" class="form-control" id="validationCustom02" name="bussiness" value="" required>
                          </div>
                          <div class="col-md-12 mt-3">
                            <div class="form-floating">
                              <textarea class="form-control" name="note" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                              <label for="floatingTextarea">Create Note</label>
                            </div>
                          </div>
                          <div class="col-12 mt-3">
                            <button class="btn btn-primary" type="submit">Create Person</button>
                          </div>
                    </form>
                </div>
            </div>
            <div class="p-3">
              {{-- @dd($rows) --}}
              <table id="example4" class="display table" style="min-width: 845px">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Dob</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Business</th>
                        <th>Action</th>
                    </th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($rows as $item)
                  <tr>
                    <th>{{ $item->name }}</th>
                    <th>{{ $item->email }}</th>
                    <th>{{ $item->dob }}</th>
                    <th>{{ $item->phone_number }}</th>
                    <th>{{ $item->address }}</th>
                    <th>{{ $item->bussiness }}</th>
                    <th>
                      <a href="{{ route('communication.create.edit',$item->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                      <form action="{{ route('communication.contact.delete', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i> Delete
                        </button>
                    </form>
                    </th>
                </th>
              </tr>
                  @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@stop