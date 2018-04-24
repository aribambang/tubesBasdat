<?php
$nim = htmlspecialchars($_REQUEST['nim']);
$kd_matkul = htmlspecialchars($_REQUEST['kd_matkul']);
$kd_ruangan = htmlspecialchars($_REQUEST['kd_ruangan']);
$id = htmlspecialchars($_REQUEST['id']);
$semester = htmlspecialchars($_REQUEST['semester']);
$hari = htmlspecialchars($_REQUEST['hari']);
$jam_awal = htmlspecialchars($_REQUEST['jam_awal']);
$jam_akhir = htmlspecialchars($_REQUEST['jam_akhir']);
include '../../functions/functions.php';
$sql = "update jadwal_praktikum set semester='$semester',hari='$hari',
jam_awal='$jam_awal',jam_akhir='$jam_akhir',kd_ruangan='$kd_ruangan',
kd_matkul='$kd_matkul',nim=$nim where id=$id";
$result = mysqli_query($db,$sql);
if ($result){
	echo json_encode(array(
		'id' => $id,
		'semester' => $semester,
		'hari' => $hari,
		'jam_awal' => $jam_awal,
		'jam_akhir' => $jam_akhir,
		'kd_ruangan' => $kd_ruangan,
		'kd_matkul' => $kd_matkul,
		'nim' => $nim
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occure.'));
}
?>
