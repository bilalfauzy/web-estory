<?php
  session_start();
  if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo '
    <center>
    <br><br><br><br><br><br><br><br><br><br>
    <b>Akun Telah Keluar</b>
    <br>
    <b>Silahkan Masuk Kembali</b>
    <br>
    <a href="index.php" title="Kembali ke Halaman Login"><img src="images\key.png" height="100" weight="100"></a>
    </center>
    ';
  }
  else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>.:Dashboard E-Story:.</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<!-- INI NAVIGASI/MENU -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  			<a class="navbar-brand" href="dashboard.php">E-Story</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
  			<div class="collapse navbar-collapse" id="navbarSupportedContent">
    			<ul class="navbar-nav mr-auto">
      				<li class="nav-item">
        				<a class="nav-link" href="../../dashboard.php">Home</a>
      				</li>
      				<li class="nav-item">
        				<a class="nav-link" href="#">Profile</a>
      				</li>
      				<li class="nav-item dropdown">
        				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Master Data</a>
        				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
          					<a class="dropdown-item" href="#">Master Admin</a>
          					<a class="dropdown-item" href="tampil_story.php">Master Story</a>
        				</div>
      				</li>
      				<li class="nav-item dropdown">
        				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
        				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
          					<a class="dropdown-item" href="#">My Account</a>
          					<a class="dropdown-item" href="../../logout.php">Logout</a>
        				</div>
      				</li>
    			</ul>
    			<form class="form-inline my-2 my-lg-0">
      				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    			</form>
  			</div>
		</nav>
		<!-- INI FORM -->
		<form class="mt-4" method="POST" enctype="multipart/form-data">
  		<div class="form-group">
    		<label for="exampleInputEmail1">Judul</label>
    		<input type="text" class="form-control" name="judul" placeholder="Masukkan Judul">
  		</div>
  		<div class="form-group">
    		<label for="exampleInputPassword1">Header</label>
    		<input type="file" class="form-control" name="header">
  		</div>
  		<div class="form-group">
    		<label for="exampleFormControlTextarea1">Isi Story</label>
    		<textarea class="form-control" name="isi" rows="5"></textarea>
  		</div>
  		<button type="submit" class="btn btn-dark" name="submit">Simpan</button>
		</form>
		<?php 
			require_once "../../koneksi.php";
			if (isset($_POST['submit'])) {
				$judul					= $_POST['judul'];
				$isi						= $_POST['isi'];
				$filename				= $_FILES['header']['name'];
				$extension 			= pathinfo($filename, PATHINFO_EXTENSION);
				$size			 			= $_FILES['header']['size'];
				$file_extension	= array('png','jpg','jpeg','gif');
				$rand						= rand();
				if ($filename != "") {
					if (!in_array($extension, $file_extension)) {
						echo "<script>alert('File Tidak Didukung'); location.window = 'tambah_story.php'</script>";
					}
					else {
						if ($size < 170000) {
							$nama_gambar = $rand.'_'.$filename;
							move_uploaded_file($_FILES['header']['tmp_name'], '../../header_story/'.$rand.'_'.$filename);
							mysqli_query($koneksi, "INSERT INTO tb_story (judul, header, isi) VALUES ('$judul','$nama_gambar','$isi')");
							header("location:tampil_story.php");
						}
						else {
							echo "<script>alert('File Tidak Didukung'); location.window = 'tambah_story.php'</script>";
						}
					}
				}
			}
		?>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
<?php 
  }
?>