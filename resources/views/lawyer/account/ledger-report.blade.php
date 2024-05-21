@extends('layouts.lawyer.layout')
@section('title')
<title>Create District Case</title>
@endsection
@section('lawyer-content')
<div class="row">
    <div class="col-12" >
        <div class="card shadow mb-4">
            <div class="card-header-report py-3">
                <div class="d-flex header-main">
                    <h3>Ledger Report Search</h3>

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
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">Ledger Category</label>
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
                                            @forelse ($ledgerHead as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @empty
                                                <option value="">Empty</option>
                                            @endforelse
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">Ledger Sub Head</label>
                                    <div class="col-md-8">
                                        <select name="" class="form-control select2">
                                            <option selected disabled hidden>Select</option>
                                            @forelse ($ledgerSubHead as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @empty
                                                <option value="">Empty</option>
                                            @endforelse

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">payment Type</label>
                                    <div class="col-md-8">
                                        <select name="" class="form-control select2">
                                            <option selected disabled hidden>Select</option>
                                            @forelse ($paymentType as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @empty
                                                <option value="">Empty</option>
                                            @endforelse

                                        </select>
                                    </div>
                                </div>




                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">

                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">Client/Party</label>
                                    <div class="col-md-8">
                                        <select name="client_id" id="client_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>
                                            @forelse ($clients as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @empty
                                                <option value="">Empty</option>
                                            @endforelse

                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">

                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">Litigation/Service</label>
                                    <div class="col-md-8">
                                        <select name="litigation_service_id" id="litigation_service_id" class="form-control select2">
                                            <option>Select</option>

                                            <option value="87">Litigation</option>
                                            <option value="6">Service</option>

                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">

                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">Case/Service/Job</label>
                                    <div class="col-md-8">
                                        <select name="case_id" id="case_id" class="form-control select2">
                                            <option>Select</option>

                                        </select>
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

                                            <button  type="submit" class="search"><i class="fa fa-search"></i> Search</button>
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
 <div>
    <div class="card shadow">
        <div class="card-header-report py-3 pr-3">
                <div class="d-flex  header-main" style="justify-content: space-between;">
                    <h3>Ledger Report List</h3>
                    <div>
                       <a href="#" class="btn btn-info text-white mr-2"><i class="far fa-edit"></i> Edit</a>
                       <a href="#" class="btn btn-info text-white"><i class="fas fa-print"></i> Print</a>
                    </div>
                </div>
            </div>
      <div class="card-body pt-0">
          <div class="ledger_report">
            <div class="row">
                <div class="col-6">
                <div class="ledger_logo">
                  <img src="https://dlegal.visamohol.com/uploads/custom-images/lawyer-2021-09-15-10-06-32-2203.jpg" alt="">
                </div>                    
                </div>
                <div class="col-6">
                <div class="text-right">
                    <span>Date:28-11-23</span>
                </div>                    
                </div>
              <div class="col-4">
                <div class="ledger_info">
                <div>
                    <span>305/B Modhubag,Mogbazer,Hatijell,Dhaka-1217,Bangladesh</span>
                    
                </div>
                <div>
                    <span>Call:01717406688</span>
                    
                </div>
                <div>
                    <span>Tel:01717406688</span>
                   
                </div>
                <div>
                     <a href="mailto:niamulkaber.adv@gmail.com">Email: niamulkaber.adv@gmail.com</a>
                </div>
                </div>
              </div>
              <div class="col-4">
                  <div class="ledger_middle">
                    <div class="ledger_header">
                      <h4>Ledger Report</h4>
                    </div>
                    <span>From:11-11-23 , To:12-12-23</span>
                      
                  </div>
              </div>
              <div class="col-4">
                <div class="leader_info">
                  <p>Client</p><span>:</span>
                </div>
                <div class="leader_info">
                  <p>Case/service</p><span>:</span>
                </div>
                <div class="leader_info">
                  <p>Ledger Head</p><span>:</span>
                </div>
                <div class="leader_info">
                  <p>L.Sub-Head</p><span>:</span>
                </div>
              </div>
            </div>
          </div>
               <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
              <div class="row">
                <div class="col-sm-12">
                  <table class="table table-bordered dataTable no-footer" id="dataTable" width="100%" cellspacing="0"
                    role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                      <tr role="row">
                        <th style="width:20px;min-width:20px !important">SL</th>
                        <th>transition Date</th>
                        <th>Txn No </th>
                        <th>Client/Party</th>
                        <th>Ledger Head</th>
                        <th>Ledger Sub-head</th>
                        <th>Bill Amount</th>
                        <th>Paid/Recived Amount</th>
                        <th>Blance Amount </th>
                        <th>Note</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="odd">
                        <td>1</td>
                        <td>09-23-2021</td>
                        <td>Demo</td>
                        <td>Demo</td>
                        <td>Demo</td>
                        <td>Demo</td>
                        <td>Demo</td>
                        <td>Demo</td>
                        <td>Demo</td>
                        <td>Demo</td>
                       
                      </tr>
                     
                  
                    </tbody>
                  </table>
                </div>
              </div>
        
            </div>
          </div>
      </div>
    </div>
  </div>
   <div>

    <div class="card shadow mt-4 mb-5">
      <div class="card-body p-3">
          <div class="ledger_report_inv ">
            <div class="row">
              <div class="col-4">
                <div class="leader_info_inv">
                 <h3>MD Johirul Islam</h3>
                </div>
                <div class="leader_info_inv">
                  <p>LLB (Hons) LL.M </p>
                </div>
                <div class="leader_info_inv">
                  <p>Advocate</p>
                </div>
                <div class="leader_info_inv">
                  <p>Suprome Court of Bangladesh</p>
                </div>
              </div>
                 <div class="col-4">
                <div class="ledger_logo_invoice">
                  <img src="https://dlegal.visamohol.com/uploads/custom-images/lawyer-2021-09-15-10-06-32-2203.jpg" alt="">
                </div>                    
                </div>
              <div class="col-4">
                <div class="ledger_info_invoice">
                <div>
                    <span>305/B Modhubag,Mogbazer,Hatijell,Dhaka-1217,Bangladesh</span>
                    
                </div>
                <div>
                    <span>Call:01717406688</span>
                    
                </div>
                <div>
                    <span>Tel:01717406688</span>
                   
                </div>
                <div>
                     <span>Email: niamulkaber.adv@gmail.com</span>
                </div>
                </div>
              </div>
              <div class="col-12">
                  <div class="invoice_heading">
                      <h5>LEDGTER REPORT</h5>
                  </div>
              </div>
              <div class="col-12 mb-2">
                  <div class="row">
                  <div class="col-2">
                      <span style="font-weight: 600;">Date</span>
                      
                  </div>
                  <div class="col-10">
                      <span>:  22-11-2023</span>
                      
                  </div>
                  </div>
                  
              </div>
            </div>
          </div>
               <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
              <div class="row">
                <div class="col-sm-12">
                  <table class="table table-bordered " width="100%" cellspacing="0"
                    role="grid" style="width: 100%;font-size: 12px;">
                    <thead>
                      <tr role="row"style="background: #3AAFA9 !important; color: #fff;">
                        <th style="width:20px;min-width:20px !important">SL</th>
                        <th>transition Date</th>
                        <th>Txn No </th>
                        <th>Client/Party</th>
                        <th>Ledger Head</th>
                        <th>Ledger Sub-head</th>
                        <th>Bill Amount</th>
                        <th>Paid/Recived Amount</th>
                        <th>Blance Amount </th>
                        <th>Note</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="odd">
                        <td>1</td>
                        <td>09-23-2021</td>
                        <td>Demo</td>
                        <td>Demo</td>
                        <td>Demo</td>
                        <td>Demo</td>
                        <td>Demo</td>
                        <td>Demo</td>
                        <td>Demo</td>
                        <td>Demo</td>
                       
                      </tr>
                     
                  
                    </tbody>
                  </table>
                </div>
              </div>
        
            </div>
          </div>
          <div class="row mt-5">
              <div class="col-4">
                  <div class="invoice_footer">
                      <div class="account_inv">
                          <div class="invoice_line"></div>
                          <p>Accountant</p>
                      </div>
                  </div>
              </div>
              <div class="col-4">
                   <div class="invoice_footer">
                      <div class="account_inv">
                          <div class="invoice_line"></div>
                          <p>checked By</p>
                      </div>
                  </div>
              </div>
              <div class="col-4">
                   <div class="invoice_footer">
                      <div class="account_inv">
                          <div class="invoice_line"></div>
                          <p>Received By</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="invoice_footer_box">
          <div class="powerby">
              <h6>Power By <span> Lawyer</span></h6>
          </div>
      </div>
    </div>
  </div>
  


<style scoped>
.powerby h6{
    font-size:15px;
}
.powerby span{
      font-weight: 700;
}
.invoice_footer_box{
    border-top: 1px solid #3AAFA9;
    padding-top: 10px;
    display: flex;
    justify-content: center;
    padding-bottom: 5px;
}
.invoice_line{
    width: 200px;
    height: 1px;
    background: #ccc;
    margin-bottom: 5px;
}
.invoice_footer{
        display: flex;
    justify-content: center;
}
.account_inv{
    width: 200px;
    text-align: center;
    font-size: 15px;
}
.invoice_heading{
    background: #3AAFA9 !important;
    text-align: center;
    color: #fff;
    letter-spacing: 7px;
    height: 35px;
    line-height: 35px;
    align-items: baseline;
    border-radius: 5px;
    margin: 20px 0;
}
.invoice_heading h5{
    font-weight: 800;
    margin: 0;
    line-height: 35px;
}
.leader_info_inv h3{
    color: #000;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 24px;
}
.leader_info_inv p{
        margin-bottom: 0;
    font-size: 14px;
    font-weight: bold;
    color: #000;
}
.ledger_info_invoice {
    margin: 0px;
    font-size: 14px;
    font-weight: 600;
    color: #000;
}
.ledger_report_inv {
    padding:10px 0;
}
.ledger_logo_invoice{
    text-align: center;
}
.ledger_logo_invoice img{
    width: 140px;
    border-radius: 5px;
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
    .ledger_logo img{
     width: 80px;
    border-radius: 5px;
    }
    .ledger_info{
    margin: 10px 0;
    font-size: 15px;
}
.ledger_middle{
    text-align:center;
}
.leader_info{
    display: flex;
}
.leader_info p{
    width: 100px;
    font-size: 13px;
}
.ledger_header h4{
        font-weight: 700;
        color: #000;
}
.ledger_middle span{
        font-size: 13px;
    font-weight: 700;
}
.dataTables_length{
        font-size: 13px;
}
.custom-select{
        height: 30px;
         width: 60px !important;
        padding: 3px;

}
.dataTables_filter{
        font-size: 13px;
}
.dataTables_filter .form-control{
     width: 130px !important;
    height: 30px;
    font-size: 13px;
}
table.table-bordered.dataTable th, table.table-bordered.dataTable td {
    border-left-width: 0;
    font-size: 12px;
    padding: 5px;
    min-width: 125px;
}
table.dataTable>thead>tr>th:not(.sorting_disabled), table.dataTable>thead>tr>td:not(.sorting_disabled) {
    padding-right: 20px;
}
</style>


@endsection

@section('script')
<script>
    $(document).ready(function() {

            $('#litigation_service_id').on('change', function() {
                var idLitigation = this.value;
                console.log(idLitigation);
                $("#case_id").html('');
                $.ajax({
                    url: "{{ url('lawyer/account/fetch-case-service') }}",
                    type: "POST",
                    data: {
                        type: idLitigation,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#case_id').html('<option value="">-- Select Cases --</option>');
                        $.each(result.cases, function(key, value) {
                            $("#case_id").append('<option value="' + value
                                .id + '">' + value.petitioner_name + '</option>');
                        });
                    }
                });
            });


        });
</script>

@endsection
