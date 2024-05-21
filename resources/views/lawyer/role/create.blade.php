@extends('layouts.lawyer.layout')
@section('title')
<title>	</title>
@endsection
@section('lawyer-content')

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col-3">
                        <h3 class="mb-2 font-weight-bold" style="color: black;">Role Setup</h3>
                    </div>
                    <div class="col-9">
                    </div>
                </div>
            </div>
            <div class="card-body">

            	<div class="case-info-section section">
                   <div class="row pb-3">
                       <div class="col-md-12">
                        <form action="{{ route("lawyer.role.store") }}" method="POST">
                            @csrf
                           <div class="form-group row px-5">
                            <input type="hidden" name="lawyer_id" value="{{ auth()->guard('lawyer')->id() }}">
                               <label for="role_name" class="col-form-label font-weight-bold text-info">Role Name</label>
                               <input type="text" required class="form-control" name="name" value="{{ old('name') }}" placeholder="eg: Editor">
                           </div>
                           <button type="submit" class="btn btn-secondary float-right mb-4 mt-3 px-4 mr-5"><i class="fa fa-file"></i> Save</button>
                       </form>
                   </div>
               </div>
           </div>

       </div>
   </div>
</div>
</div>

@endsection