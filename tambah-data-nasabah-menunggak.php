<?php

include 'header.php';
require_once 'include/auth.php';
require 'include/function.php';

if (isset($_POST['datanasabahmenunggak'])) {
    if (tambahdatanasabahmenunggak($_POST) > 0) {
        echo "<script>
        alert('Tambah data berhasil');
        window.location.href='data-nasabah-menunggak.php';
        </script>";
    } else {
        echo "<script>
        alert('Tambah data gagal');
        window.location.href='tambah-data-nasabah-menunggak.php';
        </script>";
    }
}
?>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Data Nasabah Menunggak</h1>
        <div class="card">
            <div class="card-header">Tambah Data
            </div>
            <div class="card-body">
                <form class="form-item" action="" method="post" role="form">
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
                        <label for="norekening">Nomor Rekening</label>
                        <input type="number" class="form-control" name="norekening" placeholder="4531***********" required="required">
                    </div>
                    <div class="form-group">
                        <label for="pinjaman">Pinjaman</label>
                        <input type="number" class="form-control" name="pinjaman" placeholder="600000" required="required">
                    </div>
                    <div class="form-group row-cols-lg-5">
                        <label for="tgljatuhtempo">Tanggal Jatuh Tempo</label>
                        <input type="date" class="form-control" name="tgljatuhtempo" pattern="\d{1,2}-\d{1,2}-\d{4}" required="required">
                    </div>
                    <div class="form-group">
                        <label for="jumlahmenunggak">Jumlah Menunggak</label>
                        <input type="text" class="form-control" name="jumlahmenunggak" placeholder="400000" required="required">
                    </div>
                    <button type="submit" name="datanasabahmenunggak" class="btn btn-primary" onclick="return confirm('Yakin ingin menyimpan?')">Simpan</button>
                    <button type="reset" class="btn btn-warning">Clear</button>
                    <a href="data-nasabah-menunggak.php" class="btn btn-success" onclick="return confirm('Yakin kembali?')">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>

<?php

include 'footer.php';

?>