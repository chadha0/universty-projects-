<?php

namespace Core;

class Validator
{
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function file($file)
    {

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        if ($finfo) {
            // Get the MIME type of the file
            $mime_type = finfo_file($finfo, $file);
            // Close the Fileinfo resource
            finfo_close($finfo);
            return $mime_type;
        } else {
            return null;
        }
    }

}
