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
class productImpl implements productInt {
    
    
    public function checkExistsData($connection, $ID) {
        $responJSON = new jsonParsingRespon();
        $resultSelect = mysqli_query($connection, "SELECT * FROM 1st_data_barang "
                . "WHERE nomor_barcode = '". $ID ."' ");

        return $responJSON->jsonReadingRespon($resultSelect, "exists");
    }
    
    public function selectAll($connection) {
        $responJSON = new jsonParsingRespon();
        $resultSelect = mysqli_query($connection, "SELECT * FROM 1st_data_barang");

        return $responJSON->jsonReadingRespon($resultSelect, "all_product_data");
    }

    public function delete($connection, $id_product) {
        $responJSON = new jsonParsingRespon();
        $result = mysqli_query($connection, "DELETE FROM 1st_data_barang " 
                . "WHERE nomor_barcode = '".$id_product."' ");
        
        return $responJSON->jsonWritingRespon($result, "delete_product");
    }

    public function save($connection, $nomor_barcode, $nama_barang, $modal_harga, $harga_barang, $tanggal_masuk, $stok_barang, $type, $item, $suplier, $tgl_transaksi, $keterangan, $ket_sup, $harga_suplier) {
        //INSERT INTO 1st_data_barang (nomor_barcode, nama_barang, modal_harga, harga_barang, tanggal_masuk, stok_barang, type, item, suplier, keterangan) VALUES ('3', '3', '3', '3', '2016-07-06', '3', '3', '3', '3', '3')
        $responJSON = new jsonParsingRespon();
        $result = mysqli_query($connection, "INSERT INTO 1st_data_barang "
                . "(nomor_barcode, nama_barang, modal_harga, harga_barang, tanggal_masuk, stok_barang, type, item, suplier, tgl_transaksi, keterangan, ket_sup, harga_suplier) "
                . "VALUES ('".$nomor_barcode."', "
                . "'".$nama_barang."', "
                . "'".$modal_harga."', "
                . "'".$harga_barang."', "
                . "'".$tanggal_masuk."', "
                . "'".$stok_barang."', "
                . "'".$type."', "
                . "'".$item."', "
                . "'".$suplier."', "
                . "'".$tgl_transaksi."', "
                . "'".$keterangan."', "
                . "'".$ket_sup."', "
                . "'".$harga_suplier."') ");
        
        return $responJSON->jsonWritingRespon($result, "save_product");
    }

    public function selectBy($connection, $id_product) {
        
    }

    public function update($connection, $nomor_barcode_update, $nama_barang, $modal_harga, $harga_barang, $tanggal_masuk, $stok_barang, $type, $item, $suplier, $tgl_transaksi, $keterangan, $ket_sup, $harga_suplier) {
        $responJSON = new jsonParsingRespon();
        $result = mysqli_query($connection, "UPDATE 1st_data_barang "
                . "SET nama_barang = '".$nama_barang."', "
                . "modal_harga = '".$modal_harga."', "
                . "harga_barang = '".$harga_barang."', "
                . "tanggal_masuk = '".$tanggal_masuk."', "
                . "stok_barang = '".$stok_barang."', "
                . "type = '".$type."', "
                . "item = '".$item."', "
                . "suplier = '".$suplier."', "
                . "tgl_transaksi = '".$tgl_transaksi."', "
                . "keterangan = '".$keterangan."', "
                . "ket_sup = '".$ket_sup."', "
                . "harga_suplier = '".$harga_suplier."' "
                . " WHERE 1st_data_barang.nomor_barcode = '".$nomor_barcode_update."' ");
        
        return $responJSON->jsonWritingRespon($result, "update_product");
    }

}
