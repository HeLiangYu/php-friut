<?php 
  include '../../../public/common/config.php';
  include '../../../public/common/adminsession.php';

  $id=$_GET['id'];
  $username = $_GET['username'];
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
        <form action="../../api/user/reset.php" method="post" >
        <div class="recharge public_two"  style="display:block;margin-top:20%;">
          <p class="out_header">重置用户密码</p>
          <p class="name">确定要重置用户<span>【<?php echo $username; ?>】</span>密码吗？重置后的密码是123456</p>
          <p class="sure">
            <a href="../../business.php" class="del" type="reset">取消</a>
            <input type="text" name="id" value="<?php echo $id; ?>" style="display:none;">
            <button class="ok" type="submit">确认</button>
          </p>
        </div>
        </form>
    </div>
</body>
</html>
