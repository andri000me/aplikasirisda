<?php

include 'header.php';
require_once 'include/auth.php';

?>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Data Nasabah Menunggak</h1>
        <div class="card mb-4">
            <div class="card-header">Tabel
                <a href="printall-nasabah-menunggak.php" target="_blank" class="btn btn-primary float-right">Print Semua</a>
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
                            <th>Tanggal Jatuh Tempo</th>
                            <th>Jumlah Menunggak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require "include/function.php";
                        $no = 1;
                        $sql = mysqli_query($link, "SELECT * FROM nasabahmenunggak");
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['nohp']; ?></td>
                                <td><?= substr($row['alamat'], 0, 20); ?></td>
                                <td><?= $row['norekening']; ?></td>
                                <td>Rp. <?= number_format($row['pinjaman'] ,0,',','.'); ?></td>
                                <td><?= $row['tgljatuhtempo']; ?></td>
                                <td>Rp. <?= number_format($row['jumlahmenunggak'] ,0,',','.'); ?></td>
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