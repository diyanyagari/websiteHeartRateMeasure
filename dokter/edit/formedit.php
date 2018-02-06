<?php
error_reporting(E_ALL & ~E_NOTICE);
include '../../koneksi.php';
$kode = $_GET['id'];
$isi  = mysqli_query($con, "select * from pasien where kode='$kode'");
$detak1 = mysqli_query($con, "select * from denyut where kode='$kode'");
$detak2 = mysqli_query($con, "select * from denyut where kode='$kode' order by id desc");

$row  = mysqli_fetch_array($isi);
//mysqli_select_db($con, 'list');
// membuat function untuk set aktif radio button
/*function active_radio_button($value,$input){
    // apabilan value dari radio sama dengan yang di input
    $result =  $value==$input?'checked':'';
    return $result;
}*/
			//MENGHITUNG RATA RATA PERMINGGU
			$hitung=0;
			$ctr=0;
			while ($baris = mysqli_fetch_assoc($detak2))
			{
				++$ctr;
				if($ctr<=7)
				{
					$hitung=$baris['detak']+$hitung;
				}
			}
			$hitung=$hitung/7;
			$angka = number_format($hitung);
			//MENAMPILKAN DENYUT
			while ($baris2 = mysqli_fetch_assoc($detak1))
			{
					$sekarang=$baris2['detak'];
			}
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Merubah Data Pasien</title>
    </head>
    <body>
	<form method="post" action="insert.php">
	<center>
		<table>
			<tr>
				<td colspan="2" align="center">
					<h1>Catatan Pasien <?php echo $row['nama'];?></h1>
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
						<tr>
							<td align="center" colspan="7"><a href="index.php">Kembali<<<</a></td>
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
						<!--<td><a href='delete.php?id=$row[id]'>Delete</a>-->
						</td>
							</tr>
						<tr></tr>";
					}
					?>
					</table>
			</th>
			
			<th>
				<br><br><br></center>
					<table border="1" align="right" width="1000px">
		
						<tr><th>Tanggal</th>
							<th>Umur</th>
							<th>Jenis Kelamin</th>
							<th>Penyakit</th>
							<th>Obat</th>
						<th>Alergi</th>
						<th>Tinggi Badan</th>
						<th>Berat Badan</th>
						<th>Keluhan/Diagnosa</th>
							<th>Detak Jantung</th>
						<th>Catatan Medis</th>
						<!--<th>Pengaturan</th>-->
						</tr>
						<?php
							foreach ($isi as $row) {
						echo "<tr>
						<td>" . $row['tanggal'] . "</td>
						<td>" . $row['umur'] . "</td>
						<td>" . $row['JK'] . "</td>
						<td>" . $row['penyakit'] . "</td>
						<td>" . $row['obat'] . "</td>
						<td>" . $row['alergi'] . "</td>
						<td>" . $row['tinggi'] . "</td>
						<td>" . $row['berat'] . "</td>
						<td>" . $row['diagnosa'] . "</td>
						<td>" . $row['detak'] . "</td>
						<td>" . $row['catmed'] . "</td>
						<!--<td><a href='delete.php?id=$row[id]'>Delete</a>-->
						</td>
							</tr>
						<tr></tr>";
					}
					?>
					</table>
				</th>
		
				<center>
					
				
				<input type="hidden" value="<?php echo $row['kode'];?>" name="kode">
					<input type="hidden" value="<?php echo $row['level'];?>" name="level">
				<input type="hidden" value="<?php echo $row['nama'];?>" name="nama">
				<input type="hidden" value="<?php echo $row['JK'];?>" name="JK">
				<table border="1">
				<tr>
					<h2>Silahkan Tambahkan Data Pasien</h2>
				</tr>
				<tr>
					<td>Umur</td>
					<td><input type="text" value="<?php echo $row['umur'];?>" name="umur"></td>
					</tr>
					<tr>
					<td>Penyakit</td>
					<td><input type="text" value="<?php echo $row['penyakit'];?>" name="penyakit"></td>
				</tr>
					<tr>
					<td>Obat</td>
					<td><input type="text" value="<?php echo $row['obat'];?>" name="obat"></td>
				</tr>
					<tr>
					<td>Alergi</td>
					<td><input type="text" value="<?php echo $row['alergi'];?>" name="alergi"></td>
				</tr>
				<tr>
					<td>Tinggi(angka saja)</td>
					<td><input type="text" placeholder="hanya angka" value="<?php echo $row['tinggi'];?>" name="tinggi"></td>
				</tr>
				<tr>
					<td>Berat(angka saja)</td>
					<td><input type="text" value="<?php echo $row['berat'];?>" name="berat"></td>
				</tr>
				<tr>
					<td>Keluhan</td>
					<td><textarea type="textarea" value="<?php echo $row['catmed'];?>" name="diagnosa"></textarea></td>
				</tr>
				<tr>
					<td>Catatan Medis</td>
					<td><textarea type="textarea" value="<?php echo $row['catmed'];?>" name="catmed"></textarea></td>
				</tr>
				</table>
				<table>
					<tr>
						<td>
							<a href='insert.php?kode=$row[kode]'><button>Tambah</button></a>
						</td>
						</tr>
				</table>
	
	
        <!--<form method="post" action="edit.php">
            <input type="hidden" value="<?php echo $row['id'];?>" name="id">
            <h2>EDIT DATA PASIEN</h2>
			<table>	
                <tr><td>NAMA</td><td><input type="text" value="<?php echo $row['nama'];?>" name="nama"></td></tr>
                <tr><td>PENYAKIT</td><td><input type="text" value="<?php echo $row['penyakit'];?>" name="penyakit"></td></tr>
                    </td></tr>
                <tr><td>OBAT</td><td><input type="text" value="<?php echo $row['obat'];?>" name="obat"></td></tr>
				<tr><td>Detak Jantung</td><td><?php echo $row['detak'];?></td></tr>
                <tr><td colspan="2"><button type="submit" value="simpan">SIMPAN PERUBAHAN</button>
                        <a href="index.php">Kembali</a></td></tr>
            </table>-->
				</form>
		</table>
	</body>
</html>