<?php

session_start();
require_once "../config.php";

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<script>
    function addInput() {
        const container = document.getElementById('inputContainer');
        const div = document.createElement('div');
        div.classList.add('input-group', 'mb-3');

        div.innerHTML = `
                <input type="text" class="form-control" name="nama_barang[]" placeholder="Nama barang" required>
                <input type="text" class="form-control" name="stock[]" placeholder="Stock barang" required>
                <button class="btn btn-danger" type="button" onclick="removeInput(this)">Hapus</button>
            `;
        container.appendChild(div);
    }

    function removeInput(button) {
        button.parentElement.remove();
    }
</script>

<body>
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
                                    <div class="mb-3">
                                        <label for="nama_barang" class="form-label ps-1">Nama barang</label>
                                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="tambah barang" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="stock" class="form-label ps-1">Stock</label>
                                        <input type="text" class="form-control" id="stock" name="stock" placeholder="stock barang" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="simpan"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa-solid fa-list"></i> Data barang yang masuk
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                <center>No</center>
                                            </th>
                                            <th scope="col">
                                                <center>Nama</center>
                                            </th>
                                            <th scope="col">
                                                <center>Stock</center>
                                            </th>
                                            <th scope="col">
                                                <center>Actions</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $queryBrg = mysqli_query($koneksi, "SELECT * FROM tbl_barang");
                                        if (mysqli_num_rows($queryBrg)) {
                                            while ($data = mysqli_fetch_array($queryBrg)) { ?>
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
                                                    <td>
                                                        <center>
                                                            <a href="edit-barang.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-sm">Update</a>
                                                            <a href="hapus-barang.php?id=<?= $data['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                                                        </center>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
</body>

</html>