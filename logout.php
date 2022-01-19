<?php 
	session_start();
	session_destroy();
	echo "<script>alert('Anda Sudah Keluar Dashboard'); window.location = 'index.php'</script>";
?>