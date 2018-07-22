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

interface suplierInt {
    
    
    /**
     * <p>Fungsi yang digunakan untuk menyimpan data customer yang melakukan reservasi</p>
     * 
     * @param type $connection <br>data ckonesi ke database</br>
     */
    public function save($connection, $no_barcode, $suplier, $tgl_transaksi, $harga_awal, $harga_modal, $jml, $ket_suplier);
    
    
    /**
     * <p>Fungsi yang digunakan untuk menghapus data user</p>
     * 
     * @param type $connection <br>data ckonesi ke database</br>
     */
    public function delete($connection, $id_suplier);
    
    
    /**
     * <p>Fungsi yang digunakan untuk semua data user</p>
     * 
     * @param type $connection <br>data ckonesi ke database</br>
     */
    public function selectAll($connection);
    public function selectSome($connection, $nobar);
    
    
    /**
     * <p>Fungsi yang digunakan untuk memilih ID dari customer ini</p>
     * 
     * @param type $connection <br>data ckonesi ke database</br>
     */
    public function selectBy($connection, $id_suplier);
    
    
    public function update($connection, $no_barcode, $suplier, $tgl_transaksi, $harga_awal, $harga_modal, $jml, $ket_suplier);
    
    
    public function checkExistsData($connection, $ID);
    
}
