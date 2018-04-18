<?php 
  include '../../../public/common/config.php';

  $id=$_GET['id'];
  $name = $_GET['name'];
  $classname = $_GET['classname'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">

  <link href="../../css/public.css" type="text/css" rel="stylesheet"/>
  <link href="../../css/business.css" type="text/css" rel="stylesheet"/>
</head>
<body>
  <div class="mask" style="display:block;">
        <form action="../../api/class/delete.php" method="post" >
        <div class="recharge public_two"  style="display:block;margin-top:20%;">
            <p class="out_header">删除类别</p>
            <p class="name">确定要删除类别<span>【<?php echo $classname; ?>】</span><span>【<?php echo $name; ?>】</span>吗？</p>
            <p class="sure">
                <a href="../../class.php" class="del" type="reset">取消</a>
                <input type="text" name="id" value="<?php echo $id; ?>" style="display:none;">
                <button class="ok" type="submit">确认</button>
        </div>
        </form>
    </div>
</body>
</html>
