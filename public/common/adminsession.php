<?php  
error_reporting(E_ALL || ~E_NOTICE);
  session_start();
  if(!$_SESSION['admin_userid']){
      echo "<script>location='/php-friut/admin/index.php'</script>";
      exit;
  }
?>