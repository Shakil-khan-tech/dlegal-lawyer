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
                        <h6 class="m-0 font-weight-bold text-primary">Zone</h6>
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('admin.zone.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All Zones</a></h1>
                    </div>
                  </div>
                  <div class="card-body">
  
                      <form action="{{ route('admin.zone.store') }}" method="POST" enctype="multipart/form-data">
                          @csrf

                               
                                <div class="form-group">
                                    <label for="name">Police Station Name</label>
                                    <select name="thana_id" id="name" class="form-control" required>
                                        <option selected disabled hidden>Select</option>
                                        @foreach ($thana as $row)
                                        <option value="{{ $row->id }}">
                                            {{ $row->thana_name }}
                                        </option>
                                        @endforeach
                                    
                                    
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Zone Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control" required>
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
