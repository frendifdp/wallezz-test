<?php
    include 'conn.php';
    if($_GET['id'] != ''){
        $get = 'SELECT * FROM barang WHERE id='.$_GET['id'];
        $result = $conn->query($get);
        if($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $nm_barang = $row['nm_barang'];
                $kd_barang = $row['kd_barang'];
                $hrg_jual = $row['hrg_jual'];
                $hrg_beli = $row['hrg_jual'];
                $satuan = $row['satuan'];
                $kategori = $row['kategori'];
                echo "
                <form method='POST' action='e_barang.php'>
                <input type='hidden' value='$id' name='id'>
                    <pre>
<label>Nama Barang : </label><input type='text' value='$nm_barang' name='nm_barang'><br>
<label>Kode Barang : </label><input type='text' value='$kd_barang' name='kd_barang'><br>
<label>Harga Jual  : </label><input type='text' value='$hrg_jual' name='hrg_jual'><br>
<label>Harga Beli  : </label><input type='text' value='$hrg_beli' name='hrg_beli'><br>
<label>Satuan      : </label><input type='text' value='$satuan' name='satuan'><br>
<label>Kategori    : </label><input type='text' value='$kategori' name='kategori'><br>
                    </pre>
                <input type='submit' value='Edit' name='edit'>
                </form>
                ";
            }
        }
    }
?>