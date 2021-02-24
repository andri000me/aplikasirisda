<?php

include 'header.php';
require_once 'include/auth.php';
require 'include/function.php';

$id = $_GET['id'] ? $_GET['id'] : "";
$sql = mysqli_query($link, "SELECT * FROM nasabahmenunggak WHERE id='$id'");
$row = mysqli_fetch_array($sql);

if (isset($_POST['editnasabahmenunggak'])) {
    if (editdatanasabahmenunggak($_POST) > 0) {
        echo "<script>
        alert('Edit data berhasil');
        window.location.href='data-nasabah-menunggak.php';
        </script>";
    } else {
        echo "<script>
        alert('Edit data gagal');
        window.location.href='edit-data-nasabah-menunggak.php';
        </script>";
    }
}

?>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit Nasabah Menunggak</h1>
        <div class="card">
            <div class="card-header">Edit Data
            </div>
            <div class="card-body">
                <form class="form-item" action="" method="post" role="form">
                    <input type="hidden" name="id" id="id" value="<?= $row['id']; ?>">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" placeholder="Risda Roosyantie" required="required" value="<?= $row['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nohp">Nomor HP</label>
                        <input type="number" class="form-control" name="nohp" placeholder="081298452573" required="required" value="<?= $row['nohp']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" placeholder="Jalan. Menuju Hatimu" required="required"><?= $row['alamat']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="norekening">Nomor Rekening</label>
                        <input type="number" class="form-control" name="norekening" placeholder="4531***********" required="required" value="<?= $row['norekening']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="pinjaman">Pinjaman</label>
                        <input type="number" class="form-control" placeholder="600000" required="required" value="<?= $row['pinjaman']; ?>">
                    </div>
                    <div class="form-group row-cols-lg-5">
                        <label for="tgljatuhtempo">Tanggal Jatuh Tempo</label>
                        <input type="date" class="form-control" name="tgljatuhtempo" pattern="\d{1,2}-\d{1,2}-\d{4}" required="required" value="<?= $row['tgljatuhtempo']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jumlahmenunggak">Jumlah Menunggak</label>
                        <input type="text" class="form-control" name="jumlahmenunggak" placeholder="3 Bulan" required="required" value="<?= $row['jumlahmenunggak']; ?>">
                    </div>
                    <button type="submit" name="editnasabahmenunggak" class="btn btn-primary" onclick="return confirm('Simpan perubahan?')">Edit</button>
                    <a href="data-nasabah-menunggak.php" class="btn btn-warning" onclick="return confirm('Yakin batal edit?')">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>

<?php

include 'footer.php';

?>