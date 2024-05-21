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
     table.dataTable thead th{
            border:0 !important;
            text-align: center;
     }
    table.dataTable thead th, table.dataTable thead td {
    font-size: 14px;
    line-height: 14px;
    padding-right: 25px !important;
    padding-left: 10px;
 
}
table.dataTable {
    clear: both;
    margin-top: 0px !important;
    margin-bottom: 0px !important;
    max-width: none !important;
    border-collapse: separate !important;
    border-spacing: 0;
}
.dataTables_scrollHead{
    margin-bottom: 0;
    padding-bottom: 0;
}
.dataTable{
    width:100% !important;
}
.dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>tbody>tr>td {
    vertical-align: middle;
    font-size: 13px;
    padding-top: 0.4rem !important;
    padding-bottom: 0.4rem !important;
}
.responsive,.dataTables_scrollHeadInner,.no-footer{
    width:100% !important;
}
.btn {
    font-weight: bold;
    padding: 0.2rem 0.75rem;
    font-size: 14px;
 

}
button.dt-button, div.dt-button, a.dt-button, input.dt-button {
    padding: 0.2em 1em;
    border-radius: 0.22rem !important;
}
.dataTables_wrapper .dataTables_filter input {
    border: 1px solid #aaa;
    border-radius: 3px;
    padding: 2px;
    background-color: transparent;
    margin-left: 3px;
    font-size: 14px;
}
.dt-button {
    color: #000 !important;
    background-color: #fff !important;
    border: 1px solid #3AAFA9 !important;
}
.btn-secondary {
    color: #000 !important;
    background-color: #fff !important;
    border-color: #3AAFA9 !important;
   font-weight: 400 !important;
}
.dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>tbody>tr>td {
    text-align: left;
    color:#000 !important;
}


.container-fluid {
    padding-left: 0.8rem;
    padding-right: 0.8rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}
