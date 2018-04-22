<?php
   include '../../../public/common/config.php';
   include '../../../public/common/adminsession.php';

  $id=$_POST['id'];
  
  $sql="delete from admin where id={$id}";

  if(mysql_query($sql)){
    echo '<script>location="../../admin.php"</script>';
  }
 ?>