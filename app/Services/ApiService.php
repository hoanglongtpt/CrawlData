<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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
            
            if ($response && $response['data'] == null)
                return null;
            else
                return $response['data']['url'];
        }
        catch (\Exception $e){
            Log::error('Lỗi : ' . $e->getMessage());
            return null;
        }
    }
    public static function DownLoadResourceFreepik($id, $resource = "")
    {
        try
        {
            if ($resource != "")
                $resource = "/".$resource;

            $response = Http::withHeaders([
                'x-freepik-api-key' =>  self::keyClientFreePik,
            ])->get('https://api.freepik.com/v1/resources/'.$id.'/download'.$resource);

            if ($response['data'] == null)
                return null;
            else
                return $response['data']['url'];
        }
        catch (\Exception $e){
            Log::error('Lỗi : ' . $e->getMessage());
            return null;
        }
    }

    public static function DownLoadResourcePreniumFreepik($id,$type = '')
    {
        try
        {
            $response = Http::get('http://14.225.255.75:8000/freepik/'.$id.'?type='.$type);
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

    public static function DownLoadVideoFreepik($id)
    {
        try
        {
            $response = Http::get('http://14.225.255.75:8000/freepik/'.$id.'?type=video');

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

    public static function DownLoadResourceEnvato($link)
    {
        try
        {
            $response = Http::get('http://14.225.255.75:8000/envato?type=license&url='.$link);

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