.card-header {
    padding: 0.75rem 1rem;
}
div.dt-button-collection button.dt-button:active:not(.disabled), div.dt-button-collection button.dt-button.active:not(.disabled), div.dt-button-collection div.dt-button:active:not(.disabled), div.dt-button-collection div.dt-button.active:not(.disabled), div.dt-button-collection a.dt-button:active:not(.disabled), div.dt-button-collection a.dt-button.active:not(.disabled) {
    background-color: #dadada;
    background: linear-gradient(to bottom, #8ee9ff 0%, #0a5672 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr="#f0f0f0", EndColorStr="#dadada");
    box-shadow: inset 1px 1px 3px #666;
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
a:hover {
    text-decoration: none !important;
}

/* Define your custom styles */
.updated-today {
    color: #ffff99; /* Yellow */
}

.updated-past {
    color: #ff9999; /* Red */
}

.updated-future {
    color: #99ccff; /* Blue */
}

</style>
@endsection
@section('lawyer-content')

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-3">
            <div class="card-header-report">
                <div class="d-flex header-main justify-content-between">
                    <p class="mb-0">All Cases :: Search</p>
                    <div class="minus-header">
                        <i class="fas fa-fw fa-plus fa-minus cursor-pointer" onclick="$('#custom-report').toggleClass('d-none');$('#report-icon').toggleClass('fa-plus');" style="cursor: pointer;" id="report-icon"></i>
                    </div>
                </div>
            </div>

            <div id="custom-report" class="card-body d-none">
                <form action="" method="">
                    @csrf
                    {{-- report info section --}}
                    <div class="case-info-section section">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">Case No</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="" value="" placeholder="No.">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="" value="" placeholder="Year">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="case_category_id" class="col-form-label font-weight-bold text-info col-md-4">Case Category</label>
                                    <div class="col-md-8">
                                        <select name="" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">Case Type</label>
                                    <div class="col-md-8">
                                        <select name="" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">Case Matter</label>
                                    <div class="col-md-8">
                                        <select name="" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">Court</label>
                                    <div class="col-md-8">
                                        <select name="" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">Court(Short)</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="" value="" placeholder="type">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">Client Name</label>
                                    <div class="col-md-8">
                                        <select name="" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">Client Category</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="" value="" placeholder="type number">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">Opponent Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="" value="" placeholder="type ">
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-2">Division</label>
                                    <div class="col-md-4">
                                        <select name="" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-2">Zone</label>
                                    <div class="col-md-4">
                                        <select name="" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-2">District</label>
                                    <div class="col-md-4">
                                        <select name="" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-2">Area</label>
                                    <div class="col-md-4">
                                        <select name="" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-2">Police Station</label>
                                    <div class="col-md-4">
                                        <select name="" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-2">Branch</label>
                                    <div class="col-md-4">
                                        <select name="" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2"></div>
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-3">Law</label>
                                    <div class="col-md-7">
                                        <select name="" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2"></div>
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-3">Section</label>
                                    <div class="col-md-7">
                                        <select name="" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2"></div>
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-3">Counsel/Lawyer</label>
                                    <div class="col-md-7">
                                        <select name="" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2"></div>
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-3">Case Status</label>
                                    <div class="col-md-7">
                                        <select name="" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2"></div>
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-3">N.D Fixed For </label>
                                    <div class="col-md-7">
                                        <select name="" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2"></div>
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-3">Case Date</label>
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="case-date-menu">
                                                    <input type="" class="form-control case-date " placeholder="from">
                                                    <i class="fas fa-fw fa-calendar"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="case-date-menu">
                                                    <input type="" class="form-control case-date" placeholder="to">
                                                    <i class="fas fa-fw fa-calendar"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="btn-section">
                    <div class="d-flex" style="width:205px">
                        <label class="container-checkbox">Today
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container-checkbox">Tomorrow
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <button type="submit" class="search"><i class="fa fa-search"></i> Search</button>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="row justify-content-center">
    {{-- <h2 class="mb-4">All Cases</h2> --}}
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h4 class="m-0 font-weight-bold"><i class="fa fa-users text-primary"></i> {{ $title }}</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between pt-0 pb-2">
                    <div class="dflex justify-content-between">
                        <a href="{{ url()->current() }}" class="btn btn-{{ !request()->type ? 'info' : 'secondary' }} text-white">ALL</a>
                        <a href="{{ url()->current().'?type=civil' }}" class="btn btn-{{ request()->type == 'civil' ? 'info' : 'secondary' }} text-white">CIVIL</a>
                        <a href="{{ url()->current().'?type=criminal' }}" class="btn btn-{{ request()->type == 'criminal' ? 'info' : 'secondary' }} text-white">CRIMINAL</a>
                    </div>
                    <a href="{{ route('lawyer.litigation.case.create') }}" class="btn btn-info text-white">ADD</a>
                </div>
                <table class="display responsive yajra-datatable" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th style="width:80px">Next Date</th>
                            <th>Fixed for</th>
                            <th>Case No.</th>
                            <th>Court</th>
                            <th>Police Station</th>
                            <th>1st Party</th>
                            <th>District (P-1)</th>
                            <th>2nd Party</th>
                            <th>District (P-2)</th>
                            <th>Nature</th>
                            <th>Matter</th>
                            <th>Law</th>
                            <th>Lawyer</th>
                            <th>Bill</th>
                            <th style="width:30px!important;padding-right:8pximportant;padding-left:0px;">Action</th>
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
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'type.name',
                    name: 'case_type_id'
                },
                {
                    data: 'status.name',
                    name: 'case_status_id'
                },
                {
                    data: 'next_case_date',
                    name: 'next_case_date'
                },
                {
                    data: 'next_fixed_for',
                    name: 'next_fixed_for',
                },
                {
                    data: 'case_no',
                    name: 'case_infos_case_no'
                },
                {
                    data: 'court_name_short',
                    name: 'court_id'
                },
                {
                    data: 'thana_name',
                    name: 'opponent_thana_id'
                },
                {
                    data: 'first_party',
                    name: 'first_party'
                },
                {
                    data: 'client_district_name',
                    name: 'client_district_name'
                },
                {
                    data: 'second_party',
                    name: 'second_party'
                },
                {
                    data: 'opponent_district_name',
                    name: 'opponent_district_name'
                },
                {
                    data: 'nature_name',
                    name: 'case_nature_id'
                },
                {
                    data: 'matter_name',
                    name: 'case_matter_id'
                },
                {
                    data: 'law',
                    name: 'law'
                },
                {
                    data: 'lawyer',
                    name: 'lawyer'
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
            ],
        });
        table.column(1).visible(false);
        table.column(2).visible(false);
        table.column(3).visible(false);
        table.column(10).visible(false);
        table.column(13).visible(false);
        table.column(15).visible(false);
        table.column(16).visible(false);
    });
</script>
@endsection