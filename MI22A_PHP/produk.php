<?php
 /**
     * NIM : 2257401092
     * NAMA : MUPARIKOH
     * KELAS MI22A
     */  
    
    include 'cek_session.php';
    include 'menu.php';
    include 'koneksi.php';

    $sql = "SELECT kode, nama, kategori, deskripsi, gambar FROM produk";
    $query = mysqli_query($koneksi, $sql); 

    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }
    
    if ($op == 'edit') {
        $id         = $_GET['id'];
        $sql       = "select * from produk where kode = '$id'";
        $q1         = mysqli_query($koneksi, $sql);
        $r1         = mysqli_fetch_array($q1);
        $id        = $r1['kode'];
        $nama       = $r1['nama'];
        $kategori   = $r1['kategori'];
        $deskripsi  = $r1['deskripsi'];
        $gambar     = $r1['gambar'];
    
        if ($id == '') {
            $error = "Data tidak ditemukan";
        }
    }
?>

<style>
     body{
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
    }  
    .category {
        width: 500px;
        padding: 20px;
    }
    .text-gray {
	    color: grey;
    }
    .category table th{
        background-color: darkorchid;;
        color: black;
        border: 1px solid black;
        padding: 15px;
        text-align: left;
    }
    .category table td{
        background-color:palevioletred;;
        border: 1px solid black;
        padding: 15px;
        text-align: left;
    }
 
</style>
<body>
    <div class="category">
        <div style="display:flex; gap: 1em">        
            <div class="row align-items-center py-3 px-xl-5">    
                
                <h3>-- Produk --</h3>

                <form action="tambah_produk.php" method="get">
                <button type="submit" name="tambah">Tambah Produk</button>
                <br><br>
                </form>

                <p>
                    <?php
                    if(isset($_SESSION['error'])) {
                    echo   "<span style='color:red'>" .  $_SESSION['error'] . "</span>";
                    unset($_SESSION['error']);
                    }
                    
                    if(isset($_SESSION['success'])) {
                        echo   "<span style='color:green'>" .  $_SESSION['success'] . "</span>";
                        unset($_SESSION['success']);
                        }
                   ?>
                </p>

                <table border="1" cellspacing="0" cellpadding="10px">
                    <tr>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                   
                    <?php 
                    $sql   = "select * from produk order by kode desc";
                    $q2     = mysqli_query($koneksi, $sql);
                    $urut   = 1;
                    while($row = mysqli_fetch_assoc($query)) {
                        $id         = $row['kode'];
                        $nama       = $row['nama'];
                        $kategori   = $row['kategori'];
                        $deskripsi  = $row['deskripsi'];
                        $gambar     = $row['gambar'];
                    ?>
                        
                        <tr>  
                        <td><?php echo $row['kode']?></td>
                        <td><?php echo $row['nama']?></td>
                        <td><?php echo $row['kategori']?></td>
                        <td>
                            <a href="edit.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>    
                            <a href="hapus_produk.php?id=<?php echo $row['kode']; ?>" onclick="return confirm('Awas ke delete datanya?')" style="color: black;">Hapus</a> 
                        </td>
                        </tr>  
                    <?php 
                    }
                    ?> 
                </table>

            </div>
        </div>
    </div>
</body>

