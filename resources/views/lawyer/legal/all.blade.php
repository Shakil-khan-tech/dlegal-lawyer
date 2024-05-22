@extends('layouts.lawyer.layout')
@section('title')
<title>{{ $title }}</title>
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
    /*.paginate_button {

    }*/
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
.dropdown-toggle::after {
    border: 0;
}
</style>
@endsection
@section('lawyer-content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h4 class="m-0 font-weight-bold"> {{ $title }}</h4>
            </div>
            <div class="card-body">
                <div class="py-2 d-flex justify-content-between">
                    <div class="dflex justify-content-between">
                        <a href="" class="btn btn-info mb-2">ALL</a>
                        <a href="" class="btn btn-secondary mb-2">DRAFTING</a>
                        <a href="" class="btn btn-secondary mb-2">VETTING</a>
                        <a href="" class="btn btn-secondary mb-2">LEGAL OPINION</a>
                        <a href="" class="btn btn-secondary mb-2">LEGAL CONSULTATION</a>
                        <a href="" class="btn btn-secondary mb-2">LEGAL NOTICE/REPLY</a>
                        <a href="" class="btn btn-secondary mb-2">SEARCHING & INQUIRY</a>
                        <a href="" class="btn btn-secondary ">AFFIDAVID & NOTARY</a>
                    </div>
                    <a href="{{ route('lawyer.legalservice.create') }}" class="btn btn-info text-white" style="height:30px;">ADD</a>
                </div>
                    
                <table class="display responsive  yajra-datatable" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Service Category</th>
                            <th>Service Type</th>
                            <th>Service Mater</th>
                            <th>Dispute</th>
                            <th>Client Name</th>
                            <th>Legal Service Required</th>
                            <th>Law</th>
                            <th>Service Progress Status</th>
                            <th>Receive Date & Time</th>
                            <th>Received By</th>
                            <th>Service Timeline</th>
                            <th>Service Completed</th>
                            <th>Service Delivered</th>
                            <th>Delivery To</th>
                            <th>Service/Evidence Type</th>
                            <th>Advocate/Law Firm</th>
                            <th style="width:30px!important;padding-right:8pximportant;padding-left:0px;" >Action</th>
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
              'pageLength','colvis', 
             
             

],
processing: true,
orderable: true,
serverSide: true,
responsive: true,
scrollY: '85vh',
scrollX: true,
sScrollXInner: "100%",
// scrollCollapse: true,
ajax: "{{ route(\Request::route()->getName()) }}",
columns: [
  {data: 'id', name: 'id'},
  {data: 'service_info_category_id', name: 'service_info_category_id'},
  {data: 'service_info_type_id', name: 'service_info_type_id'},
  {data: 'service_info_mater_id', name: 'service_info_mater_id'},
  {data: 'service_info_dispute', name: 'service_info_dispute'},
  {data: 'service_info_client_name_id', name: 'service_info_client_name_id'},
  {data: 'service_info_legal_service_required_id', name: 'service_info_legal_service_required_id'},
  {data: 'service_info_low_id', name: 'service_info_low_id'},
  {data: 'service_progress_status_id', name: 'service_progress_status_id'},
  {data: 'service_status_recive_date_time', name: 'service_status_recive_date_time'},
  {data: 'service_status_recived_by_id', name: 'service_status_recived_by_id'},
  {data: 'service_status_timeline_deadline', name: 'service_status_timeline_deadline'},
  {data: 'service_status_completed', name: 'service_status_completed'},
  {data: 'service_status_delivered', name: 'service_status_delivered'},
  {data: 'service_status_delivery_to_id', name: 'service_status_delivery_to_id'},
  {data: 'service_status_evidence_type_id', name: 'service_status_evidence_type_id'},
  {data: 'client_advocate_law_firm_id', name: 'client_advocate_law_firm_id'},
  {
      data: 'action', 
      name: 'action', 
      orderable: false, 
      searchable: false
  },
  ],
});
table.column(8).visible(false);
        table.column(5).visible(false);
        table.column(9).visible(false);
        table.column(10).visible(false);
        table.column(13).visible(false);
        table.column(15).visible(false);
        table.column(16).visible(false);
});
</script>
@endsection
