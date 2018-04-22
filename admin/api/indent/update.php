<?php
   include '../../../public/common/config.php';
   include '../../../public/common/adminsession.php';

  $code = $_POST['code'];
  $status_id = $_POST['status_id'];
  // print_r($_POST);
  // exit;
  $sql="update indent set status_id='{$status_id}' where code='{$code}'";

  if(mysql_query($sql)){
    echo '<script>location="../../indent_m.php"</script>';
  }
 ?>