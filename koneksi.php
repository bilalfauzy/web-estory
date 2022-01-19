<?php 
	$server 	= "localhost";
	$username	= "root";
	$password	= "";
	$db_name 	= "db_estory";

	$koneksi = mysqli_connect($server,$username,$password,$db_name);

	if (!$koneksi) {
		echo "Gagal Terkoneksi";
	} 
	else {
		//echo "Berhasil Terkoneksi";
	}
?>