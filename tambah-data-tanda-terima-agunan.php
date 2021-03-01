<?php

include 'header.php';
require_once 'include/auth.php';
/*require 'include/function.php';

if (isset($_POST['datatandaterimaagunan'])) {
if (tambahdatatandaterimaagunan($_POST) > 0) {
echo "<script>
alert('Tambah data berhasil');
window.location.href='data-tanda-terima-agunan.php';
</script>";
} else {
echo "<script>
alert('Tambah data gagal');
window.location.href='tambah-data-tanda-terima-agunan.php';
</script>";
}
}*/

?>

<main>
  <div class="container-fluid">
    <h1 class="mt-4">Data Terima Agunan</h1>
    <div class="card">
      <div class="card-header">Tambah Data
      </div>
      <div class="card-body">
        <form class="form-item" action="input-tanda-terima-agunan.php" method="post" role="form" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" placeholder="Risda Roosyantie" required="required">
          </div>
          <div class="form-group">
            <label for="nohp">Nomor HP</label>
            <input type="number" class="form-control" name="nohp" placeholder="081298452573" required="required">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" name="alamat" placeholder="Jalan. Menuju Hatimu" required="required"></textarea>
          </div>
          <div class="form-group">
            <label for="images">Scan Surat</label>
            <input type="file" class="form-control" name="images" required="required">
            <p><strong>Catatan:</strong> Hanya format .png .jpg .jpeg yang diperbolehkan dengan ukuran maksimal 2 MB.</p>
          </div>
          <div class="form-group">
            <label for="keterangansurat">Keterangan Surat</label>
            <input type="text" class="form-control" name="keterangansurat" placeholder="Surat Menikah" required="required">
          </div>
          <button type="submit" name="datatandaterimaagunan" class="btn btn-primary" onclick="return confirm('Yakin ingin menyimpan?')">Simpan</button>
          <button type="reset" class="btn btn-warning">Clear</button>
          <a href="data-tanda-terima-agunan.php" class="btn btn-success" onclick="return confirm('Yakin kembali?')">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</main>

<?php

include 'footer.php';

?>
