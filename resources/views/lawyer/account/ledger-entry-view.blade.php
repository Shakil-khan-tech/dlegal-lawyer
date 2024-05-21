@extends('layouts.lawyer.layout')
@section('title')
    <title>Create District Case</title>
@endsection
<Style scoped>
    .sidebar-brand-icon i {
        font-size: 2rem;

    }

    .ledger-logo {
        display: flex;
        justify-content: space-between;
    }

    .address h3 {
        font-size: 18px;
        color: #000;
        font-weight: 600;
    }

    .address h3 a {
        font-size: 18px;
        color: #000;
        font-weight: 600;
        text-decoration: none;
    }

    .right-side {
        border: 1px solid #ccc;
        padding: 25px 15px;
        background: #f2f2f2;
    }

    .right-side h5 {
        font-size: 15px;
        color: #000;
        font-weight: 600;
    }

    .title-right h5 {
        font-weight: 500;
    }

    .headding {
        color: #2e59d9;
        font-weight: 700;
        padding-bottom: 20px;
        margin-top: 30px;
    }

    .mony-tb {
        padding: 30px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .table-total {
        font-weight: 700;
        color: #000;
    }

    table tr th {
        background: #0dcaf0;
        color: #fff;

        border: 0;
        border-right: 1px solid #fff;
    }

    .footer p {
        width: 200px;
        border-top: 1px solid #ccc;
        text-align: center;
        padding-top: 5px;
        font-size: 14px;
        color: #000;
        margin-top: 20px;
    }

    .Footer-last {
        border-top: 1px solid #0dcaf0;
        padding-top: 10px;
        text-align: center;
    }

    .Footer-last p {
        color: #000;
        font-size: 14px;
    }

    .Footer-last span {
        color: #000;
        font-size: 14px;
        font-weight: 700
    }
</Style>
@section('lawyer-content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4 ">
                <div class="card-body p-5">
                    <div class="ledger-logo mb-5  mt-4">
                        <div class="sidebar-brand-icon rotate-n-15">
                            <i class="fas fa-balance-scale"></i>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary btn-sm document-btn" data-toggle="modal"
                                data-target="#working_documents_modal" data-placement="top"><i class="fas fa-print"></i>
                                Print</button>
                        </div>
                    </div>
                    <div class="row pb-5">
                        <div class="col-lg-7 col-12 address">
                            <div>
                                <h3>365/B,Modhubag,Mogbazer,Hatirjheel,Dhaka-1217,Bangladesh</h3>
                            </div>
                            <div>
                                <h3>Cell:017174068</h3>
                            </div>
                            <div>
                                <h3>Tell:017174068</h3>
                            </div>
                            <div>
                                <h3>
                                    <a href="mailto:niamulkabir.adv@gmail.com">
                                        niamulkabir.adv@gmail.com
                                    </a>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-5 col-12">
                            <div class="row right-side">

                                <div class="col-lg-6">
                                    <div>
                                        <h5>CLIENT #</h5>
                                    </div>
                                    <div>
                                        <h5>Transaction No #</h5>
                                    </div>
                                    <div>
                                        <h5>Date #</h5>
                                    </div>
                                </div>
                                <div class="col-lg-6 title-right">
                                    <div>
                                        <h5> Star particle Mills Limited</h5>
                                    </div>
                                    <div>
                                        <h5>TXN-0002</h5>
                                    </div>
                                    <div>
                                        <h5>20-02-2023</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="headding">MONY RECEIPT</h3>
                    <div class="mony-tb">


                        <table class="table  events_table ">
                            <thead>
                                <tr>
                                    <th scope="col">Service</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Payment type</th>
                                    <th scope="col">Bill Amount</th>
                                    <th scope="col">Paid Amount</th>
                                    <th scope="col" style="border-right: 0 !important;">Reference NO .</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Lawyer Payment</td>
                                    <td>Null</td>
                                    <td>Cash Payment</td>
                                    <td>4000</td>
                                    <td>9000</td>
                                    <td>INV7235</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="table-total">Total</td>
                                    <td class="table-total">9000</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="row footer pt-5 pb-5">
                        <div class="col-lg-4">
                            <div>
                                <p>Prepared By</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div style="    display: flex;
                            justify-content: center;">
                                <p>Checked By</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div style="    display: flex;
                            justify-content: end;">
                                <p>Received By</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Footer-last">
                    <p>Power By: <Span>LawMent</Span></p>
                </div>
            </div>

        </div>



    </div>
@endsection
