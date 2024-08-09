<?php 
    /**
     * NIM : 2257401092
     * NAMA : MUPARIKOH
     * KELAS MI22A
     */ 
    $id = $_GET['id'];

    include 'koneksi.php';

    $sql = "DELETE FROM kategori WHERE nama = '$id';";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        header('location: kategori.php');

    } else {
        echo "Gagal Hapus Barang";
    }
?>