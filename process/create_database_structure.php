<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../jsonParsingRespon.php';
include '../connectionToDB.php';

include '../intfc/createStructureInt.php';
include '../impl/createStructureImpl.php';


/**
 * <p>Membuat jembatan koneksi ke database aplikasi ini</p>
 */
$bridgeConnection = connectionToDB::getConnectionEmptyDB();

/**
 * <p>Digunakan untuk mengirim respon dari proses ke aplikasi </p>
 */
$sendResponToAndroid = array();

/**
 * <p>Jika data koneksi yang dibutuhkan tidak kosong</p>
 */
if (!empty($bridgeConnection)) {
    
    $succes = false;
    $action = new createStructureImpl();
    
    if ($action->create_db($bridgeConnection)) {
        if ($action->create_1st_table($bridgeConnection)) {
            if ($action->create_2nd_table($bridgeConnection)) {
                if ($action->create_3rd_table($bridgeConnection)) {
                    if ($action->create_4th_table($bridgeConnection)) {
                        if ($action->create_5th_table($bridgeConnection)) {
                            $succes = true;
                            $sendResponToAndroid["success"] = 1;
                            $sendResponToAndroid["message"] = "Pembuatan struktur database berhasil ...";
                        }
                    }
                }
            }
        }
    }
    
    
    if (!$succes) {
        $sendResponToAndroid["success"] = 0;
        $sendResponToAndroid["message"] = "Terjadi Kesalahan ...";
    }
}


/**
 * <p>Mengembalikan respon request ke ANDROID agar dapat dideteksi hasil proses ini</p>
 */
echo json_encode($sendResponToAndroid);

