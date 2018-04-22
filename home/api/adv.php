<?php
  	$bigadvsql = "select * from advert";
    $bigadvrst = mysql_query($bigadvsql);
    while($bigadvrow=mysql_fetch_assoc($bigadvrst)){
      $bigadvarr[$bigadvrow['pos']] = $bigadvrow;
    }
  
    $littleadvsql = "select * from littleadvert";
    $littleadvrst = mysql_query($littleadvsql);
    while($littleadvrow=mysql_fetch_assoc($littleadvrst)){
      $littleadvarr[$littleadvrow['option']] = $littleadvrow;
    }
?>