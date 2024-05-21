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
                        <h6 class="m-0 font-weight-bold text-primary">District</h6>
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('admin.district.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All District</a></h1>
                    </div>
                  </div>
                  <div class="card-body">
  
                    <form action="{{ route('admin.district.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        
                            <div class="form-group">
                                <label for="name">Division</label>
                                <select name="division_id" id="name" class="form-control" required>
                                    <option selected disabled hidden>Select</option>
                                
                                    @foreach ($divition as $row)
                                    <option  value="{{ $row->id }}" {{ $data->division_id == $row->id ? 'selected' : '' }}>
                                        {{ $row->division_name }}
                                    </option>
                                    @endforeach
                                
                                
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="district_name">District Name</label>
                                <input type="text" class="form-control" name="district_name" value="{{ $data->district_name }}" required >
                            </div>
                                <div class="form-group">
                                    <label for="delete_status">Status</label>
                                    <select name="delete_status" id="delete_status" class="form-control" required>
                                        <option value="1" {{ $data->delete_status=='1'? 'selected':'' }}>Active</option>
                                        <option value="0" {{ $data->delete_status=='0'? 'selected':''}}>inactive</option>
                                    </select>
                                </div>
                           
                        <div class="d-flex justify-content-between">
                          <button type="submit" class="btn btn-success">Submit</button>
                          <a class="btn btn-info" href="{{ route('admin.district.index') }}" >Back</a>
                        </div>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  

  
@endsection
