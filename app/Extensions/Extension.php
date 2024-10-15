<?php

namespace App\Extensions;

use Illuminate\Support\Facades\Log;

class Extension
{
    public static function GetIDFromLink($link)
    {
        try
        {

            preg_match_all('/\d{6,}/g', $link, $ids);
            if (!empty($ids[0]))
                return $ids[0][0];
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
}

