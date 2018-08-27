<?php 
  // 管理员登录
  session_start();
  header("Content-type: text/html; charset=utf-8"); 
  include '../../public/common/config.php';

  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $sql = "select * from admin where username='{$username}' and password='{$password}'";

  $rst = mysql_query($sql);
  $row = mysql_fetch_assoc($rst);
  echo $row;

  if($row){
    $_SESSION['admin_username'] = $username;
    $_SESSION['admin_userid'] = $row['id'];
    $_SESSION['admin_adminid'] = $row['issuperadmin'];

    echo "<script>location='../indent_m.php'</script>";
  }else{
    // echo "<script>alert('用户名或密码错误，请重新登录');location='../index.php'</script>";
  }
?>