<?php 
  include '../../../public/common/config.php';

  $id=$_GET['id'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">

    <link href="../../css/public.css" type="text/css" rel="stylesheet"/>
    <link href="../../css/business.css" type="text/css" rel="stylesheet"/>

    <script src="../../js/jquery-2.1.4.min.js" type="text/javascript"></script>
  </head>
  <body>
    
  </body>
</html>
<div class="mask" style="display:block;">
  <div class="recharge public_two" style="display:block;">
    <p class="out_header">删除用户</p>
    <p class="name">确定要删除商家<span>【商家名称】</span>吗？</p>
    <p class="sure">
        <button class="del" tpe="reset">取消</button>
        <button class="ok" onclick="del()">确认</button>
    </p>
</div>
<script>
  function del(){
    <?php $sql="delect from user where id={$id}"; ?>
  }
</script>
</div>