<?php
error_reporting(E_ALL & ~E_NOTICE);
include '../../koneksi.php';
$kode = $_GET['id'];
$isi  = mysqli_query($con, "select * from pasien where kode='$kode'");
$isi2  = mysqli_query($con, "select * from denyut where kode='$kode'");
$detak1 = mysqli_query($con, "select * from denyut where kode='$kode'");
$detak2 = mysqli_query($con, "select * from denyut where kode='$kode' order by id desc");
$kd = $kode;
$row  = mysqli_fetch_array($isi);
$row2 = mysqli_fetch_assoc($isi2);
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
			while ($baris = mysqli_fetch_assoc($detak2))  //mengulang isi baris dari tabel denyut sampai habis
			{
				++$ctr; //ctr akan bertambah 1 setiap mengulang
				if($ctr<=7) //batas sampai 7 saja untuk menhitung per minggu
				{
					$hitung=$baris['detak']+$hitung;  //variabel hitung akan terus di tambah oleh $baris['detak'] yang dari mysql + variabel hitung itu sendiri. 
					
				}
			}
			$hitung=$hitung/7;
			$angka = number_format($hitung);
			
			//MENAMPILKAN DENYUT
			while ($baris2 = mysqli_fetch_assoc($detak1))
			{
					$sekarang=$baris2['detak'];
			}
			while ($baris3 = mysqli_fetch_array($isi2)){
				$dtk = $baris3['detak'];
			}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HeartRate.hol.es</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->

   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
	<form method="post" action="../insert.php">
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<a class="navbar-brand" href="index.html">Heart Beat/Days</a> -->
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <a href="../index.php" class="btn btn-danger square-btn-adjust">Back</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
				</li>
				<li>
				<table border="1" align="center">
				<tr>
					<th>Tanggal</th>
						<th>Denyut Jantung</th>
				</tr>
                    <?php
							foreach ($detak1 as $ggg) {
								if($ggg['detak'] > 150) {
									$tidaknormal=$ggg['detak'];
									echo "<tr style='background-color:red'>
									<td>" . $ggg['waktu'] . "</td> 
									<td align='center'> &nbsp" . $ggg['detak'] . " BPS</td>
									</tr>";
								}else {
									echo "<tr> <td>" . $ggg['waktu'] . "</td>
									<td align='center'> $nbsp" . $ggg['detak'] . " BPS </td>
									</tr>";
								}

							}
							if($ggg['detak'] > 150 ){
								echo '<script language="javascript">setTimeout(function (){alert(" detak jantung pasien terdeteksi tidak normal, harap segera hubungi pasien");},2000)</script>';
							}
					?>
					</table>
				</li>
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Catatan Pasien <?php echo $row['nama'];?></h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">           
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                
                <div class="text-box" >
                    <p class="main-text"><?php echo $sekarang;?></p>
                    <p class="text-muted">NOW</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                
                <div class="text-box" >
                    <p class="main-text"><?php echo $angka;?></p>
                    <p class="text-muted">One Week</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">  
										
		     </div>
			</div>
                 <!-- /. ROW  -->
				<?php
				 echo "<div align='center'><a href='grafik/grafikHari.php?kd=". $kd ."' style='font-size: 40px; text-decoration: none'>Lihat Grafik</a></div>"
				?>
				<hr/>          

				<div class="row">
				
				</div>

				
                <div class="row">                   
                    
                               
                             <p>
								<th>  <!-- membuat tabel kearah horizontal/kesamping ya pok-->
								<table border="1" align="center" width="950px">
		
								<tr>  <!-- membuat tabel kearah vertikal/kebawah ya pok-->
									<th>Tanggal</th>
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
							foreach ($isi as $row) { //mengulang terus menerus dan membaca semua baris di dalam mysql
						echo "<tr align='center'>
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
						</td>
							</tr>
						<tr></tr>";
					}
					?>
							</table>
							</th>
						</p>
                      
				</div>
				
				<input type="hidden" value="<?php echo $row['kode'];?>" name="kode">
				<input type="hidden" value="<?php echo $row['level'];?>" name="level">
				<input type="hidden" value="<?php echo $row['nama'];?>" name="nama">
				<input type="hidden" value="<?php echo $row['JK'];?>" name="JK">
				<input type="hidden" value="<?php echo $dtk;?>" name="detak">
				<input type="hidden" value="<?php echo $row['NoTelp'];?>" name="telp">
				<table border="1">
				
				<tr>
					<h2>Silahkan Tambahkan Data Pasien</h2>
				</tr>
				<tr>
					<td>Umur</td>
					<td><input type="text" style="background-color:#737373;" value="<?php echo $row['umur'];?>" name="umur"></td>
					</tr>
					<tr>
					<td>Penyakit</td>
					<td><input type="text" style="background-color:#737373;" value="<?php echo $row['penyakit'];?>" name="penyakit"></td>
				</tr>
					<tr>
					<td>Obat</td>
					<td><input type="text" style="background-color:#737373;" value="<?php echo $row['obat'];?>" name="obat"></td>
				</tr>
					<tr>
					<td>Alergi</td>
					<td><input type="text" style="background-color:#737373;" value="<?php echo $row['alergi'];?>" name="alergi"></td>
				</tr>
				<tr>
					<td>Tinggi(angka saja)</td>
					<td><input type="text" placeholder="hanya angka" style="background-color:#737373;" value="<?php echo $row['tinggi'];?>" name="tinggi"></td>
				</tr>
				<tr>
					<td>Berat(angka saja)</td>
					<td><input type="text" style="background-color:#737373;" value="<?php echo $row['berat'];?>" name="berat"></td>
				</tr>
				<tr>
					<td>Keluhan</td>
					<td><textarea type="textarea" style="background-color:#737373;" value="<?php echo $row['catmed'];?>" name="diagnosa"></textarea></td>
				</tr>
				<tr>
					<td>Catatan Medis</td>
					<td><textarea type="textarea" style="background-color:#737373;" value="<?php echo $row['catmed'];?>" name="catmed"></textarea></td>
				</tr>
				</table>
				<table>
					<tr>
						<td>
							<a href='../insert.php?kode=$row[kode]'><button>Tambah</button></a>
						</td>
						</tr>
				</table>
                    
                        
                 
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
  </form> 
</body>
</html>
