@extends('layouts.lawyer.layout')
@section('title')
<title>{{ $title }}</title>
@endsection
@section('style')
<style>
.container-checkbox {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 12px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        color: #000;
        padding-right: 15px;

    }

    .container-checkbox input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }


    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 20px;
        width: 20px;
        border: 1px solid #ccc;
    }



    .container-checkbox input:checked~.checkmark {
        background-color: #2196F3;
    }


    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    .checkmark::before {
        content: "";
        position: absolute;
        display: block;
    }


    .container-checkbox input:checked~.checkmark:after {
        display: block;
    }

    .container-checkbox .checkmark:after {
        left: 6px;
        top: 1px;
        width: 6px;
        height: 13px;
        border: solid white;
        border-width: 0 2px 2px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .checkmark::before {
        left: 6px;
        top: 1px;
        width: 6px;
        height: 13px;
        border: solid #ccc;
        border-width: 0 2px 2px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
        transform: rotate(45deg);
    }

</style>
@endsection
@section('lawyer-content')

 <form id="myForm" action="{{ route('lawyer.chamber.update',$data->id); }}" method="post" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="lawyer_id" value="{{ auth()->guard('lawyer')->id() }}">
        
    <div class="row">
        
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h4 class="mb-3">Chamber Information for <span class="text-info">( {{ $data->ch_name }} )</span></h4>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
            	                <label for="ch_name" class="col-form-label font-weight-bold text-info mb-1 p-0">Name Of Chamber <span class="text-danger">*</span></label>
        	                    <input value="{{ $data->ch_name }}" type="text" name="ch_name" id="ch_name" class="form-control" required />
            	            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
            	                <label for="ch_logo" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Logo<span class="text-danger">*</span></label>
        	                    <input type="file" value="{{ $data->ch_log }}" name="ch_logo" id="ch_logo" class="form-control p-1" />
        	                    <input type="hidden" value="{{ asset('uploads/chamber-images/'.$data->ch_logo) }}" name="old_image" id="old_image" class="form-control p-1" />
            	            </div>
            	            <div>
            	                <img src="{{ asset('uploads/chamber-images/'.$data->ch_logo) }}" height="150px" width="150px" style="border-radius: 50%;border:1px solid"/>
            	            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
            	                <label for="ch_telephone" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Telephone<span class="text-danger">*</span></label>
        	                    <input type="number" value="{{ $data->ch_telephone }}" name="ch_telephone" id="ch_telephone" class="form-control" required />
            	            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
            	                <label for="ch_mobile_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Mobile-1<span class="text-danger">*</span></label>
        	                    <input type="number" value="{{ $data->ch_mobile_one }}" name="ch_mobile_one" id="ch_mobile_one" class="form-control" required placeholder="+880"/>
            	            </div>
                        </div>
                        <div class="col-md-6">
            	            <div class="form-group">
            	                <label for="ch_mobile_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Mobile-2<span class="text-danger">*</span></label>
        	                    <input type="number" value="{{ $data->ch_mobile_two }}" name="ch_mobile_two" id="ch_mobile_two" class="form-control" required placeholder="+880"/>
            	            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
            	                <label for="ch_email_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Email-1<span class="text-danger">*</span></label>
        	                    <input type="email" value="{{ $data->ch_email_one }}" name="ch_email_one" id="ch_email_one" class="form-control" required placeholder="example@gmail.com"/>
            	            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
            	                <label for="ch_email_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Email-2<span class="text-danger">*</span></label>
        	                    <input type="email" value="{{ $data->ch_email_two }}" name="ch_email_two" id="ch_email_two" class="form-control" required placeholder="example@gmail.com"/>
            	            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
            	                <label for="ch_main_office_address" class="col-form-label font-weight-bold text-info mb-1 p-0">Main Office Address <span class="text-danger">*</span></label>
        	                    <textarea name="ch_main_office_address" id="ch_main_office_address" rows="5" cols="5" class="form-control" required >
        	                        {{ $data->ch_main_office_address }}
        	                    </textarea>
            	            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
            	                <label for="ch_office_one_address" class="col-form-label font-weight-bold text-info mb-1 p-0">Branch Office-1 Address <span class="text-danger">*</span></label>
        	                    <textarea name="ch_office_one_address" id="ch_office_one_address" rows="5" cols="5" class="form-control" required >
        	                        {{ $data->ch_office_one_address }}
        	                    </textarea>
            	            </div>
                        </div>
                        
                        <div class="col-md-6">
                             <div class="form-group">
            	                <label for="ch_office_two_address" class="col-form-label font-weight-bold text-info mb-1 p-0">Branch Office-2 Address <span class="text-danger">*</span></label>
        	                    <textarea name="ch_office_two_address" id="ch_office_two_address" rows="5" cols="5" class="form-control" required >
        	                        {{ $data->ch_office_two_address }}
        	                    </textarea>
            	            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        
        
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h4 class="mb-3">Chamber Person</h4>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
            	                <label for="ch_person_type" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Person<span class="text-danger">*</span></label>
        	                    <select class="form-control" id="ch_person_type" name="ch_person_type">
        	                        <option value="Head of Chamber" {{ $data->ch_person_type=='Head of Chamber' ? 'selected' : ''  }}>Head of Chamber</option>
        	                        <option value="Partner of Chamber" {{ $data->ch_person_type=='Partner of Chamber' ? 'selected' : ''  }}>Partner of Chamber</option>
        	                        <option value="Associate" {{ $data->ch_person_type=='Associate' ? 'selected' : ''  }}>Associate</option>
        	                        <option value="Contact Person" {{ $data->ch_person_type=='Contact Person' ? 'selected' : ''  }}>Contact Person</option>
        	                        <option value="Account" {{ $data->ch_person_type=='Account' ? 'selected' : ''  }}>Account</option>
        	                        <option value="Head Clerk" {{ $data->ch_person_type=='Head Clerk' ? 'selected' : ''  }}>Head Clerk</option>
        	                        <option value="Clerk" {{ $data->ch_person_type=='Clerk' ? 'selected' : ''  }}>Clerk</option>
        	                        <option value="Support Staff" {{ $data->ch_person_type=='Support Staff' ? 'selected' : ''  }}>Support Staff</option>
        	                    </select>
            	            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
            	                <label for="ch_person_signature" class="col-form-label font-weight-bold text-info mb-1 p-0">Signature<span class="text-danger">*</span></label>
        	                    <input type="file" value="{{ $data->ch_person_signature }}" name="ch_person_signature" id="ch_person_signature" class="form-control p-1" />
        	                    <input type="hidden" value="{{ asset('uploads/chamber-images/'.$data->ch_person_signature) }}" name="old_image1" id="old_image1" class="form-control p-1" />
            	            </div>
            	            <div>
            	                <img src="{{ asset('uploads/chamber-images/'.$data->ch_person_signature) }}" height="180px" width="500px" />
            	            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        
        
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="mb-3">Chamber Letterhead 1</h4>
                        <label class="container-checkbox">Active
                            <input id="ch_status-{{ $data->ch_status==1 }}" type="checkbox" {{ $data->ch_status==1 ? 'checked':''  }} name="ch_status" value="1">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
            	                <label for="ch_letter_write_up_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Write-up <span class="text-danger">*</span></label>
        	                    <textarea cols="3" rows="3" type="text" name="ch_letter_write_up_one" id="ch_letter_write_up_one" class="summernote form-control">
        	                        {{ trim($data->ch_letter_write_up_one) }}
        	                    </textarea>
            	            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
            	                <label for="ch_letter_address_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address<span class="text-danger">*</span></label>
        	                    <textarea cols="3" rows="3" type="text" name="ch_letter_address_one" id="ch_letter_address_one" class="summernote form-control">
        	                        {{ $data->ch_letter_address_one }}
        	                    </textarea>
            	            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="mb-3">Chamber Letterhead 2</h4>
                        <label class="container-checkbox">Active
                            <input id="ch_status{{ $data->ch_status==2 }}" type="checkbox" {{ $data->ch_status==2 ? 'checked':''  }} name="ch_status" value="2">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
            	                <label for="ch_letter_write_up_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Write-up <span class="text-danger">*</span></label>
        	                    <textarea cols="3" rows="3" type="text" name="ch_letter_write_up_two" id="ch_letter_write_up_two" class="summernote form-control">
        	                        {{ trim($data->ch_letter_write_up_two) }}
        	                    </textarea>
            	            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
            	                <label for="ch_letter_address_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address<span class="text-danger">*</span></label>
        	                    <textarea cols="3" rows="3" type="text" name="ch_letter_address_two" id="ch_letter_address_two" class="summernote form-control">
        	                        {{ $data->ch_letter_address_two }}
        	                    </textarea>
            	            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
            	                <label for="status" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Status<span class="text-danger">*</span></label>
        	                    <select class="form-control" id="status" name="status">
        	                        <option value="1" {{ $data->status==1 ? 'selected' : '' }}>Active</option>
        	                        <option value="0" {{ $data->status==0 ? 'selected' : '' }}>DeActive</option>
        	                    </select>
            	            </div>
                        </div>
                    </div>
                </div> 
                
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-info btn-lg">Update</a>
                </div>
            </div>
        </div>
        
        
    </div>
 </form>

@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('textarea').each(function() {
            $(this).val($(this).val().trim());
        });
    });
     $('.summernote').summernote({
        height: 260,
        fontSizeUnits: ['px', 'pt'],
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear','marginClass', 'paddingClass']],
            ['font', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph', 'style']],
            ['fullscrenn', ['fullscreen']],
            ['misc', ['undo', 'redo', 'codeview']],
            ['height', ['height']],
        ],
        buttons: {
        marginClass: function () {
          // Apply custom CSS class for margin
          $('.summernote').addClass('custom-margin-class');
        },
        paddingClass: function () {
          // Apply custom CSS class for padding
          $('.summernote').addClass('custom-padding-class');
        }
      }
   });
</script>
@endsection