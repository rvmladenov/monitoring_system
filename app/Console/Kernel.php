<?php

namespace App\Console;
use App\System;
use PDO;
use Crypt;
use ErrorException;
use PDOException;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [       
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $systems =  System::all();
            foreach ($systems as $key => $system) {
                $queryMeas = "SELECT [meas].param_id, [meas].time, [meas].value, [param].param_name, [param].param_unit, [limit].ad_limit FROM [meas] LEFT JOIN [param] on meas.param_id = [param].param_id LEFT JOIN [limit] on meas.param_id = [limit].param_id";
                $queryEquipment2000 = "SELECT [time] ,st.[eq_id],[state_OK],[state_MaintRQ],[state_InMaint],[state_Fault] ,CAST(CAST([eq_name] AS VARBINARY) AS VARCHAR) as eq_name FROM [states] st JOIN [equipment] eq ON  st.eq_id = eq.eq_id";
                $queryEquipment = "SELECT [time] ,st.[eq_id],[state_OK],[state_MaintRQ],[state_InMaint],[state_Fault], [eq_name] FROM [states] st JOIN [equipment] eq ON  st.eq_id = eq.eq_id";
                $meas;
                $eq;                
                $conn = false;
                if($system['dbversion'] == '2000'){
                    $port = '1434';
                    try {
                            $conn = odbc_connect("Driver={SQL Server Native Client 10.0};Server=".$system['host'].",".$port.";Database=".$system['dbname'],$system['dbuser'],Crypt::decrypt($system['dbuserpass']));
                    } catch (ErrorException $e) {
                        $system->status = 'default';
                        $system->save();
                    }
                    if($conn){
                        $sysStatus = 'success';
                        $results = odbc_exec($conn, $queryMeas);
                        $realDataMeas = [];
                        $i=0;                       
                        while ($row = odbc_fetch_object($results)) {
                            $row->status = ($row->param_name != "O2" && $row->ad_limit && ($row->value > $row->ad_limit))?'warning':'success';
                            $sysStatus = (($sysStatus != $row->status) && ($row->status == 'warning')) ? $row->status : $sysStatus;
                            $realDataMeas[$i] = $row;                
                            $i++;
                        }
                        $meas = json_decode(json_encode($realDataMeas), true);
                        odbc_free_result($results);

                        $results = odbc_exec($conn, $queryEquipment2000);
                        $realDataEq = [];
                        $i=0;
                        while ($row = json_decode(json_encode(odbc_fetch_object($results)), true)) {
                            if(($row['state_Fault'] == 1) && ($sysStatus != 'error')) {
                                $sysStatus = 'error';
                            } 
                            if(($sysStatus != 'error') && (($row['state_InMaint'] == 1) || ($row['state_MaintRQ'] == 1))) {
                                $sysStatus = 'warning';
                            }
                            if(($sysStatus != 'warning') && ($sysStatus != 'error') && ($row['state_OK'] == 1)){
                                $sysStatus = 'success';
                            }
                            
                            foreach ($row as $key=>$item) {                                
                                if ($key=="eq_name" && is_string($item)){                           
                                    $row[$key] = iconv('UCS-2LE', 'UTF-8', $item);
                                }                       
                            }

                            $realDataEq[$i] = $row;
                            $i++;
                        }

                        $system->status = $sysStatus;
                        $system->save();

                        odbc_free_result($results);
                        odbc_close($conn);               
                    }
                } else {
                    try{
                        $conn = new PDO("sqlsrv:Server=".$system['host'].";Database=".$system['dbname'], $system['dbuser'], Crypt::decrypt($system['dbuserpass']));
                    } catch(PDOException $e){
                        $system->status = 'default';
                        $system->save();
                    }
                    if($conn){
                        $sysStatus = 'success';
                        $sql = $conn->prepare($queryMeas);
                        $sql->execute();                
                        $meas = $sql->fetchAll();
                        foreach ($meas as $key=>$row) {
                            $row['status'] = ($row['param_name'] != 'O2' && $row['ad_limit'] && ($row['value'] > $row['ad_limit']))?'warning':'success';
                            $sysStatus = (($sysStatus != $row['status']) &&($row['status'] == 'warning')) ? $row['status'] : $sysStatus;
                            $meas[$key] = $row; 
                        }

                        $sql = $conn->prepare($queryEquipment);
                        $sql->execute();
                        $eq = $sql->fetchAll();
                        foreach ($eq as $key=>$row) {
                            if(($row['state_Fault'] == 1) && ($sysStatus != 'error')) {
                                $sysStatus = 'error';
                            } 
                            if(($sysStatus != 'error') && (($row['state_InMaint'] == 1) || ($row['state_MaintRQ'] == 1))) {
                                $sysStatus = 'warning';
                            }
                            if(($sysStatus != 'warning') && ($sysStatus != 'error') && ($row['state_OK'] == 1)){
                                $sysStatus = 'success';
                            }
                            $eq[$key] = $row;
                        }              
                        $system->status = $sysStatus;
                        $system->save();

                        $conn=null;
                    } 
                }
            }        
        })->everyMinute();
    }
}
/*foreach ($eq as $key=>$row) {
            if(($row['state_InMaint'] == 1)) {
                $state = 'warning';                       
            }else if($row['state_Fault'] == 1) { 
                $state = 'error';                        
            }else if(($row['state_MaintRQ'] == 1)) {
                $state = 'warning';
            }else if(($row['state_OK'] == 1)) {
                $state = 'success';
            }

            $row['state'] = $state;
            $eq[$key] = $row;
        }*/