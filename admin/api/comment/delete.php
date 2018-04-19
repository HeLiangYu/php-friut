<?php
   include '../../../public/common/config.php';

  $id=$_POST['id'];
  
  $sql="delete from comment where id={$id}";

  if(mysql_query($sql)){
    echo '<script>location="../../comment.php"</script>';
  }
 ?>