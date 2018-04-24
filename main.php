<?php
include("functions/functions.php");
session_start();
if ( !isset($_SESSION['username'])) {
	echo "<script>window.open('index.php','_self')</script>";
} else {
	echo "";
}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Sistem Informasi Lab Multimedia</title>

<link rel="stylesheet" type="text/css" href="css/themes/material/easyui.css">
<link rel="stylesheet" type="text/css" href="css/themes/icon.css">
<script type="text/javascript" src="jquery-easyui-1.5.2/jquery.min.js"></script>
<script type="text/javascript" src="jquery-easyui-1.5.2/jquery.easyui.min.js"></script>


<script type='text/javascript'>
window.setTimeout("hari()",0)
function hari(){
 var namah = new Array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
 var namab = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 var tanggal = new Date();
 setTimeout("hari()",0);
 document.getElementById("waktu").innerHTML =namah[tanggal.getDay()]+", "+tanggal.getDate()+" "+namab[tanggal.getMonth()]+" "+tanggal.getFullYear();
}
window.setTimeout("waktu()",1000);
function waktu() {
var tanggal1 = new Date();
setTimeout("waktu()",1000);
document.getElementById("jam").innerHTML = tanggal1.getHours()+":"+tanggal1.getMinutes()+":"+tanggal1.getSeconds();
}
</script>



</head>

<body class="easyui-layout">
<div class="atas" data-options="region:'north',border:false" style="height:80px;padding:10px">


	<div style="float: left; height: 70px"><img src="img/logo.png" /></div>

	<div style="float: right;">
		<div style="color : white;font-size: 9pt; padding-top: 0"  align='right' id='waktu'></div>
		<div style="color : white;font-size: 9pt; padding-top: 0"  align='right' id='jam'></div>
	</div>




    </div>
    <div data-options="region:'west',split:true,title:'Menu Utama',iconCls:'icon-menu'" style="width:200px;padding:10px;">
      <?php
        include 'menu.php';
       ?>
    </div>
    <div data-options="region:'east',split:true,collapsed:true,title:'Pengguna',iconCls:'icon-users'" style="width:130px;padding:10px;">
    <?php /*
	include 'pengguna.php';
	include 'menu_pengguna.php';
  */
  ?>
    </div>
	<div class="bawah" data-options="region:'south',border:false" style="height:40px;padding:10px;color:#FFF; background:#9bbe25;">
    <div align="center">
    Copyright &copy; Kelompok 8 Basis Data RC.
    </div>
    </div>
	<div id="content" data-options="region:'center',title:'Content',iconCls:'icon-content'">
    <?php include 'content.php'; ?>
    </div>
<style type="text/css">
img {
    max-width: 1000px;
		max-height: 60px;
    height: auto;
    width: auto\9; /* ie8 */
}
body {
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
}
a {
	text-decoration:none;
	color:#000;
}
#content {
	padding:10px 10px 10px 10px;
}
.atas{
	background: url(img/minimalist8.png), -moz-linear-gradient(top, #9bbe25 0%, #FFFFFF 60%) fixed;
	background: url(img/minimalist8.png), -ms-linear-gradient(top, #9bbe25 0%, #FFFFFF 60%) fixed;
	background: url(img/minimalist8.png), -o-linear-gradient(top, #9bbe25 0%, #FFFFFF 60%) fixed;
	background: url(img/minimalist8.png), -webkit-gradient(linear, 0% 0%, 0% 100%, from(#9bbe25 0%), to(#FFFFFF 60%)) fixed;
	background: url(img/minimalist8.png), -webkit-linear-gradient(top, #9bbe25 0%, #FFFFFF 60%) fixed;
}
</style>
</body>
</html>
