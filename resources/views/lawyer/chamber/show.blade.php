@extends('layouts.lawyer.layout')

@section('title')
<title>View Client</title>
<style>
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/scroller/2.1.1/css/scroller.dataTables.min.css" rel="stylesheet">
.tab{display: none; width: 100%; height: 50%;margin: 0px auto;}
.current{display: block;}
/* form {background-color: #ffffff; margin: 100px auto; font-family: Raleway; padding: 40px; width: 100%; min-width: 300px; } */

button {background-color: #2c9faf; color: #ffffff; border: none; padding: 10px 20px; font-size: 17px; font-family: Raleway; cursor: pointer; }

button:hover {opacity: 0.8; }

.previous {background-color: #2c9faf; }

/* Make circles that indicate the steps of the form: */
.step.active {opacity: 1; background-color: #2c9faf !important;border-color: #2c9faf !important;}
.custom-btn {opacity: 1; background-color: #2c9faf !important;border-color: #2c9faf !important;color:white !important;}
.step.finish {background-color: #4CAF50; }
.error {color: #f00 !important;font-size: 15px !important;width: 100% !important; }
    </style>
@endsection
@section('lawyer-content')
<style>
    .add__btn{
    display: flex;
    justify-content: space-between;
    }
    .add__btn button{
    color: #fff;
    padding: 1px 5px;
    border-radius: 5px;
    height: 25px;
    }
    #DeleteRow{
         font-size: 13px;
        padding: 8px;
    }
    .Add_section{
        display:flex;
        justify-content: space-between;
    }
    .Add_section button{
     height: 38px;
    width: 40px;
    margin-left: 5px;
    }
    .attributes{
        width:100%;
    }
    .leadlawyer,
    .Assignedlawyer,
    .Assignedlawyer-clerk,
    .contact{
        width:100%;
    }
    .info_card{
        padding: 20px;
        box-shadow: 0 0px 27px rgb(40 42 53 / 35%);
        border-radius: 8px;

        }
    .case__file{
         box-shadow: 0 0px 27px rgb(40 42 53 / 35%);
    }
        .step.active {
    color: #fff !important;
    opacity: 1;
    background-color: #2c9faf !important;
    border-color: #2c9faf !important;
}
.mult-select-tag .body {
    display: flex;
    border: 1px solid rgb(71 187 206) !important;
    background: #fff;
    min-height: 2.15rem;
    width: 100%;
    min-width: 14rem;
}
.mult-select-tag .btn-container {
    color: #6e707e;
    padding: 0.5rem;
    display: flex;
    border-left: 1px solid rgb(71 187 206) !important;
}
.mult-select-tag button {
    cursor: pointer;
    width: 100%;
    color: #585962;
}

.sticky {
  position: fixed;
  top:0;
  margin-left: 0px;
  margin-right: 15px;
  background: #fff;
  z-index: 9999999999;
  box-shadow: 0 1.15rem 1.75rem 0 rgba(58, 59, 69, 0.15) !important;
  border-radius: 5px;
}

.sticky + .content {
  padding-top: 102px;
}
.family_info input,
.family_info textarea{
    width:65% !important;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
    <!-- DataTales Example -->



<div class="row">
    <div class="col-12">
        <div class=" mb-4">
             <form id="myForm" action="{{ route('lawyer.chamber.update',$data->id); }}" method="post" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="lawyer_id" value="{{ auth()->guard('lawyer')->id() }}">
        

                <div class="card shadow mt-3" style="border:0;border-bottom: 1px solid black;border-bottom-left-radius: 0;border-bottom-right-radius: 0;">
                    <div class="card-body">

                        <div class="row">
                            <div class="d-flex justify-content-center w-100 mb-2 nav nav-tabs"  id="myTab" role="tablist" style="border-bottom:unset;">
                                <button
                                    class=" btn custom-btn mx-1 step nav-link  active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Chamber Information</button>
                                <button
                                    class="btn btn-secondary mx-1 step nav-link" onclick="$('#home-tab').removeClass('custom-btn') ;$('#home-tab').addClass('btn-secondary')" id="personal-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="false">Letterhead</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card shadow mb-4">
                                        <div class="card-body row">
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
                                                    <!--<input type="hidden" value="{{ asset('uploads/chamber-images/'.$data->ch_logo) }}" name="old_image" id="old_image" class="form-control p-1" />-->
                                                </div>
                                                <div>
                                                    <img src="{{ asset('uploads/chamber-images/'.$data->ch_logo) }}" height="150px" width="150px" style="border-radius: 50%;border:1px solid"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                 <div class="form-group">
                                                    <label for="ch_telephone" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Telephone<span class="text-danger">*</span></label>
                                                    <input type="text" value="{{ $data->ch_telephone }}" name="ch_telephone" id="ch_telephone" class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="ch_mobile_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Mobile-1<span class="text-danger">*</span></label>
                                                    <input type="text" value="{{ $data->ch_mobile_one }}" name="ch_mobile_one" id="ch_mobile_one" class="form-control" required placeholder="+880"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="ch_mobile_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Mobile-2<span class="text-danger">*</span></label>
                                                    <input type="text" value="{{ $data->ch_mobile_two }}" name="ch_mobile_two" id="ch_mobile_two" class="form-control" required placeholder="+880"/>
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
                            
                            <div class="row">
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
                                                        <!--<input type="hidden" value="{{ asset('uploads/chamber-images/'.$data->ch_person_signature) }}" name="old_image1" id="old_image1" class="form-control p-1" />-->
                                                    </div>
                                                    <div>
                                                        <img src="{{ asset('uploads/chamber-images/'.$data->ch_person_signature) }}" width="220px" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
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
                                                        <textarea readonly cols="3" rows="3" type="text" name="ch_letter_write_up_one" id="ch_letter_write_up_one" class="summernote form-control">
                                                            {{ trim($data->ch_letter_write_up_one) }}
                                                        </textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                     <div class="form-group">
                                                        <label for="ch_letter_address_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address<span class="text-danger">*</span></label>
                                                        <textarea readonly cols="3" rows="3" type="text" name="ch_letter_address_one" id="ch_letter_address_one" class="summernote form-control">
                                                            {{ $data->ch_letter_address_one }}
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
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
                                        
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                        <div class="tab-pane fade" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="case-info-section section">
                                        <div class="d-flex justify-content-between">
                                            <h4 class="text-black">Letterhead (Chamber)</h4>
                                           <label class="container-checkbox">Active
                                                <input type="checkbox" name="ch_status" value="1" {{ $data->ch_status==1 ? 'checked':'' }}>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        
                                        <div class="row mt-3">
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_chamber_title" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead (Title)<span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly type="text" id="h_chamber_title" value="{{ $data->h_chamber_title }}" name="h_chamber_title" id="h_chamber_title" class="form-control valid" required="">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_chamber_title_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead (Sub-title)</label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly id="h_chamber_title_one" value="{{ $data->h_chamber_title_one }}" type="text" name="h_chamber_title_one" id="h_chamber_title_one" class="form-control valid">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_chamber_line_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Line 1</label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly id="h_chamber_line_one" value="{{ $data->h_chamber_line_one }}" type="text" name="h_chamber_line_one" id="h_chamber_line_one" class="form-control valid">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_chamber_line_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Line 2</label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly type="text" value="{{ $data->h_chamber_line_two }}" id="h_chamber_line_two" name="h_chamber_line_two" id="h_chamber_line_two" class="form-control valid">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_chamber_line_three" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Line 3</label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly type="text" value="{{ $data->h_chamber_line_three }}" id="h_chamber_line_three" name="h_chamber_line_three" id="h_chamber_line_three" class="form-control valid">
                                                    </div>
                                	            </div>
                                            </div>
        
                                          
                                        </div>
                                        
                                        
                                        <div class="row mt-3">
                                            <h5 class="text-black col-lg-12 mb-3">Letterhead Address (Chamber)</h5>
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_chamber_address_title_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address Title 1<span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly type="text" value="{{ $data->h_chamber_address_title_one }}" id="h_chamber_address_title_one" name="h_chamber_address_title_one" id="h_chamber_address_title_one" class="form-control valid" required="">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_chamber_address_line_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address Line 1</label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly type="text" value="{{ $data->h_chamber_address_line_one }}" id="h_chamber_address_line_one" name="h_chamber_address_line_one" id="h_chamber_address_line_one" class="form-control valid">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_chamber_address_line_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address Line 2</label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly type="text" value="{{ $data->h_chamber_address_line_two }}" id="h_chamber_address_line_two" name="h_chamber_address_line_two" id="h_chamber_address_line_two" class="form-control valid">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_chamber_address_title_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address Title 2<span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly type="text" value="{{ $data->h_chamber_address_title_two }}" id="h_chamber_address_title_two" name="h_chamber_address_title_two" id="h_chamber_address_title_two" class="form-control valid" required="">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_chamber_address_title_two_line_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address Line 1</label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly type="text" value="{{ $data->h_chamber_address_title_two_line_one }}" id="h_chamber_address_title_two_line_one" name="h_chamber_address_title_two_line_one" id="h_chamber_address_title_two_line_one" class="form-control valid">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_chamber_address_title_two_line_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address Line 2</label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly type="text" value="{{ $data->h_chamber_address_title_two_line_two }}" id="h_chamber_address_title_two_line_two" name="h_chamber_address_title_two_line_two" id="h_chamber_address_title_two_line_two" class="form-control valid">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_chamber_cell_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Cell 1<span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly type="text" value="{{ $data->h_chamber_cell_one }}" id="h_chamber_cell_one" name="h_chamber_cell_one" id="h_chamber_cell_one" class="form-control valid" required="">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_chamber_cell_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Cell 2</label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly type="text" value="{{ $data->h_chamber_cell_two }}" id="h_chamber_cell_two" name="h_chamber_cell_two" id="h_chamber_cell_two" class="form-control valid">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_chamber_email_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Email 1<span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly type="email" value="{{ $data->h_chamber_email_one }}" id="h_chamber_email_one" name="h_chamber_email_one" id="h_chamber_email_one" class="form-control valid" required="">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_chamber_email_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Email 2</label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly type="email" value="{{ $data->h_chamber_email_two }}" id="h_chamber_email_two" name="h_chamber_email_two" id="h_chamber_email_two" class="form-control valid">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow mt-3">
                                <div class="card-body">
                                    <div class="case-info-section section">
                                        <div class="d-flex justify-content-between">
                                            <h4 class="text-black">Letterhead (Lawyer)</h4>
                                           <label class="container-checkbox">Active
                                                <input readonly type="checkbox" name="ch_status" value="2" {{ $data->ch_status==2 ? 'checked':'' }}>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        
                                        <div class="row mt-3">
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_lawyer_name" class="col-form-label font-weight-bold text-info mb-1 p-0">Lawyer Name<span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly value="{{ $data->h_lawyer_name }}" type="text" id="h_lawyer_name" name="h_lawyer_name" id="h_lawyer_name" class="form-control valid" required="">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_lawyer_degree" class="col-form-label font-weight-bold text-info mb-1 p-0">Lawyer Degree</label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly value="{{ $data->h_lawyer_degree }}" id="h_lawyer_degree" type="text" name="h_lawyer_degree" id="h_lawyer_degree" class="form-control valid">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_lawyer_deg_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Lawyer Designation 1<span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly value="{{ $data->h_lawyer_deg_one }}" id="h_lawyer_deg_one" type="text" name="h_lawyer_deg_one" id="h_lawyer_deg_one" class="form-control valid" required>
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_lawyer_deg_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Lawyer Designation 2</label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly value="{{ $data->h_lawyer_deg_two }}" type="text" id="h_lawyer_deg_two" name="h_lawyer_deg_two" id="h_lawyer_deg_two" class="form-control valid">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_lawyer_court_office" class="col-form-label font-weight-bold text-info mb-1 p-0">Lawyer Court / Office 1<span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly value="{{ $data->h_lawyer_court_office }}" type="text" id="h_lawyer_court_office" name="h_lawyer_court_office" id="h_lawyer_court_office" class="form-control valid" required>
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_lawyer_court_office_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Lawyer Court / Office 2</label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly value="{{ $data->h_lawyer_court_office_one }}" type="text" id="h_lawyer_court_office_one" name="h_lawyer_court_office_one" id="h_lawyer_court_office_one" class="form-control valid">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_lawyer_cell" class="col-form-label font-weight-bold text-info mb-1 p-0">Lawyer Cell</label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly value="{{ $data->h_lawyer_cell }}" type="text" id="h_lawyer_cell" name="h_lawyer_cell" id="h_lawyer_cell" class="form-control valid">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_lawyer_email" class="col-form-label font-weight-bold text-info mb-1 p-0">Lawyer Email</label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly value="{{ $data->h_lawyer_email }}" type="text" id="h_lawyer_email" name="h_lawyer_email" id="h_lawyer_email" class="form-control valid">
                                                    </div>
                                	            </div>
                                            </div>
        
                                          
                                        </div>
                                        
                                        
                                        <div class="row mt-3">
                                            <h5 class="text-black col-lg-12 mb-3">Letterhead Address (Lawyer)</h5>
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_lawyer_address_title_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address Title 1<span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly value="{{ $data->h_lawyer_address_title_one }}" type="text" id="h_lawyer_address_title_one" name="h_lawyer_address_title_one" id="h_lawyer_address_title_one" class="form-control valid" required="">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_lawyer_address_line_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address Line 1</label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly value="{{ $data->h_lawyer_address_line_one }}" type="text" id="h_lawyer_address_line_one" name="h_lawyer_address_line_one" id="h_lawyer_address_line_one" class="form-control valid">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_lawyer_address_line_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address Line 2</label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly value="{{ $data->h_lawyer_address_line_two }}" type="text" id="h_lawyer_address_line_two" name="h_lawyer_address_line_two" id="h_lawyer_address_line_two" class="form-control valid">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_lawyer_address_title_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address Title 2<span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly value="{{ $data->h_lawyer_address_title_two }}" type="text" id="h_lawyer_address_title_two" name="h_lawyer_address_title_two" id="h_lawyer_address_title_two" class="form-control valid" required="">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_lawyer_address_title_two_line_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address Line 1</label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly value="{{ $data->h_lawyer_address_title_two_line_one }}" type="text" id="h_lawyer_address_title_two_line_one" name="h_lawyer_address_title_two_line_one" id="h_lawyer_address_title_two_line_one" class="form-control valid">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_lawyer_address_title_two_line_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address Line 2</label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly value="{{ $data->h_lawyer_address_title_two_line_two }}" type="text" id="h_lawyer_address_title_two_line_two" name="h_lawyer_address_title_two_line_two" id="h_lawyer_address_title_two_line_two" class="form-control valid">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_lawyer_cell_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Cell 1<span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly value="{{ $data->h_lawyer_cell_one }}" type="text" id="h_lawyer_cell_one" name="h_lawyer_cell_one" id="h_lawyer_cell_one" class="form-control valid" required="">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_lawyer_cell_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Cell 2</label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly value="{{ $data->h_lawyer_cell_two }}" type="text" id="h_lawyer_cell_two" name="h_lawyer_cell_two" id="h_lawyer_cell_two" class="form-control valid">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_lawyer_email_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Email 1<span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly value="{{ $data->h_lawyer_email_one }}" type="email" id="h_lawyer_email_one" name="h_lawyer_email_one" id="h_lawyer_email_one" class="form-control valid" required="">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                    	                <label for="h_lawyer_email_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Email 2</label>
                                                    </div>
                                                    <div class="col-9">
                            	                        <input readonly value="{{ $data->h_lawyer_email_two }}" type="email" id="h_lawyer_email_two" name="h_lawyer_email_two" id="h_lawyer_email_two" class="form-control valid">
                                                    </div>
                                	            </div>
                                            </div>
                                            
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>    
                        </div>
                           

                        <!--<div class="form-navigation">-->
                        <!--    <div style="overflow:auto;">-->
                        <!--        <div style="float:right; margin-top: 5px;">-->
                        <!--            <button type="button" class="previous">Previous</button>-->
                        <!--            <button type="button" class="next">Next</button>-->
                        <!--            <button type="button" class="submit">Update</button>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                            

                    </div>
                </div>
            </form>
        </div>
    </div>

</div>  

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       
        $.validator.addMethod('username', function(value, element, param) {
            var nameRegex = /^[a-zA-Z0-9]+$/;
            return value.match(nameRegex);
        }, 'Only a-z, A-Z, 0-9 characters are allowed');

        var val = {
            // Specify validation rules
            rules: {

            },
            // Specify validation error messages
            messages: {
            }
        }
        $("#myForm").multiStepForm({
            // defaultStep:0,
            beforeSubmit: function(form, submit) {
                console.log("called before submiting the form");
                console.log(form);
                console.log(submit);
            },
            validations: val,
        }).navigateTo(0);
    });
</script>
<script>
     $('.summernote').summernote({
        height: 260     
   });
</script>
<script>
    $(document).ready(function(){
        $('textarea').each(function() {
            $(this).val($(this).val().trim());
        });

    });
</script>   
<script>

    $("#home-tab").addClass("Tabs_active");
</script>


@endsection
