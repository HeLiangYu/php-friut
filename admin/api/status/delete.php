<?php
   include '../../../public/common/config.php';

  $id=$_POST['id'];
  
  $sql="delete from status where id={$id}";

  if(mysql_query($sql)){
    echo '<script>location="../../status.php"</script>';
  }
 ?>