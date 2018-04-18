<?php
  // 添加新用户
  include '../../../public/common/config.php';

  $username = $_POST['name'];
  $password =$_POST['password'];

  $sql = "insert into users(username, password) values('{$username}', '{$password}')";

  if(mysql_query($sql)){
    echo '<script>location="../../business.php"</script>';
  }

 ?>