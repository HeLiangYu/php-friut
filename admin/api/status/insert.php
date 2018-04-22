<?php
  include '../../../public/common/config.php';
  include '../../../public/common/adminsession.php';

  $name = $_POST['name'];

  $sql = "insert into status(name) values('{$name}')";

  if(mysql_query($sql)){
    echo '<script>location="../../status.php"</script>';
  }

 ?>