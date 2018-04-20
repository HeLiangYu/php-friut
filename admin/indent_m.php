<?php
    date_default_timezone_set("Asia/Shanghai");
    include '../public/common/config.php';

    $sql = "select indent.*, users.username uname, status.name sname, touch.name tname from indent, users, status, touch where indent.user_id=users.id and indent.status_id=status.id and indent.touch_id=touch.id group by indent.code";
    
    $rst = mysql_query($sql); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>订单管理</title>

    <link href="css/public.css" type="text/css" rel="stylesheet" />
    <link href="css/order_management.css" type="text/css" rel="stylesheet">

    <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="js/laydate/laydate.js"></script>
    <script src="js/tableColor.js"></script>
    <script>
        ! function() {
            laydate.skin('default'); //切换皮肤，请查看skins下面皮肤库
        }();
    </script>
</head>

<body>
    <div class="header">
        <div class="header_size">
            <p class="header_title">水果到家后台管理系统 </p>
            <span class="header_exit">您好，admin&nbsp;&nbsp;&nbsp; <a href="#">退出</a></span>
        </div>
    </div>

    <!---------content----------- -->
    <div class="content">
        <div class="con_con">
            <ul class="nav">
                <li><a href="indent_m.php" class="active">订单管理</a></li>
                <li><a href="product.php">商品管理</a></li>
                <li><a href="adv.php">广告管理</a></li>
                <li><a href="status.php">状态管理</a></li>
                <li><a href="class.php">分类管理</a></li>
                <li><a href="comment.php">评论管理</a></li>
                <li><a href="business.php">用户账号管理</a></li>
                <li><a href="#">后台账号管理</a></li>
            </ul>

            <div class="right">
                <table class="details">
                    <tr>
                        <th class="time">订单号</th>
                        <th class="shops">用户账号</th>
                        <th class="shops">下单时间</th>
                        <th class="state">订单状态</th>
                        <th class="state">订单详情</th>
                        <th class="operation">操作</th>
                    </tr>

                    <?php while($row=mysql_fetch_assoc($rst)){ ?>
                    <tr>
                        <td class="time"><?php echo $row['code']; ?></td>
                        <td class="shops"><?php echo $row['uname']; ?></td>
                        <td class="user"><span><?php echo date("Y-m-d H:i", $row['time']); ?></span></td>
                        <td class="state"><span><?php echo $row['sname']; ?></span></td>
                        <td class="state"><a href="./page/indent/touch.php?code=<?php echo $row['code']; ?>">详情</a></td>
                        <td class="operation">
                            <a href="./page/indent/delete.php?code=<?php echo $row['code']; ?>">删除</a>
                        </td>
                    </tr>
                    <?php } ?>                    
                </table>
            </div>
        </div>
    </div>

</body>

</html>