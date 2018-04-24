<?php
$id = $_REQUEST['id'];
include '../../functions/functions.php';
$sql = "delete from jadwal_praktikum where id=$id";
$result = mysqli_query($db,$sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>
