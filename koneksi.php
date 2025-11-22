<?php
    $host = 'localhost';
    $user =  'root' ;
    $password = '';
    $db = 'db';

    $koneksi = new mysqli($host, $user, $password, $db);

    if($koneksi->connect_error){
        echo "koneksi database gagal : " . $koneksi->connect_error;
    }else{
        // echo "koneksi database berhasil";
    }
?>