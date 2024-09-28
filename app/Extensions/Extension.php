<?php

namespace App\Extension;

class Extension
{

    public static function GetIDFromLink($link)
    {
        try
        {
            preg_match_all('/\d+/', $link, $ids);
            if ($ids != null)
                return $ids[0][0];
        }
        catch(\Exception $e)
        {
            return "";
        }
    }
}

