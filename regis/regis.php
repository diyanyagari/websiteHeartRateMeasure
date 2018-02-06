<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
	<script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registrasi</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>

      <form action="koneksi.php" method="post">
      
        <h1>Sign Up</h1>
        
        <fieldset>
          
          <label for="name">Nama:</label>
          <input type="text" id="name" name="nama">
          
          <label for="mail">Password:</label>
          <input type="password" id="password" name="password">
          
          <label for="name">Umur:</label>
          <input type="text" id="name" name="umur" maxlength="2" onkeypress="return hanyaAngka(event)">
		  
		  <label>Jenis Kelamin :</label>
			<input type="radio" id="LK" value="Laki - laki" name="JK"><label for="LK" class="light">Laki - laki</label>
			<br>
			<input type="radio" id="P" value="Perempuan" name="JK"><label for="P" class="light">Perempuan</label>
			<br><br>
          
          <label for="name">Tinggi:</label>
          <input type="text" id="name" placeholder="Hanya Diisi Angka" name="tinggi" maxlength="3" onkeypress="return hanyaAngka(event)">
		  
		  <label for="name">Berat:</label>
          <input type="text" id="name" placeholder="Hanya Diisi Angka" name="berat" maxlength="3" onkeypress="return hanyaAngka(event)">
          
		  <label for="name">No Telp Saudara:</label>
          <input type="text" id="name" placeholder="Hanya Diisi Angka" name="notlp" onkeypress="return hanyaAngka(event)">
		  
        </fieldset>
        <button type="reset">Reset</button>
		<button type="submit">Sign Up</button>
      </form>
      
    </body>
    
</html>
  
</body>
</html>
