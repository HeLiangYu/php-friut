<?php
  session_start();
  $id = $_GET['id'];

  if($_SESSION['shops'][$id]['num'] < 1){
    $_SESSION['shops'][$id]['num'] = 1;
  }else{
    $_SESSION['shops'][$id]['num']--;
  }

  echo '<script>location="../../checkout.php";</script>';
  
?>