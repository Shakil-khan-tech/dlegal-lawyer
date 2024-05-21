<?php

namespace App\Http\Controllers\Lawyer;

use App\Area;
use App\CaseClient;
use App\CplStatus;
use App\Branch;
use App\CaseCategory;
use App\CaseSubsequent;
use App\CaseCourt;
use App\CaseLaw;
use App\CaseMatter;
use App\CaseNature;
use App\CasePrayer;
use App\CaseSection;
use App\FixedFor;
use App\CourtProceeding;
use App\DocumentName;
use App\CourtOrder;
use App\DayNote;
use App\NextDayPresence;
use App\CaseProceeding;
use App\CaseActivity;
use App\CaseStatus;
use App\CaseTitle;
use App\CaseType;
use App\Cases;
use App\Client;
use App\ClientRepresentative;
use App\ClientBehalf;
use App\ClientCategory;
use App\ClientSubCategory;
use Yajra\DataTables\DataTables;
use App\DisposedBy;
use App\DisposedEvidence;
use App\DisposedStatus;
use App\District;
use App\Division;
use App\EvidenceType;
use App\Http\Controllers\Controller;
use App\Thana;
use App\Zone;
use App\Hr;
use App\Bill;
use App\CaseDocument;
use App\CaseDocumentType;
use App\Chamber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Artisan;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CasesController extends Controller
{
    
    public function sequentUpdate($id){
        CaseSubsequent::findOrFail($id)->update(request()->all());
        $notification = array('messege' => "Case Subsequent updated Successfully", 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function sequentEdit($id){
        $sub = CaseSubsequent::findOrFail($id);
        $case_courts = CaseCourt::whereStatus(1)->get();
        $case_titles = CaseTitle::whereStatus(1)->get();
        $case_laws = CaseLaw::whereStatus(1)->get();
        $case_sections = CaseSection::whereStatus(1)->get();
        return view('lawyer.litigation.edit_subsequent',compact('sub','case_courts','case_titles','case_laws','case_sections'));
    }
    public function sequentDelete($id){
        CaseSubsequent::findOrFail($id)->delete();
        return back();
    }
    public function litigation_calender_short_court(){

        //Criminal Case
        $districts = Cases::whereCaseClassId('District')->select('next_case_date')->groupBy('next_case_date')->get();
        $district_events = array();
        foreach ($districts as $case) {
            $case_count = Cases::whereCaseClassId('District')->where('next_case_date', $case->next_case_date)->count();

            $district_events[] = [
                'title' => "District: $case_count",
                'url' => url('lawyer/litigation/district-court'),
                'start' => $case->next_case_date,
                'display' => 'list-item',
                'backgroundColor' => 'pink',
            ];
        }

        //Civil Case
        $specials = Cases::whereCaseClassId('Special')->select('next_case_date')->groupBy('next_case_date')->get();
        $special_events = array();
        foreach ($specials as $case) {
            $case_count = Cases::whereCaseClassId('Special')->where('next_case_date', $case->next_case_date)->count();

            $special_events[] = [
                'title' => "Special: $case_count",
                'url' => url('lawyer/litigation/special-court'),
                'start' => $case->next_case_date,
                'display' => 'list-item',
                'backgroundColor' => 'orange'
            ];
        }
        
        
        //Civil Case
        $high_courts = Cases::whereCaseClassId('High Court')->select('next_case_date')->groupBy('next_case_date')->get();
        $high_court_events = array();
        foreach ($high_courts as $case) {
            $case_count = Cases::whereCaseClassId('High Court')->where('next_case_date', $case->next_case_date)->count();

            $high_court_events[] = [
                'title' => "High Court: $case_count",
                'url' => url('lawyer/litigation/high-court'),
                'start' => $case->next_case_date,
                'display' => 'list-item',
                'backgroundColor' => 'green'
            ];
        }
        
        //Civil Case
        $appellates = Cases::whereCaseClassId('Appellate')->select('next_case_date')->groupBy('next_case_date')->get();
        $appellate_events = array();
        foreach ($appellates as $case) {
            $case_count = Cases::whereCaseClassId('Appellate')->where('next_case_date', $case->next_case_date)->count();

            $appellate_events[] = [
                'title' => "Appellate: $case_count",
                'url' => url('lawyer/litigation/special-court'),
                'start' => $case->next_case_date,
                'display' => 'list-item',
                'backgroundColor' => 'blue'
            ];
        }
        $events = array_merge($district_events, $special_events,$high_court_events,$appellate_events);

        return view('lawyer.calendar-list.court_all',['events' => $events]);

    }

    public function litigation_calender_short(){

        $redirect_url =  url('lawyer/litigation/district-court');https://dlegal.easycoder24.com/lawyer/litigation/district-court?type=civil
        //Criminal Case
        $criminal_cases = Cases::whereCaseCategoryId(2)->select('next_case_date')->groupBy('next_case_date')->get();
        
       
        $criminal_events = array();
        foreach ($criminal_cases as $case) {
            $case_count = Cases::whereCaseCategoryId(2)->where('next_case_date', $case->next_case_date)->count();
            // $case->next_case_date
            $criminal_events[] = [
                'title' => "Criminal: $case_count",
                'url' => $redirect_url."?type=criminal",
                'start' => $case->next_case_date,
                'display' => 'list-item',
                'backgroundColor' => 'pink',
            ];
        }

        //Civil Case
        $civil_cases = Cases::whereCaseCategoryId(1)->select('next_case_date')->groupBy('next_case_date')->get();
        $civil_events = array();
        foreach ($civil_cases as $case) {
            $case_count = Cases::whereCaseCategoryId(1)->where('next_case_date', $case->next_case_date)->count();

            $civil_events[] = [
                'title' => "Civil: $case_count",
                'url' => $redirect_url."?type=civil",
                'start' => $case->next_case_date,
                'display' => 'list-item',
                'backgroundColor' => 'orange'
            ];
        }
        
        $events = array_merge($criminal_events, $civil_events);

        return view('lawyer.calendar-list.all',['events' => $events]);

    }
    public function createEvent(Request $request){
        $data = $request->except('_token');
        $events = Cases::insert($data);
        return response()->json($events);
    }
    
    public function deleteEvent(Request $request){
        $event = Cases::find($request->id);
        return $event->delete();
    }

    public function all()
    {
        
        if(request()->type){
            session()->put('type',request()->type);
        }else{
            if(!request()->ajax()){
                session()->forget('type');
            }
        }
        if (request()->ajax()) {
            $user = Cases::orderBy('id', 'desc')->when(session()->has('type') && session()->get('type') == 'civil', function($q){
                return $q->whereIn('case_category_id',[1,3]);
            })
            ->when(session()->has('type') && session()->get('type') == 'criminal', function($q){
                return $q->whereIn('case_category_id',[2,4]);
            })
            ->with('type', 'court', 'thana', 'nature', 'matter','client','status','clientDistrict','opponentDistrict','caseTitleShort')->whereLawyerId(auth()->guard('lawyer')->id());
            
            return DataTables::of($user)
            ->setRowId('{{$id}}')
            ->setRowAttr([
                'align' => 'center'
            ])
            ->addIndexColumn()
            ->addColumn('court_name_short', function ($user) {
                if($user->court){
                    return $user->court->name_short;
                }else{
                    return '';
                }
            })
            ->addColumn('nature_name', function ($user) {
                if($user->nature){
                    return $user->nature->name;
                }else{
                    return '';
                }
            })
            ->addColumn('matter_name', function ($user) {
                if($user->matter){
                    return $user->matter->name;
                }else{
                    return '';
                }
            })
            ->addColumn('thana_name', function ($user) {
                if($user->thana){
                    return $user->thana->thana_name;
                }else{
                    return '';
                }
            })
            ->addColumn('first_party', function ($user) {
                if($user->client_party_id==2){
                      $html = '<span>'.$user->opponent_info_name.'</span><br>';
                    if($user->opponent_party_others){
                      $html = '<span>1.'.$user->opponent_info_name.'</span><br>';
                       $others = explode(',',$user->opponent_party_others);
                       $i = 2;
                       foreach($others as $row){
                           $html .= '<span>'.$i++.'.'.$row.'</span><br>';
                       }
                   }
                }else{
                    $html = '<span style="color:blue">'.$user->client_party_name.'</span><br>';
                   if($user->client_party_others){
                    $html = '<span style="color:blue">1.'.$user->client_party_name.'</span><br>';
                       $others = explode(',',$user->client_party_others);
                       $i = 2;
                       foreach($others as $row){
                           $html .= '<span style="color:blue">'.$i++.'.'.$row.'</span><br>';
                       }
                   }
                }
                return $html;
            })
            ->addColumn('second_party', function ($user) {
               if($user->client_party_id==2){
                      $html = '<span style="color:blue">'.$user->client_party_name.'</span><br>';
                   if($user->client_party_others){
                      $html = '<span style="color:blue">1.'.$user->client_party_name.'</span><br>';
                       $others = explode(',',$user->client_party_others);
                       $i = 2;
                       foreach($others as $row){
                           $html .= '<span style="color:blue">'.$i++.'.'.$row.'</span><br>';
                       }
                   }
                }else{
                    $html = '<span>'.$user->opponent_info_name.'</span><br>';
                    if($user->opponent_party_others){
                    $html = '<span>1.'.$user->opponent_info_name.'</span><br>';
                       $others = explode(',',$user->opponent_party_others);
                       $i = 2;
                       foreach($others as $row){
                           $html .= '<span>'.$i++.'.'.$row.'</span><br>';
                       }
                   }
                }
                return $html;
            })
            ->addColumn('client_district_name', function ($user) {
                if($user->clientDistrict){
                    return $user->clientDistrict->district_name;
                }else{
                    return '';
                }
            })
            ->addColumn('opponent_district_name', function ($user) {
                if($user->opponentDistrict){
                    return $user->opponentDistrict->district_name;
                }else{
                    return '';
                }
            })
            ->addColumn('next_case_date', function ($user) {
                if($user->cpl()->latest('updated_order_date')->first()){
                    if($user->cpl()->latest('updated_order_date')->first()->updated_next_date){
                        if($user->cpl()->latest('updated_order_date')->first()->updated_next_date < now()){
                            return '<span class="text-danger font-weight-bold">'.$user->cpl()->latest('updated_order_date')->first()->updated_next_date?->format('d-m-Y').'</span>';
                        }else{
                            return '<span class="text-black">'.$user->cpl()->latest('updated_order_date')->first()->updated_next_date?->format('d-m-Y').'</span>';
                        }
                    }else{
                        return '<span class="text-danger font-weight-bold">NOT UPD</span>';
                    }
                }else{
                    return '<span class="text-danger font-weight-bold">NOT UPD</span>';
                }
            })
             ->addColumn('next_fixed_for', function ($user) {
                if($user->cpl()->latest('updated_order_date')->first()){
                    if($user->cpl()->latest('updated_order_date')->first()->next_fixed_for()->first()){
                        return $user->cpl()->latest('updated_order_date')->first()->next_fixed_for()->first()->name;
                    }else{
                        return $user->cpl()->latest('updated_order_date')->first()->updated_index_fixed_for_write;
                    }
                }else{
                    return '';
                }
            })
            ->addColumn('law', function ($user) {
                    return '';
            })
            ->addColumn('lawyer', function ($user) {
                    return '';
            })
            ->addColumn('is_bill', function ($user) {
                $left = false;
                $due = false;
                if($user->cpl()->count()){
                    foreach($user->cpl()->get() as $cpl){
                        if($cpl->bills() && $cpl->bills()->count()){
                            foreach($cpl->bills()->get() as $bill){
                                if($bill->ledgers()->count()){
                                    $received = $bill->ledgers()->sum('paid_received_amount');
                                    if($bill->bill_amount > $received){
                                        $due = true;
                                    }
                                }else{
                                    $due = true;
                                }
                            }
                        }else{
                            $left=true;
                        }
                    }
                    if($left){
                        return '<i class="fa fa-times-circle" style="color:red"> B<i/>';
                    }else{
                        if($due){
                        return '<i class="fa fa-check" style="color:#1cc88a"> <span style="color:red">D<span/><i/>';
                        }else{
                        return '<i class="fa fa-check" style="color:#1cc88a"> P<i/>';
                        }
                    }
                }else{
                    return '<i class="fa fa-times-circle" style="color:red"> N<i/>';
                }
                
            })
            ->addColumn('case_no', function ($user) {
                $show = route('lawyer.litigation.case.show', $user->id);
                return '<a href="'.$show.'" target="_blank">'.$user->caseTitleShort->name_short.' '.$user->case_infos_case_no.'/'.$user->case_infos_case_year.'</a>';
            })
            ->addColumn('action', function ($row) {
                $cpl = route('lawyer.litigation.case.show', $row->id);
                $bill = route('lawyer.account.billing');
                $edit = route('lawyer.litigation.case.edit', $row->id);
                $show = route('lawyer.litigation.case.show', $row->id);
                $delete = route('lawyer.litigation.case.delete', $row->id);
                $confirm = "return confirm('Are you sure you want to delete?')";
                $actionBtn='<div class="dropdown action_doc"><button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i> </button> <div class="dropdown-menu " aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="'.$show.'"><i class="fas fa-eye mr-2"></i></a><a class="dropdown-item" href="'.$cpl.'?cpl=true' .'"><i class="fas fa-calendar-alt mr-2"></i> </a><a class="dropdown-item" href="'.$bill.'?case_id='.$row->id. '"><i class="fas fa-calculator mr-2"></i> </a><a class="dropdown-item" href="'.$edit.'"><i class="fas fa-edit mr-2"></i></a><a class="dropdown-item" onClick="'.$confirm.'" href="'.$delete.'"><i class="fas fa-trash-alt mr-2"></i></a> </div></div>';
                return $actionBtn;
            })
            ->rawColumns(['is_bill','case_no','next_case_date','first_party','second_party','action'])
            ->make(true);
        }
        $title = 'List of all Cases';
        return view('lawyer.litigation.all',compact('title'));
    }

    public function districtCourt()
    {
        if(request()->type){
            session()->put('type',request()->type);
        }else{
            if(!request()->ajax()){
                session()->forget('type');
            }
        }
        if (request()->ajax()) {
            $user = Cases::where('case_class_id','District')->orderBy('id', 'desc')->when(session()->has('type') && session()->get('type') == 'civil', function($q){
                 return $q->whereIn('case_category_id',[1,3]);
            })
            ->when(session()->has('type') && session()->get('type') == 'criminal', function($q){
                return $q->whereIn('case_category_id',[2,4]);
            })
            ->with('type', 'court', 'thana', 'nature', 'matter','client','status','clientDistrict','opponentDistrict','caseTitleShort')->whereLawyerId(auth()->guard('lawyer')->id());
            return DataTables::of($user)
            ->setRowId('{{$id}}')
            ->setRowAttr([
                'align' => 'center'
            ])
            ->addIndexColumn()
            ->addColumn('court_name_short', function ($user) {
                if($user->court){
                    return $user->court->name_short;
                }else{
                    return '';
                }
            })
            ->addColumn('nature_name', function ($user) {
                if($user->nature){
                    return $user->nature->name;
                }else{
                    return '';
                }
            })
            ->addColumn('matter_name', function ($user) {
                if($user->matter){
                    return $user->matter->name;
                }else{
                    return '';
                }
            })
            ->addColumn('thana_name', function ($user) {
                if($user->thana){
                    return $user->thana->thana_name;
                }else{
                    return '';
                }
            })
            ->addColumn('first_party', function ($user) {
                if($user->client_party_id==2){
                      $html = '<span>'.$user->opponent_info_name.'</span><br>';
                    if($user->opponent_party_others){
                      $html = '<span>1.'.$user->opponent_info_name.'</span><br>';
                       $others = explode(',',$user->opponent_party_others);
                       $i = 2;
                       foreach($others as $row){
                           $html .= '<span style="color:blue">'.$i++.'.'.$row.'</span><br>';
                       }
                   }
                }else{
                    $html = '<span style="color:blue">'.$user->client_party_name.'</span><br>';
                   if($user->client_party_others){
                    $html = '<span style="color:blue">1.'.$user->client_party_name.'</span><br>';
                       $others = explode(',',$user->client_party_others);
                       $i = 2;
                       foreach($others as $row){
                           $html .= '<span style="color:blue">'.$i++.'.'.$row.'</span><br>';
                       }
                   }
                }
                return $html;
            })
            ->addColumn('second_party', function ($user) {
               if($user->client_party_id==2){
                      $html = '<span style="color:blue">'.$user->client_party_name.'</span><br>';
                   if($user->client_party_others){
                      $html = '<span style="color:blue">1.'.$user->client_party_name.'</span><br>';
                       $others = explode(',',$user->client_party_others);
                       $i = 2;
                       foreach($others as $row){
                           $html .= '<span style="color:blue">'.$i++.'.'.$row.'</span><br>';
                       }
                   }
                }else{
                    $html = '<span>'.$user->opponent_info_name.'</span><br>';
                    if($user->opponent_party_others){
                    $html = '<span>1.'.$user->opponent_info_name.'</span><br>';
                       $others = explode(',',$user->opponent_party_others);
                       $i = 2;
                       foreach($others as $row){
                           $html .= '<span style="color:blue">'.$i++.'.'.$row.'</span><br>';
                       }
                   }
                }
                return $html;
            })
            ->addColumn('client_district_name', function ($user) {
                if($user->clientDistrict){
                    return $user->clientDistrict->district_name;
                }else{
                    return '';
                }
            })
            ->addColumn('opponent_district_name', function ($user) {
                if($user->opponentDistrict){
                    return $user->opponentDistrict->district_name;
                }else{
                    return '';
                }
            })
            ->addColumn('next_case_date', function ($user) {
                if($user->cpl()->latest('updated_next_date')->first()){
                    if($user->cpl()->latest('updated_next_date')->first()->updated_next_date < now()){
                        return '<span class="text-danger font-weight-bold">'.$user->cpl()->latest('updated_next_date')->first()->updated_next_date->format('d-m-Y').'</span>';
                    }else{
                        return '<span class="text-black font-weight-bold">'.$user->cpl()->latest('updated_next_date')->first()->updated_next_date->format('d-m-Y').'</span>';
                    }
                }else{
                    return '<span class="text-danger font-weight-bold">UPDD</span>';
                }
            })
             ->addColumn('next_fixed_for', function ($user) {
                if($user->cpl()->latest('updated_next_date')->first()){
                    if($user->cpl()->latest('updated_next_date')->first()->next_fixed_for()->first()){
                        return $user->cpl()->latest('updated_next_date')->first()->next_fixed_for()->first()->name;
                    }else{
                        return $user->cpl()->latest('updated_next_date')->first()->updated_index_fixed_for_write;
                    }
                }else{
                    return '';
                }
            })
            ->addColumn('law', function ($user) {
                    return '';
            })
            ->addColumn('lawyer', function ($user) {
                    return '';
            })
            ->addColumn('is_bill', function ($user) {
                $left = false;
                $due = false;
                if($user->cpl()->count()){
                    foreach($user->cpl()->get() as $cpl){
                        if($cpl->bills() && $cpl->bills()->count()){
                            foreach($cpl->bills()->get() as $bill){
                                if($bill->ledgers()->count()){
                                    $received = $bill->ledgers()->sum('paid_received_amount');
                                    if($bill->bill_amount > $received){
                                        $due = true;
                                    }
                                }else{
                                    $due = true;
                                }
                            }
                        }else{
                            $left=true;
                        }
                    }
                    if($left){
                        return '<i class="fa fa-times-circle" style="color:red"> B<i/>';
                    }else{
                        if($due){
                        return '<i class="fa fa-check" style="color:#1cc88a"> <span style="color:red">D<span/><i/>';
                        }else{
                        return '<i class="fa fa-check" style="color:#1cc88a"> P<i/>';
                        }
                    }
                }else{
                    return '<i class="fa fa-times-circle" style="color:red"> N<i/>';
                }
                
            })
            ->addColumn('case_no', function ($user) {
                $show = route('lawyer.litigation.case.show', $user->id);
                return '<a href="'.$show.'" target="_blank">'.$user->caseTitleShort->name_short.' '.$user->case_infos_case_no.'/'.$user->case_infos_case_year.'</a>';
            })
            ->addColumn('action', function ($row) {
                $cpl = route('lawyer.litigation.case.show', $row->id);
                $bill = route('lawyer.account.billing');
                $edit = route('lawyer.litigation.case.edit', $row->id);
                $show = route('lawyer.litigation.case.show', $row->id);
                $delete = route('lawyer.litigation.case.delete', $row->id);
                $confirm = "return confirm('Are you sure you want to delete?')";
                $actionBtn='<div class="dropdown action_doc"><button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i> </button> <div class="dropdown-menu " aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="'.$show.'"><i class="fas fa-eye mr-2"></i></a><a class="dropdown-item" href="'.$cpl.'?cpl=true' .'"><i class="fas fa-calendar-alt mr-2"></i> </a><a class="dropdown-item" href="'.$bill.'?case_id='.$row->id. '"><i class="fas fa-calculator mr-2"></i> </a><a class="dropdown-item" href="'.$edit.'"><i class="fas fa-edit mr-2"></i></a><a class="dropdown-item" onClick="'.$confirm.'" href="'.$delete.'"><i class="fas fa-trash-alt mr-2"></i></a> </div></div>';
                return $actionBtn;
            })
            ->rawColumns(['is_bill','case_no','next_case_date','first_party','second_party','action'])
            ->make(true);
        }
        $title = 'District Court';
        return view('lawyer.litigation.district-court',compact('title'));
    }
    public function specialCourt()
    {
        if(request()->type){
            session()->put('type',request()->type);
        }else{
            if(!request()->ajax()){
                session()->forget('type');
            }
        }
        if (request()->ajax()) {
            $user = Cases::where('case_class_id','Special')->orderBy('id', 'desc')->when(session()->has('type') && session()->get('type') == 'civil', function($q){
                 return $q->whereIn('case_category_id',[1,3]);
            })
            ->when(session()->has('type') && session()->get('type') == 'criminal', function($q){
                return $q->whereIn('case_category_id',[2,4]);
            })
            ->with('type', 'court', 'thana', 'nature', 'matter','client','status','clientDistrict','opponentDistrict','caseTitleShort')->whereLawyerId(auth()->guard('lawyer')->id());
            return DataTables::of($user)
            ->setRowId('{{$id}}')
            ->setRowAttr([
                'align' => 'center'
            ])
            ->addIndexColumn()
            ->addColumn('court_name_short', function ($user) {
                if($user->court){
                    return $user->court->name_short;
                }else{
                    return '';
                }
            })
            ->addColumn('nature_name', function ($user) {
                if($user->nature){
                    return $user->nature->name;
                }else{
                    return '';
                }
            })
            ->addColumn('matter_name', function ($user) {
                if($user->matter){
                    return $user->matter->name;
                }else{
                    return '';
                }
            })
            ->addColumn('thana_name', function ($user) {
                if($user->thana){
                    return $user->thana->thana_name;
                }else{
                    return '';
                }
            })
            ->addColumn('first_party', function ($user) {
                if($user->client_party_id==2){
                      $html = '<span>'.$user->opponent_info_name.'</span><br>';
                    if($user->opponent_party_others){
                      $html = '<span>1.'.$user->opponent_info_name.'</span><br>';
                       $others = explode(',',$user->opponent_party_others);
                       $i = 2;
                       foreach($others as $row){
                           $html .= '<span style="color:blue">'.$i++.'.'.$row.'</span><br>';
                       }
                   }
                }else{
                    $html = '<span style="color:blue">'.$user->client_party_name.'</span><br>';
                   if($user->client_party_others){
                    $html = '<span style="color:blue">1.'.$user->client_party_name.'</span><br>';
                       $others = explode(',',$user->client_party_others);
                       $i = 2;
                       foreach($others as $row){
                           $html .= '<span style="color:blue">'.$i++.'.'.$row.'</span><br>';
                       }
                   }
                }
                return $html;
            })
            ->addColumn('second_party', function ($user) {
               if($user->client_party_id==2){
                      $html = '<span style="color:blue">'.$user->client_party_name.'</span><br>';
                   if($user->client_party_others){
                      $html = '<span style="color:blue">1.'.$user->client_party_name.'</span><br>';
                       $others = explode(',',$user->client_party_others);
                       $i = 2;
                       foreach($others as $row){
                           $html .= '<span style="color:blue">'.$i++.'.'.$row.'</span><br>';
                       }
                   }
                }else{
                    $html = '<span>'.$user->opponent_info_name.'</span><br>';
                    if($user->opponent_party_others){
                    $html = '<span>1.'.$user->opponent_info_name.'</span><br>';
                       $others = explode(',',$user->opponent_party_others);
                       $i = 2;
                       foreach($others as $row){
                           $html .= '<span style="color:blue">'.$i++.'.'.$row.'</span><br>';
                       }
                   }
                }
                return $html;
            })
            ->addColumn('client_district_name', function ($user) {
                if($user->clientDistrict){
                    return $user->clientDistrict->district_name;
                }else{
                    return '';
                }
            })
            ->addColumn('opponent_district_name', function ($user) {
                if($user->opponentDistrict){
                    return $user->opponentDistrict->district_name;
                }else{
                    return '';
                }
            })
            ->addColumn('next_case_date', function ($user) {
                if($user->cpl()->latest('updated_next_date')->first()){
                    if($user->cpl()->latest('updated_next_date')->first()->updated_next_date < now()){
                        return '<span class="text-danger font-weight-bold">'.$user->cpl()->latest('updated_next_date')->first()->updated_next_date->format('d-m-Y').'</span>';
                    }else{
                        return '<span class="text-black font-weight-bold">'.$user->cpl()->latest('updated_next_date')->first()->updated_next_date->format('d-m-Y').'</span>';
                    }
                }else{
                    return '<span class="text-danger font-weight-bold">UPDD</span>';
                }
            })
             ->addColumn('next_fixed_for', function ($user) {
                if($user->cpl()->latest('updated_next_date')->first()){
                    if($user->cpl()->latest('updated_next_date')->first()->next_fixed_for()->first()){
                        return $user->cpl()->latest('updated_next_date')->first()->next_fixed_for()->first()->name;
                    }else{
                        return $user->cpl()->latest('updated_next_date')->first()->updated_index_fixed_for_write;
                    }
                }else{
                    return '';
                }
            })
            ->addColumn('law', function ($user) {
                    return '';
            })
            ->addColumn('lawyer', function ($user) {
                    return '';
            })
            ->addColumn('is_bill', function ($user) {
                $left = false;
                $due = false;
                if($user->cpl()->count()){
                    foreach($user->cpl()->get() as $cpl){
                        if($cpl->bills() && $cpl->bills()->count()){
                            foreach($cpl->bills()->get() as $bill){
                                if($bill->ledgers()->count()){
                                    $received = $bill->ledgers()->sum('paid_received_amount');
                                    if($bill->bill_amount > $received){
                                        $due = true;
                                    }
                                }else{
                                    $due = true;
                                }
                            }
                        }else{
                            $left=true;
                        }
                    }
                    if($left){
                        return '<i class="fa fa-times-circle" style="color:red"> B<i/>';
                    }else{
                        if($due){
                        return '<i class="fa fa-check" style="color:#1cc88a"> <span style="color:red">D<span/><i/>';
                        }else{
                        return '<i class="fa fa-check" style="color:#1cc88a"> P<i/>';
                        }
                    }
                }else{
                    return '<i class="fa fa-times-circle" style="color:red"> N<i/>';
                }
                
            })
            ->addColumn('case_no', function ($user) {
                $show = route('lawyer.litigation.case.show', $user->id);
                return '<a href="'.$show.'" target="_blank">'.$user->caseTitleShort->name_short.' '.$user->case_infos_case_no.'/'.$user->case_infos_case_year.'</a>';
            })
            ->addColumn('action', function ($row) {
                $cpl = route('lawyer.litigation.case.show', $row->id);
                $bill = route('lawyer.account.billing');
                $edit = route('lawyer.litigation.case.edit', $row->id);
                $show = route('lawyer.litigation.case.show', $row->id);
                $delete = route('lawyer.litigation.case.delete', $row->id);
                $confirm = "return confirm('Are you sure you want to delete?')";
                $actionBtn='<div class="dropdown action_doc"><button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i> </button> <div class="dropdown-menu " aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="'.$show.'"><i class="fas fa-eye mr-2"></i></a><a class="dropdown-item" href="'.$cpl.'?cpl=true' .'"><i class="fas fa-calendar-alt mr-2"></i> </a><a class="dropdown-item" href="'.$bill.'?case_id='.$row->id. '"><i class="fas fa-calculator mr-2"></i> </a><a class="dropdown-item" href="'.$edit.'"><i class="fas fa-edit mr-2"></i></a><a class="dropdown-item" onClick="'.$confirm.'" href="'.$delete.'"><i class="fas fa-trash-alt mr-2"></i></a> </div></div>';
                return $actionBtn;
            })
            ->rawColumns(['is_bill','case_no','next_case_date','first_party','second_party','action'])
            ->make(true);
        }
        $title = 'Special Court';
        return view('lawyer.litigation.special-court',compact('title'));
    }
    public function highCourt()
    {
        if(request()->type){
            session()->put('type',request()->type);
        }else{
            if(!request()->ajax()){
                session()->forget('type');
            }
        }
        if (request()->ajax()) {
            $user = Cases::where('case_class_id','High Court')->orderBy('id', 'desc')->when(session()->has('type') && session()->get('type') == 'civil', function($q){
                 return $q->whereIn('case_category_id',[1,3]);
            })
            ->when(session()->has('type') && session()->get('type') == 'criminal', function($q){
                return $q->whereIn('case_category_id',[2,4]);
            })
            ->with('type', 'court', 'thana', 'nature', 'matter','client','status','clientDistrict','opponentDistrict','caseTitleShort')->whereLawyerId(auth()->guard('lawyer')->id());
            return DataTables::of($user)
            ->setRowId('{{$id}}')
            ->setRowAttr([
                'align' => 'center'
            ])
            ->addIndexColumn()
            ->addColumn('court_name_short', function ($user) {
                if($user->court){
                    return $user->court->name_short;
                }else{
                    return '';
                }
            })
            ->addColumn('nature_name', function ($user) {
                if($user->nature){
                    return $user->nature->name;
                }else{
                    return '';
                }
            })
            ->addColumn('matter_name', function ($user) {
                if($user->matter){
                    return $user->matter->name;
                }else{
                    return '';
                }
            })
            ->addColumn('thana_name', function ($user) {
                if($user->thana){
                    return $user->thana->thana_name;
                }else{
                    return '';
                }
            })
            ->addColumn('first_party', function ($user) {
                if($user->client_party_id==2){
                      $html = '<span>'.$user->opponent_info_name.'</span><br>';
                    if($user->opponent_party_others){
                      $html = '<span>1.'.$user->opponent_info_name.'</span><br>';
                       $others = explode(',',$user->opponent_party_others);
                       $i = 2;
                       foreach($others as $row){
                           $html .= '<span style="color:blue">'.$i++.'.'.$row.'</span><br>';
                       }
                   }
                }else{
                    $html = '<span style="color:blue">'.$user->client_party_name.'</span><br>';
                   if($user->client_party_others){
                    $html = '<span style="color:blue">1.'.$user->client_party_name.'</span><br>';
                       $others = explode(',',$user->client_party_others);
                       $i = 2;
                       foreach($others as $row){
                           $html .= '<span style="color:blue">'.$i++.'.'.$row.'</span><br>';
                       }
                   }
                }
                return $html;
            })
            ->addColumn('second_party', function ($user) {
               if($user->client_party_id==2){
                      $html = '<span style="color:blue">'.$user->client_party_name.'</span><br>';
                   if($user->client_party_others){
                      $html = '<span style="color:blue">1.'.$user->client_party_name.'</span><br>';
                       $others = explode(',',$user->client_party_others);
                       $i = 2;
                       foreach($others as $row){
                           $html .= '<span style="color:blue">'.$i++.'.'.$row.'</span><br>';
                       }
                   }
                }else{
                    $html = '<span>'.$user->opponent_info_name.'</span><br>';
                    if($user->opponent_party_others){
                    $html = '<span>1.'.$user->opponent_info_name.'</span><br>';
                       $others = explode(',',$user->opponent_party_others);
                       $i = 2;
                       foreach($others as $row){
                           $html .= '<span style="color:blue">'.$i++.'.'.$row.'</span><br>';
                       }
                   }
                }
                return $html;
            })
            ->addColumn('client_district_name', function ($user) {
                if($user->clientDistrict){
                    return $user->clientDistrict->district_name;
                }else{
                    return '';
                }
            })
            ->addColumn('opponent_district_name', function ($user) {
                if($user->opponentDistrict){
                    return $user->opponentDistrict->district_name;
                }else{
                    return '';
                }
            })
            ->addColumn('next_case_date', function ($user) {
                if($user->cpl()->latest('updated_next_date')->first()){
                    if($user->cpl()->latest('updated_next_date')->first()->updated_next_date < now()){
                        return '<span class="text-danger font-weight-bold">'.$user->cpl()->latest('updated_next_date')->first()->updated_next_date->format('d-m-Y').'</span>';
                    }else{
                        return '<span class="text-black font-weight-bold">'.$user->cpl()->latest('updated_next_date')->first()->updated_next_date->format('d-m-Y').'</span>';
                    }
                }else{
                    return '<span class="text-danger font-weight-bold">UPDD</span>';
                }
            })
             ->addColumn('next_fixed_for', function ($user) {
                if($user->cpl()->latest('updated_next_date')->first()){
                    if($user->cpl()->latest('updated_next_date')->first()->next_fixed_for()->first()){
                        return $user->cpl()->latest('updated_next_date')->first()->next_fixed_for()->first()->name;
                    }else{
                        return $user->cpl()->latest('updated_next_date')->first()->updated_index_fixed_for_write;
                    }
                }else{
                    return '';
                }
            })
            ->addColumn('law', function ($user) {
                    return '';
            })
            ->addColumn('lawyer', function ($user) {
                    return '';
            })
            ->addColumn('is_bill', function ($user) {
                $left = false;
                $due = false;
                if($user->cpl()->count()){
                    foreach($user->cpl()->get() as $cpl){
                        if($cpl->bills() && $cpl->bills()->count()){
                            foreach($cpl->bills()->get() as $bill){
                                if($bill->ledgers()->count()){
                                    $received = $bill->ledgers()->sum('paid_received_amount');
                                    if($bill->bill_amount > $received){
                                        $due = true;
                                    }
                                }else{
                                    $due = true;
                                }
                            }
                        }else{
                            $left=true;
                        }
                    }
                    if($left){
                        return '<i class="fa fa-times-circle" style="color:red"> B<i/>';
                    }else{
                        if($due){
                        return '<i class="fa fa-check" style="color:#1cc88a"> <span style="color:red">D<span/><i/>';
                        }else{
                        return '<i class="fa fa-check" style="color:#1cc88a"> P<i/>';
                        }
                    }
                }else{
                    return '<i class="fa fa-times-circle" style="color:red"> N<i/>';
                }
                
            })
            ->addColumn('case_no', function ($user) {
                $show = route('lawyer.litigation.case.show', $user->id);
                return '<a href="'.$show.'" target="_blank">'.$user->caseTitleShort->name_short.' '.$user->case_infos_case_no.'/'.$user->case_infos_case_year.'</a>';
            })
            ->addColumn('action', function ($row) {
                $cpl = route('lawyer.litigation.case.show', $row->id);
                $bill = route('lawyer.account.billing');
                $edit = route('lawyer.litigation.case.edit', $row->id);
                $show = route('lawyer.litigation.case.show', $row->id);
                $delete = route('lawyer.litigation.case.delete', $row->id);
                $confirm = "return confirm('Are you sure you want to delete?')";
                $actionBtn='<div class="dropdown action_doc"><button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i> </button> <div class="dropdown-menu " aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="'.$show.'"><i class="fas fa-eye mr-2"></i></a><a class="dropdown-item" href="'.$cpl.'?cpl=true' .'"><i class="fas fa-calendar-alt mr-2"></i> </a><a class="dropdown-item" href="'.$bill.'?case_id='.$row->id. '"><i class="fas fa-calculator mr-2"></i> </a><a class="dropdown-item" href="'.$edit.'"><i class="fas fa-edit mr-2"></i></a><a class="dropdown-item" onClick="'.$confirm.'" href="'.$delete.'"><i class="fas fa-trash-alt mr-2"></i></a> </div></div>';
                return $actionBtn;
            })
            ->rawColumns(['is_bill','case_no','next_case_date','first_party','second_party','action'])
            ->make(true);
        }
        $title = 'High Court';
        return view('lawyer.litigation.high-court',compact('title'));
    }
    public function appellateCourt()
    {
        if(request()->type){
            session()->put('type',request()->type);
        }else{
            if(!request()->ajax()){
                session()->forget('type');
            }
        }
        if (request()->ajax()) {
            $user = Cases::where('case_class_id','Appellate')->orderBy('id', 'desc')->when(session()->has('type') && session()->get('type') == 'civil', function($q){
                 return $q->whereIn('case_category_id',[1,3]);
            })
            ->when(session()->has('type') && session()->get('type') == 'criminal', function($q){
                return $q->whereIn('case_category_id',[2,4]);
            })
            ->with('type', 'court', 'thana', 'nature', 'matter','client','status','clientDistrict','opponentDistrict','caseTitleShort')->whereLawyerId(auth()->guard('lawyer')->id());
            return DataTables::of($user)
            ->setRowId('{{$id}}')
            ->setRowAttr([
                'align' => 'center'
            ])
            ->addIndexColumn()
            ->addColumn('court_name_short', function ($user) {
                if($user->court){
                    return $user->court->name_short;
                }else{
                    return '';
                }
            })
            ->addColumn('nature_name', function ($user) {
                if($user->nature){
                    return $user->nature->name;
                }else{
                    return '';
                }
            })
            ->addColumn('matter_name', function ($user) {
                if($user->matter){
                    return $user->matter->name;
                }else{
                    return '';
                }
            })
            ->addColumn('thana_name', function ($user) {
                if($user->thana){
                    return $user->thana->thana_name;
                }else{
                    return '';
                }
            })
            ->addColumn('first_party', function ($user) {
                if($user->client_party_id==2){
                      $html = '<span>'.$user->opponent_info_name.'</span><br>';
                    if($user->opponent_party_others){
                      $html = '<span>1.'.$user->opponent_info_name.'</span><br>';
                       $others = explode(',',$user->opponent_party_others);
                       $i = 2;
                       foreach($others as $row){
                           $html .= '<span style="color:blue">'.$i++.'.'.$row.'</span><br>';
                       }
                   }
                }else{
                    $html = '<span style="color:blue">'.$user->client_party_name.'</span><br>';
                   if($user->client_party_others){
                    $html = '<span style="color:blue">1.'.$user->client_party_name.'</span><br>';
                       $others = explode(',',$user->client_party_others);
                       $i = 2;
                       foreach($others as $row){
                           $html .= '<span style="color:blue">'.$i++.'.'.$row.'</span><br>';
                       }
                   }
                }
                return $html;
            })
            ->addColumn('second_party', function ($user) {
               if($user->client_party_id==2){
                      $html = '<span style="color:blue">'.$user->client_party_name.'</span><br>';
                   if($user->client_party_others){
                      $html = '<span style="color:blue">1.'.$user->client_party_name.'</span><br>';
                       $others = explode(',',$user->client_party_others);
                       $i = 2;
                       foreach($others as $row){
                           $html .= '<span style="color:blue">'.$i++.'.'.$row.'</span><br>';
                       }
                   }
                }else{
                    $html = '<span>'.$user->opponent_info_name.'</span><br>';
                    if($user->opponent_party_others){
                    $html = '<span>1.'.$user->opponent_info_name.'</span><br>';
                       $others = explode(',',$user->opponent_party_others);
                       $i = 2;
                       foreach($others as $row){
                           $html .= '<span style="color:blue">'.$i++.'.'.$row.'</span><br>';
                       }
                   }
                }
                return $html;
            })
            ->addColumn('client_district_name', function ($user) {
                if($user->clientDistrict){
                    return $user->clientDistrict->district_name;
                }else{
                    return '';
                }
            })
            ->addColumn('opponent_district_name', function ($user) {
                if($user->opponentDistrict){
                    return $user->opponentDistrict->district_name;
                }else{
                    return '';
                }
            })
            ->addColumn('next_case_date', function ($user) {
                if($user->cpl()->latest('updated_next_date')->first()){
                    if($user->cpl()->latest('updated_next_date')->first()->updated_next_date < now()){
                        return '<span class="text-danger font-weight-bold">'.$user->cpl()->latest('updated_next_date')->first()->updated_next_date->format('d-m-Y').'</span>';
                    }else{
                        return '<span class="text-black font-weight-bold">'.$user->cpl()->latest('updated_next_date')->first()->updated_next_date->format('d-m-Y').'</span>';
                    }
                }else{
                    return '<span class="text-danger font-weight-bold">UPDD</span>';
                }
            })
             ->addColumn('next_fixed_for', function ($user) {
                if($user->cpl()->latest('updated_next_date')->first()){
                    if($user->cpl()->latest('updated_next_date')->first()->next_fixed_for()->first()){
                        return $user->cpl()->latest('updated_next_date')->first()->next_fixed_for()->first()->name;
                    }else{
                        return $user->cpl()->latest('updated_next_date')->first()->updated_index_fixed_for_write;
                    }
                }else{
                    return '';
                }
            })
            ->addColumn('law', function ($user) {
                    return '';
            })
            ->addColumn('lawyer', function ($user) {
                    return '';
            })
            ->addColumn('is_bill', function ($user) {
                $left = false;
                $due = false;
                if($user->cpl()->count()){
                    foreach($user->cpl()->get() as $cpl){
                        if($cpl->bills() && $cpl->bills()->count()){
                            foreach($cpl->bills()->get() as $bill){
                                if($bill->ledgers()->count()){
                                    $received = $bill->ledgers()->sum('paid_received_amount');
                                    if($bill->bill_amount > $received){
                                        $due = true;
                                    }
                                }else{
                                    $due = true;
                                }
                            }
                        }else{
                            $left=true;
                        }
                    }
                    if($left){
                        return '<i class="fa fa-times-circle" style="color:red"> B<i/>';
                    }else{
                        if($due){
                        return '<i class="fa fa-check" style="color:#1cc88a"> <span style="color:red">D<span/><i/>';
                        }else{
                        return '<i class="fa fa-check" style="color:#1cc88a"> P<i/>';
                        }
                    }
                }else{
                    return '<i class="fa fa-times-circle" style="color:red"> N<i/>';
                }
                
            })
            ->addColumn('case_no', function ($user) {
                $show = route('lawyer.litigation.case.show', $user->id);
                return '<a href="'.$show.'" target="_blank">'.$user->caseTitleShort->name_short.' '.$user->case_infos_case_no.'/'.$user->case_infos_case_year.'</a>';
            })
            ->addColumn('action', function ($row) {
                $cpl = route('lawyer.litigation.case.show', $row->id);
                $bill = route('lawyer.account.billing');
                $edit = route('lawyer.litigation.case.edit', $row->id);
                $show = route('lawyer.litigation.case.show', $row->id);
                $delete = route('lawyer.litigation.case.delete', $row->id);
                $confirm = "return confirm('Are you sure you want to delete?')";
                $actionBtn='<div class="dropdown action_doc"><button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i> </button> <div class="dropdown-menu " aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="'.$show.'"><i class="fas fa-eye mr-2"></i></a><a class="dropdown-item" href="'.$cpl.'?cpl=true' .'"><i class="fas fa-calendar-alt mr-2"></i> </a><a class="dropdown-item" href="'.$bill.'?case_id='.$row->id. '"><i class="fas fa-calculator mr-2"></i> </a><a class="dropdown-item" href="'.$edit.'"><i class="fas fa-edit mr-2"></i></a><a class="dropdown-item" onClick="'.$confirm.'" href="'.$delete.'"><i class="fas fa-trash-alt mr-2"></i></a> </div></div>';
                return $actionBtn;
            })
            ->rawColumns(['is_bill','case_no','next_case_date','first_party','second_party','action'])
            ->make(true);
        }
        $title = 'Appellate Court';
        return view('lawyer.litigation.appellate-court',compact('title'));
   }
   public function report()
   {
    if (request()->ajax()) {
        return DataTables::of(Cases::query())
        ->setRowClass('{{ $id % 2 == 0 ? "text-info" : "text-danger" }}')
        ->setRowId('{{$id}}')
        ->setRowAttr([
            'align' => 'center'
        ])
        ->make(true);
    }
    return view('lawyer.litigation.report');
}

public function getDistricts(Request $request)
{
    $districts =  District::where('division_id', $request->division_id)->oldest('district_name')->whereDeleteStatus(0)->get();
    return response()->json($districts);
}
public function getTypes(Request $request)
{
    $data['types'] =  CaseType::where('case_category_id', $request->case_category_id)->oldest('name')->whereStatus(1)->get();
    $data['matters'] =  CaseMatter::where('case_category_id', $request->case_category_id)->oldest('sort')->whereStatus(1)->get();
    $data['titles'] =  CaseTitle::where('case_category_id', $request->case_category_id)->oldest('name_short')->whereStatus(1)->get();
    return response()->json($data);
}
public function getCategories(Request $request)
{
    $categories =  CaseCategory::where('case_class', $request->case_class)->oldest('name')->whereStatus(1)->get();
    return response()->json($categories);
}
public function getThanas(Request $request)
{
    if($request->case_create){
        $name = District::find($request->district_id)->district_name;
    $data['thanas'] =  Thana::where('district_id', $request->district_id)->oldest('thana_name')->whereDeleteStatus(0)->get();
    $courts =  CaseCourt::whereCaseClass($request->case_class)->whereCaseCategoryId($request->case_category_id)->where('district_id', $name)->oldest('sort')->whereStatus(1)->get();
    $all_dist =  CaseCourt::whereCaseClass($request->case_class)->whereCaseCategoryId($request->case_category_id)->whereAllDistrict(1)->oldest('sort')->whereStatus(1)->get();
    $data['courts'] = $all_dist->merge($courts);
    return response()->json($data);
    }else{
        $thanas =  Thana::where('district_id', $request->district_id)->oldest('thana_name')->whereDeleteStatus(0)->get();
    return response()->json($thanas);
    }
    
}
public function getZones(Request $request)
{
    $zones = Zone::where('thana_id', $request->thana_id)->oldest('name')->whereStatus(1)->get();
    return response()->json($zones);
}
public function getAreas(Request $request)
{
    $areas = Area::where('zone_id', $request->zone_id)->oldest('name')->whereStatus(1)->get();
    return response()->json($areas);
}
public function getBranches(Request $request)
{
    $branches = Branch::where('area_id', $request->area_id)->oldest('name')->whereStatus(1)->get();
    return response()->json($branches);
}
public function getClientSubCategories(Request $request)
{
    $sub = ClientSubCategory::where('client_category_id', $request->client_category_id)->oldest('sort')->whereStatus(1)->get();
    return response()->json($sub);
}
public function getClients(Request $request)
{
    $clients = Client::whereLawyerId(auth()->guard('lawyer')->id())->where('subcategory_id', $request->subcategory_id)->oldest('name')->whereStatus(1)->get();
    return response()->json($clients);
}
public function getSingleClients(Request $request)
{
    $client = Client::with('representatives')->findOrFail($request->id);
    return response()->json($client);
}

public function getRepresentClients(Request $request)
{
    $client = ClientRepresentative::findOrFail($request->id);
    return response()->json($client);
}

public function getChamberLawyer(Request $request)
{
    $data['lawyer'] =  Hr::where('chember_name_id',$request->chamber_id)->where('is_lawyer',1)->get();
    $data['nonlawyer'] =  Hr::where('chember_name_id',$request->chamber_id)->where('is_lawyer',0)->get();
    $data['clerk_phone'] =  $data['nonlawyer']->first();
    return response()->json($data);
}

public function getContactNumber(Request $request)
{
    $data =  Hr::find($request->clerk_id);
    return response()->json($data);
}

// get chamber
public function getChamber(Request $request)
{
    $data =  Hr::where('chember_name_id',$request->getChamber)->get();
    return response()->json($data);
}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $case_categories = CaseCategory::whereStatus(1)->get();
        $case_matters = CaseMatter::whereStatus(1)->oldest('sort')->get();
        $case_natures = CaseNature::whereStatus(1)->get();
        $case_prayers = CasePrayer::whereStatus(1)->get();
        $case_courts = CaseCourt::whereStatus(1)->get();
        $case_statuses = CaseStatus::whereStatus(1)->get();
        $disposed_statuses = DisposedStatus::whereStatus(1)->get();
        $disposed_bies = DisposedBy::whereStatus(1)->get();
        $disposed_evidences = DisposedEvidence::whereStatus(1)->get();
        $evidence_types = EvidenceType::whereStatus(1)->get();
        $document_names = DocumentName::whereStatus(1)->get();
        $case_types = CaseType::whereStatus(1)->get();
        $case_titles = CaseTitle::whereStatus(1)->get();
        $case_laws = CaseLaw::whereStatus(1)->get();
        $case_sections = CaseSection::whereStatus(1)->get();
        $divisions = Division::whereDeleteStatus(0)->oldest('division_name')->get();
        $behalfs = ClientBehalf::whereStatus(1)->get();
        $client_categories = ClientCategory::whereStatus(1)->get();
        $zones = Zone::whereStatus(1)->get();
        $clients = Client::whereLawyerId(auth()->guard('lawyer')->id())->whereStatus(1)->oldest('name')->get();
        $advocates = Hr::whereHas('role',function($q){
            return $q->where('name','Advocate');
        })->whereLawyerId(auth()->guard('lawyer')->id())->whereStatus(1)->oldest('personal_name')->get();
        $clerks = Hr::whereHas('role',function($q){
            return $q->where('name','Clerk');
        })->whereLawyerId(auth()->guard('lawyer')->id())->whereStatus(1)->oldest('personal_name')->get();
        
        $chambers = Chamber::whereUserId(auth()->guard('lawyer')->id())->get();
        
        $case_documents = CaseDocument::all();
        $case_document_types = CaseDocumentType::all();
        
        
        return view('lawyer.litigation.create', compact('case_documents','case_document_types','document_names','case_categories', 'case_matters', 'case_natures', 'case_prayers', 'case_courts', 'case_statuses', 'disposed_statuses', 'disposed_bies', 'disposed_evidences', 'evidence_types', 'case_types', 'case_titles', 'case_laws', 'case_sections', 'divisions', 'behalfs', 'client_categories', 'zones','clients','advocates','clerks','chambers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['section_id'] = json_encode($request->section_id);
        $data['case_infos_case_title_sort_id'] = $request->case_infos_case_title_id;
        $data['court_short_id'] = $request->court_id;
        $case = Cases::create($data);
        if($case->client_representative_party_name){
        CaseClient::create([
            'cases_id'=>$case->id,
            'representative_id'=>$case->client_representative_party_name,
            'lawyer_id'=>auth()->guard('lawyer')->id(),
            ]);
        }
        $notification = array('messege' => "Case Added Successfully", 'alert-type' => 'success');
        return redirect()->route('lawyer.litigation.all')->with($notification);
    }
    
    
    // Cases Activity
    public function activityLog(Request $request,$id)
    {
        $user = CaseActivity::query()->whereCasesId($id)->latest();

        if (request()->ajax()) {
            return DataTables::of($user)
            ->setRowId('{{$id}}')
            ->setRowAttr([
                'align' => 'center'
            ])
            ->addIndexColumn()
            ->addColumn('activity_date', function ($user){
                if($user->activity_date==null)
                {
                    return '';
                }else{
                    return $user->activity_date->format('d-m-Y');
                }
            })
            ->addColumn('activity_mode_id', function ($user){
                if($user->activity_mode_id==1)
                {
                    return 'Email';
                }else{
                    return 'Hard Copy';
                }
            })
            ->addColumn('activity_engaged_id', function ($user){
                if($user->activity_engaged_id==1)
                {
                    return 'Md. Johirul Islam';
                }else{
                    return 'Md. Niamul Kabir';
                }
            })
            ->addColumn('activity_forwarded_to_id', function ($user){
                if($user->activity_forwarded_to_id==1)
                {
                    return 'Md. Johirul Islam';
                }else{
                    return 'Md. Niamul Kabir';
                }
            })
            ->addColumn('action', function ($row) {
                $edit = route('lawyer.litigation.case.activity.edit', $row->id);
                $bill = route('lawyer.account.billing-create');
                $confirm = "return confirm('Are you sure you want to delete?')";
                $show = route('lawyer.litigation.case.activity.show', $row->id);
                $delete = route('lawyer.litigation.case.activity.delete', $row->id);
                $actionBtn='<div class="dropdown action_doc"><button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i> </button> <div class="dropdown-menu " aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="'.$show.'"><i class="fas fa-eye mr-2"></i></a><a class="dropdown-item" href="'.$bill.'?cpl_id='.$row->id. '"><i class="fas fa-calculator mr-2"></i> </a><a class="dropdown-item" href="'.$edit.'"><i class="fas fa-edit mr-2"></i></a><a class="dropdown-item" onClick="'.$confirm.'" href="'.$delete.'"><i class="fas fa-trash-alt mr-2"></i></a> </div></div>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }
    
    public function activityStore(Request $request)
    {
        $data = $request->all();
        $start = \Carbon\Carbon::parse($request->start_time);
        $end = \Carbon\Carbon::parse($request->end_time);
        $totalHours = $start->diffInHours($end);
        $totalMinutes = $start->diffInMinutes($end) % 60;
        $data['setup_hours'] = $totalHours . ' Hours '.$totalMinutes.' Minutes';
        CaseActivity::create($data);
        $notification = array('messege' => "Case Activity Updated Successfully", 'alert-type' => 'success');
        return back()->with($notification);
    }
    
    
    public function activityEdit($id)
    {
        $activity = CaseActivity::findOrFail($id);
        return view('lawyer.litigation.case-activity-update',compact('activity'));
    }
    
    public function activityShow($id)
    {
        $activity = CaseActivity::findOrFail($id);
        return view('lawyer.litigation.case-activity-show',compact('activity'));
    }
    
    
    public function activityUpdate(Request $request,$id)
    {

        $data = CaseActivity::findOrFail($id);
        $update = $request->all();
        $start = \Carbon\Carbon::parse($request->start_time);
        $end = \Carbon\Carbon::parse($request->end_time);
        $totalHours = $start->diffInHours($end);
        $totalMinutes = $start->diffInMinutes($end) % 60;
        $update['setup_hours'] = $totalHours . ' Hours '.$totalMinutes.' Minutes';
        $data->update($update);
        $notification = array('messege' => "Case Activity Updated Successfully", 'alert-type' => 'success');
        return redirect()->route('lawyer.litigation.case.show',[$data->cases_id,'activity'=>'true'])->with($notification);
    }
    
    
    public function activityDelete($id)
    {
        $activity = CaseActivity::findOrFail($id);
        $activity->delete();
        $notification = array('messege' => "Case Activity Log Deleted Successfully", 'alert-type' => 'success');
        return back()->with($notification);
    }
    
    // Acitivity End

    public function proceeding(Request $request,$id)
    {
        $user = CaseProceeding::query()->with('fixed_for','status','next_fixed_for','proceeding','order','note','presence','lawyer','bill')->whereLawyerId(auth()->guard('lawyer')->id())->whereCasesId($id)->latest('updated_order_date');
        session()->put('total_cpl',$user->count());
        
        $first_id = $user->first()?->id;

        if (request()->ajax()) {
            return DataTables::of($user)
            ->setRowId('{{$id}}')
            ->setRowAttr([
                'align' => 'center'
            ])
            ->addIndexColumn()
            ->addColumn('sl_no', function ($user) {
                static $i = 1;
                return $i++;
            })
            ->addColumn('updated_order_date', function ($user) {
                if($user->updated_order_date){
                    return $user->updated_order_date->format('d-m-Y');
                }else{
                    return '';
                }
                
            })
            ->addColumn('is_bill', function ($user) {
                if($user->bills()->count()){
                    return '<i class="fa fa-check" style="color:#1cc88a"> <i/>';
                }else{
                    return '<i class="fa fa-times-circle" style="color:red"> <i/>';
                }
                
            })
            ->addColumn('fixed_for_name', function ($user) {
                if($user->fixed_for){
                    if($user->updated_fixed_for_write)
                    {
                        return $user->fixed_for->name.'. '.$user->updated_fixed_for_write;
                        
                    }else{
                        
                        return $user->fixed_for->name;
                    }
                }else{
                    return $user->updated_fixed_for_write;
                }
            })
            ->addColumn('proceeding_name', function ($user) {
                if($user->proceeding){
                    if($user->court_proceedings_write)
                    {
                        return $user->proceeding->name.'. '.$user->court_proceedings_write;
                    }else{
                        return $user->proceeding->name;
                    }
                }else{
                    return $user->court_proceedings_write;
                }
            })
            ->addColumn('next_fixed_for_name', function ($user) {
                if($user->next_fixed_for){
                    if($user->updated_index_fixed_for_write){
                        return $user->next_fixed_for->name.'. '.$user->updated_index_fixed_for_write;
                    }else{
                        return $user->next_fixed_for->name;
                    }
                }else{
                    return $user->updated_index_fixed_for_write;
                }
            })
            ->addColumn('note_name', function ($user) {
                if($user->note){
                    if($user->updated_day_notes_write)
                    {
                        return $user->note->name.'. '.$user->updated_day_notes_write;
                    }else{
                        return $user->note->name;
                    }
                }else{
                    return $user->updated_day_notes_write;
                }
            })
            ->addColumn('order_name', function ($user) {
                if($user->order){
                    if($user->updated_court_order_write)
                    {
                        return $user->order->name.'. '.$user->updated_court_order_write;
                    }else{
                        return $user->order->name;
                    }
                }else{
                    return $user->updated_court_order_write;
                }
            })
            ->addColumn('lawyer_personal_name', function ($user) {
                if($user->lawyer){
                    return $user->lawyer->personal_name;
                }else{
                    return '';
                }
            })
            ->addColumn('updated_next_date', function ($user) use($first_id) {
                
                if($user->updated_next_date){
                    
                if($first_id == $user->id){
                    if($user->updated_next_date){
                        if($user->updated_next_date < now()){
                            return '<span class="text-danger font-weight-bold">'.$user->updated_next_date->format('d-m-Y').'</span>';
                        }else{
                            return '<span class="text-black">'.$user->updated_next_date->format('d-m-Y').'</span>';
                        }
                    }else{
                        return '<span class="text-danger font-weight-bold">NOT UPD</span>';
                    }
                }else{
                    return '<span class="text-black">'.$user->updated_next_date->format('d-m-Y').'</span>';
                }
                }else{
                    return '<span class="text-danger font-weight-bold">NOT UPD</span>';
                }
            })
            ->addColumn('updated_at', function ($user) {
                return $user->updated_at." (".$user->lawyer?->name.")";
            })
            ->addColumn('action', function ($row) {
                $edit = route('lawyer.litigation.case.proceeding.edit', $row->id);
                $bill = route('lawyer.account.billing-create');
                    $confirm = "return confirm('Are you sure you want to delete?')";
                $show = route('lawyer.litigation.case.proceeding.show', $row->id);
                $delete = route('lawyer.litigation.case.proceeding.delete', $row->id);
                if($row->bill){
                    $actionBtn='<div class="dropdown action_doc"><button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i> </button> <div class="dropdown-menu " aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="'.$show.'"><i class="fas fa-eye mr-2"></i></a><a class="dropdown-item" href="'.$edit.'"><i class="fas fa-edit mr-2"></i></a><a class="dropdown-item" onClick="'.$confirm.'" href="'.$delete.'"><i class="fas fa-trash-alt mr-2"></i></a> </div></div>';
                }else{
                    $actionBtn='<div class="dropdown action_doc"><button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i> </button> <div class="dropdown-menu " aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="'.$show.'"><i class="fas fa-eye mr-2"></i></a><a class="dropdown-item" href="'.$bill.'?cpl_id='.$row->id. '"><i class="fas fa-calculator mr-2"></i> </a><a class="dropdown-item" href="'.$edit.'"><i class="fas fa-edit mr-2"></i></a><a class="dropdown-item" onClick="'.$confirm.'" href="'.$delete.'"><i class="fas fa-trash-alt mr-2"></i></a> </div></div>';
                }
                return $actionBtn;
            })
            ->rawColumns(['is_bill','action','updated_next_date'])
            ->make(true);
        }
    }
    public function proceedingEdit($id)
    {
        $log = CaseProceeding::findOrFail($id);
        $cpl_status = CplStatus::whereStatus(1)->latest()->get();
        $lawyers = Hr::whereLawyerId(auth()->guard('lawyer')->id())->where('is_lawyer',1)->get();
        $fixed_for = FixedFor::whereStatus(1)->get();
        $court_proceedings = CourtProceeding::whereStatus(1)->get();
        $court_orders = CourtOrder::whereStatus(1)->get();
        $day_notes = DayNote::whereStatus(1)->get();
        $next_day_presence = NextDayPresence::whereStatus(1)->get();
        $cases = Cases::findOrFail($log->cases_id);
        return view('lawyer.litigation.edit_log',compact('log','cpl_status','lawyers','fixed_for','court_proceedings','court_orders','day_notes','next_day_presence','cases'));
    }
    public function proceedingUpdate(Request $request,$id)
    {
        $log = CaseProceeding::findOrFail($id);
        $log->update($request->all());
        $data=['next_case_date' =>$request->updated_next_date,'case_progress_status'=>$log->status->name];
        if($request->updated_index_fixed_for_id){
            $data['next_date_fixed_for']=$log->next_fixed_for->name;
        }else{
            $data['next_date_fixed_for']=$request->updated_index_fixed_for_write;
        }
        
        Cases::findOrFail($log->cases_id)->update($data);
        $notification = array('messege' => "Case Proceeding Updated Successfully", 'alert-type' => 'success');
        return redirect('lawyer/case/show/'.$log->cases_id.'?cpl=true')->with($notification);
    }
    public function proceedingStore(Request $request)
    {
        $log = CaseProceeding::create($request->all());
        $data=['next_case_date' =>$request->updated_next_date,'case_progress_status'=>$log->status->name];
        if($request->updated_index_fixed_for_id){
            $data['next_date_fixed_for']=$log->next_fixed_for->name;
        }else{
            $data['next_date_fixed_for']=$request->updated_index_fixed_for_write;
        }
        
        Cases::findOrFail($request->cases_id)->update($data);
        $notification = array('messege' => "Case Proceeding Updated Successfully", 'alert-type' => 'success');
        return back()->with($notification);
    }
    
    public function billStore(Request $request)
    {

        Bill::create($request->all());

        $notification = array('messege' => "Bill Updated Successfully", 'alert-type' => 'success');
        return back()->with($notification);
    }
    
    public function billStoreCpl(Request $request)
    {
        
        $data['bills'] = CaseProceeding::with('order','proceeding')->where('cases_id',$request->case_id)->where('updated_order_date','like','%'.$request->bill_date.'%')->first();
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function show(Cases $cases)
    {
        $to = Carbon::parse($cases->case_filing_date);
        $from = Carbon::now();
        $diff_in_days = $to->diffInDays($from);
        $cpl_status = CplStatus::whereStatus(1)->latest()->get();
        $lawyers = Hr::whereLawyerId(auth()->guard('lawyer')->id())->where('is_lawyer',1)->get();
        $fixed_for = FixedFor::whereStatus(1)->get();
        $court_proceedings = CourtProceeding::whereStatus(1)->get();
        $court_orders = CourtOrder::whereStatus(1)->get();
        $day_notes = DayNote::whereStatus(1)->get();
        $next_day_presence = NextDayPresence::whereStatus(1)->get();
        return view('lawyer.litigation.show',compact('cases','cpl_status','diff_in_days','lawyers','fixed_for','court_proceedings','court_orders','day_notes','next_day_presence'));
    }
    public function proceedingShow($id)
    {
    
        $log = CaseProceeding::findOrFail($id);
        $cpl_status = CplStatus::whereStatus(1)->latest()->get();
        $lawyers = Hr::whereLawyerId(auth()->guard('lawyer')->id())->where('is_lawyer',1)->get();
        $fixed_for = FixedFor::whereStatus(1)->get();
        $court_proceedings = CourtProceeding::whereStatus(1)->get();
        $court_orders = CourtOrder::whereStatus(1)->get();
        $day_notes = DayNote::whereStatus(1)->get();
        $next_day_presence = NextDayPresence::whereStatus(1)->get();
        $cases = Cases::findOrFail($log->cases_id);
        return view('lawyer.litigation.case-proceeding-show',compact('log','cpl_status','lawyers','fixed_for','court_proceedings','court_orders','day_notes','next_day_presence','cases'));
        
        // return view('lawyer.litigation.show',compact('cases','cpl_status','diff_in_days','lawyers','fixed_for','court_proceedings','court_orders','day_notes','next_day_presence'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function edit(Cases $cases)
    {
        
        $case_categories = CaseCategory::whereStatus(1)->get();
        $case_matters = CaseMatter::whereStatus(1)->get();
        $case_natures = CaseNature::whereStatus(1)->get();
        $case_prayers = CasePrayer::whereStatus(1)->get();
        $case_courts = CaseCourt::whereStatus(1)->get();
        $case_statuses = CaseStatus::whereStatus(1)->get();
        $disposed_statuses = DisposedStatus::whereStatus(1)->get();
        $disposed_bies = DisposedBy::whereStatus(1)->get();
        $disposed_evidences = DisposedEvidence::whereStatus(1)->get();
        $evidence_types = EvidenceType::whereStatus(1)->get();
        $case_types = CaseType::whereStatus(1)->get();
        $case_titles = CaseTitle::whereStatus(1)->get();
        $case_laws = CaseLaw::whereStatus(1)->get();
        $case_sections = CaseSection::whereStatus(1)->get();
        $divisions = Division::whereDeleteStatus(0)->oldest('division_name')->get();
        $districts = District::whereDeleteStatus(0)->oldest('district_name')->get();
        $thanas = Thana::whereDeleteStatus(0)->oldest('thana_name')->get();
        $behalfs = ClientBehalf::whereStatus(1)->get();
        $client_categories = ClientCategory::whereStatus(1)->get();
        $client_subcategories = ClientSubCategory::whereStatus(1)->get();
        $zones = Zone::whereStatus(1)->oldest('name')->get();
        $clients = Client::whereLawyerId(auth()->guard('lawyer')->id())->whereStatus(1)->oldest('name')->get();
        $advocates = Hr::whereHas('role',function($q){
            return $q->where('name','Advocate');
        })->whereLawyerId(auth()->guard('lawyer')->id())->whereStatus(1)->oldest('personal_name')->get();
        $clerks = Hr::whereHas('role',function($q){
            return $q->where('name','Clerk');
        })->whereLawyerId(auth()->guard('lawyer')->id())->whereStatus(1)->oldest('personal_name')->get();
        $chambers = Chamber::whereUserId(auth()->guard('lawyer')->id())->get();
        $lawyers = Hr::whereLawyerId(auth()->guard('lawyer')->id())->get();
         $to = Carbon::parse($cases->case_filing_date);
        $from = Carbon::now();
        $diff_in_days = $to->diffInDays($from);
        
        $case_documents = CaseDocument::all();
        $case_document_types = CaseDocumentType::all();
        
        return view('lawyer.litigation.edit', compact('case_documents','case_document_types','diff_in_days','lawyers','chambers','cases', 'case_categories', 'case_matters', 'case_natures', 'case_prayers', 'case_courts', 'case_statuses', 'disposed_statuses', 'disposed_bies', 'disposed_evidences', 'evidence_types', 'case_types', 'case_titles', 'case_laws', 'case_sections', 'divisions','districts','thanas', 'behalfs', 'client_categories','client_subcategories', 'zones','clients','advocates','clerks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cases $cases)
    {
        
        $data = $request->except('new_case_infos_case_title_id','new_law_id','new_section_id','new_case_infos_case_no','new_case_infos_case_year','new_case_filing_date','new_court_id');
        $data['case_infos_case_title_sort_id'] = $request->case_infos_case_title_id;
        $data['court_short_id'] = $request->court_id;
        
        if($request->new_case_infos_case_title_id){
	        $subsequent = new CaseSubsequent();
	        $subsequent->cases_id = $cases->id;
	    	$subsequent->case_infos_case_title_id  = $cases->case_infos_case_title_id;
	    	$subsequent->law_id  = $cases->law_id;
	    	$subsequent->section_id  = $cases->section_id;
	    	$subsequent->case_infos_case_no  = $cases->case_infos_case_no;
	    	$subsequent->case_infos_case_year  = $cases->case_infos_case_year;
	    	$subsequent->case_filing_date  = $cases->case_filing_date;
	    	$subsequent->court_id  = $cases->court_id;
	    	$subsequent->save();
	    	$data['case_infos_case_title_id'] = $request->new_case_infos_case_title_id;
	    	$data['case_infos_case_title_sort_id'] = $request->new_case_infos_case_title_id;
	    	    if($request->new_law_id){
                    $data['law_id'] = $request->new_law_id;
                }
                if($request->new_section_id){
                    $data['section_id'] = $request->new_section_id;
                }
                if($request->new_case_infos_case_no){
                    $data['case_infos_case_no'] = $request->new_case_infos_case_no;
                }
                if($request->new_case_infos_case_year){
                    $data['case_infos_case_year'] = $request->new_case_infos_case_year;
                }
                if($request->new_case_filing_date){
                    $data['case_filing_date'] = $request->new_case_filing_date;
                }
                if($request->new_court_id){
                    $data['court_id'] = $request->new_court_id;
                    $data['court_short_id'] = $request->new_court_id;
                }
		}
        
        $cases->update($data);
        
        $check = CaseClient::whereCasesId($cases->id)->whereLawyerId(auth()->guard('lawyer')->id())->where('representative_id',$request->client_representative_party_name)->first();
        if(!$check){
            if($request->client_representative_party_name){
                
            CaseClient::create([
            'cases_id'=>$cases->id,
            'representative_id'=>$cases->client_representative_party_name,
            'lawyer_id'=>auth()->guard('lawyer')->id(),
            ]);
            
            }
        }
        $notification = array('messege' => "Case Updated Successfully", 'alert-type' => 'success');
        return redirect()->route('lawyer.litigation.case.show',$cases->id)->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cases $cases)
    {
        $cases->delete();
        $notification = array('messege' => "Case Deleted Successfully", 'alert-type' => 'success');
        return back()->with($notification);
    }
    
    public function proceedingDelete($id)
    {
        $log = CaseProceeding::findOrFail($id);
        $log->delete();
        $notification = array('messege' => "Case Proceeding Log Deleted Successfully", 'alert-type' => 'success');
        return back()->with($notification);
    }
}
