<?php
   include '../../../public/common/config.php';
   include '../../../public/common/adminsession.php';

  $id=$_POST['id'];
  $password = md5(123456);
  
  $sql="update admin set password='{$password}' where id={$id}";

  if(mysql_query($sql)){
    echo '<script>location="../../admin.php"</script>';
  }
 ?>