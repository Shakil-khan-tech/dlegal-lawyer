@extends('layouts.lawyer.layout')
@section('title')
<title>{{ $title }}</title>
@endsection
@section('style')

<style>

.minus-header {
    height: 1em;
    width: 1em;
    display: inline-block;
    color: white;
    border: 0.15em solid white;
    border-radius: 1em;
    box-shadow: 0 0 0.2em #444;
    box-sizing: content-box;
    text-align: center;
    text-indent: 0 !important;
    font-family: "Courier New",Courier,monospace;
    line-height: 1em;
    background-color: #31b131;
}
.minus-header i{
        font-size: 10px;
}

.balance_rep{
    background: #fff;
    border: 0;
    padding: 0;
    height: 0;
}
.header-main{
        justify-content: space-between;
}
.balance_rep:hover {
    color: #fff;
    background-color: #fff;
    border-color: #fff;
    box-shadow: 0 0 0 0rem rgb(235 236 239 / 0%);
}
.btn-primary:not(:disabled):not(.disabled):active:focus{
    box-shadow: 0 0 0 0rem rgba(105, 136, 228, 0.5);
}
.card-header-rep{
    padding:0.75rem 1rem;
}
.card-header-rep h3{
    font-size:18px;
    margin:0;
}
.btn:focus {
    outline: 0;
    box-shadow: 0 0 0 0rem rgba(13,110,253,.25) !important;
}
.shadow{
    border-bottom:0 !important;
}
.card-header-report {
    padding-bottom: 0px !important;
    padding-left: 1rem !important;
    border-bottom: 1px solid #000;
}
.text-info {
    color: #36b9cc !important;
}
.btn-section{
        display: flex;
    justify-content: space-between;
}
.current {
    z-index: 3;
    color: #fff !important;
    background-color: #3AAFA9 !important;
    border-color: #3AAFA9 !important;
}
.action_doc .dropdown-toggle::after {
    display: none;
}
.bill{
        background: #ffc400;
    text-align: center;
    border-radius: 5px;
    color: #8d6213;
    font-size: 15px;
}
</style>
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
    
.dropdown-toggle::after {
    border: 0;
}
.dropdown-item {
    display: block;
    width: 100%;
    padding: 0.25rem 1rem;
    clear: both;
    font-weight: 400;
    color: #3a3b45;
    text-align: inherit;
    white-space: nowrap;
    background-color: transparent;
    border: 0;
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
    border-radius: 0.35rem;
}
.dropdown-item .fa-trash-alt{
    color:red;
}

a ,a:hover {
    text-decoration: none !important;
}

