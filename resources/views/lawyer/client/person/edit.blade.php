@extends('layouts.lawyer.layout')
@section('title')
<title></title>
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
        ;
        border-color: #2c9faf !important;
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
</style>
@endsection
@endsection
@section('lawyer-content')

<!-- DataTales Example -->
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="mb-0 text-black">{{ $client->name }}</h2>
                        <p class="mb-0">Business Name : {{ $client->business_name }}</p>
                        <p class="mb-0">Profession : {{ $client->profession }}</p>
                        <p class="mb-0">Group : {{ $client->client_group }}</p>
                       
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <div class="" style="text-align:end">
                                <img width="200px" height="200px" src="https://dlegal.visamohol.com/uploads/custom-images/lawyer-2021-09-15-10-06-32-2203.jpg" class="img-fluid" />
                                <p class="mb-0 mt-2 text-black">+88 {{ $client->mobile }}</p>
                                <p class="mb-0 text-black">{{ $client->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form id="myForm" action="{{ route('lawyer.client.person.update', $client->id) }}" method="POST" class="mt-4" enctype="multipart/form-data">
@csrf

    <div class="row">
        <div class="col-12">
            <div class="card shadow" style="border-bottom: 1px solid black;">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-center w-100 mb-2">
                                <button class="btn btn-secondary mx-1 step">Person Clients Info</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-box">
                    {{-- Business Clietns Info --}}
                    <div class="tab">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="case-info-section section">
                                    <h4 class="text-info">Person Clients Information</h4>
                                   
                    	            <div class="row mt-4">
                    	                <div class="col-md-6">
                    	                    
                    	                    @php
                                                $cateogry = \App\ClientCategory::where('status',1)->oldest('sort')->get();
                                                $subcateogry = \App\ClientSubCategory::where('status',1)->oldest('sort')->get();
                                            @endphp
                    	                    
                    	                    <div class="form-group row px-5">
                                               <label for="name" class="pb-0 col-form-label font-weight-bold text-info">Category</label>
                                              
                                               <select onchange="getClientSubCategories();" class="form-control" name="category_id" id="category_id" required>
                                                    <option value="">Select Category</option>
                                                   @foreach($cateogry as $row)
                                                   @if($row->id==2)
                                                    <option value="{{ $row->id }}" {{ $client->category_id == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                                    @else
                                                    @endif
                                                   @endforeach
                                               </select>
                                                   
                                            </div>
                                            
                                            <div class="form-group row px-5">
                                               <label for="name" class="pb-0 col-form-label font-weight-bold text-info">Sub Category</label>
                                               
                                               <select class="form-control" name="subcategory_id" id="subcategory_id" required>
                                                   <option value="">Select SubCategory</option>
                                                   @foreach($subcateogry->where('client_category_id',$client->category_id) as $row)
                                                    <option value="{{ $row->id }}" {{ $client->subcategory_id == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                                   @endforeach
                                               </select>
                                                   
                                           </div>
                    	                    
                                          
                                         
                                           <div class="form-group row px-5">
                                               <label for="name" class="pb-0 col-form-label font-weight-bold text-info">Client Name</label>
                                               <input type="text" required class="form-control" name="name" value="{{ $client->name }}" placeholder="Name">
                                           </div>
                                           
                                           
                                           <div class="form-group row px-5">
                                               <label for="profession" class="pb-0 col-form-label font-weight-bold text-info">Client Profession</label>
                                               <input type="text" class="form-control" name="profession" value="{{ $client->profession }}" placeholder="Profession">
                                           </div>
                                           
                                           
                                           <div class="form-group row px-5">
                                               <label for="mobile" class="pb-0 col-form-label font-weight-bold text-info">Client Mobile</label>
                                               <input type="text" required class="form-control" name="mobile" value="{{ $client->mobile }}" placeholder="Mobile">
                                           </div>
                                           <div class="form-group row px-5">
                                               <label for="whatsapp_one" class="pb-0 col-form-label font-weight-bold text-info">Client Mobile (What'sapp)</label>
                                               <input type="text" required class="form-control" name="whatsapp_one" value="{{ $client->whatsapp_one }}" placeholder="+88">
                                           </div>
                                           
                                           <div class="form-group row px-5">
                                               <label for="email" class="pb-0 col-form-label font-weight-bold text-info">Client Email</label>
                                               <input type="email" class="form-control" name="email" value="{{ $client->email }}" placeholder="Email">
                                           </div>
                                           <div class="form-group row px-5">
                                               <label for="address" class="pb-0 col-form-label font-weight-bold text-info">Client Address</label>
                                               <textarea class="form-control" name="address" id="address" cols="30" rows="5" placeholder="Address" required>
                                                   {!! $client->address !!}
                                               </textarea>
                                           </div>
                                           
                                               
                                            <div class="form-group row px-5">
                                               <label for="dob_nid" class="pb-0 col-form-label font-weight-bold text-info">DOB/NID</label>
                                               <input type="text" required class="form-control" name="dob_nid" value="{{ $client->dob_nid }}" placeholder="DOB/NID">
                                           </div>
                                           @php
                                           $division = \App\Division::oldest('division_name')->get();
                                           $district = \App\District::oldest('district_name')->get();
                                           $thana = \App\Thana::oldest('thana_name')->get();
                                          
                                           @endphp
                                           <div class="form-group row px-5">
                                               <label for="division_id" class="pb-0 col-form-label font-weight-bold text-info">Division</label>
                                               <select onchange="getDistricts();" class="form-control select2" name="division_id" id="division_id" required>
                                                    <option value="" disabled>Select Division</option>
                                                   @foreach($division as $row)
                                                    <option value="{{ $row->id }}" {{ $client->division_id == $row->id ? 'selected':'' }}>{{ $row->division_name }}</option>
                                                   @endforeach
                                               </select>
                                               
                                           </div>
                                           
                                           <div class="form-group row px-5">
                                               <label for="district_id" class="pb-0 col-form-label font-weight-bold text-info">District</label>
                                               <select onchange="getThanas();" class="form-control" name="district_id" id="district_id" required>
                                                    <option value="" disabled>Select District</option>
                                                    @foreach($district as $row)
                                                    <option value="{{ $row->id }}" {{ $client->district_id == $row->id ? 'selected':'' }}>{{ $row->district_name }}</option>
                                                   @endforeach
                                               </select>
                                           </div>
                                           
                                           <div class="form-group row px-5">
                                               <label for="thana_id" class="pb-0 col-form-label font-weight-bold text-info">Thana</label>
                                               <select class="form-control" name="thana_id" id="thana_id" required>
                                                    <option value="" disabled>Select Thana</option>
                                                     @foreach($thana as $row)
                                                    <option value="{{ $row->id }}" {{ $client->thana_id == $row->id ? 'selected':'' }}>{{ $row->thana_name }}</option>
                                                   @endforeach
                                               </select>
                                           </div>
                                           
                                        </div>
                                        
                                        <div class="col-md-6">
                                        
                                           
                                           <div class="form-group row px-5">
                                               <label for="zone" class="pb-0 col-form-label font-weight-bold text-info">Zone</label>
                                               <input type="text" required class="form-control" name="zone" value="{{ $client->zone }}" placeholder="Zone">
                                           </div>
                                           
                                           <div class="form-group row px-5">
                                               <label for="area" class="pb-0 col-form-label font-weight-bold text-info">Area</label>
                                               <input type="text" required class="form-control" name="area" value="{{ $client->area }}" placeholder="Area Name">
                                           </div>
                                           
                                           <div class="form-group row px-5">
                                               <label for="branch" class="pb-0 col-form-label font-weight-bold text-info">Branch</label>
                                               <input type="text" required class="form-control" name="branch" value="{{ $client->branch }}" placeholder="Branch Name">
                                           </div>
                                           
                                            <div class="form-group row px-5">
                                               <label for="referrer_name" class="pb-0 col-form-label font-weight-bold text-info">Referrer Name</label>
                                               <input type="text" required class="form-control" name="referrer_name" value="{{ $client->referrer_name }}" placeholder="Referrer Name">
                                           </div>
                                           
                                            <div class="form-group row px-5">
                                               <label for="referrer_details" class="pb-0 col-form-label font-weight-bold text-info">Referrer Details</label>
                                               <input type="text" required class="form-control" name="referrer_details" value="{{ $client->referrer_details }}" placeholder="Referrer Details">
                                           </div>
                                           
                                           
                                           <div class="form-group row px-5">
                                               <label for="representative_name" class="pb-0 col-form-label font-weight-bold text-info">Representative Name</label>
                                               <input type="text" required class="form-control" name="representative_name" value="{{ $client->representative_name }}" placeholder="Name">
                                           </div>
                                           <div class="form-group row px-5">
                                               <label for="mobile" class="pb-0 col-form-label font-weight-bold text-info">Representative Mobile</label>
                                               <input type="text" required class="form-control" name="representative_mobile" value="{{ $client->representative_mobile }}" placeholder="Mobile">
                                           </div>
                                           <div class="form-group row px-5">
                                               <label for="whatsapp_two" class="pb-0 col-form-label font-weight-bold text-info">Representative Mobile (What'sapp)</label>
                                               <input type="text" required class="form-control" name="whatsapp_two" value="{{ $client->whatsapp_two }}" placeholder="+88">
                                           </div>
                                           <div class="form-group row px-5">
                                               <label for="email" class="pb-0 col-form-label font-weight-bold text-info">Representative Email</label>
                                               <input type="email" class="form-control" name="representative_email" value="{{ $client->representative_email }}" placeholder="Email">
                                           </div>
                                           <div class="form-group row px-5">
                                               <label for="address" class="pb-0 col-form-label font-weight-bold text-info">Representative Address</label>
                                               <textarea class="form-control" name="representative_address" id="address" cols="30" rows="5" placeholder="Address">
                                                   {!! $client->representative_address !!}
                                               </textarea>
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
                                        <button type="button" class="submit">Update</button>
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
    $(document).ready(function(){
        $('textarea').each(function() {
            $(this).val($(this).val().trim());
        });

    });
</script>
<script>
		function getClientSubCategories() {
            var category_id = $('#category_id').val();
            var subcategory = $('#subcategory_id');
            if (category_id) {
                $.ajax({
                    method: 'post',
                    url: "{{ route('case.client.subcategories') }}",
                    data: {
                        client_category_id: category_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(result) {
                        subcategory.find('option').not(':first').remove();
                        $.each(result, function(key, value) {
                            subcategory.append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            }
        }
        // get district
    function getDistricts() {
        var division_id = $('#division_id').val();
        var district = $('#district_id');
        if (division_id) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.districts') }}",
                data: {
                    division_id: division_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    district.find('option').not(':first').remove();
                    $.each(result, function(key, value) {
                        district.append('<option value="' + value
                            .id + '">' + value.district_name + '</option>');
                    });
                }
            });
        }
    }
    function getThanas() {
        var district_id = $('#district_id').val();
        var thana = $('#thana_id');
        if (district_id) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.thanas') }}",
                data: {
                    district_id: district_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    thana.find('option').not(':first').remove();
                    $.each(result, function(key, value) {
                        thana.append('<option value="' + value
                            .id + '">' + value.thana_name + '</option>');
                    });
                }
            });
        }
    }
</script>
@endsection