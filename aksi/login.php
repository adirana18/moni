<?php
include 'functions.php';
setcookie("emailPos", base64_encode($_POST['user_email']), time() + 31536000, "/");
setcookie("passPos", base64_encode($_POST['user_password']), time() + 31536000, "/");

$email    = mysqli_real_escape_string($conn, $_POST['user_email']);
$password = md5(md5(mysqli_real_escape_string($conn, $_POST['user_password'])));

$cek = $conn->query("SELECT * FROM user WHERE user_email='$email' AND user_password='$password'");

	if($cek->num_rows > 0)
	{
		session_start();

		$r = $cek->fetch_array();
		$_SESSION['user_nama']      = $r['user_nama'];
		$_SESSION['user_email']     = $r['user_email'];
		$_SESSION['user_password']  = $r['user_password'];
		$_SESSION['user_status']    = $r['user_status'];
		$_SESSION['user_id']        = $r['user_id'];
		$_SESSION['user_level']     = $r['user_level'];
		$_SESSION['user_cabang']    = $r['user_cabang'];
		echo"<script>
				window.location='../bo';
			</script>";
	}else{
		echo"
			<script>
				alert('Email & Password Salah !!');
				window.location='../';
			</script>";
}
?>