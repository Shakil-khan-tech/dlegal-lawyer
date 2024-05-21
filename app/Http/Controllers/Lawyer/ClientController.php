<?php

namespace App\Http\Controllers\Lawyer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Client;
use App\ClientEngagement;
use App\ClientRepresentative;

class ClientController extends Controller
{

	public function index()
	{
		if (request()->ajax()) {
			return DataTables::of(Client::query()->where('client_class_id',1)->whereLawyerId(auth()->guard('lawyer')->id()))
			->setRowId('{{$id}}')
			->setRowAttr([
				'align' => 'center'
			])
			->addIndexColumn()
			->addColumn('action', function ($row) {
				$edit = route('lawyer.client.edit', $row->id);
				$show = route('lawyer.client.show', $row->id);
				$delete = route('lawyer.client.delete', $row->id);
				$confirm = "return confirm('Are you sure you want to delete?')";
				$actionBtn = '<div class="dropdown action_doc"><button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i> </button> <div class="dropdown-menu " aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="'.$show.'"><i class="fas fa-eye mr-2"></i></a><a class="dropdown-item" href="'.$edit.'"><i class="fas fa-edit mr-2"></i></a><a class="dropdown-item" onClick="'.$confirm.'" href="'.$delete.'"><i class="fas fa-trash-alt mr-2"></i></a> </div></div>';
				return $actionBtn;
			})
			->rawColumns(['action'])
			->make(true);
		}
		return view('lawyer.client.index');
	}

	public function create()
	{
		return view('lawyer.client.create');
	}
	public function store(Request $request)
	{
		
		$client = Client::create(request()->except('engagement_from','engagement_to','engagement_document','engagement_note','representative_name','representative_address','whatsapp_two','representative_mobile','representative_email'));
		if(count($request->representative_name)){
		foreach($request->representative_name as $key=>$value){
		        $representative = new ClientRepresentative();
		        $representative->client_id = $client->id;
		    	$representative->representative_name  = $value;
		    	$representative->representative_address  = $request->representative_address[$key];
		    	$representative->whatsapp_two  = $request->whatsapp_two[$key];
		    	$representative->representative_mobile  = $request->representative_mobile[$key];
		    	$representative->representative_email  = $request->representative_email[$key];
		    	$representative->save();
		}
		}
		
		$engagement = new ClientEngagement();
		$engagement->engagement_from  = $request->engagement_from;
		$engagement->engagement_to  = $request->engagement_to;
		$engagement->engagement_note  = $request->engagement_note;
		 if ($request->hasFile('engagement_document')) {
            $image = $request->file('engagement_document');
            $imageName = uniqid().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/client'), $imageName);
            $engagement->engagement_document  = $imageName;
        }
        $engagement->client_id = $client->id;
		$engagement->save();
		
		$notification=array('messege'=>"Client Added Successfully",'alert-type'=>'success');
		return redirect()->route('lawyer.client.index')->with($notification);
	}
	public function edit($id){
		$client = Client::find($id);
		$clientEngagement = ClientEngagement::where('client_id',$client->id)->get();
		return view('lawyer.client.edit', compact('client','clientEngagement'));
	}
		public function show($id){
		$client = Client::find($id);
		$clientEngagement = ClientEngagement::where('client_id',$client->id)->get();
        return view('lawyer.client.show', compact('client','clientEngagement'));
	}
	public function update(Request $request,$id){
	    
		$client = Client::findOrFail($id);
		$client->update(request()->except('engagement_id','engagement_from','engagement_to','engagement_document','engagement_note','engagement_note','representative_name','representative_address','whatsapp_two','representative_mobile','representative_email','old_representative_name','old_representative_address','old_whatsapp_two','old_representative_mobile','old_representative_email','old_id'));
		
		if($request->old_representative_name && count($request->old_representative_name)){
		    
    		foreach($request->old_representative_name as $key=>$value){
    		        $representative = ClientRepresentative::findOrFail($request->old_id[$key]);
    		    	$representative->representative_name  = $value;
    		    	$representative->representative_address  = $request->old_representative_address[$key];
    		    	$representative->whatsapp_two  = $request->old_whatsapp_two[$key];
    		    	$representative->representative_mobile  = $request->old_representative_mobile[$key];
    		    	$representative->representative_email  = $request->old_representative_email[$key];
    		    	$representative->save();
    		}
		}
		
		if($request->representative_name && count($request->representative_name)){
		
		foreach($request->representative_name as $key=>$value){
		        $representative = new ClientRepresentative();
		        $representative->client_id = $client->id;
		    	$representative->representative_name  = $value;
		    	$representative->representative_address  = $request->representative_address[$key];
		    	$representative->whatsapp_two  = $request->whatsapp_two[$key];
		    	$representative->representative_mobile  = $request->representative_mobile[$key];
		    	$representative->representative_email  = $request->representative_email[$key];
		    	$representative->save();
		}
		}
		
		if($request->engagement_id){
		    
		foreach($request->engagement_id as $id){

    		$engagement = ClientEngagement::findOrFail($id);
    		$engagement->engagement_from  = $request->engagement_from[$id];
    		$engagement->engagement_to  = $request->engagement_to[$id];
    		$engagement->engagement_note  = $request->engagement_note[$id];
    		
    		 
		    if ($request->engagement_document && $request->engagement_document[$id]) {
		        $image = $request->engagement_document[$id];
                $imageName = uniqid().time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads/client'), $imageName);
                $engagement->engagement_document  = $imageName;
               
		    }
    		$engagement->save();
		
		}
		}
		
		$notification=array('messege'=>"Client Updated Successfully",'alert-type'=>'success');
		return redirect()->route('lawyer.client.index')->with($notification);
	}
	public function destroy($id){
		$client = Client::findOrFail($id)->delete();
		$notification=array('messege'=>"Client Deleted Successfully",'alert-type'=>'success');
		return redirect()->route('lawyer.client.index')->with($notification);
	}
	
// 	Client Persons
    
