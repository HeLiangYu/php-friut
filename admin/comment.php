<?php
    date_default_timezone_set("Asia/Shanghai");
    include '../public/common/config.php';

    $sql = "select comment.*, shop.name sname, users.username uname from comment, shop, users where comment.user_id=users.id and comment.shop_id=shop.id";
    
    $rst = mysql_query($sql); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>分类管理</title>

    <link href="css/public.css" type="text/css" rel="stylesheet"/>
    <link href="css/product.css" type="text/css" rel="stylesheet"/>

    <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="js/tableColor.js"></script>
    <script type="text/javascript">
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
            <span class="header_exit">您好，admin&nbsp;&nbsp;&nbsp; <a href="./api/logout.php">退出</a></span>
        </div>
    </div>

    <div class="content">
        <div class="con_con">
            <ul class="nav">
                <li><a href="#">订单管理</a></li>
                <li><a href="product.php">商品管理</a></li>
                <li><a href="adv.php">广告管理</a></li>
                <li><a href="status.php">状态管理</a></li>
                <li><a href="class.php">分类管理</a></li>
                <li><a href="comment.php" class="active">评论管理</a></li>
                <li><a href="business.php">用户账号管理</a></li>
                <li><a href="#">后台账号管理</a></li>
            </ul>

            <div class="right">
                <table class="details">
                    <tr>
                        <th class="name">ID</th>
                        <th class="name">用户</th>
                        <th class="name">商品名称</th>
                        <th class="opret">评论</th>
                        <th class="name">时间</th>
                        <th class="name">操作</th>
                    </tr>
                    
                    <?php while($row=mysql_fetch_assoc($rst)){ ?>
                    <tr>
                        <td class="name"><span><?php echo $row['id']; ?></span></td>
                        <td class="name"><?php echo $row['uname']; ?></td>
                        <td class="name"><span><?php echo $row['sname']; ?></span></td>
                        <td class="opret"><p style="padding:10px 5px;"><?php echo $row['content'] ?></p></th>
                        <td class="name"><span><?php echo date("Y-m-d H:i", $row['time']); ?></span></th>
                        <td class="name">
                            <a href="./page/comment/delete.php?id=<?php echo $row['id']; ?>&content=<?php echo $row['content']; ?>" class="Delete">删除</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <!----------mask--------- -->
    <div class="mask">
    <form action="./api/class/insert.php" method="post">
        <div class="add_adv public_two" style="margin-top:20%;">
            <p class="revamp_title">新增类别</p>
            <p>
                 类别名称<span>*</span>：
                <input type="text" name="name">
            </p>
            <p>
                选择分类<span>*</span>：
                <?php 
                    $classql = "select * from class";
                    
                    $classrst = mysql_query($classql);  
                ?>
                <select name="class_id">
                <?php while($classrow=mysql_fetch_assoc($classrst)){ ?>
                    <option value="<?php echo $classrow['id']; ?>">
                        <?php echo $classrow['name']; ?>
                    </option>
                <?php } ?>
                </select>
            </p>
            <p class="sure">
                <a href="class.php"class="del">取消</a>
                <input type="submit" value="确 认" class="ok" onfocus="this.blur();">
            </p>
        </div>
    </form>    
    </div>
</body>
</html>