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

interface userInt {
    
    
    /**
     * <p>Fungsi yang digunakan untuk menyimpan data customer yang melakukan reservasi</p>
     * 
     * @param type $connection <br>data ckonesi ke database</br>
     */
    public function save($connection, $id_user, $username, $password, $type);
    
    
    /**
     * <p>Fungsi yang digunakan untuk menghapus data user</p>
     * 
     * @param type $connection <br>data ckonesi ke database</br>
     */
    public function delete($connection, $id_user);
    
    
    /**
     * <p>Fungsi yang digunakan untuk mengubah data user</p>
     * @param type $connection
     */
    public function update($connection, $id_user_update, $username, $password, $type);
    
    
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
    public function selectBy($connection, $username, $password, $type);
    
    
    public function checkExistsData($connection, $ID);
    
    
    
}
