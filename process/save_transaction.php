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
    
    $id_transaksi = connectionToDB::sqlInjection($bridgeConnection, "id_transaksi");
    $tanggal_transaksi = connectionToDB::sqlInjection($bridgeConnection, "tanggal_transaksi");
    $diskon = connectionToDB::sqlInjection($bridgeConnection, "diskon");
    $harga_transaksi = connectionToDB::sqlInjection($bridgeConnection, "cost_transaksi");
    $nama_kasir = connectionToDB::sqlInjection($bridgeConnection, "nama_kasir");
    
    
    $dAndroid = new penjualanImpl();
    $checking = $dAndroid->checkExistsData($bridgeConnection, $id_transaksi);
    
    $i = 0;
    foreach ($checking as $key => $value) {
        $i++;
    }
    
    
    echo $i;
    if ($i > 0) {
        $sendResponToAndroid = $dAndroid->update($bridgeConnection, 
            $id_transaksi, $tanggal_transaksi, 
            $diskon, $harga_transaksi);
    } else {
        //echo 'INSERT';
        $sendResponToAndroid = $dAndroid->save($bridgeConnection, 
            $id_transaksi, $tanggal_transaksi, 
            $diskon, $harga_transaksi, $nama_kasir);
    }
      
}


/**
 * <p>Mengembalikan respon request ke aplikasi agar dapat dideteksi hasil proses ini</p>
 */
echo json_encode($sendResponToAndroid);