    public function person_index()
	{
		if (request()->ajax()) {
			return DataTables::of(Client::query()->where('client_class_id',2)->whereLawyerId(auth()->guard('lawyer')->id()))
			->setRowId('{{$id}}')
			->setRowAttr([
				'align' => 'center'
			])
			->addIndexColumn()
			->addColumn('action', function ($row) {
				$edit = route('lawyer.client.edit', $row->id);
				$show = route('lawyer.client.show', $row->id);
				$delete = route('lawyer.client.delete', $row->id);
				$confirm = "return confirm('Are you sure you want to delete?')";
				$actionBtn = '<div class="dropdown action_doc"><button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i> </button> <div class="dropdown-menu " aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="'.$show.'"><i class="fas fa-eye mr-2"></i></a><a class="dropdown-item" href="'.$edit.'"><i class="fas fa-edit mr-2"></i></a><a class="dropdown-item" onClick="'.$confirm.'" href="'.$delete.'"><i class="fas fa-trash-alt mr-2"></i></a> </div></div>';
				return $actionBtn;
			})
			->rawColumns(['action'])
			->make(true);
		}
		return view('lawyer.client.person.index');
	}
	

	public function person_create()
	{
		return view('lawyer.client.person.create');
	}
	public function person_store( Request $request)
	{
// 		$client = Client::create(request()->all());
		
// 		if($request->representative_name){
// 		foreach($request->representative_name as $key=>$value){
		        $representative = new ClientRepresentative();
		        $representative->client_id = $client->id;
		    	$representative->representative_name  = $request->representative_name;
		    	$representative->representative_address  = $request->representative_address;
		    	$representative->whatsapp_two  = $request->whatsapp_two;
		    	$representative->representative_mobile  = $request->representative_mobile;
		    	$representative->representative_email  = $request->representative_email;
		    	$representative->save();
// 		}
// 		}
		
		$notification=array('messege'=>"Client Added Successfully",'alert-type'=>'success');
		return redirect()->route('lawyer.client.person.index')->with($notification);
	}
	public function person_edit($id){
		$client = Client::find($id);
		return view('lawyer.client.person.edit', compact('client'));
	}
	public function person_show($id){
		$client = Client::find($id);
		return view('lawyer.client.person.edit', compact('client'));
	}
	public function person_update(Request $request,$id){
	    
		$client = Client::findOrFail($id);
		$client->update(request()->all());
		
		if($request->representative_name){
		$representative = ClientRepresentative::whereClientId($client->id)->first();
		if(!$representative){
		$representative = new ClientRepresentative;
		}
        $representative->client_id = $client->id;
    	$representative->representative_name  = $request->representative_name;
    	$representative->representative_address  = $request->representative_address;
    	$representative->whatsapp_two  = $request->whatsapp_two;
    	$representative->representative_mobile  = $request->representative_mobile;
    	$representative->representative_email  = $request->representative_email;
    	$representative->save();
		}
	
		$notification=array('messege'=>"Client Updated Successfully",'alert-type'=>'success');
		return redirect()->route('lawyer.client.person.index')->with($notification);
	}
	public function person_destroy($id){
		$client = Client::findOrFail($id)->delete();
		$notification=array('messege'=>"Client Deleted Successfully",'alert-type'=>'success');
		return redirect()->route('lawyer.client.person.index')->with($notification);
	}
	
	
	
}