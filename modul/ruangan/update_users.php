<?php
$kd_ruangan = $_REQUEST['kd_ruangan'];
$nama_ruangan = $_REQUEST['nama_ruangan'];
include '../../functions/functions.php';
$sql = "update ruangan set kd_ruangan='$kd_ruangan',nama_ruangan='$nama_ruangan' where kd_ruangan='$kd_ruangan'";
$result = mysqli_query($db,$sql);
if ($result){
	echo json_encode(array(
		'success1'=>true,
		'kd_ruangan' => $kd_ruangan,
		'nama_ruangan' => $nama_ruangan
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occure.'));
}
?>
