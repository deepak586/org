<?php

namespace App\Http\Controllers;

use App\employee;
use App\company;
use View;
use Validator;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $employeeList = DB::table('employees')

        ->join('companies', 'companies.id', '=', 'employees.company_id')

        ->select('employees.*', 'companies.name')

        ->simplePaginate(10);
        
       

        // load the view and pass the companyList
        return View::make('employee.index')
            ->with('employeeList',$employeeList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $companyList = company::all()->toArray();
        $companyOptions=array();
        if(!empty($companyList)){
            foreach($companyList as $cl){
                $companyOptions[$cl['id']] = $cl['name'];
            }
        }
        //echo "<pre>";print_r($companyList->toArray());die;

        return View::make('employee.create')->with('options',$companyOptions);
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
            'First_name'       => 'required',
            'Last_name'       => 'required',
            'email'      => 'required|email',
            'phone'      => 'required',
            'company_id'      => 'required',
            
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('employee/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $comp = new employee;
            $comp->First_name       = $request->input('First_name');
            $comp->Last_name       = $request->input('Last_name');
            $comp->email      = $request->input('email');
            $comp->phone = $request->input('phone');
            $comp->company_id = $request->input('company_id');
            
            $comp->save();

            // redirect
            Session::flash('message', 'Successfully created employee!');
            return Redirect::to('employee');
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
  
        $empDetails = DB::table('employees')

        ->join('companies', 'companies.id', '=', 'employees.company_id')

        ->select('employees.*', 'companies.name')
        ->where('employees.id','=',$id)
        ->get()->toArray();  
        //echo "<pre>";print_r($empDetails);    die;    
        return View::make('employee.show')
            ->with('empDetails', $empDetails[0]);
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
            $empData = employee::find($id);
            $companyList = company::all()->toArray();
            $companyOptions=array();
            if(!empty($companyList)){
                foreach($companyList as $cl){
                    $companyOptions[$cl['id']] = $cl['name'];
                }
            }

          return View::make('employee.edit')
              ->with('empData', $empData)->with('options', $companyOptions);
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
        //die('ll');

        $rules = array(
            'First_name'       => 'required',
            'Last_name'       => 'required',
            'email'      => 'required|email',
            'phone'      => 'required',
            'company_id'      => 'required',
            
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('employee/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
           $emp = employee::find($id);
            $emp->First_name       = $request->input('First_name');
            $emp->Last_name       = $request->input('Last_name');
            $emp->email      = $request->input('email');
            $emp->phone = $request->input('phone');
            $emp->company_id = $request->input('company_id');
            
            $emp->save();

            // redirect
            Session::flash('message', 'Successfully updated employee!');
            return Redirect::to('employee');
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
