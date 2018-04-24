<?php
$kd_matkul = htmlspecialchars($_REQUEST['kd_matkul']);
$nama_matkul = htmlspecialchars($_REQUEST['nama_matkul']);
$prodi_matkul = htmlspecialchars($_REQUEST['prodi_matkul']);
$dosen_pengampu = htmlspecialchars($_REQUEST['dosen_pengampu']);
$sks= htmlspecialchars($_REQUEST['sks']);
include '../../functions/functions.php';
$sql = "update matkul set kd_matkul='$kd_matkul',nama_matkul='$nama_matkul',prodi_matkul='$prodi_matkul',dosen_pengampu='$dosen_pengampu',sks=$sks where kd_matkul='$kd_matkul'";
$result = mysqli_query($db,$sql);
if ($result){
	echo json_encode(array(
		'success1'=>true,
		'kd_matkul' => $kd_matkul,
		'nama_matkul' => $nama_matkul,
		'prodi_matkul' => $prodi_matkul,
		'dosen_pengampu' => $dosen_pengampu,
		'sks' => $sks
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occure.'));
}
?>
