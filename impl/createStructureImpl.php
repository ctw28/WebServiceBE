<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of createStructureImpl
 *
 * @author AsyncTask.Void.087
 */
class createStructureImpl implements createStructureInt {
    //put your code here
    
    var $db_name = "db_toko_bangunan_control_website";
    
    public function create_1st_table($connection) {
        $step_1st = mysqli_query($connection, 
                 "CREATE TABLE IF NOT EXISTS ". $this->db_name .".1st_data_barang ( "
                ."nomor_barcode varchar(100) NOT NULL, "
                ."nama_barang varchar(100) NOT NULL, "
                ."modal_harga int(11) NOT NULL, "
                ."harga_barang int(11) NOT NULL, "
                ."tanggal_masuk date NOT NULL, "
                ."stok_barang int(11) NOT NULL, "
                ."type varchar(25) NOT NULL, "
                ."item varchar(50) DEFAULT NULL, "
                ."gudang varchar(100) DEFAULT NULL, "
                ."keterangan varchar(300) DEFAULT NULL, "
                ."PRIMARY KEY (nomor_barcode) "
                .") ENGINE=InnoDB DEFAULT CHARSET=latin1;");
        return $step_1st;
    }

    
    public function create_2nd_table($connection) {
        $step_2nd = mysqli_query($connection, 
                     "CREATE TABLE IF NOT EXISTS ". $this->db_name .".2nd_data_penjualan ( "
                    ."id_transaksi varchar(100) NOT NULL, "
                    ."tanggal_transaksi date NOT NULL, "
                    ."diskon DOUBLE NOT NULL, "
                    ."cost_transaksi int(11) NOT NULL, "
                    ."nama_kasir varchar(100) NOT NULL, "
                    ."PRIMARY KEY (id_transaksi) "
                    .") ENGINE=InnoDB DEFAULT CHARSET=latin1;");
        
        return $step_2nd;
    }
    
    

    public function create_3rd_table($connection) {
        $step_3rd = mysqli_query($connection, 
                 "CREATE TABLE IF NOT EXISTS ". $this->db_name .".3rd_administrator ( "
                ."id_administrator varchar(50) NOT NULL, "
                ."username varchar(50) NOT NULL, "
                ."password varchar(16) NOT NULL, "
                ."type varchar(20) NOT NULL, "
                ."PRIMARY KEY (id_administrator)"
                .") ENGINE=InnoDB DEFAULT CHARSET=latin1;");
        
        return $step_3rd;
    }

    public function create_4th_table($connection) {
        $step_4th = mysqli_query($connection, 
                 "CREATE TABLE IF NOT EXISTS ". $this->db_name .".4th_data_penjualan_barang ( "
                ."nomor_barcode varchar(100) NOT NULL, "
                ."id_transaksi varchar(100) NOT NULL, "
                ."jenis_pembelian varchar(25) NOT NULL, "
                ."jumlah_barang int(11) NOT NULL "
                .") ENGINE=InnoDB DEFAULT CHARSET=latin1;");
        return $step_4th;
    }

    public function create_5th_table($connection) {
        $step_5th = mysqli_query($connection, 
                 "CREATE TABLE IF NOT EXISTS ". $this->db_name .".5th_barang_keluar ( "
                ."id_keluar varchar(50) NOT NULL, "
                ."nomor_barcode varchar(100) NOT NULL, "
                ."tanggal_keluar varchar(20) NOT NULL, "
                ."jumlah int(11) NOT NULL, "
                ."tujuan varchar(50) NOT NULL, "
                ."PRIMARY KEY (id_keluar) "
                .") ENGINE=InnoDB DEFAULT CHARSET=latin1;");
        return $step_5th;
    }

    public function create_db($connection) {
        $stepDB = mysqli_query($connection, "CREATE DATABASE IF NOT EXISTS ". $this->db_name ."");
        return $stepDB;
    }

}
