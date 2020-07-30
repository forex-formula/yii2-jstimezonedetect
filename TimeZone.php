<?php

namespace yii\jstimezonedetect;

class TimeZone
{

    /**
     * @return string
     */
    public static function detect()
    {
        $timeZone = ini_get('date.timezone');
        if (array_key_exists('tz', $_COOKIE) && in_array($_COOKIE['tz'], timezone_identifiers_list())) {
            $timeZone = $_COOKIE['tz'];
        } elseif (!$timeZone) {
            $timeZone = 'UTC';
        }
        date_default_timezone_set($timeZone);
        return $timeZone;
    }
}
