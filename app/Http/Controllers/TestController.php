<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSystemRequest;
use App\System;
use Illuminate\Http\Request;

use PDO;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index(){
    	//test the dynamic connection with other databases seems successfull
    	$systems = System::all();
    	$res = [];
    	foreach ($systems as $system) {
    		$query = "SELECT [meas].param_id, [meas].time, [meas].value, [param].param_name, [param].param_unit, [limit].ad_limit, [limit].ad_day_limit  FROM [meas] LEFT JOIN [param] on meas.param_id = [param].param_id LEFT JOIN [limit] on meas.param_id = [limit].param_id";

			if($system['host'] == 'WIN-ESA6FH2FC4R\WINCC2K'){

				$port = '1434';
				$connection = odbc_connect("Driver={SQL Server Native Client 10.0};Server=".$system['host'].",".$port.";Database=".$system['dbname'].";",'cos','web.auto');
				$results = odbc_exec($connection, $query);
				
				$realData = [];
				$i=0;
				
				while ($row = odbc_fetch_object($results)) {
					$realData[$i] = $row;
					$i++;
				}

				$res[$system['name']] = $realData;

				odbc_free_result($results);
				odbc_close($connection);
			} else {
				try{
    				$conn = new PDO("sqlsrv:Server=".$system['host'].";Database=".$system['dbname'], 'cos', 'web.auto');
    				$sql = $conn->prepare($query);
	    			$sql->execute();
	    			
	    			$res[$system['name']] = $sql->fetchAll();
	    			$conn=null;
    			} catch(PDOExeption $e){
	    			return "Error: ".$e;
	    		}
			}
    	}    
    	return $res;
    }
}
