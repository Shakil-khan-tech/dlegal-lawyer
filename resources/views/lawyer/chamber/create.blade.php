@extends('layouts.lawyer.layout')
@section('title')
<title>{{ $title }}</title>
@endsection
@section('style')
<style>

.tab {
        display: none;
        width: 100%;
        height: 50%;
        margin: 0px auto;
    }

    .current {
        display: block;
    }

    /* form {background-color: #ffffff; margin: 100px auto; font-family: Raleway; padding: 40px; width: 100%; min-width: 300px; } */

    button {
        background-color: #2c9faf;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
    }

    .previous {
        background-color: #2c9faf;
    }

    /* Make circles that indicate the steps of the form: */
    .step.active {
        opacity: 1;
        background-color: #2c9faf !important;
            color: #fff !important;
        border-color: #2c9faf !important;
        color:#fff !important;
    }

    .step.finish {
        background-color: #4CAF50;
    }

    .error {
        color: #f00 !important;
        font-size: 15px !important;
        width: 100% !important;
    }
    .w-65{
        width:65% !important;
    }
    .font-weight-bold{
        font-weight:600 !important;
    }
    .text-black{
        color:#000;
    }
    .step.active {
    color: #fff !important;
    opacity: 1;
    background-color: #2c9faf !important;
    border-color: #2c9faf !important;
}

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

 <form id="myForm" action="{{ route('lawyer.chamber.store'); }}" method="post" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="lawyer_id" value="{{ auth()->guard('lawyer')->id() }}">
        
    <div class="row">
        <div class="col-12">
            <div class="card shadow" style="border-bottom: 1px solid black;">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-center w-100 mb-2">
                                <button disabled class="btn btn-secondary mx-1 step">Chamber Information</button>
                                <button disabled class="btn btn-secondary mx-1 step">Letterhead</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-box">
                {{-- Chamber Information --}}
                <div class="tab">
                    <div class="col-12 p-0">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="case-info-section section">
                                    <h4 class="text-info">Chamber Information</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                            	                <label for="ch_name" class="col-form-label font-weight-bold text-info mb-1 p-0">Name Of Chamber <span class="text-danger">*</span></label>
                        	                    <input type="text" name="ch_name" id="ch_name" class="form-control" required />
                            	            </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="form-group">
                            	                <label for="ch_logo" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Logo<span class="text-danger">*</span></label>
                        	                    <input type="file" name="ch_logo" id="ch_logo" class="form-control p-1" />
                            	            </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="form-group">
                            	                <label for="ch_telephone" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Telephone<span class="text-danger">*</span></label>
                        	                    <input type="text" name="ch_telephone" id="ch_telephone" class="form-control" required />
                            	            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                            	                <label for="ch_mobile_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Mobile-1<span class="text-danger">*</span></label>
                        	                    <input type="text" name="ch_mobile_one" id="ch_mobile_one" class="form-control" required placeholder="+880"/>
                            	            </div>
                                        </div>
                                        <div class="col-md-6">
                            	            <div class="form-group">
                            	                <label for="ch_mobile_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Mobile-2<span class="text-danger">*</span></label>
                        	                    <input type="text" name="ch_mobile_two" id="ch_mobile_two" class="form-control" required placeholder="+880"/>
                            	            </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="form-group">
                            	                <label for="ch_email_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Email-1<span class="text-danger">*</span></label>
                        	                    <input type="email" name="ch_email_one" id="ch_email_one" class="form-control" required placeholder="example@gmail.com"/>
                            	            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                            	                <label for="ch_email_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Email-2<span class="text-danger">*</span></label>
                        	                    <input type="email" name="ch_email_two" id="ch_email_two" class="form-control" required placeholder="example@gmail.com"/>
                            	            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                            	                <label for="ch_main_office_address" class="col-form-label font-weight-bold text-info mb-1 p-0">Main Office Address <span class="text-danger">*</span></label>
                        	                    <textarea name="ch_main_office_address" id="ch_main_office_address" rows="5" cols="5" class="form-control" required ></textarea>
                            	            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                            	                <label for="ch_office_one_address" class="col-form-label font-weight-bold text-info mb-1 p-0">Branch Office-1 Address <span class="text-danger">*</span></label>
                        	                    <textarea name="ch_office_one_address" id="ch_office_one_address" rows="5" cols="5" class="form-control" required ></textarea>
                            	            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                             <div class="form-group">
                            	                <label for="ch_office_two_address" class="col-form-label font-weight-bold text-info mb-1 p-0">Branch Office-2 Address <span class="text-danger">*</span></label>
                        	                    <textarea name="ch_office_two_address" id="ch_office_two_address" rows="5" cols="5" class="form-control" required ></textarea>
                            	            </div>
                                        </div>
                                    </div>
                    	            
            	                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <h4 class="mb-3">Chamber Person</h4>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                        	                <label for="ch_person_type" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Person<span class="text-danger">*</span></label>
                    	                    <select class="form-control" id="ch_person_type" name="ch_person_type">
                    	                        <option value="Head of Chamber">Head of Chamber</option>
                    	                        <option value="Partner of Chamber">Partner of Chamber</option>
                    	                        <option value="Associate">Associate</option>
                    	                        <option value="Contact Person">Contact Person</option>
                    	                        <option value="Account">Account</option>
                    	                        <option value="Head Clerk">Head Clerk</option>
                    	                        <option value="Clerk">Clerk</option>
                    	                        <option value="Support Staff">Support Staff</option>
                    	                    </select>
                        	            </div>
                                    </div>
                                    <div class="col-md-6">
                                         <div class="form-group">
                        	                <label for="ch_person_signature" class="col-form-label font-weight-bold text-info mb-1 p-0">Signature<span class="text-danger">*</span></label>
                    	                    <input type="file" name="ch_person_signature" id="ch_person_signature" class="form-control p-1" />
                        	            </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
            
                    
                    <div class="col-12 p-0">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h4 class="mb-3">Chamber Letterhead 1</h4>
                                    <label class="container-checkbox">Active
                                        <input type="checkbox" name="ch_status" value="1">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                        	                <label for="ch_letter_write_up_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Write-up <span class="text-danger">*</span></label>
                    	                    <textarea cols="3" rows="3" type="text" name="ch_letter_write_up_one" id="ch_letter_write_up_one" class="summernote form-control"></textarea>
                        	            </div>
                                    </div>
                                    <div class="col-md-6">
                                         <div class="form-group">
                        	                <label for="ch_letter_address_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address<span class="text-danger">*</span></label>
                    	                    <textarea cols="3" rows="3" type="text" name="ch_letter_address_one" id="ch_letter_address_one" class="summernote form-control"></textarea>
                        	            </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    
                    
                    <div class="col-12 p-0">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h4 class="mb-3">Chamber Letterhead 2</h4>
                                    <label class="container-checkbox">Active
                                        <input type="checkbox" name="ch_status" value="2">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                        	                <label for="ch_letter_write_up_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Write-up <span class="text-danger">*</span></label>
                    	                    <textarea cols="3" rows="3" type="text" name="ch_letter_write_up_two" id="ch_letter_write_up_two" class="summernote form-control"></textarea>
                        	            </div>
                                    </div>
                                    <div class="col-md-6">
                                         <div class="form-group">
                        	                <label for="ch_letter_address_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address<span class="text-danger">*</span></label>
                    	                    <textarea cols="3" rows="3" type="text" name="ch_letter_address_two" id="ch_letter_address_two" class="summernote form-control"></textarea>
                        	            </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                        	                <label for="status" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Status<span class="text-danger">*</span></label>
                    	                    <select class="form-control" id="status" name="status">
                    	                        <option value="1">Active</option>
                    	                        <option value="0">DeActive</option>
                    	                    </select>
                        	            </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>


                <div class="tab">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="case-info-section section">
                                <div class="d-flex justify-content-between">
                                    <h4 class="text-black">Letterhead (Chamber)</h4>
                                   <label class="container-checkbox">Active
                                        <input type="checkbox" name="ch_status" value="1">
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
                    	                        <input type="text" id="h_chamber_title" value="" name="h_chamber_title" id="h_chamber_title" class="form-control valid" required="">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_chamber_title_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead (Sub-title)</label>
                                            </div>
                                            <div class="col-9">
                    	                        <input id="h_chamber_title_one" value="" type="text" name="h_chamber_title_one" id="h_chamber_title_one" class="form-control valid">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_chamber_line_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Line 1</label>
                                            </div>
                                            <div class="col-9">
                    	                        <input id="h_chamber_line_one" value="" type="text" name="h_chamber_line_one" id="h_chamber_line_one" class="form-control valid">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_chamber_line_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Line 2</label>
                                            </div>
                                            <div class="col-9">
                    	                        <input type="text" value="" id="h_chamber_line_two" name="h_chamber_line_two" id="h_chamber_line_two" class="form-control valid">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_chamber_line_three" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Line 3</label>
                                            </div>
                                            <div class="col-9">
                    	                        <input type="text" value="" id="h_chamber_line_three" name="h_chamber_line_three" id="h_chamber_line_three" class="form-control valid">
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
                    	                        <input type="text" value="" id="h_chamber_address_title_one" name="h_chamber_address_title_one" id="h_chamber_address_title_one" class="form-control valid" required="">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_chamber_address_line_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address Line 1</label>
                                            </div>
                                            <div class="col-9">
                    	                        <input type="text" value="" id="h_chamber_address_line_one" name="h_chamber_address_line_one" id="h_chamber_address_line_one" class="form-control valid">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_chamber_address_line_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address Line 2</label>
                                            </div>
                                            <div class="col-9">
                    	                        <input type="text" value="" id="h_chamber_address_line_two" name="h_chamber_address_line_two" id="h_chamber_address_line_two" class="form-control valid">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_chamber_address_title_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address Title 2<span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-9">
                    	                        <input type="text" value="" id="h_chamber_address_title_two" name="h_chamber_address_title_two" id="h_chamber_address_title_two" class="form-control valid" required="">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_chamber_address_title_two_line_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address Line 1</label>
                                            </div>
                                            <div class="col-9">
                    	                        <input type="text" value="" id="h_chamber_address_title_two_line_one" name="h_chamber_address_title_two_line_one" id="h_chamber_address_title_two_line_one" class="form-control valid">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_chamber_address_title_two_line_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address Line 2</label>
                                            </div>
                                            <div class="col-9">
                    	                        <input type="text" value="" id="h_chamber_address_title_two_line_two" name="h_chamber_address_title_two_line_two" id="h_chamber_address_title_two_line_two" class="form-control valid">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_chamber_cell_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Cell 1<span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-9">
                    	                        <input type="text" value="" id="h_chamber_cell_one" name="h_chamber_cell_one" id="h_chamber_cell_one" class="form-control valid" required="">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_chamber_cell_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Cell 2</label>
                                            </div>
                                            <div class="col-9">
                    	                        <input type="text" value="" id="h_chamber_cell_two" name="h_chamber_cell_two" id="h_chamber_cell_two" class="form-control valid">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_chamber_email_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Email 1<span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-9">
                    	                        <input type="email" value="" id="h_chamber_email_one" name="h_chamber_email_one" id="h_chamber_email_one" class="form-control valid" required="">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_chamber_email_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Email 2</label>
                                            </div>
                                            <div class="col-9">
                    	                        <input type="email" value="" id="h_chamber_email_two" name="h_chamber_email_two" id="h_chamber_email_two" class="form-control valid">
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
                                        <input type="checkbox" name="ch_status" value="2">
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
                    	                        <input value="" type="text" id="h_lawyer_name" name="h_lawyer_name" id="h_lawyer_name" class="form-control valid" required="">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_lawyer_degree" class="col-form-label font-weight-bold text-info mb-1 p-0">Lawyer Degree</label>
                                            </div>
                                            <div class="col-9">
                    	                        <input value="" id="h_lawyer_degree" type="text" name="h_lawyer_degree" id="h_lawyer_degree" class="form-control valid">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_lawyer_deg_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Lawyer Designation 1<span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-9">
                    	                        <input value="" id="h_lawyer_deg_one" type="text" name="h_lawyer_deg_one" id="h_lawyer_deg_one" class="form-control valid" required>
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_lawyer_deg_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Lawyer Designation 2</label>
                                            </div>
                                            <div class="col-9">
                    	                        <input value="" type="text" id="h_lawyer_deg_two" name="h_lawyer_deg_two" id="h_lawyer_deg_two" class="form-control valid">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_lawyer_court_office" class="col-form-label font-weight-bold text-info mb-1 p-0">Lawyer Court / Office 1<span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-9">
                    	                        <input value="" type="text" id="h_lawyer_court_office" name="h_lawyer_court_office" id="h_lawyer_court_office" class="form-control valid" required>
                                            </div>
                        	            </div>
                                    </div>
                                    
                                     <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_lawyer_court_office_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Lawyer Court / Office 2</label>
                                            </div>
                                            <div class="col-9">
                    	                        <input value="" type="text" id="h_lawyer_court_office_one" name="h_lawyer_court_office_one" id="h_lawyer_court_office_one" class="form-control valid">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_lawyer_cell" class="col-form-label font-weight-bold text-info mb-1 p-0">Lawyer Cell</label>
                                            </div>
                                            <div class="col-9">
                    	                        <input value="" type="text" id="h_lawyer_cell" name="h_lawyer_cell" id="h_lawyer_cell" class="form-control valid">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_lawyer_email" class="col-form-label font-weight-bold text-info mb-1 p-0">Lawyer Email</label>
                                            </div>
                                            <div class="col-9">
                    	                        <input value="" type="text" id="h_lawyer_email" name="h_lawyer_email" id="h_lawyer_email" class="form-control valid">
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
                    	                        <input value="" type="text" id="h_lawyer_address_title_one" name="h_lawyer_address_title_one" id="h_lawyer_address_title_one" class="form-control valid" required="">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_lawyer_address_line_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address Line 1</label>
                                            </div>
                                            <div class="col-9">
                    	                        <input value="" type="text" id="h_lawyer_address_line_one" name="h_lawyer_address_line_one" id="h_lawyer_address_line_one" class="form-control valid">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_lawyer_address_line_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address Line 2</label>
                                            </div>
                                            <div class="col-9">
                    	                        <input value="" type="text" id="h_lawyer_address_line_two" name="h_lawyer_address_line_two" id="h_lawyer_address_line_two" class="form-control valid">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_lawyer_address_title_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address Title 2<span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-9">
                    	                        <input value="" type="text" id="h_lawyer_address_title_two" name="h_lawyer_address_title_two" id="h_lawyer_address_title_two" class="form-control valid" required="">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_lawyer_address_title_two_line_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address Line 1</label>
                                            </div>
                                            <div class="col-9">
                    	                        <input value="" type="text" id="h_lawyer_address_title_two_line_one" name="h_lawyer_address_title_two_line_one" id="h_lawyer_address_title_two_line_one" class="form-control valid">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_lawyer_address_title_two_line_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address Line 2</label>
                                            </div>
                                            <div class="col-9">
                    	                        <input value="" type="text" id="h_lawyer_address_title_two_line_two" name="h_lawyer_address_title_two_line_two" id="h_lawyer_address_title_two_line_two" class="form-control valid">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_lawyer_cell_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Cell 1<span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-9">
                    	                        <input value="" type="text" id="h_lawyer_cell_one" name="h_lawyer_cell_one" id="h_lawyer_cell_one" class="form-control valid" required="">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_lawyer_cell_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Cell 2</label>
                                            </div>
                                            <div class="col-9">
                    	                        <input value="" type="text" id="h_lawyer_cell_two" name="h_lawyer_cell_two" id="h_lawyer_cell_two" class="form-control valid">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_lawyer_email_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Email 1<span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-9">
                    	                        <input value="" type="email" id="h_lawyer_email_one" name="h_lawyer_email_one" id="h_lawyer_email_one" class="form-control valid" required="">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-3">
                            	                <label for="h_lawyer_email_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Email 2</label>
                                            </div>
                                            <div class="col-9">
                    	                        <input value="" type="email" id="h_lawyer_email_two" name="h_lawyer_email_two" id="h_lawyer_email_two" class="form-control valid">
                                            </div>
                        	            </div>
                                    </div>
                                    
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div> 
                </div>
               
                <div class="card shadow" style="border-top: 1px solid grey;">
                     <div class="card-footer">
                         <div class="form-navigation">
                            <div style="overflow:auto;">
                                <div style="float:right; margin-top: 5px;">
                                    <button type="button" class="previous">Previous</button>
                                    <button type="button" class="next">Next</button>
                                    <button type="button" class="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</form>


 

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


@endsection