<?php
  include '../../../public/common/config.php';
  include '../../../public/common/function.php';

//   print_r($_POST);
// exit;
  $id = $_POST['id'];
  $title = $_POST['title'];
  $sql = "update wenzi set title='{$title}' where id='{$id}'";

  if(mysql_query($sql)){
    echo '<script>location="../../adv.php"</script>';
  }
 ?>