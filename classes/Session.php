<?php

/**
 *	class for handling sessions
 *
 *	@version	1.0
 *	@copyright	Copyright (c) 2020.
 *	@license	Creative Commons (BY-NC-SA)
 *	@since		October 25, 2020
 *	@author		Jacob Stålbrand <jacob.stalbrand1@gmail.com>
 *
 */

    class Session {

    
        /**
         * stats a session
         */
        public static function start(){
             session_start();
        }
       
        /**
         * deletes a session variable
         * @param String variable name
         */
        public static function delete($name){

            if(!self::is_alive()){
                session_start();
            }
            if(self::exist($name)){
                unset($_SESSION[$name]);
            }
        }
        /**
         * adds a new session variable
         * @param String session name
         * @param value dsa
         */
        public static function add($name, $value){
           
            if(!self::is_alive()){
                session_start();
            }
            $_SESSION[$name] = $value;
        }

        /**
         * @return Session variable 
         */
        public static function get($name){
    
            if(!self::is_alive()){
                session_start();
            }

        return isset($_SESSION[$name]) ? $_SESSION[$name] : false;
        }

        /**
         * 
         * returns true if the the session $_SESSION[$name] exist
         * 
         * @return Boolean 
         */
        public static function exist($name){
            if(!self::is_alive()){
                session_start();
            }
            return isset($_SESSION[$name]) ? true : false;
        }
        /**
         * 
         * returns true if the session i alive
         * @return Boolean 
         * 
         */
        public static function is_alive(){
            return session_status() == 2 ? true : false;
        }

    }

?>