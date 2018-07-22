<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of connectionToDB
 *
 * @author dan
 */
// import Konfigurasi koneksi kedatabase        
require_once 'database/config.php';
require_once 'database/connect.php';

class connectionToDB {
    //put your code here
    
    function __construct() {
        
    }
    
    public static function getConnection() {

        $db = new DB_connect(); // conection
        // mengkoneksikanke database
        return $db->connecting();
    }
    
    
    public static function getConnectionEmptyDB() {

        $db = new DB_connect(); // conection
        // mengkoneksikanke database
        return $db->connectToEmpty();
    }
    
    
    public static function sqlInjection($connection, $param) {
        return mysqli_real_escape_string($connection, filter_input(INPUT_GET, $param));
    }

}
