<?php
header("content-type:text/html;charset=utf-8"); 
date_default_timezone_set("Asia/Shanghai");
error_reporting(E_ALL || ~E_NOTICE);
  mysql_connect('localhost', 'root', '123456');
  mysql_query('set names utf8');
  mysql_select_db('myshop');
 ?>