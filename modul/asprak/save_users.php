<?php

$nim = htmlspecialchars($_REQUEST['nim']);
$nama = htmlspecialchars($_REQUEST['nama']);
$prodi = htmlspecialchars($_REQUEST['prodi']);
$no_hp = htmlspecialchars($_REQUEST['no_hp']);
$alamat = htmlspecialchars($_REQUEST['alamat']);

include '../../functions/functions.php';

$sql = "insert into asprak(nim,nama,prodi,no_hp,alamat) values($nim,'$nama','$prodi','$no_hp',$alamat)";
$result = mysqli_query($db,$sql);
if ($result){
	echo json_encode(array(

		'nim' => $nim,
		'nama' => $nama,
		'prodi' => $prodi,
		'no_hp' => $no_hp,
		'alamat' => $alamat
	));
} else {
	echo json_encode(array('errorMsg'=>'Ruangan sudah ada.'));
}
?>
