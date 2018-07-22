<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../jsonParsingRespon.php';
include '../connectionToDB.php';

include '../intfc/suplierInt.php';
include '../impl/suplierImpl.php';


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
    
    // $id_suplier = connectionToDB::sqlInjection($bridgeConnection, "id_suplier");
    $no_barcode = connectionToDB::sqlInjection($bridgeConnection, "no_barcode");
    $suplier = connectionToDB::sqlInjection($bridgeConnection, "suplier");
    $tgl_transaksi = connectionToDB::sqlInjection($bridgeConnection, "tgl_transaksi");
    $harga_awal  = connectionToDB::sqlInjection($bridgeConnection, "harga_awal");
    $harga_modal = connectionToDB::sqlInjection($bridgeConnection, "harga_modal");
    $jml = connectionToDB::sqlInjection($bridgeConnection, "jml");
    $ket_suplier  = connectionToDB::sqlInjection($bridgeConnection, "ket_suplier");
    
    $dAndroid = new suplierImpl();
    
    $checking = $dAndroid->checkExistsData($bridgeConnection, $no_barcode);
    
    $i = 0;
    foreach ($checking as $key => $value) {
        $i++;
    }
    
    echo $i;
    
        $sendResponToAndroid = $dAndroid->save($bridgeConnection, $no_barcode, $suplier, $tgl_transaksi, $harga_awal, $harga_modal, $jml, $ket_suplier);
    
}


/**
 * <p>Mengembalikan respon request ke ANDROID agar dapat dideteksi hasil proses ini</p>
 */
echo json_encode($sendResponToAndroid);

