<?php
    include '../public/common/config.php';
    include '../public/common/adminsession.php';

    // $sql = "select * from users limit $offset, $length";
    $sql = "select * from status";
    
    $rst = mysql_query($sql);

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>订单统计</title>

    <link href="css/public.css" type="text/css" rel="stylesheet"/>
    <link href="css/order_statistics.css" type="text/css" rel="stylesheet"/>

    <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="js/tableColor.js" type="text/javascript"></script>
    <script src="js/laydate/laydate.js"></script>
    <script>
        !function(){
            laydate.skin('default');  //切换皮肤，请查看skins下面皮肤库
        }();

        $(document).ready(function(){
            var popObj;
            $(".add_newAdv").click(function(){
                $(".mask").css("display","block");
                $(".add_adv").css("display","block");
                popObj = ".add_adv";
            });
        });
    </script>
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
                <li><a href="adv.php">广告管理</a></li>
                <li><a href="status.php" class="active">状态管理</a></li>
                <li><a href="class.php">分类管理</a></li>
                <li><a href="comment.php">评论管理</a></li>
                <li><a href="business.php">用户账号管理</a></li>
                <li><a href="admin.php">后台账号管理</a></li>
            </ul>

            <div class="right">
                 <p class="add" style="margin-top:0;"><input type="text" value="新增状态"  onfocus="this.blur()" class="add_newAdv"></p>

                <table class="details">
                    <tr>
                        <th class="classification">编号</th>
                        <th class="name">订单状态</th>
                        <th class="number">操作</th>
                    </tr>

                    <?php while($row=mysql_fetch_assoc($rst)){ ?>
                        <tr>
                            <td class="classification"><span><?php echo $row['id']; ?></span></td>
                            <td class="name"><span><?php echo $row['name']; ?></span></td>
                            <td class="number">
                                <a href="./page/status/delete.php?id=<?php echo $row['id']; ?>&name=<?php echo $row['name']; ?>" class="Delete">删除</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <div class="mask">
    <form action="./api/status/insert.php" method="post">
        <div class="add_adv public_two" style="margin-top:20%;">
            <p class="revamp_title">新增类别</p>
            <p>
                 状态名称<span>*</span>：
                <input type="text" name="name">
            </p>
            <p class="sure">
                <a href="status.php"class="del">取消</a>
                <input type="submit" value="确 认" class="ok" onfocus="this.blur();">
            </p>
        </div>
    </form>    
    </div>
</body>
</html>
