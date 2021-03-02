<?php
require 'include/function.php';


$id = $_GET['id'];

$query = mysqli_query($link, "SELECT images FROM tandaterimaagunan WHERE id='$id'");
$row = mysqli_fetch_array($query);
$gambar = $row['images'];
unlink("upload/" . $gambar);

$query1 = mysqli_query($link, "DELETE FROM tandaterimaagunan WHERE id='$id'");

if ($query1) {
?>
	<script>
		alert("Data berhasil dihapus");
		window.location.href = "data-tanda-terima-agunan.php";
	</script>
<?php
} else {
?>
	<script>
		alert("Data gagal dihapus");
		window.location.href = "data-tanda-terima-agunan.php";
	</script>
<?php
}

?>