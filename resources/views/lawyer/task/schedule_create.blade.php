@extends('layouts.lawyer.layout')
@section('title')
<title>Create Schedule</title>
@endsection
@section('lawyer-content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header-report py-3">
                <div class="d-flex header-main">
                    <h3>Create Schedule</h3>
                </div>
            </div>

            <div class="card-body">

                <form action="" method="">
                    @csrf

                    {{-- report info section --}}
                    <div class="case-info-section section">
                        <div class="row">
                            <div class="col-md-12">


                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-12">Schedule Category</label>

                                    <div class="col-md-12">
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
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-12">Meeting Time</label>

                                    <div class="col-md-12">
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
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-12">Schedule Title</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="" value="" placeholder="Type Title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-12">Note</label>
                                    <div class="col-md-12">
                                        <textarea name="" class="form-control new" placeholder="Type "></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <label for="" class="col-form-label font-weight-bold text-info col-md-12">Date</label>
                                    <div class="col-md-12 ">
                                        <input type="date" class="form-control dateandtimepicker">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-12">Place</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="" value="" placeholder="type place">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-12">Assing</label>
                                    <div class="col-md-12">
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
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-12">Service Type</label>
                                    <div class="col-md-12">
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
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-12">Service</label>
                                    <div class="col-md-12">
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
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-12">Details</label>
                                    <div class="col-md-12">
                                        <textarea name="" class="form-control new" placeholder="Type "></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-8">
                                        <div class="billing-btn">

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

    }

    .card-header-report h3 {
        color: #36b9cc !important;
        border-bottom: 1px solid #36b9cc;
        width: max-content;
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
        min-height: 120px;
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

    .select2-container .select2-selection--single {
        height: 50px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 50px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 50px;
        position: absolute;
        top: 1px;
        right: 1px;
        width: 20px;
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
        height: 50px;
    }


    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 50px;
        position: absolute;
        top: 1px;
        right: 1px;
        width: 30px;
    }
</style>
@endsection