<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of connect
 *
 * @author cc
 */
class DB_connect {
    //put your code here
    
    
    function __construct() {
    }
    
    public function __destruct() {
        $this->close();
    }
    
    
    public function connecting() {
        
        require_once 'config.php';
        $connection = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
        
        //echo "<script> alert('sukses'); </script>";
        return $connection;
    }
    
    
    
    public function connectToEmpty() {
        
        require_once 'config.php';
        $connection = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE_EMPTY);
        
        //echo "<script> alert('sukses'); </script>";
        return $connection;
    }


    public function close(){
        //mysqli_close($link)
    }
    
}
