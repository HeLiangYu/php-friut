<?php
  session_start();
  $id = $_GET['id'];

  if($_SESSION['shops'][$id]['num'] > $_SESSION['shops'][$id]['stock']){
    $_SESSION['shops'][$id]['num'] = $_SESSION['shops'][$id]['stock'];
  }else{
    $_SESSION['shops'][$id]['num']++;
  }

  echo '<script>location="../../checkout.php";</script>';
  
?>