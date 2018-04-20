<?php
    include '../public/common/config.php';

    $sql = "select shop.*, brand.name bname, class.name cname from shop, brand, class where brand.class_id=class.id and shop.brand_id=brand.id";
    
    $rst = mysql_query($sql); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品管理</title>

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
            <span class="header_exit">您好，admin&nbsp;&nbsp;&nbsp; <a href="#">退出</a></span>
        </div>
    </div>

    <div class="content">
        <div class="con_con">
            <ul class="nav">
                <li><a href="indent_m.php">订单管理</a></li>
                <li><a href="product.php" class="active">商品管理</a></li>
                <li><a href="adv.php">广告管理</a></li>
                <li><a href="status.php">状态管理</a></li>
                <li><a href="class.php">分类管理</a></li>
                <li><a href="comment.php">评论管理</a></li>
                <li><a href="business.php">用户账号管理</a></li>
                <li><a href="#">后台账号管理</a></li>
            </ul>

            <div class="right">
                <div class="query">
                    <span class="shop">商品名称：</span><input type="text">
                    <span>商品类别：</span><input type="text">
                    <span>标签：</span><input type="text">
                    <span>商品状态：</span>
                    <select>
                        <option>全部</option>
                        <option>启用</option>
                        <option>禁用</option>
                    </select>
                    <span>首页显示：</span>
                    <select>
                        <option>全部</option>
                        <option>是</option>
                        <option>否</option>
                    </select>
                    <input type="text" value="查 询" class="submit" onfocus="this.blur()">
                </div>

                <p class="add"><input type="text" value="新增商品"  onfocus="this.blur()" class="add_newAdv"></p>

                <table class="details">
                    <tr>
                        <th class="label">商品编号</th>
                        <th class="iforma">商品名称</th>
                        <th class="dispaly">商品分类</th>
                        <th class="name">商品类别</th>
                        <th class="name">商品价格</th>
                        <th class="iforma">商品图片</th>
                        <th class="now">商品库存</th>
                        <th class="now">上下架</th>
                        <th class="opret">操作</th>
                    </tr>

                    <?php while($row=mysql_fetch_assoc($rst)){ ?>
                    <tr>
                        <td class="name"><span><?php echo $row['id']; ?></span></td>
                        <td class="iforma"><span><?php echo $row['name']; ?></span></td>
                        <td class="label"><span><?php echo $row['cname']; ?></span></td>
                        <td class="price"><span><?php echo $row['bname']; ?></span></td>
                        <td class="name"><span>￥ <?php echo $row['price']; ?>/kg</span></td>
                        <td class="now"><img src="../public/uploads/thumb_<?php echo $row['img']; ?>" style="width:100px;" /></td>
                        <td class="dispaly"><span><?php echo $row['stock']; ?></span></td>
                        <td class="dispaly">
                            <span>
                                <?php
                                    if($row['shelf']){
                                        echo '上架';
                                    }else{
                                        echo '下架';
                                    }
                                ?>
                            </span>
                        </td>
                        <td class="opret">
                            <a href="./page/shop/update.php?id=<?php echo $row['id']; ?>" class="ament">修改</a>
                            <a href="./page/shop/delete.php?id=<?php echo $row['id']; ?>&name=<?php echo $row['name']; ?>&classname=<?php echo $row['cname']; ?>&brandname=<?php echo $row['bname']; ?>&img=<?php echo $row['img']; ?>" class="Delete">删除</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

                <div class="page">
                    <p class="left">共2条</p>
                    <p class="right">
                        <input type="text" value="<上一条" onfocus="this.blur()">
                        <span>1/2</span>
                        <input type="text" value="下一条>" onfocus="this.blur()">
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!----------mask--------- -->
    <div class="mask">
    <form action="./api/shop/insert.php" method="post" enctype="multipart/form-data">
        <div class="add_adv public_two" style="margin-top:10%;">
            <p class="revamp_title">新增商品</p>
            <p>
                 商品名称<span>*</span>：
                <input type="text" name="name">
            </p>
            <p>
                 商品图片<span>*</span>：
                <input type="text" id="change_t2" class="text"onfocus="this.blur()">
                <input type="text" value="选择图片" class="pic" onfocus="this.blur();" onclick="document.getElementById('change_a2').click();">
                <input type="file" id="change_a2" class="file" onchange="document.getElementById('change_t2').value=this.value;" name="img">
            </p>
            <p>
                 商品价格<span>*</span>：
                <input type="text" class="money" name="price"> 元
            </p>
            <?php 
                    $classql = "select * from class";
                    $classrst = mysql_query($classql); 
            ?>
            <p>
                 商品类别<span>*</span>：
                <select name="brand_id">
                    <?php while($classrow=mysql_fetch_assoc($classrst)){ ?>
                        <option disabled="disabled">
                            <?php 
                                echo $classrow['name']; 
                                $brandsql = "select * from brand where class_id={$classrow['id']}";
                                $brandrst = mysql_query($brandsql);
                                while($brandrow=mysql_fetch_assoc($brandrst)){
                            ?>
                                <option value="<?php echo $brandrow['id']; ?>">
                                    &nbsp;&nbsp;<?php echo $brandrow['name']; ?>
                                </option>
                            <?php }
                            ?>
                        </option>
                    <?php } ?>
                </select>
            </p>
            <p>
                 货&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;架<span>*</span>：
                 <input type="radio" name="shelf" value="1" id="up" checked="checked" style="width:15px;height:15px;vertical-align:middle;">
                 <label for="up" style="vertical-align:top;">上架</label>&nbsp;&nbsp;&nbsp;&nbsp;
                 <input type="radio" name="shelf" value="0" id="down" style="width:15px;height:15px;vertical-align:middle;">
                 <label for="down" style="vertical-align:top;">下架</label>
            </p>
            <p>
                 库&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;存<span>*</span>：
                <input type="text" name="stock">
            </p>
            <p class="sure">
                <a href="product.php"class="del">取消</a>
                <input type="submit" value="确 认" class="ok" onfocus="this.blur();">
            </p>
        </div>
        </form>
    </div>
</body>
</html>