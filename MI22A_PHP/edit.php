<?php
    /**
     * NIM : 2257401092
     * NAMA : MUPARIKOH
     * KELAS MI22A
     */ 
    
    include 'cek_session.php';
    include 'menu.php';
    include 'koneksi.php';

    $id         = "";
    $nama       = "";
    $kategori   = "";
    $deskripsi  = "";
    $gambar     = "";
    $sukses     = "";
    $error      = "";

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
if (isset($_POST['simpan'])) {
    $nama        = $_POST['nama'];
    $kategori    = $_POST['kategori'];
    $deskripsi   = $_POST['deskripsi'];
    $gambar      = $_POST['gambar'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
         body{
        height: 100vh;
        background-position: center;
        background-repeat: no-repeat;
        } 
        .mx-auto {
           
            position: absolute;
        left: 45%;
        top: 30%;
        transform: translate(-50%,-50%);
        padding: 20px 25px;
        width: 800px;
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
       
        <div class="card">
            <div class="card-header">
                Edit Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=edit.php");
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=edit.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="kode" class="col-sm-2 col-form-label">Kode Produk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $id ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Produk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="kategori" id="kategori">
                            <option value="">- Pilih Kategori -</option>
                                <option value="Aksesoris" <?php if ($kategori == "Aksesoris") echo "selected" ?>>Aksesoris</option>
                                <option value="Pakaian" <?php if ($kategori == "Pakaian") echo "selected" ?>>Pakaian</option>
                                <option value="Alat Dapur" <?php if ($kategori == "Alat Dapur") echo "selected" ?>>Alat Dapur</option>
                                <option value="Minuman" <?php if ($kategori == "Minuman") echo "selected" ?>>Minuman</option>
                                <option value="Mainan" <?php if ($kategori == "Mainan") echo "selected" ?>>Mainan</option>
                                <option value="Elektronik" <?php if ($kategori == "Elektronik") echo "selected" ?>>Elektronik</option>
                                <option value="Makanan" <?php if ($kategori == "Makanan") echo "selected" ?>>Makanan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $deskripsi ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="gambar" name="gambar" value="<?php echo $gambar ?>">
                        </div>
                    </div>
                        <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                        <a href="produk.php">Kembali</a>
                    </div>
                </form>
                  <?php 
                if (isset($_POST['simpan'])) {
                    include 'koneksi.php';
                    $nama        = $_POST['nama'];
                    $kategori    = $_POST['kategori'];
                    $deskripsi   = $_POST['deskripsi'];
                    $gambar      = $_POST['gambar'];

                    $sql = "UPDATE produk SET nama = '$nama', kategori = '$kategori', deskripsi = '$deskripsi', gambar = '$gambar' WHERE kode = '$id'; ";
                    $result = mysqli_query($koneksi, $sql);
                    
                        if ($q1) {
                            $sukses     = "Berhasil memasukkan data baru";
                        } else {
                            $error      = "Gagal memasukkan data";
                        }
                }
                ?>
            </div>
        </div>
        </div>
</body>

</html>
