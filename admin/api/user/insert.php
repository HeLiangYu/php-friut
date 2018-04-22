<?php
  // 添加新用户
  include '../../../public/common/config.php';
  include '../../../public/common/adminsession.php';

  $username = $_POST['name'];
  $password =$_POST['password'];
  // print_r($_POST);
  // exit;

  $sql = "insert into users(username, password) values('{$username}', MD5('{$password}'))";

  if(mysql_query($sql)){
    echo '<script>location="../../business.php"</script>';
  }

 ?>