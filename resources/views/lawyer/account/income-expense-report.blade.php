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
                    <h3>Income Expense Report</h3>

                </div>
            </div>

            <div class="card-body">

                <form action="" method="">
                    @csrf

                    {{-- report info section --}}
                    <div class="case-info-section section">
                        <div class="row">
                            <div class="col-md-6">


                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">Client/Party</label>
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
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">litigation/Service</label>
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
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">Ledger Head</label>
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




                            </div>
                            <div class="col-md-6">

                                <div class="form-group row">

                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">Opening Balance</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="" value="" placeholder="Type Number">
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">From Date</label>
                                    <div class="col-md-8 ">
                                        <input type="date" class="form-control dateandtimepicker">
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">To Date</label>
                                    <div class="col-md-8 ">
                                        <input type="date" class="form-control dateandtimepicker">
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-8">
                                        <div class="billing-btn">

                                            <button type="submit" class="search"><i class="fa fa-search"></i> Search</button>
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
        width: 100% !important;
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

    .billing-btn {
        display: flex;
        justify-content: end;
        padding-top: 50px;
        padding-bottom: 30px;
    }

    textarea.new {
        height: auto;
        min-height: 75px;
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

        .card-header-report h3 {
            color: #000;
            font-size: 15px;
        }
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



    }
</style>
@endsection