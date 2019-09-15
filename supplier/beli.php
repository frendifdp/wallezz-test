<?php
    include 'conn.php';
    if(!empty($_POST['ids'])){
        $id = explode(' ', $_POST['ids']);
        for($i=0;$i<count($id)-1;$i++){
            if($_POST['j'.$id[$i]] != 0){
                $query = 'SELECT kd_barang, hrg_jual FROM barang WHERE id='.$id[$i];
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $faktur = uniqid();
                        $nama = $_POST['nama'];
                        if($nama==''){
                            $nama = 'Guest';
                        }
                        $kb = $row['kd_barang'];
                        $jumlah = $_POST['j'.$id[$i]];
                        $hrg = $row['hrg_jual'];
                        $total = $jumlah * $hrg;
                        $queryi = "INSERT INTO penjualan SET 
                            no_faktur='$faktur', nm_konsumen='$nama', kd_barang='$kb', 
                            jumlah='$jumlah', hrg_satuan='$hrg', hrg_total='$total'";
                        if ($conn->query($queryi) === TRUE) {
                            $success = true;
                        } else {
                            $success = false;
                            echo "Error: " . $queryi . "<br>" . $conn->error;
                        }
                    }
                }
            }
        }
    }
    if($success){
        echo "success";
    }
    else{
        echo "error";
    }
    echo "<script>setTimeout(window.history.go(-1), 500)</script>";
    $conn->close();
?>