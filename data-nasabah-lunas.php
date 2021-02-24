<?php

include 'header.php';
require_once 'include/auth.php';
require "include/function.php";

$sql = mysqli_query($link, "SELECT * FROM nasabahlunas ORDER BY id DESC");
if (isset($_POST['searchnasabahlunas'])) {
    $sql = carinasabahlunas($_POST['carinasabahlunas']);
}

?>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Data Nasabah Lunas</h1>
        <div class="card mb-4">
            <div class="card-header">Tabel
                <form class="form-inline my-2 my-lg-0 float-right" method="post">
                    <input class="form-control mr-sm-2" type="search" name="carinasabahlunas" placeholder="Cari">
                    <button class="btn btn-outline-success mr-sm-2" type="submit" name="searchnasabahlunas">Cari</button>
                    <a href="data-nasabah-lunas.php" class="btn btn-danger mr-sm-2">Reset</a>
                    <a href="tambah-data-nasabah-lunas.php" class="btn btn-primary">Tambah Data</a>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Nasabah</th>
                            <th>Nomor HP</th>
                            <th>Alamat</th>
                            <th>Nomor Rekening</th>
                            <th>Pinjaman</th>
                            <th>Jangka Waktu</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($sql as $row) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['nohp']; ?></td>
                                <td><?= substr($row['alamat'], 0, 20); ?></td>
                                <td><?= $row['norekening']; ?></td>
                                <td>Rp. <?= number_format($row['pinjaman'], 0, ',', '.'); ?></td>
                                <td><?= $row['jangkawaktu']; ?></td>
                                <td><?= $row['status']; ?></td>
                                <td>
                                    <a href="edit-data-nasabah-lunas.php?id=<?= $row['id']; ?>" class="btn btn-warning">Edit</a>
                                    <a href="hapus-data-nasabah-lunas.php?id=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>

<?php

include 'footer.php';

?>