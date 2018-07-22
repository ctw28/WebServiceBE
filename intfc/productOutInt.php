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

interface productOutInt {
    
    
    /**
     * <p>Fungsi yang digunakan untuk menyimpan data customer yang melakukan reservasi</p>
     * 
     * @param type $connection <br>data ckonesi ke database</br>
     */
    public function save($connection, $id_keluar,
            $nomor_barcode, $tanggal_keluar, $jumlah, $tujuan);
    
    
    /**
     * <p>Fungsi yang digunakan untuk menghapus data user</p>
     * 
     * @param type $connection <br>data ckonesi ke database</br>
     */
    public function delete($connection, $id_out);
    
    
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
    
    public function update($connection, $id_keluar, $nomor_barcode,  $tgl_keluar, $jumlah, $tujuan);
    
    
    public function checkExistsData($connection, $ID);
    
}
