<?php
class Film{
    //member1 variabel
    private $koneksi;
    //member2 konstruktor untuk koneksi database
    public function __construct(){
        global $dbh; //panggil instance object di koneksi.php 
        $this->koneksi = $dbh;
    }
    
    //member3 method2 CRUD
    public function dataFilm(){
        $sql = "SELECT f.*, k.id AS kategori_id, k.kategori AS nama_kategori
                FROM film f 
                INNER JOIN kategori k ON k.id = f.kategori_id
                ORDER BY f.id DESC";
        //$data_pegawai = $dbh->query($sql);
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll(); 
        return $rs;   
    }
    
    public function getFilm($id){
        $sql = "SELECT * FROM film
                WHERE id = ?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch(); 
        return $rs;   
    }

    public function simpan($data){
        $sql = "INSERT INTO film (judul, tanggal_rilis, sinopsis, cover, kategori_id) VALUES (?,?,?,?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }

    public function ubah($data){
        $sql = "UPDATE film SET judul=?, tanggal_rilis=?, sinopsis=?, cover=?, kategori_id=? 
                WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }

    public function hapus($id){
        $sql = "DELETE FROM film WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);  
    }
}