</style>
@endsection
@section('lawyer-content')

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-3">
            <div class="card-header-rep">
                <div class="d-flex header-main justify-content-between">
                    <p class="mb-0">All Cases :: Search</p>
                    <div class="minus-header">
                        <i class="fas fa-fw fa-plus fa-minus cursor-pointer" onclick="$('#custom-report').toggleClass('d-none');$('#report-icon').toggleClass('fa-plus');" style="cursor: pointer;" id="report-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @php
    $classes = \App\ClientClass::where('status',1)->oldest('name')->get();
    @endphp
    
    <div class="col-12">
        <div id="custom-report" class="card shadow mb-4  d-none">
            <div class="card-header-report py-3">
                <div class="d-flex header-main">
                    <h3>Balance Report Search</h3>
                </div>
            </div>
             <div  class="card-body">
                <form action="{{route('lawyer.account.balance-report.filter')}}" method="post">
                    @csrf
                    {{-- report info section --}}
                      <div class="case-info-section section">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="bill_category_id" class="col-form-label font-weight-bold text-info col-md-4">Client Class</label>
                                    <div class="col-md-8 col-8">
                                        <select name="client_class_id" id="client_class_id" class="form-control" required>
                                            <option value="">Select</option>
                                            @foreach($classes as $client)
                                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bill_category_id" class="col-form-label font-weight-bold text-info col-md-4">Client/Party</label>
                                    <div class="col-md-8 col-8">
                                        <select name="client_id" id="bill_client_id" class="form-control select2" required>
                                            <option value="">Select</option>
                                            @foreach($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">Case/Service 
                                    Class</label>
                                    <div class="col-md-8">
                                        <select name="type" id="case_category_id" class="form-control" required>
                                            <option value="">Select</option>
                                            <option value="District">District</option>
                                            <option value="Special">Special</option>
                                            <option value="High Court">High Court</option>
                                            <option value="Appellate">Appellate</option>
                                            <option value="District & Special">District & Special</option>
                                            <option value="Supreame Court">Supreame Court</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">Bill Category (litigation/Service)</label>
                                    <div class="col-md-8">
                                        <select name="category" id="bill_category_id" class="form-control" required>
                                            <option value="">Select</option>
                                            <option value="Litigation">Litigation</option>
                                            <option value="Service">Service</option>
                                            <option value="all">All</option>
                                        </select>
                                    </div>
                                </div>
                                
                                 <div class="form-group row">
                                    <label for="bill_case_service_id" class="col-form-label font-weight-bold text-info col-md-4" required>Case/Service</label>
                                    <div class="col-md-8">
                                        <select name="bill_case_service_id" id="bill_case_service_id" class="form-control">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                </div>
                            
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">Invoice Subject</label>
                                    <div class="col-md-8">
                                        <select onchange="if($('#subject_id').val() == ''){$('#subject_name').attr('required',true)}else{$('#subject_name').attr('required',false)}" name="subject_id" id="subject_id" class="form-control" required>
                                            <option value="">Select</option>
                                            @foreach($subjects as $client)
                                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4"></label>
                                    <div class="col-md-8">
                                        <input onchange="if($('#subject_name').val() == ''){$('#subject_id').attr('required',true)}else{$('#subject_id').attr('required',false)}" type="text" class="form-control" name="subject_name" id="subject_name" value="" placeholder="Type sub">
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">From Date</label>
                                    <div class="col-md-8 ">
                                        <input type="date" name="from" class="form-control" required>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">To Date</label>
                                    <div class="col-md-8 ">
                                        <input type="date" name="to" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">Chamber</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="chamber_id" required>
                                            <option value="">Select Chamber</option>
                                            @foreach($chambers as $row)
                                            <option value="{{ $row->id}}">{{ $row->ch_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        
                                    </div>
                                    <div class="col-md-8">
                                        <div class="billing-btn justify-content-end d-flex">
                                            <button type="submit" class="btn btn-info mx-1" style="font-size: 14px;background-color:#3AAFA9; color:white;"><i class="fa-clipboard-check fa-fw fas"></i> Search</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h4 class="m-0 font-weight-bold"> {{ $title }}</h4>
                @if(session()->has('client_id'))
                <a href="{{ route('lawyer.account.balance.print') }}" class="btn btn-info text-white"> Print</a>
                @endif
            </div>
            <div class="card-body">
                <div class="py-2">
                        <span class="font-weight-bold">Total Bill: Tk.{{$bills->sum('bill_amount')}}, Total Received: Tk.{{$ledgers->sum('paid_received_amount')}}, Total Balance: Tk.{{$bills->sum('bill_amount') - $ledgers->sum('paid_received_amount')}}</span>
                </div>
                    
                <table class="display responsive yajra-datatable" style="width: 100%;">
                    <thead>
                        <tr>
                        <th>SL</th>
                        <th>Client </th>
                        <th>Case/Service </th>
                        <th>Bill No. </th>
                        <th>Bill Amount</th>
                        <th>Received Amount</th>
                        <th>Balance Amount </th>
                        <th>Status</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script type="text/javascript">
    $(function () {

      var table = $('.yajra-datatable').DataTable({
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
                text: 'Show Column',
                extend: 'colvis',
            },
            ],
processing: true,
orderable: true,
serverSide: true,
responsive: true,
scrollY: '85vh',
scrollX: true,
sScrollXInner: "100%",
ajax: "{{ route(\Request::route()->getName()) }}",
columns: [
  { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
  { data: 'client.name', name: 'client.name' },
  { data: 'case_no', name: 'case_no'},
  { data: 'bill_no', name: 'bill_no'},
  { data: 'bill_amount', name: 'bill_amount'},
  { data: 'received_amount', name: 'received_amount'},
  { data: 'balance_amount', name: 'balance_amount'},
  { data: 'status', name: 'status'},
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

 $(document).ready(function () {
     
     
     $('#client_class_id').on('change',function () {
        var client_class_id = $('#client_class_id').val();
        var billClient = $('#bill_client_id');
        if(client_class_id)
        {
        $.ajax({
            url: "{{ route('lawyer.account.getClient')}}",
            type: "POST",
            data: {
                client_class_id: client_class_id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function (res) {
                
                billClient.empty();
                billClient.html('<option value="">Select</option>');
                $.each(res, function (key, value) {
                    billClient.append('<option value="' + value
                        .id + '">' +value.name+ '</option>');
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
            }
    });
     

    $('#bill_client_id').on('change',function () {
        var billClient = $('#bill_client_id').val();
        var caseCategory = $('#case_category_id').val();
        var billCategory = $('#bill_category_id').val();
        if(billCategory !="Litigation" || $("#bill_client_id").val()=='')
        {
            $('#bill_case_service_id').empty();
            $('#bill_case_service_id').html('<option value="">-- Select --</option>');
            return;
        }
        $.ajax({
            url: "{{ route('lawyer.account.billClient')}}",
            type: "POST",
            data: {
                caseCategory: caseCategory,
                billClient: billClient,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function (res) {
                
                $('#bill_case_service_id').html('<option value="">Select</option>');
                $.each(res.cases, function (key, value) {
                     var data = value.case_title_short.name_short+' '+value.case_infos_case_no+'/'+value.case_infos_case_year;
                    $("#bill_case_service_id").append('<option value="' + value
                        .id + '">' +data+ '</option>');
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
    
    $('#bill_category_id').on('change',function () {

        var billClient = $('#bill_client_id').val();
        var caseCategory = $('#case_category_id').val();
        var billCategory = $('#bill_category_id').val();
        if(billCategory !="Litigation" || $("#bill_client_id").val()=='')
        {
            $('#bill_case_service_id').empty();
            $('#bill_case_service_id').html('<option value="">Select</option>');
            return;
        }
        $.ajax({
            url: "{{ route('lawyer.account.billClient')}}",
            type: "POST",
            data: {
                caseCategory: caseCategory,
                billClient: billClient,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function (res) {
                $('#bill_case_service_id').html('<option value="">Select</option>');
                $.each(res.cases, function (key, value) {
                    var data = value.case_title_short.name_short+' '+value.case_infos_case_no+'/'+value.case_infos_case_year;
                    $("#bill_case_service_id").append('<option value="' + value
                        .id + '">' +data+ '</option>');
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
    $('#case_category_id').on('change',function () {

        var billClient = $('#bill_client_id').val();
        var caseCategory = $('#case_category_id').val();
        var billCategory = $('#bill_category_id').val();
        if(billCategory !="Litigation" || $("#bill_client_id").val()=='')
        {
            $('#bill_case_service_id').empty();
            $('#bill_case_service_id').html('<option value="">Select</option>');
            return;
        }
        $.ajax({
            url: "{{ route('lawyer.account.billClient')}}",
            type: "POST",
            data: {
                caseCategory: caseCategory,
                billClient: billClient,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function (res) {
                $('#bill_case_service_id').html('<option value="">Select</option>');
                $.each(res.cases, function (key, value) {
                    var data = value.case_title.name_short+' '+value.case_infos_case_no+'/'+value.case_infos_case_year;
                    $("#bill_case_service_id").append('<option value="' + value
                        .id + '">' +data+ '</option>');
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
    
});

</script>
@endsection
