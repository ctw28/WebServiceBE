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

interface penjualaInt {
    
    
    /**
     * <p>Fungsi yang digunakan untuk menyimpan data customer yang melakukan reservasi</p>
     * 
     * @param type $connection <br>data ckonesi ke database</br>
     */
    public function save($connection, 
            $id_transaksi, $tanggal_transaksi, $diskon, $harga_transaksi, $kasir);
    
    
    
    /**
     * 
     * @param type $connection
     */
    public function update($connection,
            $id_transaksi, $tanggal_transaksi, $diskon, $terbayar);
    
    
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
    
    
    public function checkExistsData($connection, $IDTransaksi);
    
    
}
