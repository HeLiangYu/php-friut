<?php
   include '../../../public/common/config.php';
   include '../../../public/common/adminsession.php';

  $id=$_POST['id'];
  
  $sql="update users set password='123456' where id={$id}";

  if(mysql_query($sql)){
    echo '<script>location="../../business.php"</script>';
  }
 ?>