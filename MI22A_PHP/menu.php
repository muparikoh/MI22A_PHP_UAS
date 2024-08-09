<?php
     /**
     * NIM : 2257401092
     * NAMA : MUPARIKOH
     * KELAS MI22A
     */ 
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Menu</title>
  <style>
    body {
      margin: 0;
      padding: 0;
    }

    .main {
        display: flex;
    }
    .side-nav {
        background: palevioletred;
        width: 25vw;
        max-width: 200px;
        height: 100vh;
    }

    .side-nav nav {
        display: flex;
        flex-direction: column;
    }

    .side-nav nav a {
        font-family: sans;
        text-decoration: none;
        color: black;
        padding: 0.8rem;
    }

    .side-nav nav a:hover {
        background-color: rgba(0, 0, 0, 0.3);
    }
  </style>
</head>
<body>
<aside class="side-nav">
	<nav>
		<a href="admin.php">Beranda</a>
		<a href="produk.php">Produk</a>
		<a href="kategori.php">Kategori</a>
		<a href="logout.php">Logout</a>
	</nav>
</aside>
</body>
</html>