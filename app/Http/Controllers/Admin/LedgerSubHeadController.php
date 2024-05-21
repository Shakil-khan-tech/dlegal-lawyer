<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\LedgerHead;
use App\LedgerSubHead;
use Illuminate\Http\Request;
use App\NotificationText;

class LedgerSubHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = LedgerSubHead::with('ledgerHead')->get();
        return view('admin.ledger_sub_head.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ledger = LedgerHead::where('status',1)->latest()->get();
        return view('admin.ledger_sub_head.create',compact('ledger'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LedgerSubHead::create($request->all());
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','create')->first()->custom_lang;
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.ledger-sub-head.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = LedgerSubHead::findOrFail($id);
        $ledger = LedgerHead::where('status',1)->latest()->get();
        return view('admin.ledger_sub_head.view',compact('data','ledger'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = LedgerSubHead::findOrFail($id);
        $ledger = LedgerHead::where('status',1)->latest()->get();
        return view('admin.ledger_sub_head.edit',compact('data','ledger'));
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
        $data = LedgerSubHead::findOrFail($id);
        $input = $request->all();
        $data->update($input);
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','update')->first()->custom_lang;
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.ledger-sub-head.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = LedgerSubHead::findOrFail($id);
        $data->delete();
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','delete')->first()->custom_lang;
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function changeStatus($id){
        $class=LedgerSubHead::find($id);
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
