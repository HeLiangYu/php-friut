<?php
  // 添加新用户
  include '../../../public/common/config.php';
  include '../../../public/common/function.php';

  // print_r($_POST);
  // print_r($_FILES);
  $name = $_POST['name'];
  $price = $_POST['price'];
  $brand_id = $_POST['brand_id'];
  $shelf = $_POST['shelf'];  
  $stock = $_POST['stock'];
  $content - $_POST['content'];

  //图片上传
  $src = $_FILES['img']['tmp_name'];
  $imgname = $_FILES['img']['name'];
  $ext = array_pop(explode('.', $imgname));
  $dst = '../../../public/uploads/'.time().mt_rand().'.'.$ext;
  // 等比例缩放图片
  if(move_uploaded_file($src, $dst)){
    $newname = basename($dst);
    thumb($dst, 400, 400);
  };
  
  
  // $name = $_POST['name'];
  // $class_id = $_POST['class_id'];

  $sql = "insert into shop(name, img, price, stock, brand_id, shelf, content) values('{$name}','{$newname}', '{$price}', '{$stock}', '{$brand_id}', '{$shelf}', '{$content}')";

  if(mysql_query($sql)){
    echo '<script>location="../../product.php"</script>';
  }

 ?>