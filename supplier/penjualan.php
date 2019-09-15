<?php
    include 'conn.php';
    $getData = 'SELECT * FROM barang';
    $result = $conn->query($getData);
    $i = 1;
?>
<h1>Penjualan</h1>
<div style="width: 45%; float: left">
    <table border="1px">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Harga</th>
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
                <td id="nm<?=$row['id']?>"><?=$row['nm_barang']?></td>
                <td id="hrg<?=$row['id']?>"><?=$row['hrg_jual']?></td>
                <td><?=$row['satuan']?></td>
                <td><?=$row['kategori']?></td>
                <td><a style="color: green; text-decoration: none; cursor: hand" onclick="add(<?=$row['id']?>)">&nbsp+&nbsp</a></td>
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
</div>
<div style="width: 50%; height: 45%; float: left; border: solid 1px">
    <table border="1px">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="cart"></tbody>
    </table>
    <form id="myfrm" style="margin-top: 10" action="beli.php" method="POST">
        <input type="text" name="nama">
        <input type="submit" value="Beli">
    </form>
</div>
<div style="visibility: hidden;" id="temp"></div>

<script>
function add(id){
    var cart = document.getElementById("cart").innerHTML
    var nama = document.getElementById("nm"+id).innerHTML
    var temp = document.getElementById("temp").innerHTML
    var arr = temp.split(" ")
    var jumlah = 1;
    var total = document.getElementById("hrg"+id).innerHTML
    var cek = 0;
    console.log(arr)
    for(i=0;i<arr.length;i++){
        if(arr[i] == id){
            cek = 0
            console.log(cek)
            break
        }
        else{
            cek = 1     
        }
    }
    if(cek == 1){
        var btn = '<a style="color: green; text-decoration: none; cursor: hand" onclick="min('+id+')">&nbsp-&nbsp</a>'
        var html = "<tr><td>"+nama+"</td><td id='jml"+id+"'>"+jumlah+"</td><td id='ht"+id+"'>"+total+"</td><td>"+btn+"</td></tr>";
        document.getElementById("temp").innerHTML = document.getElementById("temp").innerHTML + id + " "
        var ids = document.getElementById("temp").innerHTML;
        document.getElementById("cart").innerHTML = cart + html;
        var ht = "<input type='hidden' name='ids' value='"+ids+"'><input type='hidden' name='j"+id+"' value='"+jumlah+"'>";
        document.getElementById("myfrm").innerHTML = document.getElementById("myfrm").innerHTML + ht
    }else{
        jumlah = Number(document.getElementById('jml'+id).innerHTML) + 1;
        total = total * jumlah;
        document.getElementById('jml'+id).innerHTML = jumlah
        document.getElementsByName('j'+id)[0].value = jumlah
        document.getElementById('ht'+id).innerHTML = total
    }
}
function min(id) {
    var total = document.getElementById("hrg"+id).innerHTML
    var jumlah = Number(document.getElementById('jml'+id).innerHTML) - 1;
    if(jumlah <= 0){
        document.getElementById('jml'+id).innerHTML = 0
        document.getElementsByName('j'+id)[0].value = 0
        document.getElementById('ht'+id).innerHTML = 0
    }
    else{
        total = total * jumlah;
        document.getElementById('jml'+id).innerHTML = jumlah
        document.getElementsByName('j'+id)[0].value = jumlah
        document.getElementById('ht'+id).innerHTML = total
    }
}
</script>