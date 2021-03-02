<?php

include 'header.php';
require_once 'include/auth.php';

?>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Data Nasabah Lunas</h1>
        <div class="card mb-4">
            <div class="card-header">Tabel
                <a href="printall-nasabah-lunas.php" target="_blank" class="btn btn-primary float-right mx-2">Print Semua</a>
                <a href="printall-excel-nasabah-lunas.php" target="_blank" class="btn btn-primary float-right">Export Excel</a>
            </div>
            <div class="card-body">
                <table class="table table-sm table-hover table-bordered">
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require "include/function.php";
                        $no = 1;
                        $sql = mysqli_query($link, "SELECT * FROM nasabahlunas");
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['nohp']; ?></td>
                                <td><?= substr($row['alamat'], 0, 255); ?></td>
                                <td><?= $row['norekening']; ?></td>
                                <td>Rp.<?= number_format($row['pinjaman'] ,0,',','.'); ?></td>
                                <td><?= $row['jangkawaktu']; ?></td>
                                <td><?= $row['status']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>

<?php

include 'footer.php';

?>
