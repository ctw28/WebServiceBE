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
    
    $id_administrator = connectionToDB::sqlInjection($bridgeConnection, "id_administrator");
    $username = connectionToDB::sqlInjection($bridgeConnection, "username");
    $password = connectionToDB::sqlInjection($bridgeConnection, "password");
    $type  = connectionToDB::sqlInjection($bridgeConnection, "type");
    
    $dAndroid = new userImpl();
    
    $checking = $dAndroid->checkExistsData($bridgeConnection, $id_administrator);
    
    $i = 0;
    foreach ($checking as $key => $value) {
        $i++;
    }
    
    echo $i;
    if ($i > 0) {
        $sendResponToAndroid = $dAndroid->update($bridgeConnection, $id_administrator, $username, $password, $type);
    } else {
        $sendResponToAndroid = $dAndroid->save($bridgeConnection, $id_administrator, $username, $password, $type);
    }
}


/**
 * <p>Mengembalikan respon request ke ANDROID agar dapat dideteksi hasil proses ini</p>
 */
echo json_encode($sendResponToAndroid);

