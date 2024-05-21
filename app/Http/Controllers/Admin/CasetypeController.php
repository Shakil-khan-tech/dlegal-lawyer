<?php

namespace App\Http\Controllers\admin;

use App\CaseCategory;
use App\CaseClasses;
use App\CaseType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NotificationText;

class CasetypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CaseType::with('caseCategory','caseClass')->get();
        return view('admin.casetype.index',compact('data'));
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
         return view('admin.casetype.create',compact('case','casecategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CaseType::create($request->all());

        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','create')->first()->custom_lang;
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.case-type.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = CaseType::findOrFail($id);
        $case=CaseClasses::where('status',1)->latest()->get();
        $casecategory=CaseCategory::where('status',1)->latest()->get();
         return view('admin.casetype.view',compact('data','case','casecategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = CaseType::findOrFail($id);
        $case=CaseClasses::where('status',1)->latest()->get();
        $casecategory=CaseCategory::where('status',1)->latest()->get();
         return view('admin.casetype.edit',compact('data','case','casecategory'));
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
        
        $data = CaseType::findOrFail($id);
        $input = $request->all();
        $data->update($input);

        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','update')->first()->custom_lang;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return redirect()->route('admin.case-type.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = CaseType::findOrFail($id);
        $data->delete();

        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','delete')->first()->custom_lang;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return redirect()->back()->with($notification);
    }
    public function changeStatus($id){
        $class=CaseType::find($id);
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
