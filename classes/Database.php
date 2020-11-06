<?php

/**
 *	class for accessing the database
 *
 *	@version	1.0
 *	@copyright	Copyright (c) 2020.
 *	@license	Creative Commons (BY-NC-SA)
 *	@since		October 6, 2020
 *	@author		Jacob Stålbrand <jacob.stalbrand1@gmail.com>
 *
 */

class Database {

    private $conn;
    private $stmt;
    private $servername = "mecloud.lnu.se";
    private $dB_username = "js224rr";
    private $dB_password = "Bo4NdrY8";
    private $dBname = "js224rr";

    public function __construct(){}
    public function __get($name){
        return $this->$name;
    }
    public function __set($name,$value){
        $this->$name = $value;
    }
  
    /**
     * 
     * creates a connection to the database
     * 
     */
    protected function create_connection(){

        $this->conn = new mysqli($this->servername, $this->dB_username, $this->dB_password, $this->dBname);
        $this->check_connection();

    }

    /**
     * private help method that checks if the connection is successfull
     */
    private function check_connection(){

        if(!$this->conn){
             die("connection failed: " .$this->conn->connect_error);
        }
    }

    /**
     * @param Statement sql-statement 
     * prepares a statement 
     */
    protected function prepare($query){

        $this->stmt = $this->conn->prepare($query);
    }

    /**
     * 
     * binds the statement
     * 
     * @param String datatypes of the values $var
     * @param Array containing the values to bind 
     * 
     */
    protected function bind($type, $var){
        
        $this->stmt->bind_param($type, ...$var);
        
    }

    /**
     * executes the prepared statement 
     */
    protected function execute(){
        
        $this->stmt->execute();
    }

    /**
     * 
     * returns an associative array with the information
     * 
     * @return Array associative array
     */
    protected function fetch(){
      
        $result = $this->stmt->get_result();
    
    return $result->fetch_all(MYSQLI_ASSOC);
    }


}


?>