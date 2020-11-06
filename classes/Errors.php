<?php

/**
 *	class for handling errors
 *
 *	@version	1.0
 *	@copyright	Copyright (c) 2020.
 *	@license	Creative Commons (BY-NC-SA)
 *	@since		October 20, 2020
 *	@author		Jacob Stålbrand <jacob.stalbrand1@gmail.com>
 *
 */
class Errors{

    /**
     * 
     * static method that check prints the error  
     * 
     */
    public static function get(){

        if(Self::exists()){
                
            if($_GET['error'] == 'wrong-password'){

                echo '<p class=error-msg>fel lösenord</p>';
                //return 'fel lösenord';
            }
            else if($_GET['error'] == 'no-valid-username'){

                echo '<p class=error-msg>inget registrerat användarnamn</p>';
                //return 'inget registrerat användarnamn';
            }
            
        }
    return;
    }

    /**
     * static method that sets a new error-msg
     */
    public static function set($msg){

        $_GET['error'] = $msg;
    }
    
    /**
     * private static method that checks if there is any current errors
     */
    private static function exists(){

      return isset($_GET['error']) ? true : false;
    }

}


?>