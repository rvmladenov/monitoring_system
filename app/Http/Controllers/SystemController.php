<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSystemRequest;
use App\System;
use PDO;
use Crypt;

use ErrorException;
use PDOException;

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
        foreach ($systems as $key => $system) {
            self::getSytemIinfo($system->id);
        }
        return view('/admin/systems', compact('systems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $systems = System::all();
        return \View::make('/admin/forms/addSystem',  compact('systems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSystemRequest $request
     * @return Response
     */
    public function store(\App\Http\Requests\StoreSystemRequest $request)
    {
        $system = new System;
        $system->name = $request->name;
        $system->host = $request->host;
        $system->dbversion = $request->dbversion;
        $system->dbname = $request->dbname;
        $system->dbuser = $request->dbuser;
        $system->dbuserpass = Crypt::encrypt($request->dbuserpass);
        $system->systemView = $request->systemView;
        $system->status = 'default';
        $system->save();
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
        $systems = System::all(); 
        $system = System::find($id);
        $sysData = self::getSytemIinfo($id);
        if(is_null($system)){
            abort(404);
        }
        //return $system;
        return view('/admin/systemShow', compact('system', 'systems', 'sysData'));
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
        $system = System::find($id);
       /* echo "<pre>".$system['name'];
        print_r($system);
        echo "</pre>";*/
        return \View::make('/admin/forms/editSystem',  compact('system', 'systems'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSystemRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\UpdateSystemRequest $request)
    {
        $system = System::find($request->id);       
        $system->name = $request->name;
        $system->host = $request->host;
        $system->dbversion = $request->dbversion;
        $system->dbname = $request->dbname;
        $system->dbuser = $request->dbuser;
        if($request->dbuserpass != ''){
            $system->dbuserpass = Crypt::encrypt($request->dbuserpass);
        }
        $system->systemView = $request->systemView;        
        $system->save();
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
        $system = System::find($id);        
        $system->delete();
        return redirect('/admin');
    }

    private function getSytemIinfo($id){
        $system = System::find($id);
        $queryMeas = "SELECT [meas].param_id, [meas].time, [meas].value, [param].param_name, [param].param_unit, [limit].ad_limit FROM [meas] LEFT JOIN [param] on meas.param_id = [param].param_id LEFT JOIN [limit] on meas.param_id = [limit].param_id";
        $queryEquipment2000 = "SELECT [time] ,st.[eq_id],[state_OK],[state_MaintRQ],[state_InMaint],[state_Fault] ,CAST(CAST([eq_name] AS VARBINARY) AS VARCHAR) as eq_name FROM [states] st JOIN [equipment] eq ON  st.eq_id = eq.eq_id";
        $queryEquipment = "SELECT [time] ,st.[eq_id],[state_OK],[state_MaintRQ],[state_InMaint],[state_Fault], [eq_name] FROM [states] st JOIN [equipment] eq ON  st.eq_id = eq.eq_id";
        $res;
        $meas;
        $eq;
        $conn = false;
        if($system['status'] != 'default'){
            if($system['dbversion'] == '2000'){
                $port = '1434';
                try {
                        $conn = odbc_connect("Driver={SQL Server Native Client 10.0};Server=".$system['host'].",".$port.";Database=".$system['dbname'],$system['dbuser'],Crypt::decrypt($system['dbuserpass']));
                } catch (ErrorException $e) {               
                    $res[$system['name']] = ['error' => 'Connection Error'];
                    $res[$system['name']]['meas'] = [];
                    $res[$system['name']]['equipment'] = [];
                }
                if($conn){

                    $results = odbc_exec($conn, $queryMeas);                
                    $realDataMeas = [];
                    $i=0;                
                    while ($row = odbc_fetch_object($results)) {
                        $row->status = ($row->param_name != "O2" && $row->ad_limit && ($row->value > $row->ad_limit))?'warning':'success';
                        $realDataMeas[$i] = $row;                
                        $i++;
                    }
                    $meas = json_decode(json_encode($realDataMeas), true);
                    odbc_free_result($results);

                    $results = odbc_exec($conn, $queryEquipment2000);
                    $realDataEq = [];
                    $i=0;
                    $state;
                    while ($row = json_decode(json_encode(odbc_fetch_object($results)), true)) {                
                        foreach ($row as $key=>$item) { 
                            if ($key=="eq_name" && is_string($item)){                           
                                $row[$key] = iconv('UCS-2LE', 'UTF-8', $item);
                            }                       
                        }
                        $realDataEq[$i] = $row;
                        $i++;
                    }

                    $eq = $realDataEq;
                    odbc_free_result($results);
                    odbc_close($conn);
                    $res[$system['name']]=['meas' => $meas, 'equipment' => $eq];                
                }
            } else {
                try{
                    $conn = new PDO("sqlsrv:Server=".$system['host'].";Database=".$system['dbname'], $system['dbuser'], Crypt::decrypt($system['dbuserpass']));
                } catch(PDOException $e){
                    $res[$system['name']] = ['error' => 'Connection Error'];
                    $res[$system['name']]['meas'] = [];
                    $res[$system['name']]['equipment'] = [];
                }
                if($conn){
                    $sql = $conn->prepare($queryMeas);
                    $sql->execute();                
                    $meas = $sql->fetchAll();
                    foreach ($meas as $key=>$result) {
                        $result['status'] = ($result['param_name'] != 'O2' && $result['ad_limit'] && ($result['value'] > $result['ad_limit']))?'warning':'success';
                        $meas[$key] = $result; 
                    }

                    $sql = $conn->prepare($queryEquipment);
                    $sql->execute();
                    $eq = $sql->fetchAll();                
                    
                    $conn=null;                
                    $res[$system['name']]=['meas' => $meas, 'equipment' => $eq];  
                } 
            }
        }else{
            $res[$system['name']] = ['error' => 'Connection Error'];
            $res[$system['name']]['meas'] = [];
            $res[$system['name']]['equipment'] = [];
        }    
        return $res;
    }

}
//SELECT [time] ,st.[eq_id],[state_OK],[state_MaintRQ],[state_InMaint],[state_Fault] ,eq_name FROM [states] st JOIN [equipment] eq ON  st.eq_id = eq.eq_id
