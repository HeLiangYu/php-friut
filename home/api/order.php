<?php
  session_start();
  include '../../public/common/config.php';
  $addr = $_POST['addr'];
  $code = time().mt_rand();
  $userid = $_SESSION['home_userid'];
  $time = time();

  foreach($_SESSION['shops'] as $shop){
    $sql = "insert into indent(code, user_id, time, touch_id, shop_id, price, num) values('{$code}', '{$userid}', '{$time}', '{$addr}', '{$shop['id']}', '{$shop['price']}', '{$shop['num']}')";

    mysql_query($sql);

    $st = $shop['stock']-$shop['num'];
    $sqlstock = "update shop set stock='{$st}' where id={$shop['id']}";
    mysql_query($sqlstock);
  }

  $_SESSION['shops'] = array();
  $_SESSION['total'] = 0;
  $_SESSION['num'] = 0;

  echo "<script>location='../user.php';</script>";
?>