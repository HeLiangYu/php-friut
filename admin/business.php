<?php
    include '../public/common/config.php';

    // $sql = "select * from users limit $offset, $length";
    $sql = "select * from users";
    
    $rst = mysql_query($sql);

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户管理</title>

    <link href="css/public.css" type="text/css" rel="stylesheet"/>
    <link href="css/business.css" type="text/css" rel="stylesheet"/>

    <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="js/tableColor.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var popObj;
            $(".add_newAccount").click(function(){
                $(".mask").css("display","block");
                $(".add_account").css("display","block");
                popObj = ".add_account";
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
                <li><a href="#">广告管理</a></li>
                <li><a href="status.php">状态管理</a></li>
                <li><a href="class.php">分类管理</a></li>
                <li><a href="comment.php">评论管理</a></li>
                <li><a href="business.php" class="active">用户账号管理</a></li>
                <li><a href="#">后台账号管理</a></li>
            </ul>

            <div class="right">
                <p class="add"><input type="text" value="新增用户"  onfocus="this.blur()" class="add_newAccount"></p>
                <table class="details">
                    <tr>
                        <th class="name">商家账号</th>
                        <th class="class">商家名称</th>
                        <th class="new">账号状态</th>
                        <th class="opret">操作</th>
                    </tr>

                        <?php while($row=mysql_fetch_assoc($rst)){ ?>
                    <tr>
                        <td class="name"><p><?php echo $row['username']; ?></p></td>
                        <td class="class"><p><?php echo $row['username']; ?></p></td>
                        <td class="new"><p>启用</p></td>
                        <td class="opret">
                            <p>
                                <!-- <input type="text" value="禁用" onfocus="this.blur()" class="end"> -->
                                <button class="end">禁用</button>
                                <a href="./page/user/update.php?id=<?php echo $row['id']; ?>&username=<?php echo $row['username']; ?>&password=<?php echo $row['password']; ?>">修改</a>
                                <a href="./page/user/reset.php?id=<?php echo $row['id']; ?>&username=<?php echo $row['username']; ?>">重置密码</button>
                                <a href="./page/user/delete.php?id=<?php echo $row['id']; ?>&username=<?php echo $row['username']; ?>">删除</a>
                            </p>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <!------------mask------------>
    <div class="mask">
        <div class="disable public_one">
            <p class="out_header">禁用商家提示</p>
            <p class="name">确定要禁用商家<span>【商家名称】</span>吗？</p>
            <p>
                <input type="text" value="取 消" class="del" onfocus="this.blur();">
                <input type="text" value="确 认" class="ok" onfocus="this.blur();">
            </p>
        </div>

        <div class="disable_no public_one">
            <p class="out_header">启用商家提示</p>
            <p class="name">确定要启用商家<span>【商家名称】</span>吗？</p>
            <p>
                <input type="text" value="取 消" class="del" onfocus="this.blur();">
                <input type="text" value="确 认" class="ok" onfocus="this.blur();">
            </p>
        </div>

        <form action="./api/user/insert.php" method="post">
        <div class="add_account public_two">
            <p class="revamp_title">新增账号</p>
            <p>
                &nbsp;&nbsp;用户账号<span>*</span>：
                &nbsp;&nbsp;<input type="text" name="name">
            </p>
            <p>
                &nbsp;&nbsp;用户密码<span>*</span>：
                &nbsp;&nbsp;<input type="password" name="password">
            <p class="sure">
                <a href="business.php" class="del">取消</a>
                <input type="submit" value="确 认" class="ok" onfocus="this.blur();" >
            </p>
        </div>
        </form>
    </div>
</body>
<script>
</script>
</html>
