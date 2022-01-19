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
		<a class="btn btn-dark mt-4" href="tambah_story.php" role="button">Tambah Story [+]</a>
		<!-- INI TABEL -->
		<table class="table table-hover mt-4">
  		<thead>
    		<tr>
      		<th scope="col">#</th>
      		<th scope="col">Judul</th>
      		<th scope="col">Header</th>
      		<th scope="col">Isi Story</th>
      		<th scope="col">Aksi</th>
    		</tr>
  		</thead>
  		<?php
  			require_once "../../koneksi.php";
  			$query = mysqli_query($koneksi, "SELECT * FROM tb_story");
  			$no 	 = 1;
  			while ($r = mysqli_fetch_array($query)) {
  		?>
  		<tbody>
    		<tr>
      		<th scope="row"><?php echo $no++ ?></th>
      		<td><?php echo $r['judul'] ?></td>
      		<td><img src="../../header_story/<?php echo $r['header'] ?>" height="100" width="100"></td>
      		<td><?php echo substr($r['isi'], 0, 400) ?>.....</td>
      		<td>
      			<a class="btn btn-info" href="edit_story.php?id=<?php echo $r['id_story'] ?>" role="button">EDIT</a>
      			<a class="btn btn-danger mt-1" href="delete_story.php?id=<?php echo $r['id_story'] ?>" role="button" onclick="return confirm ('Apakah Anda Ingin Menghapus Data Ini?')">DELETE</a>
      			<a class="btn btn-warning mt-1" href="detail_story.php?id=<?php echo $r['id_story'] ?>" role="button">DETAIL</a>
      		</td>
    		</tr>
  		</tbody>
  		<?php 
  			}
  		?>
		</table>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
<?php 
  }
?>