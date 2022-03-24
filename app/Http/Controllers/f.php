<?php

namespace App\Http\Controllers;

use App\companies;
use Illuminate\Http\Request;
use Redirect;

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
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'logo' => 'required|image|mimes:png|dimensions:min_width="100px",min_height="100px"',
            'website' => 'required|url',
            ]);

            $input = $request->all();

            if ($image = $request->file('logo')) {
                $destinationPath = 'logo/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['logo'] = "$profileImage";
            }
    
            companies::create($input);
    
            return redirect()->route('companies.index')
    
                            ->with('success','Product created successfully.');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(companies $companies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(Comp $companies)
    {
        // $where = array('id' => $id);
        // $companies = companies::where($where)->first();
        // return view('companies.edit',compact('companies'));

        return view('companies.edit',compact('companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, companies $companies)
    {
        $request->validate([

            'name' => 'required',

            'detail' => 'required',

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

  

        $input = $request->all();

  

        if ($image = $request->file('logo')) {

            $destinationPath = 'logo/';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $input['logo'] = "$profileImage";

        }

    

        companies::create($input);

     

        return redirect()->route('products.index')

                        ->with('success','Product created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy(companies $companies)
    {
        //
    }
}
