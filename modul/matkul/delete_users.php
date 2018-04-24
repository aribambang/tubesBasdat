<?php
$kd_matkul = htmlspecialchars($_REQUEST['kd_matkul']);
include '../../functions/functions.php';
$sql = "delete from matkul where kd_matkul='$kd_matkul'";
$result = mysqli_query($db,$sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>
