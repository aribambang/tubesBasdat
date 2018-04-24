<center>
  <div align="center" style="padding-top: 10px;"><font size="5">Selamat Datang Di<br>Sistem Informasi Jadwal Praktikum <br>Laboratorium Multimedia ITERA</font><br>
  <br>  <table id="dg" class="easyui-datagrid" style="width:95%;height:250px"
        url="http://localhost/tubes1/modul/home/get_users.php"
        title="Jadwal Praktikum Hari Ini"
    	  fitColumns="true"
    	  singleSelect="true"
        pagination="true" >
        <thead>
            <tr>
                <th field="semester" style="width:7%; background-color:#E0EDFF">Semester</th>
                <th field="hari" width="7%">Hari</th>
                <th field="jam_awal" width="9%">Jam Mulai</th>
                <th field="jam_akhir" width="9%">Jam Selesai</th>
                <th field="nama_matkul" width="15%">Nama Mata Kuliah</th>
                <th field="prodi_matkul" width="15%">Program Studi</th>
                <th field="nama_ruangan" width="15%">Ruangan</th>
                <th field="nama" width="15%">Asisten Praktikum</th>
            </tr>
        </thead>
    </table>

    <font size="4">
      <br>
      Informasi Laboratorium Multimedia ITERA
    <table>
      <tr>
        <td>Jumlah Praktikum</td>
        <td>: <?php countpraktikum(); ?></td>
      </tr>
    <tr>
      <td>Jumlah Asisten Praktikum</td>
      <td>: <?php countasprak(); ?></td>
    </tr>
  </table></font> </div>

</center>
