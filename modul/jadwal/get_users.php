<?php
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$offset = ($page-1)*$rows;
	$result = array();

	include '../../functions/functions.php';

	$rs = mysqli_query($db, "select count(*) from jadwal_praktikum");
	$row = mysqli_fetch_row($rs);
	$result["total"] = $row[0];
	$query = "select a.id, a.semester,a.hari,a.jam_awal,a.jam_akhir,b.kd_matkul,b.prodi_matkul,b.nama_matkul,b.prodi_matkul,c.kd_ruangan,c.nama_ruangan,d.nim,d.nama from jadwal_praktikum a,matkul b, ruangan c, asprak d where a.kd_matkul=b.kd_matkul and a.kd_ruangan=c.kd_ruangan and a.nim=d.nim limit $offset,$rows";
	$rs = mysqli_query($db,$query);


	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;
	echo json_encode($result);


?>
