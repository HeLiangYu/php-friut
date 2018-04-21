<?php
    include '../public/common/config.php';
    include '../public/common/adminsession.php';

    // $sql = "select * from users limit $offset, $length";
    $sql = "select advert.*, class.name cname, brand.name bname from advert, class, brand where advert.class_id=class.id and advert.brand_id=brand.id";
    $rst = mysql_query($sql);

    $littlesql = "select * from littleadvert";
    $littlerst = mysql_query($littlesql);

    $wenzisql = "select * from wenzi";
    $wenzirst = mysql_query($wenzisql);

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
            <span class="header_exit">您好，<?php echo $_SESSION['admin_username']; ?>&nbsp;&nbsp;&nbsp; <a href="./api/logout.php" onclick="return confirm('确认退出系统吗？');">退出</a></span>
        </div>
    </div>

    <div class="content">
        <div class="con_con">
            <ul class="nav">
                <li><a href="indent_m.php">订单管理</a></li>
                <li><a href="product.php">商品管理</a></li>
                <li><a href="adv.php" class="active">广告管理</a></li>
                <li><a href="status.php">状态管理</a></li>
                <li><a href="class.php">分类管理</a></li>
                <li><a href="comment.php">评论管理</a></li>
                <li><a href="business.php">用户账号管理</a></li>
                <li><a href="admin.php">后台账号管理</a></li>
            </ul>

            <div class="right">
                <p class="ptitle" id="big" style="cursor:pointer;">大广告</p>
                <table class="details" style="margin-top:0;margin-bottom:25px;" id="table1">
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

                <p class="ptitle" id="word" style="cursor:pointer;margin-top:25px;">广告文字信息管理</p>
                <table class="details" style="margin-top:0;display:none;" id="table2">
                    <tr>
                        <th class="name">文字位置</th>
                        <th class="class">文字内容</th>
                        <th class="opret">操作</th>
                    </tr>

                     <?php while($wenzirow=mysql_fetch_assoc($wenzirst)){ ?>
                    <tr>
                        <td class="name"><span><?php echo $wenzirow['option']; ?></span></td>
                        <td class="class"><?php echo $wenzirow['title']; ?></td>
                        <td class="opret">
                            <a href="./page/adv/updateword.php?id=<?php echo $wenzirow['id']; ?>&title=<?php echo $wenzirow['title']; ?>&option=<?php echo $wenzirow['option']; ?>">修改</a>
                        </td>
                    </tr>
                     <?php } ?>
                </table>

                <p class="ptitle" style="margin-top:25px;cursor:pointer;" id="little">小广告</p>
                <table class="details" style="margin-top:0;display:none;" id="table3">
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
<script>
    $('#big').click(function(){
        var display1 = $("#table1").css('display');
        if( display1 == 'none'){
            $('#table1').show();
        }else{
            $('#table1').hide();
        }
    });
    $('#word').click(function(){
        var display2 = $("#table2").css('display');
        if( display2 == 'none'){
            $('#table2').show();
        }else{
            $('#table2').hide();
        }
    });
    $('#little').click(function(){
        var display3 = $("#table3").css('display');
        if( display3 == 'none'){
            $('#table3').show();
        }else{
            $('#table3').hide();
        }
    });
</script>