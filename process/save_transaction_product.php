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
 * <p>Digunakan untuk mengirim respon dari proses ke aplikasi</p>
 */
$sendResponToAndroid = array();

/**
 * <p>Jika data koneksi yang dibutuhkan tidak kosong</p>
 */
if (!empty($bridgeConnection)) {
    
    $nomor_barcode = connectionToDB::sqlInjection($bridgeConnection, "nomor_barcode");
    $id_transaksi = connectionToDB::sqlInjection($bridgeConnection, "id_transaksi");
    $jenis_pembelian = connectionToDB::sqlInjection($bridgeConnection, "jenis_pembelian");
    $jumlah_barang = connectionToDB::sqlInjection($bridgeConnection, "jumlah_barang");
    
    $dAndroid = new penjualanBarangImpl();
    
    
    
    $checking = $dAndroid->checkExistsData($bridgeConnection, $id_transaksi, $nomor_barcode);
    
    $i = 0;
    foreach ($checking as $key => $value) {
        $i++;
    }
    
    $connection = $bridgeConnection;
    
    // $sendResponToAndroid = $dAndroid->save($bridgeConnection, $nomor_barcode, $id_transaksi, $jenis_pembelian, $jumlah_barang);
  
    if ($i > 0) {
        $sendResponToAndroid = $dAndroid->update($bridgeConnection, 
            $nomor_barcode, $id_transaksi, $jenis_pembelian, $jumlah_barang);
    } else {
        $updateStok = $dAndroid->updateStock($connection, $nomor_barcode, $jumlah_barang, $jenis_pembelian);
        
       
        if ($updateStok){
            $sendResponToAndroid = $dAndroid->save($bridgeConnection, 
                $nomor_barcode, $id_transaksi, $jenis_pembelian, $jumlah_barang);
        } else {
            $sendResponToAndroid = $updateStok;
        }
    }
}


/**
 * <p>Mengembalikan respon request ke aplikasi agar dapat dideteksi hasil proses ini</p>
 */
echo json_encode($sendResponToAndroid);

