<?php
   include '../../../public/common/config.php';

  $id=$_POST['id'];
  $password = md5($_POST['password']);
  
  $sql="update admin set password='{$password}' where id={$id}";

  if(mysql_query($sql)){
    echo '<script>location="../../admin.php"</script>';
  }
 ?>