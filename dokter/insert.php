<?php
include '../koneksi.php';
error_reporting(E_ALL & ~E_NOTICE);
$kode = $_POST['kode'];
$level = $_POST['level'];
$nama= $_POST['nama'];
$JK = $_POST['JK'];
$diagnosa = $_POST['diagnosa'];
$detak = $_POST['detak'];
$telp = $_POST['telp'];
$umur = $_POST['umur'];
$penyakit = $_POST['penyakit'];
$obat = $_POST['obat'];
$alergi = $_POST['alergi'];
$tinggi = $_POST['tinggi'];
$berat = $_POST['berat'];
$catmed = $_POST['catmed'];

$sql = "INSERT INTO pasien (kode, level, password, nama, umur, 
							JK, penyakit, obat, alergi, tinggi, berat, diagnosa,  
							detak, NoTelp, catmed) 
							VALUES 
							('$kode', '$level', '','$nama','$umur', 
							'$JK', '$penyakit', '$obat', '$alergi', '$tinggi',
							'$berat','$diagnosa', '$detak', '$telp', '$catmed')";
$cek=mysqli_query($con,$sql);
if($cek){
	echo '<script language="javascript">window.alert("Data Berhasil Ditambahkan. Terima Kasih");</script>';
}else{
	echo '<script language="javascript">window.alert("Maaf, Proses Gagal");</script>';
}	

?>