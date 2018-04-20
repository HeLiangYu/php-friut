<?php
    include '../public/common/config.php';

    // $sql = "select * from users limit $offset, $length";
    $sql = "select advert.*, class.name cname, brand.name bname from advert, class, brand where advert.class_id=class.id and advert.brand_id=brand.id";
    $rst = mysql_query($sql);

    $littlesql = "select * from littleadvert";
    $littlerst = mysql_query($littlesql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>广告管理</title>

    <link href="css/public.css" type="text/css" rel="stylesheet" />
    <link href="css/adv.css" type="text/css" rel="stylesheet" />

    <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="js/resizeImage.js" type="text/javascript"></script>
    <script src="js/tableColor.js"></script>
</head>

<body>
    <div class="header">
        <div class="header_size">
            <p class="header_title">鲜果集后台管理系统 </p>
            <span class="header_exit">您好，admin&nbsp;&nbsp;&nbsp; <a href="#">退出</a></span>
        </div>
    </div>

    <div class="content">
        <div class="con_con">
            <ul class="nav">
                <li><a href="#">订单管理</a></li>
                <li><a href="product.php">商品管理</a></li>
                <li><a href="adv.php" class="active">广告管理</a></li>
                <li><a href="status.php">状态管理</a></li>
                <li><a href="class.php">分类管理</a></li>
                <li><a href="comment.php">评论管理</a></li>
                <li><a href="business.php">用户账号管理</a></li>
                <li><a href="#">后台账号管理</a></li>
            </ul>

            <div class="right">
                <p class="ptitle">大广告</p>
                <table class="details" style="margin-top:0;margin-bottom:25px;">
                    <tr>
                        <th class="name">广告位置</th>
                        <th class="class">广告图片</th>
                        <th class="class">URL</th>
                        <th class="label">商品分类</th>
                        <th class="now">商品类别</th>
                        <th class="opret">操作</th>
                    </tr>

                     <?php while($row=mysql_fetch_assoc($rst)){ ?>
                    <tr>
                        <td class="name"><span><?php echo $row['title']; ?></span></td>
                        <td class="class">
                            <img src="../public/uploads/thumb_<?php echo $row['img']; ?>" style="width:150px;">
                        </td>
                        <td class="class"><?php echo $row['url']; ?></td>
                        <td class="label"><?php echo $row['cname']; ?></td>
                        <td class="now"><span><?php echo $row['bname']; ?></span></td>
                        <td class="opret">
                            <a href="./page/adv/update.php?id=<?php echo $row['id']; ?>">修改</a>
                        </td>
                    </tr>
                     <?php } ?>
                </table>

                <p class="ptitle">小广告</p>
                <table class="details" style="margin-top:0;">
                    <tr>
                        <th class="name">广告位置</th>
                        <th class="class">广告图片</th>
                        <th class="class">URL</th>
                        <th class="label">广告描述</th>
                        <th class="opret">操作</th>
                    </tr>

                     <?php while($littlerow=mysql_fetch_assoc($littlerst)){ ?>
                    <tr>
                        <td class="name"><span><?php echo $littlerow['option']; ?></span></td>
                        <td class="class">
                            <img src="../public/uploads/thumb_<?php echo $littlerow['img']; ?>" style="width:150px;">
                        </td>
                        <td class="class"><?php echo $littlerow['url']; ?></td>
                        <td class="label"><?php echo $littlerow['content']; ?></td>
                        <td class="opret">
                            <a href="./page/adv/updatelittle.php?id=<?php echo $littlerow['id']; ?>">修改</a>
                        </td>
                    </tr>
                     <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>