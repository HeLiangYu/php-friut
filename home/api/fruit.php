<?php 
  include '../../public/common/config.php';

  if(isset($_POST['appId']))
{	
	$appId=$_POST['appId'];
}

if(isset($_POST['method']))
{	
	$method_base64encode =$_POST['method'];
}

?>