<?php
    include 'conn.php';
    $getData = 'SELECT * FROM barang';
    $result = $conn->query($getData);
    $i = 1;
?>
<h1>Tabel Barang</h1>
<a href="tambah.php">Tambah Barang</a><br><br>
<table border="1px">
    <tr>
        <th>No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Harga Jual</th>
        <th>Harga Beli</th>
        <th>Satuan</th>
        <th>Kategori</th>
        <th></th>
    </tr>
<?php
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
?>
        <tr>
            <td><?=$i?></td>
            <td><a style="text-decoration: none" href="edit.php?id=<?=$row['id']?>"><?=$row['kd_barang']?></a></td>
            <td><?=$row['nm_barang']?></td>
            <td><?=$row['hrg_jual']?></td>
            <td><?=$row['hrg_beli']?></td>
            <td><?=$row['satuan']?></td>
            <td><?=$row['kategori']?></td>
            <td><a style="color: red; text-decoration: none" href="delete.php?id=<?=$row['id']?>">&nbspx&nbsp</a></td>
        </tr>
<?php
        $i++;
        }
    } else {
        echo "<tr><td colspan='7' style='text-align: center'>0 result</td></tr>";
    }
    $conn->close();
?>
</table>