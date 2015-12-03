<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSystemRequest;
use App\System;
use Illuminate\Http\Request;

use File;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FilesController extends Controller {

	public function index($id){
		$systems = System::all();
		$system = System::find($id);
		return view('admin/systemView', compact('systems','system'));
	}
}