<?php

namespace App\Http\Controllers\Lawyer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Role;
use App\Hr;

class HrController extends Controller
{

	public function index()
	{
		if (request()->ajax()) {
			return DataTables::of(Hr::query()->with('role')->whereLawyerId(auth()->guard('lawyer')->id()))
			->setRowId('{{$id}}')
			->setRowAttr([
				'align' => 'center'
			])
			->addColumn('action', function ($row) {
				$edit = route('lawyer.hr.edit', $row->id);
				$show = route('lawyer.hr.show', $row->id);
				$delete = route('lawyer.hr.delete', $row->id);
				$actionBtn = '<a href="' . $show . '" class="btn btn-info btn-sm">View</a> <a href="' . $edit . '" class="edit btn btn-success btn-sm">Edit</a> <a href="' . $delete . '" class="delete btn btn-danger btn-sm">Delete</a>';
				return $actionBtn;
			})
			->rawColumns(['action'])
			->make(true);
		}
		return view('lawyer.hr.index');
	}

	public function create()
	{
		$roles = Role::whereLawyerId(auth()->guard('lawyer')->id())->get();
		return view('lawyer.hr.create',compact('roles'));
	}
	public function store()
	{
		Hr::create(request()->all());
		$notification=array('messege'=>"HR Added Successfully",'alert-type'=>'success');
		return redirect()->route('lawyer.hr.index')->with($notification);
	}

	public function show($id){
		$hr = Hr::find($id);
		$roles = Role::whereLawyerId(auth()->guard('lawyer')->id())->get();
		return view('lawyer.hr.edit', compact('hr', 'roles'));
	}
	public function edit($id){
		$hr = Hr::find($id);
		$roles = Role::whereLawyerId(auth()->guard('lawyer')->id())->get();
		return view('lawyer.hr.edit', compact('hr', 'roles'));
	}

	public function update($id)
	{
		Hr::findOrFail($id)->update(request()->all());
		$notification=array('messege'=>"HR Updated Successfully",'alert-type'=>'success');
		return redirect()->route('lawyer.hr.index')->with($notification);
	}

	public function destroy($id){
		$hr = Hr::findOrFail($id);
		$notification=array('messege'=>"Sorry,Already This Hr Attached with The Cases",'alert-type'=>'error');
		return redirect()->route('lawyer.hr.index')->with($notification);
	}


	public function roles()
	{
		if (request()->ajax()) {
			return DataTables::of(Role::query())
			->setRowId('{{$id}}')
			->setRowAttr([
				'align' => 'center'
			])
			->addColumn('action', function($row){
				$edit = route('lawyer.role.edit', $row->id);
				$delete = route('lawyer.role.delete', $row->id);
				if($row->name == 'Advocate' || $row->name == 'Clerk'){
					$actionBtn = '';
				}else{
					$actionBtn = '<a href="' . $edit . '" class="edit btn btn-success btn-sm">Edit</a> <a href="' . $delete . '" class="delete btn btn-danger btn-sm">Delete</a>';
				}
				return $actionBtn;
			})
			->rawColumns(['action'])
			->make(true);
		}
		return view('lawyer.role.all');
	}
	public function roleCreate()
	{
		return view('lawyer.role.create');
	}
	
	public function roleStore()
	{

		$data  = Role::create(request()->all());
		$notification=array('messege'=>"HR Roles Added Successfully",'alert-type'=>'success');
		return redirect()->route('lawyer.role.all')->with($notification);
	}


	public function roleEdit($id)
	{
		$role =Role::findOrFail($id);
		return view('lawyer.role.edit',compact('role'));
	}
	
	public function roleDestroy($id)
	{
		$role =Role::with('hrs')->findOrFail($id);
		$role->delete();
		$notification=array('messege'=>"Hr Rolw Already Delete Successfully !!!",'alert-type'=>'success');
// 		if($role->hrs->count() > 0){
// 			$notification=array('messege'=>"Hr Already Exist With This Role",'alert-type'=>'error');
// 			return back()->with($notification)->withInput();
// 		}
// 		return view('lawyer.role.all',compact('role'));
        
        return back()->with($notification)->withInput();
	}
	public function roleUpdate($id)
	{
		$role =Role::findOrFail($id);
		if(Role::where('id','!=',$id)->whereLawyerId(request()->lawyer_id)->whereName(request()->name)->first()){
			$notification=array('messege'=>"Role Already Exist",'alert-type'=>'error');
			return back()->with($notification)->withInput();
		}
		$role->update(request()->all());
		$notification=array('messege'=>"Role Updated Successfully",'alert-type'=>'success');
		return redirect()->route('lawyer.role.all')->with($notification);
	}
}