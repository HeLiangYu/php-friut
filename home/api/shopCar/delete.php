<?php
  error_reporting(E_ALL || ~E_NOTICE);
  session_start();

  $id = $_GET[id];
  $newt = $_SESSION['shops'][$id]['num'] * $_SESSION['shops'][$id]['price'];

  unset($_SESSION['shops'][$id]);
  $_SESSION['num'] -= 1;
  $_SESSION['total'] -= $newt;

  echo '<script>location="../../checkout.php";</script>';

?>