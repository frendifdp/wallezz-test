<?php
    if(isset($_GET['id'])){
        include 'conn.php';
        $id = $_GET['id'];
        $sql = "DELETE FROM barang WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            $success = true;
            echo "<script>window.location = 'tabel_barang.php'</script>";
        } else {
            $success = false;
            echo "Error: " . $queryi . "<br>" . $conn->error;
        }
        $conn->close();
    }
    else {
        echo "<script>window.location = 'tabel_barang.php'</script>";
    }
?>