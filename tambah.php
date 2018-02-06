<?php

	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//Mendapatkan Nilai Variable
		$kode = $_POST['kode'];
		$detak = $_POST['detak'];
		
		//Pembuatan Syntax SQL
		//INSERT INTO `denyut` (`id`, `kode`, `waktu`, `detak`) VALUES (NULL, '2', CURRENT_TIMESTAMP, '80')
		
		$sql = "INSERT INTO denyut (id, kode, waktu, detak) VALUES (NULL, '$kode', CURRENT_TIMESTAMP,'$detak')";
		
		//Import File Koneksi database
		require_once('koneksi.php'); 
		
		//Eksekusi Query database
		if(mysqli_query($con,$sql)){
			echo 'Berhasil';
		}else{
			echo 'Gagal Menambahkan Pegawai';
		}
		
		mysqli_close($con);
	}
?>