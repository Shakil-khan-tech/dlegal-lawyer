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
                                    <label for="name">Case Type</label>
                                    <input type="text" class="form-control" name="name" value="{{ $data->name }}" required readonly>
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
                                    <a class="btn btn-info" href="{{ route('admin.case-type.index') }}" >Back</a>
                                    <a href="{{ route('admin.case-type.edit',$data->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                  </div>
                     
                  </div>
              </div>
          </div>
      </div>
  

  
@endsection
