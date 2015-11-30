<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSystemRequest;
use App\System;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systems = System::all();
        return view('/admin/systems', compact('systems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateSystemRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSystemRequest $request)
    {
        System::create($request->all());
        return redirect('/admin/systems'); // TODO: Add this view
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {    
        $system = System::find($id);
        if(is_null($system)){
            abort(404);
        }
        //return $system;
        return view('/admin/systemShow', compact('system'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function getSytemIinfo($id){
        $system = System::find(1);
        $query = "SELECT [meas].param_id, [meas].time, [meas].value, [param].param_name, [param].param_unit, [limit].ad_limit, [limit].ad_day_limit  FROM [meas] LEFT JOIN [param] on meas.param_id = [param].param_id LEFT JOIN [limit] on meas.param_id = [limit].param_id";
        
    }
}
