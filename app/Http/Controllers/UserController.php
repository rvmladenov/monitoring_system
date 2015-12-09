<?php

namespace App\Http\Controllers;
use App\User;
use App\System;
use PDO;
use Crypt;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users = User::all();
        foreach ($users as $key => $user) {
            self::getSytemIinfo($user->id);
        }
        return view('/admin/users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $systems = System::all();
        return \View::make('/admin/forms/addUser',  compact('systems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\StoreUserRequest $request)
    {
        $user = new User;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->admin = $request->admin;        
        $user->save();
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $systems = System::all();
        $user = User::find($id);
       /* echo "<pre>".$system['name'];
        print_r($system);
        echo "</pre>";*/
        return \View::make('/admin/forms/editUser',  compact('user', 'systems'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\UpdateUserRequest $request)
    {
        
        $user = User::find($request->id);
        $user->username = $request->username;
        $user->name = $request->name;        
        if(($request->passwordNew != '') && ($request->passwordRepeat == $request->passwordNew)){
            $user->password = bcrypt($request->passwordNew);
        }
        $user->admin = $request->admin;             
        $user->save();
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);        
        $user->delete();
        return redirect('/admin');
    }
}
