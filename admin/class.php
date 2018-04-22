<?php
    include '../public/common/config.php';
    include '../public/common/adminsession.php';
    include '../public/common/page.php';

    $sql = "select brand.*, class.name cname from brand, class where brand.class_id=class.id";

    $current_page   = empty($_GET['page']) ? 1 : $_GET['page'];
    $page = new Page('',$sql,$current_page,12,"?page=");
    $pagerows = $page->list;
    
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
                <li><a href="class.php" class="active">分类管理</a></li>
                <li><a href="comment.php">评论管理</a></li>
                <li><a href="business.php">用户账号管理</a></li>
                <li><a href="admin.php">后台账号管理</a></li>
            </ul>

            <div class="right">
                <p class="add" style="margin-top:0;"><input type="text" value="新增类别"  onfocus="this.blur()" class="add_newAdv"></p>

                <table class="details">
                    <tr>
                        <th class="name">类别ID</th>
                        <th class="name">分类名称</th>
                        <th class="name">类别名称</th>
                        <th class="opret">操作</th>
                    </tr>
                    
                    <?php //while($row=mysql_fetch_assoc($rst)){
                        foreach($pagerows as $row){    
                    ?>
                    <tr>
                        <td class="name"><span><?php echo $row['id']; ?></span></td>
                        <td class="name"><?php echo $row['cname']; ?></td>
                        <td class="name"><span><?php echo $row['name']; ?></span></td>
                        <td class="opret">
                            <a href="./page/class/update.php?id=<?php echo $row['id']; ?>&name=<?php echo $row['name']; ?>&class_id=<?php echo $row['class_id']; ?>" class="ament">修改</a>
                            <a href="./page/class/delete.php?id=<?php echo $row['id']; ?>&name=<?php echo $row['name']; ?>&classname=<?php echo $row['cname']; ?>" class="Delete">删除</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <p class="page"><?php echo $page->getPageList(); ?></p>
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