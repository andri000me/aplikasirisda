<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'aplikasirisda');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($link->connect_error) {
  die("Connection failed: " . $link->connect_error);
}

function query($query)
{
  global $link;
  $result = mysqli_query($link, $query);
  $rows = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambahdatapeminjamperbulan($data)
{
  global $link;
  $nama = htmlspecialchars($data['nama']);
  $nohp = htmlspecialchars($data['nohp']);
  $alamat = htmlspecialchars($data['alamat']);
  $norekening = htmlspecialchars($data['norekening']);
  $angsuran = htmlspecialchars($data['angsuran']);
  $pinjaman = htmlspecialchars($data['pinjaman']);
  $tglpencairan = htmlspecialchars($data['tglpencairan']);
  $jangkawaktu = htmlspecialchars($data['jangkawaktu']);

  $query = "INSERT INTO peminjamperbulan (nama,nohp,alamat,norekening,angsuran,pinjaman,tglpencairan,jangkawaktu) VALUES ('$nama','$nohp','$alamat','$norekening','$angsuran','$pinjaman','$tglpencairan','$jangkawaktu')";
  mysqli_query($link, $query);
  return mysqli_affected_rows($link);
}

function editdatapeminjamperbulan($data)
{
  global $link;
  $id = $_GET['id'];
  $nama = htmlspecialchars($data['nama']);
  $nohp = htmlspecialchars($data['nohp']);
  $alamat = htmlspecialchars($data['alamat']);
  $norekening = htmlspecialchars($data['norekening']);
  $angsuran = htmlspecialchars($data['angsuran']);
  $pinjaman = htmlspecialchars($data['pinjaman']);
  $tglpencairan = htmlspecialchars($data['tglpencairan']);
  $jangkawaktu = htmlspecialchars($data['jangkawaktu']);

  $query = "UPDATE peminjamperbulan SET nama='$nama', nohp='$nohp', alamat='$alamat', norekening='$norekening', angsuran='$angsuran', pinjaman='$pinjaman', tglpencairan='$tglpencairan', jangkawaktu='$jangkawaktu' WHERE id='$id'";
  mysqli_query($link, $query);
  return mysqli_affected_rows($link);
}

function tambahdatanasabahmenunggak($data)
{
  global $link;
  $nama = htmlspecialchars($data['nama']);
  $nohp = htmlspecialchars($data['nohp']);
  $alamat = htmlspecialchars($data['alamat']);
  $norekening = htmlspecialchars($data['norekening']);
  $pinjaman = htmlspecialchars($data['pinjaman']);
  $tgljatuhtempo = htmlspecialchars($data['tgljatuhtempo']);
  $jumlahmenunggak = htmlspecialchars($data['jumlahmenunggak']);

  $query = "INSERT INTO nasabahmenunggak (nama,nohp,alamat,norekening,pinjaman,tgljatuhtempo,jumlahmenunggak) VALUES ('$nama','$nohp','$alamat','$norekening','$pinjaman','$tgljatuhtempo','$jumlahmenunggak')";
  mysqli_query($link, $query);
  return mysqli_affected_rows($link);
}

function editdatanasabahmenunggak($data)
{
  global $link;
  $id = $_GET['id'];
  $nama = htmlspecialchars($data['nama']);
  $nohp = htmlspecialchars($data['nohp']);
  $alamat = htmlspecialchars($data['alamat']);
  $norekening = htmlspecialchars($data['norekening']);
  $pinjaman = htmlspecialchars($data['pinjaman']);
  $tgljatuhtempo = htmlspecialchars($data['tgljatuhtempo']);
  $jumlahmenunggak = htmlspecialchars($data['jumlahmenunggak']);

  $query = "UPDATE nasabahmenunggak SET nama='$nama', nohp='$nohp', alamat='$alamat', norekening='$norekening', pinjaman='$pinjaman', tgljatuhtempo='$tgljatuhtempo', jumlahmenunggak='$jumlahmenunggak' WHERE id='$id'";
  mysqli_query($link, $query);
  return mysqli_affected_rows($link);
}

function tambahdatanasabahlunas($data)
{
  global $link;
  $nama = htmlspecialchars($data['nama']);
  $nohp = htmlspecialchars($data['nohp']);
  $alamat = htmlspecialchars($data['alamat']);
  $norekening = htmlspecialchars($data['norekening']);
  $pinjaman = htmlspecialchars($data['pinjaman']);
  $jangkawaktu = htmlspecialchars($data['jangkawaktu']);
  $status = htmlspecialchars($data['status']);

  $query = "INSERT INTO nasabahlunas (nama,nohp,alamat,norekening,pinjaman,jangkawaktu,status) VALUES ('$nama','$nohp','$alamat','$norekening','$pinjaman','$jangkawaktu','$status')";
  mysqli_query($link, $query);
  return mysqli_affected_rows($link);
}

function editdatanasabahlunas($data)
{
  global $link;
  $id = $_GET['id'];
  $nama = htmlspecialchars($data['nama']);
  $nohp = htmlspecialchars($data['nohp']);
  $alamat = htmlspecialchars($data['alamat']);
  $norekening = htmlspecialchars($data['norekening']);
  $pinjaman = htmlspecialchars($data['pinjaman']);
  $jangkawaktu = htmlspecialchars($data['jangkawaktu']);
  $status = htmlspecialchars($data['status']);

  $query = "UPDATE nasabahlunas SET nama='$nama', nohp='$nohp', alamat='$alamat', norekening='$norekening', pinjaman='$pinjaman', jangkawaktu='$jangkawaktu', status='$status' WHERE id='$id'";
  mysqli_query($link, $query);
  return mysqli_affected_rows($link);
}

/*function tambahdatatandaterimaagunan($data)
{
global $link;
$nama = htmlspecialchars($data['nama']);
$nohp = htmlspecialchars($data['nohp']);
$alamat = htmlspecialchars($data['alamat']);
$images = uploadan();
if ($images) {
return false;
}
$keterangansurat = htmlspecialchars($data['keterangansurat']);
$query = "INSERT INTO tandaterimaagunan (nama,nohp,alamat,images,keterangansurat) VALUES ('$nama','$nohp','$alamat','$images','$keterangansurat')";
mysqli_query($link, $query);
return mysqli_affected_rows($link);
}

function uploadan()
{
$tmp_name = $_FILES['images']['tmp_name'];
$name = $_FILES['images']['name'];
$size = $_FILES['images']['size'];
$error = $_FILES['images']['error'];

if ($error === 4) {
echo "<script>
alert('Masukkan gambar terlebih dahulu');
</script>";
return false;
}

$ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
$ambilEkstensiGambar = explode('.', $name);
$ekstensiGambar = strtolower(end($ambilEkstensiGambar));
if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
echo "<script>
alert('Format gambar tidak sesuai');
</script>";

return false;
}

if ($size > 2000000) {
echo "<script>
alert('Ukuran gambar terlalu besar');
</script>";

return false;
}

$filebaru = uniqid();
$filebaru .= '.';
$filebaru .= $ekstensiGambar;
move_uploaded_file($tmp_name, 'upload/' . $filebaru);
return $filebaru;
}

function editdatatandaterimaagunan($data)
{
global $link;
$id = $_GET['id'];
$nama = htmlspecialchars($data['nama']);
$nohp = htmlspecialchars($data['nohp']);
$alamat = htmlspecialchars($data['alamat']);
$gambarubah = htmlspecialchars($data['gambarubah']);
if ($_FILES['images']['error'] === 4) {
$images = $gambarubah;
} else {
$images = uploadan();
return false;
}
$keterangansurat = htmlspecialchars($data['keterangansurat']);

$query = "UPDATE tandaterimaagunan SET nama='$nama', nohp='$nohp', alamat='$alamat', images='$images', keterangansurat='$keterangansurat'  WHERE id='$id'";
mysqli_query($link, $query);
return mysqli_affected_rows($link);
}*/

function tambahdatastruk($data)
{
  global $link;
  $nama = htmlspecialchars($data['nama']);
  $alamat = htmlspecialchars($data['alamat']);
  $norekening = htmlspecialchars($data['norekening']);
  $pinjaman = htmlspecialchars($data['pinjaman']);
  $jangkawaktu = htmlspecialchars($data['jangkawaktu']);
  $tgljatuhtempo = htmlspecialchars($data['tgljatuhtempo']);

  $query = "INSERT INTO struk (nama,alamat,norekening,pinjaman,jangkawaktu,tgljatuhtempo) VALUES ('$nama','$alamat','$norekening','$pinjaman','$jangkawaktu','$tgljatuhtempo')";
  mysqli_query($link, $query);
  return mysqli_affected_rows($link);
}

function editdatastruk($data)
{
  global $link;
  $id = $_GET['id'];
  $nama = htmlspecialchars($data['nama']);
  $alamat = htmlspecialchars($data['alamat']);
  $norekening = htmlspecialchars($data['norekening']);
  $pinjaman = htmlspecialchars($data['pinjaman']);
  $jangkawaktu = htmlspecialchars($data['jangkawaktu']);
  $tgljatuhtempo = htmlspecialchars($data['tgljatuhtempo']);

  $query = "UPDATE struk SET nama='$nama', alamat='$alamat', norekening='$norekening', pinjaman='$pinjaman', jangkawaktu='$jangkawaktu', tgljatuhtempo='$tgljatuhtempo' WHERE id='$id'";
  mysqli_query($link, $query);
  return mysqli_affected_rows($link);
}

function carinasabahlunas($search)
{
  $query = "SELECT * FROM nasabahlunas WHERE nama LIKE '%$search%' OR nohp LIKE '%$search%' OR alamat LIKE '%$search%' OR norekening LIKE '%$search%' OR pinjaman LIKE '%$search%' OR jangkawaktu LIKE '%$search%' OR status LIKE '%$search%'";
  return query($query);
}

function carinasabahmenunggak($search)
{
  $query = "SELECT * FROM nasabahmenunggak WHERE nama LIKE '%$search%' OR nohp LIKE '%$search%' OR alamat LIKE '%$search%' OR norekening LIKE '%$search%' OR pinjaman LIKE '%$search%' OR tgljatuhtempo LIKE '%$search%' OR jumlahmenunggak LIKE '%$search%'";
  return query($query);
}

function caripeminjamperbulan($search)
{
  $query = "SELECT * FROM peminjamperbulan WHERE nama LIKE '%$search%' OR nohp LIKE '%$search%' OR alamat LIKE '%$search%' OR norekening LIKE '%$search%' OR angsuran LIKE '%$search%' OR pinjaman LIKE '%$search%' OR tglpencairan LIKE '%$search%' OR jangkawaktu LIKE '%$search%'";
  return query($query);
}

function caritandaterimaagunan($search)
{
  $query = "SELECT * FROM tandaterimaagunan WHERE nama LIKE '%$search%' OR nohp LIKE '%$search%' OR alamat LIKE '%$search%' OR keterangansurat LIKE '%$search%'";
  return query($query);
}

function caristruk($search)
{
  $query = "SELECT * FROM struk WHERE nama LIKE '%$search%' OR alamat LIKE '%$search%' OR norekening LIKE '%$search%' OR pinjaman LIKE '%$search%' OR jangkawaktu LIKE '%$search%' OR tgljatuhtempo LIKE '%$search%'";
  return query($query);
}
