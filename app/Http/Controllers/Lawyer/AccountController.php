<?php

namespace App\Http\Controllers\Lawyer;

use App\CaseProceeding;
use App\Cases;
use App\Bill;
use App\BillClass;
use App\BillCategory;
use App\BillReference;
use App\InvoiceSubject;
use App\BillType;
use App\Client;
use App\Hr;
use App\Chamber;
use App\LedgerHead;
use App\LedgerSubHead;
use App\Ledger;
use App\PaymentType;
use App\Adjustmentreason;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function ledgerEntryView()
    {
        return view('lawyer.account.ledger-entry-view');
    }
    public function billing()
    {
        if(request()->case_id){
            session()->put('case_id',request()->case_id);
        }else{
            if(!request()->ajax()){
                session()->forget('case_id');
            }
        }
        if(request()->bill_case_service_id){
            session()->put('bill_case_service_id',request()->bill_case_service_id);
        }else{
            if(!request()->ajax()){
                session()->forget('bill_case_service_id');
            }
            
        }
        if (request()->ajax()) {
            return DataTables::of(Bill::with('cases','client','type','reference','cases.caseTitleShort','ledgers')->when(session()->has('case_id'),function($q){
                return $q->where('bill_case_service_id',session()->get('case_id'));
                })->when(session()->has('bill_case_service_id'),function($q){
                return $q->where('bill_case_service_id',session()->get('bill_case_service_id'));
                })->whereLawyerId(auth()->guard('lawyer')->id())->latest())
                ->setRowId('{{$id}}')
                ->setRowAttr([
                    'align' => 'center'
                ])
                ->addIndexColumn()
                ->addColumn('bill_date', function ($q) {
                        return $q->bill_date->format('d-m-Y');
                })
                ->addColumn('bill_no', function ($q) {
                        return 'BL-000'.$q->id;
                })
                ->addColumn('invoice_status', function ($q) {
                    if($q->show_invoice){
                        return '1';
                    }else{
                        return '<span class="text-danger font-weight-bold">NO<span/>';
                    }
                })
                ->addColumn('balance_amount', function ($q) {
                    $received = $q->ledgers()->sum('paid_received_amount');
                    $due = $q->bill_amount - $received;
                    if($due == 0){
                        return '<span class="badge badge-success" style="font-size:13px">Paid<span/>';
                    }else{
                        return '<span class="text-danger">'.$due.'<span/>';
                    }
                })
                ->addColumn('reference_name', function ($q) {
                    if($q->reference){
                        return $q->reference->name;
                    }else{
                        return '';
                    }
                })
                
                ->addColumn('case_no', function ($user) {
                if($user->bill_case_service_id){
                $show = route('lawyer.litigation.case.show', $user->bill_case_service_id);
                return '<a href="'.$show.'" target="_blank">'.$user->cases?->caseTitleShort?->name_short.' '.$user->cases?->case_infos_case_no.'/'.$user->cases?->case_infos_case_year.'</a>';
                }else{
                    return 'N/A';
                }
            })
                ->addColumn('action', function ($row) {
                    $received = $row->ledgers()->sum('paid_received_amount');
                    $due = $row->bill_amount - $received;
                    if($due <= 0){
                    $ledger = route('lawyer.account.ledger-entry', ['bill_no_id'=>$row->id]);
                    }else{
                    $ledger = route('lawyer.account.ledger-entry-create', ['bill_no_id'=>$row->id]);
                    }
                    $show = route('lawyer.account.billing.show', $row->id);
                     $edit = route('lawyer.account.billing.edit', $row->id);
                    $delete = route('lawyer.account.billing.delete', $row->id);
                    $actionBtn='<div class="dropdown action_doc"><button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i> </button> <div class="dropdown-menu " aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="'.$show.'"><i class="fas fa-eye mr-2"></i></a><a class="dropdown-item" href="'.$edit.'"><i class="fas fa-edit mr-2"></i></a><a class="dropdown-item" href="'.$ledger.'"><i class="fas fa-wallet mr-2"></i></a><a style="cursor:pointer" onclick="check('.$row->id.')" class="dropdown-item delete-'.$row->id.'" data-href="'.$delete.'"><i class="fas fa-trash-alt mr-2"></i></a> </div></div>';
                return $actionBtn;
                })
                ->rawColumns(['bill_particulars_modify','balance_amount','case_no','invoice_status','action'])
                ->make(true);
        }
        $title = 'Bill List';
        return view('lawyer.account.billing', compact('title'));
    }
    public function ledgerEntry()
    {
        if(request()->bill_no_id){
            session()->put('bill_no_id',request()->bill_no_id);
        }else{
            if(!request()->ajax()){
                session()->forget('bill_no_id');
            }
            
        }
        if (request()->ajax()) {
            return DataTables::of(Ledger::with('client','ledgerhead','ledgersubhead','cases','cases.caseTitleShort','bill','paymenttype','adjustmentreason')->when(session()->has('bill_no_id'),function($q){
                return $q->where('bill_no_id',session()->get('bill_no_id'));
                })->whereLawyerId(auth()->guard('lawyer')->id())->latest())
                ->setRowId('{{$id}}')
                ->setRowAttr([
                    'align' => 'center'
                ])
                ->addColumn('transaction_date', function ($q) {
                        return $q->transaction_date->format('d-m-Y');
                })
                ->addColumn('bill_date', function ($q) {
                        return $q->bill->bill_date->format('d-m-Y');
                })
                ->addColumn('ledgersubhead_name', function ($user) {
                if($user->ledgersubhead){
                    return $user->ledgersubhead->name;
                }else{
                    return '';
                }
                })
                ->addColumn('paymenttype_name', function ($user) {
                if($user->paymenttype){
                    return $user->paymenttype->name;
                }else{
                    return '';
                }
                })
                ->addColumn('bill_no', function ($q) {
                        return 'LG-000'.$q->id;
                })
                ->addColumn('completed', function ($q) {
                    if($q->is_completed == 1){
                        return 'Yes';
                    }else{
                        return 'No';
                    }
                })
                ->addColumn('adjustmentreason_name', function ($q) {
                    if($q->adjustmentreason){
                        return $q->adjustmentreason->name;
                    }else{
                        return '';
                    }
                })
                ->addColumn('case_no', function ($user) {
                    if($user->case_service_job_id){
                $show = route('lawyer.litigation.case.show', $user->case_service_job_id);
                return '<a href="'.$show.'" target="_blank">'.$user->cases->caseTitleShort->name_short.' '.$user->cases->case_infos_case_no.'/'.$user->cases->case_infos_case_year.'</a>';
                    }else{
                        return 'N\A';
                    }
            })
                ->addColumn('action', function ($row) {
                    $show = route('lawyer.account.billing.show', $row->id);
                    $delete = route('lawyer.account.billing.delete', $row->id);
                    $actionBtn='<div class="dropdown action_doc"><button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i> </button> <div style="width:3rem" class="dropdown-menu " aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="'.$show.'"><i class="fas fa-eye mr-2"></i></a><a style="cursor:pointer" onclick="tg('.$row->id.')" class="dropdown-item delete-'.$row->id.'" href="'.$delete.'"><i class="fas fa-trash-alt mr-2"></i></a></div></div>';
                return $actionBtn;
                })
                ->rawColumns(['case_no','action'])
                ->make(true);
        }
        $title = 'Ledger-Entry';
        return view('lawyer.account.ledger-entry', compact('title'));
    }
    public function billingCreate()
    {
        $clients = Client::whereLawyerId(auth()->guard('lawyer')->id())->where('status',1)->oldest('name')->get();
        $cases = Cases::whereLawyerId(auth()->guard('lawyer')->id())->get();
        $billCategories = BillCategory::latest()->get();
        $billReferences = BillReference::oldest('sort')->get();
        $billTypes = BillType::oldest('sort')->get();
        $cpl=null;
        if(request()->cpl_id){
            $cpl = CaseProceeding::with('cases','order','proceeding','cases.caseTitleShort','cases.client')->findOrFail(request()->cpl_id);
        }
        return view('lawyer.account.billing_create', compact('cases', 'billCategories', 'billReferences', 'billTypes','clients','cpl'));
    }
    public function ledgerEntryCreate()
    {
        $clients = Client::whereLawyerId(auth()->guard('lawyer')->id())->latest()->get();
        $ledgerheads = LedgerHead::latest()->get();
        $ledgersubheads = LedgerSubHead::latest()->get();
        $bills = Bill::whereLawyerId(auth()->guard('lawyer')->id())->latest()->get();
        
        $legal_services = \DB::table('legal_services')->get();
        $cases = Cases::whereLawyerId(auth()->guard('lawyer')->id())->latest()->get();
        $paymenttypes = PaymentType::latest()->get();
        $reasons = Adjustmentreason::latest()->get();
        $bill = null;
        if(request()->bill_no_id){
            $bill = Bill::with('client')->findOrFail(request()->bill_no_id);
        }
        return view('lawyer.account.ledger_entry_create', compact('bills','clients','ledgerheads','ledgersubheads','legal_services','cases','paymenttypes','reasons','bill'));
    }

    public function ledgerStore(Request $request)
    {
        
        Ledger::create($request->except('_token','is_bill'));
        $bill = Bill::find($request->bill_no_id);
        if($bill->bill_amount <= $bill->ledgers->sum('paid_received_amount')){
            $bill->is_paid = 1;
            $bill->save();
        }
        $notification = array('messege' => "Ledger Added Successfully", 'alert-type' => 'success');
        if(request()->is_bill == 1){
            return redirect()->route('lawyer.account.billing')->with($notification);
        }
            return redirect()->route('lawyer.account.ledger-entry')->with($notification);
    }
    public function ledgerReport()
    {
        $ledgerHead = LedgerHead::all();
        $ledgerSubHead = LedgerSubHead::all();
        $paymentType = PaymentType::all();
        $clients = Client::all();
        return view('lawyer.account.ledger-report',compact('ledgerHead','ledgerSubHead','paymentType','clients'));
    }
    
    
    public function getClient(Request $request)
    {
        $data = Client::where("client_class_id", $request->client_class_id)->whereStatus(1)->oldest('name')
                                    ->get();
        return response()->json($data);
    }
    
    public function getSubHead(Request $request)
    {
        $data = LedgerSubHead::where("ledger_head_id", $request->head_id)->oldest('sort')
                                    ->get();
        return response()->json($data);
    }
    
    public function fetchCaseService(Request $request)
    {
        $data['cases'] = Cases::with('caseTitleShort')->where("case_infos_case_no", $request->type)
                                    ->get();
        return response()->json($data);
    }
    
    
    public function balanceReport()
    {
        session()->forget('client_id');
        if (request()->ajax()) {
            return DataTables::of(Bill::has('cases')->with('cases','client','type','reference','cases.caseTitleShort','ledgers')->whereLawyerId(auth()->guard('lawyer')->id())->latest())
                ->setRowClass('{{ $id % 2 == 0 ? "text-info" : "text-danger" }}')
                ->setRowId('{{$id}}')
                ->setRowAttr([
                    'align' => 'center'
                ])
                ->addIndexColumn()
                ->addColumn('bill_no', function ($q) {
                    $bill = route('lawyer.account.billing.show',$q->id);
                    return '<a href="'.$bill.'" target="_blank">BL-000'.$q->id.'</a>';
                })
                ->addColumn('case_no', function ($user) {
                $show = route('lawyer.litigation.case.show', $user->bill_case_service_id);
                
                return '<a href="'.$show.'" target="_blank">'.$user->cases->caseTitleShort->name_short.' '.$user->cases->case_infos_case_no.'/'.$user->cases->case_infos_case_year.'</a>';
                })
                ->addColumn('received_amount', function ($q) {
                    $received = $q->ledgers()->sum('paid_received_amount');
                    return $received;
                })
                ->addColumn('balance_amount', function ($q) {
                    $received = $q->ledgers()->sum('paid_received_amount');
                    $due = $q->bill_amount - $received;
                    return $due;
                })
                ->addColumn('status', function ($q) {
                    $received = $q->ledgers()->sum('paid_received_amount');
                    $due = $q->bill_amount - $received;
                    if($q->bill_amount > $received){
                        return '<span class="badge badge-danger font-weight-bold">Due<span/>';
                    }else{
                        return '<span class="badge badge-success font-weight-bold">Paid<span/>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $show = route('lawyer.account.ledger-entry', ['bill_no_id'=>$row->id]);
                    $actionBtn='<a class="dropdown-item" href="'.$show.'"><i class="fas fa-eye mr-2"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['case_no','bill_no','status','action'])
                ->make(true);
        }
        $title = 'Balance Report';
        $bills = Bill::with('ledgers')->whereLawyerId(auth()->guard('lawyer')->id());
        $ledgers = Ledger::whereLawyerId(auth()->guard('lawyer')->id());
        $clients = Client::where('status',1)->get();
        $subjects = InvoiceSubject::where('status',1)->oldest('sort')->get();
        $chambers = Chamber::where('status',1)->get();
        return view('lawyer.account.balance-report', compact('title','bills','ledgers','clients','subjects','chambers'));
    }
    
    
    public function balanceGenerate()
    {
        
        if(request()->subject_id){
            session()->put('subject_id',request()->subject_id);
        }else{
            if(!request()->ajax()){
                session()->forget('subject_id');
            }
        }
        if(request()->chamber_id){
            session()->put('chamber_id',request()->chamber_id);
        }else{
            if(!request()->ajax()){
                session()->forget('chamber_id');
            }
        }
        
        if(request()->subject_name){
            session()->put('subject_name',request()->subject_name);
        }else{
            if(!request()->ajax()){
                session()->forget('subject_name');
            }
        }
        if(request()->type == 'District'){
            session()->put('case_type_district','District');
        }else{
            if(!request()->ajax()){
                session()->forget('case_type_district');
            }
        }
        if(request()->type == 'Special'){
            session()->put('case_type_special','Special');
        }else{
            if(!request()->ajax()){
                session()->forget('case_type_special');
            }
        }
        if(request()->type == 'High Court'){
            session()->put('case_type_high_court','High Court');
        }else{
            if(!request()->ajax()){
                session()->forget('case_type_high_court');
            }
        }
        if(request()->type == 'Appellate'){
            session()->put('case_type_appellate','Appellate');
        }else{
            if(!request()->ajax()){
                session()->forget('case_type_appellate');
            }
        }
        if(request()->type == 'District & Special'){
            session()->put('case_type_district_special','District & Special');
        }else{
            if(!request()->ajax()){
                session()->forget('case_type_district_special');
            }
        }
        
        if(request()->type == 'Supreame Court'){
            session()->put('case_type_high_court_appellate','Supreame Court');
        }else{
            if(!request()->ajax()){
                session()->forget('case_type_high_court_appellate');
            }
        }
        
        if(request()->client_id){
            session()->put('client_id',request()->client_id);
        }else{
            if(!request()->ajax()){
                session()->forget('client_id');
            }
        }
        
        if(request()->from){
            session()->put('bill_date_from',request()->from);
        }else{
            if(!request()->ajax()){
                session()->forget('bill_date_from');
            }
        }
        
        if(request()->to){
            session()->put('bill_date_to',request()->to);
        }else{
            if(!request()->ajax()){
                session()->forget('bill_date_to');
            }
        }
        if(request()->bill_case_service_id){
            session()->put('bill_case_service_id',request()->bill_case_service_id);
        }else{
            if(!request()->ajax()){
                session()->forget('bill_case_service_id');
            }
        }
        
        $bills = Bill::whereIsPaid(0)->whereLawyerId(auth()->guard('lawyer')->id())->oldest('bill_date');
        
        if(session()->has('client_id')){
            $bills->where('bill_client_id',session()->get('client_id'));
        }
        if(session()->has('bill_date_from') && session()->has('bill_date_to')){
            $bills->whereBetween('bill_date',[session()->get('bill_date_from'),session()->get('bill_date_to')]);
        }
        if(session()->has('bill_case_service_id')){
            $bills->where('bill_case_service_id',session()->get('bill_case_service_id'));
        }
        
        if(session()->has('case_type_district')){
            $bills->whereHas('cases',function($q){
                $q->where('case_class_id','District');
            });
        }
        if(session()->has('case_type_special')){
            $bills->whereHas('cases',function($q){
                $q->where('case_class_id','Special');
            });
        }
        if(session()->has('case_type_high_court')){
            $bills->whereHas('cases',function($q){
                $q->where('case_class_id','High Court');
            });
        }
        if(session()->has('case_type_appellate')){
            $bills->whereHas('cases',function($q){
                $q->where('case_class_id','Appellate');
            });
        }
        if(session()->has('case_type_district_special')){
            $bills->whereHas('cases',function($q){
                $q->where('case_class_id','District')->orWhere('case_class_id','Special');
            });
        }
        if(session()->has('case_type_high_court_appellate')){
            $bills->whereHas('cases',function($q){
                $q->where('case_class_id','High Court')->orWhere('case_class_id','Appellate');
            });
        }
        
        if(request()->ajax()){
            
        return DataTables::of($bills->with('cases','client','type','reference','cases.caseTitleShort','ledgers'))
                ->setRowClass('{{ $id % 2 == 0 ? "text-info" : "text-danger" }}')
                ->setRowId('{{$id}}')
                ->setRowAttr([
                    'align' => 'center'
                ])
                ->addIndexColumn()
                ->addColumn('bill_no', function ($q) {
                    $bill = route('lawyer.account.billing.show',$q->id);
                    return '<a href="'.$bill.'" target="_blank">BL-000'.$q->id.'</a>';
                })
                ->addColumn('case_no', function ($user) {
                $show = route('lawyer.litigation.case.show', $user->bill_case_service_id);
                
                return '<a href="'.$show.'" target="_blank">'.$user->cases->caseTitleShort->name_short.' '.$user->cases->case_infos_case_no.'/'.$user->cases->case_infos_case_year.'</a>';
                })
                ->addColumn('received_amount', function ($q) {
                    $received = $q->ledgers()->sum('paid_received_amount');
                    return $received;
                })
                ->addColumn('balance_amount', function ($q) {
                    $received = $q->ledgers()->sum('paid_received_amount');
                    $due = $q->bill_amount - $received;
                    return $due;
                })
                ->addColumn('status', function ($q) {
                    $received = $q->ledgers()->sum('paid_received_amount');
                    $due = $q->bill_amount - $received;
                    if($q->bill_amount > $received){
                        return '<span class="badge badge-danger font-weight-bold">Due<span/>';
                    }else{
                        return '<span class="badge badge-success font-weight-bold">Paid<span/>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $show = route('lawyer.account.ledger-entry', ['bill_no_id'=>$row->id]);
                    $actionBtn='<a class="dropdown-item" href="'.$show.'"><i class="fas fa-eye mr-2"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['case_no','bill_no','status','action'])
                ->make(true);
                
        }
        $title = 'Balance Report';
        $ledgers = Ledger::whereIn('bill_no_id',$bills->pluck('id')->toArray())->whereLawyerId(auth()->guard('lawyer')->id());
        $clients = Client::where('status',1)->get();
        $subjects = InvoiceSubject::where('status',1)->oldest('sort')->get();
        $chambers = Chamber::where('status',1)->get();
        return view('lawyer.account.balance-report', compact('title','bills','ledgers','clients','subjects','chambers'));
        
    }
    
    public function balancePrint()
    {
        
        $bills = Bill::whereLawyerId(auth()->guard('lawyer')->id())->oldest('bill_date');
        
        if(session()->has('client_id')){
            $bills->where('bill_client_id',session()->get('client_id'));
        }
        if(session()->has('bill_date_from') && session()->has('bill_date_to')){
            $bills->whereBetween('bill_date',[session()->get('bill_date_from'),session()->get('bill_date_to')]);
        }
        if(session()->has('bill_case_service_id')){
            $bills->where('bill_case_service_id',session()->get('bill_case_service_id'));
        }
        
        if(session()->has('case_type_district')){
            $bills->whereHas('cases',function($q){
                $q->where('case_class_id','District');
            });
        }
        if(session()->has('case_type_special')){
            $bills->whereHas('cases',function($q){
                $q->where('case_class_id','Special');
            });
        }
        if(session()->has('case_type_high_court')){
            $bills->whereHas('cases',function($q){
                $q->where('case_class_id','High Court');
            });
        }
        if(session()->has('case_type_appellate')){
            $bills->whereHas('cases',function($q){
                $q->where('case_class_id','Appellate');
            });
        }
        if(session()->has('case_type_district_special')){
            $bills->whereHas('cases',function($q){
                $q->where('case_class_id','District')->orWhere('case_class_id','Special');
            });
        }
        if(session()->has('case_type_high_court_appellate')){
            $bills->whereHas('cases',function($q){
                $q->where('case_class_id','High Court')->orWhere('case_class_id','Appellate');
            });
        }

        $client = Client::findOrFail(session()->get('client_id'));
        $from= session()->get('bill_date_from');
        $to= session()->get('bill_date_to');
        if(session()->has('subject_id')){
        $subject = InvoiceSubject::findOrFail(session()->get('subject_id'))->name;
        }else{
            $subject = '';
        }
        $subject_name = session()->get('subject_name');
        $bills = $bills->get();
        $vat = 0;
        $tax = 0;
        $autogenerate = 0;
        $signature = 0;
        $subtotal = $bills->sum('bill_amount');
        $total= $subtotal;
        
        $chamber = Chamber::where('id',session()->get('chamber_id'))->first();
        $client_address = $client;
        
        return view('lawyer.account.balance-pdf',compact('bills','client','from','to','subject','subject_name','subtotal','vat','tax','total','autogenerate','signature','chamber','client_address'));
        
    }
    
    public function invoice()
    {
        $clients = Client::where('status',1)->get();
        $subjects = InvoiceSubject::where('status',1)->oldest('sort')->get();
        $chambers = Chamber::where('status',1)->get();
        return view('lawyer.account.invoice',compact('clients','subjects','chambers'));
    }
    
    
    public function invoiceGenerate()
    {
        $bills = Bill::whereShowInvoice(1)->whereIsPaid(0)->whereLawyerId(auth()->guard('lawyer')->id())->where('bill_client_id',request()->client_id)->whereBetween('bill_date',[request()->from,request()->to])->oldest('bill_date');
        
        if(request()->bill_id){
            $bills->whereId(request()->bill_id);
        }
        
        if(request()->category == 'Others'){
            $bills->whereBillCategoryId('Others');
        }else{
            $bills->where('bill_category_id','!=','Others');
        }
        
        if(request()->bill_case_service_id){
            $bills->where('bill_case_service_id',request()->bill_case_service_id);
        
        if(request()->type == 'District'){
            $bills->whereHas('cases',function($q){
                $q->where('case_class_id','District');
            });
        }
        if(request()->type == 'Special'){
            $bills->whereHas('cases',function($q){
                $q->where('case_class_id','Special');
            });
        }
        if(request()->type == 'High Court'){
            $bills->whereHas('cases',function($q){
                $q->where('case_class_id','High Court');
            });
        }
        if(request()->type == 'Appellate'){
            $bills->whereHas('cases',function($q){
                $q->where('case_class_id','Appellate');
            });
        }
        if(request()->type == 'District & Special'){
            $bills->whereHas('cases',function($q){
                $q->where('case_class_id','District')->orWhere('case_class_id','Special');
            });
        }
        if(request()->type == 'Supreame Court'){
            $bills->whereHas('cases',function($q){
                $q->where('case_class_id','High Court')->orWhere('case_class_id','Appellate');
            });
        }
        }
        $client = Client::findOrFail(request()->client_id);
        $from= request()->from;
        $to= request()->to;
        if(request()->subject_id){
            $subject = InvoiceSubject::findOrFail(request()->subject_id)->name;
        }else{
            $subject = '';
        }
        $subject_name = request()->subject_name;
        $bills = $bills->get();
        $vat = 0;
        $tax = 0;
        $autogenerate = 0;
        $signature = 0;
        $subtotal = $bills->sum('bill_amount');
        $total= $subtotal;
        if(request()->tax){
            $tax = $subtotal * 0.1;
            $total +=$tax;
        }
        if(request()->vat){
            $vat = $total * 0.15;
            $total += $vat;
        }
        if(request()->autogenerate){
            $autogenerate = 1;
        }
        if(request()->signature){
            $signature = 1;
        }
        
        $chamber = Chamber::where('id',request()->chamber_id)->first();
        $lawyer_non_lawyer = Hr::where('id',request()->lawyernonlawyer_id)->first();
        $client_address = Client::where('id',request()->client_id)->first();
        
        return view('lawyer.account.invoice-pdf',compact('lawyer_non_lawyer','bills','client','from','to','subject','subject_name','subtotal','vat','tax','total','autogenerate','signature','chamber','client_address'));
    }
    public function incExpReport()
    {
        return view('lawyer.account.income-expense-report');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = Bill::whereCplId($request->cpl_id)->first();
        if($check){
            $notification = array('messege' => "Already Bill is Prepared", 'alert-type' => 'error');
            if(request()->is_bill){
            return redirect()->route('lawyer.litigation.case.show',['cases'=>request()->bill_case_service_id,'cpl'=>'true'])->with($notification);
            }
             return redirect()->route('lawyer.account.billing')->with($notification);
        }
        Bill::create(request()->except('is_bill'));
        $notification = array('messege' => "Billing Added Successfully", 'alert-type' => 'success');
        if(request()->is_bill){
            return redirect()->route('lawyer.litigation.case.show',['cases'=>request()->bill_case_service_id,'cpl'=>'true'])->with($notification);
        }
       
        return redirect()->route('lawyer.account.billing')->with($notification);
    }
    
    
    public function getbillClient(Request $request)
    {
        if($request->caseCategory){
            
        $q = Cases::query();
        
        if(request()->caseCategory == 'District'){
                $q->where('case_class_id','District');
        }
        if(request()->caseCategory == 'Special'){
                $q->where('case_class_id','Special');
        }
        if(request()->caseCategory == 'High Court'){
                $q->where('case_class_id','High Court');
        }
        if(request()->caseCategory == 'Appellate'){
                $q->where('case_class_id','Appellate');
        }
        if(request()->caseCategory == 'District & Special'){
            $q->where(function($query){
                $query->where('case_class_id','District')->orWhere('case_class_id','Special');
            });
        }
        if(request()->caseCategory == 'Supreame Court'){
             $q->where(function($query){
                $query->where('case_class_id','High Court')->orWhere('case_class_id','Appellate');
            });
        }
        
        $data = $q->with('caseTitleShort','caseTitle')->where("client_id", $request->billClient)->get();
        
        }else{
        $data = Cases::with('caseTitleShort','caseTitle')->where("client_id", $request->billClient)->get();
        }
        
        if($request->billCategory == 'Others'){
            $bills = Bill::whereBillClientId($request->billClient)->whereIsPaid(0)->whereBillCategoryId('Others')->latest()->get();
        }else{
            $bills = [];
        }
        return response()->json([
            'cases' => $data,
            'bills' => $bills,
            ]);
    }
    public function getBillByCase(Request $request)
    {
        $data = Bill::where('bill_case_service_id',$request->case_id)->get(['id','bill_particulars']);
        return response()->json($data);
    }
    
    
    public function getBill(Request $request)
    {
        $bill = Bill::find($request->bill_id);
        $data['bill_amount'] = $bill->bill_amount;
        $data['balance_amount'] = $bill->bill_amount - $bill->ledgers()->sum('paid_received_amount');
        return response()->json($data);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = Bill::with('ledgers','cases')->find($id);
        $clients = Client::whereLawyerId(auth()->guard('lawyer')->id())->where('status',1)->latest()->get();
        $cases = Cases::whereLawyerId(auth()->guard('lawyer')->id())->get();
        $billCategories = BillCategory::latest()->get();
        $billReferences = BillReference::oldest('sort')->get();
        $billTypes = BillType::oldest('sort')->get();
        return view('lawyer.account.bill_show',compact('bill','cases', 'billCategories', 'billReferences', 'billTypes','clients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients = Client::whereLawyerId(auth()->guard('lawyer')->id())->where('status',1)->latest()->get();
        $cases = Cases::whereLawyerId(auth()->guard('lawyer')->id())->get();
        $billCategories = BillCategory::latest()->get();
        $billReferences = BillReference::oldest('sort')->get();
        $billTypes = BillType::oldest('sort')->get();
        $bill = Bill::findOrFail($id);
        
        return view('lawyer.account.billing_edit', compact('cases', 'billCategories', 'billReferences', 'billTypes','clients','bill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        
        $bill = Bill::findOrFail($id);
        if($bill->is_paid){
             $notification = array('messege' => "Bill already Paid", 'alert-type' => 'error');
        return back()->with($notification);
        }
        if(!$request->add_invoice){
            $request['add_invoice'] = 0;
        }
        if(!$request->show_invoice){
            $request['show_invoice'] = 1;
        }
        $bill->update($request->all());
        $notification = array('messege' => "Bill Updated Successfully", 'alert-type' => 'success');
        return redirect()->route('lawyer.account.billing')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete($id)
    {
        Ledger::findOrFail($id)->delete();
         $notification = array('messege' => "Ledger Deleted Successfully", 'alert-type' => 'success');
        return back()->with($notification);
    }
    
    public function printPdf()
    {
        return view('lawyer.account.invoice-pdf');
    }
    
    
}
