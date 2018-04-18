<?php
   include '../../../public/common/config.php';

  $id=$_POST['id'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  $sql="update users set username='{$username}', password='{$password}' where id={$id}";

  if(mysql_query($sql)){
    echo '<script>location="../../business.php"</script>';
  }
 ?>