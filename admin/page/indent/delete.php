<?php 
  include '../../../public/common/config.php';
  include '../../../public/common/adminsession.php';

  $code = $_GET['code'];
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
        <form action="../../api/indent/delete.php" method="post" >
        <div class="recharge public_two"  style="display:block;margin-top:20%;">
            <p class="out_header">删除订单</p>
            <p class="name">确定要删除订单<span>【<?php echo $code; ?>】</span>吗？</p>
            <p class="sure">
                <a href="../../indent_m.php" class="del">取消</a>
                <input type="text" name="code" value="<?php echo $code; ?>" style="display:none;">
                <button class="ok" type="submit">确认</button>
        </div>
        </form>
    </div>
</body>
</html>
