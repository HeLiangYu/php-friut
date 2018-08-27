<?php
   include '../../../public/common/config.php';

  $id=$_POST['id'];
  $username = $_POST['username'];
  $tel = $_POST['tel'];
  $email = $_POST['email'];
  $addr = $_POST['addr'];
  
  $sql="update touch set name='{$username}', tel='{$tel}', addr='{$addr}', email='{$email}' where id={$id}";

  if(mysql_query($sql)){
    echo '<script>location="../../user.php"</script>';
  }
 ?>