<?php
$nip = htmlspecialchars($_REQUEST['nip']);
$nama= htmlspecialchars($_REQUEST['nama']);
$alamat = htmlspecialchars($_REQUEST['alamat']);
$no_hp = htmlspecialchars($_REQUEST['no_hp']);
include '../../functions/functions.php';
$sql = "update laboran set nama='$nama',alamat='$alamat',no_hp='$no_hp'
where nip=$nip";
$result = mysqli_query($db,$sql);
if ($result){
	echo json_encode(array(
		'id' => $id,
		'NAME' => $NAME
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>
