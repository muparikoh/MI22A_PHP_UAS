<?php 
     /**
     * NIM : 2257401092
     * NAMA : MUPARIKOH
     * KELAS MI22A
     */ 
    session_start();
    $id = $_GET['id'];

    include 'koneksi.php';

    $sql = "DELETE FROM produk WHERE produk. kode = '$id';";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        $_SESSION['success'] = "Barang Berhasil dihapus";
        header('location: produk.php');

    } else {
        $_SESSION['error'] = "Barang Gagal dihapus";
        header('location: produk.php');
    }
?>