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
        if (request()->ajax()) {
            return DataTables::of(Cases::query())
            ->setRowClass('{{ $id % 2 == 0 ? "text-info" : "text-danger" }}')
            ->setRowId('{{$id}}')
            ->setRowAttr([
                'align' => 'center'
            ])
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
        LegalService::create($request->all());
        return back();
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
