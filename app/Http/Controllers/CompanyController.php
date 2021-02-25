<?php

namespace App\Http\Controllers;

use App\company;
use View;
use Validator;
use Session;
use Redirect;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyList = company::paginate(10);
       // echo "<pre>";print_r( $companyList);die;
        // load the view and pass the companyList
        return View::make('company.index')
            ->with('companyList', $companyList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('company.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('company/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            if($files=$request->file('logo')){  
                $name=$files->getClientOriginalName();  
                $files->move('images',$name);  
                //$data->path=$name;  
            }
            $comp = new company;
            $comp->name       = $request->input('name');
            $comp->email      = $request->input('email');
            $comp->website = $request->input('website');
            $comp->logo = $name;
            $comp->gst = $request->input('gst');
            $comp->save();

            // redirect
            Session::flash('message', 'Successfully created company!');
            return Redirect::to('company');
        }
    }

  

    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
  
    public function show($id)
    {
        // get the shark
        $companyDetails = company::find($id);

        // show the view and pass the shark to it
        return View::make('company.show')
            ->with('companyDetails', $companyDetails);
    }  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
          // get the company
          $companyData = company::find($id);

          return View::make('company.edit')
              ->with('companyData', $companyData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('company/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $comp = company::find($id);
            $comp->name       = $request->input('name');
            $comp->email      = $request->input('email');
            $comp->website = $request->input('website');
            $comp->logo = $request->input('logo');
            $comp->gst = $request->input('gst');
            $comp->save();

            // redirect
            Session::flash('message', 'Successfully updated');
            return Redirect::to('company');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(company $company)
    {
        //
    }
}
