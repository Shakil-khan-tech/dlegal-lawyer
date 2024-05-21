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
                        <h6 class="m-0 font-weight-bold text-primary">Area</h6>
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('admin.area.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All Areas</a></h1>
                    </div>
                  </div>
                  <div class="card-body">
  
                    <form action="{{ route('admin.area.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        
                        
                        <div class="form-group">
                            <label for="zone_id">Zone</label>
                            <select name="zone_id" id="zone_id" class="form-control" required>
                                <option selected disabled hidden>Select</option>
                                @foreach ($zone as $row)
                                <option value="{{ $row->id }}" {{ $data->zone_id == $row->id ? 'selected' : '' }}>
                                    {{ $row->name }}
                                </option>
                                @endforeach
                            
                            
                            </select>
                        </div>
                    
                            <div class="form-group">
                                <label for="name">Area Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $data->name }}" required >
                            </div>
                
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control" >
                                        <option value="1" {{ $data->status=='1'? 'selected':'' }}>Active</option>
                                        <option value="0" {{ $data->status=='0'? 'selected':''}}>inactive</option>
                                    </select>
                                </div>
                           
                        <div class="d-flex justify-content-between">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn btn-info" href="{{ route('admin.area.index') }}" >Back</a>
                        </div>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  

  
@endsection
