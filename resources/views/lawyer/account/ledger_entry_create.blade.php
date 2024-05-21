@extends('layouts.lawyer.layout')
@section('title')
<title>Create District Case</title>
@endsection
@section('lawyer-content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header-report py-3">
                <div class="d-flex header-main">
                    <h3>Add Ledger Transaction Entry</h3>

                </div>
            </div>

            <div class="card-body">

                <form action="{{route('lawyer.account.ledger.store')}}" method="post" >
                    @csrf
                    <input type="hidden" name="lawyer_id" value="{{auth()->guard('lawyer')->id()}}">
                    <input type="hidden" name="is_bill" value="{{$bill ? 1:''}}">
                    
                    {{-- report info section --}}
                    <div class="case-info-section section">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group row">
                                    <label for="clint_party_id" class="col-form-label font-weight-bold text-info col-md-4">Clint/Party</label>
                                    <div class="col-md-8">
                                        <select name="clint_party_id" id="clint_party_id" class="form-control select2" required>
                                            @if($bill)
                                            <option value="{{ $bill->bill_client_id }}">{{ $bill->client->name }}</option>
                                            @else
                                            <option value="">Select</option>
                                            @foreach ($clients as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ledger_head_id" class="col-form-label font-weight-bold text-info col-md-4">Ledger Head</label>
                                    <div class="col-md-8">
                                        <select name="ledger_head_id" id="ledger_head_id" class="form-control" required>
                                            <option value="">Select</option>
                                            @foreach ($ledgerheads as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ledger_sub_head_id" class="col-form-label font-weight-bold text-info col-md-4">Ledger Sub Head</label>
                                    <div class="col-md-8">
                                        <select name="ledger_sub_head_id" id="ledger_sub_head_id" class="form-control" required>
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="transaction_date" class="col-form-label font-weight-bold text-info col-md-4">Transaction Date</label>
                                    <div class="col-md-8">
                                        <input type="date" name="transaction_date" id="transaction_date" class="form-control" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="ledger_note" class="col-form-label font-weight-bold text-info col-md-4">Ledger Note</label>
                                    <div class="col-md-8">
                                        <textarea name="ledger_note" id="ledger_note" class="form-control new" placeholder="Type legder note"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="litigation_service_id" class="col-form-label font-weight-bold text-info col-md-4">litigation/Service</label>
                                    <div class="col-md-8">
                                        <select name="litigation_service_id" id="litigation_service_id" class="form-control" required>
                                             @if($bill && $bill->cases)
                                             <option selected value="Litigation">Litigation</option>
                                             @elseif($bill)
                                             <option value="Others">Others</option>
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
                                    <label for="case_service_job_id" class="col-form-label font-weight-bold text-info col-md-4">Case/Service/Job</label>
                                    <div class="col-md-8">
                                        <select name="case_service_job_id" id="case_service_job_id" class="form-control" onchange="getAmount();" {{$bill && !$bill->cases ? '' : 'required'}} >
                                            @if($bill && $bill->cases)
                                           <option value="{{$bill->cases->id}}" selected >{{$bill->cases->caseTitleShort->name_short.' '.$bill->cases->case_infos_case_no.'/'.$bill->cases->case_infos_case_year}}</option>
                                            @else
                                            <option value="">Select</option>
                                            @endif
                                        </select>
                                    </div>

                                </div>
                                
                                <div class="form-group row">
                                    <label for="bill_no_id" class="col-form-label font-weight-bold text-info col-md-4">Bill No.</label>
                                    <div class="col-md-8 ">
                                        <select name="bill_no_id" id="bill_no_id" class="form-control select2" required>
                                            @if($bill)
                                            <option value="{{ $bill->id }}">{{ 'BL-000'.$bill->id }}</option>
                                            @else
                                            <option value="">Select</option>
                                            @foreach($bills as $row)
                                                <option value="{{ $row->id }}">{{ $row->client_business_name }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="payment_type_id" class="col-form-label font-weight-bold text-info col-md-4">Payment Type</label>
                                    <div class="col-md-8 ">
                                        <select name="payment_type_id" id="payment_type_id" class="form-control" required>
                                            <option value="">Select</option>
                                            @foreach($paymenttypes as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="payment_reference" class="col-form-label font-weight-bold text-info col-md-4">Payment Ref.</label>
                                    <div class="col-md-8 ">
                                        <input type="text" name="payment_reference" id="payment_reference" class="form-control" value="" placeholder="type">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="bill_amount" class="col-form-label font-weight-bold text-info col-md-4">Bill Amount</label>
                                    <div class="col-md-8 ">
                                        <input style="font-weight:bold" type="number" name="bill_amount" id="bill_amount" class="form-control" value="{{$bill ? $bill->bill_amount : ''}}"  readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="balance_amount" class="col-form-label font-weight-bold text-info col-md-4">Balance Amount</label>
                                    <div class="col-md-8 ">
                                        <input style="color: #ff00009e;" type="number" name="balance_amount" id="balance_amount" class="form-control" value="{{$bill ? $bill->bill_amount - $bill->ledgers()->sum('paid_received_amount') : ''}}"  readonly>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="paid_received_amount" class="col-form-label font-weight-bold text-info col-md-4">Paid/Received Amount</label>
                                    <div class="col-md-8">
                                        <input type="number" name="paid_received_amount" id="paid_received_amount" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="form-group row" id="adjustmentReason" style="display:none">
                                    <label for="adjustment_reason_id" class="col-form-label font-weight-bold text-info col-md-4">Adjustment Reason</label>
                                    <div class="col-md-8 ">
                                        <select name="adjustment_reason_id" id="adjustment_reason_id" class="form-control select2">
                                            <option value="">Select</option>
                                            @foreach($reasons as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-8">
                                        <div class="billing-btn">
                                            <label class="container-checkbox">Payment Complete
                                                <input value="1" type="checkbox" name="is_completed" id="is_completed">
                                                <span class="checkmark"></span>
                                            </label>
                                            <button type="submit" class="btn btn-info  mx-1" style="font-size: 14px;"><i class="fa-clipboard-check fa-fw fas"></i> Save</button>
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
        width: 70%;
        height: 33px;
        font-size: 15px;
        margin-left: 30% !important;
        line-height: 23px;
        margin-top: 2px;
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
        justify-content: end;
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

        .card-header-report h3 {
            color: #000;
            font-size: 15px;
        }
    }
</style>
<script>
    $(document).ready(function(){
        $('#is_completed').click(function(){
            $('#adjustmentReason').toggle();
        });
    });
</script>

<script>
$(document).ready(function () {
    
    $('#case_service_job_id').on('change',function () {
        var case_id = $('#case_service_job_id').val();
        $.ajax({
            url: "{{ route('lawyer.account.bill.case')}}",
            type: "POST",
            data: {
                case_id: case_id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function (res) {
                $('#bill_no_id').html('<option value="">Select</option>');
                $.each(res, function (key, value) {
                    $("#bill_no_id").append('<option value="' + value
                        .id + '">BL-000'+value.id+ '</option>');
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
    $('#clint_party_id').on('change',function () {
        var billClient = $('#clint_party_id').val();
        var billCategory = $('#litigation_service_id').val();
        if(billCategory !="Litigation" || $("#clint_party_id").val()=='')
        {
            $('#case_service_job_id').empty();
            $('#case_service_job_id').html('<option value="">Select</option>');
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
                $('#case_service_job_id').html('<option value="">Select</option>');
                $.each(res, function (key, value) {
                    var data = value.case_title_short.name_short+' '+value.case_infos_case_no+'/'+value.case_infos_case_year;
                    $("#case_service_job_id").append('<option value="' + value
                        .id + '">' +data+ '</option>');
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
    
    $('#litigation_service_id').on('change',function () {
        var billClient = $('#clint_party_id').val();
        var billCategory = $('#litigation_service_id').val();
        if(billCategory !="Litigation" || $("#clint_party_id").val()=='')
        {
            $('#case_service_job_id').empty();
            $('#case_service_job_id').html('<option value="">Select</option>');
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
                $('#case_service_job_id').html('<option value="">Select</option>');
                $.each(res, function (key, value) {
                    var data = value.case_title_short.name_short+' '+value.case_infos_case_no+'/'+value.case_infos_case_year;
                    $("#case_service_job_id").append('<option value="' + value
                        .id + '">' +data+ '</option>');
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
    
$('#bill_no_id').on('change',function () {
     var bill_id = $('#bill_no_id').val();
    $.ajax({
        url: "{{ route('lawyer.account.bill')}}",
        type: "POST",
        data: {
            bill_id: bill_id,
            _token: '{{csrf_token()}}'
        },
        dataType: 'json',
        success: function (res) {
            $('#bill_amount').val(res.bill_amount);
            $('#balance_amount').val(res.balance_amount);
           
        },
        error: function (error) {
            console.log(error);
        }
    });
    
});    
$('#ledger_head_id').on('change',function () {
     var head_id = $('#ledger_head_id').val();
    $.ajax({
        url: "{{ route('lawyer.account.getsubhead')}}",
        type: "POST",
        data: {
            head_id: head_id,
            _token: '{{csrf_token()}}'
        },
        dataType: 'json',
        success: function (res) {
            $('#ledger_sub_head_id').html('<option value="">Select</option>');
                $.each(res, function (key, value) {
                    $("#ledger_sub_head_id").append('<option value="' + value
                        .id + '">' +value.name+ '</option>');
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