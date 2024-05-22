@extends('layouts.lawyer.layout')
@section('title')
    <title>Create District Case</title>
@endsection
@section('lawyer-content')
    <style>
        .form-control {
            border-color: #36B9CF !important;
        }

        .form-control {
            display: block !important;
            width: 100% !important;
            height: calc(1.5em + 0.75rem + 2px) !important;
            padding: 0.375rem 0.75rem !important;
            font-size: 1rem !important;
            font-weight: 400 !important;
            line-height: 1.5 !important;
            color: #6e707e !important;
            background-color: #fff !important;
            background-clip: padding-box;
            border-radius: 0.35rem !important;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 33px !important;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            border: 1px solid #36B9CF !important;
        }

        .Add_section button {
            height: 38px;
            width: 36px;
            margin-left: 5px !important;
            padding: 0 !important;
        }

        .btn-success {
            color: #fff;
            background-color: #1cc88a;
            border-color: #1cc88a;
        }

        button:hover {
            opacity: 0.8;
        }

        .btn-success:hover {
            color: #fff;
            background-color: #17a673;
            border-color: #169b6b;
        }

        .Add_section {
            display: flex;
            justify-content: space-between;
        }

        textarea.form-control {
            height: auto !important;
        }

        .select2-container {
            width: 100% !important;
        }

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

        .attributes {
            width: 100%;
        }

        .input-group {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
            width: 100%;
        }

        .input-group-prepend {
            margin-right: -1px;
        }

        .input-group-prepend,
        .input-group-append {
            display: flex;
        }

        .input-group>.form-control,
        .input-group>.form-control-plaintext,
        .input-group>.custom-select,
        .input-group>.custom-file {
            position: relative;
            flex: 1 1 auto;
            width: 1% !important;
            min-width: 0;
            margin-bottom: 0;
            border-top-left-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="card  mb-4 " style="    background: transparent;border:0px;">
                <div class="card-header py-3 shadow" style="border-bottom: 1px solid black;">
                    <div class="row">

                        <div class="col-12">
                            <div class="d-flex justify-content-center w-100 mb-2">
                                <button id="case-info" class="btn btn-info mx-1">service Info</button>
                                <button id="case-status" class="btn btn-secondary mx-1">service Status</button>
                                <button id="event-stage" class="btn btn-secondary mx-1">Events & Stages</button>
                                <button id="party-info" class="btn btn-secondary mx-1">Party Info</button>
                                <button id="lawyer-info" class="btn btn-secondary mx-1">Lawyer Info</button>
                                <button id="case-document" class="btn btn-secondary mx-1">service Doc</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <form action="{{ route('lawyer.legalservice.store') }}" method="post">
                        @csrf

                        <input type="hidden" name="lawyer_id" value="{{ auth()->guard('lawyer')->id() }}">

                        {{-- case info section --}}
                        <div class="case-info-section section " style="border-radius: 0.35rem;background: transparent;">
                            <div class="edit_header" style="border-bottom: 1px solid #cfcfd1 !important;">
                                <h3 class="font-weight-bold py-2" style="color: black;font-size:1rem;">Service Info</h3>
                            </div>
                            <div class="card shadow mb-2" style="border-top-left-radius: 0;border-top-right-radius: 0;">
                                <div class="card-body">
                                    <div class="row ">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="service_info_category_id"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Service
                                                    Category </label>
                                                <div class="col-md-8">
                                                    <select name="service_info_category_id" id="service_info_category_id"
                                                        class="form-control select2">
                                                        <option value="Select">Select</option>

                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>
                                                       

                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="service_info_type_id"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Service
                                                    Type</label>
                                                <div class="col-md-8">
                                                    <select name="service_info_type_id" id="service_info_type_id"
                                                        class="form-control select2">
                                                        <option selected disabled hidden>Select</option>

                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>
                                                       
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="service_info_mater_id"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Service
                                                    Mater</label>
                                                <div class="col-md-8">
                                                    <div class="Add_section">
                                                        <div class="service w-100">
                                                            <div class="service_metter">
                                                                <div class="input-group mb-3">
                                                                    <select name="service_info_mater_id"
                                                                        class="form-control" id="service_info_mater_id">
                                                                        <option value="Select">Select</option>
                                                                        <option value="District">District</option>
                                                                        <option value="Special">Special</option>
                                                                       

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-large btn-success add_metter"
                                                            type="button"><i class="fas fa-plus"></i></button>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="form-group row">
                                                <label for="service_info_dispute"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Dispute</label>
                                                <div class="col-md-8">
                                                    <div class="Add_section">
                                                        <div class="dispute w-100">
                                                            <div class=" add_dispute">
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control"
                                                                        name="service_info_dispute"
                                                                        id="service_info_dispute" value=""
                                                                        placeholder="Type dispute">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-large btn-success  add_dis" type="button"><i
                                                                class="fas fa-plus"></i></button>


                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group row">
                                                <label for="service_info_division_id"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Division</label>
                                                <div class="col-md-8">
                                                    <select name="service_info_division_id" id="service_info_division_id"
                                                        class="form-control select2">
                                                        <option selected disabled hidden>Select</option>

                                                        
                                                                        <option value="District">District</option>
                                                                        <option value="Special">Special</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="service_info_district_id"
                                                    class="col-form-label font-weight-bold text-info col-md-4">District</label>
                                                <div class="col-md-8">
                                                    <select name="service_info_district_id" id="service_info_district_id"
                                                        class="form-control select2">
                                                        <option selected disabled hidden>Select</option>

                                                       
                                                                        <option value="District">District</option>
                                                                        <option value="Special">Special</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="service_info_police_station_id"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Police
                                                    Station</label>
                                                <div class="col-md-8">
                                                    <select name="service_info_police_station_id"
                                                        id="service_info_police_station_id" class="form-control select2">
                                                        <option selected disabled hidden>Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="service_info_claim_amount_prayer"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Claim
                                                    Amount/prayer</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control"
                                                        name="service_info_claim_amount_prayer"
                                                        id="service_info_claim_amount_prayer" value=""
                                                        placeholder="Type claim amount">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="service_info_other_claim"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Other Claim
                                                    (If
                                                    any)</label>
                                                <div class="col-md-8">
                                                    <select name="service_info_other_claim" id="service_info_other_claim"
                                                        class="form-control select2">
                                                        <option selected disabled hidden>Select</option>

                                                    
                                                                        <option value="District">District</option>
                                                                        <option value="Special">Special</option>

                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-12">

                                            <div class="form-group row">
                                                <label for="service_info_description"
                                                    class="col-form-label font-weight-bold text-info col-md-2">Dispute
                                                    Discription</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" name="service_info_description" id="service_info_description" cols="30"
                                                        rows="3" placeholder="Type dispute discription"></textarea>

                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="card shadow mb-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="service_info_client_name_id"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Client
                                                    Name</label>
                                                <div class="col-md-8">
                                                    <div class="Add_section">
                                                        <div class="client w-100">
                                                            <div class=" client_name">
                                                                <div class="input-group mb-3">
                                                                    <select name="service_info_client_name_id"
                                                                        id="service_info_client_name_id"
                                                                        class="form-control select2 ">
                                                                        <option selected disabled hidden>Select</option>

                                                                  
                                                                        <option value="District">District</option>
                                                                        <option value="Special">Special</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-success add_client " style="width: 36px"><i
                                                                class="fas fa-fw fa-plus"></i></button>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="form-group row">
                                                <label for="service_info_client_coordinator"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Client
                                                    Coordinator</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control"
                                                        name="service_info_client_coordinator"
                                                        id="service_info_client_coordinator" value=""
                                                        placeholder="Type cliend coordinator">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="service_info_legal_service_required_id"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Legal
                                                    Service
                                                    Required</label>
                                                <div class="col-md-8">
                                                    <div class="Add_section">
                                                        <div class="legal w-100">
                                                            <div class=" legal_service">
                                                                <div class="input-group mb-3">
                                                                    <select name="service_info_legal_service_required_id"
                                                                        id="service_info_legal_service_required_id"
                                                                        class="form-control select2">
                                                                        <option selected disabled hidden>Select</option>
                                                                        <option value="District">District</option>
                                                                        <option value="Special">Special</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-success add_legal" style="width: 36px"><i
                                                                class="fas fa-fw fa-plus"></i></button>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="service_info_previous_despute"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Previous
                                                    Dispute
                                                    (If any)</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control"
                                                        name="service_info_previous_despute"
                                                        id="service_info_previous_despute" value=""
                                                        placeholder="Type previous dispute ">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group row">
                                                <label for="service_info_opponent_name"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Opponent
                                                    Name</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control"
                                                        name="service_info_opponent_name" id="service_info_opponent_name"
                                                        value="" placeholder="Type opponent name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="service_info_referrer_details"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Opponent
                                                    Coordinator</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control"
                                                        name="service_info_referrer_details"
                                                        id="service_info_referrer_details" value=""
                                                        placeholder="Type referrer details">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="service_info_low_id"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Law</label>
                                                <div class="col-md-8">
                                                    <div class="Add_section">
                                                        <div class="low w-100">
                                                            <div class="all_low">
                                                                <div class="input-group mb-3">
                                                                    <select name="service_info_low_id"
                                                                        id="service_info_low_id"
                                                                        class="form-control select2">
                                                                        <option selected disabled hidden>Select</option>
                                                                      
                                                                        <option value="District">District</option>
                                                                        <option value="Special">Special</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-success add_low " style="width: 36px"><i
                                                                class="fas fa-fw fa-plus"></i></button>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="service_info_section_id"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Section</label>
                                                <div class="col-md-8">
                                                    <div class="Add_section">
                                                        <div class="section w-100">
                                                            <div class="all_section">
                                                                <div class="input-group mb-3">
                                                                    <select name="service_info_section_id"
                                                                        id="service_info_section_id"
                                                                        class="form-control select2">
                                                                        <option selected disabled hidden>Select</option>

                                                                      
                                                                        <option value="District">District</option>
                                                                        <option value="Special">Special</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-success add_allsection"
                                                            style="width:36px"><i class="fas fa-fw fa-plus"></i></button>
                                                    </div>

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow mb-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group row">
                                                <label for="service_info_summary_facts"
                                                    class="col-form-label font-weight-bold text-info col-md-2">Summary
                                                    Facts</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" name="service_info_summary_facts" id="service_info_summary_facts" cols="30"
                                                        rows="3" placeholder="Type summary facts"></textarea>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="service_info_special_note"
                                                    class="col-form-label font-weight-bold text-info col-md-2">Special
                                                    Note</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" name="service_info_special_note" id="service_info_special_note" value=""
                                                        placeholder="Type special note" cols="30" rows="3"></textarea>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="service_info_reference_case"
                                                    class="col-form-label font-weight-bold text-info col-md-2">Reference
                                                    Case/Issue Info</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" name="service_info_reference_case" id="service_info_reference_case" value=""
                                                        placeholder="Type reference case" cols="30" rows="3"></textarea>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- case status section --}}
                        <div class="case-status-section d-none section " style="background: transparent;">
                            <div class="edit_header shadow " style="border-bottom: 1px solid #cfcfd1 !important;">
                                <h3 class="font-weight-bold py-2" style="color: black;font-size:1rem;">Service Status
                                </h3>
                            </div>

                            <div class="row mt-3 ">
                                <div class="col-md-6" style="padding-right: 8px;">
                                    <div class="card shadow mb-2">
                                        <div class="card-body">

                                            {{-- <div class="form-group row">
                                            <label for="service_status_category_id"
                                                class="col-form-label font-weight-bold text-info col-md-4">Service
                                                Category</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control"
                                                    id="service_status_category_id" value=""
                                                    placeholder="Type service category" >
                                            </div>
                                        </div> --}}

                                            <div class="form-group row">
                                                <label for="service_progress_status_id"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Service
                                                    Progress
                                                    Status</label>
                                                <div class="col-md-8">
                                                    <div class="Add_section">
                                                        <div class="service_progress w-100">
                                                            <div class="service_progress_status">
                                                                <div class="input-group mb-3">

                                                                    <select name="service_progress_status_id"
                                                                        id="service_progress_status_id"
                                                                        class="form-control select2">
                                                                        <option selected disabled hidden>Select</option>
                                                                        <option value="District">District</option>
                                                                        <option value="Special">Special</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- <button class="btn btn-success add_status "><i
                                                            class="fas fa-fw fa-plus"></i></button> --}}

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="service_status_recive_date_time"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Receive Date
                                                    &
                                                    Time</label>
                                                <div class="col-md-8">
                                                    <input type="date" name="service_status_recive_date_time"
                                                        id="service_status_recive_date_time"
                                                        class="form-control ">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="service_status_recived_mode_id"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Received
                                                    Mode</label>
                                                <div class="col-md-8">
                                                    <select name="service_status_recived_mode_id"
                                                        id="service_status_recived_mode_id" class="form-control select2">
                                                        <option selected disabled hidden>Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="service_status_recived_form_id"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Received
                                                    Form</label>
                                                <div class="col-md-8">
                                                    <select name="service_status_recived_form_id"
                                                        id="service_status_recived_form_id" class="form-control select2">
                                                        <option selected disabled hidden>Select</option>
                                                                        <option value="District">District</option>
                                                                        <option value="Special">Special</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="service_status_recived_by_id"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Received
                                                    By</label>
                                                <div class="col-md-8">
                                                    <select name="service_status_recived_by_id"
                                                        id="service_status_recived_by_id" class="form-control select2">
                                                        <option selected disabled hidden>Select</option>
                                                                        <option value="District">District</option>
                                                                        <option value="Special">Special</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="service_status_note"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Note</label>
                                                <div class="col-md-8">
                                                    <textarea name="service_status_note" id="service_status_note" class="form-control new" placeholder="Type note"
                                                        aria-invalid="false"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="padding-left: 8px;">
                                    <div class="card shadow mb-2">
                                        <div class="card-body">

                                            {{-- <h3 class="completed">Completed Service Status</h3> --}}
                                            <div class="form-group row">
                                                <label for="service_status_timeline_deadline"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Service
                                                    Timeline/Deadline</label>
                                                <div class="col-md-8">
                                                    <input type="date" name="service_status_timeline_deadline"
                                                        id="service_status_timeline_deadline"
                                                        class="form-control ">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="service_status_completed"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Service
                                                    Completed</label>
                                                <div class="col-md-8">
                                                    <input type="date" name="service_status_completed"
                                                        id="service_status_completed"
                                                        class="form-control ">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="service_status_delivered"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Service
                                                    Delivered</label>
                                                <div class="col-md-8">
                                                    <input type="date" name="service_status_delivered"
                                                        id="service_status_delivered"
                                                        class="form-control ">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="service_status_delivery_mode_id"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Delivery
                                                    Mode</label>
                                                <div class="col-md-8">
                                                    <select name="service_status_delivery_mode_id"
                                                        id="service_status_delivery_mode_id" class="form-control select2">
                                                        <option selected disabled hidden>Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="service_status_delivery_to_id"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Delivery
                                                    To</label>
                                                <div class="col-md-8">
                                                    <div class="Add_section">
                                                        <div class="delivery w-100">
                                                            <div class="delivery_to">
                                                                <div class="input-group mb-3">
                                                                    <select name="service_status_delivery_to_id"
                                                                        id="service_status_delivery_to_id"
                                                                        class="form-control select2">
                                                                        <option selected disabled hidden>Select</option>
                                                                        <option value="District">District</option>
                                                                        <option value="Special">Special</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-success add_delivery"><i
                                                                class="fas fa-fw fa-plus"></i></button>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="service_status_evidence_type_id"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Service/Evidence
                                                    Type</label>
                                                <div class="col-md-8">
                                                    <select name="service_status_evidence_type_id"
                                                        id="service_status_evidence_type_id" class="form-control select2">
                                                        <option selected disabled hidden>Select</option>
                                                                        <option value="District">District</option>
                                                                        <option value="Special">Special</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="service_status_note"
                                                    class="col-form-label font-weight-bold text-info col-md-4">Note</label>
                                                <div class="col-md-8">
                                                    <textarea name="service_status_note" id="service_status_note" class="form-control new" placeholder="Type note"
                                                        aria-invalid="false"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- event stage section --}}

                        <div class="event-stage-section d-none section">
                            <div class="card shadow mb-2">
                                <div class="edit_header">
                                    <h3 class="font-weight-bold py-2" style="color: black;">Events & Incidents</h3>

                                </div>
                                <div class="card-body pb-1">
                                    <div class="Evidence">
                                        <div class="add_Evidence">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold text-info"
                                                            for="letter_notice_date">Date</label>
                                                        <input type="date" class="form-control"
                                                            name="letter_notice_date" id="letter_notice_date">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold text-info"
                                                            for="letter_notice_documents_id">Title</label>
                                                        <select name="letter_notice_documents_id" class="form-control">
                                                            <option value="Select">Select</option>
                                                            <option value="District">District</option>
                                                            <option value="Special">Special</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold text-info"
                                                            for="letter_notice_documents_write"></label>
                                                        <input type="text" class="form-control mt-2"
                                                            name="letter_notice_documents_write" placeholder="Document">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold text-info"
                                                            for="letter_notice_particulars_write">Description</label>
                                                        <input type="text" class="form-control"
                                                            name="letter_notice_particulars_write"
                                                            id="letter_notice_particulars_write"
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
                                                                <option value="Select">Select</option>
                                                                <option value="District">District</option>
                                                                <option value="Special">Special</option>

                                                            </select>

                                                        </div>
                                                        <button class="btn btn-large btn-success add_Erow" type="button"
                                                            style="height: 40px;margin-top: 30px;"><i
                                                                class="fas fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow mb-2">
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
                                                    class="col-sm-2 col-form-label font-weight-bold text-info"> Filing Date
                                                </label>
                                                <div class="col-sm-2">
                                                    <span>
                                                        <input type="date" id="case_steps_filing"
                                                            name="case_steps_filing" value="dd-mm-yyyy"
                                                            class="form-control">
                                                    </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                        id="case_steps_filing_note" name="case_steps_filing_note"
                                                        placeholder="Type" value="">
                                                </div>
                                                <div class="col-sm-2">
                                                    <select name="case_steps_filing_type_id" class="form-control">
                                                        <option value="Select">Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row ">
                                                <label for="case_steps_service_return"
                                                    class="col-sm-2 col-form-label font-weight-bold text-info"> Service
                                                    Return </label>
                                                <div class="col-sm-2">
                                                    <span>
                                                        <input type="date" id="case_steps_service_return"
                                                            name="case_steps_service_return" value="dd-mm-yyyy"
                                                            class="form-control">
                                                    </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                        id="case_steps_service_return_note"
                                                        name="case_steps_service_return_note" placeholder="Type"
                                                        value="">
                                                </div>
                                                <div class="col-sm-2">
                                                    <select name="case_steps_service_return_type_id" class="form-control">
                                                        <option value="Select">Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

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
                                                            name="case_steps_sr_completed" value="dd-mm-yyyy"
                                                            class="form-control">
                                                    </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                        id="case_steps_sr_completed_note"
                                                        name="case_steps_sr_completed_note" placeholder="Type"
                                                        value="">
                                                </div>
                                                <div class="col-sm-2">
                                                    <select name="case_steps_sr_completed_type_id" class="form-control">
                                                        <option value="Select">Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

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
                                                            name="case_steps_set_off" value="dd-mm-yyyy"
                                                            class="form-control">
                                                    </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                        id="case_steps_set_off_note" name="case_steps_set_off_note"
                                                        placeholder="Type" value="">
                                                </div>
                                                <div class="col-sm-2">
                                                    <select name="case_steps_set_off_type_id" class="form-control">
                                                        <option value="Select">Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

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
                                                            name="case_steps_issue_frame" value="dd-mm-yyyy"
                                                            class="form-control">
                                                    </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                        id="case_steps_issue_frame_note"
                                                        name="case_steps_issue_frame_note" placeholder="Type"
                                                        value="">
                                                </div>
                                                <div class="col-sm-2">
                                                    <select name="case_steps_issue_frame_type_id" class="form-control">
                                                        <option value="Select">Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

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
                                                            value="dd-mm-yyyy" class="form-control">
                                                    </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="case_steps_ph_note"
                                                        name="case_steps_ph_note" placeholder="Type" value="">
                                                </div>
                                                <div class="col-sm-2">
                                                    <select name="case_steps_ph_type_id" class="form-control">
                                                        <option value="Select">Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_steps_fph"
                                                    class="col-sm-2 col-form-label font-weight-bold text-info"> F.PH
                                                </label>
                                                <div class="col-sm-2">
                                                    <span>
                                                        <input type="date" id="case_steps_fph" name="case_steps_fph"
                                                            value="dd-mm-yyyy" class="form-control">
                                                    </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="case_steps_fph_note"
                                                        name="case_steps_fph_note" placeholder="Type" value="">
                                                </div>
                                                <div class="col-sm-2">
                                                    <select name="case_steps_fph_type_id" class="form-control">
                                                        <option value="Select">Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

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
                                                            name="taking_cognizance" value="dd-mm-yyyy"
                                                            class="form-control">
                                                    </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                        id="taking_cognizance_note" name="taking_cognizance_note"
                                                        placeholder="Type" value="">
                                                </div>
                                                <div class="col-sm-2">
                                                    <select name="taking_cognizance_type_id" class="form-control">
                                                        <option value="Select">Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

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
                                                            name="arrest_surrender_cw" value="dd-mm-yyyy"
                                                            class="form-control">
                                                    </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                        id="arrest_surrender_cw_note" name="arrest_surrender_cw_note"
                                                        placeholder="Type" value="">
                                                </div>
                                                <div class="col-sm-2">
                                                    <select name="arrest_surrender_cw_type_id" class="form-control">
                                                        <option value="Select">Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

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
                                                            name="case_steps_court_transfer" value="dd-mm-yyyy"
                                                            class="form-control">
                                                    </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                        id="case_steps_court_transfer_note"
                                                        name="case_steps_court_transfer_note" placeholder="Type"
                                                        value="">
                                                </div>
                                                <div class="col-sm-2">
                                                    <select name="case_steps_court_transfer_type_id" class="form-control">
                                                        <option value="Select">Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

                                                    </select>
                                                </div>

                                            </div>
                                            <div class="form-group row ">
                                                <label for="case_steps_bail"
                                                    class="col-sm-2 col-form-label font-weight-bold text-info"> Bail
                                                </label>
                                                <div class="col-sm-2">
                                                    <span>
                                                        <input type="date" id="case_steps_bail" name="case_steps_bail"
                                                            value="dd-mm-yyyy" class="form-control">
                                                    </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="case_steps_bail_note"
                                                        name="case_steps_bail_note" placeholder="Type" value="">
                                                </div>
                                                <div class="col-sm-2">
                                                    <select name="case_steps_bail_type_id" class="form-control">
                                                        <option value="Select">Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

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
                                                            name="case_steps_witness_from" value="dd-mm-yyyy"
                                                            class="form-control">
                                                    </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                        id="case_steps_witness_from_note"
                                                        name="case_steps_witness_from_note" placeholder="Type"
                                                        value="">
                                                </div>
                                                <div class="col-sm-2">
                                                    <select name="case_steps_witness_from_type_id" class="form-control">
                                                        <option value="Select">Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

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
                                                            name="case_steps_witness_to" value="dd-mm-yyyy"
                                                            class="form-control">
                                                    </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                        id="case_steps_witness_to_note" name="case_steps_witness_to_note"
                                                        placeholder="Type" value="">
                                                </div>
                                                <div class="col-sm-2">
                                                    <select name="case_steps_witness_to_type_id" class="form-control">
                                                        <option value="Select">Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

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
                                                            name="case_steps_argument" value="dd-mm-yyyy"
                                                            class="form-control">
                                                    </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                        id="case_steps_argument_note" name="case_steps_argument_note"
                                                        placeholder="Type" value="">
                                                </div>
                                                <div class="col-sm-2">
                                                    <select name="case_steps_argument_type_id" class="form-control">
                                                        <option value="Select">Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

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
                                                            name="case_steps_judgement_order" value="dd-mm-yyyy"
                                                            class="form-control">
                                                    </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                        id="case_steps_judgement_order_note"
                                                        name="case_steps_judgement_order_note" placeholder="Type"
                                                        value="">
                                                </div>
                                                <div class="col-sm-2">
                                                    <select name="case_steps_judgement_order_type_id"
                                                        class="form-control">
                                                        <option value="">Select</option>

                                                        <option value="">
                                                        </option>

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
                                                            name="case_steps_subsequent_status" value="dd-mm-yyyy"
                                                            class="form-control">
                                                    </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                        id="case_steps_subsequent_status_note"
                                                        name="case_steps_subsequent_status_note" placeholder="Type"
                                                        value="">
                                                </div>
                                                <div class="col-sm-2">
                                                    <select name="case_steps_subsequent_status_type_id"
                                                        class="form-control">
                                                        <option value="">Select</option>

                                                        <option value="">
                                                        </option>

                                                    </select>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <label for="case_steps_summary_of_cases_note"
                                                    class="col-sm-2 col-form-label font-weight-bold text-info"> Summary
                                                    of the Case </label>
                                                <div class="col-sm-10">
                                                    <textarea name="case_steps_summary_of_cases_note" class="form-control" rows="3" placeholder="Type"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_steps_note"
                                                    class="col-sm-2 col-form-label font-weight-bold text-info"> Remarks
                                                </label>
                                                <div class="col-sm-10">
                                                    <textarea name="case_steps_note" id="case_steps_note" class="form-control" rows="3" placeholder="Type"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>


                        {{-- case document section --}}
                        <div class="case-document-section d-none section">
                            <div class="card shadow mb-2">
                                <div class="edit_header">
                                    <h3 class="font-weight-bold py-2" style="color: black;font-size:1rem;">Document
                                        Received</h3>

                                </div>
                                <div class="card-body pb-1">
                                    <div class="ducument">
                                        <div class="add_ducument">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <select name="document_recived_id" class="form-control"
                                                                id="document_recived_id">
                                                                <option value="Select">Select</option>
                                                                        <option value="District">District</option>
                                                                        <option value="Special">Special</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input name="document_recived_type" type="text"
                                                                class="form-control" placeholder="Type">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input name="document_recived_date" type="date"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group row">
                                                        <div class="col-sm-8">
                                                            <select name="document_recived_type_id" class="form-control"
                                                                id="document_recived_type_id">
                                                                <option value="Select">Select</option>
                                                                        <option value="District">District</option>
                                                                        <option value="Special">Special</option>
                                                            </select>
                                                        </div>
                                                        <button class="btn btn-large btn-success add_row"
                                                            type="button"><i class="fas fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card shadow mb-2">
                                <div class="edit_header">
                                    <h3 class="font-weight-bold py-2" style="color: black;font-size:1rem;">Document
                                        Required</h3>
                                </div>
                                <div class="card-body pb-1">
                                    <div class="requed_duc">
                                        <div class="add_requed">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <select name="document_required_id" class="form-control"
                                                                id="document_required_id">
                                                                <option value="Select">Select</option>
                                                                        <option value="District">District</option>
                                                                        <option value="Special">Special</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input name="document_required_type" type="text"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input name="document_required_date" type="date"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group row">
                                                        <div class="col-sm-8">
                                                            <select name="document_required_type_id" class="form-control"
                                                                id="document_required_type_id">
                                                                <option value="Select">Select</option>
                                                                        <option value="District">District</option>
                                                                        <option value="Special">Special</option>
                                                            </select>
                                                        </div>
                                                        <button class="btn btn-large btn-success add_col"
                                                            type="button"><i class="fas fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow mb-2">
                                <div class="edit_header">
                                    <h3 class="font-weight-bold py-2" style="color: black;font-size:1rem;">Document
                                        Upload</h3>
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
                                                            class="form-control "
                                                            style="padding: 1px;line-height: 100% !important;">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="documents_doc_date"
                                                            class="font-weight-bold text-info">Doc
                                                            Date</label>
                                                        <input name="documents_doc_date" id="documents_doc_date"
                                                            class="form-control" type="date">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="documents_type_id"
                                                            class="font-weight-bold text-info">Type</label>
                                                        <select name="documents_type_id" class="form-control"
                                                            id="documents_type_id">
                                                            <option value="Select">Select</option>
                                                            <option value="District">District</option>
                                                            <option value="Special">Special</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="documents_uploaded_by"
                                                            class="font-weight-bold text-info">Uploaded
                                                            By</label>
                                                        <input name="documents_uploaded_by" id="documents_uploaded_by"
                                                            class="form-control"  type="text">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="documents_date_time"
                                                            class="font-weight-bold text-info">Date &
                                                            Time</label>
                                                        <input name="documents_date_time" id="documents_date_time"
                                                            class="form-control " type="text">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group row">
                                                        <div class="col-sm-8">
                                                            <label for="documents_action_id"
                                                                class="font-weight-bold text-info">Action</label>
                                                            <select name="documents_action_id" class="form-control"
                                                                id="documents_action_id">
                                                                <option value="Select">Select</option>
                                                                        <option value="District">District</option>
                                                                        <option value="Special">Special</option>
                                                            </select>

                                                        </div>
                                                        <button class="btn btn-large btn-success add_uprow"
                                                            type="button" style="height: 40px;margin-top: 30px;"><i
                                                                class="fas fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- lawer secton --}}

                        <div class="lawyer-info-section d-none section mt-3">
                            <div class="row">
                                <div class="col-6" style="padding-right: 8px">
                                    <div class="info_card p-0">

                                        <div class="row m-0">
                                            <div class="col-12 p-0 m-0 mb-3">
                                                <div class="edit_header ">
                                                    <h3 class="font-weight-bold py-2" style="color: black;">Client
                                                        Lawer
                                                        Info</h3>

                                                </div>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <div class="form-group row">
                                                    <label for="client_advocate_law_firm_id"
                                                        class="col-form-label col-sm-4 font-weight-bold text-info">Advocate/Law
                                                        Firm</label>
                                                    <div class="col-sm-8">
                                                        <div class="Add_section">
                                                            <div class="attributes">
                                                                <div class="attr">
                                                                    <div class="input-group mb-3">
                                                                        <select onchange="getLawyer();" required
                                                                            name="client_advocate_law_firm_id"
                                                                            class="form-control"
                                                                            id="client_advocate_law_firm_id">
                                                                            <option value="Select">Select</option>
                                                                            <option value="District">District</option>
                                                                            <option value="Special">Special</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-large btn-success add"
                                                                type="button"><i class="fas fa-plus"></i></button>
                                                        </div>



                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2 ">
                                                <div class="form-group row">
                                                    <label for="client_lead_lawyer_id" required
                                                        class="col-form-label col-sm-4 font-weight-bold text-info">Lead
                                                        Lawyer</label>
                                                    <div class="col-sm-8">
                                                        <div class="Add_section">
                                                            <div class="leadlawyer w-100 ">
                                                                <div class="lead">
                                                                    <div class="input-group mb-3">
                                                                        <select onchange="getLawyer();" required
                                                                            name="client_lead_lawyer_id"
                                                                            class="form-control"
                                                                            id="client_lead_lawyer_id">
                                                                            <option value="Select">Select</option>
                                                                            <option value="District">District</option>
                                                                            <option value="Special">Special</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-large btn-success add_lead "
                                                                type="button"><i class="fas fa-plus"></i></button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2 ">
                                                <div class="form-group row">
                                                    <label for="client_assigned_lawyer_id"
                                                        class="col-form-label col-sm-4 font-weight-bold text-info">Assigned
                                                        Lawyer</label>
                                                    <div class="col-sm-8">
                                                        <div class="Add_section">
                                                            <div class="Assignedlawyer w-100">
                                                                <div class="Assigned">
                                                                    <div class="input-group mb-3">
                                                                        <select required name="client_assigned_lawyer_id"
                                                                            class="form-control"
                                                                            id="client_assigned_lawyer_id">
                                                                            <option value="Select">Select</option>
                                                                            <option value="District">District</option>
                                                                            <option value="Special">Special</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-large btn-success add_Assigned"
                                                                type="button"><i class="fas fa-plus"></i></button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2 ">
                                                <div class="form-group row ">
                                                    <label for="client_assigned_clerk_id"
                                                        class="col-form-label col-sm-4 font-weight-bold text-info">Assigned
                                                        Clerk</label>
                                                    <div class="col-sm-8">
                                                        <div class="Add_section">
                                                            <div class="Assignedlawyer-clerk w-100">
                                                                <div class="Assigned-clerk">
                                                                    <div class="input-group mb-3">
                                                                        <select onchange="getContact();"
                                                                            name="client_assigned_clerk_id"
                                                                            class="form-control"
                                                                            id="client_assigned_clerk_id">
                                                                            <option value="Select">Select</option>
                                                                        <option value="District">District</option>
                                                                        <option value="Special">Special</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-large btn-success add_clerk"
                                                                type="button"><i class="fas fa-plus"></i></button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2 ">
                                                <div class="form-group row ">
                                                    <label for="client_clerk_contact_number_id"
                                                        class="col-form-label col-sm-4 font-weight-bold text-info">Clerk
                                                        Contact Number</label>
                                                    <div class="col-sm-8">
                                                        <div class="Add_section">
                                                            <div class="contact w-100">
                                                                <div class="contact_main">
                                                                    <div class="input-group mb-3">
                                                                        <select name="client_clerk_contact_number_id"
                                                                            class="form-control"
                                                                            id="client_clerk_contact_number_id">
                                                                            <option value="Select">Select</option>
                                                                        <option value="District">District</option>
                                                                        <option value="Special">Special</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-large btn-success add_contact"
                                                                type="button"><i class="fas fa-plus"></i></button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12  ">
                                                <div class="form-group row">
                                                    <label for="client_lawyer_info_note"
                                                        class="col-form-label col-sm-4 font-weight-bold text-info">Note</label>
                                                    <div class="col-sm-8">
                                                        <textarea name="client_lawyer_info_note" id="client_lawyer_info_note" cols="30" rows="3"
                                                            class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6" style="padding-left: 8px">
                                    <div class="info_card p-0">
                                        <div class="row m-0">
                                            <div class="col-12 p-0 m-0">
                                                <div class="edit_header mb-3">
                                                    <h3 class="font-weight-bold py-2" style="color: black;">Opponent
                                                        Lawer
                                                        Info</h3>

                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <label for="opponent_concerned_lawyer"
                                                        class="col-form-label col-sm-4 font-weight-bold text-info">Concerned
                                                        Lawyer</label>
                                                    <div class="col-sm-8">
                                                        <input name="opponent_concerned_lawyer"
                                                            id="opponent_concerned_lawyer" type="text"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <label for="opponent_advocate_law_firm"
                                                        class="col-form-label col-sm-4 font-weight-bold text-info">Advocate/Law
                                                        Firm</label>
                                                    <div class="col-sm-8">
                                                        <input name="opponent_advocate_law_firm"
                                                            id="opponent_advocate_law_firm" type="text"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <label for="opponent_lawyer_contact_number"
                                                        class="col-form-label col-sm-4 font-weight-bold text-info">Opponent
                                                        Lawyer Contact Number</label>
                                                    <div class="col-sm-8">
                                                        <input name="opponent_lawyer_contact_number"
                                                            id="opponent_lawyer_contact_number" type="text"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <label for="opponent_lawyer_clerk"
                                                        class="col-form-label col-sm-4 font-weight-bold text-info">Opponent
                                                        Lawyer Clerk</label>
                                                    <div class="col-sm-8">
                                                        <input name="opponent_lawyer_clerk" id="opponent_lawyer_clerk"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <label for="opponent_clerk_contact_number"
                                                        class="col-form-label col-sm-4 font-weight-bold text-info">
                                                        Opponent Clerk Contact Number</label>
                                                    <div class="col-sm-8">
                                                        <input name="opponent_clerk_contact_number"
                                                            id="opponent_clerk_contact_number" type="text"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <label for="opponent_chamber_address"
                                                        class="col-form-label col-sm-4 font-weight-bold text-info">Chamber
                                                        Address</label>
                                                    <div class="col-sm-8">
                                                        <textarea name="opponent_chamber_address" id="opponent_chamber_address" cols="30" rows="3"
                                                            class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- party section --}}
                        <div class="party-info-section d-none section">

                            <div class="card shadow mb-2">
                                <div class="edit_header">
                                    <h3 class="font-weight-bold py-2" style="color: black;">Client Info</h3>

                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label for="client_info_on_behalf_of_id"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">Client (on
                                                    behalf
                                                    of)</label>
                                                <div class="col-sm-8">
                                                    <select name="client_info_on_behalf_of_id"
                                                        id="client_info_on_behalf_of_id" class="form-control select2">
                                                        <option selected disabled hidden>Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group row">
                                                <label for="client_info_on_behalf_division_id"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">Division</label>
                                                <div class="col-sm-8">
                                                    <select name="client_info_on_behalf_division_id"
                                                        id="client_info_on_behalf_division_id"
                                                        class="form-control select2">
                                                        <option selected disabled hidden>Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group row">
                                                <label for="client_info_on_behalf_zone_id"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">Zone</label>
                                                <div class="col-sm-8">
                                                    <select name="client_info_on_behalf_zone_id"
                                                        id="client_info_on_behalf_zone_id" class="form-control select2">
                                                        <option selected disabled hidden>Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label for="client_info_category_id"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">Client
                                                    Category</label>
                                                <div class="col-sm-8">
                                                    <select name="client_info_category_id" id="client_info_category_id"
                                                        class="form-control select2">
                                                        <option selected disabled hidden>Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group row">
                                                <label for="client_info_category_district_id"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">District</label>
                                                <div class="col-sm-8">
                                                    <select name="client_info_category_district_id"
                                                        id="client_info_category_district_id"
                                                        class="form-control select2">
                                                        <option selected disabled hidden>Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group row">
                                                <label for="client_info_category_area_id"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">Area</label>
                                                <div class="col-sm-8">
                                                    <select name="client_info_category_area_id"
                                                        id="client_info_category_area_id" class="form-control select2">
                                                        <option selected disabled hidden>Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label for="client_info_sub_category_id"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">Client
                                                    Sub-Category</label>
                                                <div class="col-sm-8">
                                                    <select name="client_info_sub_category_id"
                                                        id="client_info_sub_category_id" class="form-control select2">
                                                        <option selected disabled hidden>Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group row">
                                                <label for="client_info_police_station_id"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">Police
                                                    Station</label>
                                                <div class="col-sm-8">
                                                    <select name="client_info_police_station_id"
                                                        id="client_info_police_station_id" class="form-control select2">
                                                        <option selected disabled hidden>Select</option>
                                                        <option value="Select">Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group row">
                                                <label for="client_sub_category_branch_id"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">Branch</label>
                                                <div class="col-sm-8">
                                                    <select name="client_sub_category_branch_id"
                                                        id="client_sub_category_branch_id" class="form-control select2">
                                                        <option selected disabled hidden>Select</option>
                                                        <option value="Select">Select</option>
                                                        <option value="District">District</option>
                                                        <option value="Special">Special</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label for="client_info_client_group"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">Client
                                                    Group</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        name="client_info_client_group" id="client_info_client_group"
                                                        placeholder="type">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label for="client_info_client_profession"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">Client
                                                    Profession</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        name="client_info_client_profession"
                                                        id="client_info_client_profession" placeholder="type">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label for="client_info_client_business_name"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">Client
                                                    Business
                                                    Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        name="client_info_client_business_name"
                                                        id="client_info_client_business_name" placeholder="type">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label for="client_info_client_communication"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">Client
                                                    Communication</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        name="client_info_client_communication"
                                                        id="client_info_client_communication" placeholder="type">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3 p-0">
                                            <label for="client_info_client_name"
                                                class="col-form-label col-sm-12 font-weight-bold text-info">Client
                                                Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control"
                                                    name="client_info_client_name" id="client_info_client_name"
                                                    placeholder="type">
                                            </div>
                                        </div>
                                        <div class="col-3 p-0">
                                            <label for="client_info_mobile"
                                                class="col-form-label col-sm-12 font-weight-bold text-info">Mobile</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="client_info_mobile"
                                                    id="client_info_mobile" placeholder="type">
                                            </div>
                                        </div>
                                        <div class="col-3 p-0">
                                            <label for="client_info_email"
                                                class="col-form-label col-sm-12 font-weight-bold text-info">Email</label>
                                            <div class="col-sm-12">
                                                <input type="email" class="form-control" name="client_info_email"
                                                    id="client_info_email" placeholder="type">
                                            </div>
                                        </div>
                                        <div class="col-3 p-0">
                                            <label for="client_info_address"
                                                class="col-form-label col-sm-12 font-weight-bold text-info">Address</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="client_info_address"
                                                    id="client_info_address" placeholder="type">
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-3 p-0">
                                            <label for="client_info_representative_name"
                                                class="col-form-label col-sm-12 font-weight-bold text-info">Client
                                                Representative Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control"
                                                    name="client_info_representative_name"
                                                    id="client_info_representative_name" placeholder="type">
                                            </div>
                                        </div>
                                        <div class="col-3 p-0">
                                            <label for="client_info_representative_mobile"
                                                class="col-form-label col-sm-12 font-weight-bold text-info">Mobile</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control"
                                                    name="client_info_representative_mobile"
                                                    id="client_info_representative_mobile" placeholder="type">
                                            </div>
                                        </div>
                                        <div class="col-3 p-0">
                                            <label for="client_info_representative_email"
                                                class="col-form-label col-sm-12 font-weight-bold text-info">Email</label>
                                            <div class="col-sm-12">
                                                <input type="email" class="form-control"
                                                    name="client_info_representative_email"
                                                    id="client_info_representative_email" placeholder="type">
                                            </div>
                                        </div>
                                        <div class="col-3 p-0">
                                            <label for="client_info_representative_address"
                                                class="col-form-label col-sm-12 font-weight-bold text-info">Address</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control"
                                                    name="client_info_representative_address"
                                                    id="client_info_representative_address" placeholder="type">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3 p-0">
                                            <label for="client_info_coordinator_name"
                                                class="col-form-label col-sm-12 font-weight-bold text-info">Client
                                                Coordinator Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control"
                                                    name="client_info_coordinator_name"
                                                    id="client_info_coordinator_name" placeholder="type">
                                            </div>
                                        </div>
                                        <div class="col-3 p-0">
                                            <label for="client_info_coordinator_mobile"
                                                class="col-form-label col-sm-12 font-weight-bold text-info">Mobile</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control"
                                                    name="client_info_coordinator_mobile"
                                                    id="client_info_coordinator_mobile" placeholder="type">
                                            </div>
                                        </div>
                                        <div class="col-3 p-0">
                                            <label for="client_info_coordinator_email"
                                                class="col-form-label col-sm-12 font-weight-bold text-info">Email</label>
                                            <div class="col-sm-12">
                                                <input type="email" class="form-control"
                                                    name="client_info_coordinator_email"
                                                    id="client_info_coordinator_email" placeholder="type">
                                            </div>
                                        </div>
                                        <div class="col-3 p-0">
                                            <label for="client_info_coordinator_address"
                                                class="col-form-label col-sm-12 font-weight-bold text-info">Address</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control"
                                                    name="client_info_coordinator_address"
                                                    id="client_info_coordinator_address" placeholder="type">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <label for="client_info_previous_legal_dispute"
                                                    class="col-form-label col-sm-12 font-weight-bold text-info"
                                                    style="padding-top: 25px;">Previous Legal
                                                    Dispute</label>
                                                <div class="col-sm-12">
                                                    <textarea name="client_info_previous_legal_dispute" id="client_info_previous_legal_dispute" cols="30"
                                                        rows="3" class="form-control new" placeholder="Type previous legal dispute "></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <label for="client_info_special_note"
                                                    class="col-form-label col-sm-12 font-weight-bold text-info">Special
                                                    Note</label>
                                                <div class="col-sm-12">
                                                    <textarea name="client_info_special_note" id="client_info_special_note" cols="30" rows="3"
                                                        class="form-control new" placeholder="Type special note"></textarea>
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

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label for="opponent_info_on_behalf_of"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">Opponent
                                                    (on
                                                    behalf
                                                    of)</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        name="opponent_info_on_behalf_of"
                                                        id="opponent_info_on_behalf_of" placeholder="type">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group row">
                                                <label for="opponent_info_on_behalf_division"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">
                                                    Division</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        name="opponent_info_on_behalf_division"
                                                        id="opponent_info_on_behalf_division" placeholder="type">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group row">
                                                <label for="opponent_info_on_behalf_zone"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">Zone</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        name="opponent_info_on_behalf_zone"
                                                        id="opponent_info_on_behalf_zone" placeholder="type">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label for="opponent_info_category"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">Opponent
                                                    Category</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        name="opponent_info_category" id="opponent_info_category"
                                                        placeholder="type">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group row">
                                                <label for="opponent_info_category_district"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">District</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        name="opponent_info_category_district"
                                                        id="opponent_info_category_district" placeholder="type">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group row">
                                                <label for="opponent_info_category_area"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">Area</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        name="opponent_info_category_area"
                                                        id="opponent_info_category_area" placeholder="type">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label for="opponent_info_sub_category"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">Opponent
                                                    Sub-Category</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        name="opponent_info_sub_category"
                                                        id="opponent_info_sub_category" placeholder="type">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group row">
                                                <label for="opponent_info_sub_category_police_station"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">Police
                                                    Station</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        name="opponent_info_sub_category_police_station"
                                                        id="opponent_info_sub_category_police_station"
                                                        placeholder="type">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group row">
                                                <label for="opponent_info_sub_category_branch"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">Branch</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        name="opponent_info_sub_category_branch"
                                                        id="opponent_info_sub_category_branch" placeholder="type">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label for="opponent_info_opponent_group"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">Opponent
                                                    Group</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        name="opponent_info_opponent_group"
                                                        id="opponent_info_opponent_group" placeholder="type">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label for="opponent_info_profession"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">Opponent
                                                    Profession</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        name="opponent_info_profession" id="opponent_info_profession"
                                                        placeholder="type">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label for="oppenent_info_business_name"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">Opponent
                                                    Business
                                                    Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        name="oppenent_info_business_name"
                                                        id="oppenent_info_business_name" placeholder="type">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label for="opponent_info_communication"
                                                    class="col-form-label col-sm-4 font-weight-bold text-info">Opponent
                                                    Communication</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        name="opponent_info_communication"
                                                        id="opponent_info_communication" placeholder="type">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3 p-0">
                                            <label for="oppenent_info_oppenent_name"
                                                class="col-form-label col-sm-12 font-weight-bold text-info">Opponent
                                                Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control"
                                                    name="oppenent_info_oppenent_name" id="oppenent_info_oppenent_name"
                                                    placeholder="type">
                                            </div>
                                        </div>
                                        <div class="col-3 p-0">
                                            <label for="oppenent_info_mobile"
                                                class="col-form-label col-sm-12 font-weight-bold text-info">Mobile</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="oppenent_info_mobile"
                                                    id="oppenent_info_mobile" placeholder="type">
                                            </div>
                                        </div>
                                        <div class="col-3 p-0">
                                            <label for="oppenent_info_email"
                                                class="col-form-label col-sm-12 font-weight-bold text-info">Email</label>
                                            <div class="col-sm-12">
                                                <input type="email" class="form-control" name="oppenent_info_email"
                                                    id="oppenent_info_email" placeholder="type">
                                            </div>
                                        </div>
                                        <div class="col-3 p-0">
                                            <label for="oppenent_info_address"
                                                class="col-form-label col-sm-12 font-weight-bold text-info">Address</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control"
                                                    name="oppenent_info_address" id="oppenent_info_address"
                                                    placeholder="type">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3 p-0">
                                            <label for="opponent_representative_name"
                                                class="col-form-label col-sm-12 font-weight-bold text-info">Opponent
                                                Representative Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control"
                                                    name="opponent_representative_name"
                                                    id="opponent_representative_name" placeholder="type">
                                            </div>
                                        </div>
                                        <div class="col-3 p-0">
                                            <label for="opponent_representative_mobile"
                                                class="col-form-label col-sm-12 font-weight-bold text-info">Mobile</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control"
                                                    name="opponent_representative_mobile"
                                                    id="opponent_representative_mobile" placeholder="type">
                                            </div>
                                        </div>
                                        <div class="col-3 p-0">
                                            <label for="opponent_representative_email"
                                                class="col-form-label col-sm-12 font-weight-bold text-info">Email</label>
                                            <div class="col-sm-12">
                                                <input type="email" class="form-control"
                                                    name="opponent_representative_email"
                                                    id="opponent_representative_email" placeholder="type">
                                            </div>
                                        </div>
                                        <div class="col-3 p-0">
                                            <label for="opponent_representative_address"
                                                class="col-form-label col-sm-12 font-weight-bold text-info">Address</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control"
                                                    name="opponent_representative_address"
                                                    id="opponent_representative_address" placeholder="type">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3 p-0">
                                            <label for="opponent_coordination_name"
                                                class="col-form-label col-sm-12 font-weight-bold text-info">Opponent
                                                Coordinator Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control"
                                                    name="opponent_coordination_name" id="opponent_coordination_name"
                                                    placeholder="type">
                                            </div>
                                        </div>
                                        <div class="col-3 p-0">
                                            <label for="opponent_coordination_mobile"
                                                class="col-form-label col-sm-12 font-weight-bold text-info">Mobile</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control"
                                                    name="opponent_coordination_mobile"
                                                    id="opponent_coordination_mobile" placeholder="type">
                                            </div>
                                        </div>
                                        <div class="col-3 p-0">
                                            <label for="opponent_coordination_email"
                                                class="col-form-label col-sm-12 font-weight-bold text-info">Email</label>
                                            <div class="col-sm-12">
                                                <input type="email" class="form-control"
                                                    name="opponent_coordination_email" id="opponent_coordination_email"
                                                    placeholder="type">
                                            </div>
                                        </div>
                                        <div class="col-3 p-0">
                                            <label for="opponent_coordination_address"
                                                class="col-form-label col-sm-12 font-weight-bold text-info">Address</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control"
                                                    name="opponent_coordination_address"
                                                    id="opponent_coordination_address" placeholder="type">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <label for="opponent_info_previous_legal_dispute"
                                                    class="col-form-label col-sm-12 font-weight-bold text-info"
                                                    style="padding-top: 25px;">Previous Legal
                                                    Dispute</label>
                                                <div class="col-sm-12">
                                                    <textarea name="opponent_info_previous_legal_dispute" id="opponent_info_previous_legal_dispute" cols="30"
                                                        rows="3" class="form-control new" placeholder="Type previous legal dispute "></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <label for="opponent_info_special_note"
                                                    class="col-form-label col-sm-12 font-weight-bold text-info">Special
                                                    Note</label>
                                                <div class="col-sm-12">
                                                    <textarea name="opponent_info_special_note" id="opponent_info_special_note" cols="30" rows="3"
                                                        class="form-control new" placeholder="Type special note"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-navigation mt-3">
                            <div style="overflow:auto;">
                                <div style="float:right; margin-top: 30px;">
                                    <button type="button" class="previous" onclick="prev();">Previous</button>
                                    <button type="button" style="margin-right:4rem" class="next"
                                        onclick="next();">Next</button>
                                    <button type="submit" class="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- <div class="card-footer d-flex justify-content-between">
                    <button class="btn btn-danger" onclick="prev();">Previous</button>
                    <button class="btn btn-info" id="next-button" onclick="next();" id="">Next</button>
                </div> --}}
            </div>
        </div>
    </div>

    <script>
        var step = 1;

        function next() {
            $('#next-button').text('Next');
            if (step == 1) {
                $('#case-info').removeClass('btn-info');
                $('#case-info').addClass('btn-secondary');
                $('.case-info-section').addClass('d-none');

                $('#case-status').removeClass('btn-secondary');
                $('#case-status').addClass('btn-info');
                $('.case-status-section').removeClass('d-none');
            }
            if (step == 2) {
                $('#case-status').removeClass('btn-info');
                $('#case-status').addClass('btn-secondary');
                $('.case-status-section').addClass('d-none');

                $('#event-stage').removeClass('btn-secondary');
                $('#event-stage').addClass('btn-info');
                $('.event-stage-section').removeClass('d-none');
            }
            if (step == 3) {
                $('#event-stage').removeClass('btn-info');
                $('#event-stage').addClass('btn-secondary');
                $('.event-stage-section').addClass('d-none');

                $('#party-info').removeClass('btn-secondary');
                $('#party-info').addClass('btn-info');
                $('.party-info-section').removeClass('d-none');
            }
            if (step == 4) {
                $('#party-info').removeClass('btn-info');
                $('#party-info').addClass('btn-secondary');
                $('.party-info-section').addClass('d-none');

                $('#lawyer-info').removeClass('btn-secondary');
                $('#lawyer-info').addClass('btn-info');
                $('.lawyer-info-section').removeClass('d-none');
            }
            if (step == 5) {
                $('#lawyer-info').removeClass('btn-info');
                $('#lawyer-info').addClass('btn-secondary');
                $('.lawyer-info-section').addClass('d-none');

                $('#case-document').removeClass('btn-secondary');
                $('#case-document').addClass('btn-info');
                $('.case-document-section').removeClass('d-none');
                $('#next-button').text('Save');
            }
            if (step < 5) {
                window.scrollTo(0, 0);
                step++;
            }
        }


        function prev() {
            if (step > 1) {
                window.scrollTo(0, 0);
                step--;
                $('#next-button').text('Next');
                if (step == 1) {
                    $('#case-info').removeClass('btn-info');
                    $('#case-info').addClass('btn-secondary');
                    $('.case-info-section').addClass('d-none');

                    $('#case-status').removeClass('btn-secondary');
                    $('#case-status').addClass('btn-info');
                    $('.case-status-section').removeClass('d-none');
                }
                if (step == 2) {
                    $('#case-status').removeClass('btn-info');
                    $('#case-status').addClass('btn-secondary');
                    $('.case-status-section').addClass('d-none');

                    $('#event-stage').removeClass('btn-secondary');
                    $('#event-stage').addClass('btn-info');
                    $('.event-stage-section').removeClass('d-none');
                }
                if (step == 3) {
                    $('#event-stage').removeClass('btn-info');
                    $('#event-stage').addClass('btn-secondary');
                    $('.event-stage-section').addClass('d-none');

                    $('#party-info').removeClass('btn-secondary');
                    $('#party-info').addClass('btn-info');
                    $('.party-info-section').removeClass('d-none');
                }
                if (step == 4) {
                    $('#party-info').removeClass('btn-info');
                    $('#party-info').addClass('btn-secondary');
                    $('.party-info-section').addClass('d-none');

                    $('#lawyer-info').removeClass('btn-secondary');
                    $('#lawyer-info').addClass('btn-info');
                    $('.lawyer-info-section').removeClass('d-none');
                }
                if (step == 5) {
                    $('#lawyer-info').removeClass('btn-info');
                    $('#lawyer-info').addClass('btn-secondary');
                    $('.lawyer-info-section').addClass('d-none');

                    $('#case-document').removeClass('btn-secondary');
                    $('#case-document').addClass('btn-info');
                    $('.case-document-section').removeClass('d-none');
                    $('#next-button').text('Save');
                }
            }

        }

        // datetimepicker

        $(".").datetimepicker({
            format: 'Y-m-d H:i:s',
            formatTime: 'H:i:s',
            formatDate: 'Y-m-d',
            step: 5,
            minDate: 0,
            minTime: 0
        })

        // ajax


        function getClientSubCategories() {
            var category_id = $('#client_category_id').val();
            var subcategory = $('#client_subcategory_id');
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
            var zone = $('#');
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
            var zone_id = $('#').val();
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
            var thana = $('#police_station_id');
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



        // $(".btn_success_letter_notice").click(function () {
        //     var lsthmtl_letter_notice = $(".clone_letter_notice").html();
        //     $(".increment_letter_notice").after(lsthmtl_letter_notice);
        // });
        // $("body").on("click", ".btn_danger_letter_notice", function () {
        //     $(this).parents(".hdtuto_letter_notice").remove();
        // });

        // // edit

        // $(".btn_success_letter_notice_edit").click(function () {
        //     var lsthmtl_letter_notice_edit = $(".clone_letter_notice_edit").html();
        //     $(".clone_letter_notice").after(lsthmtl_letter_notice_edit);
        // });
        // $("body").on("click", ".btn_danger_letter_notice_edit", function () {
        //     $(this).parents(".hdtuto_letter_notice_edit").remove();
        // });
    </script>
    <style scoped>
        .legal-btn {
            width: 100%;
            height: 50px;
        }



        textarea.new {
            height: auto;
            min-height: 100px;
            padding: 20px;
        }

        .completed {

            color: #36b9cc !important;
            padding-top: 50px;
            margin-bottom: 25px;
            width: max-content;
            border-bottom: 1px solid #36b9cc;

        }

        .completed-2nd {
            color: #36b9cc !important;
            margin-bottom: 25px;
            width: max-content;
            border-bottom: 1px solid #36b9cc;
        }

        .file {
            padding-top: 10px;
        }

        .textarea {
            padding-top: 15px;
        }

        .legal-h3 {
            font-size: 22px;
            margin-top: 30px;
            margin-bottom: 20px;
        }
    </style>
    <script>
        /* Variables */
        var row = $(".attr");

        function addRow() {
            var html =
                '<div class="attr"><div class="input-group mb-3"><div class="input-group-prepend"><button onclick="removeRow(this);" class="btn btn-danger" type="button"><i class="fas fa-trash-alt"></i> </button></div><select required name="client_advocate_law_firm_id" class="form-control" id="client_advocate_law_firm_id"><option value="">Select</option><option  value=""></option></select></div></div>';
            $('.attributes').append(html);
            //   row.clone(true, true).appendTo(".attributes");
        }

        function removeRow(button) {
            button.closest("div.attr").remove();
        }

        $('#attributes .attr:first-child').find('.remove').hide();

        /* Doc ready */
        $(".add").on('click', function() {
            addRow();

        });
        $(".remove").on('click', function() {
            removeRow($(this));

        });
    </script>
    <script>
        /* Variables */
        var row = $(".lead");

        function add() {
            var html =
                '<div class="lead "><div class="input-group mb-3"><div class="input-group-prepend"><button onclick="remove(this);" class="btn btn-danger" type="button"><i class="fas fa-trash-alt"></i> </button></div><select required name="client_lead_lawyer_id" class="form-control" id="client_lead_lawyer_id"><option value="">Select</option><option  value=""></option></select></div></div>';
            $('.leadlawyer').append(html);
            //   row.clone(true, true).appendTo(".leadlawyer");
        }

        function remove(button) {
            button.closest("div.lead").remove();
        }

        $('#leadlawyer .lead:first-child').find('.remove').hide();
        /* Doc ready */
        $(".add_lead").on('click', function() {
            add();

        });
        $(".remove").on('click', function() {
            remove($(this));
        });
    </script>
    <script>
        /* Variables */
        var row = $(".Assigned");

        function add_ass() {
            var html =
                '<div class="Assigned item"><div class="input-group mb-3"><div class="input-group-prepend"><button id="Deleterow" class="btn btn-danger close-div" type="button"><i class="fas fa-trash-alt"></i> </button></div><select required name="client_assigned_lawyer_id" class="form-control" id="client_assigned_lawyer_id"><option value="">Select</option><option  value=""></option></select></div></div>';
            $('.Assignedlawyer').append(html);
            //   row.clone(true, true).appendTo(".Assignedlawyer");
        }

        $('#Assignedlawyer .Assigned:first-child').find('.remove').hide();
        /* Doc ready */
        $(".add_Assigned").on('click', function() {
            add_ass();

        });
        $("body").on("click", "#Deleterow", function() {
            $(this).parents(".item").remove();
        })
    </script>
    <script>
        /* Variables */
        var row = $(".Assigned-clerk");

        function add_clerk() {
            var html =
                '<div class="Assigned-clerk "><div class="input-group mb-3"><div class="input-group-prepend"><button id="Deletediv" class="btn btn-danger " type="button"><i class="fas fa-trash-alt"></i> </button></div><select onchange="getContact();" required name="client_assigned_clerk_id" class="form-control" id="client_assigned_clerk_id"><option></option></select></div></div>';
            $('.Assignedlawyer-clerk').append(html);
            //   row.clone(true, true).appendTo(".Assignedlawyer-clerk");
        }

        /* Doc ready */
        $(".add_clerk").on('click', function() {
            add_clerk();

        });
        $("body").on("click", "#Deletediv", function() {
            $(this).parents(".Assigned-clerk").remove();
        })
    </script>
    <script>
        /* Variables */
        var row = $(".contact");

        function add_contact() {
            var html =
                '<div class="contact_mai "><div class="input-group mb-3"><div class="input-group-prepend"><button id="Deletecon" class="btn btn-danger " type="button"><i class="fas fa-trash-alt"></i> </button></div>                                                                            <select required name="client_clerk_contact_number_id" class="form-control" id="client_clerk_contact_number_id"><option value="">Select</option></select></div></div>';
            $('.contact_main').append(html);
            //   row.clone(true, true).appendTo(".contact_main");
        }

        /* Doc ready */
        $(".add_contact").on('click', function() {
            add_contact();

        });
        $("body").on("click", "#Deletecon", function() {
            $(this).parents(".contact_mai").remove();
        })
    </script>
    <script>
        /* Variables */
        var row = $(".ducument");

        function add_ducument() {
            var html =
                '<div  class="row add_duc"> <div class="col-4"> <div class="form-group row"> <div class="col-sm-12"> <select name="document_recived_id" class="form-control" id="document_recived_id"> <option value="">Select</option> <option value="8">Charge Form</option> <option value="7">Charge Sheet</option> <option value="16">Cheque</option> <option value="15">Cheque Dishonour</option> <option value="5">Complaint</option> <option value="9">Investigation Report</option> <option value="14">Legal Notice (Served)</option> <option value="10">Legal Notice by 1st Party</option> <option value="11">Legal Notice by 2nd Party</option> <option value="12">Letter by 1st Party</option> <option value="13">Letter by 2nd Party</option> <option value="3">Petition</option> <option value="4">Plaint</option> <option value="6">Written Statement</option> </select> </div> </div> </div> <div class="col-4"> <div class="form-group row"> <div class="col-sm-12"> <input name="document_recived_type" type="text" class="form-control" placeholder="Type"> </div> </div> </div> <div class="col-2"> <div class="form-group row"> <div class="col-sm-12"> <input name="document_recived_date" type="date" class="form-control"> </div> </div> </div> <div class="col-2"> <div class="form-group row"> <div class="col-sm-8"> <select name="document_recived_type_id" class="form-control" id="document_recived_type_id"> <option value="">Select</option> <option value="CC">CC</option> <option value="COPY">COPY</option> <option value="ORG">ORG</option> </select> </div>  <button id="Deleteduc" class="btn btn-danger " type="button"><i class="fas fa-trash-alt"></i> </button> </div> </div> </div>';
            $('.add_ducument').append(html);
            //   row.clone(true, true).appendTo(".add_ducument");
        }

        /* Doc ready */
        $(".add_row").on('click', function() {
            add_ducument();

        });
        $("body").on("click", "#Deleteduc", function() {
            $(this).parents(".add_duc").remove();
        })
    </script>
    <script>
        /* Variables */
        var row = $(".requed_duc");

        function add_requed() {
            var html =
                '<div class="row add_reque"> <div class="col-4"> <div class="form-group row"> <div class="col-sm-12"> <select name="document_required_id" class="form-control" id="document_required_id"> <option value="">Select</option> <option value="8">Charge Form</option> <option value="7">Charge Sheet</option> <option value="16">Cheque</option> <option value="15">Cheque Dishonour</option> <option value="5">Complaint</option> <option value="9">Investigation Report</option> <option value="14">Legal Notice (Served)</option> <option value="10">Legal Notice by 1st Party</option> <option value="11">Legal Notice by 2nd Party</option> <option value="12">Letter by 1st Party</option> <option value="13">Letter by 2nd Party</option> <option value="3">Petition</option> <option value="4">Plaint</option> <option value="6">Written Statement</option> </select> </div> </div> </div> <div class="col-4"> <div class="form-group row"> <div class="col-sm-12"> <input name="document_required_type" type="text" class="form-control"> </div> </div> </div> <div class="col-2"> <div class="form-group row"> <div class="col-sm-12"> <input name="document_required_date" type="date" class="form-control"> </div> </div> </div> <div class="col-2"> <div class="form-group row"> <div class="col-sm-8"> <select name="document_required_type_id" class="form-control" id="document_required_type_id"> <option value="">Select</option> <option value="CC">CC</option> <option value="COPY">COPY</option> <option value="ORG">ORG</option> </select> </div> <button id="Deletereq" class="btn btn-danger " type="button"><i class="fas fa-trash-alt"></i> </button> </div> </div> </div>';
            $('.add_requed').append(html);
            //   row.clone(true, true).appendTo(".add_requed");
        }

        /* Doc ready */
        $(".add_col").on('click', function() {
            add_requed();

        });
        $("body").on("click", "#Deletereq", function() {
            $(this).parents(".add_reque").remove();
        })
    </script>
    <script>
        /* Variables */
        var row = $(".upload_duc");

        function add_upload() {
            var html =
                '<div class="row upload"> <div class="col-2"> <div class="form-group"> <input type="file" name="documents_file" id="documents_file" class="form-control" style="padding: 3px;"> </div> </div> <div class="col-2"> <div class="form-group"> <input name="documents_doc_date" id="documents_doc_date" class="form-control" type="date"> </div> </div> <div class="col-2"> <div class="form-group">  <select name="documents_type_id" class="form-control" id="documents_type_id"> <option value="">Select</option> <option value="CC">CC</option> <option value="COPY">COPY</option> <option value="ORG">ORG</option> </select> </div> </div> <div class="col-2"> <div class="form-group"><input name="documents_uploaded_by" id="documents_uploaded_by" class="form-control" readonly type="text"> </div> </div> <div class="col-2"> <div class="form-group"> <input name="documents_date_time" id="documents_date_time" class="form-control " type="text"> </div> </div> <div class="col-2"> <div class="form-group row"> <div class="col-sm-8">  <select name="documents_action_id" class="form-control" id="documents_action_id"> <option value="">Select</option> </select> </div><button id="Deleteup" class="btn btn-danger " type="button"><i class="fas fa-trash-alt"></i> </button>  </div> </div> </div>';
            $('.add_upload').append(html);
            //   row.clone(true, true).appendTo(".add_upload");
        }

        /* Doc ready */
        $(".add_uprow").on('click', function() {
            add_upload();

        });
        $("body").on("click", "#Deleteup", function() {
            $(this).parents(".upload").remove();
        })
    </script>
    <script>
        /* Variables */
        var row = $(".service");

        function add_metter() {
            var html =
                '<div class="service_all "><div class="input-group mb-3"><div class="input-group-prepend"><button id="Deleteser" class="btn btn-danger " type="button"><i class="fas fa-trash-alt"></i> </button></div>                                                                            <select required name="service_info_mater_id" class="form-control" id="service_info_mater_id"><option value="">Select</option></select></div></div>';
            $('.service_metter').append(html);
            //   row.clone(true, true).appendTo(".contact_main");
        }

        /* Doc ready */
        $(".add_metter").on('click', function() {
            add_metter();

        });
        $("body").on("click", "#Deleteser", function() {
            $(this).parents(".service_all").remove();
        })
    </script>
    <script>
        /* Variables */
        var row = $(".dispute");

        function add_dispute() {
            var html =
                '<div class="dispute_all "><div class="input-group mb-3"><div class="input-group-prepend"><button id="Deletedis" class="btn btn-danger " type="button"><i class="fas fa-trash-alt"></i> </button></div>                                                                             <input type="text" class="form-control" name="service_info_dispute"id="service_info_dispute" value="" placeholder="Type dispute"></div></div>';
            $('.add_dispute').append(html);
            //   row.clone(true, true).appendTo(".contact_main");
        }

        /* Doc ready */
        $(".add_dis").on('click', function() {
            add_dispute();

        });
        $("body").on("click", "#Deletedis", function() {
            $(this).parents(".dispute_all").remove();
        })
    </script>
    <script>
        /* Variables */
        var row = $(".client");

        function client_name() {
            var html =
                '<div class="client_name_new "><div class="input-group mb-3"><div class="input-group-prepend"><button id="Deleteclient" class="btn btn-danger " type="button"><i class="fas fa-trash-alt"></i> </button></div>                                                                             <select name="service_info_client_name_id"id="service_info_client_name_id" class="form-control select2"><option selected disabled hidden>Select</option><option value="">District</option><option value="">Special</option><option value="">High Court</option><option value="">Appellate</option> </select></div></div>';
            $('.client_name').append(html);
            //   row.clone(true, true).appendTo(".contact_main");
        }

        /* Doc ready */
        $(".add_client").on('click', function() {
            client_name();

        });
        $("body").on("click", "#Deleteclient", function() {
            $(this).parents(".client_name_new").remove();
        })
    </script>
    <script>
        /* Variables */
        var row = $(".legal");

        function legal_service() {
            var html =
                '<div class="legal_service_new "><div class="input-group mb-3"><div class="input-group-prepend"><button id="Deleteleg" class="btn btn-danger " type="button"><i class="fas fa-trash-alt"></i> </button></div>                                                                             <select name="service_info_legal_service_required_id"id="service_info_legal_service_required_id" class="form-control select2"><option selected disabled hidden>Select</option><option value="">District</option><option value="">Special</option><option value="">High Court</option><option value="">Appellate</option> </select></div></div>';
            $('.legal_service').append(html);
            //   row.clone(true, true).appendTo(".contact_main");
        }

        /* Doc ready */
        $(".add_legal").on('click', function() {
            legal_service();

        });
        $("body").on("click", "#Deleteleg", function() {
            $(this).parents(".legal_service_new").remove();
        })
    </script>
    <script>
        /* Variables */
        var row = $(".low");

        function all_low() {
            var html =
                '<div class="low_new "><div class="input-group mb-3"><div class="input-group-prepend"><button id="Deletelow" class="btn btn-danger " type="button"><i class="fas fa-trash-alt"></i> </button></div>                                                                             <select name="service_info_low_id"id="service_info_low_id" class="form-control select2"><option selected disabled hidden>Select</option><option value="">District</option><option value="">Special</option><option value="">High Court</option><option value="">Appellate</option> </select></div></div>';
            $('.all_low').append(html);
            //   row.clone(true, true).appendTo(".contact_main");
        }

        /* Doc ready */
        $(".add_low").on('click', function() {
            all_low();

        });
        $("body").on("click", "#Deletelow", function() {
            $(this).parents(".low_new").remove();
        })
    </script>
    <script>
        /* Variables */
        var row = $(".section");

        function all_section() {
            var html =
                '<div class="section_new "><div class="input-group mb-3"><div class="input-group-prepend"><button id="Deletesec" class="btn btn-danger " type="button"><i class="fas fa-trash-alt"></i> </button></div>                                                                             <select name="service_info_section_id" id="service_info_section_id" class="form-control select2"><option selected disabled hidden>Select</option><option value="">District</option><option value="">Special</option><option value="">High Court</option><option value="">Appellate</option> </select></div></div>';
            $('.all_section').append(html);
            //   row.clone(true, true).appendTo(".contact_main");
        }

        /* Doc ready */
        $(".add_allsection").on('click', function() {
            all_section();

        });
        $("body").on("click", "#Deletesec", function() {
            $(this).parents(".section_new").remove();
        })
    </script>
    <script>
        /* Variables */
        var row = $(".service_progress");

        function service_progress_status() {
            var html =
                '<div class="status_new "><div class="input-group mb-3"><div class="input-group-prepend"><button id="Deletestatus" class="btn btn-danger " type="button"><i class="fas fa-trash-alt"></i> </button></div>                                                                             <select name="service_progress_status" id="service_progress_status" class="form-control select2"><option selected disabled hidden>Select</option><option value="">District</option><option value="">Special</option><option value="">High Court</option><option value="">Appellate</option> </select></div></div>';
            $('.service_progress_status').append(html);
            //   row.clone(true, true).appendTo(".contact_main");
        }

        /* Doc ready */
        $(".add_status").on('click', function() {
            service_progress_status();

        });
        $("body").on("click", "#Deletestatus", function() {
            $(this).parents(".status_new").remove();
        })
    </script>
    <script>
        /* Variables */
        var row = $(".delivery");

        function delivery_to() {
            var html =
                '<div class="delivery_new "><div class="input-group mb-3"><div class="input-group-prepend"><button id="Deleteto" class="btn btn-danger " type="button"><i class="fas fa-trash-alt"></i> </button></div>                                                                             <select name="service_status_delivery_to_id"id="service_status_delivery_to_id" class="form-control select2"><option selected disabled hidden>Select</option><option value="">District</option><option value="">Special</option><option value="">High Court</option><option value="">Appellate</option> </select></div></div>';
            $('.delivery_to').append(html);
            //   row.clone(true, true).appendTo(".contact_main");
        }

        /* Doc ready */
        $(".add_delivery").on('click', function() {
            delivery_to();

        });
        $("body").on("click", "#Deleteto", function() {
            $(this).parents(".delivery_new").remove();
        })
    </script>
    <script>
        /* Variables */
        var row = $(".Evidence");

        function add_Evidence() {
            var html =
                '<div class="row uploadrow"> <div class="col-md-2"> <div class="form-group">  <input type="date" class="form-control"name="letter_notice_date" /></div> </div> <div class="col-md-2"> <div class="form-group">  <select name="letter_notice_documents_id" class="form-control"> <option value="">Select</option> <option value="8">Charge Form</option> <option value="7">Charge Sheet</option> <option value="16">Cheque</option> <option value="15">Cheque Dishonour</option> <option value="5">Complaint</option> <option value="9">Investigation Report</option> <option value="14">Legal Notice (Served)</option> <option value="10">Legal Notice by 1st Party</option> <option value="11">Legal Notice by 2nd Party</option> <option value="12">Letter by 1st Party</option> <option value="13">Letter by 2nd Party</option> <option value="3">Petition</option> <option value="4">Plaint</option> <option value="6">Written Statement</option> </select> </div> </div> <div class="col-md-2"> <div class="form-group"> <input type="text" class="form-control mt-2"name="letter_notice_documents_write" value="" placeholder="Document"> </div> </div> <div class="col-md-4"> <div class="form-group">  <input type="text" class="form-control"name="letter_notice_particulars_write" id="" value=""placeholder="Perticulars"> </div> </div> <div class="col-md-2"> <div class="form-group row"> <div class="col-sm-8">  <select name="letter_notice_type_id" class="form-control"id=""> <option value="">Select</option> <option value="2">CC</option> <option value="3">COPY</option> <option value="1">ORG</option> </select> </div> <button id="Deleteerow" class="btn btn-danger " type="button" ><i class="fas fa-trash-alt"></i> </button> </div> </div> </div>';
            $('.add_Evidence').append(html);
            //   row.clone(true, true).appendTo(".add_Evidence");
        }

        /* Doc ready */
        $(".add_Erow").on('click', function() {
            add_Evidence();

        });
        $("body").on("click", "#Deleteerow", function() {
            $(this).parents(".uploadrow").remove();
        })
    </script>
@endsection
