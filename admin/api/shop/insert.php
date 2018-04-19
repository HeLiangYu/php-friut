<?php
  // 添加新用户
  include '../../../public/common/config.php';

  // print_r($_POST);
  // print_r($_FILES);
  $name = $_POST['name'];
  $price = $_POST['price'];
  $brand_id = $_POST['brand_id'];
  $shelf = $_POST['shelf'];  
  $stock = $_POST['stock'];

  //图片上传
  $src = $_FILES['img']['tem_name'];
  $imgname = $_FILES['img']['name'];
  $ext = array_pop(explode('.', $imgname));
  $dst = '../../../public/uploads/'.time().mt_rand().'.'.$ext;
  if(move_uploaded_file($src, $dst)){
    // 200*200
  }
  // 等比例缩放图片

  
  
  // $name = $_POST['name'];
  // $class_id = $_POST['class_id'];

  $sql = "insert into shop(name, img, price, stock, brand_id, shelf) values('{$name}','{$imgname}', '{$price}', '{$stock}', '{$brand_id}', '{$shelf}')";

  if(mysql_query($sql)){
    echo '<script>location="../../product.php"</script>';
  }

 ?>