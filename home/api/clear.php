<?php
  error_reporting(E_ALL || ~E_NOTICE);
  session_start();

  $_SESSION['shops'] = array();

  echo '<script>location="../index.php";</script>';

?>