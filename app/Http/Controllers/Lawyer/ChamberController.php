<?php

namespace App\Http\Controllers\Lawyer;
use App\Chamber;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Image;
use File;
use Hash;

class ChamberController extends Controller
{
    
    public function all()
    {
        if (request()->ajax()) {
            return DataTables::of(Chamber::query())
            ->setRowClass('{{ $id % 2 == 0 ? "text-info" : "text-danger" }}')
            ->setRowId('{{$id}}')
            ->setRowAttr([
                'align' => 'center'
            ])
            
            ->addColumn('status',function($row){
                if($row->status==1){
                   $actionBtn = 'Active';
                    return $actionBtn;
                }else{
                     $actionBtn = 'DeActive';
                    return $actionBtn;
                }
                
            })
            ->rawColumns(['status'])
            
            ->addColumn('action', function ($row) {
                $edit = route('lawyer.chamber.edit', $row->id);
                $show = route('lawyer.chamber.show', $row->id);
                $delete = route('lawyer.chamber.delete', $row->id);
              $confirm = "return confirm('Are you sure you want to delete?')";
				$actionBtn = '<div class="dropdown action_doc"><button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i> </button> <div class="dropdown-menu " aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="'.$show.'"><i class="fas fa-eye mr-2"></i></a><a class="dropdown-item" href="'.$edit.'"><i class="fas fa-edit mr-2"></i></a><a style="cursor:pointer" onclick="check('.$row->id.')" class="dropdown-item delete-'.$row->id.'" data-href="'.$delete.'"><i class="fas fa-trash-alt mr-2"></i></a> </div></div>';
				return $actionBtn;
            })
             ->rawColumns(['action'])
            ->make(true);
        }
        $title = 'All Chamber List';
        return view('lawyer.chamber.all',compact('title'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Chamber';
        return view('lawyer.chamber.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $data = new Chamber;
        // $data->ch_name = $request->ch_name;
        // $data->ch_telephone = $request->ch_telephone;
        // $data->ch_mobile_one = $request->ch_mobile_one;
        // $data->ch_mobile_two = $request->ch_mobile_two;
        // $data->ch_email_one = $request->ch_email_one;
        // $data->ch_email_two = $request->ch_email_two;
        // $data->ch_main_office_address = $request->ch_main_office_address;
        // $data->ch_office_one_address = $request->ch_office_one_address;
        // $data->ch_office_two_address = $request->ch_office_two_address;
        // $data->ch_person_type = $request->ch_person_type;
        // $data->ch_letter_write_up_one = $request->ch_letter_write_up_one;
        // $data->ch_letter_address_one = $request->ch_letter_address_one;
        // $data->ch_letter_write_up_two = $request->ch_letter_write_up_two;
        // $data->ch_letter_address_two = $request->ch_letter_address_two;
        // $data->ch_status = $request->ch_status;
        // $data->status = $request->status;
        // $data->user_id = $request->lawyer_id;
        
        $data = $request->all();
        

        if ($request->hasFile('ch_logo')) {
            $image = $request->file('ch_logo');
            $imageName = uniqid().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/chamber-images'), $imageName);
            $data['ch_logo'] =  $imageName;
        }
        
        if ($request->hasFile('ch_person_signature')) {
            $image = $request->file('ch_person_signature');
            $imageName = uniqid().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/chamber-images'), $imageName);
            $data['ch_person_signature'] = $imageName;
        }
        
        $data['user_id'] = $request->lawyer_id;
        
        Chamber::create($data);
            
        $notification = array('messege' => "Chamber Added Successfully", 'alert-type' => 'success');
        return redirect()->route('lawyer.chamber.all')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Chamber::find($id);
        $title = 'Show Chamber';
        //dd($data);
        return view('lawyer.chamber.show',compact('title','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $data = Chamber::find($id);
        $title = 'Update Chamber';
        return view('lawyer.chamber.edit',compact('title','data'));
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
        //dd($request->all());
        //Chamber::create($request->all());
        
       
        // $data->ch_name = $request->ch_name;
        // $data->ch_telephone = $request->ch_telephone;
        // $data->ch_mobile_one = $request->ch_mobile_one;
        // $data->ch_mobile_two = $request->ch_mobile_two;
        // $data->ch_email_one = $request->ch_email_one;
        // $data->ch_email_two = $request->ch_email_two;
        // $data->ch_main_office_address = $request->ch_main_office_address;
        // $data->ch_office_one_address = $request->ch_office_one_address;
        // $data->ch_office_two_address = $request->ch_office_two_address;
        // $data->ch_person_type = $request->ch_person_type;
        //  $data->ch_letter_write_up_one = $request->ch_letter_write_up_one;
        // $data->ch_letter_address_one = $request->ch_letter_address_one;
        // $data->ch_letter_write_up_two = $request->ch_letter_write_up_two;
        // $data->ch_letter_address_two = $request->ch_letter_address_two;
        // $data->ch_status = $request->ch_status;
        // $data->status = $request->status;
        // $data->user_id = $request->lawyer_id;
        
        //dd($data);
        
        
        
        // if ($request->hasFile('ch_logo')) {
            
        //     $old_image= $request->old_image;
        //     if($old_image)
        //     {
        //         File::delete('/public/uploads/chamber-images/' . $old_image);
        //     }
        //     $image = $request->file('ch_logo');
        //     $imageName = uniqid().time().'.'.$image->getClientOriginalExtension();
        //     $image->move(public_path('uploads/chamber-images'), $imageName);
        //     $data->ch_logo =  $imageName;
        // }
        
        // if ($request->hasFile('ch_person_signature')) {
        //     $old_image1= $request->old_image1;
        //     if($old_image1)
        //     {
        //         File::delete('/public/uploads/chamber-images/' . $old_image1);
        //     }
        //     $image = $request->file('ch_person_signature');
        //     $imageName = uniqid().time().'.'.$image->getClientOriginalExtension();
        //     $image->move(public_path('uploads/chamber-images'), $imageName);
        //     $data->ch_person_signature = $imageName;
        // }
        
        
         $data = Chamber::find($id);
         $update = $request->all();
         
         if ($request->hasFile('ch_logo')) {
            $image = $request->file('ch_logo');
            $imageName = uniqid().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/chamber-images'), $imageName);
            $update['ch_logo'] =  $imageName;
        }
        
        if ($request->hasFile('ch_person_signature')) {
            $image = $request->file('ch_person_signature');
            $imageName = uniqid().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/chamber-images'), $imageName);
            $update['ch_person_signature'] = $imageName;
        }
        
        $update['user_id'] = $request->lawyer_id;
        
        $data->update($update);
            
        $notification = array('messege' => "Chamber Updated Successfully", 'alert-type' => 'success');
        return redirect()->route('lawyer.chamber.all')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $data = Chamber::find($id);
        // $image_path = asset('uploads/chamber-images/').$data->ch_logo;
        // if(file_exists($image_path)){
        //     unlink($image_path);
        // }
        
        // $image_path1 = asset('uploads/chamber-images/').$data->ch_person_signature;
        // if(file_exists($image_path1)){
        //     unlink($image_path1);
        // }
        
        $data->delete();
        
        $notification = array('messege' => "Chamber Deleted Successfully", 'alert-type' => 'success');
        return back()->with($notification);
    }
}