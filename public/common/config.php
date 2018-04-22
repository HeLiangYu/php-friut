<?php
header("content-type:text/html;charset=utf-8"); 
error_reporting(E_ALL || ~E_NOTICE);
  mysql_connect('localhost', 'root', '123456');
  mysql_query('set names utf8');
  mysql_select_db('myshop');
 ?>