@extends('layouts.lawyer.layout')
@section('title')
<title>Role List</title>
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
    {{-- <h2 class="mb-4">All Cases</h2> --}}
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h4 class="m-0 font-weight-bold"><i class="fa fa-users text-primary"></i> Role List</h4>
            </div>
            <div class="card-body">
                <div class="py-2 d-flex justify-content-end">
                    <a href="{{ route('lawyer.role.create') }}" class="btn btn-info text-white">ADD</a>
                </div>
                <table class="display responsive nowrap yajra-datatable" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
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
              'copy',
              {
                  text: 'JSON',
                  action: function ( e, dt, button, config ) {
                      var data = dt.buttons.exportData();

                      $.fn.dataTable.fileSave(
                          new Blob( [ JSON.stringify( data ) ] ),
                          'Export.json'
                          );
                  }
              },
              {
                  extend: 'excelHtml5',
                  autoFilter: true,
                  sheetName: 'Exported data'
              },
              'csv',
              {
                  text: 'TSV',
                  extend: 'csvHtml5',
                  fieldSeparator: '\t',
                  extension: '.tsv'
              },
              {
                  extend: 'print',
                  text: 'PDF / PRINT',
                  exportOptions: {
                      columns: [ 0, 1, 2],
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
            // scrollCollapse: true,
          ajax: "{{ route('lawyer.role.all') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'status', name: 'status'},
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
