<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class SeleniumService
{

    public static function Envato()
    {

    }

    public static function DownLoadResourceMotionarray($id)
    {
        try
        {
            $response = Http::get('http://14.225.255.75:8000/motionarray/'.$id);

            if ($response && $response['result'] == null)
            {
                return $response['code'] ?? "Download Resource fail";
            }
            else
                return $response['result'];
        }
        catch (\Exception $e){
            return "Download Resource fail. ". $e;
        }
    }
}

