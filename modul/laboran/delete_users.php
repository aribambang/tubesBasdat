<?php
$id = intval($_REQUEST['nip']);
include '../../functions/functions.php';
$sql = "delete from laboran where nip=$id";
$result = mysqli_query($db,$sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>
