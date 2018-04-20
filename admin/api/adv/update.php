<?php
  include '../../../public/common/config.php';
  include '../../../public/common/function.php';

//   print_r($_POST);
//   print_r($_FILES);
// exit;
  $id = $_POST['id'];
  $title = $_POST['title'];
  $url = $_POST['url'];
  $brand_id = $_POST['brand_id'];

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

      $sql = "update advert set title='{$title}', url='{$url}', brand_id='{$brand_id}', img='{$newname}' where id='{$id}'";

    }
  }else{
    $sql = "update advert set title='{$title}', url='{$url}', brand_id='{$brand_id}' where id='{$id}'";
  }

  if(mysql_query($sql)){
    echo '<script>location="../../adv.php"</script>';
  }

 ?>