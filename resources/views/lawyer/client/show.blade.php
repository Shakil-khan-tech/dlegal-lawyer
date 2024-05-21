@extends('layouts.lawyer.layout')

@section('title')
<title>Show Client</title>
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
                                <img width="200px" height="200px" src="https://dlegal.easycoder24.com/uploads/custom-images/lawyer-2021-09-15-10-06-32-2203.jpg" class="img-fluid" />
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

<div class="row">
    <div class="col-12">
        <div class=" mb-4">
            <form id="myForm" action="{{ route('lawyer.client.update', $client->id) }}" method="POST" class="mt-4" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="lawyer_id" value="{{ auth()->guard('lawyer')->id() }}">

                <div class="card shadow mt-3" style="border:0;border-bottom: 1px solid black;border-bottom-left-radius: 0;border-bottom-right-radius: 0;">
                    <div class="card-body">

                        <div class="row">
                            <div class="d-flex justify-content-center w-100 mb-2 nav nav-tabs"  id="myTab" role="tablist" style="border-bottom:unset;">
                                <button
                                    class=" btn custom-btn mx-1 step nav-link  active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Business Clients Info</button>
                                <button
                                    class="btn btn-secondary mx-1 step nav-link" onclick="$('#home-tab').removeClass('custom-btn') ;$('#home-tab').addClass('btn-secondary')" id="personal-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="false">Representative</button>
                                <button
                                    class="btn btn-secondary mx-1 step nav-link" onclick="$('#home-tab').removeClass('custom-btn') ;$('#home-tab').addClass('btn-secondary')" id="professional-tab" data-toggle="tab" href="#professional" role="tab" aria-controls="professional" aria-selected="false">Business Engagement</button>
                                    
                                <button
                                    class="btn btn-secondary mx-1 step nav-link" onclick="$('#home-tab').removeClass('custom-btn') ;$('#home-tab').addClass('btn-secondary')" id="client-tab" data-toggle="tab" href="#client" role="tab" aria-controls="client" aria-selected="false">Letterhead</button>

                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="">
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                          {{-- Business Clients Info --}}
                            <div class="card shadow mb-2">
                                   
                                <div class="card-body pb-1">
                                    <div class="case-info-section section">
                                        <h4 class="text-info">Business Clients Information</h4>
                                        @php
                                        $cateogry = \App\ClientCategory::where('status',1)->oldest('sort')->get();
                                        $subcateogry = \App\ClientSubCategory::where('status',1)->oldest('sort')->get();
                                        $classes = \App\ClientClass::where('status',1)->oldest('name')->get();
                                        @endphp
                                        <div class="row mt-4">
                                            <div class="col-md-6">
                                                
                                                <div class="form-group row px-5">
                                                   <label for="name" class="pb-0 col-form-label font-weight-bold text-info">Class</label>
                                                   <select onchange="getClientSubCategories();" class="form-control" name="client_class_id" id="client_class_id" required>
                                                       <option value="">Select</option>
                                                       @foreach($classes as $row)
                                                        <option value="{{ $row->id }}" {{ $client->client_class_id==$row->id ? 'selected':''}}>{{ $row->name }}</option>
                                                       @endforeach
                                                   </select>
                                                </div>
                                                
                                                
                                                <div class="form-group row px-5">
                                                   <label for="name" class="pb-0 col-form-label font-weight-bold text-info">Category</label>
                                                    <select onchange="getClientSubCategories();" class="form-control" name="category_id" id="category_id" required>
                                                        <option value="">Select Category</option>
                                                       @foreach($cateogry as $row)
                                                        <option value="{{ $row->id }}" {{ $client->category_id == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
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
                                                   <label for="client_group" class="pb-0 col-form-label font-weight-bold text-info">Client Group</label>
                                                    <input type="text" class="form-control" name="client_group" value="{{ $client->client_group }}" placeholder="Client Group">
                                               </div>
                                               <div class="form-group row px-5">
                                                   <label for="business_name" class="pb-0 col-form-label font-weight-bold text-info">Client Business Name</label>
                                                   <input type="text" class="form-control" name="business_name" value="{{ $client->business_name }}" placeholder="input...">
                                               </div>
                                               
                                               <!--<div class="form-group row px-5">-->
                                               <!--    <label for="profession" class="pb-0 col-form-label font-weight-bold text-info">Client Profession</label>-->
                                               <!--    <input type="text" class="form-control" name="profession" value="" placeholder="Profession">-->
                                               <!--</div>-->
                                               
                                                <div class="form-group row px-5">
                                                   <label for="business_product_service" class="pb-0 col-form-label font-weight-bold text-info">Business Owner Name</label>
                                                   <input type="text" class="form-control" name="business_product_service" value="{{ $client->business_product_service }}" placeholder="input...">
                                               </div>
                                               <div class="form-group row px-5">
                                                   <label for="business_type" class="pb-0 col-form-label font-weight-bold text-info">Client Business Type</label>
                                                   <input type="text" class="form-control" name="business_type" value="{{ $client->business_type }}" placeholder="input...">
                                               </div>
                                               <div class="form-group row px-5">
                                                   <label for="dob_nid" class="pb-0 col-form-label font-weight-bold text-info">Date of Incorporation/Number</label>
                                                   <input type="text" class="form-control" name="dob_nid" value="{{ $client->dob_nid }}" placeholder="input...">
                                               </div>
                                               
                                               <div class="form-group row px-5">
                                                   <label for="mobile" class="pb-0 col-form-label font-weight-bold text-info">Client/Business (Mobile)</label>
                                                   <input type="text" class="form-control" name="mobile" value="{{ $client->mobile }}" placeholder="+88">
                                               </div>
                                               <div class="form-group row px-5">
                                                   <label for="whatsapp_one" class="pb-0 col-form-label font-weight-bold text-info">Client Mobile (What'sapp)</label>
                                                   <input type="text" class="form-control" name="whatsapp_one" value="{{ $client->whatsapp_one }}" placeholder=".....input What'sapp number">
                                               </div>
                                               <div class="form-group row px-5">
                                                   <label for="email" class="pb-0 col-form-label font-weight-bold text-info">Client/Business Email</label>
                                                   <input type="email" class="form-control" name="email" value="{{ $client->email }}" placeholder=".....input email address">
                                               </div>
                                               <div class="form-group row px-5">
                                                   <label for="address" class="pb-0 col-form-label font-weight-bold text-info">Client/Business Address</label>
                                                   <textarea class="form-control" name="address" id="address" cols="30" rows="5" placeholder=".....input proper address" required>
                                                       {!! $client->address !!}
                                                   </textarea>
                                               </div>
                                               
                                            </div>
                                            
                                            <div class="col-md-6">
                                                
                                                
                                               @php
                                               $division = \App\Division::oldest('division_name')->get();
                                               $district = \App\District::oldest('district_name')->get();
                                               $thana = \App\Thana::oldest('thana_name')->get();
                                              
                                               @endphp
                                               <div class="form-group row px-5">
                                                   <label for="division_id" class="pb-0 col-form-label font-weight-bold text-info">Division</label>
                                                   <select onchange="getDistricts();" class="form-control select2" name="division_id" id="division_id" required>
                                                        <option value="">Select Division</option>
                                                       @foreach($division as $row)
                                                        <option value="{{ $row->id }}" {{ $client->division_id == $row->id ? 'selected':'' }}>{{ $row->division_name }}</option>
                                                       @endforeach
                                                   </select>
                                                   
                                               </div>
                                               
                                               <div class="form-group row px-5">
                                                   <label for="district_id" class="pb-0 col-form-label font-weight-bold text-info">District</label>
                                                   <select onchange="getThanas();" class="form-control" name="district_id" id="district_id" required>
                                                        <option value="">Select District</option>
                                                        @foreach($district as $row)
                                                        <option value="{{ $row->id }}" {{ $client->district_id == $row->id ? 'selected':'' }}>{{ $row->district_name }}</option>
                                                       @endforeach
                                                   </select>
                                               </div>
                                               
                                               <div class="form-group row px-5">
                                                   <label for="thana_id" class="pb-0 col-form-label font-weight-bold text-info">Thana</label>
                                                   <select class="form-control" name="thana_id" id="thana_id" >
                                                        <option value="">Select Thana</option>
                                                         @foreach($thana as $row)
                                                        <option value="{{ $row->id }}" {{ $client->thana_id == $row->id ? 'selected':'' }}>{{ $row->thana_name }}</option>
                                                       @endforeach
                                                   </select>
                                               </div>
                                               
                                               <div class="form-group row px-5">
                                                   <label for="zone" class="pb-0 col-form-label font-weight-bold text-info">Zone</label>
                                                   <input type="text" class="form-control" name="zone" value="{{ $client->zone }}" placeholder="input...">
                                               </div>
                                               
                                               <div class="form-group row px-5">
                                                   <label for="area" class="pb-0 col-form-label font-weight-bold text-info">Area</label>
                                                   <input type="text" class="form-control" name="area" value="{{ $client->area }}" placeholder="input...">
                                               </div>
                                               
                                               <div class="form-group row px-5">
                                                   <label for="branch" class="pb-0 col-form-label font-weight-bold text-info">Branch</label>
                                                   <input type="text" class="form-control" name="branch" value="{{ $client->branch }}" placeholder="input...">
                                               </div>
                                               
                                                <div class="form-group row px-5">
                                                   <label for="referrer_name" class="pb-0 col-form-label font-weight-bold text-info">Referrer Name</label>
                                                   <input type="text" class="form-control" name="referrer_name" value="{{ $client->referrer_name }}" placeholder="input...">
                                               </div>
                                               
                                                <div class="form-group row px-5">
                                                   <label for="referrer_details" class="pb-0 col-form-label font-weight-bold text-info">Referrer Details</label>
                                                   <input type="text" class="form-control" name="referrer_details" value="{{ $client->referrer_details }}" placeholder="input...">
                                               </div>
                                               <div class="form-group row px-5">
                                                   <label for="coordinator_tadbirkar" class="pb-0 col-form-label font-weight-bold text-info">Coordinator/Tadbirkar Name</label>
                                                   <input type="text" class="form-control" name="coordinator_tadbirkar" value="{{ $client->coordinator_tadbirkar }}" placeholder="input...">
                                               </div>
                                               
                                               <div class="form-group row px-5">
                                                   <label for="coordinator_details" class="pb-0 col-form-label font-weight-bold text-info">Coordinator/Tadbirkar Details</label>
                                                   <input type="text" class="form-control" name="coordinator_details" value="{{ $client->coordinator_details }}" placeholder="input...">
                                               </div>
                                            </div>
                                        </div>
                          
                                    </div>
                                </div>
                            </div>
                            
                      </div>
                        <div class="tab-pane fade" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                            {{-- Representative --}}
                            <div class="card shadow mb-2">
                                   
                                <div class="card-body pb-1">
                                    <div class="case-info-section section family_info">
                                        <div class="ducument">
                                            <div class="add_ducument">
                                                @if ($client->representatives->count())
                                                    @foreach ($client->representatives as $row)
                                                        <input type="hidden" name="old_id[]" value="{{ $row->id }}">
                                                        <div class="card shadow mt-3">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    @if ($loop->last)
                                                                        <div class="col-12 text-lg-right px-5">
                                                                            <button class="btn btn-large btn-success add_row"
                                                                                type="button"><i class="fas fa-plus"></i></button>
                                                                        </div>
                                                                    @endif
                                                                    <div class="col-6">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="form-group row px-5">
                                                                                    <label for="representative_name"
                                                                                        class="pb-0 col-form-label font-weight-bold text-info">Representative
                                                                                        Name*</label>
                                                                                    <input type="text" required class="form-control"
                                                                                        name="old_representative_name[]"
                                                                                        value="{{ $row->representative_name }}"
                                                                                        placeholder="--input epresentative name">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-group row px-5">
                                                                                    <label for="address"
                                                                                        class="pb-0 col-form-label font-weight-bold text-info">Representative
                                                                                        Address</label>
                                                                                    <textarea class="form-control" name="old_representative_address[]" id="address" cols="30" rows="5"
                                                                                        placeholder=".....input representative details">
                                                                               {!! $row->representative_address !!}
                                                                           </textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-6">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="form-group row px-5">
                                                                                    <label for="whatsapp_two"
                                                                                        class="pb-0 col-form-label font-weight-bold text-info">Representative
                                                                                        Mobile (What'sapp)</label>
                                                                                    <input type="text" class="form-control"
                                                                                        name="old_whatsapp_two[]"
                                                                                        value="{{ $row->whatsapp_two }}"
                                                                                        placeholder=".....input What'sapp number">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-group row px-5">
                                                                                    <label for="mobile"
                                                                                        class="pb-0 col-form-label font-weight-bold text-info">Representative
                                                                                        Mobile</label>
                                                                                    <input type="text" required class="form-control"
                                                                                        name="old_representative_mobile[]"
                                                                                        value="{{ $row->representative_mobile }}"
                                                                                        placeholder="+88">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-group row px-5">
                                                                                    <label for="email"
                                                                                        class="pb-0 col-form-label font-weight-bold text-info">Representative
                                                                                        Email</label>
                                                                                    <input type="email" class="form-control"
                                                                                        name="old_representative_email[]"
                                                                                        value="{{ $row->representative_email }}"
                                                                                        placeholder=".....input email adress">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="card shadow mt-3">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-12 text-lg-right px-5">
                                                                    <button class="btn btn-large btn-success add_row" type="button"><i
                                                                            class="fas fa-plus"></i></button>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group row px-5">
                                                                                <label for="representative_name"
                                                                                    class="pb-0 col-form-label font-weight-bold text-info">Representative
                                                                                    Name <span class="text-danger">*</span></label>
                                                                                <input type="text" required class="form-control"
                                                                                    name="representative_name[]" value=""
                                                                                    placeholder="--input representative name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group row px-5">
                                                                                <label for="address"
                                                                                    class="pb-0 col-form-label font-weight-bold text-info">Representative
                                                                                    Details</label>
                                                                                <textarea class="form-control" name="representative_address[]" id="address" cols="30" rows="5"
                                                                                    placeholder=".....input representative details"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group row px-5">
                                                                                <label for="whatsapp_two"
                                                                                    class="pb-0 col-form-label font-weight-bold text-info">Representative
                                                                                    Mobile (What'sapp)</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="whatsapp_two[]" value=""
                                                                                    placeholder=".....input What'sapp number">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group row px-5">
                                                                                <label for="mobile"
                                                                                    class="pb-0 col-form-label font-weight-bold text-info">Representative
                                                                                    Mobile*</label>
                                                                                <input type="text" required class="form-control"
                                                                                    name="representative_mobile[]" value=""
                                                                                    placeholder="+88">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group row px-5">
                                                                                <label for="email"
                                                                                    class="pb-0 col-form-label font-weight-bold text-info">Representative
                                                                                    Email</label>
                                                                                <input type="email" class="form-control"
                                                                                    name="representative_email[]" value=""
                                                                                    placeholder=".....input email adress">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                          
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                        <div class="tab-pane fade" id="professional" role="tabpanel" aria-labelledby="professional-tab">
                          {{-- Business Engagement --}}
                            <div class="card shadow mb-2">
                               
                                <div class="card-body pb-1">
                                    <div class="case-info-section section">
                                       
                                        <h4>Business Engagement</h4>

                                            <div class="row mt-4">
                                                @php
                                                    $types = \App\EngagementType::where('status', 1)->oldest('name')->get();
                                                @endphp
                                                <div class="col-md-12">
                                                    <div class="form-group row px-5">
                                                        <label for="engagement_type_id"
                                                            class="pb-0 col-form-label font-weight-bold text-info">Engagement
                                                            Type</label>
                                                        <select class="form-control" name="engagement_type_id"
                                                            id="engagement_type_id" required>
                                                            <option value="">Select Type</option>
                                                            @foreach ($types as $row)
                                                                <option value="{{ $row->id }}"
                                                                    {{ $client->engagement_type_id == $row->id ? 'selected' : '' }}>
                                                                    {{ $row->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                                @foreach ($clientEngagement as $row)
                                                    <input type="hidden" name="engagement_id[{{ $row->id }}]"
                                                        value="{{ $row->id }}">
                                                    <div class="col-md-6">
                                                        <div class="form-group row px-5">
                                                            <label for="engagement_from"
                                                                class="pb-0 col-form-label font-weight-bold text-info">Engagement
                                                                From</label>
                                                            <input type="text" class="form-control"
                                                                name="engagement_from[{{ $row->id }}]"
                                                                value="{{ $row->engagement_from }}" placeholder="from">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group row px-5">
                                                            <label for="engagement_to"
                                                                class="pb-0 col-form-label font-weight-bold text-info">Engagement
                                                                To</label>
                                                            <input type="text" class="form-control"
                                                                name="engagement_to[{{ $row->id }}]"
                                                                value="{{ $row->engagement_to }}" placeholder="to">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group row px-5">
                                                            <label for="engagement_document"
                                                                class="pb-0 col-form-label font-weight-bold text-info">Engagement
                                                                Document</label>
                                                            <div class="d-flex w-100">
                                                                <input type="file" class="form-control p-1 w-90"
                                                                    name="engagement_document[{{ $row->id }}]"
                                                                    value="{{ $row->engagement_document }}" placeholder="">
                                                                <a href="{{ asset('uploads/client') }}/{{ $row->engagement_document }}"
                                                                    class="btn btn-primary" target="_blank">View</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group row px-5">
                                                            <label for="engagement_note"
                                                                class="pb-0 col-form-label font-weight-bold text-info">Engagement
                                                                Note</label>
                                                            <input type="text" class="form-control"
                                                                name="engagement_note[{{ $row->id }}]"
                                                                value="{{ $row->engagement_note }}" placeholder="note">
                                                        </div>
                                                    </div>
                                                @endforeach



                                            </div>
                          
                                    </div>
                                </div>
                            </div>
                        </div>   
                        
                        <div class="tab-pane fade" id="client" role="tabpanel" aria-labelledby="client-tab">
                          {{-- Party / Client --}}
                            <div class="card shadow mb-2">
                                <div class="card-body">
                                    <div class="case-info-section section">
                                        <h4>Letter Head Party / Client</h4>
                                        <div class="row mt-4">
                                            
                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <div class="col-lg-2">
                                                        <label for="letter_head_client_name" class="pb-0 col-form-label font-weight-bold text-info">Client Name<span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <input value="{{ $client->letter_head_client_name }}" type="text" class="form-control" id ="letter_head_client_name" name="letter_head_client_name" placeholder="Client Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <div class="col-lg-2">
                                                        <label for="letter_head_client_line_one" class="pb-0 col-form-label font-weight-bold text-info">Address Line 1<span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <input value="{{ $client->letter_head_client_line_one }}" type="text" class="form-control" id ="letter_head_client_line_one" name="letter_head_client_line_one" placeholder="Address Line One" required>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <div class="col-lg-2">
                                                        <label for="letter_head_client_line_two" class="pb-0 col-form-label font-weight-bold text-info">Address Line 2</label>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <input value="{{ $client->letter_head_client_line_two }}" type="text" class="form-control" id ="letter_head_client_line_two" name="letter_head_client_line_two" placeholder="Address Line Two">
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <div class="col-lg-2">
                                                        <label for="letter_head_client_line_three" class="pb-0 col-form-label font-weight-bold text-info">Address Line 3</label>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <input value="{{ $client->letter_head_client_line_three }}" type="text" class="form-control" id ="letter_head_client_line_three" name="letter_head_client_line_three" placeholder="Address Line Three">
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <div class="col-lg-2">
                                                        <label for="letter_head_client_mobile" class="pb-0 col-form-label font-weight-bold text-info">Mobile</label>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <input value="{{ $client->letter_head_client_mobile }}" type="text" class="form-control" id ="letter_head_client_mobile" name="letter_head_client_mobile" placeholder="+8801xxxxxxxxxxx">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <div class="col-lg-2">
                                                        <label for="letter_head_client_email" class="pb-0 col-form-label font-weight-bold text-info">Email</label>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <input value="{{ $client->letter_head_client_email }}" type="text" class="form-control" id ="letter_head_client_email" name="letter_head_client_email" placeholder="example@gmail.com">
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <div class="col-lg-2">
                                                        <label for="letter_head_client_attention" class="pb-0 col-form-label font-weight-bold text-info">Attention</label>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <input value="{{ $client->letter_head_client_attention }}" type="text" class="form-control" id ="letter_head_client_attention" name="letter_head_client_attention" placeholder="Client Attention">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <div class="form-navigation">
                            <div style="overflow:auto;">
                                <div style="float:right; margin-top: 5px;">
                                    <button type="button" class="previous">Previous</button>
                                    <button type="button" class="next">Next</button>
                                    <!-- <button type="button" class="submit">Update</button> -->
                                </div>
                            </div>
                        </div>
                            

                    </div>
                </div>
            </form>
        </div>
    </div>

</div>  

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
    <script>
    new MultiSelectTag('section_id')  // id
</script>

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
                fname: "required",
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    digits: true
                },

                username: {
                    username: true,
                    required: true,
                    minlength: 4,
                    maxlength: 16,
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 16,
                }
            },
            // Specify validation error messages
            messages: {
                fname: "First name is required",
                email: {
                    required: "Email is required",
                    email: "Please enter a valid e-mail",
                },
                phone: {
                    required: "Phone number is requied",
                    minlength: "Please enter 10 digit mobile number",
                    maxlength: "Please enter 10 digit mobile number",
                    digits: "Only numbers are allowed in this field"
                },
                date: {
                    required: "Date is required",
                    minlength: "Date should be a 2 digit number, e.i., 01 or 20",
                    maxlength: "Date should be a 2 digit number, e.i., 01 or 20",
                    digits: "Date should be a number"
                },
                month: {
                    required: "Month is required",
                    minlength: "Month should be a 2 digit number, e.i., 01 or 12",
                    maxlength: "Month should be a 2 digit number, e.i., 01 or 12",
                    digits: "Only numbers are allowed in this field"
                },
                year: {
                    required: "Year is required",
                    minlength: "Year should be a 4 digit number, e.i., 2018 or 1990",
                    maxlength: "Year should be a 4 digit number, e.i., 2018 or 1990",
                    digits: "Only numbers are allowed in this field"
                },
                username: {
                    required: "Username is required",
                    minlength: "Username should be minimum 4 characters",
                    maxlength: "Username should be maximum 16 characters",
                },
                password: {
                    required: "Password is required",
                    minlength: "Password should be minimum 8 characters",
                    maxlength: "Password should be maximum 16 characters",
                }
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

    $("#home-tab").addClass("Tabs_active");
</script>

<script>
  window.onscroll = function() {myFunction()};

  var header = document.getElementById("myHeader");
  var sticky = header.offsetTop;

  function myFunction() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  }
</script>
<script>
    $(document).ready(function() {
        $('textarea').each(function() {
            $(this).val($(this).val().trim());
        });

    });
</script>
@endsection
