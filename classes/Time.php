<?php

/**
 *	class for time 
 *
 *	@version	1.0
 *	@copyright	Copyright (c) 2020.
 *	@license	Creative Commons (BY-NC-SA)
 *	@since		October 26, 2020
 *	@author		Jacob Stålbrand <jacob.stalbrand1@gmail.com>
 *
 */

class Time{

    /**
     * 
     * @param String date from the database
     * @return String date | time depending on how long ago the article was published 
     * 
     */
    public static function get($date){

        $time = strtotime($date);
        $time = time() - $time; 
        if($time > 86400){
            $date = substr($date,0,16);
            return $date;

        }
        return self::since($time);

    }

    /**
     * 
     * inspired by henrik andersen and StackOverflow
     * @return String time
     * 
     */
    public static function since($time){

        $time = ($time<1)? 1 : $time;
        $tokens = array (
            
            3600 => 'timma',
            60 => 'minut',
            1 => 'Alldeles nyss'
        
        );
        foreach ($tokens as $unit => $text) {
            
            if ($time < $unit) continue;

                $numberOfUnits = floor($time / $unit);
                if($numberOfUnits > 1){
                    if($time >= 60 && $time < 3600)
                        return $numberOfUnits.' '.$text.'er sedan';
                        if($time >= 3600 && $time < 86400)
                            return $numberOfUnits.' '.$text.'r sedan';
                }
                else{
                    if($time >= 60){
                        return $numberOfUnits.' '.$text.' sedan';

                    }
               }

        return $text;
        } 
    }


}

?>