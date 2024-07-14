<?php

// Menyertakan file konfigurasi untuk koneksi database
require_once "../config.php";

if (isset($_POST['simpan'])) {
    // Mengambil dan mengamankan data dari form
    $nama = htmlspecialchars($_POST['nama_barang']);
    $stock = htmlspecialchars($_POST['stock']);

    // Menyimpan data ke database
    $query = "INSERT INTO tbl_barang (nama_barang, stock) VALUES ('$nama', '$stock')";
    if (mysqli_query($koneksi, $query)) {
        // Mengarahkan pengguna ke halaman barang1.php setelah berhasil menyimpan
        header("location:barang1.php");
    } else {
        // Menampilkan pesan kesalahan jika penyimpanan gagal
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }

    return;
}
if (isset($_POST['update'])) {
    $id         = $_POST['id'];
    $nama = htmlspecialchars($_POST['nama_barang']);
    $stock = htmlspecialchars($_POST['stock']);

    $queryBrng = mysqli_query($koneksi, "SELECT * FROM tbl_barang WHERE id = $id");

    $data = mysqli_fetch_array($queryBrng);
    // untuk menyimpan pljrn lama curpljrn
    $curBarang = $data['nama_barang'];

    // query cek pelajaran yg baru diinpt olh user
    $cekBarang = mysqli_query($koneksi, "SELECT * FROM tbl_barang WHERE nama_barang = '$nama'");

    if ($nama !== $curBarang) {
        if (mysqli_num_rows($cekBarang) > 0) {
            header("location:barang1.php");
            return;
        }
    }

    mysqli_query($koneksi, "UPDATE tbl_barang SET nama_barang = '$nama', stock = '$stock' WHERE id = $id");
    header("location:barang1.php?msg=updated");
}
