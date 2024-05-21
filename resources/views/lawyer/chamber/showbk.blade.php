@extends('layouts.lawyer.layout')
@section('title')
<title>{{ $title }}</title>
@endsection
@section('style')
<style>
    th{
        width:35%;
    }
</style>
@endsection
@section('lawyer-content')

    <div class="row">
        <div class="col-10 m-auto">
            <div class="card shadow mb-4 p-4">
                <div class="d-flex justify-content-between py-2">
                    <h5 class="text-info mb-0 pt-2">Name of Chamber --- {{ $data->ch_name }} </h5>
                    <a class="btn btn-info" href="{{ route('lawyer.chamber.all') }}">Back</a>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th>Name Of Chamber</th>
                        <td>{{ $data->ch_name }}</td>
                    </tr>
                    <tr>
                        <th>Chamber Logo</th>
                        <td>
                            <img src="{{ asset('uploads/chamber-images/'.$data->ch_logo) }}" alt="{{ $data->ch_name }}" height="150px" width="150px" style="border-radius: 50%;border:1px solid"/>
                        </td>
                    </tr>
                    <tr>
                        <th>Chamber Telephone</th>
                        <td>{{ $data->ch_telephone }}</td>
                    </tr>
                    <tr>
                        <th>Chamber Mobile-1</th>
                        <td>{{ $data->ch_mobile_one }}</td>
                    </tr><tr>
                        <th>Chamber Mobile-2</th>
                        <td>{{ $data->ch_mobile_two }}</td>
                    </tr>
                    <tr>
                        <th>Chamber Email-1</th>
                        <td>{{ $data->ch_email_one }}</td>
                    </tr>
                    <tr>
                        <th>Chamber Email-2</th>
                        <td>{{ $data->ch_email_two }}</td>
                    </tr>
                    <tr>
                        <th>Main Office Address</th>
                        <td>{{ $data->ch_main_office_address }}</td>
                    </tr>
                    <tr>
                        <th>Branch Office-1 Address</th>
                        <td>{{ $data->ch_office_one_address }}</td>
                    </tr>
                    <tr>
                        <th>Branch Office-2 Address</th>
                        <td>{{ $data->ch_office_two_address }}</td>
                    </tr>
                    <tr>
                        <th>Chamber Person</th>
                        <td>{{ $data->ch_person_type }}</td>
                    </tr>
                    <tr>
                        <th>Signature</th>
                        <td>
                            <img src="{{ asset('uploads/chamber-images/'.$data->ch_person_signature) }}" alt="{{ $data->ch_person_type }}" height="180px" width="500px"/>
    
                        </td>
                    </tr>
                    <tr>
                        <th>Letterhead Write-up</th>
                        <td>{{ $data->ch_letter_write_up_one }}</td>
                    </tr>
                    <tr>
                        <th>Letterhead Address</th>
                        <td>{{ $data->ch_letter_address_one }}</td>
                    </tr>
                    <tr>
                        <th>Chamber Status</th>
                        <td>
                            @if($data->status==1)
                            <span class="btn btn-success">Active</span>
                            @else
                            <span class="btn btn-danger">DeActive</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Action</th>
                        <td>
                            <a class="btn btn-info" href="{{ route('lawyer.chamber.show',$data->id) }}">View</a>
                            <a class="btn btn-warning" href="{{ route('lawyer.chamber.edit',$data->id) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('lawyer.chamber.delete',$data->id) }}">Delete</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>




    <!--<div class="row">-->
    <!--    <div class="col-12">-->
    <!--        <div class="card shadow mb-4">-->
    <!--            <div class="card-body">-->
    <!--                <h4 class="mb-3">Chamber Information for <span class="text-info">( {{ $data->ch_name }} )</span></h4>-->
                    
    <!--                <div class="row">-->
    <!--                    <div class="col-md-6">-->
    <!--                        <div class="form-group">-->
    <!--        	                <label for="ch_name" class="col-form-label font-weight-bold text-info mb-1 p-0">Name Of Chamber <span class="text-danger">*</span></label>-->
    <!--    	                    <input value="{{ $data->ch_name }}" type="text" name="ch_name" id="ch_name" class="form-control" readonly />-->
    <!--        	            </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-md-6">-->
    <!--                         <div class="form-group">-->
    <!--        	                <label for="ch_logo" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Logo<span class="text-danger">*</span></label>-->
    <!--    	                    <input type="file" value="{{ $data->ch_log }}" name="ch_logo" id="ch_logo" class="form-control p-1" readonly />-->
    <!--        	            </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-md-6">-->
    <!--                         <div class="form-group">-->
    <!--        	                <label for="ch_telephone" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Telephone<span class="text-danger">*</span></label>-->
    <!--    	                    <input type="number" value="{{ $data->ch_telephone }}" name="ch_telephone" id="ch_telephone" class="form-control" readonly />-->
    <!--        	            </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-md-6">-->
    <!--                        <div class="form-group">-->
    <!--        	                <label for="ch_mobile_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Mobile-1<span class="text-danger">*</span></label>-->
    <!--    	                    <input type="number" value="{{ $data->ch_mobile_one }}" name="ch_mobile_one" id="ch_mobile_one" class="form-control" readonly placeholder="+880"/>-->
    <!--        	            </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-md-6">-->
    <!--        	            <div class="form-group">-->
    <!--        	                <label for="ch_mobile_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Mobile-2<span class="text-danger">*</span></label>-->
    <!--    	                    <input type="number" vlaue="{{ $data->ch_mobile_two}}" name="ch_mobile_two" id="ch_mobile_two" class="form-control" readonly placeholder="+880"/>-->
    <!--        	            </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-md-6">-->
    <!--                         <div class="form-group">-->
    <!--        	                <label for="ch_email_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Email-1<span class="text-danger">*</span></label>-->
    <!--    	                    <input type="email" value="{{ $data->ch_email_one }}" name="ch_email_one" id="ch_email_one" class="form-control" readonly placeholder="example@gmail.com"/>-->
    <!--        	            </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-md-6">-->
    <!--                        <div class="form-group">-->
    <!--        	                <label for="ch_email_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Email-2<span class="text-danger">*</span></label>-->
    <!--    	                    <input type="email" value="{{ $data->ch_email_two }}" name="ch_email_two" id="ch_email_two" class="form-control" readonly placeholder="example@gmail.com"/>-->
    <!--        	            </div>-->
    <!--                    </div>-->
                        
    <!--                    <div class="col-md-6">-->
    <!--                        <div class="form-group">-->
    <!--        	                <label for="ch_main_office_address" class="col-form-label font-weight-bold text-info mb-1 p-0">Main Office Address <span class="text-danger">*</span></label>-->
    <!--    	                    <textarea name="ch_main_office_address" id="ch_main_office_address" rows="5" cols="5" class="form-control" readonly >-->
    <!--    	                        {{ $data->ch_main_office_address }}-->
    <!--    	                    </textarea>-->
    <!--        	            </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-md-6">-->
    <!--                        <div class="form-group">-->
    <!--        	                <label for="ch_office_one_address" class="col-form-label font-weight-bold text-info mb-1 p-0">Branch Office-1 Address <span class="text-danger">*</span></label>-->
    <!--    	                    <textarea name="ch_office_one_address" id="ch_office_one_address" rows="5" cols="5" class="form-control" readonly >-->
    <!--    	                        {{ $data->ch_office_one_address }}-->
    <!--    	                    </textarea>-->
    <!--        	            </div>-->
    <!--                    </div>-->
                        
    <!--                    <div class="col-md-6">-->
    <!--                         <div class="form-group">-->
    <!--        	                <label for="ch_office_two_address" class="col-form-label font-weight-bold text-info mb-1 p-0">Branch Office-2 Address <span class="text-danger">*</span></label>-->
    <!--    	                    <textarea name="ch_office_two_address" id="ch_office_two_address" rows="5" cols="5" class="form-control" readonly >-->
    <!--    	                        {{ $data->ch_office_two_address }}-->
    <!--    	                    </textarea>-->
    <!--        	            </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div> -->
    <!--        </div>-->
    <!--    </div>-->
        
        
    <!--    <div class="col-12">-->
    <!--        <div class="card shadow mb-4">-->
    <!--            <div class="card-body">-->
    <!--                <h4 class="mb-3">Chamber Person</h4>-->
                    
    <!--                <div class="row">-->
    <!--                    <div class="col-md-6">-->
    <!--                        <div class="form-group">-->
    <!--        	                <label for="ch_person_type" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Person<span class="text-danger">*</span></label>-->
    <!--    	                    <select class="form-control" id="ch_person_type" name="ch_person_type">-->
    <!--    	                        <option value="Head of Chamber" {{ $data->ch_person_type=='Head of Chamber' ? 'selected' : ''  }}>Head of Chamber</option>-->
    <!--    	                        <option value="Partner of Chamber" {{ $data->ch_person_type=='Partner of Chamber' ? 'selected' : ''  }}>Partner of Chamber</option>-->
    <!--    	                        <option value="Associate" {{ $data->ch_person_type=='Associate' ? 'selected' : ''  }}>Associate</option>-->
    <!--    	                        <option value="Contact Person" {{ $data->ch_person_type=='Contact Person' ? 'selected' : ''  }}>Contact Person</option>-->
    <!--    	                        <option value="Account" {{ $data->ch_person_type=='Account' ? 'selected' : ''  }}>Account</option>-->
    <!--    	                        <option value="Head Clerk" {{ $data->ch_person_type=='Head Clerk' ? 'selected' : ''  }}>Head Clerk</option>-->
    <!--    	                        <option value="Clerk" {{ $data->ch_person_type=='Clerk' ? 'selected' : ''  }}>Clerk</option>-->
    <!--    	                        <option value="Support Staff" {{ $data->ch_person_type=='Support Staff' ? 'selected' : ''  }}>Support Staff</option>-->
    <!--    	                    </select>-->
    <!--        	            </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-md-6">-->
    <!--                         <div class="form-group">-->
    <!--        	                <label for="ch_person_signature" class="col-form-label font-weight-bold text-info mb-1 p-0">Signature<span class="text-danger">*</span></label>-->
    <!--    	                    <input type="file" value="{{ $data->ch_person_signature }}" name="ch_person_signature" id="ch_person_signature" class="form-control p-1" readonly />-->
    <!--        	            </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div> -->
    <!--        </div>-->
    <!--    </div>-->
        
        
    <!--    <div class="col-12">-->
    <!--        <div class="card shadow mb-4">-->
    <!--            <div class="card-body">-->
    <!--                <h4 class="mb-3">Chamber Letterhead</h4>-->
                    
    <!--                <div class="row">-->
    <!--                    <div class="col-md-6">-->
    <!--                        <div class="form-group">-->
    <!--        	                <label for="ch_letter_write_up" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Write-up <span class="text-danger">*</span></label>-->
    <!--    	                    <textarea cols="3" rows="3" type="text" name="ch_letter_write_up" id="ch_letter_write_up" class="form-control">-->
    <!--    	                        {{ $data->ch_letter_write_up }}-->
    <!--    	                    </textarea>-->
    <!--        	            </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-md-6">-->
    <!--                         <div class="form-group">-->
    <!--        	                <label for="ch_letter_address" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address<span class="text-danger">*</span></label>-->
    <!--    	                    <textarea cols="3" rows="3" type="text" name="ch_letter_address" id="ch_letter_address" class="form-control">-->
    <!--    	                        {{ $data->ch_letter_address }}-->
    <!--    	                    </textarea>-->
    <!--        	            </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-md-6">-->
    <!--                        <div class="form-group">-->
    <!--        	                <label for="status" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Status<span class="text-danger">*</span></label>-->
    <!--    	                    <select class="form-control" id="status" name="status">-->
    <!--    	                        <option value="1" {{ $data->status==1 ? 'selected' : '' }}>Active</option>-->
    <!--    	                        <option value="0" {{ $data->status==0 ? 'selected' : '' }}>DeActive</option>-->
    <!--    	                    </select>-->
    <!--        	            </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div> -->
                
    <!--            <div class="card-footer d-flex justify-content-end">-->
    <!--                <a href="{{ route('lawyer.chamber.all') }}" class="btn btn-info btn-lg">Back</a>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
        
    <!--</div>-->

@endsection
@section('script')

@endsection