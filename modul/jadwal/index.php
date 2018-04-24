
<br>
<center>

<table id="dg" class="easyui-datagrid" style="width:95%;height:410px"
    url="http://localhost/tubes1/modul/jadwal/get_users.php"
    title="Jadwal Praktikum"
    toolbar="#toolbar"
	  fitColumns="true"
	  singleSelect="true"
    pagination="true" >
    <thead>
        <tr>
          <th field="id" style="width:5%; background-color:#E0EDFF">id</th>
          <th field="semester" style="width:10%">Semester</th>
          <th field="hari" width="10%">Hari</th>
          <th field="jam_awal" width="10%">Jam Mulai</th>
          <th field="jam_akhir" width="10%">Jam Selesai</th>
          <th field="nama_matkul" width="20%">Mata Kuliah</th>
          <th field="nama_ruangan" width="20%">Ruangan</th>
          <th field="nama" width="20%">Asisten Praktikum</th>
        </tr>
    </thead>
</table>
	<div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Data Baru</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Hapus Data</a>
    <div style="float:right;">

      <INPUT id='ss' class='easyui-searchbox' searcher="doSearch" style='width:150px' data-options="prompt:'cari.'" />
      <a href="#" class="easyui-linkbutton" plain="true" iconCls="icon-reload" onClick="reset()">Reload</a>
    </div>
  </div>

	<div id="dlg" class="easyui-dialog" style="width:550px;height:350px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<form id="fm" method="post" >
			<table>

        <tr>
          <td>Semester</td>
          <td>:</td>
          <td><select class="easyui-combobox" name="semester" style="width:300px; data-options="panelHeight:'auto'">
                <option value="Ganjil">Ganjil</option>
                <option value="Genap">Genap</option>
              </select>
          </td>
        </tr>
        <td>Hari</td>
        <td>:</td>
        <td><select class="easyui-combobox" name="hari" style="width:300px; data-options="panelHeight:'auto'">
              <option value="Senin">Senin</option>
              <option value="Selasa">Selasa</option>
              <option value="Rabu">Rabu</option>
              <option value="Kamis">Kamis</option>
              <option value="Jumat">Jumat</option>
              <option value="Sabtu">Sabtu</option>
              <option value="Minggu">Minggu</option>
            </select>
        </td>
      </tr>
      <tr>
        <td>Jam Mulai</td>
        <td>:</td>
        <td><input class="easyui-timespinner" id="jam_awal" name="jam_awal" style="width:300px;"></td>
      </tr>
      <tr>
        <td>Jam Selesai</td>
        <td>:</td>
        <td><input class="easyui-timespinner" id="jam_akhir" name="jam_akhir" style="width:300px;"></td>
      </tr>
      <tr>
        <td>Mata Kuliah</td>
        <td>:</td>
        <td><input class="easyui-combobox" name="kd_matkul" style="width:300px;" data-options="
                    url:'http://localhost/tubes1/modul/jadwal/get_matkul.php',
                    method:'get',
                    valueField:'kd_matkul',
                    textField:'nama_matkul',
                    panelHeight:'auto'
                    ">
          </td>
      </tr>
      <tr>
        <td>Ruangan</td>
        <td>:</td>
        <td><input class="easyui-combobox" name="kd_ruangan" style="width:300px;" data-options="
                    url:'http://localhost/tubes1/modul/jadwal/get_ruangan.php',
                    method:'get',
                    valueField:'kd_ruangan',
                    textField:'nama_ruangan',
                    panelHeight:'auto'
                    "></td>
      </tr>
				<tr>
					<td>Asisten Praktikum</td>
					<td>:</td>
					<td><input class="easyui-combobox" name="nim" style="width:300px;" data-options="
                      url:'http://localhost/tubes1/modul/jadwal/get_asprak.php',
                      method:'get',
                      valueField:'nim',
                      textField:'nama',
                      panelHeight:'auto'
                      "></td>
				</tr>


				</table>
			<input type="hidden" name="tombol" id="update" value="">
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
	</div>

	<script type="text/javascript">
		var url;

    var myview = $.extend({},$.fn.datagrid.defaults.view,{
        onAfterRender:function(target){
            $.fn.datagrid.defaults.view.onAfterRender.call(this,target);
            var opts = $(target).datagrid('options');
            var vc = $(target).datagrid('getPanel').children('div.datagrid-view');
            vc.children('div.datagrid-empty').remove();
            if (!$(target).datagrid('getRows').length){
                var d = $('<div class="datagrid-empty"></div>').html(opts.emptyMsg || 'no records').appendTo(vc);
                d.css({
                    position:'absolute',
                    left:0,
                    top:50,
                    width:'100%',
                    textAlign:'center'
                });
            }
        }
    });

    $('#dg').datagrid({
      view: myview,
      emptyMsg: '<br><h1>Tidak Ada Data</h1>'
    });

    $('#fldSearch').searchbox('textbox').keyup(function() {
            doSearch('dg',$(this).val());
         });

         function doSearch(q){
              var rows = [];
              var data = $('#dg').datagrid('getRows');

              $.map(data, function(row){
                 for(var p in row){
                    var v = row[p];
                    var regExp = new RegExp(q, 'i'); // i - makes the search case-insensitive.

                    if(regExp.test(String(v))) {
                       rows.push(row);
                       break;
                    }
                 }
              });
              $('#dg').datagrid('loadData', rows);
           }

           function reset(){
             $('#dg').datagrid('reload');
             $('#ss').searchbox('reset');
           }
		function newUser(){
//			document.getElementById("update").value="Insert Data";
			var str = "Insert Data";
			document.getElementById('update').value = str;
			$('#kdjnsanggota').numberbox('readonly',false)
			$('#dlg').dialog('open').dialog('setTitle','Informasi Asisten Praktikum');
			$('#fm').form('clear');
			url = 'http://localhost/tubes1/modul/jadwal/save_users.php';
		}
		function editUser(){
			var str = "Update Data";
			document.getElementById('update').value = str;
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Informasi Asisten Praktikum');
				$('#fm').form('load',row);
				url = 'http://localhost/tubes1/modul/jadwal/update_users.php';
			}
			else if (row==null){
				$.messager.alert('Error','Pilih data yang ingin diubah!','error');
			}
		}
		function saveUser(){
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.errorMsg){

						$.messager.alert('Error',result.errorMsg,'error');

					}

					else if(result.success1){

						$('#dlg').dialog('close');		// close the dialog

						$.messager.alert('Info','Data berhasil diubah','info');
$('#dg').datagrid('reload');	// reload the user data
					}

					else {

						$('#dlg').dialog('close');		// close the dialog
						$('#dg').datagrid('reload');	// reload the user data
						$.messager.alert('Info','Data berhasil ditambah','info');

					}
				}
			});
		}
		function destroyUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				var str = "Delete Data";
				$.messager.confirm('Konfirmasi','Apakah anda yakin menghapus data ini?',function(r){
					if (r){
						$.post('http://localhost/tubes1/modul/jadwal/delete_users.php',{id:row.id,tombol:str},function(result){
							if (result.success){
								$('#dg').datagrid('reload');
								$.messager.alert('Info','Data berhasil dihapus','info');
							} else {
								$.messager.alert('Error',result.errorMsg,'error');
							}
						},'json');
					}
				});
			}
		}

	</script>
	<style type="text/css">
		#fm{
			margin:0;
			padding:10px 30px;
		}
		.ftitle{
			font-size:14px;
			font-weight:bold;
			padding:5px 0;
			margin-bottom:10px;
			border-bottom:1px solid #ccc;
		}
		.fitem{
			margin-bottom:5px;
		}
		.fitem label{
			display:inline-block;
			width:80px;
		}
		.fitem input{
			width:160px;
		}
	</style>
</center>
