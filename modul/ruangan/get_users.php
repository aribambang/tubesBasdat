<?php
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$offset = ($page-1)*$rows;
	$result = array();

    //$firstnameid = isset($_POST['first_nameid']) ? mysql_real_escape_string($_POST['first_nameid']) : '';
    //$productid = isset($_POST['last_nameid']) ? mysql_real_escape_string($_POST['last_nameid']) : '';

//("../../functions/functions.php");
	include '../../functions/functions.php';

	$rs = mysqli_query($db, "select count(*) from ruangan");
	$row = mysqli_fetch_row($rs);
	$result["total"] = $row[0];
	$query = "select * from ruangan limit $offset,$rows";
	$rs = mysqli_query($db,$query);


	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;
	echo json_encode($result);


?>
