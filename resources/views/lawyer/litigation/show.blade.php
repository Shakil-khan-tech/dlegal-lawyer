@extends('layouts.lawyer.layout')
@section('title')
 <title>View Case</title>
@endsection
@section('style')
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/scroller/2.1.1/css/scroller.dataTables.min.css" rel="stylesheet">
<style>
  .btn-show {
    min-width: 100px;
    border: 1px solid #000;
    margin-bottom: 12px;
  }
  .case-nav {
    display: flex;
    justify-content: space-between;
    border: 0;
    color: #858796;
    font-size: 14px;
    font-weight: bolder;
  }
  .case-nav a {
    color: #858796;
  }
  .case-nav li .active,
  .case-nav li a:hover {
    color: #3aafa9;
    border-bottom: 1px solid #3aafa9;
    padding-bottom: 5px;
    text-decoration: none;
  }
  .events {
    display: flex;
    justify-content: space-between;
  }
  .events_table tr th {
    background: #0dcaf0;
    color: #fff;
    text-align: center;
    border: 0;
    border-right: 5px solid #fff;
  }
  .events_table tr td {
    border: 0;
    text-align: center;
    font-size: 14px;
    color: #000;
  }
  .events_table tr:nth-child(even) {
    background-color: rgba(0, 0, 0, .05);
  }
  .Party label,
  .lawyer label {
    color: #000000cf !important;
    font-size: 14px;
  }
  .Party textarea {
    margin-bottom: 15px;
  }
  .dataTables_length label {
    display: flex;
    font-size: 14px;
  }
  .dataTables_length .custom-select {
    height: 25px;
    font-size: 13px;
    margin-right: 5px;
    margin-left: 5px;
    width: 55px;
  }
  .dataTables_filter {
    display: flex;
    justify-content: end;
  }
  .dataTables_filter label {
    display: flex;
    justify-content: end;
  }
  .dataTables_filter label input {
    width: 120px;
    margin-left: 5px;
    height: 25px;
    margin-right: 15px;
  }
  .dataTables_filter .btn {
    height: 25px;
    line-height: 12px;
    font-size: 14px;
  }
  .log_table tr th {
    background: #0dcaf0;
    color: #fff;
    text-align: center;
    font-size: 12px;
    border: 0;
    padding: 7px 7px;
  }
  .log_table tr td {
    border: 0;
    text-align: center;
    font-size: 12px;
    padding: 12px 5px;
    color: #000;
  }
  .btn-last {
    font-size: 12px;
    padding: 1px 8px;
  }
  .btn-do {
    font-size: 8px;
    padding: 2px 5px;
    margin-right: 10px;
  }
  .log_table-do tr th {
    background: #0dcaf0;
    color: #fff;
    text-align: left;
    font-size: 12px;
    border: 0;
    padding: 7px 7px;
  }
  .log_table-do tr td {
    border: 0;
    text-align: left;
    font-size: 12px;
    padding: 12px 5px;
    color: #000;
  }
  .Click-here {
    cursor: pointer;
  }
  .custom-model-main {
    text-align: center;
    overflow: hidden;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
/* z-index: 1050; */
-webkit-overflow-scrolling: touch;
outline: 0;
opacity: 0;
-webkit-transition: opacity 0.15s linear, z-index 0.15;
-o-transition: opacity 0.15s linear, z-index 0.15;
transition: opacity 0.15s linear, z-index 0.15;
z-index: -1;
}
.model-open {
  z-index: 99999;
  opacity: 1;
  overflow: hidden;
}
.custom-model-inner {
  -webkit-transform: translate(0, -25%);
  -ms-transform: translate(0, -25%);
  transform: translate(0, -25%);
  -webkit-transition: -webkit-transform 0.3s ease-out;
  -o-transition: -o-transform 0.3s ease-out;
  transition: -webkit-transform 0.3s ease-out;
  -o-transition: transform 0.3s ease-out;
  transition: transform 0.3s ease-out;
  transition: transform 0.3s ease-out, -webkit-transform 0.3s ease-out;
  display: inline-block;
  vertical-align: middle;
  width: 550px;
  max-width: 97%;
}
.custom-model-wrap {
  display: block;
  width: 100%;
  position: relative;
  background-color: #fff;
  border: 1px solid #999;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 6px;
  -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
  box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
  background-clip: padding-box;
  outline: 0;
  text-align: left;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.model-open .custom-model-inner {
  -webkit-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  transform: translate(0, 0);
  position: relative;
  z-index: 999;
}
.model-open .bg-overlay {
  background: rgba(0, 0, 0, 0.6);
  z-index: 99;
}
.model-open{
  max-height: 600px;
  height: 600px;
  overflow: scroll;
  z-index: 99999999999;
}
.bg-overlay {
  background: rgba(0, 0, 0, 0);
  height: 100vh;
  width: 100%;
  position: fixed;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  z-index: 0;
  -webkit-transition: background 0.15s linear;
  -o-transition: background 0.15s linear;
  transition: background 0.15s linear;
}
.close-btn {
  cursor: pointer;
  z-index: 99;
  font-size: 20px;
  color: red;
  border: 1px solid red;
  padding: 5px;
  height: 22px;
  line-height: 10px;
  border-radius: 6px;
}
@media screen and (min-width:800px) {
  .custom-model-main:before {
    content: "";
    display: inline-block;
    height: auto;
    vertical-align: middle;
    margin-right: -0px;
    height: 100%;
  }
}
@media screen and (max-width:799px) {
  .custom-model-inner {
    margin-top: 45px;
  }
}
.update-div {
  border-bottom: 1px solid #ccc;
  padding: 20px;
  padding-bottom: 0;
}
.pop-up-content-wrap {
  padding: 20px;
}
.popup-m label {
  justify-content: left;
  color: #2a96a5 !important;
}
.popup-footer-btn {
  display: flex;
  justify-content: space-between;
}
.popup-footer {
  padding: 20px;
  border-top: 1px solid #ccc;
}
.f-btn {
  height: 30px !important;
  line-height: 15px !important;
  font-size: 14px;
  width: 80px;
}
.p-f-btn {
  height: 40px !important;
  line-height: 30px !important;
  font-size: 14px;
}
@media(max-width:767px) {
  .shadow {
    padding: 8px !important;
  }
  .btn-show {
    min-width: 80px;
    border: 1px solid #000;
    margin-bottom: 12px;
  }
  .case-nav {
    display: flex;
    justify-content: space-between;
    border: 0;
    color: #858796;
    font-size: 13px;
    font-weight: bolder;
    margin-right: 25px;
    padding-bottom: 21px;
  }
  .dataTables_filter {
    display: flex;
    justify-content: center;
  }
  .events h4 {
    color: #000;
    font-size: 20px;
    margin-top: 20px;
  }
  .events .fa-edit {
    margin-top: 20px;
  }
  .responsive {
    overflow-x: scroll;
  }
}
tr:hover {
  background-color: rgba(252, 252, 179, .45) !important;
}
tbody tr:nth-of-type(odd) {
  background-color: rgba(58, 175, 169, 0.1) !important;
}
.dropbtn {
  background-color: transparent !important;
  padding: 16px;
  padding-left: 0;
  font-size: 16px;
  border: none;
  cursor: pointer;
  color: blue;
}
.dropbtn:hover,
.dropbtn:focus {
  background-color: transparent;
}
.dropdown {
  position: relative;
  display: inline-block;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #bed9f5;
  min-width: 100px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1;
  border: 1px solid #ccc
}
.dropdown-content a {
  color: black;
  padding: 8px 15px;
  text-decoration: none;
  display: block;
}
.dropdown a:hover {
  background-color: #fff;
}
.show {
  display: block;
}
.card .card-header[data-toggle="collapse"]::after {
  position: absolute;
  right: 0;
  top: 0;
  padding-right: 0.725rem;
  line-height: 20px;
  font-weight: 900;
  content: "\f068";
  font-family: 'Font Awesome 5 Free';
  color: #000;
  font-size: 14px;
}
.card .card-header[data-toggle="collapse"] {
  text-decoration: none;
  position: relative;
  padding: 0.25rem 1.25rem 0.25rem 1.25rem;
}
.card .card-header[data-toggle="collapse"].collapsed::after {
  content: "\f067";
}
.card-header {
  padding: 0.75rem 1.25rem;
  margin-bottom: 0;
  background-color: transparent;
  border-bottom: 0;
}
.document-btn {
  font-size: 10px;
  height: 20px;
  padding: 3px 6px;
}
.remove-btn {
  font-size: 14px;
  height: 22px;
  padding: 3px 6px;
  color: #000 !important;
  margin-top: -3px;
}
.case-log tr th {
  background: #0dcaf0;
  color: #fff;
  font-size: 9px;
  border: 0;
  padding: 7px 2px;
}
.case-log.dataTable>thead>tr>th:not(.sorting_disabled),
.case-log.dataTable>thead>tr>td:not(.sorting_disabled) {
  padding-right: 11px;
}
.case-log tr td {
  border: 0;
  text-align: center;
  font-size: 12px;
  padding: 12px 5px;
  color: #000;
}
.case-log .dropbtn {
  background-color: transparent !important;
  padding: 0px;
  padding-left: 0;
  font-size: 16px;
  border: none;
  cursor: pointer;
  color: blue;
}
.log {
  width: 90% !important;
}
.tab-pane .form-control{font-size: 12px !important;}
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
@media (max-width:767px){
 .show__section{
   font-size:10px !important;
 } 
 .show_btn .btn {
  min-width: 70px;
}
.show_btn{
 text-align: left !important;
}
.sticky {
  position: fixed;
  top: 0;
  margin-left: -8px;
  margin-right: 0;
  width: 86%;
  background: #fff;
  z-index: 9999999999;
  box-shadow: 0 1.15rem 1.75rem 0 rgba(58, 59, 69, 0.15) !important;
  border-radius: 5px;
}
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
/*.action_doc .dropdown-menu{*/
/*  left: -35px !important;*/
/*  top:5px !important;*/
/*  transform: translate3d(-70px, -105px, 0px);*/
/*}*/
.dropdown{
    vertical-align: middle;
    text-align: center;
}
.Click-here{
    height:25px;
}
.dropdown-menu {
    position: absolute;
    top: 100%;
    right: 0 !important;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 3rem;
    padding: 0.5rem 0;
    margin: 0.125rem 0 0;
    font-size: 0.85rem;
    color: #858796;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #e3e6f0;
} 
.action_doc .dropdown-toggle::after {
  display: none;
}
.form-control:disabled, .form-control[readonly] {
    background-color: #ffffff !important;
    opacity: 1;
    color:#000;
}
.tab-pane .form-control {
    font-size: 14px !important;
}
.container, .container-fluid, .container-sm, .container-md, .container-lg, .container-xl {
    padding-left: 1rem;
    padding-right: 1rem;
}
.card-header-report {
   padding-bottom: 0px !important;
    padding-left: 1rem !important;
    border-bottom: 1px solid #837d7d66;
    width: 100%;
    padding-top: 5px !important;
    margin-bottom: 8px;
}
.card-header-report h4{
    font-weight: 700;
    font-size: 1.3rem !important;
}
.show_btn .btn-danger{
    background-color:#FF7034 !important;
}
.show_btn .btn-success{
        background-color: #717a85 !important;
}
.info_card {
    box-shadow: 0 0px 27px rgb(40 42 53 / 29%);
    border-radius: 8px;
    min-height: 518px;
}
.events_table tr th {
    background: #3AAFA9;
    padding: 4px;
}
.events_table tr td {
    border: 0;
    text-align: left;
    font-size: 14px;
    color: #000;
    padding: 4px;
}
.form-control:focus {
    color: #6e707e;
    background-color: #fff;
    border-color: #bac8f3;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgb(82 118 221 / 39%);
}
.bg-info tr:hover {
     background-color: transparent !important;
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
@endsection
@section('lawyer-content')
<!-- DataTales Example -->
<div class="row">
  <div class="col-12">
    <div class="card shadow mb-2">
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
                  <span style="color: #36b9cc;font-weight: bold;font-size: 14px;">{{ $cases->cpl()->latest('updated_order_date')->first() ? $cases->cpl()->latest('updated_order_date')->first()->updated_next_date?->format('d-m-Y'):'' }}</span>
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
<div class="card shadow mb-2 p-3">

  <ul class="nav nav-tabs case-nav">
    <li><a class="{{request()->cpl || request()->bill || request()->activity ? '': 'active'}}" data-toggle="tab" href="#active">Case Info</a></li>
    <li><a data-toggle="tab" href="#homeone">Case Status</a></li>
    <li><a data-toggle="tab" href="#home">Events & Stages</a></li>
    <li><a data-toggle="tab" href="#menu1">Party Info</a></li>
    <li><a data-toggle="tab" href="#menu2">Lawyer Info</a></li>
    <li><a data-toggle="tab" href="#menutow">Case Document</a></li>
    <li><a class="{{request()->cpl ? 'active': ''}}" href="{{route('lawyer.litigation.case.show',$cases->id).'?cpl=true'}}">Case Proceeding Log</a></li>
    <li><a class="{{request()->activity ? 'active': ''}}" href="{{route('lawyer.litigation.case.show',$cases->id).'?activity=true'}}">Case Activity Log</a></li>
    <li><a class="{{request()->bill ? 'active': ''}}" href="{{route('lawyer.litigation.case.show',$cases->id).'?bill=true'}}">Bill Log</a></li>
    <li><a data-toggle="tab" href="#menulast">Others </a></li>
  </ul>
</div>
<div class="">
  <div class="tab-content">
    <div id="active" class="tab-pane fade {{request()->cpl || request()->bill || request()->activity ? '': 'in active'}}">
      <div class="card shadow mb-3">
          <div class="card-header_show py-2">
            <h4 style="color: #3aafa9; margin-bottom:0; font-weight: 700;"> Case Information</h4>
            <div>
              <a href="{{route('lawyer.litigation.case.edit',$cases->id)}}"><i class="fas fa-fw fa-edit" style="color: #ccc;"></i></a>
            </div>
        </div>
        <div class="px-4">
          <div class="row Party">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for="" class="font-weight-bold text-info">Case
                      Class</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <div class="form-group">
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="{{ @$cases->case_class_id }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for=""
                      class="font-weight-bold text-info">ID</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <div class="form-group">
                        <input readonly type="Number" class="form-control" name=""
                        id="" value="{{ @$cases->id }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for="" class="font-weight-bold text-info">Case
                      Category</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <div class="form-group">
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="{{ @$cases->caseCategory->name }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for=""
                      class="font-weight-bold text-info">Division</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <div class="form-group">
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="{{ @$cases->division->division_name }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for="" class="font-weight-bold text-info">Case
                      Type</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <div class="form-group">
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="{{ @$cases->type->name }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for=""
                      class="font-weight-bold text-info">District</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <div class="form-group">
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="{{ @$cases->district->district_name }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for="" class="font-weight-bold text-info">Case
                      Mater</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <div class="form-group">
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="{{ @$cases->matter->name }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for=""
                      class="font-weight-bold text-info">Police Station</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <div class="form-group">
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="{{ @$cases->thana->thana_name }}">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">


              <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for="" class="font-weight-bold text-info">Case
                      Title (Full)</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <div class="form-group">
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="{{ @$cases->caseTitle->name }}">
                      </div>
                    </div>
                  </div>
                </div>

                

                <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for="" class="font-weight-bold text-info">Case
                      No.</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <div class="form-group">
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="{{ $cases->caseTitleShort->name_short.' '.$cases->case_infos_case_no.' / '.@$cases->case_infos_case_year }}" style="font-weight: bold;">
                      </div> 
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for="" class="font-weight-bold text-info">Case
                      Title (Short)</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <div class="form-group">
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="{{ @$cases->caseTitleShort->name_short }}">
                      </div>
                    </div>
                  </div>
                </div>

               


                <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for="" class="font-weight-bold text-info">Case
                      Filing Date</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <div class="form-group">
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="{{ $cases->case_filing_date->format('d/m/Y') }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for=""
                      class="font-weight-bold text-info">Law</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <div class="form-group">
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="{{ @$cases->law->name }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for=""
                      class="font-weight-bold text-info">Court</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <div class="form-group">
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="{{ @$cases->court->name }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for=""
                      class="font-weight-bold text-info">Section</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <div class="form-group">
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="{{ @$cases->section->name }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for="" class="font-weight-bold text-info">Court
                      (short) </label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <div class="form-group">
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="{{ @$cases->courtShort->name_short }}">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for=""
                      class="font-weight-bold text-info">1st Party</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <div class="form-group">
                         @if($cases->client_party_id == 1)
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="{{ $cases->client_party_name }}" style="font-weight: bold;">
                        @else
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="{{ $cases->opponent_info_name }}">
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for="" class="font-weight-bold text-info">Case
                      nature</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <div class="form-group">
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="{{ @$cases->nature->name }}">
                      </div>
                    </div>
                  </div>
                </div>
                 <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for=""
                      class="font-weight-bold text-info">2nd Party</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <div class="form-group">
                           @if($cases->client_party_id == 2)
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="{{ $cases->client_party_name }}" style="font-weight: bold;">
                        @else
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="{{ $cases->opponent_info_name }}">
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
               
                <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for="" class="font-weight-bold text-info">Case
                      Prayer</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <div class="form-group">
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="{{ @$cases->prayer->name }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for=""
                      class="font-weight-bold text-info">Client Representative</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <div class="form-group">
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="{{ @$cases->representative?->representative_name }}">
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for=""
                      class="font-weight-bold text-info">Allegation/claim</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <div class="form-group">
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="{{ @$cases->allegation_claim }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for=""
                      class="font-weight-bold text-info">Upcoming</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <div class="form-group">
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for=""
                      class="font-weight-bold text-info">Amount</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <div class="form-group">
                        <input readonly type="text" class="form-control" name=""
                        id=""  value="{{ number_format($cases->amount)}} /-">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-2 col-12 ">
                      <label for=""
                      class="font-weight-bold text-info">Summary of Facts</label>
                    </div>
                    <div class="col-lg-10 col-12">
                      <textarea readonly name="client_info_special_note" id="client_info_special_note" cols="30" rows="2"
                      class="form-control new"  spellcheck="false">{{ @$cases->summary_facts }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-2 col-12 ">
                      <label for=""
                      class="font-weight-bold text-info">Special Note </label>
                    </div>
                    <div class="col-lg-10 col-12">
                      <textarea readonly name="client_info_special_note" id="client_info_special_note" cols="30" rows="2"
                      class="form-control new"  spellcheck="false">{{ @$cases->special_note }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-2 col-12 ">
                      <label for=""
                      class="font-weight-bold text-info">Reference Case Info
                    </label>
                  </div>
                  <div class="col-lg-10 col-12">
                    <textarea readonly name="client_info_special_note" id="client_info_special_note" cols="30" rows="2"
                    class="form-control new"  spellcheck="false">{{ @$cases->reference_case_info }}</textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    @if($cases->subsequents)
    <style>
        .minus-header{
        border: 1px solid #0CA2A3;
        border-radius: 50%;
        color: #0CA2A3;
        width: 25px;
        height: 25px;
        line-height: 25px;
        text-align: center;
    }
    .header-main{
        padding: 8px 25px;
    }
    .header-main p{
        color: #000;
        font-size: 16px;
        font-weight: 500;
    }
    .signUp .modal-content{
        margin-top:170px;
    }
    </style>
    <div class="card shadow my-3 px-4">
        <div class="card-header-report">
                <div class="d-flex header-main justify-content-between">
                    <p class="mb-0">Subsequent Case</p>
                    <div class="minus-header">
                        <i class="fas fa-fw fa-plus fa-minus cursor-pointer" onclick="$('#custom-report').toggleClass('d-none');$('#report-icon').toggleClass('fa-plus');" style="cursor: pointer;" id="report-icon"></i>
                    </div>
                </div>
            </div>
    <div class="mt-3 manage_con d-none" id="custom-report">
    <div class="">
        @foreach($cases->subsequents as $sub)
      <div class="row">
        <div class="col-6">
          <div class="form-group row"> <label for="new_case_infos_case_title_id" class="col-form-label font-weight-bold text-info col-md-4">Case Title (Full)</label>
            <div class="col-md-8"> 
            <input readonly="" type="text" class="form-control" name="" id="" value="{{$sub->caseTitle->name}}">
            </div>
          </div>
          <div class="form-group row"> <label for="new_law_id" class="col-form-label font-weight-bold text-info col-md-4">Law</label>
            <div class="col-md-8"> 
              <input readonly="" type="text" class="form-control" name="" id="" value="{{$sub->law?->name}}">
            </div>
          </div>
          <div class="form-group row">
            <label for="new_section_id" class="col-form-label font-weight-bold text-info col-md-4">Section</label>
            <div class="col-md-8">
              <input readonly="" type="text" class="form-control" name="" id="" value="{{$sub->section}}">
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group row"> <label for="" class="col-form-label font-weight-bold text-info col-md-4">Case No</label>
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-6"> <input readonly="" type="text" class="form-control" name="" value="{{$sub->case_infos_case_no}}"> </div>
                <div class="col-md-6"> <input readonly="" type="text" class="form-control" name="" value="{{$sub->case_infos_case_year}}"> </div>
              </div>
            </div>
          </div>

          <div class="form-group row"> <label for="new_case_filing_date" class="col-form-label font-weight-bold text-info col-md-4">Case Filing Date</label>
            <div class="col-md-8"> <input readonly="" class="form-control" name="" value="{{ $sub->case_filing_date->format('d-m-Y')}}"> </div>
          </div>
          <div class="form-group row"> <label for="new_court_id" class="col-form-label font-weight-bold text-info col-md-4">Court</label>
            <div class="col-md-8"> 
            <input readonly="" type="text" class="form-control" name="" id="" value="{{$sub->court->name}}">
             </div>
          </div>
          <a class="btn btn-info float-lg-right mb-3 mx-3" href="{{route('lawyer.litigation.case.sequent.edit',$sub->id)}}"><i class="fas fa-edit"></i>
          </a>
          <a onclick="check({{$sub->id}})" class="btn btn-danger float-lg-right mb-3 delete-{{$sub->id}}"  data-href="{{route('lawyer.litigation.case.sequent.delete',$sub->id)}}"><i class="fas fa-trash-alt"></i>
          </a>
        </div>
        
      </div>
      <hr>
      @endforeach
    </div>
  </div>
    </div>
    <script>
  function check(id){
      var url = $('.delete-'+id).attr('data-href');
      $('.delete-'+id).safeDelete({
        popupTitle : "Type Confirm",
            safeText : "Confirm",
        yesCallback : function(){
         location.href=url;
        }
      });
  }
  </script>
    @endif
  </div>
  <div id="homeone" class="tab-pane fade">
    <div class=" mb-3">
      <div class="row lawyer">
        <div class="col-lg-6 col-12 pr-0">
             <div class="info_card">
            <div class="card-header_show py-2">
            <h4 style="color: #3aafa9; margin-bottom:0; font-weight: 700;">Running Case Status</h4>
           <div>
              <a href="{{route('lawyer.litigation.case.edit',$cases->id)}}"><i class="fas fa-fw fa-edit" style="color: #ccc;"></i></a>
            </div>
          </div>
          <div class=" p-4" style="padding-top:0 !important">
          <div class="row">
            <div class="col-lg-5 col-12 ">
              <label for="" class="font-weight-bold text-info">Case Id</label>
            </div>
            <div class="col-lg-7 col-12">
              <div class="form-group">
                <input readonly style="background-color: #dddbdb;" type="text"
                class="form-control" value="{{ $cases->id }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-5 col-12 ">
              <label for="" class="font-weight-bold text-info">Case Status</label>
            </div>
            <div class="col-lg-7 col-12">
              <div class="form-group">
                <input readonly type="text" class="form-control" name="" id=""
                value="{{ @$cases->status->name }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-5 col-12 ">
              <label for="" class="font-weight-bold text-info">Case Progress
              Status</label>
            </div>
            <div class="col-lg-7 col-12">
              <div class="form-group">
                <input readonly style="background-color: #dddbdb;" type="text"
                class="form-control" name="" id=""
                value="{{ @$cases->case_progress_status }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-5 col-12 ">
              <label for="" class="font-weight-bold text-info">Case Type</label>
            </div>
            <div class="col-lg-7 col-12">
              <div class="form-group">
                <input readonly style="background-color: #dddbdb;" type="text"
                class="form-control" name="" id=""
                value="{{ @$cases->type->name }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-5 col-12 ">
              <label for="" class="font-weight-bold text-info">Date of
              Filing</label>
            </div>
            <div class="col-lg-7 col-12">
              <div class="form-group">
                <input readonly style="background-color: #dddbdb;" type="text"
                class="form-control" name="" id=""
                value="{{ $cases->case_filing_date->format('d-m-Y')}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-5 col-12 ">
              <label for="" class="font-weight-bold text-info">Next Case
              Date</label>
            </div>
            <div class="col-lg-7 col-12">
              <div class="form-group">
                <input readonly style="background-color: #dddbdb;" type="text"
                class="form-control" name="" id=""
                value="{{ $cases->next_case_date ? $cases->next_case_date->format('d-m-Y'):'' }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-5 col-12 ">
              <label for="" class="font-weight-bold text-info">Next Date Fixed
              For</label>
            </div>
            <div class="col-lg-7 col-12">
              <div class="form-group">
                <input readonly style="background-color: #dddbdb;" type="text"
                class="form-control" name="" id=""
                value="{{ @$cases->next_date_fixed_for }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-5 col-12 ">
              <label for="" class="font-weight-bold text-info">Note</label>
            </div>
            <div class="col-lg-7 col-12">
              <div class="form-group">
                <input readonly style="background-color: #dddbdb;" type="text"
                class="form-control" name="" id=""
                value="{{ @$cases->case_status_note }}">
              </div>
            </div>
          </div>
        </div>
        </div>
    </div>
        <div class="col-lg-6 col-12">
            <div class="info_card">
             <div class="card-header_show py-2">
            <h4 style="color: #3AAFA9; margin-bottom:0; font-weight: 700;">Disposed Case Status</h4>
            <div>
              <a href="{{route('lawyer.litigation.case.edit',$cases->id)}}"><i class="fas fa-fw fa-edit" style="color: #ccc;"></i></a>
            </div>
          </div>
          <div class=" p-4"style="padding-top:0 !important">
          <div class="row">
            <div class="col-lg-5 col-12 ">
              <label for="" class="font-weight-bold text-info">Disposed
              Status</label>
            </div>
            <div class="col-lg-7 col-12">
              <div class="form-group">
                <input readonly type="text" class="form-control" name="" id=""
                value="{{ @$cases->disposedStatus->name }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-5 col-12 ">
              <label for="" class="font-weight-bold text-info">Date Of
              Disposed</label>
            </div>
            <div class="col-lg-7 col-12">
              <div class="form-group">
                <input readonly type="text" class="form-control" name="" id=""
                value="{{ @$cases->date_of_diposed }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-5 col-12 ">
              <label for="" class="font-weight-bold text-info">Disposed By</label>
            </div>
            <div class="col-lg-7 col-12">
              <div class="form-group">
                <input readonly type="text" class="form-control" name="" id=""
                value="{{ @$cases->disposedBy->name }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-5 col-12 ">
              <label for="" class="font-weight-bold text-info">Evidence Of
              Disposed</label>
            </div>
            <div class="col-lg-7 col-12">
              <div class="form-group">
                <input readonly type="text" class="form-control" name="" id=""
                value="{{ @$cases->diposedEvidence->name }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-5 col-12 ">
              <label for="" class="font-weight-bold text-info">Evidence Type</label>
            </div>
            <div class="col-lg-7 col-12">
              <div class="form-group">
                <input readonly type="text" class="form-control" name="" id=""
                value="{{ @$cases->evidenceType->name }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-5 col-12 ">
              <label for="" class="font-weight-bold text-info">Note</label>
            </div>
            <div class="col-lg-7 col-12">
              <textarea readonly name="client_info_special_note" id="client_info_special_note" cols="30" rows="3"
              class="form-control new"  spellcheck="false">{{ @$cases->note }}</textarea>
            </div>
          </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
  <div id="home" class="tab-pane fade ">
    <div class="card shadow mb-3 ">
        <div class="card-header_show py-2">
            <h4 style="color: #3AAFA9; margin-bottom:0; font-weight: 700;">Events & Incidents</h4>
           <div>
               <a href="#"> <i class="fas fa-fw fa-edit"style="color: #ccc;"></i></a>
           
            </div>
          </div>
      <div class="px-3 responsive">
        <table class="table  events_table ">
          <thead>
            <tr>
              <th scope="col" style="width:15%;">Date</th>
              <th scope="col" style="width:35%;">Title</th>
              <th scope="col" style="width:35%;">Description</th>
              <th scope="col" style="border-right: 0 !important; width:15%;">Evidence</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ @$cases->letter_notice_date }}</td>
              <td>  </td>
              <td>{{ @$cases->letter_notice_particulars_write }}</td>
              <td>{{ @$cases->evidence }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card shadow mb-3 ">
        <div class="card-header_show py-2">
            <h4 style="color: #3AAFA9; margin-bottom:0; font-weight: 700;">Stages Steps</h4>
           <div>
               <a href="#"> <i class="fas fa-fw fa-edit"style="color: #ccc;"></i></a>
             
            </div>
          </div>

      <div class="px-3 responsive">
        <table class="table  events_table ">
          <thead>
            <tr>
              <th scope="col" style="width:25%;">STAGE</th>
              <th scope="col" style="width:15%;">DATE</th>
              <th scope="col" style="width:45%;">NOTE</th>
              <th scope="col" style="border-right: 0 !important;width:15%;">Evidence</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Case Filed</td>
              <td>{{ @$cases->case_steps_filing }}</td>
              <td>{{ @$cases->case_steps_filing_note }}</td>
              <td>{{ @$cases->evidence->name }}</td>
            </tr>
            <tr>
              <td>Service Return</td>
              <td>{{ @$cases->case_steps_service_return }}</td>
              <td>{{ @$cases->case_steps_service_return_note }}</td>
              <td>{{ @$cases->evidence->name }}</td>
            </tr>
            <tr>
              <td>S.R. Completed</td>
              <td>{{ @$cases->case_steps_sr_completed }}</td>
              <td>{{ @$cases->case_steps_sr_completed_note }}</td>
              <td>{{ @$cases->evidence->name }}</td>
            </tr>
            <tr>
              <td>Set Off</td>
              <td>{{ @$cases->case_steps_set_off }}</td>
              <td>{{ @$cases->case_steps_set_off_note }}</td>
              <td>{{ @$cases->evidence->name }}</td>
            </tr>
            <tr>
              <td>Issue Frame </td>
              <td>{{ @$cases->case_steps_issue_frame }}</td>
              <td>{{ @$cases->case_steps_issue_frame_note }}</td>
              <td>{{ @$cases->evidence->name }}</td>
            </tr>
            <tr>
              <td>PH</td>
              <td>{{ @$cases->case_steps_ph }}</td>
              <td>{{ @$cases->case_steps_ph_note }}</td>
              <td>{{ @$cases->evidence->name }}</td>
            </tr>
            <tr>
              <td>F.PH</td>
              <td>{{ @$cases->case_steps_fph }}</td>
              <td>{{ @$cases->case_steps_fph_note }}</td>
              <td>{{ @$cases->evidence->name }}</td>
            </tr>
            <tr>
              <td> Taking Cognizance </td>
              <td>{{ @$cases->taking_cognizance }}</td>
              <td>{{ @$cases->taking_cognizance_note }}</td>
              <td>{{ @$cases->evidence->name }}</td>
            </tr>
            <tr>
              <td> Arrest/Surrender/C.W.</td>
              <td>{{ @$cases->arrest_surrender_cw }}</td>
              <td>{{ @$cases->arrest_surrender_cw_note }}</td>
              <td>{{ @$cases->evidence->name }}</td>
            </tr>
            <tr>
              <td> Court Transfer</td>
              <td>{{ @$cases->case_steps_court_transfer }}</td>
              <td>{{ @$cases->case_steps_court_transfer_note }}</td>
              <td>{{ @$cases->evidence->name }}</td>
            </tr>
            <tr>
              <td> Bail</td>
              <td>{{ @$cases->case_steps_bail }}</td>
              <td>{{ @$cases->case_steps_bail_note }}</td>
              <td>{{ @$cases->evidence->name }}</td>
            </tr>
            <tr>
              <td> Witness (From)</td>
              <td>{{ @$cases->case_steps_witness_from }}</td>
              <td>{{ @$cases->case_steps_witness_from_note }}</td>
              <td>{{ @$cases->evidence->name }}</td>
            </tr>
            <tr>
              <td> Witness (To)</td>
              <td>{{ @$cases->case_steps_witness_to }}</td>
              <td>{{ @$cases->case_steps_witness_to_note }}</td>
              <td>{{ @$cases->evidence->name }}</td>
            </tr>
            <tr>
              <td> Argument</td>
              <td>{{ @$cases->case_steps_argument }}</td>
              <td>{{ @$cases->case_steps_argument_note }}</td>
              <td>{{ @$cases->evidence->name }}</td>
            </tr>
            <tr>
              <td> Judgement &amp; Order</td>
              <td>{{ @$cases->case_steps_judgement_order }}</td>
              <td>{{ @$cases->case_steps_judgement_order_note }}</td>
              <td>{{ @$cases->evidence->name }}</td>
            </tr>
            <tr>
              <td> Subsequent Status</td>
              <td>{{ @$cases->case_steps_subsequent_status }}</td>
              <td>{{ @$cases->case_steps_subsequent_status_note }}</td>
              <td>{{ @$cases->evidence->name }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div id="menu1" class="tab-pane fade">
    <div class="card shadow mb-3 ">
        <div class="card-header_show py-2">
            <h4 style="color: #3AAFA9; margin-bottom:0; font-weight: 700;">Client Info</h4>
           <div>
                <a href="{{route('lawyer.litigation.case.edit',$cases->id)}}"><i class="fas fa-fw fa-edit" style="color: #ccc;"></i></a>
           
            </div>
          </div>
      <div class="px-3">
        <form action="">
          <div class="row Party">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-6 col-12">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for=""
                      class="font-weight-bold text-info">Client (On behalf
                    of)</label>
                  </div>
                  <div class="col-lg-8 col-12">
                    <div class="form-group">
                      <input readonly type="text" class="form-control" name=""
                      id=""  value="{{ @$cases->clientOnBehalf->name }}">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-12">
                <div class="row">
                  <div class="col-lg-4 col-8 ">
                    <label for=""
                    class="font-weight-bold text-info">Division</label>
                  </div>
                  <div class="col-lg-8 col-12">
                    <div class="form-group">
                      <input readonly type="text" class="form-control" name=""
                      id=""  value="{{ @$cases->clientDivision->division_name }}">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-12">
                <div class="row">
                  <div class="col-lg-4 col-8">
                    <label for=""
                    class="font-weight-bold text-info">Zone</label>
                  </div>
                  <div class="col-lg-8 col-12">
                    <div class="form-group">
                      <input readonly type="text" class="form-control" name=""
                      id=""  value="{{ @$cases->ClientZone->name }}">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-12">
                <div class="row">
                  <div class="col-lg-4 col-12">
                    <label for=""
                    class="font-weight-bold text-info">Client Category</label>
                  </div>
                  <div class="col-lg-8 col-12">
                    <div class="form-group">
                      <input readonly type="text" class="form-control" name=""
                      id=""  value="{{ @$cases->clientCategory->name }}">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-12">
                <div class="row">
                  <div class="col-lg-4 col-12">
                    <label for=""
                    class="font-weight-bold text-info">District</label>
                  </div>
                  <div class="col-lg-8 col-12">
                    <div class="form-group">
                      <input readonly type="text" class="form-control" name=""
                      id=""  value="{{ @$cases->clientDistrict->district_name }}">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-12">
                <div class="row">
                  <div class="col-lg-4 col-12 ">
                    <label for=""
                    class="font-weight-bold text-info">Area</label>
                  </div>
                  <div class="col-lg-8 col-12">
                    <div class="form-group">
                      <input readonly type="text" class="form-control" name=""
                      id=""  value="{{ @$cases->ClientArea->name }}">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-12">
                <div class="row">
                  <div class="col-lg-4 col-12 ">
                    <label for=""
                    class="font-weight-bold text-info">Client
                  Sub-Category</label>
                </div>
                <div class="col-lg-8 col-12">
                  <div class="form-group">
                    <input readonly type="text" class="form-control" name=""
                    id=""  value="{{ @$cases->clientSubCategory->name }}">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-12">
              <div class="row">
                <div class="col-lg-4 col-12 ">
                  <label for=""
                  class="font-weight-bold text-info">Police Station</label>
                </div>
                <div class="col-lg-8 col-12">
                  <div class="form-group">
                    <input readonly type="text" class="form-control" name=""
                    id=""  value="{{ @$cases->clientThana->thana_name }}">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-12">
              <div class="row">
                <div class="col-lg-4 col-12 ">
                  <label for=""
                  class="font-weight-bold text-info">Branch</label>
                </div>
                <div class="col-lg-8 col-12">
                  <div class="form-group">
                    <input readonly type="text" class="form-control" name=""
                    id=""  value="{{ @$cases->clientBranch->name }}">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-12">
              <div class="row">
                <div class="col-lg-4 col-12 ">
                  <label for=""
                  class="font-weight-bold text-info">Client</label>
                </div>
                <div class="col-lg-8 col-12">
                  <div class="form-group">
                    <input readonly type="text" class="form-control" name=""
                    id=""  value="{{ @$cases->client->name }}">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-12">
              <div class="row">
                <div class="col-lg-2 col-12 ">
                  <label for=""
                  class="font-weight-bold text-info">Client Group</label>
                </div>
                <div class="col-lg-10 col-12">
                  <div class="form-group">
                    <input readonly type="text" class="form-control" name=""
                    id=""  value="{{ @$cases->client_group }}">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-12">
              <div class="row">
                <div class="col-lg-2 col-12 ">
                  <label for=""
                  class="font-weight-bold text-info">Client
                Profession</label>
              </div>
              <div class="col-lg-10 col-12">
                <div class="form-group">
                  <input readonly type="text" class="form-control" name=""
                  id=""  value="{{ @$cases->client_profession }}">
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-12">
            <div class="row">
              <div class="col-lg-4 col-12 ">
                <label for=""
                class="font-weight-bold text-info">Client Business
              Name</label>
            </div>
            <div class="col-lg-8 col-12">
              <div class="form-group">
                <input readonly type="text" class="form-control" name=""
                id=""  value="{{ @$cases->client_business_name }}">
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-12">
          <div class="row">
            <div class="col-lg-4 col-12 ">
              <label for="" class="font-weight-bold text-info"
              style="">Client Communication</label>
            </div>
            <div class="col-lg-8 col-12">
              <div class="form-group">
                <input readonly type="text" class="form-control" name=""
                id=""  value="{{ @$cases->client_communication }}">
              </div>
            </div>
          </div>
        </div>
        <!--<div class="col-lg-3 col-12">-->
        <!--  <div class="row">-->
        <!--    <div class="col-lg-4 col-12 ">-->
        <!--      <label for=""-->
        <!--      class="font-weight-bold text-info">Email</label>-->
        <!--    </div>-->
        <!--    <div class="col-lg-8 col-12">-->
        <!--      <div class="form-group">-->
        <!--        <input readonly type="text" class="form-control" name=""-->
        <!--        id=""  value="{{ @$cases->client_email }}">-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
        <div class="col-lg-2 col-12">
          <div class="row">
            <div class="col-lg-12 col-12 ">
              <label for=""
              class="font-weight-bold text-info">Client (Party)</label>
            </div>
          </div>
        </div>
        <div class="col-lg-10 col-12">
          <div class="row">
            <div class="col-4">
              <div class="row">
                <div class="col-lg-12 col-12 ">
                  <label for=""
                  class="font-weight-bold text-info">Name</label>
                </div>
                <div class="col-lg-12 col-12">
                  <div class="form-group">
                    <input readonly type="text" class="form-control"
                    name="" id=""
                    value="{{ @$cases->client_party_name }}">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="row">
                <div class="col-lg-12 col-12 ">
                  <label for=""
                  class="font-weight-bold text-info">Mobile</label>
                </div>
                <div class="col-lg-12 col-12">
                  <div class="form-group">
                    <input readonly type="text" class="form-control"
                    name="" id=""
                    value="{{ @$cases->client_party_mobile }}">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="row">
                <div class="col-lg-12 col-12 ">
                  <label for=""
                  class="font-weight-bold text-info">Email</label>
                </div>
                <div class="col-lg-12 col-12">
                  <div class="form-group">
                    <input readonly type="text" class="form-control"
                    name="" id=""
                    value="{{ @$cases->client_party_email }}">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        @if($cases->client_party_others)
        <div class="col-lg-2 col-12">
            <label for="" class="col-form-label col-sm-12 font-weight-bold text-info">Client Party Others</label>
        </div>
        <div class="col-lg-10 col-12">
            <div class="form-group">
                <input readonly disabled value="{{ @$cases->client_party_others }}" name="client_party_others" type="text" id="tags" class="form-control" data-role="tagsinput" >
            </div>
        </div>
        @endif
        
        @if($cases->client_party_extra)
        <div class="col-lg-2 col-12">
            <label for="" class="col-form-label col-sm-12 font-weight-bold text-info">Client Party Extra</label>
        </div>
        <div class="col-lg-10 col-12">
            <div class="form-group">
                <textarea name='client_party_extra' class='form-control some_class_name' style="height: 85px;" readonly>
                    {!! @$cases->client_party_extra !!}
                </textarea>
            </div>
        </div>
        @endif
        
        <div class="col-lg-2 col-12">
          <div class="row">
            <div class="col-lg-12 col-12 ">
              <label for=""
              class="font-weight-bold text-info">Client Representative</label>
            </div>
          </div>
        </div>
        <div class="col-lg-10 col-12">
          <div class="row">
            <div class="col-4">
              <div class="row">
                <div class="col-lg-12 col-12 ">
                  <label for=""
                  class="font-weight-bold text-info">Name</label>
                </div>
                <div class="col-lg-12 col-12">
                  <div class="form-group">
                    <input readonly type="text" class="form-control"
                    name="" id=""
                    value="{{ @$cases->representative?->representative_name }}">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="row">
                <div class="col-lg-12 col-12 ">
                  <label for=""
                  class="font-weight-bold text-info">Mobile</label>
                </div>
                <div class="col-lg-12 col-12">
                  <div class="form-group">
                    <input readonly type="text" class="form-control"
                    name="" id=""
                    value="{{ @$cases->client_representative_party_mobile }}">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="row">
                <div class="col-lg-12 col-12 ">
                  <label for=""
                  class="font-weight-bold text-info">Email</label>
                </div>
                <div class="col-lg-12 col-12">
                  <div class="form-group">
                    <input readonly type="text" class="form-control"
                    name="" id=""
                    value="{{ @$cases->client_representative_party_email }}">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-12">
          <div class="row">
            <div class="col-lg-12 col-12 ">
              <label for=""
              class="font-weight-bold text-info">Client
            Coordinator</label>
          </div>
        </div>
      </div>
      <div class="col-lg-10 col-12">
        <div class="row">
          <div class="col-4">
            <div class="row">
              <div class="col-lg-12 col-12 ">
                <label for=""
                class="font-weight-bold text-info">Name</label>
              </div>
              <div class="col-lg-12 col-12">
                <div class="form-group">
                  <input readonly type="text" class="form-control"
                  name="" id=""
                  value="{{ @$cases->client_coordinator_party_name }}">
                </div>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="row">
              <div class="col-lg-12 col-12 ">
                <label for=""
                class="font-weight-bold text-info">Mobile</label>
              </div>
              <div class="col-lg-12 col-12">
                <div class="form-group">
                  <input readonly type="text" class="form-control"
                  name="" id=""
                  value="{{ @$cases->client_coordinator_party_mobile }}">
                </div>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="row">
              <div class="col-lg-12 col-12 ">
                <label for=""
                class="font-weight-bold text-info">Email</label>
              </div>
              <div class="col-lg-12 col-12">
                <div class="form-group">
                  <input readonly type="text" class="form-control"
                  name="" id=""
                  value="{{ @$cases->client_coordinator_party_email }}">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-12">
        <div class="row">
          <div class="col-lg-12 col-12 ">
            <label for=""
            class="font-weight-bold text-info">Previous Legal
          Dispute</label>
        </div>
      </div>
    </div>
    <div class="col-lg-10 col-12">
      <textarea readonly name="" id="" cols="30" rows="2"
      class="form-control new"  spellcheck="false">{{ @$cases->previous_legal_dispute }}</textarea>
    </div>
    <div class="col-lg-2 col-12">
      <div class="row">
        <div class="col-lg-12 col-12 ">
          <label for=""
          class="font-weight-bold text-info">Special Note</label>
        </div>
      </div>
    </div>
    <div class="col-lg-10 col-12">
      <textarea readonly name="" id="" cols="30" rows="2"
      class="form-control new"  spellcheck="false">{{ @$cases->special_party_note }}</textarea>
    </div>
  </div>
</div>
</div>
</form>
</div>
</div>
<div class="card shadow mb-3 ">
     <div class="card-header_show py-2">
            <h4 style="menu3">Opponent Info</h4>
           <div>
                <a href="{{route('lawyer.litigation.case.edit',$cases->id)}}"><i class="fas fa-fw fa-edit" style="color: #ccc;"></i></a>
           
            </div>
          </div>
 
  <div class="px-3">
    <form action="">
      <div class="row Party">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 col-12">
              <div class="row">
                <div class="col-lg-4 col-12 ">
                  <label for=""
                  class="font-weight-bold text-info">Opponent (On behalf
                of)</label>
              </div>
              <div class="col-lg-8 col-12">
                <div class="form-group">
                  <input readonly type="text" class="form-control" name=""
                  id=""  value="{{ @$cases->opponentOnBehalf->name }}">
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-12">
            <div class="row">
              <div class="col-lg-4 col-8 ">
                <label for=""
                class="font-weight-bold text-info">Division</label>
              </div>
              <div class="col-lg-8 col-12">
                <div class="form-group">
                  <input readonly type="text" class="form-control" name=""
                  id=""  value="{{ @$cases->opponentDivision->division_name }}">
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-12">
            <div class="row">
              <div class="col-lg-4 col-8">
                <label for=""
                class="font-weight-bold text-info">Zone</label>
              </div>
              <div class="col-lg-8 col-12">
                <div class="form-group">
                  <input readonly type="text" class="form-control" name=""
                  id=""  value="{{ @$cases->opponentZone->name }}">
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-12">
            <div class="row">
              <div class="col-lg-4 col-12">
                <label for=""
                class="font-weight-bold text-info">Opponent
              Category</label>
            </div>
            <div class="col-lg-8 col-12">
              <div class="form-group">
                <input readonly type="text" class="form-control" name=""
                id=""  value="{{ @$cases->opponentCategory->name }}">
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-12">
          <div class="row">
            <div class="col-lg-4 col-12">
              <label for=""
              class="font-weight-bold text-info">District</label>
            </div>
            <div class="col-lg-8 col-12">
              <div class="form-group">
                <input readonly type="text" class="form-control" name=""
                id=""  value="{{ @$cases->opponentDistrict->name }}">
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-12">
          <div class="row">
            <div class="col-lg-4 col-12 ">
              <label for=""
              class="font-weight-bold text-info">Area</label>
            </div>
            <div class="col-lg-8 col-12">
              <div class="form-group">
                <input readonly type="text" class="form-control" name=""
                id=""  value="{{ @$cases->opponentArea->name }}">
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-12">
          <div class="row">
            <div class="col-lg-4 col-12 ">
              <label for=""
              class="font-weight-bold text-info">Opponent
            Sub-Category</label>
          </div>
          <div class="col-lg-8 col-12">
            <div class="form-group">
              <input readonly type="text" class="form-control" name=""
              id=""  value="{{ @$cases->opponentSubCategory->name }}">
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-12">
        <div class="row">
          <div class="col-lg-4 col-12 ">
            <label for=""
            class="font-weight-bold text-info">Police Station</label>
          </div>
          <div class="col-lg-8 col-12">
            <div class="form-group">
              <input readonly type="text" class="form-control" name=""
              id=""  value="{{ @$cases->opponentThana->thana_name }}">
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-12">
        <div class="row">
          <div class="col-lg-4 col-12 ">
            <label for=""
            class="font-weight-bold text-info">Branch</label>
          </div>
          <div class="col-lg-8 col-12">
            <div class="form-group">
              <input readonly type="text" class="form-control"
              name="" id=""  value="{{ @$cases->opponentBranch->name }}">
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-12">
        <div class="row">
          <div class="col-lg-4 col-12 ">
            <label for=""
            class="font-weight-bold text-info">Opponent Group</label>
          </div>
          <div class="col-lg-8 col-12">
            <div class="form-group">
              <input readonly type="text" class="form-control"
              name="" id=""  value="{{ @$cases->opponent_group }}">
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-12">
        <div class="row">
          <div class="col-lg-4 col-12 ">
            <label for=""
            class="font-weight-bold text-info">Opponent
          Profession</label>
        </div>
        <div class="col-lg-8 col-12">
          <div class="form-group">
            <input readonly type="text" class="form-control"
            name="" id=""  value="{{ @$cases->opponent_profession }}">
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-12">
      <div class="row">
        <div class="col-lg-4 col-12 ">
          <label for=""
          class="font-weight-bold text-info">Opponent Business
        Name</label>
      </div>
      <div class="col-lg-8 col-12">
        <div class="form-group">
          <input readonly type="text" class="form-control"
          name="" id=""  value="{{ @$cases->opponent_business_name }}">
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-12">
    <div class="row">
      <div class="col-lg-4 col-12 ">
        <label for="" class="font-weight-bold text-info"
        style="">Opponent Communication</label>
      </div>
      <div class="col-lg-8 col-12">
        <div class="form-group">
          <input readonly type="text" class="form-control"
          name="" id=""  value="{{ @$cases->opponent_communication }}">
        </div>
      </div>
    </div>
  </div>
  <!--<div class="col-lg-3 col-12">-->
  <!--  <div class="row">-->
  <!--    <div class="col-lg-4 col-12 ">-->
  <!--      <label for=""-->
  <!--      class="font-weight-bold text-info">Email</label>-->
  <!--    </div>-->
  <!--    <div class="col-lg-8 col-12">-->
  <!--      <div class="form-group">-->
  <!--        <input readonly type="text" class="form-control"-->
  <!--        name="" id=""  value="{{ @$cases->opponent_email }}">-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->
  <div class="col-lg-2 col-12">
    <div class="row">
      <div class="col-lg-12 col-12 ">
        <label for=""
        class="font-weight-bold text-info">Opponent (Party)</label>
      </div>
    </div>
  </div>
  <div class="col-lg-10 col-12">
    <div class="row">
      <div class="col-4">
        <div class="row">
          <div class="col-lg-12 col-12 ">
            <label for=""
            class="font-weight-bold text-info">Name</label>
          </div>
          <div class="col-lg-12 col-12">
            <div class="form-group">
              <input readonly type="text" class="form-control"
              name="" id=""
              value="{{ @$cases->opponent_info_name }}">
            </div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="row">
          <div class="col-lg-12 col-12 ">
            <label for=""
            class="font-weight-bold text-info">Mobile</label>
          </div>
          <div class="col-lg-12 col-12">
            <div class="form-group">
              <input readonly type="text" class="form-control"
              name="" id=""
              value="{{ @$cases->opponent_info_mobile }}">
            </div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="row">
          <div class="col-lg-12 col-12 ">
            <label for=""
            class="font-weight-bold text-info">Email</label>
          </div>
          <div class="col-lg-12 col-12">
            <div class="form-group">
              <input readonly type="text" class="form-control"
              name="" id=""
              value="{{ @$cases->opponent_info_email }}">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  @if($cases->opponent_party_others)
    <div class="col-lg-2 col-12">
        <label for="" class="col-form-label col-sm-12 font-weight-bold text-info">Opponent Party Others</label>
    </div>
    <div class="col-lg-10 col-12">
        <div class="form-group">
            <input readonly disabled value="{{ @$cases->opponent_party_others }}" name="opponent_party_others" type="text" id="tags" class="form-control" data-role="tagsinput" >
        </div>
    </div>
    @endif
    
    @if($cases->opponent_party_extra)
    <div class="col-lg-2 col-12">
        <label for="" class="col-form-label col-sm-12 font-weight-bold text-info">Opponent Party Extra</label>
    </div>
    <div class="col-lg-10 col-12">
        <div class="form-group">
            <textarea name='opponent_party_extra' class='form-control some_class_name' style="height: 85px;" readonly>
                {!! @$cases->opponent_party_extra !!}
            </textarea>
        </div>
    </div>
    @endif
  
  
  <div class="col-lg-2 col-12">
    <div class="row">
      <div class="col-lg-12 col-12 ">
        <label for=""
        class="font-weight-bold text-info">Opponent Representative</label>
      </div>
    </div>
  </div>
  <div class="col-lg-10 col-12">
    <div class="row">
      <div class="col-4">
        <div class="row">
          <div class="col-lg-12 col-12 ">
            <label for=""
            class="font-weight-bold text-info">Name</label>
          </div>
          <div class="col-lg-12 col-12">
            <div class="form-group">
              <input readonly type="text" class="form-control"
              name="" id=""
              value="{{ @$cases->opponent_name }}">
            </div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="row">
          <div class="col-lg-12 col-12 ">
            <label for=""
            class="font-weight-bold text-info">Mobile</label>
          </div>
          <div class="col-lg-12 col-12">
            <div class="form-group">
              <input readonly type="text" class="form-control"
              name="" id=""
              value="{{ @$cases->opponent_mobile }}">
            </div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="row">
          <div class="col-lg-12 col-12 ">
            <label for=""
            class="font-weight-bold text-info">Email</label>
          </div>
          <div class="col-lg-12 col-12">
            <div class="form-group">
              <input readonly type="text" class="form-control"
              name="" id=""
              value="{{ @$cases->opponent_email }}">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-2 col-12">
    <div class="row">
      <div class="col-lg-12 col-12 ">
        <label for=""
        class="font-weight-bold text-info">Opponent
      Coordinator</label>
    </div>
  </div>
</div>
<div class="col-lg-10 col-12">
  <div class="row">
    <div class="col-4">
      <div class="row">
        <div class="col-lg-12 col-12 ">
          <label for=""
          class="font-weight-bold text-info">Name</label>
        </div>
        <div class="col-lg-12 col-12">
          <div class="form-group">
            <input readonly type="text" class="form-control"
            name="" id=""
            value="{{ @$cases->opponent_coordinator_name }}">
          </div>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="row">
        <div class="col-lg-12 col-12 ">
          <label for=""
          class="font-weight-bold text-info">Mobile</label>
        </div>
        <div class="col-lg-12 col-12">
          <div class="form-group">
            <input readonly type="text" class="form-control"
            name="" id=""
            value="{{ @$cases->opponent_coordinator_mobile }}">
          </div>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="row">
        <div class="col-lg-12 col-12 ">
          <label for=""
          class="font-weight-bold text-info">Email</label>
        </div>
        <div class="col-lg-12 col-12">
          <div class="form-group">
            <input readonly type="text" class="form-control"
            name="" id=""
            value="{{ @$cases->opponent_coordinator_email }}">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-lg-2 col-12">
  <div class="row">
    <div class="col-lg-12 col-12 ">
      <label for=""
      class="font-weight-bold text-info">Previous Legal
    Dispute</label>
  </div>
</div>
</div>
<div class="col-lg-10 col-12">
  <textarea readonly name="client_info_special_note" id="client_info_special_note" cols="30" rows="2"
  class="form-control new"  spellcheck="false">{{ @$cases->previous_legal_dispute_info }}</textarea>
</div>
<div class="col-lg-2 col-12">
  <div class="row">
    <div class="col-lg-12 col-12 ">
      <label for=""
      class="font-weight-bold text-info">Special Note</label>
    </div>
  </div>
</div>
<div class="col-lg-10 col-12">
  <textarea readonly name="client_info_special_note" id="client_info_special_note" cols="30" rows="2"
  class="form-control new"  spellcheck="false">{{ @$cases->special_note_info }}</textarea>
</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
<div id="menu2" class="tab-pane fade">
  <div class=" mb-3 ">
    <div class="row lawyer">
      <div class="col-lg-6 col-12 pr-0">
           <div class="info_card">
           <div class="card-header_show py-2">
            <h4 style="color: #3AAFA9; margin-bottom:0; font-weight: 700;">Client Lawyer Info</h4>
           <div>
                <a href="{{route('lawyer.litigation.case.edit',$cases->id)}}"><i class="fas fa-fw fa-edit" style="color: #ccc;"></i></a>
           
            </div>
          </div>
          <div class="p-4" style="padding-top:0 !important">
        <div class="row">
          <div class="col-lg-5 col-12 ">
            <label for="" class="font-weight-bold text-info">Advocate/Law
            Firm</label>
          </div>
          <div class="col-lg-7 col-12">
            <div class="form-group">
              <input readonly type="text" class="form-control" name=""
              id=""  value="{{ @$cases->chamber->ch_name }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5 col-12 ">
            <label for="" class="font-weight-bold text-info">Lead Lawyer</label>
          </div>
          <div class="col-lg-7 col-12">
            <div class="form-group">
              <input readonly type="text" class="form-control" name=""
              id=""  value="{{ @$cases->leadLawyer->personal_name }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5 col-12 ">
            <label for="" class="font-weight-bold text-info">Assigned
            Lawyer</label>
          </div>
          <div class="col-lg-7 col-12">
            <div class="form-group">
              <input readonly type="text" class="form-control" name=""
              id=""  value="{{ @$cases->assignedLawyer->personal_name }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5 col-12 ">
            <label for="" class="font-weight-bold text-info">Assigned
            Clark</label>
          </div>
          <div class="col-lg-7 col-12">
            <div class="form-group">
              <input readonly type="text" class="form-control" name=""
              id=""  value="{{ @$cases->clerk->personal_name }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5 col-12 ">
            <label for="" class="font-weight-bold text-info">Clark Contact
            Number</label>
          </div>
          <div class="col-lg-7 col-12">
            <div class="form-group">
              <input readonly type="text" class="form-control" name=""
              id=""  value="{{ @$cases->clerkNumber->mobile_number_pro }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5 col-12 ">
            <label for="" class="font-weight-bold text-info">Note</label>
          </div>
          <div class="col-lg-7 col-12">
            <textarea readonly name="client_info_special_note" id="client_info_special_note" cols="30" rows="3"
            class="form-control new"  spellcheck="false">{{ @$cases->client_lawyer_info_note }}</textarea>
          </div>
        </div>
        </div>
        </div>
      </div>
      <div class="col-lg-6 col-12">
          <div class="info_card">
           <div class="card-header_show py-2">
            <h4 style="color: #3AAFA9; margin-bottom:0; font-weight: 700;">Opponent Lawyer Information</h4>
           <div>
                <a href="{{route('lawyer.litigation.case.edit',$cases->id)}}"><i class="fas fa-fw fa-edit" style="color: #ccc;"></i></a>
           
            </div>
          </div>
          <div class="p-4"style="padding-top:0 !important">
        <div class="row">
          <div class="col-lg-5 col-12 ">
            <label for="" class="font-weight-bold text-info">Advocate/Law
            Firm</label>
          </div>
          <div class="col-lg-7 col-12">
            <div class="form-group">
              <input readonly type="text" class="form-control" name=""
              id=""  value="{{ @$cases->opponent_advocate_law_firm }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5 col-12 ">
            <label for="" class="font-weight-bold text-info">Concerned
            Lawer</label>
          </div>
          <div class="col-lg-7 col-12">
            <div class="form-group">
              <input readonly type="text" class="form-control" name=""
              id=""  value="{{ @$cases->opponent_concerned_lawyer }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5 col-12 ">
            <label for="" class="font-weight-bold text-info">Opponent Lawyer
            Contact Number</label>
          </div>
          <div class="col-lg-7 col-12">
            <div class="form-group">
              <input readonly type="text" class="form-control" name=""
              id=""  value="{{ @$cases->opponent_lawyer_contact_number }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5 col-12 ">
            <label for="" class="font-weight-bold text-info"> Opponent Lawyer
            Clark</label>
          </div>
          <div class="col-lg-7 col-12">
            <div class="form-group">
              <input readonly type="text" class="form-control" name=""
              id=""  value="{{ @$cases->opponent_lawyer_clerk }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5 col-12 ">
            <label for="" class="font-weight-bold text-info">Opponent Lawyer
            Clark Number</label>
          </div>
          <div class="col-lg-7 col-12">
            <div class="form-group">
              <input readonly type="text" class="form-control" name=""
              id=""  value="{{ @$cases->opponent_clerk_contact_number }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5 col-12 ">
            <label for="" class="font-weight-bold text-info">Chamber
            Address</label>
          </div>
          <div class="col-lg-7 col-12">
            <textarea readonly name="client_info_special_note" id="client_info_special_note" cols="30" rows="3"
            class="form-control new"  spellcheck="false">{{ @$cases->opponent_chamber_address }}</textarea>
          </div>
        </div>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
<div id="menutow" class="tab-pane fade">
  <div class="card shadow mb-3 ">
                         <div class="card-header_show py-2">
                            <h4 style="color: #3aafa9; margin-bottom:0; font-weight: 700;">Document Received</h4>
                           <div>
                                <a href="{{route('lawyer.litigation.case.edit',$cases->id)}}"><i class="fas fa-fw fa-edit" style="color: #ccc;"></i></a>
                           
                            </div>
                          </div>

                          <div class="card-body collapse show " style="padding-top:0 !important">
                            <div class="responsive">
                              <table class="table table-striped">
                                <thead class="bg-info text-white">
                                  <tr>
                                    <th scope="col">Document Received</th>
                                    <th scope="col">Document Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Document Type</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th>Legal Notice (Served) SDF</th>
                                    <td>Legal Notice (Served) SDF</td>
                                    <td>06-01-2023</td>
                                    <td>Copy</td>
                                  </tr>
                                  <tr>
                                    <th>Legal Notice (Served) SDF</th>
                                    <td>Legal Notice (Served) SDF</td>
                                    <td>06-01-2023</td>
                                    <td>Copy</td>
                                  </tr>
                                  <tr>
                                    <th>Legal Notice (Served) SDF</th>
                                    <td>Legal Notice (Served) SDF</td>
                                    <td>06-01-2023</td>
                                    <td>Copy</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                        <div class="card shadow mb-3 ">
                                <div class="card-header_show  py-2">
                            <h4 style="color: #3AAFA9; margin-bottom:0; font-weight: 700;">Document Required</h4>
                           <div>
                                <a href="{{route('lawyer.litigation.case.edit',$cases->id)}}"><i class="fas fa-fw fa-edit" style="color: #ccc;"></i></a>
                           
                            </div>
                          </div>
                          <div class="card-body collapse show "style="padding-top:0 !important">
                            <div class="responsive">
                              <table class="table table-striped">
                                <thead class="bg-info text-white">
                                  <tr>

                                    <th scope="col">Document Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Document Type</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>

                                    <td>Legal Notice (Served) SDF</td>
                                    <td>06-01-2023</td>
                                    <td>Copy</td>
                                  </tr>
                                  <tr>

                                    <td>Legal Notice (Served) SDF</td>
                                    <td>06-01-2023</td>
                                    <td>Copy</td>
                                  </tr>
                                  <tr>

                                    <td>Legal Notice (Served) SDF</td>
                                    <td>06-01-2023</td>
                                    <td>Copy</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                        <div class="card shadow mb-3 ">
                              <div class="card-header_show py-2">
                            <h4 style="color: #3AAFA9; margin-bottom:0; font-weight: 700;">Document Required</h4>
                           <div>
                                <a href="{{route('lawyer.litigation.case.edit',$cases->id)}}"><i class="fas fa-fw fa-edit" style="color: #ccc;"></i></a>
                           
                            </div>
                          </div>
                        
                          <div class="card-body collapse show "style="padding-top:0 !important">
                            <div class="responsive">
                              <table class="table table-striped">
                                <thead class="bg-info text-white">
                                  <tr>

                                    <th scope="col">DOCUMENTS UPLOAD</th>
                                    <th scope="col">Doc Date</th>
                                    <th scope="col">Doc Type</th>
                                    <th scope="col">Uploaded By</th>
                                    <th scope="col">Date & Time</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>

                                    <td>Legal Notice (Served) SDF</td>
                                    <td>06-01-2023</td>
                                    <td>Copy</td>
                                    <td>demo@gmail.com</td>
                                    <td>11-28-2023, 11.00pm</td>
                                    <td>
                                     <div class="dropdown action_doc">
                                      <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <i class="fas fa-ellipsis-h"></i>
                                     </button>
                                     <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="#"><i class="fas fa-eye mr-2"></i> </a>
                                      <a class="dropdown-item" href="#"><i class="fas fa-edit mr-2"></i> </a>
                                      <a class="dropdown-item" href="#"><i class="fas fa-trash-alt mr-2"></i></a>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>

                                <td>Legal Notice (Served) SDF</td>
                                <td>06-01-2023</td>
                                <td>Copy</td>
                                <td>demo@gmail.com</td>
                                <td>11-28-2023, 11.00pm</td>
                                <td>
                                 <div class="dropdown action_doc">
                                  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <i class="fas fa-ellipsis-h"></i>
                                 </button>
                                 <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="#"><i class="fas fa-eye mr-2"></i> View</a>
                                  <a class="dropdown-item" href="#"><i class="fas fa-edit mr-2"></i> Edit</a>
                                  <a class="dropdown-item" href="#"><i class="fas fa-trash-alt mr-2"></i> Delete</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>

                            <td>Legal Notice (Served) SDF</td>
                            <td>06-01-2023</td>
                            <td>Copy</td>
                            <td>demo@gmail.com</td>
                            <td>11-28-2023, 11.00pm</td>
                            <td>
                             <div class="dropdown action_doc">
                              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <i class="fas fa-ellipsis-h"></i>
                             </button>
                             <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#"><i class="fas fa-eye mr-2"></i> View</a>
                              <a class="dropdown-item" href="#"><i class="fas fa-edit mr-2"></i> Edit</a>
                              <a class="dropdown-item" href="#"><i class="fas fa-trash-alt mr-2"></i> Delete</a>
                            </div>
                          </div>
                        </td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div id="menu3" class="tab-pane fade {{request()->cpl ? 'in active': ''}}">
            <div class="card shadow mb-3">
              <div class="card-header_show py-2 " style="margin-bottom: 0px !important;">
                <h4 style="color: #2c9faf;margin-bottom: 0;" class="font-weight-bold">Case Proceeding Log</h4>
                <div id="accordion" class="accordion d-flex ">
                  <button type="button" class="btn btn-primary btn-sm document-btn Click-here"
                  data-toggle="modal" data-target="#working_documents_modal"
                  data-placement="top"><i class="fas fa-recycle nav-icon"></i></button>
                </div>
              </div>
              <form action="{{ route('lawyer.litigation.case.proceeding.store') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ auth()->guard('lawyer')->id()}}" name="lawyer_id">
                <input type="hidden" value="{{ $cases->id }}" name="cases_id">
                <input type="hidden" value="{{ $cases->courtShort ? $cases->courtShort->name_short : '' }}" name="court">
                <input type="hidden" value="{{ $cases->caseCategory->name }}" name="case_category">
                <input type="hidden" value="{{ $cases->case_type_id == 2 || $cases->case_type_id == 5 ? 'Revision' :'' }}{{ $cases->case_type_id == 3 || $cases->case_type_id == 6 ? 'Appeal' :'' }}" name="case_type">
                <div class="custom-model-main">

                  <div class="custom-model-inner log">
                    <div class="custom-model-wrap">
                      <div class="events  update-div">
                        <h5 style="color: #000;">Update Case Proceeding</h5>
                        <div>
                          <div class="close-btn">×</div>
                        </div>
                      </div>
                      <div class="pop-up-content-wrap">
                        <div class="row Party popup-m">
                          <div class="col-lg-6">
                            <div class="row">
                              <div class="col-12 mb-2">
                                <div class="row ">
                                  <div class="col-lg-4 col-12 ">
                                    <label for=""
                                    class="font-weight-bold text-info">Status</label>
                                  </div>
                                  <div class="col-lg-4 col-12">
                                    <select name="updated_case_status_id"
                                    class="form-control" id="updated_case_status_id" required>
                                    <option value="">select</option>
                                    @foreach($cpl_status as $row)
                                    <option {{$cases->cpl()->orderByDesc('id')->first() && $cases->cpl()->orderByDesc('id')->first()->status->id == $row->id ? 'selected':''}} value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="col-lg-4 col-12">
                                  <input type="text" class="form-control"
                                  name="updated_case_status_write" placeholder="Type">
                                </div>
                              </div>
                            </div>
                            <div class="col-12 mb-2">
                              <div class="row">
                                <div class="col-lg-4 col-12 ">
                                  <label for=""
                                  class="font-weight-bold text-info">Case/Order
                                Date</label>
                              </div>
                              <div class="col-lg-8 col-12">
                                <input type="date" class="form-control"
                                name="updated_order_date"
                                placeholder="" value="{{$cases->cpl()->orderByDesc('id')->first() ? $cases->cpl()->orderByDesc('id')->first()->updated_next_date?->format('Y-m-d'):''}}">
                              </div>
                            </div>
                          </div>
                          <div class="col-12 mb-2">
                            <div class="row ">
                              <div class="col-lg-4 col-12 ">
                                <label for=""
                                class="font-weight-bold text-info">Fixed
                              For</label>
                            </div>
                            <div class="col-lg-4 col-12">
                              <select name="updated_fixed_for_id" onchange="fixedFor();"
                              class="form-control" id="updated_fixed_for_id" @if($cases->cpl()->orderByDesc('id')->first()?->updated_fixed_for_id) @else @if(!$cases->cpl()->orderByDesc('id')->first()?->updated_index_fixed_for_write) required @endif @endif>
                              <option value="">select</option>
                              @foreach($fixed_for as $row)
                              <option {{$cases->cpl()->orderByDesc('id')->first() && $cases->cpl()->orderByDesc('id')->first()->updated_index_fixed_for_id == $row->id ? 'selected':''}} value="{{$row->id}}">{{$row->name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-lg-4 col-12">
                            <input onkeyup="fixedForUpdate();" id="updated_fixed_for_write" type="text" class="form-control" name="updated_fixed_for_write" placeholder="Type" value="{{$cases->cpl()->orderByDesc('id')->first() ? $cases->cpl()->orderByDesc('id')->first()->updated_index_fixed_for_write:''}}" 
                            >
                          </div>
                        </div>
                      </div>
                      <div class="col-12 mb-2">
                        <div class="row ">
                          <div class="col-lg-4 col-12 ">
                            <label for=""
                            class="font-weight-bold text-info">Court
                          Proceeding</label>
                        </div>
                        <div class="col-lg-4 col-12">
                          <select name="court_proceedings_id" onchange="courtProceeding();"
                          class="form-control" id="court_proceedings_id" required>
                          <option value="">select</option>
                          @foreach($court_proceedings as $row)
                          <option value="{{$row->id}}">{{$row->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-lg-4 col-12">
                        <input required onkeyup="courtProceedingWrite();" type="text" class="form-control" id="court_proceedings_write" name="court_proceedings_write" placeholder="Type">
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mb-2">
                    <div class="row ">
                      <div class="col-lg-4 col-12 ">
                        <label for=""
                        class="font-weight-bold text-info">Court
                      Order</label>
                    </div>
                    <div class="col-lg-4 col-12">
                      <select name="updated_court_order_id"
                      class="form-control" id="updated_court_order_id" onchange="orderCourt();" required>
                      <option value="">select</option>
                      @foreach($court_orders as $row)
                      <option value="{{$row->id}}">{{$row->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-lg-4 col-12">
                    <input type="text" class="form-control" onkeyup="orderCourtWrite();" id="updated_court_order_write" name="updated_court_order_write" placeholder="Type" required>
                  </div>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="row">
                  <div class="col-lg-4 col-12 ">
                    <label for=""
                    class="font-weight-bold text-info">Next
                  Date</label>
                </div>
                <div class="col-lg-8 col-12">
                  <input type="date" class="form-control" id="updated_next_date" name="updated_next_date" required>
                </div>
              </div>
            </div>
            <div class="col-12 mb-2">
              <div class="row ">
                <div class="col-lg-4 col-12 ">
                  <label for=""
                  class="font-weight-bold text-info">Next Date
                Fixed For</label>
              </div>
              <div class="col-lg-4 col-12">
                <select onchange="courTransfer();" name="updated_index_fixed_for_id"
                class="form-control" id="updated_index_fixed_for_id" required>
                <option value="">select</option>
                @foreach($fixed_for as $row)
                <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-4 col-12">
              <input type="text" class="form-control" name="updated_index_fixed_for_write" id="updated_index_fixed_for_write" placeholder="Type" onkeyup="ndFixedFor();">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="row">
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-lg-4 col-12 ">
              <label for=""
              class="font-weight-bold text-info">Day
            Notes</label>
          </div>
          <div class="col-lg-4 col-12">
            <select name="updated_day_notes_id"
            class="form-control" id="updated_day_notes_id">
            <option value="">select</option>
            @foreach($day_notes as $row)
            <option value="{{$row->id}}">{{$row->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-lg-4 col-12">
          <input type="text" class="form-control" name="updated_day_notes_write" placeholder="Type">
        </div>
      </div>
    </div>
    <div class="col-12 mb-2">
      <div class="row">
        <div class="col-lg-4 col-12 ">
          <label for=""
          class="font-weight-bold text-info">Engaged
        Advocate</label>
      </div>
      <div class="col-lg-4 col-12">
        <select name="updated_engaged_advocate_id" onchange="engaged();"
        class="form-control" id="updated_engaged_advocate_id" {{ $cases->cpl()->orderByDesc('id')->first() && $cases->cpl()->orderByDesc('id')->first()->updated_engaged_advocate_id ? '':'required' }}>
        <option value="">select</option>
        @foreach($lawyers as $row)
        <option {{$cases->cpl()->orderByDesc('id')->first() && $cases->cpl()->orderByDesc('id')->first()->updated_engaged_advocate_id == $row->id ? 'selected':''}} value="{{$row->id}}">{{$row->personal_name}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-lg-4 col-12">
      <input type="text" class="form-control" onkeyup="engagedWrite();" id="updated_engaged_advocate_write" name="updated_engaged_advocate_write" placeholder="Type">
    </div>
  </div>
</div>
<div class="col-12 mb-2">
  <div class="row ">
    <div class="col-lg-4 col-12 ">
      <label for=""
      class="font-weight-bold text-info">Next Day
    Presence</label>
  </div>
  <div class="col-lg-8 col-12">
    <select name="updated_next_day_presence_id"
    class="form-control" id="updated_next_day_presence_id">
    <option value="">select</option>
    @foreach($next_day_presence as $row)
    <option value="{{$row->id}}">{{$row->name}}</option>
    @endforeach
  </select>
</div>
</div>
</div>
<div class="col-12 mb-2">
  <div class="row">
    <div class="col-lg-4 col-12 ">
      <label for=""
      class="font-weight-bold text-info">Steps To be
    taken next date</label>
  </div>
  <div class="col-lg-8 col-12">
    <textarea name="updated_remarks" id="updated_remarks" cols="30" rows="2"
    class="form-control new" placeholder="Type" spellcheck="false"></textarea>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="popup-footer">
  <div class="popup-footer-btn">
    <button class="btn btn-outline-secondary close-btn f-btn" type="button">close</button>
    <button type="submit" class="btn btn-info text-white f-btn"><i
      class="fa-clipboard-check fa-fw fas"></i>
    Save</button>
  </div>
</div>
</div>
</div>
<div class="bg-overlay"></div>
</div>
</form>
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card shadow mb-3">
      <div class="card-body">
        <table class="display responsive  yajra-datatable" style="width: 100%;">
          <thead>
            <tr>
              <th>Sl</th>
              <th width="10%">Case Date</th>
              <th>Fixed for</th>
              <th>Case Proceeding</th>
              <th>Court Order</th>
              <th width="10%">Next Date</th>
              <th>N.D. Fixed </th>
              <th width="10%">Day Note</th>
              <th>Engaged Adv</th>
              <th>Bill</th>
              <th>Action</th>
              <th>Update</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<div id="menu4" class="tab-pane fade {{request()->activity ? 'in active': ''}}">
  <div class="card shadow mb-3 ">
    <div class="card-header_show py-2" style="margin-bottom: 0px !important;">
      <h4 style="color: #2c9faf;margin-bottom:0;padding-bottom:0;" class="font-weight-bold">Case Activity Log</h4>
      <div id="accordion" class="accordion d-flex ">
        <button type="button" class="btn btn-primary btn-sm document-btn Click-here"
        data-toggle="modal" data-target="#working_documents_modal"
        data-placement="top"><i class="fas fa-recycle nav-icon"></i></button>
      </div>
    </div>
    <form action="{{ route('lawyer.litigation.case.activity.store') }}" method="POST">
      @csrf
      <input type="hidden" value="{{ $cases->id }}" name="cases_id">
      <div class="custom-model-main">
        <div class="custom-model-inner log">
          <div class="custom-model-wrap">
            <div class="events  update-div">
              <h5 style="color: #000;">Update Activities</h5>
              <div>
                <div class="close-btn">×</div>
              </div>
            </div>
            <div class="pop-up-content-wrap">
              <div class="row Party popup-m">
                <div class="col-lg-6">
                  <div class="row">
                    <div class="col-12 mb-2">
                      <div class="row ">
                        <div class="col-lg-4 col-12 ">
                          <label for=""
                          class="font-weight-bold text-info">
                        Date</label>
                      </div>
                      <div class="col-lg-8 col-12">
                        <input type="date" class="form-control" name="activity_date">
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mb-2">
                    <div class="row">
                      <div class="col-lg-4 col-12 ">
                        <label for=""
                        class="font-weight-bold text-info">Activity/Action</label>
                      </div>
                      <div class="col-lg-8 col-12">
                        <textarea name="activity_action" id="activity_action" cols="30" rows="2"
                        class="form-control new"  spellcheck="false"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mb-2">
                    <div class="row">
                      <div class="col-lg-4 col-12 ">
                        <label for=""
                        class="font-weight-bold text-info">Progress</label>
                      </div>
                      <div class="col-lg-8 col-12">
                        <textarea name="activity_progress" id="activity_progress" cols="30" rows="2"
                        class="form-control new"  spellcheck="false"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mb-2">
                    <div class="row">
                      <div class="col-lg-4 col-12 ">
                        <label for=""
                        class="font-weight-bold text-info">Mode</label>
                      </div>
                      <div class="col-lg-5 col-9">
                        <select name="activity_mode_id" id="activity_mode_id" class="form-control">
                          <option value="" disabled="" selected="">select</option>
                          <option value="1">Email</option>
                          <option value="2">Hard Copy</option>
                        </select>
                      </div>
                      <div class="col-lg-3 col-3">
                        <input type="text" class="form-control" name="activity_mode_write" placeholder="Mode">
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mb-2">
                    <div class="row">
                      <div class="col-lg-4 col-12 ">
                        <label for=""
                        class="font-weight-bold text-info">Start
                      Time</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <input type="datetime-local" class="form-control" name="start_time" placeholder="Type">
                    </div>
                  </div>
                </div>
                <div class="col-12 mb-2">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for=""
                      class="font-weight-bold text-info">End
                    Time</label>
                  </div>
                  <div class="col-lg-8 col-12">
                    <input type="datetime-local" class="form-control" name="end_time" placeholder="Type">
                  </div>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="row">
                  <div class="col-lg-4 col-12 ">
                    <label for=""
                    class="font-weight-bold text-info">Time
                  Spent</label>
                </div>
                <div class="col-lg-8 col-12">
                  <input readonly="" type="text" class="form-control" name="setup_hours" id="setup_hours" placeholder="">
                </div>
              </div>
            </div>
            <div class="col-12 mb-2">
              <div class="row">
                <div class="col-lg-4 col-12 ">
                  <label for=""
                  class="font-weight-bold text-info">Time
                Spent Manual</label>
              </div>
              <div class="col-lg-8 col-12">
                <input type="text" class="form-control" id="time_spend_manual" name="time_spend_manual">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="row">
          <div class="col-12 mb-2">
            <div class="row">
              <div class="col-lg-4 col-12 ">
                <label for=""
                class="font-weight-bold text-info">Engaged</label>
              </div>
              <div class="col-lg-4 col-12">
                <select name="activity_engaged_id" class="form-control" id="activity_engaged_id">
                  <option value="" disabled="" selected="">select</option>
                  <option value="1">Md. Johirul Islam</option>
                  <option value="2">Md. Niamul Kabir</option>
                </select>
              </div>
              <div class="col-lg-4 col-12">
                <input type="text" class="form-control" name="activity_engaged_write" id="activity_engaged_write" placeholder="Activity Engaged">
              </div>
            </div>
          </div>
          <div class="col-12 mb-2">
            <div class="row">
              <div class="col-lg-4 col-12 ">
                <label for=""
                class="font-weight-bold text-info">Forwarded
              To</label>
            </div>
            <div class="col-lg-4 col-12">
              <select name="activity_forwarded_to_id" class="form-control" id="activity_forwarded_to_id">
                <option value="" disabled="" selected="">select</option>
                <option value="1">Md. Johirul Islam</option>
                <option value="2">Md. Niamul Kabir</option>
              </select>
            </div>
            <div class="col-lg-4 col-12">
              <input type="text" class="form-control" name="activity_forwarded_to_write" id="activity_forwarded_to_write" placeholder="Forwarded To">
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="row ">
            <div class="col-lg-4 col-12 ">
              <label for=""
              class="font-weight-bold text-info">Requirements</label>
            </div>
            <div class="col-lg-8 col-12">
              <textarea name="activity_requirements" id="activity_requirements" cols="30" rows="2" class="form-control"></textarea>
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-lg-4 col-12 ">
              <label for=""
              class="font-weight-bold text-info">Note</label>
            </div>
            <div class="col-lg-8 col-12">
              <textarea name="activity_remarks" id="activity_remarks" cols="30" rows="2" class="form-control"></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="popup-footer">
  <div class="popup-footer-btn">
    <button
    class="btn btn-outline-secondary close-btn f-btn">close</button>
    <button type="submit" class="btn btn-info text-white f-btn"><i
      class="fa-clipboard-check fa-fw fas"></i>
    Save</button>
  </div>
</div>
</div>
</div>
<div class="bg-overlay"></div>
</div>
</form>
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card shadow mb-3">
      <div class="card-body">
        <table class="display responsive" id="activity_log" style="width: 100%;">
          <thead>
            <tr>
              <th>ID</th>
              <th>Activity Date</th>
              <th>Mode</th>
              <th>Start Time</th>
              <th>End Time</th>
              <th>Time Spent</th>
              <th>Manual Time Spent</th>
              <th>Engaged</th>
              <th>Forwarded To</th>
              <th>Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<div id="menu5" class="tab-pane fade {{request()->bill ? 'in active': ''}}">
    @php
    $total = $cases->bills()->sum('bill_amount');
    $received = $cases->ledgers()->sum('paid_received_amount');
    $due = $total - $received;
    @endphp
  <div class="card shadow mb-3 ">
    <div class="card-header_show py-2" style="margin-bottom: 0px !important;">
      <h4 class="font-weight-bold" style="margin-bottom:0;padding-bottom:0;"> <span style="color: #2c9faf;margin-bottom:0;padding-bottom:0;">Bill Log</span> (Total: <span style="color: #5275dd">Tk.{{@$total}}</span>, Paid: <span class="text-success">Tk.{{$received}}</span>, @if($received > $total) Adv: <span style="color: goldenrod">Tk.{{$due - ($due*2)}}</span> @else Due: <span class="text-danger">Tk.{{$due}}</span> @endif)</h4>
      <div id="accordion" class="accordion d-flex ">
        <button type="button" class="btn btn-primary btn-sm document-btn Click-here"
        data-toggle="modal" data-target="#working_documents_modal"
        data-placement="top"><i class="fas fa-recycle nav-icon"></i></button>
      </div>
    </div>
    <form action="" method="POST">
      @csrf
      <input type="hidden" value="{{ $cases->id }}" name="cases_id" id="cases_id">
      <input type="hidden" value="{{ auth()->guard('lawyer')->id() }}" name="lawyer_id">
      <div class="custom-model-main">
        <div class="custom-model-inner">
          <div class="custom-model-wrap">
            <div class="events  update-div">
              <h5 style="color: #000;">BILL ENTRY (Form Case)</h5>
              <div>
                <div class="close-btn">×</div>
              </div>
            </div>
            <div class="pop-up-content-wrap">
              <div class="row Party popup-m">
                <div class="col-12 mb-2">
                  <div class="row ">
                    <div class="col-lg-4 col-12 ">
                      <label for=""
                      class="font-weight-bold text-info">Bill for the Date</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <input type="date" class="form-control" name="bill_date" id="bill_date">
                    </div>
                  </div>
                </div>
                <div class="col-12 mb-2">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for=""
                      class="font-weight-bold text-info">Bill
                    Type</label>
                  </div>
                  <div class="col-lg-8 col-12">
                    <select name="bill_type_id" class="form-control" id="bill_type_id">
                      <option value="" disabled="" selected="">select</option>
                      <option value="1">Lawyer Payment</option>
                      <option value="2">Miscellaneous</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="row">
                  <div class="col-lg-4 col-12 ">
                    <label for=""
                    class="font-weight-bold text-info">Bill
                  Reference</label>
                </div>
                <div class="col-lg-8 col-12">
                  <select name="bill_reference_id" class="form-control" id="bill_reference_id">
                    <option value="" disabled="" selected="">select</option>
                    <option value="1">Lawyer Payment</option>
                    <option value="2">Miscellaneous</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 mb-2">
              <div class="row ">
                <div class="col-lg-4 col-12 ">
                  <label for=""
                  class="font-weight-bold text-info">Bill Particulars</label>
                </div>
                <div class="col-lg-8 col-12">
                  <div class="row">
                    <div class="col-10 col-lg-10 pr-1">
                      <input type="text" class="form-control" name="bill_particulars" id="bill_particulars">
                    </div>
                    <div class="col-2 col-lg-2 pl-0">
                      <button type="button" id="cpl" class="btn btn-info legal-btn mx-1">CPL</button>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-12 mb-2">
              <div class="row">
                <div class="col-lg-4 col-12 ">
                  <label for=""
                  class="font-weight-bold text-info">Bill Amount</label>
                </div>
                <div class="col-lg-8 col-12">
                  <input type="number" name="bill_amount" class="form-control" id="bill_amount">
                </div>
              </div>
            </div>
            <div class="col-12 mb-2">
              <div class="row">
                <div class="col-lg-4 col-12 ">
                  <label for=""
                  class="font-weight-bold text-info">Bill Note</label>
                </div>
                <div class="col-lg-8 col-12">
                  <textarea name="bill_note" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="popup-footer">
          <div class="popup-footer-btn">
            <button  class="btn btn-outline-secondary close-btn f-btn">close</button>
            <button type="submit" class="btn btn-info text-white f-btn"><i
              class="fa-clipboard-check fa-fw fas"></i>
            Save</button>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-overlay"></div>
  </div>
</form>
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card shadow mb-3">
      <div class="card-body">
        <table id="bill-log-table" class="display responsive" style="width: 100%;">
          <thead>
           <tr>
                <th>SL</th>
                <th>Bill FD</th>
                <th>Bill No.</th>
                 <th>Bill Particulars</th>
                 <th>Bill Type</th>
                <th>Bill Ref.</th>
                <th>BIll Amount</th>
                <th>Balance Amount</th>
                <th>Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<div id="menulast" class="tab-pane fade">
  <div class="card shadow mb-3 ">
    <div class="card-header_show py-2" style="margin-bottom: 0px !important;">
      <h4 style="color: #2c9faf;margin-bottom:0;padding-bottom:0;" class="font-weight-bold">Others</h4>
      <div id="accordion" class="accordion d-flex ">
        <button type="button" class="btn btn-primary btn-sm document-btn Click-here"
        data-toggle="modal" data-target="#working_documents_modal"
        data-placement="top"><i class="fas fa-recycle nav-icon"></i></button>
      </div>
    </div>
    <form action="" method="POST">
      <input type="hidden" value="" name="">
      <div class="custom-model-main">
        <div class="custom-model-inner log">
          <div class="custom-model-wrap">
            <div class="events  update-div">
              <h5 style="color: #000;">Update Activities</h5>
              <div>
                <div class="close-btn">×</div>
              </div>
            </div>
            <div class="pop-up-content-wrap">

              <div class="card  mt-3">
                <div class="card-body ">
                  <h3 class="font-weight-bold text-info"style="color: black !important;font-size:20px;">DOCUMENTS UPLOAD</h3>
                  <hr>
                  <div class="upload_duc">
                   <div class="add_upload">
                     <div class="row">
                      <div class="col-2">
                        <div class="form-group">
                          <label for="documents_file" class="font-weight-bold text-info">File</label>
                          <input type="file" name="documents_file" id="documents_file" class="form-control" style="padding: 3px;">
                        </div>
                      </div>
                      <div class="col-2">
                        <div class="form-group">
                          <label for="documents_doc_date" class="font-weight-bold text-info">Doc
                          Date</label>
                          <input name="documents_doc_date" id="documents_doc_date" class="form-control" type="date">
                        </div>
                      </div>
                      <div class="col-2">
                        <div class="form-group">
                          <label for="documents_type_id" class="font-weight-bold text-info">Type</label>
                          <select name="documents_type_id" class="form-control" id="documents_type_id">
                            <option value="">Select</option>
                            <option value="CC">CC</option>
                            <option value="COPY">COPY</option>
                            <option value="ORG">ORG</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-2">
                        <div class="form-group">
                          <label for="documents_uploaded_by" class="font-weight-bold text-info">Uploaded
                          By</label>
                          <input name="documents_uploaded_by" id="documents_uploaded_by" class="form-control" readonly type="text">
                        </div>
                      </div>
                      <div class="col-2">
                        <div class="form-group">
                          <label for="documents_date_time" class="font-weight-bold text-info">Date &
                          Time</label>
                          <input name="documents_date_time" id="documents_date_time" class="form-control dateandtimepicker" type="text">
                        </div>
                      </div>
                      <div class="col-2">
                        <div class="form-group row">
                          <div class="col-sm-8">
                            <label for="documents_action_id" class="font-weight-bold text-info">Action</label>
                            <select name="documents_action_id" class="form-control" id="documents_action_id">
                              <option value="">Select</option>
                            </select>

                          </div>
                          <button class="btn btn-large btn-success add_uprow" type="button" style="margin-top: 28px;"><i class="fas fa-plus"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="popup-footer">
            <div class="popup-footer-btn">
              <button
              class="btn btn-outline-secondary close-btn f-btn">close</button>
              <button type="submit" class="btn btn-info text-white f-btn"><i
                class="fa-clipboard-check fa-fw fas"></i>
              Save</button>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-overlay"></div>
    </div>
  </form>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card shadow mb-3">
        <div class="card-body">
          <table class="display responsive  yajra-datatable" style="width: 100%;">
            <thead>
              <tr>
                <th>Department Uploaded</th>
                <th>Document Date</th>
                <th>Type</th>
                <th>Uploaded By</th>
                <th>Action</th>
                <th>Date & Time</th>
              </tr>
            </thead>

          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
@endsection
@section('script')
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



<script type="text/javascript">
  $(function() {
    var table = $('#activity_log').DataTable({
        
      dom: 'Bfrtip',
      pageLength: 15,
      lengthMenu: [
        [15, 25, 50, 100, 200, 500, 1000, -1],
        ['15 rows', '25 rows', '50 rows', '100 rows', '200 rows', '500 rows', '1000 rows', 'Show all']
        ],
      buttons: [
        'pageLength',
        
        {
          extend: 'excelHtml5',
          autoFilter: true,
          sheetName: 'Exported data'
        },
       
        {
          extend: 'print',
          text: 'PDF / PRINT',
        },
        {
          text: 'Show Column',
          extend: 'colvis',
        },
        ],
      processing: true,
      "order": [[ 0, "desc" ]],
      orderable: true,
      serverSide: true,
      responsive: true,
      scrollY: '85vh',
      ajax: "{{ route('lawyer.litigation.case.activity',$cases->id) }}",
      columns: [
          { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
      {
        data: 'activity_date',
        name: 'activity_date'
      },
      {
        data: 'activity_mode_id',
        name: 'activity_mode_id'
      },
      {
        data: 'start_time',
        name: 'start_time'
      },
      {
        data: 'end_time',
        name: 'end_time'
      },
      {
        data: 'setup_hours',
        name: 'setup_hours'
      },
      {
        data: 'time_spend_manual',
        name: 'time_spend_manual'
      },
      {
        data: 'activity_engaged_id',
        name: 'activity_engaged_id'
      },
      {
        data: 'activity_forwarded_to_id',
        name: 'activity_forwarded_to_id'
      },
      
      {
        data: 'action',
        name: 'action',
        orderable: false,
        searchable: false
      },
      ],
    });
  });
</script>

<script type="text/javascript">
  $(function() {
    var table = $('.yajra-datatable').DataTable({
        
        columnDefs: [
        {
            target: 8,
            visible: false,
        },
        {
            target: 11,
            visible: false
        }
    ],
      dom: 'Bfrtip',
      pageLength: 15,
      lengthMenu: [
        [15, 25, 50, 100, 200, 500, 1000, -1],
        ['15 rows', '25 rows', '50 rows', '100 rows', '200 rows', '500 rows', '1000 rows', 'Show all']
        ],
      buttons: [
        'pageLength',
        
        {
          extend: 'excelHtml5',
          autoFilter: true,
          sheetName: 'Exported data'
        },
       
        {
          extend: 'print',
          text: 'PDF / PRINT',
        },
        {
          text: 'Show Column',
          extend: 'colvis',
        },
        ],
      processing: true,
      "order": [[ 0, "desc" ]],
      orderable: true,
      serverSide: true,
      responsive: true,
      scrollY: '85vh',
      ajax: "{{ route('lawyer.litigation.case.proceeding',$cases->id) }}",
      columns: [
          { data: 'sl_no', name: 'sl_no'},
      {
        data: 'updated_order_date',
        name: 'updated_order_date'
      },
      {
        data: 'fixed_for_name',
        name: 'updated_fixed_for_id'
      },
      {
        data: 'proceeding_name',
        name: 'court_proceedings_id'
      },
      {
        data: 'order_name',
        name: 'order_name'
      },
      {
        data: 'updated_next_date',
        name: 'updated_next_date'
      },
      {
        data: 'next_fixed_for_name',
        name: 'updated_index_fixed_for_id'
      },
      {
        data: 'note_name',
        name: 'updated_day_notes_id'
      },
      {
        data: 'lawyer_personal_name',
        name: 'updated_engaged_advocate_id'
      },
      {
        data: 'is_bill',
        name: 'is_bill'
      },
      {
        data: 'action',
        name: 'action',
        orderable: false,
        searchable: false
      },
      {
        data: 'updated_at',
        name: 'updated_at'
      },
      ],
    });
  });
</script>

<script type="text/javascript">
    $(function () {

      var bill_table = $('#bill-log-table').DataTable({
          dom: 'Bfrtip',
          pageLength : 15,
          lengthMenu: [
              [ 15, 25, 50, 100, 200, 500, 1000, -1 ],
              [ '15 rows', '25 rows', '50 rows', '100 rows', '200 rows', '500 rows', '1000 rows', 'Show all' ]
              ],
          buttons: [
            'pageLength',
            {
                extend: 'excelHtml5',
                autoFilter: true,
                sheetName: 'Exported data'
            },
            {
                extend: 'print',
                text: 'PDF / PRINT',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
                }
            },
            {
                text: 'Show Column',
                extend: 'colvis',
            },
            ],
          processing: true,
          orderable: true,
          serverSide: true,
          responsive: true,
          scrollY: '85vh',
          ajax: "{{ route('lawyer.account.billing',['bill_case_service_id'=>$cases->id]) }}",
          columns: [
             { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
              {data: 'bill_date', name: 'bill_date'},
              {data: 'bill_no', name: 'id'},
              {data: 'bill_particulars', name: 'bill_particulars'},
              {data: 'type.name', name: 'type.name'},
              {data: 'reference.name', name: 'reference.name'},
              {data: 'bill_amount', name: 'bill_amount'},
              {data: 'balance_amount', name: 'balance_amount'},
              {
                  data: 'action', 
                  name: 'action', 
                  orderable: false, 
                  searchable: false
              },
              ],
      });
      bill_table.column(4).visible(false);
      bill_table.column(5).visible(false);
  });
</script>
<script>
  $(".Click-here").on('click', function() {
    $(".custom-model-main").addClass('model-open');
  });
  $(".close-btn, .bg-overlay").click(function() {
    $(".custom-model-main").removeClass('model-open');
  });
</script>
    
<script>
  jQuery(document).ready(function(e) {
    function t(t) {
      e(t).bind("click", function(t) {
        t.preventDefault();
        e(this).parent().fadeOut()
      })
    }
    e(".dropdown-toggle").click(function() {
      var t = e(this).parents(".button-dropdown").children(".dropdown-menu").is(":hidden");
      e(".button-dropdown .dropdown-menu").hide();
      e(".button-dropdown .dropdown-toggle").removeClass("active");
      if (t) {
        e(this).parents(".button-dropdown").children(".dropdown-menu").toggle().parents(
          ".button-dropdown").children(".dropdown-toggle").addClass("active")
      }
    });
    e(document).bind("click", function(t) {
      var n = e(t.target);
      if (!n.parents().hasClass("button-dropdown")) e(".button-dropdown .dropdown-menu").hide();
    });
    e(document).bind("click", function(t) {
      var n = e(t.target);
      if (!n.parents().hasClass("button-dropdown")) e(".button-dropdown .dropdown-toggle")
        .removeClass("active");
    })
  </script>
  
  <script>
      $(document).ready(function(){
         $('textarea').each(function(){
             
             $(this).val($(this).val().trim());
         });
      });
  </script>
  
  <script>
     
      function courTransfer() {
          
          
          var engaged_id = $('#updated_index_fixed_for_id').val();
            
            if(engaged_id=='')
            {
                 $('#updated_index_fixed_for_write').attr('required',true);
                 
            }else{
                $('#updated_index_fixed_for_id').attr('required',false);
                $('#updated_index_fixed_for_write').attr('required',false);
            }
          
            var court = $('#updated_index_fixed_for_id').val();
            if (court== 95 || court== 130) {
                $('#updated_next_date').attr('required',false);
            }else{
                $('#updated_next_date').attr('required',true);
            }
        }
        
        function fixedFor()
        {
            var fixedfor = $('#updated_fixed_for_id').val();
            
            if(fixedfor=='')
            {
                 $('#updated_fixed_for_write').attr('required',true);
                 
            }else{
                $('#updated_fixed_for_id').attr('required',false);
            }
            
        }
        
        function fixedForUpdate()
        {
         
            var fixedforwrite = $('#updated_fixed_for_write').val();
            
            if(fixedforwrite=='')
            {
                 $('#updated_fixed_for_id').attr('required',true);
            }else{
                $('#updated_fixed_for_write').attr('required',false);
            }
        }
        
        // court proceeding
        function courtProceeding()
        {
            var courtproceeding = $('#court_proceedings_id').val();
            
            if(courtproceeding=='')
            {
                 $('#court_proceedings_write').attr('required',true);
                 
            }else{
                $('#court_proceedings_id').attr('required',false);
                $('#court_proceedings_write').attr('required',false);
            }
            
        }
        
        function courtProceedingWrite()
        {
         
            var courtproceedingwrite = $('#court_proceedings_write').val();
            
            if(courtproceedingwrite=='')
            {
                 $('#court_proceedings_id').attr('required',true);
            }else{
                $('#court_proceedings_write').attr('required',false);
                $('#court_proceedings_id').attr('required',false);
            }
        }
        
        // order court
        function orderCourt()
        {
            var ordercourtid = $('#updated_court_order_id').val();
            
            if(ordercourtid=='')
            {
                 $('#updated_court_order_write').attr('required',true);
                 
            }else{
                $('#updated_court_order_id').attr('required',false);
                $('#updated_court_order_write').attr('required',false);
            }
            
        }
        
        function orderCourtWrite()
        {
         
            var courtwrite = $('#updated_court_order_write').val();
            
            if(courtwrite=='')
            {
                 $('#updated_court_order_id').attr('required',true);
            }else{
                $('#updated_court_order_write').attr('required',false);
                $('#updated_court_order_id').attr('required',false);
            }
        }
        
        // Engaged
        function engaged()
        {
            var engaged_id = $('#updated_engaged_advocate_id').val();
            
            if(engaged_id=='')
            {
                 $('#updated_engaged_advocate_write').attr('required',true);
                 
            }else{
                $('#updated_engaged_advocate_id').attr('required',false);
                $('#updated_engaged_advocate_write').attr('required',false);
            }
            
        }
        
        function engagedWrite()
        {
         
            var engaged_write = $('#updated_engaged_advocate_write').val();
            
            if(engaged_write=='')
            {
                 $('#updated_engaged_advocate_id').attr('required',true);
            }else{
                $('#updated_engaged_advocate_write').attr('required',false);
                $('#updated_engaged_advocate_id').attr('required',false);
            }
        }
        
        function ndFixedFor()
        {
         
            var engaged_write = $('#updated_index_fixed_for_write').val();
            
            if(engaged_write=='')
            {
                 $('#updated_index_fixed_for_id').attr('required',true);
            }else{
                $('#updated_index_fixed_for_write').attr('required',false);
                $('#updated_index_fixed_for_id').attr('required',false);
            }
        }
        
     
  </script>

  <script>
   $(document).ready(function () {
    $('#cpl').click(function (e) {
      var bill_date = $("#bill_date").val();
      var caseId = $("#cases_id").val();

      if(bill_date == ''){
        alert("Please Selected Date");
      }else{
        $.ajax({
          url: "{{ route('lawyer.litigation.case.bill.store.cpl')}}",
          type: "POST",
          data: {
            case_id: caseId,
            bill_date: bill_date,
            _token: '{{csrf_token()}}'
          },
          dataType: 'json',
          success: function (result) {
            $('#bill_particulars').val(result.bills.court_proceedings_write);
            alert(response.message);
          },
          error: function (error) {
            console.log(error);
          }
        });
      }

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
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script>
  /* Variables */
 var row = $(".ducument");

 function add_ducument() {
   var html = '<div  class="row add_duc"> <div class="col-4"> <div class="form-group row"> <div class="col-sm-12"> <select name="document_recived_id" class="form-control" id="document_recived_id"> <option value="">Select</option> <option value="8">Charge Form</option> <option value="7">Charge Sheet</option> <option value="16">Cheque</option> <option value="15">Cheque Dishonour</option> <option value="5">Complaint</option> <option value="9">Investigation Report</option> <option value="14">Legal Notice (Served)</option> <option value="10">Legal Notice by 1st Party</option> <option value="11">Legal Notice by 2nd Party</option> <option value="12">Letter by 1st Party</option> <option value="13">Letter by 2nd Party</option> <option value="3">Petition</option> <option value="4">Plaint</option> <option value="6">Written Statement</option> </select> </div> </div> </div> <div class="col-4"> <div class="form-group row"> <div class="col-sm-12"> <input name="document_recived_type" type="text" class="form-control" placeholder="Type"> </div> </div> </div> <div class="col-2"> <div class="form-group row"> <div class="col-sm-12"> <input name="document_recived_date" type="date" class="form-control"> </div> </div> </div> <div class="col-2"> <div class="form-group row"> <div class="col-sm-8"> <select name="document_recived_type_id" class="form-control" id="document_recived_type_id"> <option value="">Select</option> <option value="CC">CC</option> <option value="COPY">COPY</option> <option value="ORG">ORG</option> </select> </div>  <button id="Deleteduc" class="btn btn-danger " type="button"><i class="fas fa-trash-alt"></i> </button> </div> </div> </div>';
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
   var html = '<div class="row add_reque"> <div class="col-4"> <div class="form-group row"> <div class="col-sm-12"> <select name="document_required_id" class="form-control" id="document_required_id"> <option value="">Select</option> <option value="8">Charge Form</option> <option value="7">Charge Sheet</option> <option value="16">Cheque</option> <option value="15">Cheque Dishonour</option> <option value="5">Complaint</option> <option value="9">Investigation Report</option> <option value="14">Legal Notice (Served)</option> <option value="10">Legal Notice by 1st Party</option> <option value="11">Legal Notice by 2nd Party</option> <option value="12">Letter by 1st Party</option> <option value="13">Letter by 2nd Party</option> <option value="3">Petition</option> <option value="4">Plaint</option> <option value="6">Written Statement</option> </select> </div> </div> </div> <div class="col-4"> <div class="form-group row"> <div class="col-sm-12"> <input name="document_required_type" type="text" class="form-control"> </div> </div> </div> <div class="col-2"> <div class="form-group row"> <div class="col-sm-12"> <input name="document_required_date" type="date" class="form-control"> </div> </div> </div> <div class="col-2"> <div class="form-group row"> <div class="col-sm-8"> <select name="document_required_type_id" class="form-control" id="document_required_type_id"> <option value="">Select</option> <option value="CC">CC</option> <option value="COPY">COPY</option> <option value="ORG">ORG</option> </select> </div> <button id="Deletereq" class="btn btn-danger " type="button"><i class="fas fa-trash-alt"></i> </button> </div> </div> </div>';
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
   var html = '<div class="add_manage"> <div class="row manage"> <div class="col-2"> <div class="form-group"> <select name="case_file_name_id" id="case_file_name_id" class="form-control"> <option value="">Select</option> <option value="8">Charge Form</option> <option value="7">Charge Sheet</option> <option value="16">Cheque</option> <option value="15">Cheque Dishonour</option> <option value="5">Complaint</option> <option value="9">Investigation Report</option> <option value="14">Legal Notice (Served)</option> <option value="10">Legal Notice by 1st Party</option> <option value="11">Legal Notice by 2nd Party</option> <option value="12">Letter by 1st Party</option> <option value="13">Letter by 2nd Party</option> <option value="3">Petition</option> <option value="4">Plaint</option> <option value="6">Written Statement</option> </select> </div> </div> <div class="col-2"> <div class="form-group"> <input name="case_file_from" id="case_file_from" class="form-control" type="text" placeholder="Type"> </div> </div> <div class="col-2"> <div class="form-group">  <input name="case_file_to" id="case_file_to" class="form-control" type="text" placeholder="Type"> </div> </div> <div class="col-2"> <div class="form-group"><input name="case_file_date" id="case_file_date" class="form-control" type="date"> </div> </div> <div class="col-1"> <div class="form-group"><input name="case_file_archive" id="case_file_archive" class="form-control" type="text"> </div> </div> <div class="col-1"> <div class="form-group"><input name="case_file_cabinate" id="case_file_cabinate" class="form-control" type="text" placeholder="Type"> </div> </div> <div class="col-2"> <div class="form-group row"> <div class="col-sm-8">  <input name="case_file_note" id="case_file_note" class="form-control" type="text" placeholder="Type"> </div><button id="Deletemanage" class="btn btn-danger " type="button" ><i class="fas fa-trash-alt"></i> </button> </div> </div> </div> </div>';
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
 var row = $(".upload_duc");

 function add_upload() {
   var html = '<div class="row upload"> <div class="col-2"> <div class="form-group"> <input type="file" name="documents_file" id="documents_file" class="form-control" style="padding: 3px;"> </div> </div> <div class="col-2"> <div class="form-group"> <input name="documents_doc_date" id="documents_doc_date" class="form-control" type="date"> </div> </div> <div class="col-2"> <div class="form-group">  <select name="documents_type_id" class="form-control" id="documents_type_id"> <option value="">Select</option> <option value="CC">CC</option> <option value="COPY">COPY</option> <option value="ORG">ORG</option> </select> </div> </div> <div class="col-2"> <div class="form-group"><input name="documents_uploaded_by" id="documents_uploaded_by" class="form-control" readonly type="text"> </div> </div> <div class="col-2"> <div class="form-group"> <input name="documents_date_time" id="documents_date_time" class="form-control dateandtimepicker" type="text"> </div> </div> <div class="col-2"> <div class="form-group row"> <div class="col-sm-8">  <select name="documents_action_id" class="form-control" id="documents_action_id"> <option value="">Select</option> </select> </div><button id="Deleteup" class="btn btn-danger " type="button"><i class="fas fa-trash-alt"></i> </button>  </div> </div> </div>';
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
@endsection