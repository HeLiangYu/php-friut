<?php
   include '../../../public/common/config.php';

  $id=$_POST['id'];
  
  $sql="delete from users where id={$id}";

  if(mysql_query($sql)){
    echo '<script>location="../../business.php"</script>';
  }
 ?>