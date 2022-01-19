<?php 
	require_once "../../koneksi.php";
	$id = $_GET['id'];

	/*AWAL PROSES HAPUS GAMBAR*/
	$query    = mysqli_query($koneksi, "SELECT * FROM tb_story WHERE id_story='$id'");
	$r 		  = mysqli_fetch_array($query);
	$img_name = $r['header'];
	$loc	  = "../../header_story/$img_name";
	@unlink($loc);
	/*AKHIR PROSES HAPUS GAMBAR*/

	mysqli_query($koneksi, "DELETE FROM tb_story WHERE id_story='$id'" );
?>