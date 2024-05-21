@extends('layouts.lawyer.layout')
@section('title')
<title>Cause List</title>
@endsection
@section('style')
{{-- datatable-yajra --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/scroller/2.1.1/css/scroller.dataTables.min.css" rel="stylesheet">
<style>
    .dt-buttons button {
        background-color: #0dcaf0;
        color: white;
        font-weight: bold;
    }

    .sorting {
        background-color: #1ec7ea;
        color: white;
    }

    .sorting_disabled {
        background-color: #1ec7ea;
        color: white;
    }

    .dataTables_info {
        font-weight: bold;
    }

    .dataTables_filter label {
        font-weight: bold;
    }

    .current {
        background-color: #1ec7ea !important;
    }

    .cause-header {
        display: flex;
        justify-content: space-between;
    }

    .button-icons {
        padding: 0px;
        width: 22px;
        border: 1px solid red;

        border-radius: 50%;
        height: 22px;
        font-size: 13px;
    }

    .comon .collapsed {
        border: 1px solid #0a58ca;
    }

    .dropbtn {
        background-color: #3498DB;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    .dropbtn:hover,
    .dropbtn:focus {
        background-color: #2980B9;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 100%;
        overflow: auto;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        top: 99px;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown a:hover {
        background-color: #ddd;
    }

    .show {
        display: block;
    }

    .dropbtn:after {
        font-family: fontAwesome;
        content: '+';
        float: right;
    }

    .dropbtn:before {
        font-family: fontAwesome;
        content: 'X';
    }

    [data-toggle="collapse"] .fa:before {
        content: "\f068";

    }

    .one [data-toggle="collapse"] .fa:before {
        content: "X";
        color: red;
    }

    .one [data-toggle="collapse"].collapsed .fa:before {
        content: "\f067";
        color: #0a58ca;
    }

    [data-toggle="collapse"].collapsed .fa:before {
        content: "\f067";
    }

    #collapseone {
        position: absolute;
        top: 75px;
        background: #fff;
        z-index: 999;
        width: 97.7%;
        left: 13px;
        box-shadow: 0 0px 27px rgb(40 42 53 / 20%);
    }

    .cause-header-collaps {
        border-bottom: 1px solid #000;
    }

    .cause-header-collaps h6 {
        padding: 13px;
        padding-left: 20px;
        padding-bottom: 2px;
    }

    .cause-form {
        padding: 40px 20px;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: auto;
        border-radius: 0.25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
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

    .billing-btn {
        display: flex;
        justify-content: space-between;
        padding-top: 65px;
        padding-bottom: 30px;
    }

    .card-header-report {
        margin-bottom: 20px;
    }

    .select2-container {
        box-sizing: border-box;
        display: inline-block;
        margin: 0;
        position: relative;
        vertical-align: middle;
        width: 100% !important;
    }

    .btn-info {
        color: #fff;
    }

    .table>:not(caption)>*>* {
        color: #000;
    }

    .cause-tb {
        border-bottom: 0 !important;
        padding-bottom: 0 !important;

        text-align: center;
    }

    table.table-bordered.dataTable th {
        text-align: center;
        padding-right: 10px !important;
        color: #0000009e;
        font-weight: 500;
        padding-top: 7px;
        font-size: 15px;
        line-height: 17px;
    }

table.dataTable tbody td {
    padding: 7px 10px;
    padding-top: 0;
    font-size: 15px;
    line-height: 14px;
}

    .card-header {
        padding: 0.5rem 1rem;
        margin-bottom: 0;
        background-color: rgb(0 0 0 / 0%);
        border-bottom: 2px solid rgb(0 0 0 / 42%);
    }

    .dataTable {
        text-align: center;
    }

    .cause-btn {
        background-color: #0d6efd !important;
        padding: 0 10px;
        height: 30px;
        line-height: 15px !important;
        color: #fff !important;

    }

    .cause-btn.dt-button span.dt-down-arrow {
        color: #fff !important;
    }

    .search-input {
        margin: 0 10px;
    }

    .last-cp {
        border: 0 !important;
        font-size: 15px;
        outline: 0 !important;

    }

    .last-cp:focus {
        outline: 0;
        box-shadow: 0 0 0 0.25rem #fff !important;
    }

    .cause-header-btn {
        background: #ffffff;
        border: 1px solid #ccc;
        padding: 3px 10px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        line-height: 19px;
        margin-right: 10px;

    }

    .cause-header-arrow {
        background: #ffffff;
        border: 1px solid #ccc;
        padding: 3px 5px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        line-height: 19px;
        margin-right: 10px;

    }

    .cause-header-arrow:hover {
        background: #0d6efd;
        color: #fff !important;
        text-decoration: none;
        border-color: #0d6efd;
    }

    .cause-header-btn:hover {
        background: #0d6efd;
        color: #fff !important;
        text-decoration: none;
        border-color: #0d6efd;
    }
    .calendar_list thead th {
        color:white;
    }
    a {
        text-decoration:none !important;
    }
    .dropbtn {
  border: none;
  cursor: pointer;
}

.dropdown {
  float: right;
  position: relative;
}

.dropdown-content {
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  right: 0;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.action_doc .dropdown-menu{
    left: -14px !important;
    top:5px !important;
    /*transform: translate3d(26px, -105px, 0px) !important;*/
}
.action_doc .dropdown-toggle::after {
    display: none;
}
.parent_tr{
    font-size:14px;
}
.table-striped>tbody>tr:nth-of-type(odd) {
    --bs-table-accent-bg: var(--bs-table-striped-bg);
    color: var(--bs-table-striped-color);
    line-height: 23px;
}
.table>:not(caption)>*>* {
    padding: 0.2rem 0.5rem;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
    /* height: 11px; */
}
tbody tr:hover {
    background-color: rgba(252, 252, 179, .45) !important;
}
.heading .btn {
    color: #a8abaf !important;
}
table.table-bordered.dataTable th {
    text-align: center;
    padding-right: 10px !important;
    color: #0000009e;
    font-weight: 500;
    padding-top: 1px;
    font-size: 13px;
    line-height: 17px;
    border-right: 1px solid #cccccc8c !important;
}
.action_doc .dropdown-menu {
    left: -6px !important;
    top: 5px !important;
    margin-right: 30px;
}
tbody .couse_tr:hover {
      background-color: #fff !important;
}
.table thead th {
    vertical-align: middle;
    border-bottom: 2px solid #e3e6f0;
    padding: 6px;
}
</style>
@endsection
@section('lawyer-content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow mb-2">
            <div class="cause-header p-3"style="padding-top: 5px !important;padding-bottom: 5px !important;">
                <span>All Cause List::Search</span>
                <div id="accordion">
                    <div class="">
                        <div class="one comon" id="headingone" style="margin-top: -3px;">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed button-icons" data-toggle="collapse" data-target="#collapseone" aria-expanded="false" aria-controls="collapseone">
                                    <i class="fa" aria-hidden="true"></i>
                                </button>
                            </h5>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div id="collapseone" class="collapse" aria-labelledby="headingone" data-parent="#accordion">
            <div class="card-body p-0" >
                <div class="cause-header-collaps">
                    <h6>Cause List Search </h6>
                </div>
                <form class="cause-form" action="" method="post">
                    <div class="case-info-section section">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="service_info_category_id" class="col-form-label font-weight-bold text-info ">Panel Lawyer</label>
                                    </div>

                                    <div class="col-md-8">
                                        <select name="service_info_category_id" id="service_info_category_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>
                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_info_type_id" class="col-form-label font-weight-bold text-info col-md-4">Client/Party</label>
                                    <div class="col-md-8">
                                        <select name="service_info_type_id" id="service_info_type_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="service_info_mater_id" class="col-form-label font-weight-bold text-info col-md-4">Case Metter</label>
                                    <div class="col-md-8">
                                        <select name="service_info_mater_id" id="service_info_mater_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>

                                    </div>

                                </div>


                            </div>
                            <div class="col-md-6">

                                <div class="form-group row">
                                    <label for="case_filing_date" class="col-form-label font-weight-bold text-info col-md-4">From Date</label>
                                    <div class="col-md-8">
                                        <input onchange="var type_text = $('#case_filing_date').val(); $('#disabled_case_filing_date').val(type_text);" type="date" id="case_filing_date" class="form-control" name="case_filing_date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="case_filing_date" class="col-form-label font-weight-bold text-info col-md-4">To Date</label>
                                    <div class="col-md-8">
                                        <input onchange="var type_text = $('#case_filing_date').val(); $('#disabled_case_filing_date').val(type_text);" type="date" id="case_filing_date" class="form-control" name="case_filing_date">
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-12">
                                <div class="billing-btn">
                                    <div class="d-flex">
                                        <label class="container-checkbox">Today
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container-checkbox">Tomorrow
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-info  mx-1" style="font-size: 14px;"><i class="fas fa-fw fa-search"></i> search</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <div class="card shadow ">

            <!--</div>-->
            <div class="card-body" style="padding-top: 10px !important;padding-bottom: 0px !important;">
                <div class="">
                    <div id="" class=" no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                            <div class="header-btn">
                                <a href="{{ url('lawyer/cause/create') }}" class="cause-header-btn">Today Case List</a>
                                <a href="{{ url('lawyer/litigation-calender-short') }}" class="cause-header-btn">Litigation Calender</a>
                                <a href="{{ url('lawyer/cause/create'.'?prev_day='.@$dates['0']) }}" class="cause-header-arrow"><i class="fas fa-fw fa-angle-left"></i></a>
                                <a href="{{ url('lawyer/cause/create'.'?next_day='.@$dates['0']) }}" class="cause-header-arrow"><i class="fas fa-fw fa-angle-right"></i></a>
                               
                            </div>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <div id="dataTable_filter" class="dataTables_filter text-end"><label>Search:<input type="search" class="search-input" id="search"></label></div>
                        <div class="dropdown float-right">
    <button class="btn btn-secondary btn-info-cause dropdown-toggle" style="background-color:#3aafa9;line-height:15px;height:30px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Columns
    </button>
    
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="#">
        <input type="checkbox" id="sl_no" checked="" class="sl_no" name="sl_no">            
        <label for="sl_no" class="sl_no">SL </label>
      </a>
      <a class="dropdown-item" href="#">
        <input type="checkbox" id="court" checked="" class="court" name="court">            
        <label for="court" class="court"> Court </label>
      </a>
      <a class="dropdown-item" href="#">
        <input type="checkbox" id="case_no" checked="" class="case_no" name="case_no">            
        <label for="case_no" class="case_no"> Case No. </label>
      </a>
      <a class="dropdown-item" href="#">
        <input type="checkbox" id="fixed_for" checked="" class="fixed_for" name="fixed_for">            
        <label for="fixed_for" class="fixed_for"> Fixed For </label>
      </a>
      <a class="dropdown-item" href="#">
        <input type="checkbox" id="police_station" class="police_station" name="police_station">            
        <label for="police_station" class="police_station"> Police Station </label>
      </a>
      <a class="dropdown-item" href="#">
        <input type="checkbox" id="party" checked="" class="party" name="party">            
        <label for="party" class="party"> Parties </label>
      </a>
      <a class="dropdown-item" href="#">
        <input type="checkbox" id="matter" checked="" class="matter" name="matter">            
        <label for="matter" class="matter"> Matter </label>
      </a>
      <a class="dropdown-item" href="#">
        <input type="checkbox" id="representative_name" checked="" class="representative_name" name="representative_name">            
        <label for="representative_name" class="representative_name"> Client representative </label>
      </a>
       <a class="dropdown-item" href="#">
        <input type="checkbox" id="opbn" class="opbn" name="opbn">            
        <label for="opbn" class="opbn"> Op. B.N </label>
      </a>
       <a class="dropdown-item" href="#">
        <input type="checkbox" id="type" class="type" name="type">            
        <label for="type" class="type"> Type </label>
      </a>
       <a class="dropdown-item" href="#">
        <input type="checkbox" id="pv_date"  class="pv_date" name="pv_date">            
        <label for="pv_date" class="pv_date"> Prv. Date </label>
      </a>
       <a class="dropdown-item" href="#">
        <input type="checkbox" id="pv_date_fixed_for" class="pv_date_fixed_for" name="pv_date_fixed_for">            
        <label for="pv_date_fixed_for" class="pv_date_fixed_for"> Prv.D Fixed For </label>
      </a>
      <a class="dropdown-item" href="#">
        <input type="checkbox" id="steps_notes" checked="" class="steps_notes" name="steps_notes">            
        <label for="steps_notes" class="steps_notes"> Next Step/Note </label>
      </a>
       <a class="dropdown-item" href="#">
        <input type="checkbox" id="lawyer" class="lawyer" name="lawyer">            
        <label for="lawyer" class="lawyer"> Lawyer </label>
      </a>
       <a class="dropdown-item" href="#">
        <input type="checkbox" id="action" checked="" class="action" name="action">            
        <label for="action" class="action"> Action </label>
      </a>
    </div>
  </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                
    </div>
                    <div class="row">
                        @foreach($dates as $key=>$date)
                        @php
                        $cpl = \App\CaseProceeding::whereHas('cases')->with('cases','cases.caseTitleShort','cases.assignedLawyer','fixed_for','cases.thana','cases.client','cases.matter','cases.type','lawyer')->whereLawyerId(auth()->guard('lawyer')->id())->whereDate('updated_next_date',$date)->orderBy('court')->get();
                        @endphp
                        <div class="col-sm-12">
                            <div class="card shadow mb-2">
                                <div class="card-body" style="padding-bottom:10px; padding-top:10px;">
                            <div class="cause_header d-flex" style="justify-content: space-between;">
                            <table class="table table-bordered dataTable m-0 " id=""  cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 60%;">
                                <thead>
                                    <tr >
                                        <th class="cause-tb" width="25%" style="color: #FF7034;font-weight:bold;font-size:15px;padding-top: 5px;">{{$date->format('d-m-Y')}}</th>
                                        <th class="cause-tb" width="12.5%">Total</th>
                                        <th class="cause-tb" width="12.5%">Civil</th>
                                        <th class="cause-tb" width="12.5%">Criminal</th>
                                        <th class="cause-tb" width="12.5%">Appeal</th>
                                        <th class="cause-tb" width="12.5%">Revision</th>
                                        <th class="cause-tb" width="12.5%">Others</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="couse_tr">
                                        <td style="color: #FF7034;font-weight:bold;width:100px;font-size: 13px;">{{$date->format('l')}}</td>
                                        <td style="width:60px;">{{$cpl->count()}}</td>
                                        <td style="width:60px;">{{$cpl->where('case_category','Civil')->count()}}</td>
                                        <td style="width:60px;">{{$cpl->where('case_category','Criminal')->count()}}</td>
                                        <td style="width:60px;">{{$cpl->where('case_type','Appeal')->count()}}</td>
                                        <td style="width:60px;">{{$cpl->where('case_type','Revision')->count()}}</td>
                                        <td style="width:60px;">0</td>
                                       
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered dataTable m-0 " id=""  cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 10%;">
                                <thead>
                                    <tr>
                                        <th class="cause-tb"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="couse_tr">
                                        <td>
                                            <div class="d-flex " style="justify-content: end;">
                                                <div id="accordion-{{$key}}">
                                                    <div class="">
                                                        <div class="heading" id="headingTwo-{{$key}}">
                                                            <h5 class="mb-0">
                                                               
                                                                <button class="btn btn-link button-icons last-cp p-0 mr-2" data-toggle="collapse" data-target="#collapseTwo-{{$key}}" aria-expanded="true" aria-controls="collapseTwo-{{$key}}">
                                                                    <i class="fa" aria-hidden="true"></i>
                                                                </button>
                                                             <div class="dropdown action_doc">
                                                              <button class="btn dropdown-toggle p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                               <i class="fas fa-ellipsis-h"></i>
                                                              </button>
                                                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="min-width:4rem !important;">
                                                                <a class="dropdown-item" href="#"> Email</a>
                                                                <a class="dropdown-item" href="#"> SMS</a>
                                                              </div>
                                                            </div>
                                                             <a target="_blank" href="{{url('lawyer/cause-list-print').'?date='.$date}}" class="btn btn-link p-0 mr-2">
                                                                    <i class="fas fa-print"></i>
                                                                </a>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                                
                            </div>
                            <div class="card">
                            <div id="collapseTwo-{{$key}}" class="show" aria-labelledby="headingTwo-{{$key}}" data-parent="#accordion-{{$key}}">
                                <div class="card-body p-0">
                                    <table class="table table-bordered table-striped calendar_list m-0">
                                        <thead>
                                            <tr style="background-color:#3aafa9">
                                                <th class="sl_no_column"  width="5%">SL</th>
                                                <th class="court_column" width="8%">Court</th>
                                                <th class="case_no_column" width="12%">Case No.</th>
                                                <th class="fixed_for_column" width="16%">Fixed For</th>
                                                <th class="police_station_column" width="11%">Police Station</th>
                                                <th class="party_column" width="18%">Parties</th>
                                                <th class="matter_column" width="11%">Matter</th>
                                                <th class="representative_name_column text-center" width="15%">Client Representative</th>
                                                <th class="opbn_column" width="8%">Op. B.N</th>
                                                <th class="type_column" width="8%">Type</th>
                                                <th class="pv_date_column" width="8%">Prv. Date</th>
                                                <th class="pv_date_fixed_for_column" width="17%">PV.D Fixed For</th>
                                                <th class="steps_notes_column" width="15%">Next Step/Note</th>
                                                <th class="lawyer_column" width="8%">Lawyer</th>
                                                <th class="action_column text-center" width="8%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cpl as $row)
                                            <tr class="parent_tr">
                                                <td class="sl_no_column">{{$loop->iteration}}</td>
                                                <td class="court_column"> {{$row->court}} </td>
                                                <td class="case_no_column"><a href="{{route('lawyer.litigation.case.show',$row->cases->id)}}" target="_blank"> {{ @$row->cases->caseTitleShort->name_short.' '.@$row->cases->case_infos_case_no.'/'.@$row->cases->case_infos_case_year }} </a></td>
                                                <td class="fixed_for_column">{{$row->next_fixed_for ? $row->next_fixed_for->name : $row->updated_index_fixed_for_write}}</td>
                                                <td class="police_station_column" >{{@$row->cases->thana->thana_name}}</td>
                                                @if($row->cases->client_party_id == 1)
                                                <td class="party_column" style="line-height: 18px;"><span style="color:blue;"> {{$row->cases->client_party_name}} </span> <span style="color:#FF7034">Vs </span>{{@$row->cases->opponent_info_name}} </td>
                                                @else
                                                <td class="party_column"> {{@$row->cases->opponent_info_name}} <span style="color:blue;"> <span style="color:#FF7034">Vs </span> {{$row->cases->client_party_name}} </span></td>
                                                @endif
                                                <td class="matter_column">{{@$row->cases->matter->name}} </td>
                                                <td class="representative_name_column" style="line-height: 18px;">{{@$row->cases->representative?->representative_name}} </td>
                                                <td class="opbn_column">{{@$row->cases->opponent_business_name}}</td>
                                                <td class="type_column">{{@$row->cases->type->name}}</td>
                                                <td class="pv_date_column">{{$row->updated_order_date ? $row->updated_order_date->format('d-m-Y') : ''}}</td>
                                                <td class="pv_date_fixed_for_column">{{$row->fixed_for ? $row->fixed_for->name : $row->updated_fixed_for_write}}</td>
                                                <td class="steps_notes_column">{{@$row->updated_remarks}}</td>
                                                <td class="lawyer_column">{{@$row->cases->assignedLawyer->personal_name}}</td>
                                                <td class="action_column">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                @php
                                                    $left = false;
                                                    $due = false;
                                                @endphp
                                                    @if($row->cases->cpl->count())
                                                        @foreach($row->cases->cpl as $cpl)
                                                            @if($cpl->bills && $cpl->bills->count())
                                                                @foreach($cpl->bills as $bill)
                                                                    @if($bill->ledgers->count())
                                                                        @php
                                                                        $received = $bill->ledgers()->sum('paid_received_amount');
                                                                        @endphp
                                                                        @if($bill->bill_amount > $received)
                                                                         @php
                                                                            $due = true;
                                                                            @endphp
                                                                        @endif
                                                                    @else
                                                                        @php
                                                                        $due = true;
                                                                        @endphp
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                @php
                                                                $left=true;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                        @if($left)
                                                            <i class="fa fa-times-circle" style="color:red"> B</i>
                                                        @else
                                                            @if($due)
                                                            <i class="fa fa-check" style="color:#1cc88a"> <span style="color:red">D</span></i>
                                                            @else
                                                            <i class="fa fa-check" style="color:#1cc88a"> P</i>
                                                            @endif
                                                        @endif
                                                    @else
                                                        <i class="fa fa-times-circle" style="color:red"> N</i>
                                                    @endif
                                                <div class="dropdown action_doc text-center" style="width:3rem">
                                                  <button class="btn dropdown-toggle p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                   <i class="fas fa-ellipsis-h"></i>
                                                  </button>
                                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="min-width:4rem !important;">
                                                    <a class="dropdown-item" href="{{route('lawyer.litigation.case.show',$row->cases->id)}}">View</a>
                                                    <a class="dropdown-item" href="{{route('lawyer.litigation.case.show',$row->cases->id).'?cpl=true'}}">CPL</a>
                                                    @if(!$row->bill)
                                                    <a class="dropdown-item" href="{{route('lawyer.account.billing-create',['cpl_id' => $row->id])}}"> BILL</a>
                                                    @endif
                                                    <a class="dropdown-item" href="#"> Call</a>
                                                    <a class="dropdown-item" href="#"> SMS</a>
                                                    <a class="dropdown-item" href="#"> Email</a>
                                                  </div>
                                                </div>
                                                </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
    

</div>
</div>


@endsection
@section('script')
{{-- datatable-yajra --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/scroller/2.1.1/js/dataTables.scroller.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script>

$('#search').keyup(function(){
 
  // Search text
  var text = $(this).val();
 
  // Hide all content class element
  $('.parent_tr').hide();
  console.log(text);
  if(text == ''){
      $('.parent_tr').show();
  }else{
      return;
    //   var check = $('.parent_tr:contains("'+text+'")');
  }

  // Search and show
//   $('.content:contains("'+text+'")').show();
 
 });

$(".police_station_column").hide();
$(".opbn_column").hide();
$(".type_column").hide();
$(".pv_date_fixed_for_column").hide();
$(".lawyer_column").hide();
$(".matter_column").hide();
$(".pv_date_column").hide();

    $(".sl_no").on('click', function () {
        $(".sl_no_column").toggle();
    });
    $(".court").on('click', function () {
        $(".court_column").toggle();
    });
    $(".case_no").on('click', function () {
        $(".case_no_column").toggle();
    });
    $(".fixed_for").on('click', function () {
        $(".fixed_for_column").toggle();
    });
    $(".police_station").on('click', function () {
        $(".police_station_column").toggle();
    });
    $(".party").on('click', function () {
        $(".party_column").toggle();
    });
    $(".matter").on('click', function () {
        $(".matter_column").toggle();
    });
    $(".representative_name").on('click', function () {
        $(".representative_name_column").toggle();
    });
    $(".opbn").on('click', function () {
        $(".opbn_column").toggle();
    });
    $(".type").on('click', function () {
        $(".type_column").toggle();
    });
    $(".pv_date").on('click', function () {
        $(".pv_date_column").toggle();
    });
    $(".pv_date_fixed_for").on('click', function () {
        $(".pv_date_fixed_for_column").toggle();
    });
    $(".steps_notes").on('click', function () {
        $(".steps_notes_column").toggle();
    });
    $(".lawyer").on('click', function () {
        $(".lawyer_column").toggle();
    });
    $(".action").on('click', function () {
        $(".action_column").toggle();
    });

</script>
@endsection