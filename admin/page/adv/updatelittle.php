<?php
    include '../../../public/common/config.php';
    include '../../../public/common/adminsession.php';

    $id = $_GET['id'];

    $sql = "select * from littleadvert where id='{$id}'";
    $rst = mysql_query($sql); 
    $row = mysql_fetch_assoc($rst);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改广告</title>

    <link href="../../css/public.css" type="text/css" rel="stylesheet"/>
    <link href="../../css/addAdv.css" type="text/css" rel="stylesheet"/>
</head>

<body>
<div class="header">
    <div class="header_size">
        <p class="header_title">鲜果集后台管理系统 </p>
        <span class="header_exit">您好，<?php echo $_SESSION['admin_username']; ?>&nbsp;&nbsp;&nbsp; <a href="../../api/logout.php" onclick="return confirm('确认退出系统吗？');">退出</a></span>
    </div>
</div>

<div class="content">
    <div class="con_con">
        <ul class="nav">
            <li><a href="../../indent_m.php">订单管理</a></li>
            <li><a href="../../product.php">商品管理</a></li>
            <li><a href="../../adv.php" class="active">广告管理</a></li>
            <li><a href="../../status.php">状态管理</a></li>
            <li><a href="../../class.php">分类管理</a></li>
            <li><a href="../../comment.php">评论管理</a></li>
            <li><a href="../../business.php">用户账号管理</a></li>
            <li><a href="../../admin.php">后台账号管理</a></li>
        </ul>

        <form action="../../api/adv/updatelittle.php" method="post" enctype="multipart/form-data">
        <div class="right">
            <p class="title">修改广告</p>
            <div class="details">
                <p class="title2">广告位置<span>*</span>：
                    <input type="text" value="<?php echo $row['option']; ?>"  onfocus="this.blur()" name="option">
                </p>
                <p>
                    广告原图：&nbsp;&nbsp;<img src="../../../public/uploads/<?php echo $row['img']; ?>" alt="" style="vertical-align:middle;width:100px;">
                </p>
                <p>
                    广告图片&nbsp;&nbsp;：<input type="text" id="change_t1" class="pic" placeholder="请选择图片" onfocus="this.blur()">
                    <input type="text" value="选择图片" class="sure" onfocus="this.blur()" onclick="document.getElementById('change_a1').click();">
                    <input type="file" id="change_a1" class="file" onchange="document.getElementById('change_t1').value=this.value;" name="img">
                </p>
                <p class="text">提示：若不修改图片，则该项为空</p>
                <p class="title2">&nbsp;&nbsp;&nbsp;&nbsp;URL&nbsp;&nbsp;&nbsp;&nbsp;<span>*</span>：<input type="text" value="<?php echo $row['url']; ?>" name="url"></p>
                <p class="title2">广告描述<span>*</span>：
                    <input type="text" value="<?php echo $row['content']; ?>"  name="content">
                </p>
                <a href="../../adv.php" class="del">取消</a>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" style="display:none;">
                <input type="hidden" name="imgsrc" value="<?php echo $row['img']; ?>" style="display:none;">
                <input type="submit" value="确 认" class="ok" onfocus="this.blur();">
                </p>
            </div>
        </div>
        </form>
    </div>
</div>
</body>
</html>
