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
                        <h6 class="m-0 font-weight-bold text-primary">Case Court</h6>
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('admin.court.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All Case Court</a></h1>
                    </div>
                  </div>
                  <div class="card-body">
  
                      
                          <div class="form-group">
                            <label for="name">Case Class</label>
                            <select name="case_class" id="name" class="form-control" required readonly>
                                <option >Select</option>
                                @foreach ($case as $row)
                                <option value="{{ $row->name }}" {{ $data->case_class==$row->name ? 'selected':'' }}>{{ $row->name }}</option>
                                @endforeach
                               
                               
                            </select>
                        </div>
                                <div class="form-group">
                                    <label for="name">Case Category</label>
                                    <select name="case_category_id" id="name" class="form-control" required readonly>
                                        <option selected disabled hidden>Select</option>
                                        <option >Select</option>
                                        @foreach ($casecategory as $row)
                                        <option value="{{ $row->id }}" {{ $data->case_category_id==$row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">District Name</label>
                                    <select name="district_id" id="name" class="form-control" required readonly>
                                        <option selected disabled hidden>Select</option>
                                        @foreach ($district as $row)
                                        <option value="{{ $row->district_name }}"{{ $data->district_id==$row->district_name ? 'selected':'' }}>
                                            {{ $row->district_name}}
                                        </option>
                                        @endforeach
                                       
                                       
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for="all_district">All District</label>
                                    <select name="all_district" id="all_district" class="form-control" required readonly>
                                        <option value="1" {{ $data->all_district=='1'? 'selected':'' }}>Yes</option>
                                        <option value="0" {{ $data->all_district=='0'? 'selected':'' }}>No</option>
                                    </select>
                                </div> 
                               
                                <div class="form-group">
                                    <label for="name">Court Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $data->name }}" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="name_short">Name Short</label>
                                    <input type="text" class="form-control" name="name_short" value="{{ $data->name_short }}" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="sort">Sort</label>
                                    <input type="number" class="form-control" name="sort" value="{{ $data->sort }}" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control" required readonly>
                                        <option value="1" {{ $data->stutus=='1'? 'selected':'' }}>Active</option>
                                        <option value="0" {{ $data->status=='0'? 'selected':''}}>inactive</option>
                                    </select>
                                </div>
                           
                                <div class="d-flex justify-content-between">
                                    {{-- <button type="submit" class="btn btn-success">Update</button> --}}
                                    <a class="btn btn-info" href="{{ route('admin.court.index') }}" >Back</a>
                                    <a href="{{ route('admin.court.edit',$data->id) }}" class="btn btn-success" ><i class="fas fa-edit"></i></a>
                                  </div>
                     
                  </div>
              </div>
          </div>
      </div>
  

  
@endsection
