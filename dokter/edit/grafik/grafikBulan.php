<!DOCTYPE HTML>
<?php
	error_reporting(E_ALL & ~E_NOTICE);
	include "koneksi.php";
	$kode = $_GET['kd'];
	$isi = mysqli_query($con, "select * from denyut WHERE kode='$kode' order by waktu desc");
	
	
	
	/*for($i=2006;$i<=2011;$i++){
		echo "'". $i ."',";
	}*/
	if (!$isi) {
    	die(mysql_error());
	}
	$x=0;
	while ($baris2 = mysqli_fetch_array($isi))
	{
		$waktu[$x]=$baris2['waktu'];
		$ddd[$x]=$baris2['detak'];
		++$x;
	}
	//MENGHITUNG BULAN PERTAMA
		for ($bln1=29;$bln1>=0;--$bln1)
		{
			$kumpul1=$kumpul1 + $ddd[$bln1];
		}
		$hasilbln1=$kumpul1/30;
		//echo $hasilbln1." ";
		
	//MENGHITUNG BULAN KEDUA
		for ($bln2=59;$bln2>=30;--$bln2)
		{
			$kumpul2=$kumpul2 + $ddd[$bln2];
		}
		$hasilbln2=$kumpul2/30;
		//echo $hasilbln2." ";
		
	//MENGHITUNG BULAN KETIGA
		for ($bln3=89;$bln3>=60;--$bln3)
		{
			$kumpul3=$kumpul3 + $ddd[$bln3];
		}
		$hasilbln3=$kumpul3/30;
		//echo $hasilbln3." ";
		
	//MENGHITUNG BULAN KEEMPAT
		for ($bln4=119;$bln4>=90;--$bln4)
		{
			$kumpul4=$kumpul4 + $ddd[$bln4];
		}
		$hasilbln4=$kumpul4/30;
		//echo $hasilbln4." ";
		
	//MENGHITUNG BULAN KELIMA
		for ($bln5=149;$bln5>=120;--$bln5)
		{
			$kumpul5=$kumpul5 + $ddd[$bln5];
		}
		$hasilbln5=$kumpul5/30;
		//echo $hasilbln5." ";
		
	//MENGHITUNG BULAN KEENAM
		for ($bln6=179;$bln6>=150;--$bln6)
		{
			$kumpul6=$kumpul6 + $ddd[$bln6];
		}
		$hasilbln6=$kumpul6/30;
		//echo $hasilbln6." ";
		
	//MENGHITUNG BULAN KETUJUH
		for ($bln7=209;$bln7>=180;--$bln7)
		{
			$kumpul7=$kumpul7 + $ddd[$bln7];
		}
		$hasilbln7=$kumpul7/30;
		//echo $hasilbln7." ";
		
	//MENGHITUNG BULAN KEDELAPAN
		for ($bln8=239;$bln8>=210;--$bln8)
		{
			$kumpul8=$kumpul8 + $ddd[$bln8];
		}
		$hasilbln8=$kumpul8/30;
		//echo $hasilbln8." ";
		
	//MENGHITUNG BULAN KESEMBILAN
		for ($bln9=269;$bln9>=240;--$bln9)
		{
			$kumpul9=$kumpul9 + $ddd[$bln9];
		}
		$hasilbln9=$kumpul9/30;
		//echo $hasilbln9." ";
		
	//MENGHITUNG BULAN KESEPULUH
		for ($bln10=299;$bln10>=270;--$bln10)
		{
			$kumpul10=$kumpul10 + $ddd[$bln10];
		}
		$hasilbln10=$kumpul10/30;
		//echo $hasilbln10." ";
		
	//MENGHITUNG BULAN KESEBELAS
		for ($bln11=329;$bln11>=300;--$bln11)
		{
			$kumpul11=$kumpul11 + $ddd[$bln11];
		}
		$hasilbln11=$kumpul11/30;
		//echo $hasilbln11." ";
		
	//MENGHITUNG BULAN DUABELAS
		for ($bln12=359;$bln12>=330;--$bln12)
		{
			$kumpul12=$kumpul12 + $ddd[$bln12];
		}
		$hasilbln12=$kumpul12/30;
		//echo $hasilbln12." ";
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<title>Grafik pendapatan perkapita</title>
		<!--1) include file jquery.min.js dan higchart.js-->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script src="js/highcharts.js"></script>		
	</head>
	<body>


<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
<div id=link>
<div style="text-align: center">
	<br><br><br>
	<?php
	echo "
	<a href='grafikHari.php?kd=".$kode."' style='font-size: 40px; text-decoration: none'>Per 7 Hari</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<a href='grafikBulan.php?kd=".$kode."' style='font-size: 40px; text-decoration: none'>Per Bulan</a>
	"
	?>
</div>
</div>
<div id=link>
<div style="text-align: center">
	<br><br>
	<?php
		echo "<a href='../indexedit.php?id=".$kode."' style='font-size: 40px; text-decoration: none'>Kembali</a>"
	?>
</div>
</div>
<script t="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container', //letakan grafik di div id container
				//Type grafik, anda bisa ganti menjadi area,bar,column dan bar
                type: 'line',  
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Grafik Detak Jantung Bulanan',
                x: -20 //center
            },
            subtitle: {
                text: 'www.heartrate.hol.es',
                x: -20
            },
            xAxis: { //X axis menampilkan data tahun 
                categories: ["Bulan1","Bulan2","Bulan3","Bulan4","Bulan5","Bulan6","Bulan7","Bulan8","Bulan9","Bulan10","Bulan11","Bulan12",
					<!--<?php 
						for($i=6;$i>=0;--$i){
							echo "'". $waktu[$i] ."',";
						}
					?> -->
					]
            },
            yAxis: {
                title: {  //label yAxis
                    text: 'beats per minute'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080' //warna dari grafik line
                }]
            },
            tooltip: { 
			//fungsi tooltip, ini opsional, kegunaan dari fungsi ini 
			//akan menampikan data di titik tertentu di grafik saat mouseover
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y ;
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
			//series adalah data yang akan dibuatkan grafiknya,
			//saat ini mungkin anda heran, buat apa label indonesia dikanan 
			//grafik, namun fungsi label ini sangat bermanfaat jika
			//kita menggambarkan dua atau lebih grafik dalam satu chart,
			//hah, emang bisa? ya jelas bisa dong, lihat tutorial selanjutnya 
            series: [{  
                name: 'Detak Jantung',  
				//data yang akan ditampilkan 
                data: [<?php
					echo $hasilbln1.",".$hasilbln2.",".$hasilbln3.",".$hasilbln4.",".$hasilbln5.",".$hasilbln6.",".$hasilbln7.",".$hasilbln8.",".$hasilbln9.",".$hasilbln10.",".$hasilbln11.",".$hasilbln12.",";
					?>
				]
            }]
        });
    });
    
});</script>
	</body>
</html>