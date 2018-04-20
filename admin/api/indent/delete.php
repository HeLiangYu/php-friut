<?php
   include '../../../public/common/config.php';
  //  print_r($_POST);
  //  exit;
  $code = $_POST['code'];
  
  $sql="delete from indent where code='{$code}'";

  if(mysql_query($sql)){
    echo '<script>location="../../indent_m.php"</script>';
  }
 ?>