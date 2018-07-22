<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../jsonParsingRespon.php';
include '../connectionToDB.php';

include '../intfc/userInt.php';
include '../impl/userImpl.php';


/**
 * <p>Membuat jembatan koneksi ke database aplikasi ini</p>
 */
$bridgeConnection = connectionToDB::getConnection();

/**
 * <p>Digunakan untuk mengirim respon dari proses ke aplikasi Android</p>
 */
$sendResponToAndroid = array();

/**
 * <p>Jika data koneksi yang dibutuhkan tidak kosong</p>
 */
if (!empty($bridgeConnection)) {
    /*
    $username = connectionToDB::sqlInjection($bridgeConnection, "username");
    $password = connectionToDB::sqlInjection($bridgeConnection, "password");
    $type  = connectionToDB::sqlInjection($bridgeConnection, "type");
     * */
    
    $dAndroid = new userImpl();
    $sendResponToAndroid = $dAndroid->selectAll($bridgeConnection);
}


/**
 * <p>Mengembalikan respon request ke ANDROID agar dapat dideteksi hasil proses ini</p>
 */
echo json_encode($sendResponToAndroid);

