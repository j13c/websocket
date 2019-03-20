<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;


class SchemaWebsocketController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showTables(Request $request)
    {
        $tables = DB::select('show tables');
        if(empty($tables)){
            $tables = "MariaDB [websocket]> show tables - Empty set (0.00 sec)";
        }
        return response()->json($tables);
    }

    public function describeTable(Request $request,$table)
    {
        $description = DB::select("describe ".$table.";");
        if(empty($description)){
            $description = "ERROR 1146 (42S02): Table 'websocket.".$table."' doesn't exist";
        }
        return response()->json($description);
    }

    public function dataTable(Request $request,$table)
    {
        $data = DB::select("select * from ".$table.";");
        if(empty($data)){
            $data = "ERROR 1146 (42S02): Table 'websocket.".$table."' doesn't exist";
        }
        return response()->json($data);
    }
}
