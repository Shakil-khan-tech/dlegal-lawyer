<?php

namespace App\Http\Controllers\Lawyer;
use App\Cases;
use App\Http\Controllers\Controller;
use App\LegalService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LegalServiceController extends Controller
{

    public function all()
    {

        // dd(LegalService::all());
        if (request()->ajax()) {
            return DataTables::of(LegalService::query())
            ->setRowClass('{{ $id % 2 == 0 ? "text-info" : "text-danger" }}')
            ->setRowId('{{$id}}')
            ->setRowAttr([
                'align' => 'center'
            ])
            ->addColumn('action', function ($row) {
                $edit = route('lawyer.legalservice.all', $row->id);
                $show = route('lawyer.legalservice.all', $row->id);
                $delete = route('lawyer.legalservice.all', $row->id);
                $confirm = "return confirm('Are you sure you want to delete?')";
                $actionBtn='<div class="dropdown action_doc"><button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i> </button> <div class="dropdown-menu " aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="'.$show.'"><i class="fas fa-eye mr-2"></i></a><a class="dropdown-item" href="'.$edit.'"><i class="fas fa-edit mr-2"></i></a><a class="dropdown-item" onClick="'.$confirm.'" href="'.$delete.'"><i class="fas fa-trash-alt mr-2"></i></a> </div></div>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        $title = 'All Legal Services';
        return view('lawyer.legal.all',compact('title'));
    }
    public function general()
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
        $title = 'General Legal Services';
        return view('lawyer.legal.all',compact('title'));
    }
    public function license()
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
        $title = 'License & Registration';
        return view('lawyer.legal.all',compact('title'));
    }
    public function tax()
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
        $title = 'Income Tax';
        return view('lawyer.legal.all',compact('title'));
    }
    public function vat()
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
        $title = 'Value Added Tax (VAT)';
        return view('lawyer.legal.all',compact('title'));
    }
    public function intellectual()
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
        $title = 'Intellectual Property Rights';
        return view('lawyer.legal.all',compact('title'));
    }
    public function dispute()
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
        $title = 'Alternative Dispute Resulation';
        return view('lawyer.legal.all',compact('title'));
    }
    public function research()
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
        $title = 'Legal Research & Analysis';
        return view('lawyer.legal.all',compact('title'));
    }
    public function visit()
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
        $title = 'Visit, Training, Development';
        return view('lawyer.legal.all',compact('title'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lawyer.legal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Schema::create('legal_services', function (Blueprint $table) {
        //     $table->id();
        //     foreach (request()->except('_token') as $key => $value) {
        //     $table->text($key)->nullable();
        //     }
        //     $table->timestamps();
        // });
        LegalService::create($request->all());
        $notification = array('messege' => "Service Added Successfully", 'alert-type' => 'success');
        return redirect()->route('lawyer.legalservice.all')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
    }
}
