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
                        <h6 class="m-0 font-weight-bold text-primary">Document Litigation </h6>
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('admin.document-received.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All Document Received </a></h1>
                    </div>
                  </div>
                  <div class="card-body">
  
                    <form action="{{ route('admin.document-received.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="name">Document Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $data->name }}" >
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" >
                                <option value="1" {{ $data->stutus=='1'? 'selected':'' }}>Active</option>
                                <option value="0" {{ $data->status=='0'? 'selected':''}}>inactive</option>
                            </select>
                        </div>
                           
                        <div class="d-flex justify-content-between">
                          <button type="submit" class="btn btn-success">Submit</button>
                          <a class="btn btn-info" href="{{ route('admin.document-received.index') }}" >Back</a>
                        </div>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  

  
@endsection
