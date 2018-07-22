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
class penjualanBarangImpl implements penjualanBarangInt {

    public function selectAll($connection) {
        $responJSON = new jsonParsingRespon();
        $resultSelect = mysqli_query($connection, "SELECT * FROM 4th_data_penjualan_barang");

        return $responJSON->jsonReadingRespon($resultSelect, "all_data_penjualan_barang");
    }

    public function delete($connection, $id_transaksi) {
        $responJSON = new jsonParsingRespon();
        $resultSelect = mysqli_query($connection, "DELETE FROM 4th_data_penjualan_barang "
                . "WHERE "
                . "id_transaksi = '" . $id_transaksi . "'");

        return $responJSON->jsonWritingRespon($resultSelect, "delete_penjualan_barang");
    }

    public function save($connection, $nomor_barcode, $id_transaksi, $jenis_pemebelian, $jumlah_barang) {
        $responJSON = new jsonParsingRespon();
        //$result = NULL;
        
        
        //update($connection, $nomor_barcode, $jumlah_barang, $jenis_pemebelian);
       
        
        $result = mysqli_query($connection, "INSERT INTO  4th_data_penjualan_barang " .
                "(nomor_barcode , id_transaksi, jenis_pembelian, jumlah_barang) " .
                "VALUES ('" . $nomor_barcode . "', " .
                "'" . $id_transaksi . "', " .
                "'" . $jenis_pemebelian . "', " .
                "'" . $jumlah_barang . "' ) ");

        return $responJSON->jsonWritingRespon($result, "save_penjualan_barang");
    }

    public function selectByStatus($connection, $status) {
        $responJSON = new jsonParsingRespon();
        $resultSelect = mysqli_query($connection, "SELECT * FROM 4th_data_penjualan_barang ");

        return $responJSON->jsonReadingRespon($resultSelect, "all_data_penjualan_barang_by_status");
    }

    public function selectBy_($connection, $id_transaksi, $status) {
        $responJSON = new jsonParsingRespon();
        $resultSelect = mysqli_query($connection, "SELECT * FROM 4th_data_penjualan_barang "
                . "WHERE id_transaksi = '" . $id_transaksi . "'");

        return $responJSON->jsonReadingRespon($resultSelect, "all_data_penjualan_barang_by_status_and_id");
    }

    public function update($connection, $nomor_barcode, $id_transaksi, $jenis_pemebelian /* type */, $jumlah_barang) {
        $responJSON = new jsonParsingRespon();
        $resultSelect = mysqli_query($connection, "UPDATE 4th_data_penjualan_barang "
                . "SET jenis_pembelian = '" . $jenis_pemebelian . "', "
                . "jumlah_barang = '" . $jumlah_barang . "' "
                . "WHERE nomor_barcode = '" . $nomor_barcode . "' AND id_transaksi = '" . $id_transaksi . "' ");

        return $responJSON->jsonWritingRespon($resultSelect, "update_penjualan_barang");
    }

    public function checkExistsData($connection, $IDTransaksi, $nomor_barcode) {
        $responJSON = new jsonParsingRespon();
        $resultSelect = mysqli_query($connection, "SELECT * FROM 4th_data_penjualan_barang "
                . "WHERE id_transaksi = '" . $IDTransaksi . "' AND "
                . "nomor_barcode = '" . $nomor_barcode . "'");

        return $responJSON->jsonReadingRespon($resultSelect, "exists");
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
