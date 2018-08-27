<?php 
  header("Content-type: text/html; charset=utf-8"); 
  session_start();
  include '../../public/common/config.php';

  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $sql = "select * from users where username='{$username}' and password='{$password}'";

  $rst = mysql_query($sql);
  $row = mysql_fetch_assoc($rst);

  if($row){
    $_SESSION['home_username'] = $row['username'];
    $_SESSION['home_userid'] = $row['id'];

    echo "<script>location='../index.php'</script>";
  }else{
    echo "<script>alert('用户名或密码错误，请重新登录');location='../login.php'</script>";
  }
?>