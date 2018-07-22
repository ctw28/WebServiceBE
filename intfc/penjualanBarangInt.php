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

interface penjualanBarangInt {
    
    
    /**
     * <p>Fungsi yang digunakan untuk menyimpan data customer yang melakukan </p>
     * 
     * @param type $connection <br>data ckonesi ke database</br>
     */
    public function save($connection, 
            $nomor_barcode, $id_transaksi, $jenis_pemebelian, $jumlah_barang);
    
    
    /**
     * 
     * @param type $connection
     */
    public function update($connection, $nomor_barcode, $id_transaksi, $jenis_pemebelian, $jumlah_barang);
    
    
    /**
     * <p>Fungsi yang digunakan untuk menghapus data user</p>
     * 
     * @param type $connection <br>data ckonesi ke database</br>
     */
    public function delete($connection, $id_transaksi);
    
    
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
    public function selectByStatus($connection, $status);
    
    
    /**
     * <p>Fungsi yang digunakan untuk memilih ID dari customer ini</p>
     * 
     * @param type $connection <br>data ckonesi ke database</br>
     */
    public function selectBy_($connection, $id_transaksi, $status);
    

    public function checkExistsData($connection, $IDTransaksi, $nomor_barcode) ;   
    
    
    public function updateStock($connection, $nomor_barcode, $jumlah_beli, $type_pembelian);
    
}
