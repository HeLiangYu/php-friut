<?php 
  include '../../../public/common/config.php';
  include '../../../public/common/adminsession.php';

  $id=$_GET['id'];
  $name = $_GET['name'];
  $classname = $_GET['classname'];
  $brandname = $_GET['brandname'];
  $img = $_GET['img'];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>删除商品</title>

    <link href="../../css/public.css" type="text/css" rel="stylesheet"/>
    <link href="../../css/product.css" type="text/css" rel="stylesheet"/>
    <style>
      span{
        color:red;
      }
    </style>
  </head>
  <body>
  <div class="mask" style="display:block;">
    <form action="../../api/shop/delete.php" method="post" >
      <div class="delete public_one" style="display:block;margin-top:20%;">
          <p class="out_header">删除商品提示</p>
          <p class="name">确定要删除商品
            <span>【<?php echo $classname; ?>】</span>
            <span>【<?php echo $brandname; ?>】</span>
            <span>【<?php echo $name; ?>】</span>吗？</p>
          <p>
              <a href="../../product.php" class="del" type="reset">取消</a>
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <input type="hidden" name="img" value="<?php echo $img; ?>">
              <button class="ok" type="submit">确认</button>
          </p>
      </div>
    </form>
  </div>
  </body>
</html>