@extends('layouts.lawyer.layout')
@section('title')
<title>Add Bill</title>
@endsection
@section('lawyer-content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header-report py-3">
                <div class="d-flex header-main">
                    <h3>Add Bill</h3>
                </div>
            </div>
            <div class="card-body">

                <form action="{{route('lawyer.account.store')}}" method="post" >
                    @csrf

                    <input type="hidden" name="lawyer_id" value="{{auth()->guard('lawyer')->id()}}">
                    <input type="hidden" name="cpl_id" id="cpl_id" value="{{$cpl ? $cpl->id : ''}}">
                    <input type="hidden" name="is_bill" id="is_bill" value="{{$cpl ? 1 : 0}}">
                    
                    <!-- {{-- report info section --}} -->
                    <div class="case-info-section section">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group row">
                                    <label for="bill_client_id" class="col-form-label font-weight-bold text-info col-md-4">Client</label>
                                    <div class="col-md-8">
                                        <select name="bill_client_id" id="bill_client_id" class="form-control select2" required>
                                            @if($cpl)
                                            <option value="{{$cpl->cases->client_id}}" selected >{{$cpl->cases->client->name}}</option>
                                            @else
                                            <option value="">Select</option>
                                            @foreach($clients as $row)
                                            <option value="{{ @$row->id }}">{{ @$row->name }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="bill_category_id" class="col-form-label font-weight-bold text-info col-md-4">Bill Category (Litigation/Service)</label>
                                    <div class="col-md-8">
                                        <select onchange="if($('#bill_category_id').val() == 'Litigation') {$('#bill_case_service_id').attr('required',true)}else{$('#bill_case_service_id').attr('required',false)}" name="bill_category_id" id="bill_category_id" class="form-control" required>
                                            @if($cpl)
                                            <option {{ $cpl ? 'selected' : '' }} value="Litigation">Litigation</option>
                                            @else
                                            <option value="">Select</option>
                                            <option value="Litigation">Litigation</option>
                                            <option value="Service">Service</option>
                                            <option value="Others">Others</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="bill_case_service_id" class="col-form-label font-weight-bold text-info col-md-4">Case/Service</label>
                                    <div class="col-md-8">
                                        <select name="bill_case_service_id" id="bill_case_service_id" class="form-control select2">
                                            @if($cpl)
                                            <option value="{{$cpl->cases->id}}" selected >{{$cpl->cases->caseTitleShort->name_short.' '.$cpl->cases->case_infos_case_no.'/'.$cpl->cases->case_infos_case_year}}</option>
                                            @else
                                            <option value="">Select</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <label for="bill_date" class="col-form-label font-weight-bold text-info col-md-4">Bill for the Date</label>
                                    <div class="col-md-8">
                                        <input type="date" name="bill_date" id="bill_date" class="form-control" value="{{$cpl ? $cpl->updated_order_date ?  $cpl->updated_order_date->format('Y-m-d') : $cpl->updated_next_date->format('Y-m-d') : ''}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bill_particulars" class="col-form-label font-weight-bold text-info col-md-4">Bill Particulars</label>
                                    <div class="col-md-8 pr-0">
                                        <textarea name="bill_particulars" id="bill_particulars" class="form-control new" placeholder="type" required>@if($cpl)@if($cpl->proceeding && $cpl->court_proceedings_write){{$cpl->proceeding->name.' '.$cpl->court_proceedings_write.', '}}@else @if($cpl->proceeding){{$cpl->proceeding->name.'. '}} @endif @if($cpl->court_proceedings_write){{$cpl->court_proceedings_write.'. '}}@endif @endif @if($cpl->order && $cpl->updated_court_order_write){{$cpl->proceeding->name.' '.$cpl->updated_court_order_write.'. '}}@else @if($cpl->order){{$cpl->order->name}}@endif @if($cpl->updated_court_order_write){{$cpl->updated_court_order_write}} @endif @endif @endif</textarea>
                                        <button type="button" id="cpl" class="btn btn-info float-right mt-1">CPL</button>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="bill_note" class="col-form-label font-weight-bold text-info col-md-4">
                                        <p class="mb-1">Bill Note</p>
                                        <div class="col-md-12 p-0">
                                         <label class="container-checkbox" style="color:#b7b9cc">Add to Invoice
                                            <input type="checkbox" name="add_invoice" value="1">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                        </label>
                                    <div class="col-md-8">
                                        <textarea name="bill_note" id="bill_note" class="form-control new" placeholder="Type"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="bill_reference_id" class="col-form-label font-weight-bold text-info col-md-4" >Bill Reference</label>
                                    <div class="col-md-8">
                                        <select name="bill_reference_id" id="bill_reference_id" class="form-control" >
                                            <option value="">Select</option>
                                            @foreach($billReferences as $row)
                                            <option value="{{ @$row->id }}">{{ @$row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ref_code" class="col-form-label font-weight-bold text-info col-md-4">Reference Code</label>
                                    <div class="col-md-8">
                                        <input name="ref_code" id="ref_code" class="form-control new" placeholder="Type">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bill_type_id" class="col-form-label font-weight-bold text-info col-md-4">Bill Type</label>
                                    <div class="col-md-8">
                                        <select name="bill_type_id" id="bill_type_id" class="form-control" required>
                                            <option value="">Select</option>
                                            @foreach($billTypes as $row)
                                            <option value="{{ @$row->id }}">{{ @$row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <label for="bill_amount" class="col-form-label font-weight-bold text-info col-md-4">Bill Amount</label>
                                    <div class="col-md-8 ">
                                        <input type="number" name="bill_amount" id="bill_amount" class="form-control" placeholder="Type" required>
                                    </div>

                                </div>
                                
                                
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mt-5 pt-5">
                                    <label class="container-checkbox" style="color:#b7b9cc">Will not be added to Invoice
                                        <input type="checkbox" name="show_invoice" value="0">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="billing-btn" style="justify-content: end;">
                                   
                                    <button type="submit" class="btn btn-info  mx-1" style="font-size: 14px;"><i class="fa-clipboard-check fa-fw fas"></i> Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<style scoped>
    .card-header-report {
        padding-bottom: 0px !important;
        padding-left: 1rem !important;
        border-bottom: 1px solid #000;
    }

    .card-header-report h3 {
        color: #000;
    }

    .form-control {
        display: block;
        width: 100%;
        height: calc(1.5em + 0.75rem + 2px);
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #6e707e;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #36b9cc !important;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .select2-container--default .select2-selection--single {
        border: 1px solid #36b9cc !important;
    }

    textarea.new {
        height: auto;
        min-height: 75px;
    }

    .legal-btn {
        width: 85%;
        height: 40px;
        font-size: 15px;
        margin-left: 15% !important;
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

    @media (max-width:767px) {
        .legal-btn {
            width: 100%;
            height: 40px;
            font-size: 13px;
            margin-left: 0% !important;
        }

        .billing-btn {
            display: block;
            justify-content: space-between;
            padding-top: 65px;
            padding-bottom: 30px;
        }
    }
</style>
@endsection

@section('script')
<script type="text/javascript">

 $(document).ready(function () {
     

    $('#bill_client_id').on('change',function () {
        var billClient = $('#bill_client_id').val();
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
    
    $('#cpl').click(function () {
            var bill_date = $("#bill_date").val();
            var caseId = $("#bill_case_service_id").val();
            if(caseId == ''){
                alert('please selected case');
                return;
            }
            if(bill_date == ''){
                alert("Please Selected Date");
            }else{
                $.ajax({
                    url: "{{ route('lawyer.litigation.case.bill.store.cpl')}}",
                    type: "POST",
                    data: {
                        case_id: caseId,
                        bill_date: bill_date,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#bill_particulars').val(result.bills.proceeding.name+', '+result.bills.order.name);
                        $('#cpl_id').val(result.bills.id);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }
            
        });
    
    
    
});

</script>
@endsection





