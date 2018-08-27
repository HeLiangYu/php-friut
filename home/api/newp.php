<?php
  $countsql = "select count(*) from shop where shelf=1 and stock>1";
	$countrst = mysql_query($countsql);

	$count = mysql_fetch_assoc($countrst);

	$shopsql = "select shop.*, class.name cname from shop, class, brand where shop.brand_id=brand.id and brand.class_id=class.id and shop.shelf=1 and shop.stock>0";
	$shoprst = mysql_query($shopsql);


	while($shoprow=mysql_fetch_assoc($shoprst)){
		$shoparr[] = $shoprow;
	}
	$shopnewarr = array($shoparr[$count['count(*)']-1], $shoparr[$count['count(*)']-2], $shoparr[$count['count(*)']-3], $shoparr[$count['count(*)']-4]);
?>