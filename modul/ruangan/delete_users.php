<?php
$kd_ruangan = htmlspecialchars($_REQUEST['kd_ruangan']);
include '../../functions/functions.php';
$sql = "delete from ruangan where kd_ruangan='$kd_ruangan'";
$result = mysqli_query($db,$sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>
