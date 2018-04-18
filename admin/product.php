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
            <p class="header_title">水果到家后台管理系统 </p>
            <span class="header_exit">您好，admin&nbsp;&nbsp;&nbsp; <a href="#">退出</a></span>
        </div>
    </div>

    <div class="content">
        <div class="con_con">
            <ul class="nav">
                <li><a href="#">订单管理</a></li>
                <li><a href="#">订单统计</a></li>
                <li><a href="product.php" class="active">商品管理</a></li>
                <li><a href="#">广告管理</a></li>
                <li><a href="class.php">分类管理</a></li>
                <li><a href="#">意见反馈</a></li>
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
                        <th class="name">商品名称</th>
                        <th class="dispaly">商品分类</th>
                        <th class="class">商品类别</th>
                        <th class="price">商品价格</th>
                        <th class="iforma">商品图片</th>
                        <th class="now">商品库存</th>
                        <th class="now">上下架</th>
                        <th class="opret">操作</th>
                    </tr>

                    <tr>
                        <td class="name"><span>越芒</span></td>
                        <td class="class"><span>水果</span></td>
                        <td class="label"><span>XXXXXXX</span></td>
                        <td class="price"><span>ＸＸＸＸＸＸ</span></td>
                        <td class="iforma"><span>XXXXXX</span></td>
                        <td class="now"><span>启用</span></td>
                        <td class="dispaly"><span>否</span></td>
                        <td class="dispaly"><span>1</span></td>
                        <td class="opret">
                            <a href="./page/shop/update.php" class="ament">修改</a>
                            <a href="./page/shop/delete.php" class="Delete">删除</a>
                        </td>
                    </tr>
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
        <div class="add_adv public_two">
            <p class="revamp_title">新增商品</p>
            <p>
                 商品名称<span>*</span>：
                <input type="text">
            </p>
            <p>
                 商品图片<span>*</span>：
                <input type="text" id="change_t2" class="text"onfocus="this.blur()">
                <input type="text" value="选择图片" class="pic" onfocus="this.blur();" onclick="document.getElementById('change_a2').click();">
                <input type="file" id="change_a2" class="file" onchange="document.getElementById('change_t2').value=this.value;">
            </p>
            <p>
                 商品价格<span>*</span>：
                <input type="text" class="money"> 元
            </p>
            <p>
                 商品类别<span>*</span>：
                <input type="text">
            </p>
            <p>
                 标签 ：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text">
            </p>
            <div class="in">
                <p class="inro">
                    商品简介<span>*</span>：
                </p>
                <textarea></textarea>
            </div>
            <p class="sure">
                <a href="product.php"class="del">取消</a>
                <input type="text" value="确 认" class="ok" onfocus="this.blur();">
            </p>
        </div>
    </div>
</body>
</html>