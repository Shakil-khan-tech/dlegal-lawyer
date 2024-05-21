@extends('layouts.lawyer.layout')
@section('title')
<title>Create HR</title>
@endsection
@section('lawyer-content')

<form action="{{route('lawyer.hr.store')}}" method="post" enctype="multipar/form-data">
    @csrf

    <input type="hidden" name="lawyer_id" value="{{auth()->guard('lawyer')->id()}}">
<!-- <div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col-3">
                        <h3 class="mb-2 font-weight-bold" style="color: black;">Add Internal Counsel</h3>
                    </div>
                    <div class="col-9">
                    </div>
                </div>
            </div>
            <div class="card-body">

            	<div class="case-info-section section">
            	    <div class="row pb-3">
            	        <div class="col-md-6">
            	            <div class="form-group row">
            	                <label for="counsel_id" class="col-form-label font-weight-bold text-info col-md-4">Counsel</label>
            	                <div class="col-md-8">
            	                    <select name="counsel_id" class="form-control" id="counsel_id" required>
            	                        <option selected disabled hidden value="">Select</option>
            	                        <option value=""></option>
            	                    </select>
            	                </div>
            	            </div>
        	            </div>
            	        <div class="col-md-6">
            	            <div class="form-group row">
            	                <label for="category_id" class="col-form-label font-weight-bold text-info col-md-4">Case Category</label>
            	                <div class="col-md-8">
            	                    <select name="category_id" class="form-control" id="category_id" required>
            	                        <option selected disabled hidden>Select</option>
            	                        <option value=""></option>
            	                    </select>
            	                </div>
            	            </div>
            	        </div>
        	        </div>
    	        </div>

            </div>
		</div>
	</div>
