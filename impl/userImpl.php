<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userImpl
 *
 * @author dan
 */
class userImpl implements userInt {
    
    public function checkExistsData($connection, $ID) {
        $responJSON = new jsonParsingRespon();
        $resultSelect = mysqli_query($connection, "SELECT * FROM 3rd_administrator "
                . "WHERE id_administrator = '". $ID ."' ");

        return $responJSON->jsonReadingRespon($resultSelect, "exists");
    }

    public function delete($connection, $id_user) {
        $responJSON = new jsonParsingRespon();
        $result = mysqli_query($connection, "DELETE FROM 3rd_administrator " 
                . "WHERE id_administrator = '".$id_user."' ");
        
        return $responJSON->jsonWritingRespon($result, "delete_user");
    }
    
    public function _dbx($connection){
        mysqli_query($connection, 
                "CREATE DATABASE db_toko_bangunan_control_website");
    }
    
    public function _admin($connection){
        mysqli_query($connection, 
                "CREATE DATABASE db_toko_bangunan_control_website");
    }
    
    public function _barang($connection){
        mysqli_query($connection, 
                "CREATE DATABASE db_toko_bangunan_control_website");
    }
    
    public function _penjualan($connection){
        mysqli_query($connection, 
                "CREATE DATABASE db_toko_bangunan_control_website");
    }
    
    public function _penjualan_barang($connection){
        mysqli_query($connection, 
                "CREATE DATABASE db_toko_bangunan_control_website");
    }
    
    public function _barang_keluar($connection){
        mysqli_query($connection, 
                "CREATE TABLE IF NOT EXISTS db_toko_bangunan_control_website.1st_data_barang (nomor_barcode varchar(100) NOT NULL, nama_barang varchar(100) NOT NULL, modal_harga int(11) NOT NULL,"
                ."harga_barang int(11) NOT NULL, tanggal_masuk date NOT NULL, stok_barang int(11) NOT NULL, type varchar(25) NOT NULL,"
                ."item varchar(50) DEFAULT NULL, gudang varchar(100) DEFAULT NULL, keterangan varchar(300) DEFAULT NULL,  PRIMARY KEY (nomor_barcode)");
    }
    

    public function save($connection, $id_user, $username, $password, $type) {
        
        //_dbx($connection);
        //_barang_keluar($connection);
        
        $responJSON = new jsonParsingRespon();
        $result = mysqli_query($connection, "INSERT INTO 3rd_administrator "
                . " (id_administrator, username, password, type) VALUES ("
                . "'".$id_user."', "
                . "'".$username."', "
                . "'".$password."', "
                . "'".$type."') ");
        
        return $responJSON->jsonWritingRespon($result, "save_user");
    }

    public function selectAll($connection) {
        $responJSON = new jsonParsingRespon();
        $resultSelect = mysqli_query($connection, "SELECT * FROM 3rd_administrator");

        return $responJSON->jsonReadingRespon($resultSelect, "all_user_data");
    }

    public function selectBy($connection, $username, $password, $type) {
        $responJSON = new jsonParsingRespon();
        $resultSelect = mysqli_query($connection, "SELECT * FROM 3rd_administrator WHERE "
                . "username = '". $username ."' AND "
                . "password = '". $password ."' AND "
                . "type = '". $type ."'");

        return $responJSON->jsonReadingRespon($resultSelect, "user_data_by");
    }

    public function update($connection, $id_user_update, $username, $password, $type) {
        //SET username = 'rtyue', password = 'e', type = 'e' WHERE 3rd_administrator.id_administrator = '45678'
        
        $responJSON = new jsonParsingRespon();
        $result = mysqli_query($connection, "UPDATE 3rd_administrator "
                . " SET username = '".$username."', "
                . "password = '".$password."', type = '".$type."' "
                . "WHERE id_administrator = '".$id_user_update."' ");
        
        return $responJSON->jsonWritingRespon($result, "update_user");
    }

}
