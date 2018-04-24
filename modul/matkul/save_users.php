<?php

$kd_matkul = htmlspecialchars($_REQUEST['kd_matkul']);
$nama_matkul = htmlspecialchars($_REQUEST['nama_matkul']);
$prodi_matkul = htmlspecialchars($_REQUEST['prodi_matkul']);
$dosen_pengampu = htmlspecialchars($_REQUEST['dosen_pengampu']);
$sks= htmlspecialchars($_REQUEST['sks']);

include '../../functions/functions.php';

$sql = "insert into matkul(kd_matkul,nama_matkul,prodi_matkul,dosen_pengampu,sks) values('$kd_matkul','$nama_matkul','$prodi_matkul','$dosen_pengampu',$sks)";
$result = mysqli_query($db,$sql);
if ($result){
	echo json_encode(array(

		'kd_matkul' => $kd_matkul,
		'nama_matkul' => $nama_matkul,
		'prodi_matkul' => $prodi_matkul,
		'dosen_pengampu' => $dosen_pengampu,
		'sks' => $sks
	));
} else {
	echo json_encode(array('errorMsg'=>'Ruangan sudah ada.'));
}
?>
