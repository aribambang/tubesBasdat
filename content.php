<?php

$mod = $_GET['module'];

if($mod=='laboran'){
  include "modul/laboran/index.php";
}
elseif($mod=='home'){
  include "modul/home/index.php";
}
elseif($mod=='asprak'){
  include "modul/asprak/index.php";
}
elseif($mod=='jadwal'){
  include "modul/jadwal/index.php";
}
elseif($mod=='matkul'){
  include "modul/matkul/index.php";
}
elseif($mod=='ruangan'){
  include "modul/ruangan/index.php";
}
elseif($mod=='password'){
  include "modul/password/index.php";
}

 ?>
