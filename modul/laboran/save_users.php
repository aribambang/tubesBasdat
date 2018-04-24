<?php

$nip = htmlspecialchars($_REQUEST['nip']);
$nama= htmlspecialchars($_REQUEST['nama']);
$alamat = htmlspecialchars($_REQUEST['alamat']);
$no_hp = htmlspecialchars($_REQUEST['no_hp']);
$username = htmlspecialchars($_REQUEST['username']);
$password = md5(htmlspecialchars($_REQUEST['password']));

include '../../functions/functions.php';

$sql = "insert into laboran(nip,nama,alamat,no_hp,username,password) values($nip,'$nama','$alamat','$no_hp','$username','$password')";
$result = mysqli_query($db,$sql);
if ($result){
	echo json_encode(array(

		'nip' => $nip,
		'nama' => $nama,
		'alamat' => $alamat,
		'no_hp' => $no_hp
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>
