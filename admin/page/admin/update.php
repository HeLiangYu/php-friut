<?php 
  include '../../../public/common/config.php';
  include '../../../public/common/adminsession.php';

  $id=$_GET['id'];
  $username = $_GET['username'];
  $password = $_GET['password'];
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
        <form action="../../api/admin/update.php" method="post" >
        <div class="recharge public_two"  style="display:block;margin-top:20%;">
          <p class="revamp_title">修改管理员信息</p>
            <p>
                管理员账号&nbsp;：
                &nbsp;&nbsp;<input type="text" value="<?php echo $username; ?>" onfocus="this.blur();">
            </p>
            <p>
                管理员密码<span>*</span>：
                &nbsp;&nbsp;<input type="password" name="password" value="<?php echo $password; ?>">
            </p>
            <p class="sure">
                <a href="../../admin.php" class="del" type="reset">取消</a>
                <input type="text" name="id" value="<?php echo $id; ?>" style="display:none;">
                <button class="ok" type="submit">确认</button>
        </div>
        </form>
    </div>
</body>
</html>
