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
class suplierImpl implements suplierInt {
    
    public function checkExistsData($connection, $ID) {
        $responJSON = new jsonParsingRespon();
        $resultSelect = mysqli_query($connection, "SELECT * FROM 6th_suplier "
                . "WHERE no_barcode = '". $ID ."' ");

        return $responJSON->jsonReadingRespon($resultSelect, "exists");
    }

    public function selectAll($connection) {
        $responJSON = new jsonParsingRespon();
        $resultSelect = mysqli_query($connection, "SELECT * FROM 6th_suplier");

        return $responJSON->jsonReadingRespon($resultSelect, "all_suplier_data");
    }
    public function selectSome($connection, $nobar) {
        $responJSON = new jsonParsingRespon();
        $resultSelect = mysqli_query($connection, "SELECT * FROM 6th_suplier WHERE no_barcode = '".$nobar."'");

        return $responJSON->jsonReadingRespon($resultSelect, "some_suplier_data");
    }

    public function delete($connection, $id_suplier) {
        $responJSON = new jsonParsingRespon();
        $result = mysqli_query($connection, "DELETE FROM 6th_suplier " 
                . "WHERE no_barcode = '".$id_suplier."' ");
        
        return $responJSON->jsonWritingRespon($result, "delete_suplier");
    }

    public function save($connection, $no_barcode, $suplier, $tgl_transaksi, $harga_awal, $harga_modal, $jml, $ket_suplier) {
        //INSERT INTO 1st_data_barang (nomor_barcode, nama_barang, modal_harga, harga_barang, tanggal_masuk, stok_barang, type, item, suplier, keterangan) VALUES ('3', '3', '3', '3', '2016-07-06', '3', '3', '3', '3', '3')
        $responJSON = new jsonParsingRespon();
        $result = mysqli_query($connection, "INSERT INTO 6th_suplier "
                . "(no_barcode, suplier, tgl_transaksi, harga_awal, harga_modal, jml, ket_suplier) "
                . "VALUES ('".$no_barcode."', "
                . "'".$suplier."', "
                . "'".$tgl_transaksi."', "
                . "'".$harga_awal."', "
                . "'".$harga_modal."', "
                . "'".$jml."', "
                . "'".$ket_suplier."') ");
        
        return $responJSON->jsonWritingRespon($result, "save_suplier");
    }

    public function selectBy($connection, $no_barcode) {
        $responJSON = new jsonParsingRespon();
        $resultSelect = mysqli_query($connection, "SELECT * FROM 6th_suplier "
                . "WHERE no_barcode = '". $ID ."' ");

        return $responJSON->jsonReadingRespon($resultSelect, "select_by");
    }

    public function update($connection, $no_barcode, $suplier, $tgl_transaksi, $harga_awal, $harga_modal, $jml, $ket_suplier) {
        $responJSON = new jsonParsingRespon();
        $result = mysqli_query($connection, "UPDATE 6th_suplier "
                . "SET suplier = '".$suplier."', "
                . "tgl_transaksi = '".$tgl_transaksi."', "
                . "harga_awal = '".$harga_awal."', "
                . "harga_modal = '".$harga_modal."', "
                . "jml = '".$jml."', "
                . "ket_suplier = '".$ket_suplier."' "
                . "WHERE 6th_suplier.no_barcode = '".$$no_barcode."' ");
        
        return $responJSON->jsonWritingRespon($result, "update_suplier");
    }

    public function updateStock($connection, $nomor_barcode, $jumlah_beli, $type_pembelian) {
        $responJSON = new jsonParsingRespon();
        $resultSelect = mysqli_query($connection, "SELECT * FROM 1st_data_barang "
                . "WHERE "
                . "nomor_barcode = '" . $nomor_barcode . "' ");

        $idex = 0;
        $stok = -100;
        while ($row = mysqli_fetch_array($resultSelect)) {
            $stok = $row["stok_barang"];
            $idex++;
        }
        
        $finalStock = $stok - $jumlah_beli;

        $updateStok = NULL;
        if ($idex > 0) {
            $updateStok = mysqli_query($connection, "UPDATE 1st_data_barang "
                    . "SET stok_barang = '" . $finalStock . "' "
                    . "WHERE nomor_barcode = '" . $nomor_barcode . "'  ");
        }
        
        return $responJSON->jsonWritingRespon($updateStok, "update_stok");
    }
}
