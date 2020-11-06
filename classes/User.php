<?php


/**
 *	class for handling the user
 *
 *	@version	1.0
 *	@copyright	Copyright (c) 2020.
 *	@license	Creative Commons (BY-NC-SA)
 *	@since		October 8, 2020
 *	@author		Jacob Stålbrand <jacob.stalbrand1@gmail.com>
 *
 */

    class User extends Database{


        public $username; 
        private $password;
        public $data;

        /**
         * 
         * creating an associative array with the user-data
         * creating connection to the database
         * 
         * @param String user-username
         * @param String user-password
         * 
         */
        public function __construct($username,$password){

            $this->username = $username;
            $this->password = $password;
            $this->data = array('username' => $this->username, 'password' => $this->password);
            $this->create_connection();
            
        }
        public function __get($property){
            return $this->property;
        }
        public function __set($property, $value){
              $this->property = $value;
        }
       
       
        /**
         * 
         * method for logging in the user
         * @return Boolean 
         */
        public function log_in(){

            $this->prepare("SELECT * FROM users WHERE username=?");
            $this->bind("s",array($this->username));
            $this->execute();
            $userdata = $this->fetch();
            
            if(empty($userdata)){

                Errors::set('no-valid-username');
            return false;
            }
            else if(password_verify($this->password, $userdata[0]['password']) == false){
                Errors::set('wrong-password');
            return false;
            }
        return true;            
        }

        /**
         * 
         * method for logging out the user
         * @return Void
         */
        public function log_out(){

            Session::delete('user');
           
        }

        /**
         * return true if the user is logged in
         * @return Boolean
         */
        public function is_logged_in(){
            return isset($_SESSION['user']) ? true : false;
        }

    }


?>