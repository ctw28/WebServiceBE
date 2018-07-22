<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author dan
 */

interface productInt {
    
    
    /**
     * <p>Fungsi yang digunakan untuk menyimpan data customer yang melakukan reservasi</p>
     * 
     * @param type $connection <br>data ckonesi ke database</br>
     */
    public function save($connection, $nomor_barcode, $nama_barang, $modal_harga, $harga_barang, $tanggal_masuk, $stok_barang, $type, $item, $suplier, $tgl_transaksi, $keterangan, $ket_sup, $harga_suplier);
    
    
    /**
     * <p>Fungsi yang digunakan untuk menghapus data user</p>
     * 
     * @param type $connection <br>data ckonesi ke database</br>
     */
    public function delete($connection, $id_product);
    
    
    /**
     * <p>Fungsi yang digunakan untuk semua data user</p>
     * 
     * @param type $connection <br>data ckonesi ke database</br>
     */
    public function selectAll($connection);
    
    
    /**
     * <p>Fungsi yang digunakan untuk memilih ID dari customer ini</p>
     * 
     * @param type $connection <br>data ckonesi ke database</br>
     */
    public function selectBy($connection, $id_product);
    
    
    public function update($connection, 
            $nomor_barcode_update, $nama_barang, $modal_harga, $harga_barang, $tanggal_masuk, $stok_barang, $type, $item, $suplier, $tgl_transaksi, $keterangan, $ket_sup, $harga_suplier);
    
    
    public function checkExistsData($connection, $ID);
    
}
