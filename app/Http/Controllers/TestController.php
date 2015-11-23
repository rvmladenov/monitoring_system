<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSystemRequest;
use App\System;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index(){
    	//here we could test the dynamic connection with other databases 
    	//$systems = System::all();    	
    	//foreach ($systems as $system) {} 
    	return '<p>loop through the systems<br>get the data <br> populate it in the MySQL database<br>perform compare of the states and the values with their limits<br>return json of what shuold be updated in the view.</p>'; 
    }
}
