<?php
class Jadwal{
    //member1 variabel
    private $koneksi;
    //member2 konstruktor untuk koneksi database
    public function __construct(){
        global $dbh; //panggil instance object di koneksi.php 
        $this->koneksi = $dbh;
    }
    //member3 method2 CRUD
    public function dataJadwal(){
        $sql = "SELECT j.*, f.judul AS judul_film, f.cover AS foto, s.nama AS nama_studio 
                FROM jadwal j
                INNER JOIN film f ON f.id = j.film_id
                INNER JOIN studio s ON s.id = j.studio_id
                ORDER BY j.id DESC";
        //$data_pegawai = $dbh->query($sql);
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll(); 
        return $rs;   
    }

    public function getJadwal($id){
        $sql = "SELECT * FROM jadwal
                WHERE id = ?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch(); 
        return $rs;   
    }

    public function simpan($data){
        $sql = "INSERT INTO jadwal (waktu, tanggal, film_id, studio_id) VALUES (?,?,?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }

    public function ubah($data){
        $sql = "UPDATE jadwal SET waktu=?, tanggal=?, film_id=?, studio_id=?
                WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }

    public function hapus($id){
        $sql = "DELETE FROM jadwal WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);  
    }
    
}