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
                            <th>Progress Status</th>
                            <th>Service Received</th>
                            <th>Service Timeline</th>
                            <th>Service Completed</th>
                            <th>Service Delivered</th>
                            <th>Delivery Mode</th>
                            <th>Service Category</th>
                            <th>Service Type</th>
                            <th>Service Matter</th>
                            <th>Service Description</th>
                            <th>Client Name</th>
                            <th>Assigned Person</th>
                            <th>Assigned Lead</th>
                            <th>Reference ID</th>
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
  {data: 'Progress Status', name: 'Progress Status'},
  {data: 'Service Received', name: 'Service Received'},
  {data: 'Service Timeline', name: 'Service Timeline'},
  {data: 'Service Completed', name: 'Service Completed'},
  {data: 'Service Delivered', name: 'Service Delivered'},
  {data: 'police station', name: 'police station'},
  {data: 'Service Category', name: 'Service Category'},
  {data: 'Service Type', name: 'Service Type'},
  {data: 'Service Matter', name: 'Service Matter'},
  {data: 'Service Description', name: 'Service Description'},
  {data: 'Client Name', name: 'Client Name'},
  {data: 'Assigned Person', name: 'Assigned Person'},
  {data: 'Assigned Lead', name: 'Assigned Lead'},
  {data: 'Reference ID', name: 'Reference ID'},
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
