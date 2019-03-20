<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use App\History;


class WebSocketController extends Controller
{
    public function getMessage(Request $request,$message)
    {
        if(!empty($message)){
            $user = "jtrujillo";
            $datetime = new \DateTime("now");
            $date = $datetime->format("Y-m-d H:m:s");
            $data = [
                "user" => $user,
                "date" => $date,
                "message" => $message
            ];
            
            try {
                
                $history = new History;
                $history->user = $user;
                $history->datetime = $date;
                $history->message = $message;
                $history->save();
                
                return response()->json($history);
                

            } catch (\Throwable $th) {
                $message = $th->getMessage();
            }

        }else{
            $message = "Server: No se escribio un mensaje";
        }
        return response()->json([$message,$data],200);
    }
}
