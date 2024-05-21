<?php

namespace App\Http\Controllers\admin;

use App\CaseCategory;
use App\CaseClasses;
use App\CaseCourt;
use App\District;
use App\Division;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NotificationText;

use function Ramsey\Uuid\v1;

class CourtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CaseCourt::with('caseCategory','caseClass','districtName','allDistrict')->get();
        return view('admin.casecourt.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $case=CaseClasses::where('status',1)->latest()->get();
        $casecategory=CaseCategory::where('status',1)->latest()->get();
         $district = District::where('delete_status',0)->oldest('district_name')->get();
         return view('admin.casecourt.create',compact('case','casecategory','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CaseCourt::create($request->all());
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','create')->first()->custom_lang;
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.court.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = CaseCourt::findOrFail($id);
        $case=CaseClasses::where('status',1)->latest()->get();
        $casecategory=CaseCategory::where('status',1)->latest()->get();
         $district = District::where('delete_status',0)->latest()->get();
         return view('admin.casecourt.view',compact('data','case','casecategory','district'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = CaseCourt::findOrFail($id);
        $case=CaseClasses::where('status',1)->latest()->get();
        $casecategory=CaseCategory::where('status',1)->latest()->get();
         $district = District::where('delete_status',0)->latest()->get();
         return view('admin.casecourt.edit',compact('data','case','casecategory','district'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = CaseCourt::findOrFail($id);
        $input = $request->all();
        $data->update($input);
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','update')->first()->custom_lang;
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.court.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = CaseCourt::findOrFail($id);
        $data->delete();
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','delete')->first()->custom_lang;
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function changeStatus($id){
        $class=CaseCourt::find($id);
        if($class->status==1){
            $class->status=0;
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','inactive')->first()->custom_lang;
            $message=$notification;
        }else{
            $class->status=1;
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','active')->first()->custom_lang;
            $message=$notification;
        }
        $class->save();
        return response()->json($message);

    }
}
