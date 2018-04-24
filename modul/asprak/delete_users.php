<?php
$nim = htmlspecialchars($_REQUEST['nim']);
include '../../functions/functions.php';
$sql = "delete from asprak where nim=$nim";
$result = mysqli_query($db,$sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>
