<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>修改商品</title>

    <link href="../../css/public.css" type="text/css" rel="stylesheet"/>
    <link href="../../css/product.css" type="text/css" rel="stylesheet"/>
  </head>
  <body>
  <div class="mask" style="display:block;">
    <div class="revamp public_two" style="display:block;">
        <p class="revamp_title">修改商品信息</p>
        <p>
            商品名称<span>*</span>：
            <input type="text">
        </p>
        <p>
            商品图片&nbsp;&nbsp;：
            <input type="text" id="change_t1" class="text" onfocus="this.blur()">
            <input type="text" value="选择图片" class="pic" onfocus="this.blur();" onclick="document.getElementById('change_a1').click();">
            <span class="prompt">提示：不修改图片该项留空</span>
            <input type="file" id="change_a1" class="file" onchange="document.getElementById('change_t1').value=this.value;">
        </p>
        <p>
            商品价格<span>*</span>：
            <input type="text"  class="money"> 元
        </p>
        <p>
            商品类别<span>*</span>：
            <input type="text">
        </p>
        <p>
            标签 ：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text">
        </p>
        <div class="in">
            <p class="inro">
                商品简介<span>*</span>：
            </p>
            <textarea></textarea>
        </div>
        <p class="sure">
            <input type="text" value="取 消" class="del" onfocus="this.blur();">
            <input type="text" value="确 认" class="ok" onfocus="this.blur();">
        </p>
    </div>
    </div>
  </body>
</html>