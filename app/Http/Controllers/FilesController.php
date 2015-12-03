<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSystemRequest;
use App\System;
use Illuminate\Http\Request;

use File;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FilesController extends Controller {

	public function index(){
		$systems = System::all(); 
		$files = File::allFiles('autoReports');
		$fileDetails=[];
		foreach ($files as $key => $file) {
			$fileDetails['filePath'] =  $file;
			$fileDetails['fileName'] =  File::name($file);
			$fileDetails['fileSize'] =  File::size($file);
			$fileDetails['fileDate'] =  File::lastModified($file);
			$files[$key] = $fileDetails;
		}
		return view('admin/files',compact('files', 'systems'));
	}
}