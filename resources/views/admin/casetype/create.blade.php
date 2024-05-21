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
                        <h6 class="m-0 font-weight-bold text-primary">Case Type</h6>
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('admin.case-type.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All Case Type</a></h1>
                    </div>
                  </div>
                  <div class="card-body">
  
                      <form action="{{ route('admin.case-type.store') }}" method="POST" enctype="multipart/form-data">
                          @csrf

                                <div class="form-group">
                                    <label for="name">Case Class</label>
                                    <select name="case_class" id="name" class="form-control" required>
                                        <option selected disabled hidden>Select</option>
                                        @foreach ($case as $row)
                                        <option value="{{ $row->name }}">
                                            {{ $row->name }}
                                        </option>
                                        @endforeach
                                    
                                    
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Case Category</label>
                                    <select name="case_category_id" id="name" class="form-control" required>
                                        <option selected disabled hidden>Select</option>
                                        @foreach ($casecategory as $row)
                                        <option value="{{ $row->id }}">
                                            {{ $row->name }}
                                        </option>
                                        @endforeach
                                       
                                       
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Case Type</label>
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
