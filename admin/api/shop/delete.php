<?php
   include '../../../public/common/config.php';

  $id=$_POST['id'];
  $img = $_POST['img'];
  $file = "../../../public/uploads/{$img}";
  $file2 = "../../../public/uploads/thumb_{$img}";
  
  $sql="delete from shop where id={$id}";

  if(mysql_query($sql)){
    // 删除图片
    unlink($file); // 文件操作
    unlink($file2);
    echo '<script>location="../../product.php"</script>';
  }
 ?>