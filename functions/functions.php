<?php
  $db =  mysqli_connect("localhost", "root", "1234567890", "tubes_basdat");
  session_start();
  function getIPAddr()
  {
      if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
          $ip = $_SERVER['HTTP_CLIENT_IP'];
      } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
          $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
          $ip=$_SERVER['REMOTE_ADDR'];
      }
      return $ip;
  }

  function loginlaboran()
  {
      if (isset($_POST['login'])) {
          global $db;
          $username = $_POST['username'];
          $password = md5($_POST['password']);

          $sql_login = "select * from laboran where username='$username' and password='$password'";
          $run_sql_login = mysqli_query($db, $sql_login);
          $check_user = mysqli_num_rows($run_sql_login);
          $_SESSION['panitia']=$username;
          if ($check_user==0) {
              echo "<script>alert('Username atau password salah')</script>";
              exit();
          } else {
              echo "<script>window.open('main.php?module=home','_self')</script>";
              $_SESSION['username']=$username;
          }
      }
  }

  function countasprak()
  {
      global $db;
      $sql = "select count(*) as jumlah from asprak";
      $run = mysqli_query($db, $sql);
      while ($record=mysqli_fetch_array($run)) {
          $jumlah = $record['jumlah'];
      }
      echo "$jumlah";
  }

   function countpraktikum()
   {
       global $db;
       $sql = "select count(*) as jumlah from jadwal_praktikum";
       $run = mysqli_query($db, $sql);
       while ($record=mysqli_fetch_array($run)) {
           $jumlah = $record['jumlah'];
       }
       echo "$jumlah";
   }

  function ubah_password()
  {
      if (isset($_POST['ubah_password'])) {
          global $db;
          $username = $_SESSION['username'];
          $password_lama = md5($_POST['password_lama']);
          $password_baru = md5($_POST['c_pass']);
          $sql_login = "select * from laboran where username='$username' and password='$password_lama'";
          $run_sql_login = mysqli_query($db, $sql_login);
          $check_user = mysqli_num_rows($run_sql_login);

          if ($check_user==0) {
              echo "<script>alert('password lama anda salah')</script>";
          } else {
              $sql_ubah = "update laboran set password='$password_baru' where username='$username'";
              $run_sql_ubah = mysqli_query($db, $sql_ubah);
              echo "<script>alert('Password berhasil diubah')</script>";
          }
      }
  }
