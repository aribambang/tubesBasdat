<?php

$kd_ruangan = htmlspecialchars($_REQUEST['kd_ruangan']);
$nama_ruangan = htmlspecialchars($_REQUEST['nama_ruangan']);

include '../../functions/functions.php';

$sql = "insert into ruangan(kd_ruangan,nama_ruangan) values('$kd_ruangan','$nama_ruangan')";
$result = mysqli_query($db,$sql);
if ($result){
	echo json_encode(array(

		'kd_ruangan' => $kd_ruangan,
		'nama_ruangan' => $nama_ruangan
	));
} else {
	echo json_encode(array('errorMsg'=>'Ruangan sudah ada.'));
}
?>
