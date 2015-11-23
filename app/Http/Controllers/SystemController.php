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
        //fetch the sytem from db which has the appropriate id
        //and pass it info as param to the view togethere with all the 
        //current measurements and statuses of it related records in 
        //states and measurments tables. 
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
}
