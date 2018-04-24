<?php include("../../functions/functions.php");  ?>

<center>
<h2>Ubah Password</h2>
<br>
<form id="fm" method="post" action="http://localhost/tubes1/main.php?module=password" enctype="multipart/form-data">
  <table>
    <tr>
      <td>password Lama</td>
      <td>:</td>
      <td><input name="password_lama" id="password_lama" class="easyui-passwordbox" required="true" style="width:200px;"></td>
    </tr>
    <tr>
      <td>Password Baru</td>
      <td>:</td>
      <td><input id="pass" class="easyui-passwordbox" style="width:200px;" name="c_pass" required/></td>
    </tr>
    <tr>
      <td>Konfirmasi Password Baru</td>
      <td>:</td>
      <td><input class="easyui-passwordbox" name="c_pass1" style="width:200px;" validType="confirmPass['#pass']" required/></td>
    </tr>
    </table>
  <input type="hidden" name="ubah_password" value="">
<br>
  <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" name="submit" onclick="$('#fm').submit();" style="width:90px">Ubah</a>
  <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-reload" onclick="reset()" style="width:90px">Reset</a>

</form>

</center>
<?php ubah_password(); ?>
<script type="text/javascript">
function reset(){
  $('#fm').form('clear');
}

$.extend($.fn.validatebox.defaults.rules, {
        confirmPass: {
            validator: function(value, param){
                var pass = $(param[0]).passwordbox('getValue');
                return value == pass;
            },
            message: 'Password tidak sama.'
        }
    })
</script>
