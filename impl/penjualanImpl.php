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
class penjualanImpl implements penjualaInt {
    
    

    public function selectAll($connection) {
        $responJSON = new jsonParsingRespon();
        $resultSelect = mysqli_query($connection, "SELECT * FROM 2nd_data_penjualan ORDER BY tanggal_transaksi DESC");

        return $responJSON->jsonReadingRespon($resultSelect, "all_data_penjualan");
    }

    public function delete($connection, $id_transaksi) {
        $responJSON = new jsonParsingRespon();
        $resultSelect = mysqli_query($connection, "DELETE FROM 2nd_data_penjualan "
                . "WHERE "
                . "id_transaksi = '".$id_transaksi."'");

        return $responJSON->jsonWritingRespon($resultSelect, "delete_penjualan_barang");
    }

    public function save($connection, $id_transaksi, $tanggal_transaksi, $diskon, $harga_transaksi, $kasir) {
        $responJSON = new jsonParsingRespon();
        $result = mysqli_query($connection, 
                "INSERT INTO  2nd_data_penjualan " .
                "(id_transaksi, tanggal_transaksi, diskon, cost_transaksi, nama_kasir) " .
                "VALUES ('".$id_transaksi."', ".
                "'". $tanggal_transaksi ."', ".
                "'". $diskon ."', ". 
                "'". $harga_transaksi ."', ". 
                "'". $kasir ."' ) ");
        
        return $responJSON->jsonWritingRespon($result, "save_penjualan");
    }

    public function selectByStatus($connection, $status) {
        $responJSON = new jsonParsingRespon();
        $resultSelect = mysqli_query($connection, "SELECT * FROM 2nd_data_penjualan ");

        return $responJSON->jsonReadingRespon($resultSelect, "all_data_penjualan_by_status");
    }
    //all_data_penjualan_by_status

    public function update($connection,
            $id_transaksi, $tanggal_transaksi, $diskon, $harga_transaksi) {
        $responJSON = new jsonParsingRespon();
        $resultSelect = mysqli_query($connection, "UPDATE 2nd_data_penjualan "
                . "SET tanggal_transaksi = '".$tanggal_transaksi."', "
                
                . "diskon = '".$diskon."', "
                . "cost_transaksi = '".$harga_transaksi."' "
                
                . "WHERE id_transaksi = '".$id_transaksi."' ");

        return $responJSON->jsonWritingRespon($resultSelect, "update_penjualan");
    }

    public function checkExistsData($connection, $IDTransaksi) {
        $responJSON = new jsonParsingRespon();
        $resultSelect = mysqli_query($connection, "SELECT * FROM 2nd_data_penjualan "
                . "WHERE id_transaksi = '". $IDTransaksi ."' ");

        return $responJSON->jsonReadingRespon($resultSelect, "exists");
    }

}
