<?php

include 'header.php';
require_once 'include/auth.php';
require 'include/function.php';

/*$id = $_GET['id'] ? $_GET['id'] : "";
$sql = mysqli_query($link, "SELECT * FROM tandaterimaagunan WHERE id='$id'");
$row = mysqli_fetch_array($sql);

if (isset($_POST['edittandaterimaagunan'])) {
    if (editdatatandaterimaagunan($_POST) > 0) {
        echo "<script>
        alert('Edit data berhasil');
        window.location.href='data-tanda-terima-agunan.php';
        </script>";
    } else {
        echo "<script>
        alert('Edit data gagal');
        window.location.href='edit-data-tanda-terima-agunan.php';
        </script>";
    }
}*/

// mengecek apakah di url ada nilai GET id
if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM tandaterimaagunan WHERE id='$id'";
    $sql = mysqli_query($link, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if (!$sql) {
        die("Query Error: " . mysqli_errno($link) .
            " - " . mysqli_error($link));
    }
    // mengambil data dari database
    $row = mysqli_fetch_assoc($sql);
    // apabila data tidak ada pada database maka akan dijalankan perintah ini
    if (!count($row)) {
        echo "<script>alert('Data tidak ditemukan pada database');window.location='data-tanda-terima-agunan.php';</script>";
    }
} else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='data-tanda-terima-agunan.php';</script>";
}
?>

?>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit Tanda Terima Agunan</h1>
        <div class="card">
            <div class="card-header">Edit Data
            </div>
            <div class="card-body">
                <form class="form-item" action="update-tanda-terima-agunan.php" method="post" role="form" enctype="multipart/form-data">
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
                        <label for="images">Scan Surat</label>
                        <img src="upload/<?= $row['images']; ?>" width="800" height="400">
                        <input type="file" class="form-control" name="images" placeholder="" required="required">
                        <p><strong>Catatan:</strong> Hanya format .png .jpg .jpeg yang diperbolehkan dengan ukuran maksimal 2 MB.</p>
                    </div>
                    <div class="form-group">
                        <label for="keterangansurat">Keterangan Surat</label>
                        <input type="text" class="form-control" name="keterangansurat" placeholder="Surat Menikah" required="required" value="<?= $row['keterangansurat']; ?>">
                    </div>
                    <button type="submit" name="edittandaterimaagunan" class="btn btn-primary" onclick="return confirm('Simpan perubahan?')">Edit</button>
                    <a href="data-tanda-terima-agunan.php" class="btn btn-warning" onclick="return confirm('Yakin batal edit?')">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>

<?php

include 'footer.php';

?>