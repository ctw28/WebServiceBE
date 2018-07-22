<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../jsonParsingRespon.php';
include '../connectionToDB.php';

include '../intfc/penjualanInt.php';
include '../impl/penjualanImpl.php';


/**
 * <p>Membuat jembatan koneksi ke database aplikasi ini</p>
 */
$bridgeConnection = connectionToDB::getConnection();

/**
 * <p>Digunakan untuk mengirim respon dari proses ke aplikasi</p>
 */
$sendResponToAndroid = array();

/**
 * <p>Jika data koneksi yang dibutuhkan tidak kosong</p>
 */
if (!empty($bridgeConnection)) {
    
    $status = connectionToDB::sqlInjection($bridgeConnection, "status");
    
    $dAndroid = new penjualanImpl();
    $sendResponToAndroid = $dAndroid->selectByStatus($bridgeConnection, $status);
}


/**
 * <p>Mengembalikan respon request ke aplikasi agar dapat dideteksi hasil proses ini</p>
 */
echo json_encode($sendResponToAndroid);

