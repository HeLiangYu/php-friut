<?php
    date_default_timezone_set("Asia/Shanghai");
    include '../../../public/common/config.php';

    $code = $_GET['code'];
    $sql = "select * from indent where code='{$code}' group by code";
    
    $rst = mysql_query($sql); 
    $row = mysql_fetch_assoc($rst);

    $totalsql = "select * from indent where code='{$code}'";
    $totalrst = mysql_query($totalsql); 
    $total = 0;
    while($totalrow = mysql_fetch_assoc($totalrst)){
        $total += $totalrow['num'] * $totalrow['price'];
    }

    $status_id = $row['status_id'];
    $stsql = "select * from status where status.id='{$status_id}'";
    $strst = mysql_query($stsql);
    $statusname = mysql_fetch_assoc($strst);

    $touch_id = $row['touch_id'];
    $touchsql = "select * from touch where touch.id='{$touch_id}'";
    $touchrst = mysql_query($touchsql);
    $touchname = mysql_fetch_assoc($touchrst);

    $shopsql = "select indent.*, shop.name sname, shop.img from indent, shop where code='{$code}' and indent.shop_id=shop.id";
    $shoprst = mysql_query($shopsql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>订单详情</title>

    <link href="../../css/public.css" type="text/css" rel="stylesheet"/>
    <link href="../../css/order_details.css" type="text/css" rel="stylesheet"/>

    <script src="../../js/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="../../js/resizeImage.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var popObj;
            $(".do_something").click(function(){
                $(".mask").css("display","block");
                $(".do").css("display","block");
                popObj = ".do";
            });

            $(".del").click(function(){
                $(".mask").hide();
                $(popObj).hide();
            });
            $(".ok").click(function(){
                $(".mask").hide();
                $(popObj).hide();
            });
        });
    </script>
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
                <li><a href="../../indent_m.php" class="active">订单管理</a></li>
                <li><a href="../../product.php">商品管理</a></li>
                <li><a href="../../adv.php">广告管理</a></li>
                <li><a href="../../status.php">状态管理</a></li>
                <li><a href="../../class.php">分类管理</a></li>
                <li><a href="../../comment.php">评论管理</a></li>
                <li><a href="../../business.php">用户账号管理</a></li>
                <li><a href="../../admin.php">后台账号管理</a></li>
            </ul>

            <div class="right">
                <div class="information">
                    <p class="title">下单信息</p>
                    <div class="details1">
                        <div class="p1">
                            <p class="numb">订单号：<span><?php echo $code; ?></span></p>
                            <p class="money">订单总额：￥<span><?php echo $total; ?></span></p>
                            <p>订单状态：<span><?php echo $statusname['name']; ?></span></p>
                            <input type="text" value="操作" onfocus="this.blur()" class="do_something">
                        </div>
                        <div class="p1">
                            <p class="numb">收货联系人：<span><?php echo $touchname['name']; ?></span></p>
                            <p>联系人电话：<span><?php echo $touchname['tel']; ?></span></p>
                            <p style="margin-left:49px;">联系人邮箱：<span><?php echo $touchname['email']; ?></span></p>
                        </div>
                        <p class="p1">收货地址：<span><?php echo $touchname['addr']; ?></span></p>
                        <p>下单时间：<span><?php echo date("Y-m-d H:i", $row['time']); ?></span></p>
                    </div>
                </div>

                <div class="product">
                    <p class="title">
                        <span>下单商品</span>
                    </p>

                    <?php while($shoprow=mysql_fetch_assoc($shoprst)){ ?>
                    <div class="details3">
                        <p class="img"><img src="../../../public/uploads/thumb_<?php echo $shoprow['img']; ?>" onload="resizeImage(this)"></p>
                        <div class="fruit">
                            <p><?php echo $shoprow['sname']; ?></p>
                            <p>单价：<?php echo $shoprow['price']; ?> /kg</p>
                            <p>重量：<?php echo $shoprow['num']; ?> kg</p>
                            <p>总额：￥ <?php echo $shoprow['price'] * $shoprow['num']; ?></p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-----------mask------------>
    <form action="../../api/indent/update.php" method="post">
    <div class="mask">
        <div class="do public_two">
            <p class="revamp_title">订单操作</p>
            <p>
                &nbsp;订单状态<span>*</span>：
                <select name="status_id">
                <?php 
                    $statussql = "select * from status"; 
                    $statusrst = mysql_query($statussql); 
                    while($statusrow = mysql_fetch_assoc($statusrst)){
                        if($row['status_id'] == $statusrow['id']){
                ?>
                    <option selected="selected" value="<?php echo $statusrow['id']; ?>"><?php echo $statusrow['name']; ?></option>
                <?php }else{ ?>
                    <option value="<?php echo $statusrow['id']; ?>"><?php echo $statusrow['name']; ?></option>
                <?php }} ?>    
                </select>
            </p>
            <p class="sure">
                <a href="../../indent_m.php">取消</a>
                <input type="hidden" name="code" value="<?php echo $row['code']; ?>" style="display:none;">
                <input type="submit" value="确定" class="ok" onfocus="this.blur();">
            </p>
        </div>
    </div>
    </form>
</body>
</html>
