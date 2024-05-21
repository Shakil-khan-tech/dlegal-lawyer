
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Cause List</title>

  <!-- Custom fonts for this template-->
  <link href="https://dlegal.visamohol.com/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://dlegal.visamohol.com/backend/css/sb-admin-2.css" rel="stylesheet">
  <link href="https://dlegal.visamohol.com/backend/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://dlegal.visamohol.com/client/css/jquery-ui.min.css">
  <link rel="stylesheet" href="https://dlegal.visamohol.com/client/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="https://dlegal.visamohol.com/client/css/select2.min.css">
  <link rel="stylesheet" href="https://dlegal.visamohol.com/toastr/toastr.min.css">
  <link rel="stylesheet" href="https://dlegal.visamohol.com/backend/css/bootstrap4-toggle.min.css">
  <link rel="stylesheet" href="https://dlegal.visamohol.com/backend/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="https://dlegal.visamohol.com/backend/timepicker/jquery.timepicker.min.css">
  <link rel="stylesheet" href="https://dlegal.visamohol.com/backend/timepicker/jquery.datetimepicker.min.css">
  <link rel="stylesheet" href="https://dlegal.visamohol.com/backend/css/prescription.css">
  <link rel="stylesheet" href="https://dlegal.visamohol.com/backend/css/style.css">
  <link rel="stylesheet" href="https://dlegal.visamohol.com/backend/css/spacing.css">
  <link rel="stylesheet" href="https://dlegal.visamohol.com/backend/css/monthly.css">
  <!-- Bootstrap core JavaScript-->
  <script src="https://dlegal.visamohol.com/backend/vendor/jquery/jquery.min.js"></script>
  <script src="https://dlegal.visamohol.com/backend/timepicker/jquery.timepicker.min.js"></script>
  <script src="https://dlegal.visamohol.com/backend/timepicker/jquery.datetimepicker.full.min.js"></script>


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
    }

    table.dataTable tbody td {
      padding: 8px 10px;
      padding-top: 0;
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
      margin-left: 15px;

    }

    .cause-header-arrow {
      background: #ffffff;
      border: 1px solid #ccc;
      padding: 3px 5px;
      border-radius: 6px;
      text-decoration: none;
      font-size: 14px;
      line-height: 19px;
      margin-left: 10px;

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
    .powerby h6{
    font-size:15px;
}
.powerby span{
      font-weight: 700;
}
.invoice_footer_box{
    border-top: 1px solid #3AAFA9;
    padding-top: 10px;
    display: flex;
    justify-content: center;
    padding-bottom: 5px;
}
.invoice_line{
    width: 200px;
    height: 1px;
    background: #ccc;
    margin-bottom: 5px;
}
.invoice_footer{
        display: flex;
    justify-content: center;
}
.account_inv{
    width: 200px;
    text-align: center;
    font-size: 15px;
}
.invoice_heading{
    background: #3AAFA9 !important;
    text-align: center;
    color: #fff;
    letter-spacing: 7px;
    height: 35px;
    line-height: 35px;
    align-items: baseline;
    border-radius: 5px;
    margin: 20px 0;
}
.invoice_heading h5{
    font-weight: 800;
    margin: 0;
    line-height: 35px;
}
.leader_info_inv h3{
    color: #000;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 24px;
}
.leader_info_inv p{
        margin-bottom: 0;
    font-size: 14px;
    font-weight: bold;
    color: #000;
}
.ledger_info_invoice {
    margin: 0px;
    font-size: 14px;
    font-weight: 600;
    color: #000;
}
.ledger_report_inv {
    padding:10px 0;
}
.ledger_logo_invoice{
    text-align: center;
}
.ledger_logo_invoice img{
    width: 140px;
    border-radius: 5px;
}
th,td {
    font-size:14px !important;
}
  </style>

</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="ledger_report_inv ">
    <div class="row">
      <div class="col-4">
        <div class="leader_info_inv">
         <h3>MD Niamul Kabir (Zoha)</h3>
       </div>
       <div class="leader_info_inv">
        <p>LL.B(Hons), LL.M </p>
      </div>
      <div class="leader_info_inv">
        <p>Advocate</p>
      </div>
      <div class="leader_info_inv">
        <p>Suprome Court of Bangladesh</p>
      </div>
    </div>
    <div class="col-4">
      <div class="ledger_logo_invoice">
        <img src="https://dlegal.visamohol.com/uploads/logo.jpg" alt="">
      </div>                    
    </div>
    <div class="col-4">
      <div class="ledger_info_invoice">
        <div>
          <span>365/B, Modhubag, Moghbazar <br/>
          Hatirjheel Thana, Dhaka-1217, Bangladesh</span>
          
        </div>
        <div>
          <span>Cell: 01717406688</span>
        </div>
        <div>
         <span>Email: niamulkaber.adv@gmail.com</span>
       </div>
     </div>
   </div>
   <div class="col-12">
    <div class="invoice_heading">
      <h5>CAUSE LIST</h5>
    </div>
  </div>
</div>
</div>
<div class="row justify-content-center">
 <div class="row">

  @php
  $date = request()->date;
  $cpl = \App\CaseProceeding::with('cases','cases.caseTitleShort','fixed_for','cases.thana','cases.client','cases.matter','cases.type','lawyer')->whereLawyerId(auth()->guard('lawyer')->id())->whereDate('updated_next_date',$date)->orderBy('court')->get();
  @endphp
  <div class="col-sm-12">
    <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0" role="grid" style="width: 100%;">
      <th class="cause-tb" style="font-size:18px !important;font-weight:bold">{{\Carbon\Carbon::parse($date)->format('d-m-Y')}} <br><span>{{\Carbon\Carbon::parse($date)->format('l')}}</span></th>
      <th>Total <br> {{$cpl->count()}}</th>
      <th>Civil <br>{{$cpl->where('case_category','Civil')->count()}}</th>
      <th>Criminal <br>{{$cpl->where('case_category','Criminal')->count()}}</th>
      <th>Appeal <br>{{$cpl->where('case_type','Appeal')->count()}}</th>
      <th>Revision <br>{{$cpl->where('case_type','Revision')->count()}}</th>
      <th>Others <br>0</th>
    </table>
    <table class="table table-bordered table-striped calendar_list">
      <thead>
        <tr>
          <th style="color:#858796 !important;" width="5%">SL</th>
          <th style="color:#858796 !important;" width="8%">Court</th>
          <th style="color:#858796 !important;" width="14%">Case No.</th>
          <th style="color:#858796 !important;" width="16%">Fixed For</th>
          <th style="color:#858796 !important;" width="11%">Police Station</th>
          <th style="color:#858796 !important;" width="18%">Parties</th>
          <th style="color:#858796 !important;" width="11%">Matter</th>
          <th style="color:#858796 !important;" width="17%">PV. Date & Fixed For</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cpl as $row)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td> {{$row->court}} </td>
          <td><span style="color:blue;">{{ @$row->cases->caseTitleShort->name_short.' '.@$row->cases->case_infos_case_no.'/'.@$row->cases->case_infos_case_year }}</span></td>
          <td>{{$row->next_fixed_for ? $row->next_fixed_for->name : $row->updated_index_fixed_for_write}}</td>
          <td>{{@$row->cases->thana->thana_name}}</td>
         @if($row->cases->client_party_id == 1)
            <td><span style="color:blue;"> {{$row->cases->client->name}}</span> <br/> {{@$row->cases->opponent_info_name}} </td>
        @else
            <td>{{@$row->cases->opponent_info_name}} <br/> <span style="color:blue;">{{$row->cases->client->name}} </span></td>
        @endif
          <td>{{@$row->cases->matter->name}} </td>
          <td>{{$row->updated_order_date ? $row->updated_order_date->format('d/m/Y') : ''}} <br/>{{$row->fixed_for ? $row->fixed_for->name : $row->updated_fixed_for_write}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
</div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->


<script src="https://dlegal.visamohol.com/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
  window.onload = function () {
    window.print();
  }
</script>


</body>

</html>