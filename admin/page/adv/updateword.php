<?php
    include '../../../public/common/config.php';

    $id = $_GET['id'];
    $option = $_GET['option'];
    $title = $_GET['title'];
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
        <p class="header_title">水果到家后台管理系统 </p>
        <span class="header_exit">您好，admin&nbsp;&nbsp;&nbsp; <a href="#">退出</a></span>
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
            <li><a href="#">后台账号管理</a></li>
        </ul>

        <form action="../../api/adv/updateword.php" method="post" enctype="multipart/form-data">
        <div class="right">
            <p class="title">修改广告</p>
            <div class="details">
                <p class="title2">广告位置<span>*</span>：
                    <input type="text" value="<?php echo $option; ?>"  onfocus="this.blur()" name="option">
                </p>
                <p class="title2">广告描述<span>*</span>：
                    <input type="text" value="<?php echo $title; ?>"  name="title">
                </p>
                <a href="../../adv.php"class="del">取消</a>
                <input type="hidden" name="id" value="<?php echo $id; ?>" style="display:none;">
                <input type="submit" value="确 认" class="ok" onfocus="this.blur();">
                </p>
            </div>
        </div>
        </form>
    </div>
</div>
</body>
</html>
