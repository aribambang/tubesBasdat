
<br>
<center>

<table id="dg" class="easyui-datagrid" style="width:80%;height:410px"
    url="http://localhost/tubes1/modul/laboran/get_users.php"
    title="Laboran"
    toolbar="#toolbar"
	  fitColumns="true"
	  singleSelect="true"
    pagination="true"
    rownumbers="true" >
    <thead>
        <tr>
            <th field="nip" style="width:20%; background-color:#E0EDFF">NIP</th>
            <th field="nama" width="30%">Nama</th>
            <th field="alamat" width="30%">Alamat</th>
            <th field="no_hp" width="20%">No HP</th>
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

	<div id="dlg" class="easyui-dialog" style="width:500px;height:300px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<form id="fm" method="post" >
			<table>
        <tr>
          <td>NIP</td>
          <td>:</td>
          <td><input name="nip" id="nip" class="easyui-numberbox" required="true" style="width:200px;"></td>
        </tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><input name="nama" id="nama" class="easyui-textbox" required="true" style="width:200px;"></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><input name="alamat" id="alamat" class="easyui-textbox" required="true" style="width:200px;"></td>
				</tr>

				<tr>
					<td>No HP</td>
					<td>:</td>
					<td><input name="no_hp" id="no_hp" class="easyui-numberbox" required="true" style="width:200px;" ></td>
				</tr>

        <tr>
					<td>Username</td>
					<td>:</td>
					<td><input name="username" id="username" class="easyui-textbox" required="true" style="width:200px;"></td>
				</tr>

        <tr>
					<td>Password</td>
					<td>:</td>
					<td><input name="password" id="password" type="password" class="easyui-textbox" required="true" style="width:200px;"></td>
				</tr>
				</table>
			<input type="hidden" name="tombol" id="update" value="">
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Simpan</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Batal</a>
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
			var str = "Insert Data";
			document.getElementById('update').value = str;
			$('#kdjnsanggota').numberbox('readonly',false);
			$('#dlg').dialog('open').dialog('setTitle','Informasi Laboran');
			$('#fm').form('clear');
			url = 'http://localhost/tubes1/modul/laboran/save_users.php';
		}

		function editUser(){
			var str = "Update Data";
			document.getElementById('update').value = str;
			$('#nip').numberbox('readonly',true);
      $('#password').textbox('readonly',true);
      $('#username').textbox('readonly',true);

			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Informasi Laboran');
				$('#fm').form('load',row);
				url = 'http://localhost/tubes1/modul/laboran/update_users.php';
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
						$('#dg').datagrid('reload');	// reload the user data
						$.messager.alert('Info','Data berhasil diubah','info');

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
						$.post('http://localhost/tubes1/modul/laboran/delete_users.php',{nip:row.nip,tombol:str},function(result){
							if (result.success){
								$('#dg').datagrid('reload');	// reload the user data
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
