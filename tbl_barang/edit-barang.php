<?php

session_start();


require_once "../config.php";


$id = $_GET['id'];

// Fetech user data based on id
$queryBrng = mysqli_query($koneksi, "SELECT * FROM tbl_barang WHERE id=$id");

$data = mysqli_fetch_array($queryBrng);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Barang</h1>

            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa-solid fa-plus-minus"></i> Tambah Barang
                        </div>
                        <div class="card-body">
                            <form action="proses-barang.php" method="POST">
                                <input type="number" name="id" value="<?= $data['id'] ?>" hidden>
                                <div class="mb-3">
                                    <label for="nama_barang" class="form-label ps-1">Nama barang</label>
                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="tambah barang" value="<?= $data['nama_barang'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="stock" class="form-label ps-1">Stock</label>
                                    <input type="text" class="form-control" id="stock" name="stock" placeholder="stock barang" value="<?= $data['stock'] ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary" name="update"><i class="fa-solid fa-pen"></i> Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa-solid fa-list"></i> Data barang yang masuk
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">
                                            <center>Nama</center>
                                        </th>
                                        <th scope="col">
                                            <center>Stock</center>
                                        </th>

                                        <th scope="col">
                                            <center>Operator</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    <tr>
                                        <th scope="row">
                                            <center><?= $no++ ?></center>
                                        </th>
                                        <td>
                                            <center><?= $data['nama_barang'] ?></center>
                                        </td>
                                        <td>
                                            <center><?= $data['stock'] ?></center>
                                        </td>
                                        <td align="center">
                                            <button type="button" class="btn btn-sm btn-warning rounded-0 col-10">Updating.....</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>