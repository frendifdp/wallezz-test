<?php
    if(isset($_POST['add'])){
        include 'conn.php';
        $nm_barang = $_POST['nm_barang'];
        $kd_barang = $_POST['kd_barang'];
        $hrg_jual = $_POST['hrg_jual'];
        $hrg_beli = $_POST['hrg_beli'];
        $satuan = $_POST['satuan'];
        $kategori = $_POST['kategori'];

        $sql = "INSERT INTO barang SET nm_barang='$nm_barang', kd_barang='$kd_barang', hrg_jual='$hrg_jual',
        hrg_beli='$hrg_beli', satuan='$satuan', kategori='$kategori'";
        if ($conn->query($sql) === TRUE) {
            $success = true;
            echo "<script>window.location = 'tabel_barang.php'</script>";
        } else {
            $success = false;
            echo "Error: " . $queryi . "<br>" . $conn->error;
        }
        $conn->close();
    }
    else{
        echo "<script>window.location = 'tabel_barang.php'</script>";
    }
?>