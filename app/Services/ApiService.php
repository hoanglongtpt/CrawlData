<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiService
{
    const keyClientFreePik = "FPSX62e1619372cc4ad7af326ed6dffdd0a2";
    public static function DownLoadIconFreepik($id)
    {
        try
        {
            $response = Http::withHeaders([
                'x-freepik-api-key' => self::keyClientFreePik,
            ])->get('https://api.freepik.com/v1/icons/'.$id.'/download');

            if($response['data'] == null)
            {
                return $response['message'] ?? "Down load Icon fail";
            }
            else
                return $response['data']['url'];
        }
        catch (\Exception $e){
            return "Download Icon fail. ". $e;
        }
    }
    public static function DownLoadResourceFreepik($id, $resource = "")
    {
        try
        {
            if($resource != "")
                $resource = "/".$resource;
            $response = Http::withHeaders([
                'x-freepik-api-key' =>  self::keyClientFreePik,
            ])->get('https://api.freepik.com/v1/resources/'.$id.'/download'.$resource);

            if($response['data'] == null)
                return $response['message'] ?? "Download Resource fail";
            else
                return $response['data']['url'];
        }
        catch (\Exception $e){
            return "Download Resource fail. ". $e;
        }
    }

    public static function DownLoadResourceEnvato($id)
    {
        try
        {
            $response = Http::withHeaders([
                'x-freepik-api-key' =>  self::keyClientFreePik,
            ])->get('https://api.freepik.com/v1/resources/'.$id.'/download');

            dd($response['data']['url']);
            if($response['data'] == null)
            {
                return $response['message'] ?? "Down load Resource fail";
            }
            else
                return $response['data']['url'];
        }
        catch (\Exception $e){
            return "Down load Resource fail. ". $e;
        }
    }
}

