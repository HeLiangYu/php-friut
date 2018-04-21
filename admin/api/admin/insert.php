<?php
  // 添加新用户
  include '../../../public/common/config.php';

  $username = $_POST['name'];
  $password =md5($_POST['password']);
  // print_r($_POST);
  // exit;

  $sql = "insert into admin(username, password) values('{$username}', '{$password}')";

  if(mysql_query($sql)){
    echo '<script>location="../../admin.php"</script>';
  }

 ?>