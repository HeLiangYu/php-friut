<?php  
  session_start();
  if(!$_SESSION['admin_userid']){
      echo "<script>location='index.php'</script>";
      exit;
  }
?>