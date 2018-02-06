<!DOCTYPE HTML>
<?php
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
                text: 'Grafik Detak Jantung Per 7 Hari',
                x: -20 //center
            },
            subtitle: {
                text: 'www.heartrate.hol.es',
                x: -20
            },
            xAxis: { //X axis menampilkan data tahun 
                categories: [
					<?php 
						for($i=6;$i>=0;--$i){
							echo "'". $waktu[$i] ."',";
						}
					
					?>
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
                data: [
				<?php 
						for($i=6;$i>=0;--$i){
							echo $ddd[$i] .",";
						}
					
					?>
				]
            }]
        });
    });
    
});</script>
	</body>
</html>