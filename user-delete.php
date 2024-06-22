<?php 
include 'aksi/functions.php';

$id = abs((int)base64_decode($_GET["id"]));
$cabang = $_GET["cabang"];

if( hapusUser($id) > 0) {
	echo "
		<script>
			document.location.href = 'users?cabang=".$cabang."';
		</script>
	";
} else {
	echo "
		<script>
			alert('Data gagal dihapus');
			document.location.href = 'users?cabang=".$cabang."';
		</script>
	";
}

?>