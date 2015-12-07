<?php

namespace App\Http\Controllers;

use App\System;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as AuthFacade;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(AuthFacade::check())
        {
            $systems = System::all();

            return view('admin.administration', compact('systems'));
        }
        return view('home.index');
    }
}
