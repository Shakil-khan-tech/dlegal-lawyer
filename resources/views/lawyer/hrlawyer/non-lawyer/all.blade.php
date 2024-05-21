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

    .dataTables_info {
        font-weight: bold;
    }

    .dataTables_filter label {
        font-weight: bold;
    }

    .current {
        background-color: #3AAFA9 !important;
    }

    .paginate_button {

    }
    .minus-header{
        border: 1px solid #0CA2A3;
        border-radius: 50%;
        color: #0CA2A3;
    }
    .header-main{
        padding: 8px 25px;
    }
    .header-main p{
        color: #000;
        font-size: 16px;
        font-weight: 500;
    }
    .fa-users{
        color: #3DB4B4 !important;
    }
    .search {
        background: #36b9cc;
        color: #fff;
        border: none;
        width: 100px;
        height: 30px;
        border-radius: 4px;
        font-size: 13px;
        line-height: 30px;
    }

    .search i {
        padding-right: 5px;
    }
    .case-date {
        position: relative;
        padding-right: 25px;
    }

    .case-date-menu {
        position: relative;
    }

    .case-date-menu i {
        position: absolute;
        top: 10px;
        right: 2px;
    }
    .btn-section {
        display: flex;
        justify-content: space-between;
        padding: 40px 0;
    }
</style>
@endsection
@section('lawyer-content')


<div class="row justify-content-center">
    {{-- <h2 class="mb-4">All Cases</h2> --}}
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h4 class="m-0 font-weight-bold"><i class="fa fa-users text-primary"></i> {{ $title }}</h4>
            </div>
            <div class="card-body">
                
                <div class="py-2 d-flex justify-content-end">
                    <a href="{{ route('lawyer.hrnonlawyer.create') }}" class="btn btn-info text-white">ADD</a>
                </div>
               
                <table class="display responsive  yajra-datatable" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Pro. Number</th>
                            <th>Pro. Email</th>
                            <th>Chamber Joined</th>
                            <th>Bar Council Enrollment</th>
                            <th>High Court Enrollment</th>
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
    $(function() {

        var table = $('.yajra-datatable').DataTable({
            dom: 'Bfrtip',
            pageLength: 15,
            lengthMenu: [
                [15, 25, 50, 100, 200, 500, 1000, -1],
                ['15 rows', '25 rows', '50 rows', '100 rows', '200 rows', '500 rows', '1000 rows', 'Show all']
            ],
            buttons: [
                'pageLength',
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
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'personal_name',
                    name: 'personal_name'
                },
                {
                    data: 'role.name',
                    name: 'role_id'
                },
                {
                    data: 'mobile_number_pro',
                    name: 'mobile_number_pro'
                },
                {
                    data: 'email_pro',
                    name: 'email_pro'
                },
                {
                    data: 'date_of_joining',
                    name: 'date_of_joining'
                },
                {
                    data: 'sanad_no',
                    name: 'sanad_no'
                },
                {
                    data: 'high_court_membership_no',
                    name: 'high_court_membership_no'
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

@endsection