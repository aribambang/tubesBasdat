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



$sql_cek = "select semester,hari,kd_ruangan,jam_awal,jam_akhir from jadwal_praktikum where semester='$semester' and hari='$hari' and kd_ruangan='$kd_ruangan' and jam_awal >= '$jam_awal' and jam_akhir <= '$jam_akhir';";
$run_sql_cek = mysqli_query($db, $sql_cek);
$check_jadwal = mysqli_num_rows($run_sql_cek);

if ($check_jadwal==0) {
    $sql = "insert into jadwal_praktikum(semester,hari,jam_awal,jam_akhir,kd_ruangan,kd_matkul,nim) values ('$semester','$hari','$jam_awal','$jam_akhir','$kd_ruangan','$kd_matkul',$nim);";
    $result = mysqli_query($db,$sql);
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
    echo json_encode(array('errorMsg'=>'Jadwal praktukum sudah ada.'));
}

?>
