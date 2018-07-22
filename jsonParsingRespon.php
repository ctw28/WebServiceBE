<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of jsonParsingRespon
 *
 * @author dan
 */
class jsonParsingRespon {
    //put your code here
    
    function __construct() {
        
    }
    
    // Fungsi yang digunakan untuk melakukan respon dari parsing JSON Scripting untuk INSERT, UPDATEE, atau DELETE
    public function jsonWritingRespon($result, $message) {

        $responJSON = array();

        if ($result) {
            $responJSON["success"] = 1;
            $responJSON["message"] = $message;
        } else {
            $responJSON["success"] = 0;
            $responJSON["message"] = "Terjadi Kesalahan ...";            
        }
        
        return $responJSON;
    }
    
    
    
    // Fungsi yang digunakan untuk melakukan respon dari parsing JSON Scripting untuk SELECT DATA DARI DATABASE
    public function jsonReadingRespon($resultSelect, $json_identifier) {

        $responJSON = array();

        if (mysqli_num_rows($resultSelect)) {
            while ($row = mysqli_fetch_assoc($resultSelect)) {
                $responJSON[$json_identifier][] = $row;
            }
        } 
        
        return $responJSON;
    }

}
