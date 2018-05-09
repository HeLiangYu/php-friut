<?php
  include '../../../public/common/config.php';
  include '../../../public/common/function.php';

//   print_r($_POST);
//   print_r($_FILES);
// exit;
  $id = $_POST['id'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $brand_id = $_POST['brand_id'];
  $shelf = $_POST['shelf'];  
  $stock = $_POST['stock'];
  $content = $_POST['content'];
  $imgsrc = $_POST['imgsrc'];
  
  $imagerror = $_FILES['img']['error'];

  if($imagerror === 0){
    $src = $_FILES['img']['tmp_name'];
    $imgname = $_FILES['img']['name'];
    $ext = array_pop(explode('.', $imgname));
    $dst = '../../../public/uploads/'.time().mt_rand().'.'.$ext;
    // 等比例缩放图片
    if(move_uploaded_file($src, $dst)){
      thumb($dst, 200, 200);
      
      // 删除原图
      $oldfile = "../../../public/uploads/{$imgsrc}";
      $oldfile2 = "../../../public/uploads/thumb_{$imgsrc}";
      unlink($oldfile);
      unlink($oldfile2);
      
      $newname = basename($dst);

      $sql = "update shop set name='{$name}', price='{$price}', brand_id='{$brand_id}', shelf='{$shelf}', stock='{$stock}', img='{$newname}', content='{$content}' where id='{$id}'";

    }
  }else{
    $sql = "update shop set name='{$name}', price='{$price}', brand_id='{$brand_id}', shelf='{$shelf}', stock='{$stock}', content='{$content}' where id='{$id}'";
  }

  if(mysql_query($sql)){
    echo '<script>location="../../product.php"</script>';
  }

 ?>