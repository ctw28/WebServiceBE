<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userMappingEnt
 *
 * @author dan
 */
class userEnt {
    //put your code here
    
    var $userData = array();
    
    
    function __construct($userData) {
        $this->userData = $userData;
    }
    
    
    /**
     * <p>Digunakan untuk mendapatkan data-data customer</p>
     * 
     * @return type <b>return Array data Customer</b>
     */
    function getUserData() {
        return $this->userData;
    }

    
    /**
     * <p>Digunakan unuk menginisialisasi data-data customer</p>
     * 
     * @param type $userData <b>Data Customer</b>
     */
    function setUserData($userData) {
        $this->userData = $userData;
    }



    
    
}
