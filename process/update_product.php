<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../jsonParsingRespon.php';
include '../connectionToDB.php';

include '../intfc/productInt.php';
include '../impl/productImpl.php';


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
    
    $id_product = connectionToDB::sqlInjection($bridgeConnection, "nomor_barcode");
    $nama_barang = connectionToDB::sqlInjection($bridgeConnection, "nama_barang");
    $modal_barang = connectionToDB::sqlInjection($bridgeConnection, "modal_harga");
    $harga_barang = connectionToDB::sqlInjection($bridgeConnection, "harga_barang");
    $tgl_masuk = connectionToDB::sqlInjection($bridgeConnection, "tanggal_masuk");
    $stok = connectionToDB::sqlInjection($bridgeConnection, "stok_barang");
    $type = connectionToDB::sqlInjection($bridgeConnection, "type");
    $item = connectionToDB::sqlInjection($bridgeConnection, "item");
    $suplier = connectionToDB::sqlInjection($bridgeConnection, "suplier");
    $tgl_transaksi = connectionToDB::sqlInjection($bridgeConnection, "tgl_transaksi");
    $ket = connectionToDB::sqlInjection($bridgeConnection, "keterangan");
    $harga_suplier = connectionToDB::sqlInjection($bridgeConnection, "harga_suplier");
    $ket_suplier = connectionToDB::sqlInjection($bridgeConnection, "ket_sup");
    
    $dAndroid = new productImpl();
    $sendResponToAndroid = $dAndroid->update($bridgeConnection, 
            $id_product, $nama_barang, $modal_barang, $harga_barang, $tgl_masuk,
            $stok, $type, $item, $suplier, $tgl_transaksi,$ket, $ket_suplier, $harga_suplier);
}


/**
 * <p>Mengembalikan respon request ke ANDROID agar dapat dideteksi hasil proses ini</p>
 */
echo json_encode($sendResponToAndroid);

