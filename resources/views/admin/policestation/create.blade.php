@extends('layouts.admin.layout')
@section('title')
<title></title>
@endsection
@section('admin-content')
   
     
      <!-- DataTales Example -->
      <div class="row">
          <div class="col-md-6 m-auto">
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <div class="d-flex d-flex justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Police Station</h6>
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('admin.police-station.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All Police Station</a></h1>
                    </div>
                  </div>
                  <div class="card-body">
  
                      <form action="{{ route('admin.police-station.store') }}" method="POST" enctype="multipart/form-data">
                          @csrf

                               
                                <div class="form-group">
                                    <label for="name">District</label>
                                    <select name="district_id" id="name" class="form-control" required>
                                        <option selected disabled hidden>Select</option>
                                        @foreach ($district as $row)
                                        <option value="{{ $row->id }}">
                                            {{ $row->district_name }}
                                        </option>
                                        @endforeach
                                    
                                    
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="thana_name">Police Station Name</label>
                                    <input type="text" class="form-control" name="thana_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="delete_status">Status</label>
                                    <select name="delete_status" id="delete_status" class="form-control" required>
                                        <option value="1">Active</option>
                                        <option value="0">inactive</option>
                                    </select>
                                </div>
                           
                          <button type="submit" class="btn btn-success">Submit</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  

  
@endsection
