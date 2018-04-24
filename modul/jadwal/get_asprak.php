<?php

include '../../functions/functions.php';

$rs = mysqli_query($db, "select count(*) from asprak");
$row = mysqli_fetch_row($rs);
$result["total"] = $row[0];
$query = "select nim, concat(nim,' - ',nama) as nama from asprak";
$rs = mysqli_query($db,$query);


$items = array();
while($row = mysqli_fetch_object($rs)){
  array_push($items, $row);
}
$result["rows"] = $items;
echo json_encode($items);


?>
