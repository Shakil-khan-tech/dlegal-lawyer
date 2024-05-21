<?php

namespace App\Http\Controllers\Lawyer;
use App\Cases;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Role;
use App\Hr;
use App\Chamber;

class HrLawyerController extends Controller
{
    
    public function all()
    {
        if (request()->ajax()) {
            return DataTables::of(Hr::query()->with('role')->whereLawyerId(auth()->guard('lawyer')->id()))
            ->setRowClass('{{ $id % 2 == 0 ? "text-info" : "text-danger" }}')
            ->setRowId('{{$id}}')
            ->setRowAttr([
                'align' => 'center'
            ])
            ->addColumn('entry_position', function ($row) {
                if($row->entry_position){
                    return 'Internal';
                }else{
                    return 'External';
                }
            })
            ->addColumn('action', function ($row) {
                $edit = route('lawyer.hrlawyer.edit', $row->id);
                $show = route('lawyer.hrlawyer.show', $row->id);
                $delete = route('lawyer.hrlawyer.delete', $row->id);
               $confirm = "return confirm('Are you sure you want to delete?')";
				$actionBtn = '<div class="dropdown action_doc"><button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i> </button> <div class="dropdown-menu " aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="'.$show.'"><i class="fas fa-eye mr-2"></i></a><a class="dropdown-item" href="'.$edit.'"><i class="fas fa-edit mr-2"></i></a><a style="cursor:pointer" onclick="check('.$row->id.')" class="dropdown-item delete-'.$row->id.'" data-href="'.$delete.'"><i class="fas fa-trash-alt mr-2"></i></a> </div></div>';
				return $actionBtn;
            })
             ->rawColumns(['action'])
            ->make(true);
        }
        $title = 'List of all HR Lawyer';
        return view('lawyer.hrlawyer.all',compact('title'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create HR Lawyer';
        $roles = Role::whereLawyerId(auth()->guard('lawyer')->id())->get();
        $chambers = Chamber::all();
        //dd($chambers);
        return view('lawyer.hrlawyer.create',compact('title','roles','chambers'));
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //Hr::create(request()->all());
        
        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/lawyer-images'), $imageName);
             $data['image'] =  $imageName;
        }
        
        Hr::create($data);
        
		$notification=array('messege'=>"Hr Lawyer Added Successfully",'alert-type'=>'success');
		return redirect()->route('lawyer.hrlawyer.all')->with($notification);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'View HR Lawyer';
        $data = Hr::find($id);
        $roles = Role::whereLawyerId(auth()->guard('lawyer')->id())->get();
        $chambers = Chamber::all();
        return view('lawyer.hrlawyer.show',compact('title','data','roles','chambers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $title = 'Edit HR Lawyer';
        $data = Hr::find($id);
        $roles = Role::whereLawyerId(auth()->guard('lawyer')->id())->get();
        $chambers = Chamber::all();
        return view('lawyer.hrlawyer.edit',compact('title','data','roles','chambers'));
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
        // $data = Hr::find($id);
        // $data->update(request()->all());
        
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/lawyer-images'), $imageName);
             $data['image'] =  $imageName;
        }
        Hr::find($id)->update($data);
        
		$notification=array('messege'=>"Hr Lawyer Updated Successfully",'alert-type'=>'success');
		return redirect()->route('lawyer.hrlawyer.all')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $data = Hr::find($id);
        $data->delete();
        $notification = array('messege' => "HR Lawyer Deleted Successfully", 'alert-type' => 'success');
        return back()->with($notification);
    }
    
    // Non Lawyer
    public function allNonLawyer()
    {
        if (request()->ajax()) {
            return DataTables::of(Hr::query()->where('is_lawyer',0)->with('role')->whereLawyerId(auth()->guard('lawyer')->id()))
            ->setRowClass('{{ $id % 2 == 0 ? "text-info" : "text-danger" }}')
            ->setRowId('{{$id}}')
            ->setRowAttr([
                'align' => 'center'
            ])
            
            ->addColumn('action', function ($row) {
                $edit = route('lawyer.hrnonlawyer.edit', $row->id);
                $show = route('lawyer.hrnonlawyer.show', $row->id);
                $delete = route('lawyer.hrnonlawyer.delete', $row->id);
                $confirm = "return confirm('Are you sure you want to delete?')";
				$actionBtn = '<div class="dropdown action_doc"><button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i> </button> <div class="dropdown-menu " aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="'.$show.'"><i class="fas fa-eye mr-2"></i></a><a class="dropdown-item" href="'.$edit.'"><i class="fas fa-edit mr-2"></i></a><a onclick="check('.$row->id.')" class="dropdown-item delete-'.$row->id.'" data-href="'.$delete.'" style="cursor:pointer"><i class="fas fa-trash-alt mr-2"></i></a> </div></div>';
				return $actionBtn;
            })
             ->rawColumns(['action'])
            ->make(true);
        }
        $title = 'List of all HR Non Lawyer';
        return view('lawyer.hrlawyer.non-lawyer.all',compact('title'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createNonLawyer()
    {
        $title = 'Create HR Non Lawyer';
        $roles = Role::whereLawyerId(auth()->guard('lawyer')->id())->get();
        $chambers = Chamber::all();
        //dd($chambers);
        return view('lawyer.hrlawyer.non-lawyer.create',compact('title','roles','chambers'));
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeNonLawyer(Request $request)
    {
        //dd($request->all());
        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/lawyer-images'), $imageName);
             $data['image'] =  $imageName;
        }
        
        Hr::create($data);
        
		$notification=array('messege'=>"Hr Non Lawyer Added Successfully",'alert-type'=>'success');
		return redirect()->route('lawyer.hrnonlawyer.all')->with($notification);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function showNonLawyer($id)
    {
        $title = 'View HR Non Lawyer';
        $data = Hr::find($id);
        $roles = Role::whereLawyerId(auth()->guard('lawyer')->id())->get();
        $chambers = Chamber::all();
        return view('lawyer.hrlawyer.non-lawyer.show',compact('title','data','roles','chambers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function editNonLawyer( $id)
    {
        $title = 'Edit HR Non Lawyer';
        $data = Hr::find($id);
        $roles = Role::whereLawyerId(auth()->guard('lawyer')->id())->get();
        $chambers = Chamber::all();
        return view('lawyer.hrlawyer.non-lawyer.edit',compact('title','data','roles','chambers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function updateNonLawyer(Request $request,  $id)
    {

        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/lawyer-images'), $imageName);
             $data['image'] =  $imageName;
        }
        Hr::find($id)->update($data);
		$notification=array('messege'=>"Hr Non Lawyer Updated Successfully",'alert-type'=>'success');
		return redirect()->route('lawyer.hrnonlawyer.all')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function destroyNonLawyer( $id)
    {
        $data = Hr::find($id);
        $data->delete();
        $notification = array('messege' => "HR Non Lawyer Deleted Successfully", 'alert-type' => 'success');
        return back()->with($notification);
    }
}