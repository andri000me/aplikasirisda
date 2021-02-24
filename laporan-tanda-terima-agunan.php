<?php

include 'header.php';
require_once 'include/auth.php';

?>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Data Tanda Terima Agunan</h1>
        <div class="card mb-4">
            <div class="card-header">Tabel
                <a href="printall-tanda-terima-agunan.php" target="_blank" class="btn btn-primary float-right">Print Semua</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Nasabah</th>
                            <th>Nomor HP</th>
                            <th>Alamat</th>
                            <th>Scan Surat</th>
                            <th>Keterangan Surat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require "include/function.php";
                        $no = 1;
                        $sql = mysqli_query($link, "SELECT * FROM tandaterimaagunan");
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['nohp']; ?></td>
                                <td><?= substr($row['alamat'], 0, 20); ?></td>
                                <td><img src="upload/<?= $row['images']; ?>" width="150" height="75"></td>
                                <td><?= $row['keterangansurat']; ?></td>
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