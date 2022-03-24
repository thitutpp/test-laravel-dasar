<?php

namespace App\Http\Controllers;

use App\Companies;
use App\Http\Requests\Companies as RequestsCompanies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = companies::orderBy('id','desc')->paginate(5);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsCompanies $request)
    {
        $logo='noimg.png';
        
        if($request->logo){
            $logo = date('mdYHis').uniqid().'.'.$request->logo->extension();
            $request->logo->move(storage_path('app/company'),$logo);	
        }

        $companies = new Companies();
        $companies->nama = $request->nama;
        $companies->email = $request->email;
        $companies->website = $request->website;
        $companies->logo = $logo;
        $companies->save();
        $request->session()->flash('status','Companies Inserted Successfully');
        return redirect('companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companies = Companies::find($id);
        return view('companies.show')->with('companies',$companies) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Companies::find($id);
        return view('companies.edit')->with('companies',$companies) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'website' => 'required|url',
            ]);

        $companies = Companies::find($id);

        if($request->logo){
            $request->validate([
                'logo' => 'required|image|mimes:png|dimensions:min_width="100px",min_height="100px"',
        ]);  

        if($companies->logo != 'noimg.png'){

          $oldImg =$companies->logo;
          unlink(storage_path('app/company').'/'.$oldImg);

          $imgName = $request->logo;
        }

        $imgName = date('mdYHis').uniqid().'.'.$request->logo->extension();
        $request->logo->move(storage_path('app/company'), $imgName); 
        
    }
    else{
        $imgName = $companies->logo;
    }
        $companies->nama = $request->nama;
        $companies->email = $request->email;
        $companies->website = $request->website;
        $companies->logo =  $imgName;
        $companies->save();
        $request->session()->flash('status','Companies Updated Successfully');
        return redirect('companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companies = Companies::find($id);
        if($companies ->logo !='noimg.png'){ 
            $oldImg =$companies->logo;
            unlink(public_path('logo').'/'.$oldImg); 
        }
        $companies->delete();
        session()->flash('status', 'Companies Deleted Successfully');
        return redirect('companies');
    }
}
