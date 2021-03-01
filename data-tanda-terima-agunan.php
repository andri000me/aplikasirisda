<?php

include 'header.php';
require_once 'include/auth.php';
require "include/function.php";

$sql = mysqli_query($link, "SELECT * FROM tandaterimaagunan ORDER BY id DESC");
if (isset($_POST['searchtandaterimaagunan'])) {
  $sql = caritandaterimaagunan($_POST['caritandaterimaagunan']);
}

?>

<main>
  <div class="container-fluid">
    <h1 class="mt-4">Data Tanda Terima Agunan</h1>
    <div class="card mb-4">
      <div class="card-header">Tabel
        <form class="form-inline my-2 my-lg-0 float-right" method="post">
          <input class="form-control mr-sm-2" type="search" name="caritandaterimaagunan" placeholder="Cari">
          <button class="btn btn-outline-success mr-sm-2" type="submit" name="searchtandaterimaagunan">Cari</button>
          <a href="data-tanda-terima-agunan.php" class="btn btn-danger mr-sm-2">Reset</a>
          <a href="tambah-data-tanda-terima-agunan.php" class="btn btn-primary float-right">Tambah Data</a>
        </form>
      </div>
      <div class="card-body">
        <table class="table table-sm table-hover table-bordered">
          <thead>
            <tr>
              <th>NO</th>
              <th>Nama</th>
              <th>Nomor HP</th>
              <th>Alamat</th>
              <th>Scan Surat</th>
              <th>Keterangan Surat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($sql as $row) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['nohp']; ?></td>
                <td><?= substr($row['alamat'], 0, 255); ?></td>
                <td><img src="upload/<?= $row['images']; ?>" width="150" height="75"></td>
                <td><?= $row['keterangansurat']; ?></td>
                <td>
                  <a href="edit-data-tanda-terima-agunan.php?id=<?= $row['id']; ?>" class="btn btn-warning">Edit</a>
                  <a href="hapus-data-tanda-terima-agunan.php?id=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
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
