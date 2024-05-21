@extends('layouts.lawyer.layout')
@section('title')
<title>Clients List</title>
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
    .btn-secondary {
    color: #000 !important;
    background-color: #fff !important;
    border-color: #3AAFA9 !important;
    font-weight: 400 !important;
}
</style>
@endsection
@section('lawyer-content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h4 class="m-0 font-weight-bold"><i class="fa fa-users text-primary"></i>Clients Person List</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between pt-0 pb-2">
                    <div class="dflex justify-content-between">
                        <a href="{{ route('lawyer.client.index') }}" class="btn btn-secondary text-white">BUSINESS</a>
                        <a href="#" class="btn btn-info text-white">PERSON</a>
                    </div>
                    <a href="{{ route('lawyer.client.create') }}" class="btn btn-info text-white">ADD</a>
                </div>
                <table class="display responsive nowrap yajra-datatable" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Business Name</th>
                            <th>Profession</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Created At</th>
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
                // 'copy',
                // {
                //     text: 'JSON',
                //     action: function(e, dt, button, config) {
                //         var data = dt.buttons.exportData();

                //         $.fn.dataTable.fileSave(
                //             new Blob([JSON.stringify(data)]),
                //             'Export.json'
                //         );
                //     }
                // },
                // {
                //     extend: 'excelHtml5',
                //     autoFilter: true,
                //     sheetName: 'Exported data'
                // },
                // 'csv',
                // {
                //     text: 'TSV',
                //     extend: 'csvHtml5',
                //     fieldSeparator: '\t',
                //     extension: '.tsv'
                // },
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
ajax: "{{ route('lawyer.client.person.index') }}",
columns: [
  { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
  {data: 'name', name: 'name'},
  {data: 'business_name', name: 'business_name'},
  {data: 'profession', name: 'profession'},
  {data: 'mobile', name: 'mobile'},
  {data: 'email', name: 'email'},
  {data: 'address', name: 'address'},
  {data: 'created_at', name: 'created_at'},
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
@endsection
