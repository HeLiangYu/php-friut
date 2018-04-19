<?php
   include '../../../public/common/config.php';

  $id=$_POST['id'];
  $img = $_POST['img'];
  $file = "../../../public/uploads/{$img}";
  
  $sql="delete from shop where id={$id}";

  if(mysql_query($sql)){
    // 删除图片
    unlink($file); // 文件操作
    echo '<script>location="../../product.php"</script>';
  }
 ?>