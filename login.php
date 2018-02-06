<?php
include('koneksi.php');

$nama = $_POST['username'];
$password = $_POST['password'];

$sql = mysqli_query($con, "SELECT * FROM pasien WHERE nama='$nama' AND password='$password'") or die(mysql_error());

	if(mysqli_num_rows($sql) == 0){
		header("Location:loginsalah.html");
	}else{
		$row = mysqli_fetch_assoc($sql);
		if($row['level'] == 1){
			$_SESSION['dokter']=$user;
			echo '<script language="javascript">alert("Anda Login Sebagai Dokter"); document.location="dokter/index.php";</script>';
		}else{
			$_SESSION['pasien']=$user;
			header("Location:pasien/indexedit.php?nama=$row[nama]");
			//echo '<script language="javascript">alert("Anda Login Sebagai Pasien"); document.location="pasien/index.php";</script>';
		}
	}
?>