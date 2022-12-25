<?php
class Detail_Pemesanan{
    //member1 variabel
    private $koneksi;
    //member2 konstruktor untuk koneksi database
    public function __construct(){
        global $dbh; //panggil instance object di koneksi.php 
        $this->koneksi = $dbh;
    }
    //member3 method2 CRUD
    public function dataPemesanan(){
        $sql = "SELECT * FROM detail_pemesanan  
                ORDER BY id DESC";
        //$data_pegawai = $dbh->query($sql);
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll(); 
        return $rs;   
    }

    public function getPemesanan($id){
        $sql = "SELECT * FROM detail_pemesanan
                WHERE id = ?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch(); 
        return $rs;   
    }

    public function simpan($data){
        $sql = "INSERT INTO detail_pemesanan (users_id, tiket_id, jml_tiket, tgl, total_harga) VALUES (?,?,?,?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }

    public function ubah($data){
        $sql = "UPDATE detail_pemesanan SET users_id=?, tiket_id=?, jml_tiket=?, tgl=?, total_harga=?
                WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }

    public function hapus($id){
        $sql = "DELETE FROM detail_pemesanan WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);  
    }

}