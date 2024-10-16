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

