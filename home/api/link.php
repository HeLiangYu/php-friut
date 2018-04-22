<?php 
  include '../../public/common/config.php';

  $gbrandsql = "select * from brand where class_id=12";
	$gbrandrst = mysql_query($gbrandsql);
	while($gbrandrow=mysql_fetch_assoc($gbrandrst)){
		$gbrandarr[] = $gbrandrow;
	}

	$jbrandsql = "select * from brand where class_id=11";
	$jbrandrst = mysql_query($jbrandsql);
	while($jbrandrow=mysql_fetch_assoc($jbrandrst)){
		$jbrandarr[] = $jbrandrow;
	}
?>