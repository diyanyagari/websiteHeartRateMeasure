<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$host = mysqli_connect("localhost","root","", "proyekakhir");
//$db = mysqli_select_db($host, "proyekakhir");

$cek = mysqli_query($host, "SELECT * FROM pasien where level=2");

while ($baris = mysqli_fetch_assoc($cek))
	{
		if($lihat < $baris['kode'])
		{
			$lihat = $baris['kode'];
		}else{
			$lihat = $lihat;
		}
	}
++$lihat;
$level=2;
$nama = $_POST['nama'];
$password = $_POST['password'];
$umur = $_POST ['umur'];
$JK = $_POST['JK'];
$tinggi = $_POST['tinggi'];
$berat = $_POST ['berat'];
$notlp = $_POST['notlp'];

$sql = "INSERT INTO pasien(kode, level, nama, password, umur, JK, tinggi, berat, NoTelp) VALUES ('$lihat', '$level', '$nama','$password','$umur','$JK','$tinggi','$berat', '$notlp')";
$tambahdata = mysqli_query($host, $sql);
if (!$tambahdata){
	echo "gagal";
}else{
	header("Location: ../verify/verify.html");
}
?>