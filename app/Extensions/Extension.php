<?php

namespace App\Extensions;

use Illuminate\Support\Facades\Log;

class Extension
{
    // motionarray + freepik
    public static function GetIDFromLink($link)
    {
        try
        {
            preg_match_all('/\d{6,}/', $link, $ids);
            if (!empty($ids[0])){
                return $ids[0][0];
            }
        }
        catch(\Exception $e)
        {
            return "";
        }
        return "";
    }

    public static function GetIDFromEvanto($link)
    {
        try
        {

            $splitedUrl = explode('-', $link);
            return end($splitedUrl);

        }
        catch(\Exception $e)
        {
            return "";
        }
    }

    public static function GetTypeDowload ($link) {
        if (self::hasPremiumKeyword($link)) {
            return 'premium';
        }elseif (self::hasVideoKeyword($link)) {
            return 'video';
        }else{
            return 'normal';
        } 
    }

    private static function hasPremiumKeyword($url) {
        $prefix = 'https://www.freepik.com/';
        if (strpos($url, $prefix) === 0) {
            $remainingPart = substr($url, strlen($prefix));
            
            return strpos($remainingPart, 'premium-') !== false;
        }
        return false; 
    }

    private static function hasVideoKeyword($url) {
        $prefix = 'https://www.freepik.com/';
        if (strpos($url, $prefix) === 0) {
            $remainingPart = substr($url, strlen($prefix));
            
            return strpos($remainingPart, 'video') !== false;
        }
        return false; 
    }
    
}

