<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of productImpl
 *
 * @author AsyncTask.Void.087
 */
class productOutImpl implements productOutInt {
    
    

    public function selectAll($connection) {
        $responJSON = new jsonParsingRespon();
        $resultSelect = mysqli_query($connection, "SELECT * FROM 5th_barang_keluar");

        return $responJSON->jsonReadingRespon($resultSelect, "all_product_out_data");
    }


    public function delete($connection, $id_product) {
        $responJSON = new jsonParsingRespon();
        $result = mysqli_query($connection, "DELETE FROM 5th_barang_keluar " 
                . "WHERE id_keluar = '".$id_product."' ");
        
        return $responJSON->jsonWritingRespon($result, "delete_product_out");
    }
    
    
    

    public function save($connection,  $id_keluar,
            $nomor_barcode, $tanggal_keluar, $jumlah, $tujuan) {
        // $id_keluar,
            //$nomor_barcode, $tanggal_keluar, $jumlah, $tujuan);
        $responJSON = new jsonParsingRespon();
        $result = mysqli_query($connection, "INSERT INTO 5th_barang_keluar "
                . "(id_keluar, nomor_barcode, tanggal_keluar, jumlah, tujuan) "
                . "VALUES ('".$id_keluar."', "
                . "'".$nomor_barcode."', "
                . "'".$tanggal_keluar."', "
                . "'".$jumlah."', "
                . "'".$tujuan."') ");
        
        return $responJSON->jsonWritingRespon($result, "save_product_out");
    }

    public function selectBy($connection, $id_product) {
        
    }

    public function update($connection, $id_keluar,  $nomor_barcode,  $tgl_keluar, $jumlah, $tujuan){
        $responJSON = new jsonParsingRespon();
        $result = mysqli_query($connection, "UPDATE 5th_barang_keluar "
                . "SET nomor_barcode = '".$nomor_barcode."', "
                . "tanggal_keluar = '".$tgl_keluar."', "
                . "jumlah = '".$jumlah."', "
                . "tujuan = '".$tujuan."' "
                . "WHERE 5th_barang_keluar.id_keluar = '".$id_keluar."' ");
        
        return $responJSON->jsonWritingRespon($result, "update_product_out");
    }
    
    
    public function checkExistsData($connection, $ID) {
        $responJSON = new jsonParsingRespon();
        $resultSelect = mysqli_query($connection, "SELECT * FROM 5th_barang_keluar "
                . "WHERE id_keluar = '". $ID ."' ");

        return $responJSON->jsonReadingRespon($resultSelect, "exists");
    }

}
