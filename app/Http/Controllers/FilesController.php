<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSystemRequest;
use App\System;
use Illuminate\Http\Request;
use HTML;
use File;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FilesController extends Controller {
	const ROOT = 'autoReports';

	public function index(){
		$systems = System::all(); 
		$files = self::buildFS(self::ROOT);
		$directories = self::buildDS(self::ROOT);		
		return view('admin/files',compact('files', 'directories', 'systems'));
	}

	public function show($directory){		
		$systems = System::all(); 
		$files = self::buildFS(str_replace('-','\\', $directory));
		$directories = self::buildDS(str_replace('-','\\', $directory));
		return view('admin/filesys/directory', compact('files', 'directories', 'systems'));
	}

	private function buildFS($directory){
		$files = File::files($directory);
		$fileDetails=[];
		foreach ($files as $key => $file) {
			$fileDetails['filePath'] =  $file;
			$fileDetails['fileName'] =  File::name($file);
			$fileDetails['fileSize'] =  File::size($file);
			$fileDetails['fileDate'] =  File::lastModified($file);
			$files[$key] = $fileDetails;
		}
		return $files;
	}

	private function buildDS($directory){
		$directories = File::directories($directory);
		foreach ($directories as $key => $directoryPath) {
			$directoryName = str_replace($directory."\\", '', $directoryPath);
			$directories[$key] = ['name' => $directoryName, 'path' => str_replace('\\', '-', $directoryPath)];
		}
		return $directories;
	}
}