</div> -->

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-body">

        		<u><h3 class="pb-3 font-weight-bold" style="color: black;">Profile Image</h3></u>

            	<div class="case-info-section section">
            	    <div class="row pb-3">
            	        <div class="col-md-12">
        	    	        <div class="form-group row">
        		                <label for="image" class="col-form-label font-weight-bold text-info col-md-5">Image</label>
        		                <div class="col-md-7">
        		                    <input type="file" class="form-control" name="image" id="image">
        		                </div>
        		            </div>
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

        		<u><h3 class="pb-3 font-weight-bold" style="color: black;">Chember Information</h3></u>

            	<div class="case-info-section section">
            	    <div class="row pb-3">
            	        <div class="col-md-6">
            	            <div class="form-group row">
            	                <label for="chember_name_id" class="col-form-label font-weight-bold text-info col-md-4">Name</label>
            	                <div class="col-md-8">
            	                    <select name="chember_name_id" class="form-control" id="chember_name_id" required>
            	                        <option selected disabled hidden value="">Select</option>
            	                        <option value="Chember One">Chember One</option>
                                        <option value="Chember Two">Chember Two</option>
            	                    </select>
            	                </div>
            	            </div>
        	            </div>
            	        <div class="col-md-6">
            	            <div class="form-group row">
            	                <label for="role_id" class="col-form-label font-weight-bold text-info col-md-4">Role</label>
            	                <div class="col-md-8">
            	                    <select name="role_id" class="form-control" id="role_id" required>
            	                        {{-- <option selected>Select</option> --}}
                                        @foreach($roles as $row)
            	                        <option value="{{ @$row->id }}">{{ @$row->name }}</option>
                                        @endforeach
            	                    </select>
            	                </div>
            	            </div>
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

        		<u><h3 class="pb-3 font-weight-bold" style="color: black;">Personal Information</h3></u>

            	<div class="case-info-section section">
            	    <div class="row pb-3">
            	        <div class="col-md-6">
            	            <div class="form-group row">
            	                <label for="personal_name" class="col-form-label font-weight-bold text-info col-md-4">Name</label>
            	                <div class="col-md-8">
            	                    <input type="text" id="personal_name" class="form-control" name="personal_name" value="{{ old('personal_name') }}" placeholder="Type">
            	                </div>            	                
            	            </div>
            	            <div class="form-group row">
            	                <label for="mother_name" class="col-form-label font-weight-bold text-info col-md-4">Mother Name</label>
            	                <div class="col-md-8">
            	                    <input type="text" id="mother_name" class="form-control" name="mother_name" value="{{ old('mother_name') }}" placeholder="Type">
            	                </div>            	                
            	            </div>
            	            <div class="form-group row">
            	                <label for="present_address" class="col-form-label font-weight-bold text-info col-md-4">Present Address</label>
            	                <div class="col-md-8">
            	                    <input type="text" id="present_address" class="form-control" name="present_address" value="{{ old('present_address') }}" placeholder="Type">
            	                </div>            	                
            	            </div>
            	            <div class="form-group row">
            	                <label for="nid_number" class="col-form-label font-weight-bold text-info col-md-4">NID Number</label>
            	                <div class="col-md-8">
            	                    <input type="number" id="nid_number" class="form-control" name="nid_number" value="{{ old('nid_number') }}" placeholder="Type">
            	                </div>            	                
            	            </div>
            	            <div class="form-group row">
            	                <label for="email" class="col-form-label font-weight-bold text-info col-md-4">Email</label>
            	                <div class="col-md-8">
            	                    <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Type">
            	                </div>            	                
            	            </div>
            	            <div class="form-group row">
            	                <label for="relation" class="col-form-label font-weight-bold text-info col-md-4">Relation</label>
            	                <div class="col-md-8">
            	                    <input type="text" id="relation" class="form-control" name="relation" value="{{ old('relation') }}" placeholder="Type">
            	                </div>            	                
            	            </div>
        	            </div>
            	        <div class="col-md-6">
            	            <div class="form-group row">
            	                <label for="father_name" class="col-form-label font-weight-bold text-info col-md-4">Father Name</label>
            	                <div class="col-md-8">
            	                    <input type="text" id="father_name" class="form-control" name="father_name" value="{{ old('father_name') }}" placeholder="Type">
            	                </div>            	                
            	            </div>
            	            <div class="form-group row">
            	                <label for="spouse_name" class="col-form-label font-weight-bold text-info col-md-4">Spouse Name</label>
            	                <div class="col-md-8">
            	                    <input type="text" id="spouse_name" class="form-control" name="spouse_name" value="{{ old('spouse_name') }}" placeholder="Type">
            	                </div>            	                
            	            </div>
            	            <div class="form-group row">
            	                <label for="date_of_birth" class="col-form-label font-weight-bold text-info col-md-4">Date Of Birth</label>
            	                <div class="col-md-8">
            	                    <input type="date" id="date_of_birth" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}" >
            	                </div>            	                
            	            </div>
            	            <div class="form-group row">
            	                <label for="mobile_number" class="col-form-label font-weight-bold text-info col-md-4">Mobile Number</label>
            	                <div class="col-md-8">
            	                    <input type="text" id="mobile_number" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="Type">
            	                </div>            	                
            	            </div>
            	            <div class="form-group row">
            	                <label for="emergency_contact" class="col-form-label font-weight-bold text-info col-md-4">Emergency Number</label>
            	                <div class="col-md-8">
            	                    <input type="text" id="" class="form-control" name="emergency_contact" value="{{ old('emergency_contact') }}" placeholder="Type">
            	                </div>            	                
            	            </div>
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

        		<u><h3 class="pb-3 font-weight-bold" style="color: black;">Professional Information </h3></u>

            	<div class="case-info-section section">
            	    <div class="row pb-3">
            	        <div class="col-md-12">
            	            <div class="form-group row">
            	                <label for="professional_name" class="col-form-label font-weight-bold text-info col-md-4">Name</label>
            	                <div class="col-md-8">
            	                    <input type="text" id="professional_name" class="form-control" name="professional_name" value="{{ old('professional_name') }}" placeholder="Type of">
            	                </div>            	                
            	            </div>
            	            <div class="form-group row">
            	                <label for="ssc_year" class="col-form-label font-weight-bold text-info col-md-4">S.S.C</label>
            	                <div class="col-md-4">
            	                    <input type="number" id="ssc_year" class="form-control" name="ssc_year" value="{{ old('ssc_year') }}" placeholder="Year">
            	                </div>  
            	                <div class="col-md-4">
            	                    <input type="text" id="ssc_institution" class="form-control" name="ssc_institution" value="{{ old('ssc_institution') }}" placeholder="Institution">
            	                </div>          	                
            	            </div>
            	            <div class="form-group row">
            	                <label for="hsc_year" class="col-form-label font-weight-bold text-info col-md-4">H.S.C</label>
            	                <div class="col-md-4">
            	                    <input type="text" id="hsc_year" class="form-control" name="hsc_year" value="{{ old('hsc_year') }}" placeholder="Year">
            	                </div>  
            	                <div class="col-md-4">
            	                    <input type="text" id="hsc_institution" class="form-control" name="hsc_institution" value="{{ old('hsc_institution') }}" placeholder="Institution">
            	                </div>          	                
            	            </div>
            	            <div class="form-group row">
            	                <label for="llb" class="col-form-label font-weight-bold text-info col-md-4">LL.B(Hons)</label>
            	                <div class="col-md-4">
            	                    <input type="text" id="llb_year" class="form-control" name="llb_year" value="{{ old('llb_year') }}" placeholder="Year">
            	                </div>  
            	                <div class="col-md-4">
            	                    <input type="text" id="llb_institution" class="form-control" name="llb_institution" value="{{ old('llb_institution') }}" placeholder="Institution">
            	                </div>          	                
            	            </div>
            	            <div class="form-group row">
            	                <label for="llm" class="col-form-label font-weight-bold text-info col-md-4">LL.M</label>
            	                <div class="col-md-4">
            	                    <input type="text" id="llm_year" class="form-control" name="llm_year" value="{{ old('llm_year') }}" placeholder="Year">
            	                </div>  
            	                <div class="col-md-4">
            	                    <input type="text" id="llm_institution" class="form-control" name="llm_institution" value="{{ old('llm_institution') }}" placeholder="Institution">
            	                </div>          	                
            	            </div>
            	            <div class="form-group row">
            	                <label for="bar_council_enrollment_date" class="col-form-label font-weight-bold text-info col-md-4">Bar Council Enrollment</label>
            	                <div class="col-md-4">
            	                    <input type="date" id="bar_council_enrollment_date" class="form-control" name="bar_council_enrollment_date" value="{{ old('bar_council_enrollment_date') }}">
            	                </div>  
            	                <div class="col-md-4">
            	                    <input type="text" id="sanad_no" class="form-control" name="sanad_no" value="{{ old('sanad_no') }}" placeholder="Sanad No.">
            	                </div>          	                
            	            </div>
            	            <div class="form-group row">
            	                <label for="mother_bar_name" class="col-form-label font-weight-bold text-info col-md-4">Mother Bar</label>
            	                <div class="col-md-4">
            	                    <input type="text" id="mother_bar_name" class="form-control" name="mother_bar_name" value="{{ old('mother_bar_name') }}" placeholder="Name">
            	                </div>  
            	                <div class="col-md-4">
            	                    <input type="text" id="mother_bar_membership_no" class="form-control" name="mother_bar_membership_no" value="{{ old('mother_bar_membership_no') }}" placeholder="Membership No.">
            	                </div>          	                
            	            </div>
            	            <div class="form-group row">
            	                <label for="practicing_bar_date" class="col-form-label font-weight-bold text-info col-md-4">Practicing Bar</label>
            	                <div class="col-md-4">
            	                    <input type="date" id="practicing_bar_date" class="form-control" name="practicing_bar_date" value="{{ old('practicing_bar_date') }}">
            	                </div>  
            	                <div class="col-md-4">
            	                    <input type="text" id="practicing_bar_membership_no" class="form-control" name="practicing_bar_membership_no" value="{{ old('practicing_bar_membership_no') }}" placeholder="Membership No.">
            	                </div>          	                
            	            </div>
            	            <div class="form-group row">
            	                <label for="high_court_enrollment_date" class="col-form-label font-weight-bold text-info col-md-4">High Court Enrollment</label>
            	                <div class="col-md-4">
            	                    <input type="date" id="high_court_enrollment_date" class="form-control" name="high_court_enrollment_date" value="{{ old('high_court_enrollment_date') }}">
            	                </div>  
            	                <div class="col-md-4">
            	                    <input type="text" id="high_court_membership_no" class="form-control" name="high_court_membership_no" value="{{ old('high_court_membership_no') }}" placeholder="Membership No.">
            	                </div>          	                
            	            </div>
            	            <div class="form-group row">
            	                <label for="bar_council_fees_date" class="col-form-label font-weight-bold text-info col-md-4">Bar Council Fees(Latest)</label>
            	                <div class="col-md-4">
            	                    <input type="date" id="bar_council_fees_date" class="form-control" name="bar_council_fees_date" value="{{ old('bar_council_fees_date') }}">
            	                </div>  
            	                <div class="col-md-4">
            	                    <input type="text" id="bar_council_fees_membership_no" class="form-control" name="bar_council_fees_membership_no" value="{{ old('bar_council_fees_membership_no') }}" placeholder="Membership No.">
            	                </div>          	                
            	            </div>
            	            <div class="form-group row">
            	                <label for="district_bar_mem_fee_date" class="col-form-label font-weight-bold text-info col-md-4">District Bar Mem. Fee(Update)</label>
            	                <div class="col-md-4">
            	                    <input type="date" id="district_bar_mem_fee_date" class="form-control" name="district_bar_mem_fee_date" value="{{ old('district_bar_mem_fee_date') }}">
            	                </div>  
            	                <div class="col-md-4">
            	                    <input type="text" id="district_bar_mem_fee_membership_no" class="form-control" name="district_bar_mem_fee_membership_no" value="{{ old('district_bar_mem_fee_membership_no') }}" placeholder="Type of">
            	                </div>          	                
            	            </div>
            	            <div class="form-group row">
            	                <label for="scba_memb_fee_date" class="col-form-label font-weight-bold text-info col-md-4">SCBA Memb. Fee (Update)</label>
            	                <div class="col-md-4">
            	                    <input type="date" id="scba_memb_fee_date" class="form-control" name="scba_memb_fee_date" value="{{ old('scba_memb_fee_date') }}">
            	                </div>  
            	                <div class="col-md-4">
            	                    <input type="text" id="scba_memb_fee_members_no" class="form-control" name="scba_memb_fee_members_no" value="{{ old('scba_memb_fee_members_no') }}" placeholder="Type of">
            	                </div>          	                
            	            </div>
            	            <div class="form-group row">
            	                <label for="professional_contact_number_date" class="col-form-label font-weight-bold text-info col-md-4">Professional Contact Number</label>
            	                <div class="col-md-4">
            	                    <input type="date" id="professional_contact_number_date" class="form-control" name="professional_contact_number_date" value="{{ old('professional_contact_number_date') }}" placeholder="Type of">
            	                </div>  
            	                <div class="col-md-4">
            	                    <input type="text" id="professional_contact_number_members_no" class="form-control" name="professional_contact_number_members_no" value="{{ old('professional_contact_number_members_no') }}" placeholder="Type of">
            	                </div>          	                
            	            </div>
            	            <div class="form-group row">
            	                <label for="professional_email_1" class="col-form-label font-weight-bold text-info col-md-4">Professional Email</label>
            	                <div class="col-md-4">
            	                    <input type="text" id="professional_email_1" class="form-control" name="professional_email_1" value="{{ old('professional_email_1') }}" placeholder="Type of">
            	                </div>  
            	                <div class="col-md-4">
            	                    <input type="text" id="professional_email_2" class="form-control" name="professional_email_2" value="{{ old('professional_email_2') }}" placeholder="Type of">
            	                </div>          	                
            	            </div>
            	            <div class="form-group row">
            	                <label for="name_of_associates_1" class="col-form-label font-weight-bold text-info col-md-4">Name of Associates</label>
            	                <div class="col-md-4">
            	                    <input type="text" id="name_of_associates_1" class="form-control" name="name_of_associates_1" value="{{ old('name_of_associates_1') }}" placeholder="Type of">
            	                </div>  
            	                <div class="col-md-4">
            	                    <input type="text" id="name_of_associates_2" class="form-control" name="name_of_associates_2" value="{{ old('name_of_associates_2') }}" placeholder="Type of">
            	                </div>          	                
            	            </div>
            	            <div class="form-group row">
            	                <label for="professional_experience_1" class="col-form-label font-weight-bold text-info col-md-4">Professional Experience-1</label>
            	                <div class="col-md-8">
            	                    <textarea name="professional_experience_1" id="professional_experience_1" id="" class="form-control" placeholder="Type of" aria-invalid="false" rows="5">{{ old('professional_experience_1') }}</textarea>
            	                </div>  
            	            </div>
            	            <div class="form-group row">
            	                <label for="professional_experience_2" class="col-form-label font-weight-bold text-info col-md-4">Professional Experience-2</label>
            	                <div class="col-md-8">
            	                    <textarea name="professional_experience_2" id="professional_experience_2" id="" class="form-control" placeholder="Type of" aria-invalid="false" rows="5">{{ old('professional_experience_2') }}</textarea>
            	                </div>  
            	            </div>
            	            <div class="form-group row">
            	                <label for="date_of_joining" class="col-form-label font-weight-bold text-info col-md-4">Date of Joining (Chamber)</label>
            	                <div class="col-md-4">
            	                    <input type="date" id="date_of_joining" class="form-control" name="date_of_joining" value="{{ old('date_of_joining') }}">
            	                </div>  
            	            </div>
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

        		<u><h3 class="pb-3 font-weight-bold" style="color: black;">DOCUMENTS RECIVED</h3></u>

            	<label for="chember_role_id" class="col-form-label font-weight-bold text-info pb-3">Date of Joining (Chamber)</label>

            	<div class="case-info-section section">
            	    <div class="row ">
                        <div class="col-md-11">
                        	<div class="row">
                        		<div class="col-3">
                        		    <div class="form-group">
                        		        <select name="documents_date_of_joining_id" id="documents_date_of_joining_id" class="form-control">
                        		            <option value="">Select</option>
                        		            <option value=""></option>
                        		        </select>
                        		    </div>
                        		</div>
                        		<div class="col-3">
                        		    <div class="form-group">
                        		        <input type="text" id="documents_date_of_joining_type" class="form-control" name="documents_date_of_joining_type" value="{{ old('documents_date_of_joining_type') }}" placeholder="Type of">
                        		    </div>
                        		</div>
                        		<div class="col-3">
                        		    <div class="form-group">
                        		        <input type="date" id="documents_date_of_joining_date" class="form-control" name="documents_date_of_joining_date" value="{{ old('documents_date_of_joining_date') }}">
                        		    </div>
                        		</div>
                        		<div class="col-3">
                        		    <div class="form-group">
                        		        <select name="documents_date_of_joining_chamber_id" id="documents_date_of_joining_chamber_id" class="form-control">
                        		            <option value="">Select</option>
                        		            <option value=""></option>
                        		        </select>
                        		    </div>
                        		</div>
                        	</div>
                        </div>
                        <div class="col-md-1">
                    	    <div class="row">
                    	    	<div class="col-12">
                    	    		<div class="form-group">
                    	    		    <button type="button" class="btn btn-secondary float-right"><i class="fa fa-plus"></i></button>
                    	    		</div>
                    	    	</div>
                    	    </div>
                        </div>
                    </div>
    	        </div>

    	        <!-- <label for="chember_role_id" class="col-form-label font-weight-bold text-info pb-3">Date of Joining (Chamber)</label>

            	<div class="case-info-section section">
            	    <div class="row pb-3">
                        <div class="col-md-11">
                        	<div class="row">
                        		<div class="col-3">
                        		    <div class="form-group">
                        		        <select name="" id="" class="form-control">
                        		            <option value="">Select</option>
                        		            <option value=""></option>
                        		        </select>
                        		    </div>
                        		</div>
                        		<div class="col-3">
                        		    <div class="form-group">
                        		        <input type="text" id="" class="form-control" name="" value="{{ old('') }}" placeholder="Type of">
                        		    </div>
                        		</div>
                        		<div class="col-3">
                        		    <div class="form-group">
                        		        <input type="date" id="" class="form-control" name="" value="{{ old('') }}">
                        		    </div>
                        		</div>
                        		<div class="col-3">
                        		    <div class="form-group">
                        		        <select name="" id="" class="form-control">
                        		            <option value="">Select</option>
                        		            <option value=""></option>
                        		        </select>
                        		    </div>
                        		</div>
                        	</div>
                        </div>
                        <div class="col-md-1">
                    	    <div class="row">
                    	    	<div class="col-12">
                    	    		<div class="form-group">
                    	    		    <button type="button" class="btn btn-secondary float-right"><i class="fa fa-plus"></i></button>
                    	    		</div>
                    	    	</div>
                    	    </div>
                        </div>
                    </div>
    	        </div> -->

	        	<button type="submit" class="btn btn-secondary float-right mb-4 mt-2 px-4"><i class="fa fa-file"></i> Save</button>
            </div>
		</div>
	</div>
</div>

</form>

@endsection