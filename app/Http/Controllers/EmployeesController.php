<?php

namespace App\Http\Controllers;

use App\Companies;
use App\Employees;
use App\Http\Requests\Employees as RequestsEmployees;
use Illuminate\Http\Request;
use PDF;


class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employees::with(['get_company'])->paginate(5);  
        return view('employees.index',compact('employees'));
    }

    public function print()
    {
        $employees = Employees::with(['get_company'])->paginate(5);  
        $pdf = PDF::loadview('employees.print',compact(
            'employees',
        ));

        return $pdf->download('Employees');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $get_company = Companies::all()->pluck('nama', 'id')->prepend(trans('Pilih Kategori'), '');
        return view('employees.create', compact('get_company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsEmployees $request)
    {
        Employees::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'company' => $request->company,
        ]);
        $request->session()->flash('status','Employees Inserted Successfully');
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employees = Employees::find($id);
        return view('employees.show',compact('employees')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = Employees::find($id);
        $companies = Companies::all()->pluck('nama', 'id')->prepend(trans('Pilih Kategori'), '');
        $employees->load('get_company');
        return view('employees.edit', compact('companies', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsEmployees $request, $id)
    {
        $employees  = Employees::find($id);
        $employees->nama = $request->input('nama');
        $employees->email = $request->input('email');
        $employees->company = $request->input('company');
        $employees->save();
        $request->session()->flash('status','Employees Update Successfully');

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employees = Employees::find($id);
        $employees->delete();
        session()->flash('status', 'Employees Deleted Successfully');
        return redirect('employees');
    }
}
