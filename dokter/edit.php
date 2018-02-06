<?php
include 'koneksi.php';
// menyimpan data kedalam variabel
$nama           = $_POST['nama'];
$penyakit       = $_POST['penyakit'];
$obat  			= $_POST['obat'];
// query SQL untuk insert data
$query="UPDATE data SET nama='$nama',penyakit='$penyakit',obat='$obat'";
mysqli_query($con, $query);
// mengalihkan ke halaman index.php
header("location:index.php");
?>