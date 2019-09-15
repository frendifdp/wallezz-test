<?php
    include 'conn.php';
    $getData = 'SELECT * FROM penjualan';
    $result = $conn->query($getData);
    $i = 1;
?>
<h1>Tabel Penjualan</h1>
<table border="1px">
    <tr>
        <th>No</th>
        <th>No Faktur</th>
        <th>Nama Konsumen</th>
        <th>Kode Barang</th>
        <th>Jumlah</th>
        <th>Harga Satuan</th>
        <th>Total</th>
    </tr>
<?php
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
?>
        <tr>
            <td><?=$i?></td>
            <td><?=$row['no_faktur']?></td>
            <td><?=$row['nm_konsumen']?></td>
            <td><?=$row['kd_barang']?></td>
            <td><?=$row['jumlah']?></td>
            <td><?=$row['hrg_satuan']?></td>
            <td><?=$row['hrg_total']?></td>
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