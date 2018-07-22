<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../jsonParsingRespon.php';
include '../connectionToDB.php';

include '../intfc/penjualanBarangInt.php';
include '../impl/penjualanBarangImpl.php';


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
    $nomor_barcode = connectionToDB::sqlInjection($bridgeConnection, "nomor_barcode");
    $jumlah = connectionToDB::sqlInjection($bridgeConnection, "jumlah");
    $type = connectionToDB::sqlInjection($bridgeConnection, "type");
    
    $dAndroid = new penjualanBarangImpl();
    
    $sendResponToAndroid = $dAndroid->updateStock($bridgeConnection, $nomor_barcode, $jumlah, $type);
    
    if ($sendResponToAndroid["success"] == 1){
        echo 'sukses';
    } else {
        echo 'gagal';
    }
    
    //while ($row = mysqli_fetch_array($sendResponToAndroid)) {
        
    //};
    
}


/**
 * <p>Mengembalikan respon request ke ANDROID agar dapat dideteksi hasil proses ini</p>
 */
//echo json_encode($sendResponToAndroid);

