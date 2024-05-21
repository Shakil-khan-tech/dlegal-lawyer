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
                        <h6 class="m-0 font-weight-bold text-primary">Ledger Sub Head</h6>
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('admin.ledger-sub-head.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All Ledger Sub Head</a></h1>
                    </div>
                  </div>
                  <div class="card-body">
  
                      
                            <div class="form-group">
                                <label for="ledger_head_id">Ledger Head</label>
                                <select name="ledger_head_id" id="ledger_head_id" class="form-control" required readonly>
                                    <option selected disabled hidden>Select</option>
                                    @foreach ($ledger as $row)
                                    <option value="{{ $row->id }}" {{ $data->ledger_head_id == $row->id ? 'selected' : '' }}>
                                        {{ $row->name }}
                                    </option>
                                    @endforeach
                                
                                
                                </select>
                            </div>
                                <div class="form-group">
                                    <label for="name">Ledger Sub Head</label>
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
                          <a class="btn btn-info" href="{{ route('admin.ledger-sub-head.index') }}" >Back</a>
                          <a href="{{ route('admin.ledger-sub-head.edit',$data->id) }}" class="btn btn-success" ><i class="fas fa-edit"></i></a>
                        </div>
                  </div>
              </div>
          </div>
      </div>
  

  
@endsection
