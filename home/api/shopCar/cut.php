<?php
  session_start();
  $id = $_GET['id'];

  if($_SESSION['shops'][$id]['num'] < 2){
    $_SESSION['shops'][$id]['num'] = 1;
  }else{
    $_SESSION['shops'][$id]['num']--;
    $_SESSION['total'] -= $_SESSION['shops'][$id]['price'];
  }

  echo '<script>location="../../checkout.php";</script>';
  
?>