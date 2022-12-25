<?php
class Users{
    //member1 variabel
    private $koneksi;
    //member2 konstruktor untuk koneksi database
    public function __construct(){
        global $dbh; //panggil instance object di koneksi.php 
        $this->koneksi = $dbh;
    }
    //member3 method2 CRUD
    public function dataUsers(){
        $sql = "SELECT * FROM users ORDER BY id DESC";
        //$data_pegawai = $dbh->query($sql);
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll(); 
        return $rs;   
    }
    
    public function getUsers($id){
        $sql = "SELECT * FROM users
                WHERE id = ?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch(); 
        return $rs;   
    }

    public function simpan($data){
        $sql = "INSERT INTO users (fullname, jenis_kelamin, email, username, password, no_hp, role, foto)
                VALUES (?,?,?,?,SHA1(MD5(SHA1(?))),?,?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }

    public function ubah($data){
        $sql = "UPDATE users SET fullname=?, jenis_kelamin=?, email=?, username=?, 
                password=SHA1(MD5(SHA1(?))), no_hp=?, role=?, foto=? WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }
    
    public function hapus($id){
        $sql = "DELETE FROM users WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);  
    }

    public function cekLogin($data){
        $sql = "SELECT * FROM users WHERE username = ? AND password = SHA1(MD5(SHA1(?)))";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
        $rs = $ps->fetch(); 
        return $rs;   
    }
}