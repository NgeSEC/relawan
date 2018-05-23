<?php
class DateFormat{
    private static $mInstance;

    public static function getInstance(){
        if(self::$mInstance==null){
            self::$mInstance = new \DateFormat;
        }
        return self::$mInstance;
    }

    public function date($format="Y-m-d H:i:s", $datetime=false, $timezone=false)
    {
        if(!$timezone){
            $timezone="GMT";
        }

        if(!$datetime){
            $datetime = date('Y-m-d H:i:s');
            
        }
        $datetime->setTimeZone(new DateTimeZone($timezone));
        return $datetime->format($format);
        
        // $userTimezone = new DateTimeZone(!empty($timezone) ? $timezone : 'GMT');
        // $gmtTimezone = new DateTimeZone('GMT');
        // $myDateTime = new DateTime(($timestamp!=false?date("r",(int)$timestamp):date("r")), $gmtTimezone);
        // $offset = $userTimezone->getOffset($myDateTime);
        // return date($format, ($timestamp!=false?(int)$timestamp:$myDateTime->format('U')) + $offset);
    }
}

function date_format_time_zone($datetime=false, $format="Y-m-d H:i:s", $timezone=false){
    
    if(!$datetime){
        $datetime = date('Y-m-d H:i:s');
    }

    $date = new DateTime($datetime);
    
    return DateFormat::getInstance()->date($format, $date, $timezone);
}

function date_format_to_utc($datetime=false, $format="Y-m-d H:i:s", $timezone=false){
    if(!$timezone){
        $timezone="GMT";
    }

    if(!$datetime){
        $datetime = date('Y-m-d H:i:s');
    }
    $date = new DateTime($datetime, new DateTimeZone($timezone));

    return DateFormat::getInstance()->date($format, $date, 'GMT');
}