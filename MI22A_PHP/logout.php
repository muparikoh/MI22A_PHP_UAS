<?php
    /**
     * NIM : 2257401092
     * NAMA : MUPARIKOH
     * KELAS MI22A
     */ 
    session_start();
    session_destroy();
    session_unset();

    header('location:login.php');
?>