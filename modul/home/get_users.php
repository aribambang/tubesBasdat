<?php
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$offset = ($page-1)*$rows;
	$result = array();

	$hari = date ("D");

	switch($hari){
		case 'Sun':
			$hari_ini = "Minggu";
		break;

		case 'Mon':
			$hari_ini = "Senin";
		break;

		case 'Tue':
			$hari_ini = "Selasa";
		break;

		case 'Wed':
			$hari_ini = "Rabu";
		break;

		case 'Thu':
			$hari_ini = "Kamis";
		break;

		case 'Fri':
			$hari_ini = "Jumat";
		break;

		case 'Sat':
			$hari_ini = "Sabtu";
		break;

		default:
			$hari_ini = "Tidak di ketahui";
		break;
	}


	include '../../functions/functions.php';

	$rs = mysqli_query($db, "select count(*) from jadwal_praktikum");
	$row = mysqli_fetch_row($rs);
	$result["total"] = $row[0];
	$query = "select a.semester,a.hari,a.jam_awal,a.jam_akhir,b.nama_matkul,b.prodi_matkul,c.nama_ruangan,d.nama from jadwal_praktikum a,matkul b, ruangan c, asprak d where a.kd_matkul=b.kd_matkul and a.kd_ruangan=c.kd_ruangan and a.nim=d.nim and hari='$hari_ini' and semester IN (MONTH(now()) < 7, 'Genap', 'Ganjil') limit $offset,$rows";
	$rs = mysqli_query($db,$query);


	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;
	echo json_encode($result);


?>
