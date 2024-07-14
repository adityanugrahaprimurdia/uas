<?php
require_once "../config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM tbl_barang WHERE id='$id'";
    mysqli_query($koneksi, $query);

    header("Location: barang1.php");
}
