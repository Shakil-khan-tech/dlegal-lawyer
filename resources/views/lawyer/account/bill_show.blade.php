@extends('layouts.lawyer.layout')
@section('title')
<title>Show Account Bill</title>
@endsection
@section('lawyer-content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header-report py-3">
                <div class="d-flex header-main">
                    <h3>View Bill</h3>
                </div>
            </div>

            <div class="card-body">
                <!-- {{-- report info section --}} -->
                <div class="case-info-section section">
                    <div class="row">

                        <div class="col-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Client</th>
                                    <td>
                                        
                                        @foreach($clients as $row)
                                            @if($bill->bill_client_id == $row->id)
                                                {{ @$row->name }}
                                            @else
                                            @endif
                                        @endforeach
                                    
                                    </td>
                                </tr>
                                <tr>
                                    <th>Bill Category (Litigation/Service)</th>
                                    <td>
                                        {{ $bill->bill_category_id }} 
                                    </td>
                                </tr>
                                <tr>
                                    <th>Case/Service</th>
                                    <td>
                                        @foreach ($cases as $row)
                                            @if($bill->bill_case_service_id == $row->id)
                                                <span class="text-primary">{{ $bill->cases->caseTitleShort->name_short }} {{ $row->case_infos_case_no }}/{{ $row->case_infos_case_year }}</span>
                                            @else
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th>Bill for the Date</th>
                                    <td>{{ $bill->bill_date}}</td>
                                </tr>
                              
                                <tr>
                                    <th>Bill Particulars</th>
                                    <td>{{ $bill->bill_particulars}}</td>
                                </tr>
                                <tr>
                                    <th>Bill Note</th>
                                    <td>{{ $bill->bill_note}}</td>
                                </tr>
                                <tr>
                                    <th>Bill Reference</th>
                                    <td>
                                        @foreach($billReferences as $row)
                                            @if($bill->bill_reference_id == $row->id)
                                                {{ @$row->name }}
                                            @else
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Bill Reference Code</th>
                                    <td>
                                        {{ $bill->ref_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Bill Type</th>
                                    <td>
                                        @foreach($billTypes as $row)
                                            @if($bill->bill_type_id == $row->id)
                                                {{ @$row->name }}
                                            @else
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Bill Amount</th>
                                    <td><span class="text-primary font-weight-bold">{{ $bill->bill_amount }} ৳</span></td>
                                </tr>
                                 <tr>
                                    <th>Paid Amount</th>
                                    <td><span class="text-primary font-weight-bold">{{ $bill->ledgers()->sum('paid_received_amount') }} ৳</span></td>
                                </tr>
                                 <tr>
                                    <th>Due Amount</th>
                                    <td><span class="text-danger font-weight-bold">{{  $bill->bill_amount - $bill->ledgers()->sum('paid_received_amount') }} ৳</span></td>
                                </tr>
                            </table>
                        </div>
                        

                    </div>
                </div>
            </div>

        </div>

    </div>


</div>




<style scoped>
    .table th, .table td{
        padding:8px !important;
    }
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
@endsection





