<?php
    include '../public/common/config.php';
    include '../public/common/adminsession.php';

    // $sql = "select * from users limit $offset, $length";
    $sql = "select * from admin";
    
    $rst = mysql_query($sql);

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理员账号</title>

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
            <span class="header_exit">您好，<?php echo $_SESSION['admin_username']; ?>&nbsp;&nbsp;&nbsp; <a href="./api/logout.php" onclick="return confirm('确认退出系统吗？');">退出</a></span>
        </div>
    </div>

    <div class="content">
        <div class="con_con">
            <ul class="nav">
                <li><a href="indent_m.php">订单管理</a></li>
                <li><a href="product.php">商品管理</a></li>
                <li><a href="adv.php">广告管理</a></li>
                <li><a href="status.php">状态管理</a></li>
                <li><a href="class.php">分类管理</a></li>
                <li><a href="comment.php">评论管理</a></li>
                <li><a href="business.php">用户账号管理</a></li>
                <li><a href="admin.php" class="active">后台账号管理</a></li>
            </ul>

            <div class="right">
                <?php if($_SESSION['admin_adminid'] == '1'){ ?>
                    <p class="add"><input type="text" value="新增管理员账号"  onfocus="this.blur()" class="add_newAccount"></p>
                <?php } ?>
                <table class="details" style="margin-top:0;">
                    <tr>
                        <th class="name">管理员账号</th>

                        <th class="class">管理员权限</th>
                        <th class="opret">操作</th>
                    </tr>

                        <?php 
                            while($row=mysql_fetch_assoc($rst)){
                                if($_SESSION['admin_adminid'] == '1'){ 
                        ?>
                            <tr>
                                <td class="name"><p><?php echo $row['username']; ?></p></td>
                                <?php if($row['issuperadmin'] == 1){ ?>
                                    <td class="class"><p>超级管理员</p></td>
                                <?php }else{ ?>
                                    <td class="class"><p>普通管理员</p></td>
                                <?php } ?>
                                
                                <td class="opret">
                                    <p>
                                        <a href="./page/admin/update.php?id=<?php echo $row['id']; ?>&username=<?php echo $row['username']; ?>&password=<?php echo $row['password']; ?>">修改</a>
                                        <a href="./page/admin/reset.php?id=<?php echo $row['id']; ?>&username=<?php echo $row['username']; ?>">重置密码</button>
                                        <?php if($row['issuperadmin'] == 1){ ?>
                                            <a></a>
                                        <?php }else{ ?>
                                            <a href="./page/admin/delete.php?id=<?php echo $row['id']; ?>&username=<?php echo $row['username']; ?>">删除</a>
                                        <?php } ?>
                                    </p>
                                </td>
                            </tr>
                        <?php }else{ ?>
                            <?php if($_SESSION['admin_userid'] == $row['id']){ ?>
                                <tr>
                                    <td class="name"><p><?php echo $row['username']; ?></p></td>
                                    <?php if($row['issuperadmin'] == 1){ ?>
                                        <td class="class"><p>超级管理员</p></td>
                                    <?php }else{ ?>
                                        <td class="class"><p>普通管理员</p></td>
                                    <?php } ?>
                                    
                                    <td class="opret">
                                        <p>
                                            <a href="./page/admin/update.php?id=<?php echo $row['id']; ?>&username=<?php echo $row['username']; ?>&password=<?php echo $row['password']; ?>">修改</a>
                                            <a href="./page/admin/reset.php?id=<?php echo $row['id']; ?>&username=<?php echo $row['username']; ?>">重置密码</button>
                                            <a></a>
                                        </p>
                                    </td>
                                </tr>
                                <?php }?>
                        <?php } ?>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <!------------mask------------>
    <div class="mask">
        <form action="./api/admin/insert.php" method="post">
        <div class="add_account public_two" style="margin-top:15%;">
            <p class="revamp_title">新增管理员账号</p>
            <p>
                管理员账号<span>*</span>：
                &nbsp;&nbsp;<input type="text" name="name">
            </p>
            <p>
                管理员密码<span>*</span>：
                &nbsp;&nbsp;<input type="password" name="password">
            <p class="sure">
                <a href="admin.php" class="del">取消</a>
                <input type="submit" value="确 认" class="ok" onfocus="this.blur();" >
            </p>
        </div>
        </form>
    </div>
</body>
<script>
</script>
</html>
