@extends('layouts.lawyer.layout')

@section('title')
    <title>Edit Case</title>
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
.manage_con{
    border: 1px dotted;
    padding: 15px;
    margin-bottom: 10px;
}
/*input dropdown*/
.bootstrap-tagsinput .tag {
    margin-right: 2px;
    color: white !important;
    background: #36B9CF;
    padding:5px;
}
.bootstrap-tagsinput{
    width:100%;
    border-color: #36B9CF !important;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #6e707e;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
    <!-- DataTales Example -->


    <div class="row">
        <div class="col-12">
                 <div class="card shadow" style="margin-bottom: -0.4rem !important;">
                  <div class="row py-2 px-4" id="myHeader" style="margin-bottom: -5px;">
                    <div class="col-lg-10 col-12 show__section" style="color: #000;font-size:14px">
                      <div class="row">
                        <div class="col-lg-7 col-sm-12">
                          <div class="row">
                            <div class="col-lg-3 col-3">
                              <label for="">Case No.</label>
                            </div>
                            <div class="col-lg-9 col-9">
                              <div>
                                 <div class="d-flex">
                                <span class="mr-3">:</span>
                                <span style="color: #FF7034;font-size: 15px;font-weight: bold">{{ @$cases->caseTitleShort->name_short.' '.@$cases->case_infos_case_no.'/'.@$cases->case_infos_case_year }}</span>
                              </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-lg-5">
                         <div class="row">
                          <div class="col-lg-4 col-4">
                            <label for="">Court No.</label>
                          </div>
                          <div class="col-lg-8 col-8">
                            <div>
                            <div class="d-flex">
                              <span class="mr-3">:</span>
                              <span>{{ @$cases->courtShort->name_short }}</span>
                            </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-lg-7">
                        <div class="row">
                          <div class="col-lg-3 col-3">
                            <label for="">Party Name</label>
                          </div>
                          <div class="col-lg-9 col-9">
                            <div class="d-flex">
                              <span class="mr-3">:</span>
                              <div class="">
                              @if($cases->client_party_id == 1)
                  <span style="color:blue;">{{ @$cases->client_party_name }}</span> <span class="text-danger"> Vs </span> <span>{{ @$cases->opponent_info_name }}</span>
                  @else
                   <span>{{ @$cases->opponent_info_name }}</span> <span class="text-danger"> Vs </span> <span style="color:blue;">{{ @$cases->client_party_name }}</span>
                  @endif
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-lg-5">
                        <div class="row">
                          <div class="col-lg-4 col-4">
                            <label for="">Next Date</label>
                          </div>
                          <div class="col-lg-8 col-8">
                            <div>
                                <div class="d-flex">
                              <span class="mr-3">:</span>
                              <span style="color: #36b9cc;font-weight: bold;font-size: 14px;">{{ $cases->cpl()->latest('updated_order_date')->first() ? $cases->cpl()->latest('updated_order_date')->first()->updated_next_date->format('d-m-Y'):'' }}</span>
                            </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-lg-7">
                       <div class="row">
                        <div class="col-lg-3 col-3">
                          <label for="">Matter</label>
                        </div>
                        <div class="col-lg-9 col-9">
                          <div>
                              <div class="d-flex">
                                <span class="mr-3">:</span>
                                <span>{{ @$cases->matter->name }}</span>
                                  
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-lg-5">
                     <div class="row">
                      <div class="col-lg-4 col-4">
                        <label for="">N.D. Fixed for</label>
                      </div>
                      <div class="col-lg-8 col-8">
                        <div class="d-flex">
                          <span class="mr-3">:</span>
                          <span style="color: #36b9cc;font-weight: 600;">{{ $cases->cpl()->latest('updated_order_date')->first() ? $cases->cpl()->latest('updated_order_date')->first()->next_fixed_for()->first() ? $cases->cpl()->latest('updated_order_date')->first()->next_fixed_for()->first()->name : $cases->cpl()->latest('updated_order_date')->first()->updated_index_fixed_for_write :'' }}</span>
                        </div>
                      </div>
                    </div>
                  </div>
            
                </div>
              </div>
              <div class="col-lg-2 col-12 show_btn" style="text-align: end;">
                <button class="delete btn btn-danger btn-sm btn-show">{{ $cases->status->name }}</button>
                @if($cases->cpl()->latest('updated_order_date')->first())
                <button class="btn btn-info btn-sm btn-show">{{ $cases->cpl()->latest('updated_order_date')->first() ? $cases->cpl()->latest('updated_order_date')->first()->status()->first() ? $cases->cpl()->latest('updated_order_date')->first()->status()->first()->name : $cases->cpl()->latest('updated_order_date')->first()->updated_case_status_write :'' }}</button>
                @else
                <button class="btn btn-danger btn-sm btn-show">Status</button>
                @endif
                <button class="edit btn btn-success btn-sm btn-show">{{ $diff_in_days.' days' }}</button>
              </div>
            </div>
            </div>
            <div class=" mb-4">
                <form id="myForm" action="{{ route('lawyer.litigation.case.update',$cases->id) }}" method="post" autocomplete = "off">
                    @csrf
                <div class="card shadow mt-3" style="border:0;border-bottom: 1px solid black;border-bottom-left-radius: 0;border-bottom-right-radius: 0;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h3 class="mb-2 font-weight-bold" style="color: black;">Edit Case </h3>
                            <div>
                                <a href="{{route('lawyer.litigation.case.show',$cases->id)}}"><i class="fas fa-fw fa-eye" style="color: #ccc;"></i></a>
                            </div>
                        </div>
                    <div class="row">
                            <div class="d-flex justify-content-center w-100 mb-2 nav nav-tabs"  id="myTab" role="tablist" style="border-bottom:unset;">
                                <button
                                    class=" btn custom-btn mx-1 step nav-link  active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Case
                                    Info</button>
                                <button
                                    class="btn btn-secondary mx-1 step nav-link" onclick="$('#home-tab').removeClass('custom-btn') ;$('#home-tab').addClass('btn-secondary')" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Case
                                    Status</button>
                                <button
                                    class="btn btn-secondary mx-1 step nav-link" onclick="$('#home-tab').removeClass('custom-btn') ;$('#home-tab').addClass('btn-secondary')" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Events
                                    & Stages</button>
                                <button
                                    class="btn btn-secondary mx-1 step nav-link" onclick="$('#home-tab').removeClass('custom-btn') ;$('#home-tab').addClass('btn-secondary')"  id="party-tab" data-toggle="tab" href="#party" role="tab" aria-controls="contact" aria-selected="false">Party
                                    Info</button>
                                <button
                                    class="btn btn-secondary mx-1 step nav-link" onclick="$('#home-tab').removeClass('custom-btn') ;$('#home-tab').addClass('btn-secondary')"  id="lawyer-tab" data-toggle="tab" href="#lawyer" role="tab" aria-controls="contact" aria-selected="false">Lawyer
                                    Info</button>
                                <button
                                    class="btn btn-secondary mx-1 step nav-link" onclick="$('#home-tab').removeClass('custom-btn') ;$('#home-tab').addClass('btn-secondary')"  id="case-tab" data-toggle="tab" href="#case" role="tab" aria-controls="contact" aria-selected="false">Case
                                    Document</button>
                            </div>
                    </div>
                    </div>
                </div>
                
                <div class="">
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                          {{-- case info section --}}
                            <div class="card shadow mb-2">
                                   <div class="edit_header">
                                    <h3 class="font-weight-bold py-2" style="color: black;font-size:1rem;">Case Info</h3>
                                    </div>
                                 <div class="card-body pb-1">
                                    <div class="case-info-section section">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="case_class_id"
                                            class="col-form-label font-weight-bold text-info col-md-4">Case
                                            Class</label>
                                        <div class="col-md-8">
                                            <select onchange="getCaseCategory()" name="case_class_id" class="form-control" id="case_class_id"
                                                required>
                                                <option selected disabled hidden value="">Select</option>
                                                <option {{ @$cases->case_class_id == 'District' ? 'selected' : ''  }} value="District">District</option>
                                                <option {{ @$cases->case_class_id == 'Special' ? 'selected' : ''  }} value="Special">Special</option>
                                                <option {{ @$cases->case_class_id == 'High Court' ? 'selected' : ''  }} value="High Court">High Court Division</option>
                                                <option {{ @$cases->case_class_id == 'Appellate' ? 'selected' : ''  }} value="Appellate">Appellate Division</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="case_category_id"
                                            class="col-form-label font-weight-bold text-info col-md-4">Case
                                            Category</label>
                                        <div class="col-md-8">
                                            <select onchange="getTypes()" name="case_category_id" class="form-control"
                                                id="case_category_id" required>
                                                <option value="">Select</option>
                                                @foreach ($case_categories->where('case_class',$cases->case_class_id) as $row)
                                                    <option {{ @$cases->case_category_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="case_type_id"
                                            class="col-form-label font-weight-bold text-info col-md-4">Case
                                            Type</label>
                                        <div class="col-md-8">
                                            <select
                                                onchange="var type_text = $('#case_type_id').find(':selected').text(); $('#disabled_case_type').val(type_text);"
                                                name="case_type_id" class="form-control select2"
                                                id="case_type_id" required>
                                                <option value="">Select</option>
                                                @foreach ($case_types->where('case_category_id',$cases->case_category_id) as $row)
                                                    <option {{ @$cases->case_type_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="case_matter_id"
                                            class="col-form-label font-weight-bold text-info col-md-4">Case
                                            Matter</label>
                                        <div class="col-md-8">
                                            <select name="case_matter_id" class="form-control select2"
                                                id="case_matter_id">
                                                <option selected disabled hidden>Select</option>
                                                @foreach ($case_matters as $row)
                                                    <option {{ @$cases->case_matter_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    
                                    <div class="form-group row">
                                        <label for="case_infos_division_id"
                                            class="col-form-label font-weight-bold text-info col-md-4">Division</label>
                                        <div class="col-md-8">
                                            <select onchange="getDistricts();" name="case_infos_division_id"
                                                class="form-control select2" id="case_infos_division_id">
                                                <option selected disabled hidden>Select</option>
                                                @foreach ($divisions as $row)
                                                    <option {{ @$cases->case_infos_division_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->division_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="case_infos_district_id"
                                            class="col-form-label font-weight-bold text-info col-md-4">District</label>
                                        <div class="col-md-8">
                                            <select onchange="getThanas();" name="case_infos_district_id"
                                                class="form-control" id="case_infos_district_id">
                                                <option value="">Select</option>
                                                @foreach ($districts->where('division_id',$cases->case_infos_division_id) as $row)
                                                    <option {{ @$cases->case_infos_district_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->district_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="police_station_id"
                                            class="col-form-label font-weight-bold text-info col-md-4">Police
                                            Station</label>
                                        <div class="col-md-8">
                                            <select name="police_station_id" class="form-control"
                                                id="police_station_id">
                                                <option value="">Select</option>
                                                @foreach ($thanas->where('district_id',$cases->case_infos_district_id) as $row)
                                                    <option {{ @$cases->police_station_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->thana_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">

                                    <div class="form-group row">
                                        <label for="case_infos_case_title_id"
                                            class="col-form-label font-weight-bold text-info col-md-4">Case
                                            Title (Full)</label>
                                        <div class="col-md-8">
                                            <select name="case_infos_case_title_id"
                                                class="form-control select2" id="case_infos_case_title_id">
                                                <option selected disabled hidden>Select</option>
                                                @foreach ($case_titles->where('case_category_id',$cases->case_category_id) as $row)
                                                    <option {{ @$cases->case_infos_case_title_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="law_id"
                                            class="col-form-label font-weight-bold text-info col-md-4">Law</label>
                                        <div class="col-md-8">
                                            <select name="law_id" class="form-control select2"
                                                id="law_id">
                                                <option selected disabled hidden>Select</option>
                                                @foreach ($case_laws as $row)
                                                    <option {{ @$cases->law_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="section_id" class="col-form-label font-weight-bold text-info col-md-4">Section</label>
                                        <div class="col-md-8">
                                            <select name="section_id[]" class="form-control" id="section_id" multiple style="display:none">
                                                @foreach ($case_sections as $row)
                                                    <option {{ @$cases->section_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for=""
                                            class="col-form-label font-weight-bold text-info col-md-4">Upcoming</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control"
                                                name=""
                                                value=""
                                                placeholder="Type">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="case_nature_id"
                                            class="col-form-label font-weight-bold text-info col-md-4">Case
                                            Nature</label>
                                        <div class="col-md-8">
                                            <select name="case_nature_id" class="form-control select2"
                                                id="case_nature_id">
                                                <option selected disabled hidden>Select</option>
                                                @foreach ($case_natures as $row)
                                                    <option {{ @$cases->case_nature_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="case_prayer_id"
                                            class="col-form-label font-weight-bold text-info col-md-4">Case
                                            Prayer</label>
                                        <div class="col-md-8">
                                            <select name="case_prayer_id" class="form-control select2"
                                                id="case_prayer_id">
                                                <option selected disabled hidden>Select</option>
                                                @foreach ($case_prayers as $row)
                                                    <option {{ @$cases->case_prayer_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="allegation_claim"
                                            class="col-form-label font-weight-bold text-info col-md-4">Allegation/Claim</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control"
                                                name="allegation_claim"
                                                value="{{ @$cases->allegation_claim }}"
                                                placeholder="Type">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="amount"
                                            class="col-form-label font-weight-bold text-info col-md-4">Amount</label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control" name="amount"
                                                value="{{ @$cases->amount }}" placeholder="Type Amount">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group row">
                                        <label for="case_infos_case_no"
                                            class="col-form-label font-weight-bold text-info col-md-4">Case
                                            No</label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input required type="number" class="form-control"
                                                        name="case_infos_case_no"
                                                        value="{{ @$cases->case_infos_case_no }}"
                                                        placeholder="Case No">
                                                </div>
                                                <div class="col-md-6">
                                                    <input required type="number" class="form-control"
                                                        name="case_infos_case_year"
                                                        value="{{ @$cases->case_infos_case_year }}"
                                                        placeholder="Case Year">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="case_filing_date"
                                            class="col-form-label font-weight-bold text-info col-md-4">Case
                                            Filing Date</label>
                                        <div class="col-md-8">
                                            <input required onchange="var type_text = $('#case_filing_date').val(); $('#disabled_case_filing_date').val(type_text);"
                                                type="date" id="case_filing_date"
                                                class="form-control"
                                                name="case_filing_date" value="{{ @$cases->case_filing_date->format('Y-m-d') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="court_id"
                                            class="col-form-label font-weight-bold text-info col-md-4">Court</label>
                                        <div class="col-md-8">
                                            <select required name="court_id" class="form-control select2"
                                                id="court_id">
                                                <option selected>Select</option>
                                                @foreach ($case_courts->where('all_district',1) as $row)
                                                    <option {{ @$cases->court_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}
                                                    </option>
                                                @endforeach
                                                @foreach ($case_courts->where('district_id',$cases->district->district_name)->where('case_category_id',$cases->case_category_id)->where('case_class',$cases->case_class_id) as $row)
                                                    <option {{ @$cases->court_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}
                                                    </option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">
                                        <label for="summary_facts"
                                            class="col-form-label font-weight-bold text-info col-md-2">Summary
                                            Facts</label>
                                        <div class="col-md-10">
                                            <textarea name="summary_facts" id="summary_facts" class="form-control" placeholder="Type" aria-invalid="false">{{ @$cases->summary_facts }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="special_note"
                                            class="col-form-label font-weight-bold text-info col-md-2">Special
                                            Note</label>
                                        <div class="col-md-10">
                                            <textarea name="special_note" id="special_note" class="form-control" placeholder="Type" aria-invalid="false">{{ @$cases->special_note }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="reference_case_info"
                                            class="col-form-label font-weight-bold text-info col-md-2">Reference
                                            Case Info</label>
                                        <div class="col-md-10">
                                            <textarea name="reference_case_info" id="reference_case_info" class="form-control" placeholder="Type"
                                                aria-invalid="false">{{ @$cases->reference_case_info }}</textarea>
                                        </div>
                                    </div>
                                    <div class="manage_consequence">
                                        <div class="add_manage_c">
                                    <div class="form-group row">
                                        <label for=""
                                            class="col-form-label font-weight-bold text-info col-md-2">Case Subsequent</label>
                                        <div class="col-md-10">
                                            <button class="btn btn-large btn-success add_consequence" type="button" style="height: 30px;margin-top: 5px;"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                   
                                </div>
                            </div>
                        </div>
                                 </div>
                             </div>
                      </div>
                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            {{-- case status section --}}
                          <div class="card shadow mb-2">
                                 <div class="edit_header">
                                                <h3 class="font-weight-bold py-2" style="color: black;font-size:1rem;">Case Status</h3>
                                            </div>
                                 <div class="card-body pb-1">
                                     
                                <div class="case-status-section section " >
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <div class="form-group row">
                                        <label for="case_status_id"
                                            class="col-form-label font-weight-bold text-info col-md-4">Case
                                            Status</label>
                                        <div class="col-md-8">
                                            <select onchange="if($('#case_status_id').val() == '' || $('#case_status_id').val() == 1){$('#disposed-div :input').attr('disabled',true)} else {$('#disposed-div :input').attr('disabled',false);}" name="case_status_id" class="form-control"
                                                id="case_status_id" required>
                                                <option selected disabled hidden>Select</option>
                                                @foreach ($case_statuses as $row)
                                                    <option {{ @$cases->case_status_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="case_progress_status"
                                            class="col-form-label font-weight-bold text-info col-md-4">Case
                                            Progress Status</label>
                                        <div class="col-md-8">
                                            <input readonly id="case_progress_status" type="text" class="form-control" value="{{ $cases->cpl()->latest('updated_next_date')->first() ? $cases->cpl()->latest('updated_next_date')->first()->status()->first() ? $cases->cpl()->latest('updated_next_date')->first()->status()->first()->name : $cases->cpl()->latest('updated_next_date')->first()->updated_case_status_write :'' }}"  >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="case_type"
                                            class="col-form-label font-weight-bold text-info col-md-4">Case
                                            Type</label>
                                        <div class="col-md-8">
                                            <input readonly id="disabled_case_type" type="text"
                                                class="form-control" value="{{ @$cases->type->name }}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="disabled_case_filing_date"
                                            class="col-form-label font-weight-bold text-info col-md-4">Date Of
                                            Filing</label>
                                        <div class="col-md-8">
                                            <input readonly type="text" class="form-control"
                                                id="disabled_case_filing_date" value="{{ @$cases->case_filing_date->format('d-m-Y') }}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="next_case_date"
                                            class="col-form-label font-weight-bold text-info col-md-4">Next
                                            Case Date</label>
                                        <div class="col-md-8">
                                            <input readonly id="next_case_date" type="text" class="form-control" value="{{ $cases->cpl()->latest('updated_next_date')->first() ? $cases->cpl()->latest('updated_next_date')->first()->updated_next_date->format('d-m-Y'):'' }}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="next_date_fixed_for"
                                            class="col-form-label font-weight-bold text-info col-md-4">Next
                                            Date Fixed For</label>
                                        <div class="col-md-8">
                                            <input readonly id="next_date_fixed_for" type="text" class="form-control" value="{{ $cases->cpl()->latest('updated_next_date')->first() ? $cases->cpl()->latest('updated_next_date')->first()->next_fixed_for()->first() ? $cases->cpl()->latest('updated_next_date')->first()->next_fixed_for()->first()->name : $cases->cpl()->latest('updated_next_date')->first()->updated_index_fixed_for_write :''  }}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="case_status_note"
                                            class="col-form-label font-weight-bold text-info col-md-4">Note</label>
                                        <div class="col-md-8">
                                            <textarea readonly name="case_status_note" id="case_status_note"  class="form-control" aria-invalid="false">{{ @$cases->case_status_note }}</textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6" id="disposed-div">
                                    <div class="form-group row">
                                        <label for="diposed_status_id"
                                            class="col-form-label font-weight-bold text-info col-md-4">Diposed
                                            Status</label>
                                        <div class="col-md-8">
                                            <select name="diposed_status_id" class="form-control "
                                                id="diposed_status_id">
                                                <option selected disabled hidden>Select</option>
                                                @foreach ($disposed_statuses as $row)
                                                    <option {{ @$cases->diposed_status_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="date_of_diposed"
                                            class="col-form-label font-weight-bold text-info col-md-4">Date Of
                                            Diposed</label>
                                        <div class="col-md-8">
                                            <input type="date" class="form-control"
                                                name="date_of_diposed" id="date_of_diposed" value="{{ @$cases->date_of_diposed }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="diposed_by_id"
                                            class="col-form-label font-weight-bold text-info col-md-4">Diposed
                                            By</label>
                                        <div class="col-md-8">
                                            <select name="diposed_by_id" class="form-control "
                                                id="diposed_by_id">
                                                <option selected disabled hidden>Select</option>
                                                @foreach ($disposed_bies as $row)
                                                    <option {{ @$cases->diposed_by_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="evidence_of_diposed_id"
                                            class="col-form-label font-weight-bold text-info col-md-4">Evidence
                                            Of Diposed</label>
                                        <div class="col-md-8">
                                            <select name="evidence_of_diposed_id" class="form-control "
                                                id="evidence_of_diposed_id">
                                                <option selected disabled hidden>Select</option>
                                                @foreach ($disposed_evidences as $row)
                                                    <option {{ @$cases->evidence_of_diposed_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="evidence_type_id"
                                            class="col-form-label font-weight-bold text-info col-md-4">Evidence
                                            Type</label>
                                        <div class="col-md-8">
                                            <select name="evidence_type_id" class="form-control "
                                                id="evidence_type_id">
                                                <option selected disabled hidden>Select</option>
                                                @foreach ($evidence_types as $row)
                                                    <option {{ @$cases->evidence_type_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="note"
                                            class="col-form-label font-weight-bold text-info col-md-4">Note</label>
                                        <div class="col-md-8">
                                            <textarea name="note" id="note" class="form-control" placeholder="Type"
                                                aria-invalid="false">{{ @$cases->note }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                 </div>
                         </div>
                      </div>
                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                              {{-- event stage section --}}
                    <div class="card shadow mb-2">
                        <div class="edit_header">
                            <h3 class="font-weight-bold py-2" style="color: black;">Events & Incidents</h3>
                            
                        </div>
                      <div class="card-body pb-1">
                         <div class="event-stage-section ">
                            
                         
                            <div class="Evidence">
                                <div class="add_Evidence">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="font-weight-bold text-info"
                                                    for="letter_notice_date">Date</label>
                                                <input type="date" class="form-control"
                                                    name="letter_notice_date" id="letter_notice_date" value="{{ @$cases->letter_notice_date }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="font-weight-bold text-info"
                                                    for="letter_notice_documents_id">Title</label>
                                                <select name="letter_notice_documents_id" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="8">Charge Form</option>
                                                    <option value="7">Charge Sheet</option>
                                                    <option value="16">Cheque</option>
                                                    <option value="15">Cheque Dishonour</option>
                                                    <option value="5">Complaint</option>
                                                    <option value="9">Investigation Report</option>
                                                    <option value="14">Legal Notice (Served)</option>
                                                    <option value="10">Legal Notice by 1st Party</option>
                                                    <option value="11">Legal Notice by 2nd Party</option>
                                                    <option value="12">Letter by 1st Party</option>
                                                    <option value="13">Letter by 2nd Party</option>
                                                    <option value="3">Petition</option>
                                                    <option value="4">Plaint</option>
                                                    <option value="6">Written Statement</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="font-weight-bold text-info"
                                                    for="letter_notice_documents_write"></label>
                                                <input type="text" class="form-control mt-2"
                                                    name="letter_notice_documents_write" value="{{ @$cases->letter_notice_documents_write }}" placeholder="Document">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold text-info"
                                                    for="letter_notice_particulars_write">Description</label>
                                                <input type="text" class="form-control"
                                                    name="letter_notice_particulars_write" id="letter_notice_particulars_write" value="{{ @$cases->letter_notice_particulars_write }}" 
                                                    placeholder="Perticulars">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group row">
                                                <div class="col-sm-8">
                                                <label class="font-weight-bold text-info"
                                                    for="letter_notice_type_id">Evidence</label>
                                                <select name="letter_notice_type_id" class="form-control"
                                                    id="letter_notice_type_id">
                                                    <option value="">Select</option>
                                                    <option {{ @$cases->letter_notice_type_id == '2' ? 'selected' : ''  }} value="2">CC</option>
                                                    <option {{ @$cases->letter_notice_type_id == '3' ? 'selected' : ''  }} value="3">COPY</option>
                                                    <option {{ @$cases->letter_notice_type_id == '1' ? 'selected' : ''  }} value="1">ORG</option>
                                                </select>
                                                </div>
                                            <button class="btn btn-large btn-success add_Erow" type="button" style="height: 40px;margin-top: 30px;"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                         
                        </div>
                     
                    </div>
                  </div>
                  <div  class="card shadow mb-2">
                      <div class="edit_header">
                            
                            <h3 class="font-weight-bold py-2" style="color: black;">Stages (Steps)</h3>
                                <h3 class="btn btn-sm btn-light py-2 text-info">Custom Steps
                                </h3>
                            
                        </div>
                      <div class="card-body pb-1">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <div class="pt-2">
                                        <strong class="font-weight-bold text-info">STAGE</strong>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="w-100 p-2"
                                        style="background-color: #36b9cc;color:white; text-align: center;">
                                        <strong>DATE</strong>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="w-100 p-2"
                                        style="background-color: #36b9cc;color:white; text-align: center;">
                                        <strong>NOTE</strong>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="w-100 p-2"
                                        style="background-color: #36b9cc;color:white; text-align: center;">
                                        <strong>EVIDENCE</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">
                                        <label for="case_steps_filing"
                                            class="col-sm-2 col-form-label font-weight-bold text-info"> Filing Date </label>
                                        <div class="col-sm-2">
                                            <span>
                                                <input type="text" id="case_steps_filing"
                                                    name="case_steps_filing" value="{{ $cases->case_filing_date->format('d/m/Y') }}"
                                                    class="form-control">
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                id="case_steps_filing_note" name="case_steps_filing_note"
                                                placeholder="Type" value="{{ @$cases->case_steps_filing_note }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <select name="case_steps_filing_type_id" class="form-control">
                                                <option value="">Select</option>
                                                <option {{ @$cases->case_steps_filing_type_id == '2' ? 'selected' : ''  }} value="2">CC</option>
                                                <option {{ @$cases->case_steps_filing_type_id == '3' ? 'selected' : ''  }} value="3">COPY</option>
                                                <option {{ @$cases->case_steps_filing_type_id == '1' ? 'selected' : ''  }} value="1">ORG</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row ">
                                        <label for="case_steps_service_return"
                                            class="col-sm-2 col-form-label font-weight-bold text-info"> Service
                                            Return (SR) </label>
                                        <div class="col-sm-2">
                                            <span>
                                                <input type="date" id="case_steps_service_return"
                                                    name="case_steps_service_return" value="{{ @$cases->case_steps_service_return }}"
                                                    class="form-control">
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                id="case_steps_service_return_note"
                                                name="case_steps_service_return_note" placeholder="Type"
                                                value="{{ @$cases->case_steps_service_return_note }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <select name="case_steps_service_return_type_id"
                                                class="form-control">
                                                <option value="">Select</option>
                                                <option {{ @$cases->case_steps_service_return_type_id == '2' ? 'selected' : ''  }} value="2">CC</option>
                                                <option {{ @$cases->case_steps_service_return_type_id == '3' ? 'selected' : ''  }} value="3">COPY</option>
                                                <option {{ @$cases->case_steps_service_return_type_id == '1' ? 'selected' : ''  }} value="1">ORG</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="case_steps_sr_completed"
                                            class="col-sm-2 col-form-label font-weight-bold text-info"> S.R.
                                            Completed </label>
                                        <div class="col-sm-2">
                                            <span>
                                                <input type="date" id="case_steps_sr_completed"
                                                    name="case_steps_sr_completed" value="{{ @$cases->case_steps_sr_completed }}"
                                                    class="form-control">
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                id="case_steps_sr_completed_note"
                                                name="case_steps_sr_completed_note" placeholder="Type"
                                                value="{{ @$cases->case_steps_sr_completed_note }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <select name="case_steps_sr_completed_type_id"
                                                class="form-control">
                                                <option value="">Select</option>
                                                <option {{ @$cases->case_steps_sr_completed_type_id == '2' ? 'selected' : ''  }} value="2">CC</option>
                                                <option {{ @$cases->case_steps_sr_completed_type_id == '3' ? 'selected' : ''  }} value="3">COPY</option>
                                                <option {{ @$cases->case_steps_sr_completed_type_id == '1' ? 'selected' : ''  }} value="1">ORG</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label for="case_steps_set_off"
                                            class="col-sm-2 col-form-label font-weight-bold text-info"> Set Off
                                        </label>
                                        <div class="col-sm-2">
                                            <span>
                                                <input type="date" id="case_steps_set_off"
                                                    name="case_steps_set_off" value="{{ @$cases->case_steps_set_off }}"
                                                    class="form-control">
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                id="case_steps_set_off_note" name="case_steps_set_off_note"
                                                placeholder="Type" value="{{ @$cases->case_steps_set_off_note }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <select name="case_steps_set_off_type_id" class="form-control">
                                                <option value="">Select</option>
                                                <option {{ @$cases->case_steps_set_off_type_id == '2' ? 'selected' : ''  }} value="2">CC</option>
                                                <option {{ @$cases->case_steps_set_off_type_id == '3' ? 'selected' : ''  }} value="3">COPY</option>
                                                <option {{ @$cases->case_steps_set_off_type_id == '1' ? 'selected' : ''  }} value="1">ORG</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label for="case_steps_issue_frame"
                                            class="col-sm-2 col-form-label font-weight-bold text-info"> Issue
                                            Frame </label>
                                        <div class="col-sm-2">
                                            <span>
                                                <input type="date" id="case_steps_issue_frame"
                                                    name="case_steps_issue_frame" value="{{ @$cases->case_steps_issue_frame }}"
                                                    class="form-control">
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                id="case_steps_issue_frame_note"
                                                name="case_steps_issue_frame_note" placeholder="Type"
                                                value="{{ @$cases->case_steps_issue_frame_note }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <select name="case_steps_issue_frame_type_id"
                                                class="form-control">
                                                <option value="">Select</option>
                                                <option {{ @$cases->case_steps_issue_frame_type_id == '2' ? 'selected' : ''  }} value="2">CC</option>
                                                <option {{ @$cases->case_steps_issue_frame_type_id == '3' ? 'selected' : ''  }} value="3">COPY</option>
                                                <option {{ @$cases->case_steps_issue_frame_type_id == '1' ? 'selected' : ''  }} value="1">ORG</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="case_steps_ph"
                                            class="col-sm-2 col-form-label font-weight-bold text-info"> PH
                                        </label>
                                        <div class="col-sm-2">
                                            <span>
                                                <input type="date" id="case_steps_ph" name="case_steps_ph"
                                                    value="{{ @$cases->case_steps_ph }}" class="form-control">
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                id="case_steps_ph_note" name="case_steps_ph_note"
                                                placeholder="Type" value="{{ @$cases->case_steps_ph_note }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <select name="case_steps_ph_type_id" class="form-control">
                                                <option value="">Select</option>
                                                <option {{ @$cases->case_steps_issue_frame_type_id == '2' ? 'selected' : ''  }} value="2">CC</option>
                                                <option {{ @$cases->case_steps_issue_frame_type_id == '3' ? 'selected' : ''  }} value="3">COPY</option>
                                                <option {{ @$cases->case_steps_issue_frame_type_id == '1' ? 'selected' : ''  }} value="1">ORG</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="case_steps_fph"
                                            class="col-sm-2 col-form-label font-weight-bold text-info"> F.PH
                                        </label>
                                        <div class="col-sm-2">
                                            <span>
                                                <input type="date" id="case_steps_fph"
                                                    name="case_steps_fph" value="{{ @$cases->case_steps_fph }}"
                                                    class="form-control">
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                id="case_steps_fph_note" name="case_steps_fph_note"
                                                placeholder="Type" value="{{ @$cases->case_steps_fph_note }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <select name="case_steps_fph_type_id" class="form-control">
                                                <option value="">Select</option>
                                                <option {{ @$cases->case_steps_fph_type_id == '2' ? 'selected' : ''  }} value="2">CC</option>
                                                <option {{ @$cases->case_steps_fph_type_id == '3' ? 'selected' : ''  }} value="3">COPY</option>
                                                <option {{ @$cases->case_steps_fph_type_id == '1' ? 'selected' : ''  }} value="1">ORG</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row ">
                                        <label for="taking_cognizance"
                                            class="col-sm-2 col-form-label font-weight-bold text-info"> Taking
                                            Cognizance </label>
                                        <div class="col-sm-2">
                                            <span>
                                                <input type="date" id="taking_cognizance"
                                                    name="taking_cognizance" value="{{ @$cases->taking_cognizance }}"
                                                    class="form-control">
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                id="taking_cognizance_note" name="taking_cognizance_note"
                                                placeholder="Type" value="{{ @$cases->taking_cognizance_note }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <select name="taking_cognizance_type_id" class="form-control">
                                                <option value="">Select</option>
                                                <option {{ @$cases->taking_cognizance_type_id == '2' ? 'selected' : ''  }} value="2">CC</option>
                                                <option {{ @$cases->taking_cognizance_type_id == '3' ? 'selected' : ''  }} value="3">COPY</option>
                                                <option {{ @$cases->taking_cognizance_type_id == '1' ? 'selected' : ''  }} value="1">ORG</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group row ">
                                        <label for="arrest_surrender_cw"
                                            class="col-sm-2 col-form-label font-weight-bold text-info">
                                            Arrest/Surrender/C.W.</label>
                                        <div class="col-sm-2">
                                            <span>
                                                <input type="date" id="arrest_surrender_cw"
                                                    name="arrest_surrender_cw" value="{{ @$cases->arrest_surrender_cw }}"
                                                    class="form-control">
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                id="arrest_surrender_cw_note" name="arrest_surrender_cw_note"
                                                placeholder="Type" value="{{ @$cases->arrest_surrender_cw_note }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <select name="arrest_surrender_cw_type_id" class="form-control">
                                                <option value="">Select</option>
                                                <option {{ @$cases->arrest_surrender_cw_type_id == '2' ? 'selected' : ''  }} value="2">CC</option>
                                                <option {{ @$cases->arrest_surrender_cw_type_id == '3' ? 'selected' : ''  }} value="3">COPY</option>
                                                <option {{ @$cases->arrest_surrender_cw_type_id == '1' ? 'selected' : ''  }} value="1">ORG</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group row ">
                                        <label for="case_steps_court_transfer"
                                            class="col-sm-2 col-form-label font-weight-bold text-info"> Court
                                            Transfer </label>
                                        <div class="col-sm-2">
                                            <span>
                                                <input type="date" id="case_steps_court_transfer"
                                                    name="case_steps_court_transfer" value="{{ @$cases->case_steps_court_transfer }}"
                                                    class="form-control">
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                id="case_steps_court_transfer_note"
                                                name="case_steps_court_transfer_note" placeholder="Type"
                                                value="{{ @$cases->case_steps_court_transfer_note }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <select name="case_steps_court_transfer_type_id"
                                                class="form-control">
                                                <option value="">Select</option>
                                                <option {{ @$cases->case_steps_court_transfer_type_id == '2' ? 'selected' : ''  }} value="2">CC</option>
                                                <option {{ @$cases->case_steps_court_transfer_type_id == '3' ? 'selected' : ''  }} value="3">COPY</option>
                                                <option {{ @$cases->case_steps_court_transfer_type_id == '1' ? 'selected' : ''  }} value="1">ORG</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group row ">
                                        <label for="case_steps_bail"
                                            class="col-sm-2 col-form-label font-weight-bold text-info"> Bail
                                        </label>
                                        <div class="col-sm-2">
                                            <span>
                                                <input type="date" id="case_steps_bail"
                                                    name="case_steps_bail" value="{{ @$cases->case_steps_bail }}"
                                                    class="form-control">
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                id="case_steps_bail_note" name="case_steps_bail_note"
                                                placeholder="Type" value="{{ @$cases->case_steps_bail_note }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <select name="case_steps_bail_type_id" class="form-control">
                                                <option value="">Select</option>
                                                <option {{ @$cases->case_steps_bail_type_id == '2' ? 'selected' : ''  }} value="2">CC</option>
                                                <option {{ @$cases->case_steps_bail_type_id == '3' ? 'selected' : ''  }} value="3">COPY</option>
                                                <option {{ @$cases->case_steps_bail_type_id == '1' ? 'selected' : ''  }} value="1">ORG</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="case_steps_witness_from"
                                            class="col-sm-2 col-form-label font-weight-bold text-info"> Witness
                                            (From) </label>
                                        <div class="col-sm-2">
                                            <span>
                                                <input type="date" id="case_steps_witness_from"
                                                    name="case_steps_witness_from" value="{{ @$cases->case_steps_witness_from }}"
                                                    class="form-control">
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                id="case_steps_witness_from_note"
                                                name="case_steps_witness_from_note" placeholder="Type"
                                                value="{{ @$cases->case_steps_witness_from_note }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <select name="case_steps_witness_from_type_id"
                                                class="form-control">
                                                <option value="">Select</option>
                                                <option {{ @$cases->case_steps_witness_from_type_id == '2' ? 'selected' : ''  }} value="2">CC</option>
                                                <option {{ @$cases->case_steps_witness_from_type_id == '3' ? 'selected' : ''  }} value="3">COPY</option>
                                                <option {{ @$cases->case_steps_witness_from_type_id == '1' ? 'selected' : ''  }} value="1">ORG</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="case_steps_witness_to"
                                            class="col-sm-2 col-form-label font-weight-bold text-info"> Witness
                                            (To) </label>
                                        <div class="col-sm-2">
                                            <span>
                                                <input type="date" id="case_steps_witness_to"
                                                    name="case_steps_witness_to" value="{{ @$cases->case_steps_witness_to }}"
                                                    class="form-control">
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                id="case_steps_witness_to_note"
                                                name="case_steps_witness_to_note" placeholder="Type"
                                                value="{{ @$cases->case_steps_witness_to_note }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <select name="case_steps_witness_to_type_id" class="form-control">
                                                <option value="">Select</option>
                                                <option {{ @$cases->case_steps_witness_to_type_id == '2' ? 'selected' : ''  }} value="2">CC</option>
                                                <option {{ @$cases->case_steps_witness_to_type_id == '3' ? 'selected' : ''  }} value="3">COPY</option>
                                                <option {{ @$cases->case_steps_witness_to_type_id == '1' ? 'selected' : ''  }} value="1">ORG</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="case_steps_argument"
                                            class="col-sm-2 col-form-label font-weight-bold text-info">
                                            Argument </label>
                                        <div class="col-sm-2">
                                            <span>
                                                <input type="date" id="case_steps_argument"
                                                    name="case_steps_argument" value="{{ @$cases->case_steps_argument }}"
                                                    class="form-control">
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                id="case_steps_argument_note" name="case_steps_argument_note"
                                                placeholder="Type" value="{{ @$cases->case_steps_argument_note }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <select name="case_steps_argument_type_id" class="form-control">
                                                <option value="">Select</option>
                                                <option {{ @$cases->case_steps_witness_to_type_id == '2' ? 'selected' : ''  }} value="2">CC</option>
                                                <option {{ @$cases->case_steps_witness_to_type_id == '3' ? 'selected' : ''  }} value="3">COPY</option>
                                                <option {{ @$cases->case_steps_witness_to_type_id == '1' ? 'selected' : ''  }} value="1">ORG</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="case_steps_judgement_order"
                                            class="col-sm-2 col-form-label font-weight-bold text-info">
                                            Judgement &amp;
                                            Order </label>
                                        <div class="col-sm-2">
                                            <span>
                                                <input type="date" id="case_steps_judgement_order"
                                                    name="case_steps_judgement_order" value="{{ @$cases->case_steps_judgement_order }}"
                                                    class="form-control">
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                id="case_steps_judgement_order_note"
                                                name="case_steps_judgement_order_note" placeholder="Type"
                                                value="{{ @$cases->case_steps_judgement_order_note }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <select name="case_steps_judgement_order_type_id"
                                                class="form-control">
                                                <option value="">Select</option>
                                                <option {{ @$cases->case_steps_judgement_order_type_id == '2' ? 'selected' : ''  }} value="2">CC</option>
                                                <option {{ @$cases->case_steps_judgement_order_type_id == '3' ? 'selected' : ''  }} value="3">COPY</option>
                                                <option {{ @$cases->case_steps_judgement_order_type_id == '1' ? 'selected' : ''  }} value="1">ORG</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="case_steps_subsequent_status"
                                            class="col-sm-2 col-form-label font-weight-bold text-info">
                                            Subsequent Status </label>
                                        <div class="col-sm-2">
                                            <span>
                                                <input type="date" id="case_steps_subsequent_status"
                                                    name="case_steps_subsequent_status" value="{{ @$cases->case_steps_subsequent_status }}"
                                                    class="form-control">
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                id="case_steps_subsequent_status_note"
                                                name="case_steps_subsequent_status_note" placeholder="Type"
                                                value="{{ @$cases->case_steps_subsequent_status_note }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <select name="case_steps_subsequent_status_type_id"
                                                class="form-control">
                                                <option value="">Select</option>
                                                <option {{ @$cases->case_steps_subsequent_status_type_id == '2' ? 'selected' : ''  }} value="2">CC</option>
                                                <option {{ @$cases->case_steps_subsequent_status_type_id == '3' ? 'selected' : ''  }} value="3">COPY</option>
                                                <option {{ @$cases->case_steps_subsequent_status_type_id == '1' ? 'selected' : ''  }} value="1">ORG</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="case_steps_summary_of_cases_note"
                                            class="col-sm-2 col-form-label font-weight-bold text-info"> Summary
                                            of the Case </label>
                                        <div class="col-sm-10">
                                            <textarea name="case_steps_summary_of_cases_note" class="form-control" rows="3" placeholder="Type">{{ @$cases->case_steps_summary_of_cases_note }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="case_steps_note"
                                            class="col-sm-2 col-form-label font-weight-bold text-info"> Remarks
                                        </label>
                                        <div class="col-sm-10">
                                            <textarea name="case_steps_note" id="case_steps_note" class="form-control" rows="3" placeholder="Type">{{ @$cases->case_steps_note }}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                      </div>
                  </div>
                      </div>
                      <div class="tab-pane fade" id="party" role="tabpanel" aria-labelledby="party-tab">
                                 {{-- party section --}}
                        <div class="card shadow mb-2">
                            <div class="edit_header">
                             <h3 class="font-weight-bold py-2" style="color: black;">Client Info</h3>
                            
                        </div>
                            <div class="card-body pb-1">
                                
                             <div class="party-info-section ">
                            
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="client_party_id"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Client
                                            (on behalf of)</label>
                                        <div class="col-sm-8">
                                            <select required name="client_party_id" class="form-control dropdown_client"
                                                id="client_party_id">
                                                <option value="">Select</option>
                                                @foreach ($behalfs as $row)
                                                    <option {{ @$cases->client_party_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group row">
                                        <label for="client_division_id"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Division</label>
                                        <div class="col-sm-8">
                                            <select onchange="getClientDistricts()" name="client_division_id"
                                                class="form-control" id="client_division_id">
                                                <option value="">Select</option>
                                                @foreach ($divisions as $row)
                                                    <option {{ @$cases->client_division_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">
                                                        {{ $row->division_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group row">
                                        <label for="client_zone_id"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Zone</label>
                                        <div class="col-sm-8">
                                            <select onchange="getAreas();" name="client_zone_id"
                                                class="form-control" id="client_zone_id">
                                                <option value="">select</option>
                                                @foreach ($zones as $row)
                                                <option {{ @$cases->client_zone_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="client_category_id"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Client
                                            Category</label>
                                        <div class="col-sm-8">
                                            <select onchange="getClientSubCategories();"
                                                name="client_category_id" class="form-control"
                                                id="client_category_id" required>
                                                <option value="">Select</option>
                                                @foreach ($client_categories as $row)
                                                    <option {{ @$cases->client_category_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group row">
                                        <label for="client_district_id"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">District</label>
                                        <div class="col-sm-8">
                                            <select onchange="getClientThanas()" name="client_district_id"
                                                class="form-control" id="client_district_id">
                                                <option value="">Select</option>
                                                 @foreach ($districts->where('division_id',$cases->client_division_id) as $row)
                                                    <option {{ @$cases->client_district_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->district_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group row">
                                        <label for="client_area_id"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Area</label>
                                        <div class="col-sm-8">
                                            <select onchange="getBranches()" name="client_area_id"
                                                class="form-control" id="client_area_id">
                                                <option value="">select</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="client_subcategory_id"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Client
                                            Sub-Category</label>
                                        <div class="col-sm-8">
                                            <select required onchange="getClients();"
                                                name="client_subcategory_id" class="form-control"
                                                id="client_subcategory_id">
                                                <option value="">Select</option>
                                                 @foreach ($client_subcategories->where('client_category_id',$cases->client_category_id) as $row)
                                                    <option {{ @$cases->client_subcategory_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group row">
                                        <label for="client_thana_id"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Police
                                            Station</label>
                                        <div class="col-sm-8">
                                            <select name="client_thana_id"
                                                class="form-control" id="client_thana_id">
                                                <option value="">Select</option>
                                                @foreach ($thanas->where('district_id',$cases->client_district_id) as $row)
                                                    <option {{ @$cases->client_thana_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->thana_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group row">
                                        <label for="client_branch_id"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Branch</label>
                                        <div class="col-sm-8">
                                            <select name="client_branch_id" class="form-control"
                                                id="client_branch_id">
                                                <option value="">select</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="client_id" class="col-form-label col-sm-4 font-weight-bold text-info">Client </label>
                                        <div class="col-sm-8">
                                            <select onchange="clientData()" required class="form-control" name="client_id" id="client_id">
                                                <option value="">Select</option>
                                                @foreach($clients->where('subcategory_id',$cases->client_subcategory_id) as $row)
                                                <option {{ @$cases->client_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="client_group"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Client
                                            Group</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_group"
                                                id="client_group" value="{{ @$cases->client_group }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="client_profession"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Client
                                            Profession</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_profession"
                                                id="client_profession" value="{{ @$cases->client_profession }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="client_business_name"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Client
                                            Business Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_business_name"
                                                id="client_business_name" value="{{ @$cases->client_business_name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group row">
                                        <label for="client_communication" style="font-size: 10px;"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Client
                                            Communication</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_communication"
                                                id="client_communication" value="{{ @$cases->client_communication }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group row">
                                        <label for="client_email"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Email</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_email"
                                                id="client_email" value="{{ @$cases->client_email }}" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2 p-0 pt-4">
                                    <label for="client_party_name"
                                        class="col-form-label col-sm-12 font-weight-bold text-info">Client
                                        (Party) </label>
                                </div>
                                <div class="col-10">
                                    <div class="client_name">
                                        <div class="add_client">
                                         <div class="form-group row">
                                        <div class="col-sm-6">
                                               <label for="name"
                                            class="col-form-label  font-weight-bold text-info">Name</label>
                                            
                                            <input type="text" class="form-control" name="client_party_name"
                                                id="client_party_name" value="{{ @$cases->client_party_name }}" placeholder="Name">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="name"
                                            class="col-form-label  font-weight-bold text-info">Mobile</label>
                                            <input type="text" class="form-control" name="client_party_mobile"
                                                id="client_party_mobile" value="{{ @$cases->client_party_mobile }}" placeholder="Mobile">
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                            <label for="name"
                                            class="col-form-label  font-weight-bold text-info">Email</label>
                                            <input type="email" class="form-control" name="client_party_email"
                                                id="client_party_email" value="{{ @$cases->client_party_email }}" placeholder="Email">
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                            <div class="add__btn">
                                            <label for="name"
                                            class="col-form-label  font-weight-bold text-info">Address</label>
                                            <!-- <button type="button" class="btn btn-success rowclient">-->
                                            <!--    <i class="fas fa-plus"></i>-->
                                            <!--</button>-->
                                            </div>
                                             <div class="input-group">
                                                <!--<input type="text" class="form-control" name="client_party_address"-->
                                                <!--id="client_party_address total_chq" value="{{ @$cases->client_party_address }}" placeholder="Address">-->
                                                <input type="text" class="form-control" name="client_party_address"
                                                id="client_party_address" value="{{ @$cases->client_party_address }}" placeholder="Address">
                                            </div>
                                        
                                           
                                    
                                    </div>
                                </div>
                                            
                                        </div>
                                    </div>
                              </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-2 p-0">
                                    <label for="" class="col-form-label col-sm-12 font-weight-bold text-info">Client Party Others</label>
                                </div>
                                <div class="col-10">
                                    <div class="form-group">
                                        <input value="{{ @$cases->client_party_others }}" name="client_party_others" type="text" id="tags" class="form-control" data-role="tagsinput" >
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-2 p-0">
                                    <label for="" class="col-form-label col-sm-12 font-weight-bold text-info">Client Party Extra</label>
                                </div>
                                <div class="col-10">
                                    <div class="form-group">
                                        <textarea name='client_party_extra' class='form-control some_class_name' style="height: 85px;">
                                            {!! @$cases->client_party_extra !!}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="row">
                                  <div class="col-2 p-0">
                                    <label for="client_representative_party_name"
                                    class="col-form-label col-sm-12 font-weight-bold text-info">Client Representative
                                  </label>
                                </div>
                                <div class="col-10"> 
                                  <div class="form-group row">
                                    <div class="col-sm-6">
                                      <label for="name"
                                      class="col-form-label  font-weight-bold text-info">Name</label>
                                      <select {{$cases->client_category_id == 2 ? '' : 'required'}} onchange="respresentData()" class="form-control"  name="client_representative_party_name" id="client_representative_party_name" >
                                        <option value="">Select</option>
                                        @if($cases->client)
                                        @foreach($cases->client->representatives as $row)
                                        <option {{ @$cases->client_representative_party_name == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->representative_name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                            
                                    </div>
                                    
                                    
                                    <div class="col-sm-6">
                                     <label for="name"
                                     class="col-form-label  font-weight-bold text-info">Mobile</label>
                                     <input type="text" class="form-control" name="client_representative_party_mobile"id="client_representative_party_mobile" value="{{ @$cases->client_representative_party_mobile }}" placeholder="Mobile">
                                   </div>
                                   <div class="col-sm-6 mt-2">
                                     <label for="name"
                                     class="col-form-label  font-weight-bold text-info">Email</label>
                                     <input type="email" class="form-control" name="client_representative_party_email"id="client_representative_party_email" value="{{ @$cases->client_representative_party_email }}" placeholder="Email">
                                   </div>
                                   <div class="col-sm-6 mt-2">
                                     <label for="name"
                                     class="col-form-label  font-weight-bold text-info">Address</label>
                                     <input type="text" class="form-control" name="client_representative_party_address" id="client_representative_party_address" value="{{ @$cases->client_representative_party_address }}" placeholder="Address">
                                   </div>
                                 </div>
                                </div>
                                </div>
                            <div class="row">
                                <div class="col-2 p-0">
                                    <label for="client_coordinator_party_name"
                                        class="col-form-label col-sm-12 font-weight-bold text-info">Client
                                        Coordinator</label>
                                </div>
                                <div class="col-10">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label for="name"
                                            class="col-form-label  font-weight-bold text-info">Name</label>
                                            <input type="text" class="form-control" name="client_coordinator_party_name"
                                                id="client_coordinator_party_name" value="{{ @$cases->client_coordinator_party_name }}" placeholder="Name">
                                        </div>
                                        <div class="col-sm-6">
                                               <label for="name"
                                            class="col-form-label  font-weight-bold text-info">Mobile</label>
                                            <input type="text" class="form-control" name="client_coordinator_party_mobile"id="client_coordinator_party_mobile" value="{{ @$cases->client_coordinator_party_mobile }}" placeholder="Mobile">
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                               <label for="name"
                                            class="col-form-label  font-weight-bold text-info">Email</label>
                                            <input type="email" class="form-control" name="client_coordinator_party_email"id="client_coordinator_party_email" value="{{ @$cases->client_coordinator_party_email }}" placeholder="Email">
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                             <label for="name"
                                            class="col-form-label  font-weight-bold text-info">Address</label>
                                            <input type="text" class="form-control" name="client_coordinator_party_address" id="client_coordinator_party_address" value="{{ @$cases->client_coordinator_party_address }}" placeholder="Address">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row">
                                        <label for="previous_legal_dispute"
                                            class="col-form-label col-sm-2 font-weight-bold text-info">Previous
                                            Legal Dispute</label>
                                        <div class="col-sm-10">
                                            <textarea name="previous_legal_dispute" id="previous_legal_dispute" cols="30" rows="5" class="form-control">{{ @$cases->previous_legal_dispute }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row">
                                        <label for="special_party_note"
                                            class="col-form-label col-sm-2 font-weight-bold text-info">Special
                                            Note</label>
                                        <div class="col-sm-10">
                                            <textarea name="special_party_note" id="special_party_note" cols="30" rows="5" class="form-control">{{ @$cases->special_party_note }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            </div>
                        </div>
                        <div class="card shadow">
                            <div class="edit_header">
                              <h3 class="font-weight-bold py-2" style="color: black;">Opponent Info</h3>
                            
                             </div>
                            <div class="card-body pb-1">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="opponent_info_id"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Opponent
                                            (on behalf of)</label>
                                        <div class="col-sm-8">
                                            <select required name="opponent_info_id" class="form-control country" id="opponent_info_id">
                                                <option value="">Select</option>
                                                @foreach ($behalfs as $row)
                                                    <option {{ @$cases->opponent_info_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group row">
                                        <label for="opponent_division_id"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Division</label>
                                        <div class="col-sm-8">
                                            <select onchange="getOpponentDistricts();"
                                                name="opponent_division_id" class="form-control"
                                                id="opponent_division_id">
                                                <option value="">Select</option>
                                                @foreach ($divisions as $row)
                                                    <option {{ @$cases->opponent_division_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">
                                                        {{ $row->division_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group row">
                                        <label for="opponent_zone_id"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Zone</label>
                                        <div class="col-sm-8">
                                            <select onchange="getOpponentAreas();" name="opponent_zone_id"
                                                class="form-control" id="opponent_zone_id">
                                                <option value="">select</option>
                                                @foreach ($zones as $row)
                                                <option {{ @$cases->opponent_zone_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="opponent_category_id"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Opponent
                                            Category</label>
                                        <div class="col-sm-8">
                                            <select onchange="getOpponentSubCategories();"
                                                name="opponent_category_id" class="form-control"
                                                id="opponent_category_id">
                                                <option value="">Select</option>
                                                @foreach ($client_categories as $row)
                                                    <option {{ @$cases->opponent_category_id == @$row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group row">
                                        <label for="opponent_district_id"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">District</label>
                                        <div class="col-sm-8">
                                            <select onchange="getOpponentThanas();"
                                                name="opponent_district_id" class="form-control"
                                                id="opponent_district_id">
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group row">
                                        <label for="opponent_area_id"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Area</label>
                                        <div class="col-sm-8">
                                            <select onchange="getOpponentBranches();"
                                                name="opponent_area_id" class="form-control"
                                                id="opponent_area_id">
                                                <option value="">select</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="opponent_subcategory_id"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Opponent
                                            Sub-Category</label>
                                        <div class="col-sm-8">
                                            <select name="opponent_subcategory_id" class="form-control"
                                                id="opponent_subcategory_id">
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group row">
                                        <label for="opponent_thana_id"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Police
                                            Station</label>
                                        <div class="col-sm-8">
                                            <select name="opponent_thana_id"
                                                class="form-control" id="opponent_thana_id">
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group row">
                                        <label for="opponent_branch_id"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Branch</label>
                                        <div class="col-sm-8">
                                            <select name="opponent_branch_id" class="form-control"
                                                id="opponent_branch_id">
                                                <option value="">select</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="opponent_group"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Opponent
                                            Group</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="opponent_group"
                                                id="opponent_group" value="{{ @$cases->opponent_group }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="opponent_profession"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Opponent
                                            Profession</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="opponent_profession"
                                                id="opponent_profession" value="{{ @$cases->opponent_profession }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row m-0">
                                        <label for="opponent_business_name"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Opponent
                                            Business Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="opponent_business_name"
                                                id="opponent_business_name" value="{{ @$cases->opponent_business_name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group row m-0">
                                        <label for="opponent_communication" style="font-size: 10px;"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Opponent
                                            Communication</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="opponent_communication"
                                                id="opponent_communication" value="{{ @$cases->opponent_communication }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group row m-0">
                                        <label for="opponent_email"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Email</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" name="opponent_email"
                                                id="opponent_email" value="{{ @$cases->opponent_email }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2 p-0 pt-4">
                                    <label for="opponent_info_name"
                                        class="col-form-label col-sm-12 font-weight-bold text-info">Opponent (Party)</label>
                                </div>
                                <div class="col-10">
                                    <div class="oppname">
                                        <div class="add_name">
                                         <div class="form-group row">
                                        <div class="col-sm-6">
                                             <label for="name"
                                            class="col-form-label  font-weight-bold text-info">Name</label>
                                            <input required type="text" class="form-control" name="opponent_info_name"
                                                id="opponent_info_name" value="{{ @$cases->opponent_info_name }}" placeholder="Name">
                                        </div>
                                        <div class="col-sm-6">
                                             <label for="name"
                                            class="col-form-label  font-weight-bold text-info">Mobile</label>
                                            <input type="text" class="form-control" name="opponent_info_mobile"
                                                id="opponent_info_mobile" value="{{ @$cases->opponent_info_mobile }}" placeholder="Mobile">
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                             <label for="name"
                                            class="col-form-label  font-weight-bold text-info">Email</label>
                                            <input type="email" class="form-control" name="opponent_info_email"
                                                id="opponent_info_email" value="{{ @$cases->opponent_info_email }}" placeholder="Email">
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                             <div class="add__btn">
                                            <label for="name"
                                            class="col-form-label  font-weight-bold text-info">Address </label>
                                            </div>
                                             <div class="input-group">
                                               <input type="text" class="form-control" name="opponent_info_address"
                                          id="opponent_info_address" value="{{ @$cases->opponent_info_address }}" placeholder="Address">
                                            </div>
                                        </div>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-2 p-0">
                                    <label for="" class="col-form-label col-sm-12 font-weight-bold text-info">Opponent Party Others</label>
                                </div>
                                <div class="col-10">
                                    <div class="form-group">
                                        <input value="{{ @$cases->opponent_party_others }}" name="opponent_party_others" type="text" id="tags" class="form-control" data-role="tagsinput" >
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-2 p-0">
                                    <label for="" class="col-form-label col-sm-12 font-weight-bold text-info">Opponent Party Extra</label>
                                </div>
                                <div class="col-10">
                                    <div class="form-group">
                                        <textarea name='opponent_party_extra' class='form-control' style="height: 85px;">
                                            {!! @$cases->opponent_party_extra !!}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                                    
                            <div class="row">
                              <div class="col-2 p-0">
                                <label for="opponent_representative_name"
                                class="col-form-label col-sm-12 font-weight-bold text-info">Opponent
                              Representative</label>
                            </div>
                            <div class="col-10">
                              <div class="form-group row">
                                <div class="col-sm-6">
                                 <label for="name"
                                 class="col-form-label  font-weight-bold text-info">Name</label>
                                 <input type="text" class="form-control" name="opponent_representative_name"
                                 id="opponent_representative_name" value="{{ @$cases->opponent_representative_name }}" placeholder="Name">
                               </div>
                               <div class="col-sm-6">
                                 <label for="name"
                                 class="col-form-label  font-weight-bold text-info">Mobile</label>
                                 <input type="text" class="form-control" name="opponent_representative_mobile"
                                 id="opponent_representative_mobile" value="{{ @$cases->opponent_representative_mobile }}" placeholder="Mobile">
                               </div>
                               <div class="col-sm-6 mt-2">
                                 <label for="name"
                                 class="col-form-label  font-weight-bold text-info">Email</label>
                                 <input type="email" class="form-control" name="opponent_representative_email"
                                 id="opponent_representative_email" value="{{ @$cases->opponent_representative_email }}" placeholder="Email">
                               </div>
                               <div class="col-sm-6 mt-2">
                                 <label for="name"
                                 class="col-form-label  font-weight-bold text-info">Address</label>
                                 <input type="text" class="form-control" name="opponent_representative_address"
                                 id="opponent_representative_address" value="{{ @$cases->opponent_representative_address }}" placeholder="Address">
                               </div>
                             </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-2 p-0">
                                    <label for="opponent_coordinator_name"
                                        class="col-form-label col-sm-12 font-weight-bold text-info">Opponent
                                        Coordinator</label>
                                </div>
                                <div class="col-10">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                             <label for="name"
                                            class="col-form-label  font-weight-bold text-info">Name</label>
                                            <input type="text" class="form-control" name="opponent_coordinator_name"
                                                id="opponent_coordinator_name" value="{{ @$cases->opponent_coordinator_name }}" placeholder="Name">
                                        </div>
                                        <div class="col-sm-6">
                                             <label for="name"
                                            class="col-form-label  font-weight-bold text-info">Mobile</label>
                                            <input type="text" class="form-control" name="opponent_coordinator_mobile"
                                                id="opponent_coordinator_mobile" value="{{ @$cases->opponent_coordinator_mobile }}" placeholder="Mobile">
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                             <label for="name"
                                            class="col-form-label  font-weight-bold text-info">Email</label>
                                            <input type="email" class="form-control" name="opponent_coordinator_email"
                                                id="opponent_coordinator_email" value="{{ @$cases->opponent_coordinator_email }}" placeholder="Email">
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                             <label for="name"
                                            class="col-form-label  font-weight-bold text-info">Address</label>
                                            <input type="text" class="form-control" name="opponent_coordinator_address"
                                                id="opponent_coordinator_address" value="{{ @$cases->opponent_coordinator_address }}" placeholder="Address">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row">
                                        <label for="previous_legal_dispute_info"
                                            class="col-form-label col-sm-2 font-weight-bold text-info">Previous
                                            Legal Dispute</label>
                                        <div class="col-sm-10">
                                            <textarea name="previous_legal_dispute_info" id="previous_legal_dispute_info" cols="30" rows="5" class="form-control">{{ @$cases->previous_legal_dispute_info }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row">
                                        <label for="special_note_info"
                                            class="col-form-label col-sm-2 font-weight-bold text-info">Special
                                            Note</label>
                                        <div class="col-sm-10">
                                            <textarea name="special_note_info" id="special_note_info" cols="30" rows="5" class="form-control">{{ @$cases->special_note_info }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="lawyer" role="tabpanel" aria-labelledby="lawyer-tab">
                                 {{-- lawer secton --}}
                        <div class="lawyer-info-section mt-3">

                            <div class="row">
                                
                                <div class="col-6">
                                      <div class="info_card p-0">  
                                      
                                         <div class="row m-0">
                                             <div class="col-12 p-0 m-0">
                                                  <div class="edit_header mb-3">
                                                   <h3 class="font-weight-bold py-2" style="color: black;">Client Lawer
                                                    Info</h3>
                                            
                                        </div>
                                             </div>
                                          <div class="col-12">
                                                    <div class="form-group row">
                                            
                                                        <label for="client_advocate_law_firm_id"
                                                            class="col-form-label col-sm-4 font-weight-bold text-info">Advocate/Law
                                                            Firm</label>
                                                
                                                        <div class="col-sm-8">
                                                         <div class="Add_section">
                                                               <div class="attributes">
                                                                 <div class="attr">
                                                                     <div class="input-group mb-3">
                                                                        <select onchange="getLawyer();" required name="client_advocate_law_firm_id" class="form-control" id="client_advocate_law_firm_id">
                                                                        <option value="">Select</option>
                                                                        @foreach($chambers as $row)
                                                                                <option {{ @$cases->client_advocate_law_firm_id == $row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->ch_name }}</option>
                                                                                @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           <button class="btn btn-large btn-success add" type="button"><i class="fas fa-plus"></i></button>
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                          <div class="col-12">
                                        <div class="form-group row">
                                            <label for="client_lead_lawyer_id"
                                                class="col-form-label col-sm-4 font-weight-bold text-info">Lead
                                                Lawyer</label>
                                            <div class="col-sm-8">
                                                <div class="Add_section">
                                                   <div class="leadlawyer">
                                                     <div class="lead">
                                                         <div class="input-group mb-3">
                                                            <select required name="client_lead_lawyer_id" class="form-control" id="client_lead_lawyer_id">
                                                                <option value="">Select</option>
                                                                @foreach($lawyers->where('is_lawyer',1) as $row)
                                                                <option {{ @$cases->client_lead_lawyer_id == $row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->personal_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                               <button class="btn btn-large btn-success add_lead" type="button"><i class="fas fa-plus"></i></button>
                                             </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                          <div class="col-12">
                                        <div class="form-group row">
                                            <label for="client_assigned_lawyer_id"
                                                class="col-form-label col-sm-4 font-weight-bold text-info">Assigned
                                                Lawyer</label>
                                            <div class="col-sm-8">
                                               <div class="Add_section">
                                                   <div class="Assignedlawyer">
                                                     <div class="Assigned">
                                                         <div class="input-group mb-3">
                                                              <select required name="client_assigned_lawyer_id" class="form-control" id="client_assigned_lawyer_id">
                                                                <option value="">Select</option>
                                                                @foreach($lawyers->where('is_lawyer',1) as $row)
                                                                <option {{ @$cases->client_assigned_lawyer_id == $row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->personal_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                               <button class="btn btn-large btn-success add_Assigned" type="button"><i class="fas fa-plus"></i></button>
                                             </div>
                                             
                                            </div>
                                        </div>
                                    </div>
                                          <div class="col-12">
                                        <div class="form-group row">
                                            <label for="client_assigned_clerk_id"
                                                class="col-form-label col-sm-4 font-weight-bold text-info">Assigned
                                                Clerk</label>
                                            <div class="col-sm-8">
                                                <div class="Add_section">
                                                   <div class="Assignedlawyer-clerk">
                                                     <div class="Assigned-clerk">
                                                         <div class="input-group mb-3">
                                                            <select required name="client_assigned_clerk_id" class="form-control" id="client_assigned_clerk_id">
                                                                <option value="">Select</option>
                                                                @foreach($lawyers->where('is_lawyer',0) as $row)
                                                                <option {{ @$cases->client_assigned_clerk_id == $row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->personal_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                               <button class="btn btn-large btn-success add_clerk" type="button"><i class="fas fa-plus"></i></button>
                                             </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                          <div class="col-12">
                                        <div class="form-group row">
                                            <label for="client_clerk_contact_number_id"
                                                class="col-form-label col-sm-4 font-weight-bold text-info">Clerk
                                                Contact Number</label>
                                            <div class="col-sm-8">
                                                   <div class="Add_section">
                                                   <div class="contact">
                                                     <div class="contact_main">
                                                         <div class="input-group mb-3">
                                                            <select required name="client_clerk_contact_number_id" class="form-control" id="client_clerk_contact_number_id">
                                                                <option value="">Select</option>
                                                                @foreach($lawyers->where('is_lawyer',0) as $row)
                                                                <option {{ @$cases->client_clerk_contact_number_id == $row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->mobile_number_pro }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                               <button class="btn btn-large btn-success add_contact" type="button"><i class="fas fa-plus"></i></button>
                                             </div>
                                               
                                            </div>
                                        </div>
                            
                                    </div>
                                          <div class="col-12">
                                            <div class="form-group row">
                                                <label for="client_lawyer_info_note"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">Note</label>
                                                <div class="col-sm-8">
                                                    <textarea name="client_lawyer_info_note" id="client_lawyer_info_note" cols="30" rows="3" class="form-control">{{ @$cases->client_lawyer_info_note }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                  
                                 
                                      </div>
                                    </div>
                               
                                <div class="col-6">
                                    <div class="info_card p-0">
                                         <div class="row m-0">
                                                <div class="col-12 p-0 m-0">
                                             <div class="edit_header mb-3">
                                                       <h3 class="font-weight-bold py-2" style="color: black;">Opponent Lawer
                                            Info</h3>
                                            
                                        </div>
                                        </div>
                                      <div class="col-12">
                                     
                                      
                                       </div>
                                      <div class="col-12">
                                    <div class="form-group row">
                                        <label for="opponent_advocate_law_firm"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Advocate/Law
                                            Firm</label>
                                        <div class="col-sm-8">
                                            <input name="opponent_advocate_law_firm" id="opponent_advocate_law_firm" type="text" class="form-control" value="{{ @$cases->opponent_advocate_law_firm }}">
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-12">
                                    <div class="form-group row">
                                        <label for="opponent_concerned_lawyer"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Concerned
                                            Lawyer</label>
                                        <div class="col-sm-8">
                                            <input name="opponent_concerned_lawyer" id="opponent_concerned_lawyer" type="text" class="form-control" value="{{ @$cases->opponent_concerned_lawyer }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <label for="opponent_lawyer_contact_number"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Opponent
                                            Lawyer Contact Number</label>
                                        <div class="col-sm-8">
                                            <input name="opponent_lawyer_contact_number" id="opponent_lawyer_contact_number" type="text" class="form-control" value="{{ @$cases->opponent_lawyer_contact_number }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <label for="opponent_lawyer_clerk"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Opponent
                                            Lawyer Clerk</label>
                                        <div class="col-sm-8">
                                            <input name="opponent_lawyer_clerk" id="opponent_lawyer_clerk" type="text" class="form-control" value="{{ @$cases->opponent_lawyer_clerk }}">
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-12">
                                    <div class="form-group row">
                                        <label for="opponent_clerk_contact_number"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">
                                            Opponent Clerk Contact Number</label>
                                        <div class="col-sm-8">
                                            <input name="opponent_clerk_contact_number" id="opponent_clerk_contact_number" type="text" class="form-control" value="{{ @$cases->opponent_clerk_contact_number }}">
                                        </div>
                                    </div>
                                </div>
                                   <div class="col-12">
                                    <div class="form-group row">
                                        <label for="opponent_chamber_address"
                                            class="col-form-label col-sm-4 font-weight-bold text-info">Chamber
                                            Address</label>
                                        <div class="col-sm-8">
                                            <textarea name="opponent_chamber_address" id="opponent_chamber_address" cols="30" rows="3" class="form-control">{{ @$cases->opponent_chamber_address }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                    </div>
                              </div>
                                </div>
                             </div>
                      </div>
                     </div>
                      <div class="tab-pane fade" id="case" role="tabpanel" aria-labelledby="case-tab">
                              {{-- case document section --}}
                             <div class="card shadow mb-2">
                                 <div class="edit_header">
                            <h3 class="font-weight-bold py-2" style="color: black;font-size:1rem;">Document Received</h3>
                            
                             </div>
                                 <div class="card-body pb-1">
                                   <div class="ducument">
                                 <div class="add_ducument">
                                        <div class="row">
                                        <div class="col-4">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <select name="document_recived_id" class="form-control" id="document_recived_id">
                                                        <option value="">Select</option>
                                                        @foreach($case_documents as $row)
                                                            <option value={{ $row->id }}" {{ @$cases->document_recived_id == $row->id ? 'selected' : ''  }}>{{ $row->name }}</option>
                                                        @endforeach
                                                        
                                                        <!--<option value="8">Charge Form</option>-->
                                                        <!--<option value="7">Charge Sheet</option>-->
                                                        <!--<option value="16">Cheque</option>-->
                                                        <!--<option value="15">Cheque Dishonour</option>-->
                                                        <!--<option value="5">Complaint</option>-->
                                                        <!--<option value="9">Investigation Report</option>-->
                                                        <!--<option value="14">Legal Notice (Served)</option>-->
                                                        <!--<option value="10">Legal Notice by 1st Party</option>-->
                                                        <!--<option value="11">Legal Notice by 2nd Party</option>-->
                                                        <!--<option value="12">Letter by 1st Party</option>-->
                                                        <!--<option value="13">Letter by 2nd Party</option>-->
                                                        <!--<option value="3">Petition</option>-->
                                                        <!--<option value="4">Plaint</option>-->
                                                        <!--<option value="6">Written Statement</option>-->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input name="document_recived_type" type="text" class="form-control"
                                                    placeholder="Type" value="{{ @$cases->document_recived_type }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input name="document_recived_date" type="date" class="form-control dateandtimepicker" value="{{ @$cases->document_recived_date }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group row">
                                                <div class="col-sm-8">
                                                    <select name="document_recived_type_id" class="form-control" id="document_recived_type_id">
                                                        <option value="">Select</option>
                                                        @foreach($case_document_types as $row)
                                                            <option value={{ $row->id }}" {{ @$cases->document_recived_type_id == $row->id ? 'selected' : ''  }}>{{ $row->name }}</option>
                                                        @endforeach
                                                        <!--<option {{ @$cases->document_recived_type_id == '2' ? 'selected' : ''  }} value="2">CC</option>-->
                                                        <!--<option {{ @$cases->document_recived_type_id == '3' ? 'selected' : ''  }} value="3">COPY</option>-->
                                                        <!--<option {{ @$cases->document_recived_type_id == '1' ? 'selected' : ''  }} value="1">ORG</option>-->
                                                    </select>
                                                </div>
                                                   <button class="btn btn-large btn-success add_row" type="button"><i class="fas fa-plus"></i></button>
                                            </div>
                                       
                                        </div>
                                       
                                    </div> 
                                </div>
                               </div>
                    
                                  </div>
                              </div>
                               <div class="card shadow mb-2">
                                    <div class="edit_header">
                                                <h3 class="font-weight-bold py-2" style="color: black;font-size:1rem;">Document Required</h3>
                                            </div>
                                   <div class="card-body pb-1">
                                          
                                  <div class="requed_duc">
                                        <div class="add_requed">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <select name="document_required_id" class="form-control" id="document_required_id">
                                                                <option value="">Select</option>
                                                                
                                                                @foreach($case_documents as $row)
                                                                    <option value={{ $row->id }}" {{ @$cases->document_required_id == $row->id ? 'selected' : ''  }}>{{ $row->name }}</option>
                                                                @endforeach
                                                                <!--<option value="8">Charge Form</option>-->
                                                                <!--<option value="7">Charge Sheet</option>-->
                                                                <!--<option value="16">Cheque</option>-->
                                                                <!--<option value="15">Cheque Dishonour</option>-->
                                                                <!--<option value="5">Complaint</option>-->
                                                                <!--<option value="9">Investigation Report</option>-->
                                                                <!--<option value="14">Legal Notice (Served)</option>-->
                                                                <!--<option value="10">Legal Notice by 1st Party</option>-->
                                                                <!--<option value="11">Legal Notice by 2nd Party</option>-->
                                                                <!--<option value="12">Letter by 1st Party</option>-->
                                                                <!--<option value="13">Letter by 2nd Party</option>-->
                                                                <!--<option value="3">Petition</option>-->
                                                                <!--<option value="4">Plaint</option>-->
                                                                <!--<option value="6">Written Statement</option>-->
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input name="document_required_type" type="text" class="form-control" value="{{ @$cases->document_required_type }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input name="document_required_date" type="date" class="form-control dateandtimepicker" value="{{ @$cases->document_required_date }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group row">
                                                        <div class="col-sm-8">
                                                            <select name="document_required_type_id" class="form-control" id="document_required_type_id">
                                                                <option value="">Select</option>
                                                                @foreach($case_document_types as $row)
                                                                    <option value={{ $row->id }}" {{ @$cases->document_required_type_id == $row->id ? 'selected' : ''  }}>{{ $row->name }}</option>
                                                                @endforeach
                                                                <!--<option {{ @$cases->document_required_type_id == '2' ? 'selected' : ''  }} value="2">CC</option>-->
                                                                <!--<option {{ @$cases->document_required_type_id == '3' ? 'selected' : ''  }} value="3">COPY</option>-->
                                                                <!--<option {{ @$cases->document_required_type_id == '1' ? 'selected' : ''  }} value="1">ORG</option>-->
                                                            </select>
                                                        </div>
                                                         <button class="btn btn-large btn-success add_col" type="button"><i class="fas fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                   </div>
                                </div>
                            
                             <div class="card shadow mb-2">
                                           <div class="edit_header">
                                                <h3 class="font-weight-bold py-2" style="color: black;font-size:1rem;">Case File Managment</h3>
                                            </div>
                               <div class="card-body pb-1">
                                    <div class="manage_duc">
                                        <div class="add_manage">
                                          <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="case_file_name_id" class="font-weight-bold text-info">Doc/ File
                                                    Name</label>
                                                <select name="case_file_name_id" id="case_file_name_id" class="form-control">
                                                    <option value="">Select</option>
                                                    
                                                    @foreach($case_documents as $row)
                                                        <option value={{ $row->id }}" {{ @$cases->case_file_name_id == $row->id ? 'selected' : ''  }}>{{ $row->name }}</option>
                                                    @endforeach
                                                                
                                                    <!--<option value="8">Charge Form</option>-->
                                                    <!--<option value="7">Charge Sheet</option>-->
                                                    <!--<option value="16">Cheque</option>-->
                                                    <!--<option value="15">Cheque Dishonour</option>-->
                                                    <!--<option value="5">Complaint</option>-->
                                                    <!--<option value="9">Investigation Report</option>-->
                                                    <!--<option value="14">Legal Notice (Served)</option>-->
                                                    <!--<option value="10">Legal Notice by 1st Party</option>-->
                                                    <!--<option value="11">Legal Notice by 2nd Party</option>-->
                                                    <!--<option value="12">Letter by 1st Party</option>-->
                                                    <!--<option value="13">Letter by 2nd Party</option>-->
                                                    <!--<option value="3">Petition</option>-->
                                                    <!--<option value="4">Plaint</option>-->
                                                    <!--<option value="6">Written Statement</option>-->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="case_file_from"
                                                    class="font-weight-bold text-info">From</label>
                                                <input name="case_file_from" id="case_file_from" class="form-control" type="text"
                                                placeholder="Type" value="{{ @$cases->case_file_from }}">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="case_file_to" class="font-weight-bold text-info">To</label>
                                                <input name="case_file_to" id="case_file_to" class="form-control" type="text"
                                                placeholder="Type" value="{{ @$cases->case_file_to }}">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="case_file_date"
                                                    class="font-weight-bold text-info">Date</label>
                                                <input name="case_file_date" id="case_file_date" class="form-control dateandtimepicker"
                                                    type="date" value="{{ @$cases->case_file_date }}">
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="form-group">
                                                <label for="case_file_archive"
                                                    class="font-weight-bold text-info">Archive</label>
                                                <input name="case_file_archive" id="case_file_archive" class="form-control" type="text" value="{{ @$cases->case_file_archive }}">
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="form-group">
                                                <label for="case_file_cabinate"
                                                    class="font-weight-bold text-info">Cabinate</label>
                                                <input name="case_file_cabinate" id="case_file_cabinate" class="form-control" type="text" placeholder="Type" value="{{ @$cases->case_file_cabinate }}">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group row">
                                                <div class="col-sm-8">
                                                <label for="case_file_note"
                                                    class="font-weight-bold text-info">Note</label>
                                                <input name="case_file_note" id="case_file_note" class="form-control" type="text" placeholder="Type" value="{{ @$cases->case_file_note }}">
                                            
                                                </div>
                                              
                                               <button class="btn btn-large btn-success add_btn" type="button" style="height: 40px;margin-top: 30px;"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="card mb-2">
                                    <div class="edit_header">
                                                <h3 class="font-weight-bold py-2" style="color: black;font-size:1rem;">Document Upload</h3>
                                            </div>
                            <div class="card-body pb-1 ">
                            <div class="upload_duc">
                               <div class="add_upload">
                                  <div class="row">
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="documents_file"
                                            class="font-weight-bold text-info">File</label>
                                        <input type="file" name="documents_file" id="documents_file"
                                            class="form-control" style="padding: 3px;" value="{{ @$cases->documents_file }}">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="documents_doc_date" class="font-weight-bold text-info">Doc
                                            Date</label>
                                        <input name="documents_doc_date" id="documents_doc_date" class="form-control dateandtimepicker" type="date" value="{{ @$cases->documents_doc_date }}">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="documents_type_id"
                                            class="font-weight-bold text-info">Type</label>
                                        <select name="documents_type_id" class="form-control" id="documents_type_id">
                                            <option value="">Select</option>
                                            
                                            @foreach($case_document_types as $row)
                                                <option value={{ $row->id }}" {{ @$cases->documents_type_id == $row->id ? 'selected' : ''  }}>{{ $row->name }}</option>
                                            @endforeach
                                            <!--<option {{ @$cases->documents_type_id == '2' ? 'selected' : ''  }} value="2">CC</option>-->
                                            <!--<option {{ @$cases->documents_type_id == '3' ? 'selected' : ''  }} value="3">COPY</option>-->
                                            <!--<option {{ @$cases->documents_type_id == '1' ? 'selected' : ''  }} value="1">ORG</option>-->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="documents_uploaded_by" class="font-weight-bold text-info">Uploaded
                                            By</label>
                                        <input name="documents_uploaded_by" class="form-control"  type="text" value="{{ @$cases->documents_uploaded_by }}" readonly>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="documents_date_time" class="font-weight-bold text-info">Date &
                                            Time</label>
                                        <input name="documents_date_time" id="documents_date_time" class="form-control dateandtimepicker" type="date" value="{{ @$cases->documents_date_time }}">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group row">
                                        <div class="col-sm-8">
                                        <label for="documents_action_id"
                                            class="font-weight-bold text-info">Action</label>
                                        <select name="documents_action_id" class="form-control" id="documents_action_id">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                     <button class="btn btn-large btn-success add_uprow" type="button" style="height: 40px;margin-top: 30px;"><i class="fas fa-plus"></i></button>
                                   
                                    </div>
                                    
                                </div>
                            </div>
                                         
                                </div>
                            </div>
                         </div>
                      
                        </div>
                         </div>
                      </div>
                    </div>


                    <div class="form-navigation mt-3">
                        <div style="overflow:auto;">
                            <div style="float:right; margin-top: 5px;">
                                  <button type="button" class="previous">Previous</button>
                                  <button type="button" class="next">Next</button>
                                <button type="button" class="submit">Update</button>
                            </div>
                          </div>
                    </div>
                </div>
              </form>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
 
<script>
    new MultiSelectTag('section_id')
    new MultiSelectTag('new_section_id')
</script>

  <script>
      $(document).ready(function(){
        $('textarea').each(function() {
            $(this).val($(this).val().trim());
        });
    });
  </script>
  
<script>
    // datetimepicker

    $(".dateandtimepicker").datetimepicker({
        format: 'Y-m-d H:i:s',
        formatTime: 'H:i:s',
        formatDate: 'Y-m-d',
        step: 5,
        minDate: 0,
        minTime: 0
    })

    // ajax
    
    function getCaseCategory() {
        var case_class = $('#case_class_id').val();
        var case_category = $('#case_category_id');
        if (case_class) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.categories') }}",
                data: {
                    case_class: case_class,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    case_category.find('option').not(':first').remove();
                    $.each(result, function(key, value) {
                        case_category.append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        }
    }
    
     function getTypes() {
            var case_category_id = $('#case_category_id').val();
            var case_type_id = $('#case_type_id');
            if (case_category_id) {
                $.ajax({
                    method: 'post',
                    url: "{{ route('case.types') }}",
                    data: {
                        case_category_id: case_category_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(result) {
                        case_type_id.find('option').not(':first').remove();
                        $.each(result.types, function(key, value) {
                            case_type_id.append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            }else{
                case_type_id.find('option').not(':first').remove();
            }
        }


    function getClientSubCategories() {
        var category_id = $('#client_category_id').val();
        var subcategory = $('#client_subcategory_id');
        var client = $('#client_id');
        if(category_id == 2){
            $('#client_representative_party_name').attr('required',false);
        }else{
            $('#client_representative_party_name').attr('required',true);
        }
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
        }else{
            subcategory.find('option').not(':first').remove();
            client.find('option').not(':first').remove();
        }
    }
    function getClients() {
        var subcategory = $('#client_subcategory_id').val();
        var client = $('#client_id');
        if (subcategory) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.client.client') }}",
                data: {
                    subcategory_id: subcategory,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    client.find('option').not(':first').remove();
                    $.each(result, function(key, value) {
                        client.append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        }else{
            client.find('option').not(':first').remove();
        }
    }
    function clientData() {
        var client = $('#client_id').val();
        var represent = $('#client_representative_party_name');
        if (client) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.client.single') }}",
                data: {
                    id: client,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    if(result){
                        $('#client_group').val(result.client_group);
                        $('#client_party_name').val(result.name);
                        $('#client_party_mobile').val(result.mobile);
                        $('#client_party_email').val(result.email);
                        $('#client_party_address').val(result.address);
                        $('#client_coordinator_party_name').val(result.coordinator_tadbirkar);
                        $('#client_coordinator_party_address').val(result.coordinator_details);
                        
                        represent.find('option').not(':first').remove();
                        $.each(result.representatives, function(key, value) {
                            represent.append('<option value="' + value
                                .id + '">' + value.representative_name + '</option>');
                        });
                        
                    }else{
                        client.find('option').not(':first').remove();
                    }
                }
                
            });
        }
    }
    function respresentData() {
        var representData = $('#client_representative_party_name').val();
        if (representData) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.representdata.single') }}",
                data: {
                    id: representData,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    if(result){
                        $('#client_representative_party_mobile').val(result.representative_mobile);
                        $('#client_representative_party_email').val(result.representative_email);
                        $('#client_representative_party_address').val(result.representative_address);
                        
                    }
                }
                
            });
        }
    }

    function getOpponentSubCategories() {
        var category_id = $('#opponent_category_id').val();
        var subcategory = $('#opponent_subcategory_id');
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

    function getClientDistricts() {
        var division_id = $('#client_division_id').val();
        var district = $('#client_district_id');
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

    function getOpponentDistricts() {
        var division_id = $('#opponent_division_id').val();
        var district = $('#opponent_district_id');
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

    function getClientThanas() {
        var district_id = $('#client_district_id').val();
        var thana = $('#client_thana_id');
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

    function getOpponentThanas() {
        var district_id = $('#opponent_district_id').val();
        var thana = $('#opponent_thana_id');
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

    function getZones() {
        var thana_id = $('#client_thana_id').val();
        var zone = $('#client_zone_id');
        if (thana_id) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.zones') }}",
                data: {
                    thana_id: thana_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    zone.find('option').not(':first').remove();
                    $.each(result, function(key, value) {
                        zone.append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        }
    }

    function getOpponentZones() {
        var thana_id = $('#opponent_thana_id').val();
        var zone = $('#opponent_zone_id');
        if (thana_id) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.zones') }}",
                data: {
                    thana_id: thana_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    zone.find('option').not(':first').remove();
                    $.each(result, function(key, value) {
                        zone.append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        }
    }

    function getAreas() {
        var zone_id = $('#client_zone_id').val();
        var area = $('#client_area_id');
        if (zone_id) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.areas') }}",
                data: {
                    zone_id: zone_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    area.find('option').not(':first').remove();
                    $.each(result, function(key, value) {
                        area.append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        }
    }

    function getOpponentAreas() {
        var zone_id = $('#opponent_zone_id').val();
        var area = $('#opponent_area_id');
        if (zone_id) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.areas') }}",
                data: {
                    zone_id: zone_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    area.find('option').not(':first').remove();
                    $.each(result, function(key, value) {
                        area.append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        }
    }

    function getBranches() {
        var area_id = $('#client_area_id').val();
        var branch = $('#client_branch_id');
        if (area_id) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.branches') }}",
                data: {
                    area_id: area_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    branch.find('option').not(':first').remove();
                    $.each(result, function(key, value) {
                        branch.append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        }
    }

    function getOpponentBranches() {
        var area_id = $('#opponent_area_id').val();
        var branch = $('#opponent_branch_id');
        if (area_id) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.branches') }}",
                data: {
                    area_id: area_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    branch.find('option').not(':first').remove();
                    $.each(result, function(key, value) {
                        branch.append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        }
    }

    function getDistricts() {
        var division_id = $('#case_infos_division_id').val();
        var district = $('#case_infos_district_id');
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
        var district_id = $('#case_infos_district_id').val();
        var case_class = $('#case_class_id').val();
            var case_category_id = $('#case_category_id').val();
        var thana = $('#police_station_id');
        var court = $('#court_id');
        if (district_id) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.thanas') }}",
                data: {
                    district_id: district_id,
                    case_class: case_class,
                        case_category_id: case_category_id,
                        case_create: 1,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    thana.find('option').not(':first').remove();
                    $.each(result.thanas, function(key, value) {
                        thana.append('<option value="' + value
                            .id + '">' + value.thana_name + '</option>');
                    });
                    court.find('option').not(':first').remove();
                        $.each(result.courts, function(key, value) {
                            court.append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                }
            });
        }
    }
function getLawyer() {
            var chamber_id = $('#client_advocate_law_firm_id').val();
            var lawyer = $('#client_lead_lawyer_id');
            var nonlawyer = $('#client_assigned_clerk_id');
            var lawyerassigned = $('#client_assigned_lawyer_id');
            var contact = $('#client_clerk_contact_number_id');
            if (chamber_id) {
                $.ajax({
                    method: 'post',
                    url: "{{ route('case.lawyar') }}",
                    data: {
                        chamber_id: chamber_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(result) {

                        lawyer.find('option').not(':first').remove();
                        $.each(result.lawyer, function(key, value) {
                            lawyer.append('<option value="' + value
                                .id + '">' + value.personal_name + '</option>');
                        });
                        
                        lawyerassigned.find('option').not(':first').remove();
                        $.each(result.lawyer, function(key, value) {
                            lawyerassigned.append('<option value="' + value
                                .id + '">' + value.personal_name + '</option>');
                        });
                        
                        nonlawyer.find('option').not(':first').remove();
                        $.each(result.nonlawyer, function(key, value) {
                            nonlawyer.append('<option value="' + value
                                .id + '">' + value.personal_name + '</option>');
                        });
                        contact.find('option').remove();
                        contact.append('<option value="' + result
                                .clerk_phone.id + '">' + result.clerk_phone.mobile_number_pro + '</option>');
                    }
                });
            }
        }
        
        function getContact() {
            var clerk_id = $('#client_assigned_clerk_id').val();
            var contact = $('#client_clerk_contact_number_id');
            if (clerk_id) {
                $.ajax({
                    method: 'post',
                    url: "{{ route('case.contact') }}",
                    data: {
                        clerk_id: clerk_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(result) {

                        contact.find('option').remove();
                        contact.append('<option value="' + result
                                .id + '">' + result.mobile_number_pro + '</option>');

                    }
                });
            }
        }

</script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        // $.validator.addMethod('date', function(value, element, param) {
        //     return (value != 0) && (value <= 31) && (value == parseInt(value, 10));
        // }, 'Please enter a valid date!');
        // $.validator.addMethod('month', function(value, element, param) {
        //     return (value != 0) && (value <= 12) && (value == parseInt(value, 10));
        // }, 'Please enter a valid month!');
        // $.validator.addMethod('year', function(value, element, param) {
        //     return (value != 0) && (value >= 1900) && (value == parseInt(value, 10));
        // }, 'Please enter a valid year not less than 1900!');
        $.validator.addMethod('username', function(value, element, param) {
            var nameRegex = /^[a-zA-Z0-9]+$/;
            return value.match(nameRegex);
        }, 'Only a-z, A-Z, 0-9 characters are allowed');

        var val =   {
            // Specify validation rules
            rules: {
              fname: "required",
              email: {
                        required: true,
                        email: true
                      },
                phone: {
                    required:true,
                    minlength:10,
                    maxlength:10,
                    digits:true
                },
                // date:{
                //     date:true,
                //     required:true,
                //     minlength:2,
                //     maxlength:2,
                //     digits:true
                // },
                // month:{
                //     month:true,
                //     required:true,
                //     minlength:2,
                //     maxlength:2,
                //     digits:true
                // },
                // year:{
                //     year:true,
                //     required:true,
                //     minlength:4,
                //     maxlength:4,
                //     digits:true
                // },
                username:{
                    username:true,
                    required:true,
                    minlength:4,
                    maxlength:16,
                },
                password:{
                    required:true,
                    minlength:8,
                    maxlength:16,
                }
            },
            // Specify validation error messages
            messages: {
                fname:      "First name is required",
                email: {
                    required:   "Email is required",
                    email:      "Please enter a valid e-mail",
                },
                phone:{
                    required:   "Phone number is requied",
                    minlength:  "Please enter 10 digit mobile number",
                    maxlength:  "Please enter 10 digit mobile number",
                    digits:     "Only numbers are allowed in this field"
                },
                date:{
                    required:   "Date is required",
                    minlength:  "Date should be a 2 digit number, e.i., 01 or 20",
                    maxlength:  "Date should be a 2 digit number, e.i., 01 or 20",
                    digits:     "Date should be a number"
                },
                month:{
                    required:   "Month is required",
                    minlength:  "Month should be a 2 digit number, e.i., 01 or 12",
                    maxlength:  "Month should be a 2 digit number, e.i., 01 or 12",
                    digits:     "Only numbers are allowed in this field"
                },
                year:{
                    required:   "Year is required",
                    minlength:  "Year should be a 4 digit number, e.i., 2018 or 1990",
                    maxlength:  "Year should be a 4 digit number, e.i., 2018 or 1990",
                    digits:     "Only numbers are allowed in this field"
                },
                username:{
                    required:   "Username is required",
                    minlength:  "Username should be minimum 4 characters",
                    maxlength:  "Username should be maximum 16 characters",
                },
                password:{
                    required:   "Password is required",
                    minlength:  "Password should be minimum 8 characters",
                    maxlength:  "Password should be maximum 16 characters",
                }
            }
        }
        $("#myForm").multiStepForm(
        {
            // defaultStep:0,
            beforeSubmit : function(form, submit){
                console.log("called before submiting the form");
                console.log(form);
                console.log(submit);
            },
            validations:val,
        }
        ).navigateTo(0);
    });
</script>

        <script>
       
            $("#home-tab").addClass("Tabs_active");
        </script>
 <script>
     /* Variables */
        var row = $(".attr");
        
        function addRow() {
            var html = '<div class="attr"><div class="input-group mb-3"><div class="input-group-prepend"><button onclick="removeRow(this);" class="btn btn-danger" type="button"><i class="fas fa-trash-alt"></i> </button></div><select required name="client_advocate_law_firm_id" class="form-control" id="client_advocate_law_firm_id"><option value="">Select</option>@foreach($advocates as $row)<option {{ @$cases->client_advocate_law_firm_id == $row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->personal_name }}</option>@endforeach</select></div></div>';
            $('.attributes').append(html);
        //   row.clone(true, true).appendTo(".attributes");
        }
        
        function removeRow(button) {
          button.closest("div.attr").remove();
        }
        
        $('#attributes .attr:first-child').find('.remove').hide();
        
        /* Doc ready */
        $(".add").on('click', function () {
          addRow();  
     
        });
        $(".remove").on('click', function () {
            removeRow($(this));
    
        });

</script>
<script>
     /* Variables */
        var row = $(".lead");
        
        function add() {
            var html = '<div class="lead "><div class="input-group mb-3"><div class="input-group-prepend"><button onclick="remove(this);" class="btn btn-danger" type="button"><i class="fas fa-trash-alt"></i> </button></div><select required name="client_lead_lawyer_id" class="form-control" id="client_lead_lawyer_id"><option value="">Select</option>@foreach($advocates as $row)<option {{ @$cases->client_lead_lawyer_id == $row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->personal_name }}</option>@endforeach</select></div></div>';
            $('.leadlawyer').append(html);
        //   row.clone(true, true).appendTo(".leadlawyer");
        }
        
        function remove(button) {
          button.closest("div.lead").remove();
        }
                
        $('#leadlawyer .lead:first-child').find('.remove').hide();
        /* Doc ready */
        $(".add_lead").on('click', function () {
          add();  
     
        });
        $(".remove").on('click', function () {
           remove($(this));
        });
</script>
<script>
      /* Variables */
         var row = $(".Assigned");
         
         function add_ass() {
             var html = '<div class="Assigned item"><div class="input-group mb-3"><div class="input-group-prepend"><button id="Deleterow" class="btn btn-danger close-div" type="button"><i class="fas fa-trash-alt"></i> </button></div><select required name="client_lead_lawyer_id" class="form-control" id="client_lead_lawyer_id"><option value="">Select</option>@foreach($advocates as $row)<option {{ @$cases->client_lead_lawyer_id == $row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->personal_name }}</option>@endforeach</select></div></div>';
             $('.Assignedlawyer').append(html);
         //   row.clone(true, true).appendTo(".Assignedlawyer");
         }

         $('#Assignedlawyer .Assigned:first-child').find('.remove').hide();
         /* Doc ready */
         $(".add_Assigned").on('click', function () {
           add_ass();  
      
         });
         $("body").on("click", "#Deleterow", function () {
                $(this).parents(".item").remove();
            })
 </script>
 <script>
  /* Variables */
     var row = $(".Assigned-clerk");
     
     function add_clerk() {
         var html = '<div class="Assigned-clerk "><div class="input-group mb-3"><div class="input-group-prepend"><button id="Deletediv" class="btn btn-danger " type="button"><i class="fas fa-trash-alt"></i> </button></div><select required name="client_assigned_clerk_id" class="form-control" id="client_assigned_clerk_id"><option value="">Select</option>@foreach($clerks as $row)<option {{ @$cases->client_assigned_clerk_id == $row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->personal_name }}</option>@endforeach</select></div></div>';
         $('.Assignedlawyer-clerk').append(html);
     //   row.clone(true, true).appendTo(".Assignedlawyer-clerk");
     }
     
     /* Doc ready */
     $(".add_clerk").on('click', function () {
       add_clerk();  
  
     });
         $("body").on("click", "#Deletediv", function () {
                $(this).parents(".Assigned-clerk").remove();
            })   
 </script>
 <script>
  /* Variables */
     var row = $(".contact");
     
     function add_contact() {
         var html = '<div class="contact_mai "><div class="input-group mb-3"><div class="input-group-prepend"><button id="Deletecon" class="btn btn-danger " type="button"><i class="fas fa-trash-alt"></i> </button></div><select required name="client_clerk_contact_number_id" class="form-control" id="client_clerk_contact_number_id"><option value="">Select</option> @foreach($clerks as $row)<option {{ @$cases->client_clerk_contact_number_id == $row->id ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->mobile_number }}</option>@endforeach</select></div></div>';
         $('.contact_main').append(html);
     //   row.clone(true, true).appendTo(".contact_main");
     }
     
     /* Doc ready */
     $(".add_contact").on('click', function () {
       add_contact();  
  
     });
         $("body").on("click", "#Deletecon", function () {
                $(this).parents(".contact_mai").remove();
            })   
 </script>
 <script>
  /* Variables */
     var row = $(".ducument");
     
     function add_ducument() {
         var html = '<div class="add_duc"> <div class="row"> <div class="col-4"> <div class="form-group row"> <div class="col-sm-12"> <select name="document_recived_id[]" class="form-control"> <option value="">Select</option> <option value="8">Charge Form</option> <option value="7">Charge Sheet</option> <option value="16">Cheque</option> <option value="15">Cheque Dishonour</option> <option value="5">Complaint</option> <option value="9">Investigation Report</option> <option value="14">Legal Notice (Served)</option> <option value="10">Legal Notice by 1st Party</option> <option value="11">Legal Notice by 2nd Party</option> <option value="12">Letter by 1st Party</option> <option value="13">Letter by 2nd Party</option> <option value="3">Petition</option> <option value="4">Plaint</option> <option value="6">Written Statement</option> </select> </div> </div> </div> <div class="col-4"> <div class="form-group row"> <div class="col-sm-12"> <input name="document_recived_type[]" type="text" class="form-control"placeholder="Type" value="" > </div> </div> </div> <div class="col-2"> <div class="form-group row"> <div class="col-sm-12"> <input name="document_recived_date" type="date" class="form-control dateandtimepicker"> </div> </div> </div> <div class="col-2"> <div class="form-group row"> <div class="col-sm-8"> <select name="document_recived_type_id" class="form-control" id="document_recived_type_id"> <option value="">Select</option> <option value="2">CC</option> <option value="3">COPY</option> <option value="1">ORG</option> </select> </div><button id="Deleteduc" class="btn btn-danger " type="button"><i class="fas fa-trash-alt"></i> </button> </div> </div> </div> </div>';
         $('.add_ducument').append(html);
     //   row.clone(true, true).appendTo(".add_ducument");
     }
     
     /* Doc ready */
     $(".add_row").on('click', function () {
       add_ducument();  
  
     });
         $("body").on("click", "#Deleteduc", function () {
                $(this).parents(".add_duc").remove();
            })   
 </script>
 <script>
  /* Variables */
     var row = $(".requed_duc");
     
     function add_requed() {
         var html = '<div class="add_reque"> <div class="row"> <div class="col-4"> <div class="form-group row"> <div class="col-sm-12"> <select name="document_required_id[]" class="form-control" id="document_required_id"> <option value="">Select</option> <option value="8">Charge Form</option> <option value="7">Charge Sheet</option> <option value="16">Cheque</option> <option value="15">Cheque Dishonour</option> <option value="5">Complaint</option> <option value="9">Investigation Report</option> <option value="14">Legal Notice (Served)</option> <option value="10">Legal Notice by 1st Party</option> <option value="11">Legal Notice by 2nd Party</option> <option value="12">Letter by 1st Party</option> <option value="13">Letter by 2nd Party</option> <option value="3">Petition</option> <option value="4">Plaint</option> <option value="6">Written Statement</option> </select> </div> </div> </div> <div class="col-4"> <div class="form-group row"> <div class="col-sm-12"> <input name="document_required_type" type="text" class="form-control" value=""> </div> </div> </div> <div class="col-2"> <div class="form-group row"> <div class="col-sm-12"> <input name="document_required_date" type="date" class="form-control dateandtimepicker" value=""> </div> </div> </div> <div class="col-2"> <div class="form-group row"> <div class="col-sm-8"> <select name="document_required_type_id" class="form-control" id="document_required_type_id"> <option value="">Select</option> <option value="2">CC</option> <option value="3">COPY</option> <option value="1">ORG</option> </select> </div> <button id="Deletereq" class="btn btn-danger " type="button"><i class="fas fa-trash-alt"></i> </button>  </div> </div> </div> </div>';
         $('.add_requed').append(html);
     //   row.clone(true, true).appendTo(".add_requed");
     }
     
     /* Doc ready */
     $(".add_col").on('click', function () {
       add_requed();  
  
     });
         $("body").on("click", "#Deletereq", function () {
                $(this).parents(".add_reque").remove();
            })   
 </script>
 <script>
  /* Variables */
     var row = $(".manage_duc");
     
     function add_manage() {
         var html = '<div class="row manage"> <div class="col-2"> <div class="form-group"><select name="case_file_name_id[]" id="case_file_name_id" class="form-control"> <option value="">Select</option> <option value="8">Charge Form</option> <option value="7">Charge Sheet</option> <option value="16">Cheque</option> <option value="15">Cheque Dishonour</option> <option value="5">Complaint</option> <option value="9">Investigation Report</option> <option value="14">Legal Notice (Served)</option> <option value="10">Legal Notice by 1st Party</option> <option value="11">Legal Notice by 2nd Party</option> <option value="12">Letter by 1st Party</option> <option value="13">Letter by 2nd Party</option> <option value="3">Petition</option> <option value="4">Plaint</option> <option value="6">Written Statement</option> </select> </div> </div> <div class="col-2"> <div class="form-group"><input name="case_file_from" id="case_file_from" class="form-control" type="text"placeholder="Type" value=""> </div> </div> <div class="col-2"> <div class="form-group"> <input name="case_file_to" id="case_file_to" class="form-control" type="text"placeholder="Type" value=""> </div> </div> <div class="col-2"> <div class="form-group"><input name="case_file_date" id="case_file_date" class="form-control dateandtimepicker"type="date" value=""> </div> </div> <div class="col-1"> <div class="form-group"><input name="case_file_archive" id="case_file_archive" class="form-control" type="text" value=""> </div> </div> <div class="col-1"> <div class="form-group"> <input name="case_file_cabinate" id="case_file_cabinate" class="form-control" type="text" placeholder="Type" value=""> </div> </div> <div class="col-2"> <div class="form-group row"> <div class="col-sm-8"> <input name="case_file_note" id="case_file_note" class="form-control" type="text" placeholder="Type" value=""> </div><button id="Deletemanage" class="btn btn-danger " type="button" ><i class="fas fa-trash-alt"></i> </button> </div> </div> </div>';
         $('.add_manage').append(html);
     //   row.clone(true, true).appendTo(".add_manage");
     }
     
     /* Doc ready */
     $(".add_btn").on('click', function () {
       add_manage();  
  
     });
         $("body").on("click", "#Deletemanage", function () {
                $(this).parents(".manage").remove();
            })   
 </script>
 <script>
  /* Variables */
     var row = $(".manage_consequence");
     
     function add_manage_c() {
         var html = `<div class="mt-3 manage_con">
    <div class="">
      <div class="row">
        <div class="col-6">
          <div class="form-group row"> <label for="new_case_infos_case_title_id"
              class="col-form-label font-weight-bold text-info col-md-4">Case Title (Full)</label>
            <div class="col-md-8"> 
              <select required name="new_case_infos_case_title_id" class="form-control select2"
                id="new_case_infos_case_title_id">
                <option selected disabled hidden>Select</option>
                 @foreach ($case_titles as $row) 
                <option value="{{ $row->id }}">{{ $row->name }}</option> 
                @endforeach
              </select> 
            </div>
          </div>

          <div class="form-group row"> <label for="new_law_id"
              class="col-form-label font-weight-bold text-info col-md-4">Law</label>
            <div class="col-md-8"> 
              <select name="new_law_id" class="form-control">
                <option selected disabled hidden>Select</option>
                @foreach ($case_laws as $row)
                 <option value="{{ $row->id }}">{{ $row->name }} </option> 
                  @endforeach
              </select> 
            </div>
          </div>
          <div class="form-group row">
            <label for="new_section_id" class="col-form-label font-weight-bold text-info col-md-4">Section</label>
            <div class="col-md-8">
              <select name="new_section_id" class="form-control" id="new_section_id">
              <option selected disabled hidden>Select</option>
                @foreach ($case_sections as $row)
                <option value="{{ $row->id }}">{{ $row->name }}
                </option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="col-6">

          <div class="form-group row"> <label for="new_case_infos_case_no"
              class="col-form-label font-weight-bold text-info col-md-4">Case No</label>
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-6"> <input required type="number" class="form-control" name="new_case_infos_case_no"
                    value="" placeholder="Case No"> </div>
                <div class="col-md-6"> <input required type="number" class="form-control" name="new_case_infos_case_year"
                    value="" placeholder="Case Year"> </div>
              </div>
            </div>
          </div>

          <div class="form-group row"> <label for="new_case_filing_date"
              class="col-form-label font-weight-bold text-info col-md-4">Case Filing Date</label>
            <div class="col-md-8"> <input required type="date" id="new_case_filing_date" class="form-control"
                name="new_case_filing_date" value=""> </div>
          </div>

          <div class="form-group row"> <label for="new_court_id"
              class="col-form-label font-weight-bold text-info col-md-4">Court</label>
            <div class="col-md-8"> 
              <select name="new_court_id" class="form-control select2" id="new_court_id">
                <option selected disabled hidden>Select</option>
                 @foreach ($case_courts as $row) 
                 <option value="{{ $row->id }}">{{ $row->name }} </option>
                @endforeach
              </select>
             </div>
          </div>
          <button id="Deletemanagec" class="btn btn-danger float-lg-right mb-3" type="button"><i class="fas fa-trash-alt"></i>
          </button>
        </div>
      </div>
    </div>
  </div>`;
         $('.add_manage_c').append(html);
         $('.add_consequence').hide();
     }
     
     /* Doc ready */
     $(".add_consequence").on('click', function () {
       add_manage_c();  
  
     });
         $("body").on("click", "#Deletemanagec", function () {
                $(this).parents(".manage_con").remove();
                $('.add_consequence').show();
            })   
 </script>
 <script>
  /* Variables */
     var row = $(".upload_duc");
     
     function add_upload() {
         var html = '<div class="row upload"> <div class="col-2"> <div class="form-group"><input type="file" name="documents_file[]" id="documents_file"class="form-control" style="padding: 3px;" value=""> </div> </div> <div class="col-2"> <div class="form-group"> <input name="documents_doc_date" id="documents_doc_date" class="form-control dateandtimepicker" type="date" value=""> </div> </div> <div class="col-2"> <div class="form-group"> <select name="documents_type_id" class="form-control" id="documents_type_id"> <option  value="">Select</option> <option  value="2">CC</option> <option  value="3">COPY</option> <option  value="1">ORG</option> </select> </div> </div> <div class="col-2"> <div class="form-group"> <input name="documents_uploaded_by" class="form-control"  type="text" value="" readonly> </div> </div> <div class="col-2"> <div class="form-group"> <input name="documents_date_time" id="documents_date_time" class="form-control dateandtimepicker" type="date" value=""> </div> </div> <div class="col-2"> <div class="form-group row"> <div class="col-sm-8"><select name="documents_action_id" class="form-control" id="documents_action_id"> <option value="">Select</option> </select> </div><button id="Deleteup" class="btn btn-danger " type="button" "><i class="fas fa-trash-alt"></i> </button> </div> </div> </div>';
         $('.add_upload').append(html);
     //   row.clone(true, true).appendTo(".add_upload");
     }
     
     /* Doc ready */
     $(".add_uprow").on('click', function () {
      add_upload();  
  
     });
         $("body").on("click", "#Deleteup", function () {
                $(this).parents(".upload").remove();
            })   
 </script>
 <script>
  /* Variables */
     var row = $(".Evidence");
     
     function add_Evidence() {
         var html = '<div class="row uploadrow"> <div class="col-md-2"> <div class="form-group"><input type="date" class="form-control"name="letter_notice_date" /></div> </div> <div class="col-md-2"> <div class="form-group"> <select name="letter_notice_documents_id" class="form-control"> <option value="">Select</option> <option value="8">Charge Form</option> <option value="7">Charge Sheet</option> <option value="16">Cheque</option> <option value="15">Cheque Dishonour</option> <option value="5">Complaint</option> <option value="9">Investigation Report</option> <option value="14">Legal Notice (Served)</option> <option value="10">Legal Notice by 1st Party</option> <option value="11">Legal Notice by 2nd Party</option> <option value="12">Letter by 1st Party</option> <option value="13">Letter by 2nd Party</option> <option value="3">Petition</option> <option value="4">Plaint</option> <option value="6">Written Statement</option> </select> </div> </div> <div class="col-md-2"> <div class="form-group"> <input type="text" class="form-control "name="letter_notice_documents_write" value="" placeholder="Document"> </div> </div> <div class="col-md-4"> <div class="form-group"> <input type="text" class="form-control"name="letter_notice_particulars_write" id="" value=""placeholder="Perticulars"> </div> </div> <div class="col-md-2"> <div class="form-group row"> <div class="col-sm-8"> <select name="letter_notice_type_id" class="form-control"id=""> <option value="">Select</option> <option value="2">CC</option> <option value="3">COPY</option> <option value="1">ORG</option> </select> </div> <button id="Deleteerow" class="btn btn-danger " type="button"><i class="fas fa-trash-alt"></i> </button> </div> </div> </div>';
         $('.add_Evidence').append(html);
     //   row.clone(true, true).appendTo(".add_Evidence");
     }
     
     /* Doc ready */
     $(".add_Erow").on('click', function () {
      add_Evidence();  
  
     });
         $("body").on("click", "#Deleteerow", function () {
                $(this).parents(".uploadrow").remove();
            })   
 </script>
 <script>
  /* Variables */
     var row = $(".opponame");
     
     function add_name() {
         var html = '<div class="form-group opp-name row"> <div class="col-sm-6"> <input required type="text" class="form-control" name="opponent_info_name" id="opponent_info_name" value="{{ @$cases->opponent_info_name }}" placeholder="Name"> </div> <div class="col-sm-6"> <input type="text" class="form-control" name="opponent_info_mobile" id="opponent_info_mobile" value="{{ @$cases->opponent_info_mobile }}" placeholder="Mobile"> </div> <div class="col-sm-6 mt-2"> <input type="email" class="form-control" name="opponent_info_email" id="opponent_info_email" value="{{ @$cases->opponent_info_email }}" placeholder="Email"> </div> <div class="col-sm-5 mt-2"> <div class="input-group"> <input type="text" class="form-control" name="opponent_info_address" id="opponent_info_address" value="{{ @$cases->opponent_info_address }}" placeholder="Address"> </div></div> <div class="col-sm-1 mt-2"> <div class=""> <button  type="button" id="Deletename" class="btn btn-danger"> <i class="fas fa-trash-alt"></i> </button>  </div> </div>';
         $('.add_name').append(html);
     //   row.clone(true, true).appendTo(".add_name");
     }
     
     /* Doc ready */
     $(".rowAdder").on('click', function () {
      add_name();  
  
     });
         $("body").on("click", "#Deletename", function () {
                $(this).parents(".opp-name").remove();
            })   
 </script>
 <script>
  /* Variables */
     var row = $(".client_name");
     
     function add_client() {
         var html = '<div class="form-group row cl-name"> <div class="col-sm-6"> <input type="text" class="form-control" name="client_party_name" id="client_party_name" value="{{ @$cases->client_party_name }}" placeholder="Name"> </div> <div class="col-sm-6"> <input type="text" class="form-control" name="client_party_mobile" id="client_party_mobile" value="{{ @$cases->client_party_mobile }}" placeholder="Mobile"> </div> <div class="col-sm-6 mt-2"><input type="email" class="form-control" name="client_party_email" id="client_party_email" value="{{ @$cases->client_party_email }}" placeholder="Email"> </div> <div class="col-sm-5 mt-2"> <div class="input-group"> <input type="text" class="form-control" name="client_party_address" id="client_party_address total_chq" value="{{ @$cases->client_party_address }}" placeholder="Address"> </div> </div><div class="col-sm-1 mt-2"><button  type="button" id="Deleteclient" class="btn btn-danger"> <i class="fas fa-trash-alt"></i> </button>  </div> </div>';
         $('.add_client').append(html);
     //   row.clone(true, true).appendTo(".add_client");
     }
     
     /* Doc ready */
     $(".rowclient").on('click', function () {
      add_client();  
  
     });
         $("body").on("click", "#Deleteclient", function () {
                $(this).parents(".cl-name").remove();
            })   
 </script>

<script>
    $('document').ready(function(){
		$('.dropdown_client').change(function(){
		    if($(this).val() == 1){
		        $('.country').val(2);
		    };
		    if($(this).val() == 2){
		        $('.country').val(1);
		    };
			
		});
	});
    $('document').ready(function(){
        if($('#case_status_id').val() == '' || $('#case_status_id').val() == 1){$('#disposed-div :input').attr('disabled',true)};
		$('.country').change(function(){
		    if($(this).val() == 1){
		        $('.dropdown_client').val(2);
		    };
		    if($(this).val() == 2){
		        $('.dropdown_client').val(1);
		    };
		});
	});
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
@endsection
