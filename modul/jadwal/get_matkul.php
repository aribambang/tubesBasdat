<?php
include '../../functions/functions.php';

$rs = mysqli_query($db, "select count(*) from matkul");
$row = mysqli_fetch_row($rs);
$result["total"] = $row[0];
$query = "select kd_matkul,concat(kd_matkul, ' - ',nama_matkul, ' - ',prodi_matkul) as nama_matkul from matkul";
$rs = mysqli_query($db,$query);


$items = array();
while($row = mysqli_fetch_object($rs)){
  array_push($items, $row);
}
$result["rows"] = $items;
echo json_encode($items);
?>
