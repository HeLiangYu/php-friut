<?php
  error_reporting(E_ALL || ~E_NOTICE);
  session_start();

  $id = $_GET[id];

  unset($_SESSION['shops'][$id]);

  echo '<script>location="../../checkout.php";</script>';

?>