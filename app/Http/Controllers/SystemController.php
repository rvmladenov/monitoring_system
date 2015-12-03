<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSystemRequest;
use App\System;
use PDO;
use Crypt;
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

    private function getSytemIinfo($id){
        $system = System::find($id);
        $queryMeas = "SELECT [meas].param_id, [meas].time, [meas].value, [param].param_name, [param].param_unit, [limit].ad_limit FROM [meas] LEFT JOIN [param] on meas.param_id = [param].param_id LEFT JOIN [limit] on meas.param_id = [limit].param_id";
        $queryEquipment = "";
        $res;        
        if($system['dbversion'] == '2000'){
            $port = '1434';
            $connection = odbc_connect("Driver={SQL Server Native Client 10.0};Server=".$system['host'].",".$port.";Database=".$system['dbname'].";",$system['dbuser'],Crypt::decrypt($system['dbuserpass']));
            $results = odbc_exec($connection, $queryMeas);
            
            $realData = [];
            $i=0;
            
            while ($row = odbc_fetch_object($results)) {
                $row->status = ($row->ad_limit && ($row->value > $row->ad_limit))?'warning':'success';
                if($system->status == 'success' && $row->status != $system->status){
                    $system->status = 'warning';
                    $system->save();
                }
                $realData[$i] = $row;                
                $i++;
            }
            $res = json_decode(json_encode($realData), true);
            odbc_free_result($results);
            odbc_close($connection);
        } else {
            try{
                $conn = new PDO("sqlsrv:Server=".$system['host'].";Database=".$system['dbname'], $system['dbuser'], Crypt::decrypt($system['dbuserpass']));
                $sql = $conn->prepare($queryMeas);
                $sql->execute();
                
                $res = $sql->fetchAll();
                foreach ($res as $key=>$result) {
                    $result['status'] = ($result['ad_limit'] && ($result['value'] > $result['ad_limit']))?'warning':'success';
                    if($system->status == 'success' && $result['status'] != $system->status){
                        $system->status = 'warning';
                        $system->save();
                    }
                    $res[$key] = $result; 
                }
                $conn=null;
            } catch(PDOExeption $e){
                return "Error: ".$e;
            }
        }
        return $res;
    }
}
