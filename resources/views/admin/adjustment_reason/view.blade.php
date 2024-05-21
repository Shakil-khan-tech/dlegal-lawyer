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
                        <h6 class="m-0 font-weight-bold text-primary">Adjustment Reason</h6>
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('admin.adjustment-reason.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All Adjustment Reasons</a></h1>
                    </div>
                  </div>
                  <div class="card-body">
  
                      
                        
                                <div class="form-group">
                                    <label for="name">Adjustment Reason</label>
                                    <input type="text" class="form-control" name="name" value="{{ $data->name }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control" readonly>
                                        <option value="1" {{ $data->stutus=='1'? 'selected':'' }}>Active</option>
                                        <option value="0" {{ $data->status=='0'? 'selected':''}}>inactive</option>
                                    </select>
                                </div>
                           
                        <div class="d-flex justify-content-between">
                          {{-- <button type="submit" class="btn btn-success">Submit</button> --}}
                          <a class="btn btn-info" href="{{ route('admin.adjustment-reason.index') }}" >Back</a>
                          <a href="{{ route('admin.adjustment-reason.edit',$data->id) }}" class="btn btn-success" ><i class="fas fa-edit"></i></a>
                        </div>
                  </div>
              </div>
          </div>
      </div>
  

  
@endsection
