<?php
  include '../../../public/common/config.php';

  $userid = $_POST['userid'];
  $name = $_POST['username'];
  $addr = $_POST['addr'];
  $tel = $_POST['tel'];
  $email = $_POST['email'];

  $sql = "insert into touch(user_id, name, addr, tel, email) values('{$userid}', '{$name}', '{$addr}', '{$tel}', '{$email}')";

  if(mysql_query($sql)){
    echo '<script>location="../../user.php"</script>';
  }

?>