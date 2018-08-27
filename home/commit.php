<?php
  include '../public/common/config.php';

  $code = $_GET['code'];

  $sql = "update indent set status_id=9 where code='{$code}'";

  if(mysql_query($sql)){
    echo "<script>location='./user.php';</script>";
  }
?>