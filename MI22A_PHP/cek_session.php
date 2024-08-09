<?php
 /**
     * NIM : 2257401092
     * NAMA : MUPARIKOH
     * KELAS MI22A
     */ 
session_start();
if (!isset($_SESSION['user'])){
    $_SESSION['error'] = "Maaf Anda Harus Login";
    header('location: login.php');
}

?>