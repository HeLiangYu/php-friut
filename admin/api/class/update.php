<?php
   include '../../../public/common/config.php';

  $id=$_POST['id'];
  $name = $_POST['name'];
  $class_id = $_POST['class_id'];
  
  $sql="update brand set name='{$name}', class_id='{$class_id}' where id={$id}";

  if(mysql_query($sql)){
    echo '<script>location="../../class.php"</script>';
  }
 ?>