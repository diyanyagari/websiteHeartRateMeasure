<?php
include '../koneksi.php';
$nama = $_GET['nama'];

?>

<html>
    <head>
        <title>DATA PASIEN</title>
    </head>
    <body>
	<center>
        <h2>Selamat Datang <?php echo $nama?></h2>
		<br><br>
        <table border="1">
            <?php
            include '../koneksi.php';
            $isi = mysqli_query($con, "SELECT * from pasien WHERE nama='$nama'");
			while ($baris = mysqli_fetch_array($isi))
			{
					$kode=$baris['kode'];
			}
			$detak1 = mysqli_query($con, "select * from denyut where kode='$kode'");
			$detak2 = mysqli_query($con, "select * from denyut where kode='$kode' order by id desc");
			
			//MENGHITUNG RATA RATA PERMINGGU
			$hitung=0;
			$ctr=0;
			while ($wew = mysqli_fetch_assoc($detak2))
			{
				++$ctr;
				if($ctr<=7)
				{
					$hitung=$wew['detak']+$hitung;
				}
			}
			$hitung=$hitung/7;
			$angka = number_format($hitung);
			//MENAMPILKAN DENYUT
			while ($wew2 = mysqli_fetch_assoc($detak1))
			{
					$sekarang=$wew2['detak'];
			}
			
			
			?>
			<table>
				<tr>
				<td colspan="2" align="center">
					<table>
						<tr>
							<td align="center" colspan="7">Data Detak Jantung</td>
						</tr>
						<tr>
							<td align="center">NOW</td>
							<td></td><td></td><td></td><td></td><td></td>
							<td align="center">1 WEEK</td>
						</tr>
						<tr>
							<td align="center"><h2><?php echo $sekarang;?></h2></td>
							<td></td><td></td><td></td><td></td><td></td>
							<td align="center"><h2><?php echo $angka;?></h2></td>
						</tr>
						<tr>
							<td align="center" colspan="7"></td>
						</tr>
					</table>
				</td>
			</tr>
			
			<th>
				<br><br><br></center>
					<table border="1">
						<tr>
							Tampilan Detak Jantung Per Hari
						</tr>
						<tr><th>Tanggal</th>
							<th>Denyut Jantung</th>
						<!--<th>Pengaturan</th>-->
						</tr>
						<?php
							foreach ($detak1 as $ggg) {
								echo "<tr>
									<td>" . $ggg['waktu'] . "</td>
									<td>" . $ggg['detak'] . "</td>
						
									</td>
								</tr>
						<tr></tr>";
					}
					?>
					</table>
			</th>
			<th>
				<table border="1" align="center" width="1000px">
						<tr><th>Tanggal</th>
							<th>Umur</th>
							<th>Jenis Kelamin</th>
							<th>Obat</th>
							<th>Keluhan/Diagnosa</th>
							<th>Detak Jantung</th>
						<!--<th>Pengaturan</th>-->
						</tr>
						<?php
							foreach ($isi as $row) {
						echo "<tr>
						<td>" . $row['tanggal'] . "</td>
						<td>" . $row['umur'] . "</td>
						<td>" . $row['JK'] . "</td>
						<td>" . $row['obat'] . "</td>
						<td>" . $row['diagnosa'] . "</td>
						<td>" . $row['detak'] . "</td>
						</td>
							</tr>
						<tr></tr>";
					}
					?>
					</table>
					<br><br>
					<a href="../logout.php">LOGOUT</a>
            
			
            
        </table>
		</th>
	</table>
    </body>
</html>