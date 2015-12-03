<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSystemRequest;
use App\System;
use Illuminate\Http\Request;
use Crypt;
use PDO;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
	public static function test($val){					
		return (is_string($val)) ? iconv('UCS2-LE', 'UTF-8', $val):$val;
	}

    public function index(){
    	//test the dynamic connection with other databases seems successfull
    	$systems = System::all();
    	$res = [];
    	foreach ($systems as $system) {
    		$query = "SELECT [states].eq_id, [states].time, [states].[state_OK],[states].[state_MaintRQ], [states].[state_InMaint], [states].[state_Fault], [equipment].eq_id, CAST(CAST([equipment].eq_name AS VARBINARY) AS VARCHAR) as eq_name FROM [states] LEFT JOIN [equipment] on states.eq_id = [equipment].eq_id";

			if($system['dbversion'] == '2000'){

				$port = '1434';
				$connection = odbc_connect("Driver={SQL Server Native Client 10.0};Server=".$system['host'].",".$port.";Database=".$system['dbname'],$system['dbuser'],Crypt::decrypt($system['dbuserpass']));
				$results = odbc_exec($connection, $query);
				
				$realData = [];
				$i=0;				
				while ($row = json_decode(json_encode(odbc_fetch_object($results)), true)) {
					foreach ($row as $key=>$item) {	
						if ($key=="eq_name" && is_string($item)){							
							$row[$key] = iconv('UCS-2LE', 'UTF-8', $item);
						}						
					}					
					$realData[$i] = $row;
					$i++;
				}

				$res[$system['name']] = $realData;

				odbc_free_result($results);
				odbc_close($connection);
			} else {
				try{
    				$conn = new PDO("sqlsrv:Server=".$system['host'].";Database=".$system['dbname'], $system['dbuser'], Crypt::decrypt($system['dbuserpass']));
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
