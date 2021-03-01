<?php

include 'header.php';
require_once 'include/auth.php';
require 'include/function.php';

$id = $_GET['id'] ? $_GET['id'] : "";
$sql = mysqli_query($link, "SELECT * FROM nasabahlunas WHERE id='$id'");
$row = mysqli_fetch_array($sql);

if (isset($_POST['editnasabahlunas'])) {
  if (editdatanasabahlunas($_POST) > 0) {
    echo "<script>
    alert('Edit data berhasil');
    window.location.href='data-nasabah-lunas.php';
    </script>";
  } else {
    echo "<script>
    alert('Edit data gagal');
    window.location.href='edit-data-nasabah-lunas.php';
    </script>";
  }
}

?>

<main>
  <div class="container-fluid">
    <h1 class="mt-4">Edit Nasabah Lunas</h1>
    <div class="card">
      <div class="card-header">Edit Data
      </div>
      <div class="card-body">
        <form class="form-item" action="" method="post" role="form">
          <input type="hidden" name="id" id="id" value="<?= $row['id']; ?>">
          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" value="<?= $row['nama']; ?>">
          </div>
          <div class="form-group">
            <label for="nohp">Nomor HP</label>
            <input type="number" class="form-control" name="nohp" value="<?= $row['nohp']; ?>">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" name="alamat"><?= $row['alamat']; ?></textarea>
          </div>
          <div class="form-group">
            <label for="norekening">Nomor Rekening</label>
            <input type="number" class="form-control" name="norekening" value="<?= $row['norekening']; ?>">
          </div>
          <div class="form-group">
            <label for="pinjaman">Pinjaman</label>
            <input type="number" class="form-control" name="pinjaman" value="<?= $row['pinjaman']; ?>">
          </div>
          <div class="form-group">
            <label for="jangkawaktu">Jangka Waktu</label>
            <input type="text" class="form-control" name="jangkawaktu" value="<?= $row['jangkawaktu']; ?>">
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <?php foreach($sql as $row): ?>
              <select name="status" id="" class="form-control">
                <option disabled>Pilih</option>
                <option value="Lunas <?php if($row['status'] == 'Lunas'){echo 'selected="selected"';}?>">Lunas</option>
                <option value="Belum Lunas <?php if($row['status'] == 'Belum Lunas'){echo 'selected="selected"';}?>">Belum Lunas</option>
              </select>
            <?php endforeach; ?>
            <!-- <input type="text" class="form-control" name="status" value="<= $row['status']; ?>"> -->
          </div>
          <button type="submit" name="editnasabahlunas" class="btn btn-primary" onclick="return confirm('Simpan perubahan?')">Edit</button>
          <a href="data-nasabah-lunas.php" class="btn btn-warning" onclick="return confirm('Yakin batal edit?')">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</main>

<?php

include 'footer.php';

?>
