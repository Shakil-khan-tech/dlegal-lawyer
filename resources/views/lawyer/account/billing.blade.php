@extends('layouts.lawyer.layout')
@section('title')
<title>{{ $title }}</title>
@endsection
@section('style')

{{-- datatable-yajra --}}
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
                    <a href="{{ route('lawyer.account.billing-create') }}" class="btn btn-info text-white">ADD</a>
                </div>

                <table class="display responsive nowrap yajra-datatable" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Bill FD</th>
                            <th>Bill No.</th>
                            <th>Client</th>
                            <th>Litigation/Service</th>
                            <th>Case/Service</th>
                            <th>Particulars</th>
                            <th>Note</th>
                            <th>Bill Amount</th>
                            <th>Balance</th>
                            <th>Inv.</th>
                            <th>Action</th>
                             <th>Bill Type</th>
                            <th>Bill Ref.</th>
                            <th>Bill Ref. Code</th>
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
          ajax: "{{ route(\Request::route()->getName()) }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'bill_date', name: 'bill_date'},
              {data: 'bill_no', name: 'id'},
              {data: 'client.name', name: 'client.name'},
              {data: 'bill_category_id', name: 'bill_category_id'},
              {data: 'case_no', name: 'case_no'},
              {data: 'bill_particulars', name: 'bill_particulars'},
              {data: 'bill_note', name: 'bill_note'},
              {data: 'bill_amount', name: 'bill_amount'},
              {data: 'balance_amount', name: 'balance_amount'},
              {data: 'invoice_status', name: 'invoice_status'},
              {
                  data: 'action', 
                  name: 'action', 
                  orderable: false, 
                  searchable: false
              },
              {data: 'type.name', name: 'type.name'},
              {data: 'reference_name', name: 'reference_name'},
              {data: 'ref_code', name: 'ref_code'},
              ],
      });
       table.column(4).visible(false);
      table.column(6).visible(false);
      table.column(7).visible(false);
       table.column(12).visible(false);
       table.column(13).visible(false);
  });
</script>
@endsection
