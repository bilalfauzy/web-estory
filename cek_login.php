<?php 
	require_once "koneksi.php";

	session_start();

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$query = mysqli_query($koneksi, "select * from tb_admin where username='$username' and password='$password'");

	$r = mysqli_fetch_array($query);

	$cek = mysqli_num_rows($query);

	if ($cek > 0) {
		$_SESSION['id_admin']   = $r['id_admin'];
		$_SESSION['nama_admin'] = $r['nama_admin'];
		$_SESSION['username']   = $r['username'];
		$_SESSION['password']   = $r['password'];

		if (!empty($_POST['remember'])) {
			setcookie('username', $_POST['username'], time()+(60*60*24*5), '/');
			setcookie('password', $_POST['password'], time()+(60*60*24*5), '/');
		}
		else {
			if (isset($_COOKIE['username'])) {
				setcookie('username', '', 0, '/');
			}
			if (isset($_COOKIE['password'])) {
				setcookie('password', '', 0, '/');
			}
		}

		header("location:dashboard.php");
	}
	else {
		header("location:gagal_login.php");
	}
?>