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
table.dataTable tbody th, table.dataTable tbody td{
     font-size: 14px !important;
    line-height: 14px !important;

 
}
a ,a:hover {
    text-decoration: none !important;
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
                <div class="py-2 d-flex justify-content-end">
                    <a href="{{ route('lawyer.account.ledger-entry-create') }}" class="btn btn-info text-white">ADD</a>
                </div>
                    
                <table class="display responsive yajra-datatable" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Bill FD</th>
                            <th>Ledger No.</th>
                            <th>Ledger Date</th>
                            <th>Litigation/Service</th>
                            <th>Case/Service/Job</th>
                            <th>Ledger Head</th>
                            <th>Ledger SubHead</th>
                            <th>Payment Type</th>
                            <th>Received Amount</th>
                            <th>Payment Completed</th>
                            <th>Adjusment Reason</th>
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

<script>
  function tg(id){
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
scrollX: true,
sScrollXInner: "100%",
ajax: "{{ route(\Request::route()->getName()) }}",
columns: [
  {data: 'id', name: 'id'},
  {data: 'client.name', name: 'client.name'},
  {data: 'bill_date', name: 'bill_date'},
  {data: 'bill_no', name: 'bill_no'},
  {data: 'transaction_date', name: 'transaction_date'},
  {data: 'litigation_service_id', name: 'litigation_service_id'},
  {data: 'case_no', name: 'case_no'},
  {data: 'ledgerhead.name', name: 'ledgerhead.name'},
  {data: 'ledgersubhead_name', name: 'ledgersubhead_name'},
  {data: 'paymenttype_name', name: 'paymenttype_name'},
  {data: 'paid_received_amount', name: 'paid_received_amount'},
  {data: 'completed', name: 'completed'},
  {data: 'adjustmentreason_name', name: 'adjustmentreason_name'},
  {
      data: 'action', 
      name: 'action', 
      orderable: false, 
      searchable: false
  },
  ],
});
table.column(5).visible(false);
table.column(7).visible(false);
table.column(9).visible(false);
table.column(11).visible(false);
table.column(12).visible(false);
});
</script>
@endsection
