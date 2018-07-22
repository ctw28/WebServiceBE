<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../jsonParsingRespon.php';
include '../connectionToDB.php';

include '../intfc/productOutInt.php';
include '../impl/productOutImpl.php';


/**
 * <p>Membuat jembatan koneksi ke database aplikasi ini</p>
 */
$bridgeConnection = connectionToDB::getConnection();

/**
 * <p>Digunakan untuk mengirim respon dari proses ke aplikasi </p>
 */
$sendResponToAndroid = array();

/**
 * <p>Jika data koneksi yang dibutuhkan tidak kosong</p>
 */
if (!empty($bridgeConnection)) {
    
    $id = connectionToDB::sqlInjection($bridgeConnection, "id_keluar");
    $nomor = connectionToDB::sqlInjection($bridgeConnection, "nomor_barcode");
    $out = connectionToDB::sqlInjection($bridgeConnection, "tanggal_keluar");
    $jumlah = connectionToDB::sqlInjection($bridgeConnection, "jumlah");
    $tujuan = connectionToDB::sqlInjection($bridgeConnection, "tujuan");
    
    
    $dAndroid = new productOutImpl();
    $checking = $dAndroid->checkExistsData($bridgeConnection, $id);
    
    $i = 0;
    foreach ($checking as $key => $value) {
        $i++;
    }
    
    echo $i;
    if ($i > 0) {
        $sendResponToAndroid = $dAndroid->update($bridgeConnection, $id, $nomor, $out, $jumlah, $tujuan);
    } else {
        $sendResponToAndroid = $dAndroid->save($bridgeConnection, $id, $nomor, $out, $jumlah, $tujuan);
    }
    
}


/**
 * <p>Mengembalikan respon request ke ANDROID agar dapat dideteksi hasil proses ini</p>
 */
echo json_encode($sendResponToAndroid);

