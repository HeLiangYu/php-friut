<?php 
  include '../../../public/common/config.php';
  include '../../../public/common/adminsession.php';

  $id=$_GET['id'];
  $sql = "select * from shop where id='{$id}'";
  $rst = mysql_query($sql); 
  $row=mysql_fetch_assoc($rst);
//   $name = $_GET['name'];
//   $classname = $_GET['classname'];
//   $brandname = $_GET['brandname'];
//   $img = $_GET['img'];
//   $price = $_GET['price'];
//   $stock = $_GET['stock'];
//   $shelf = $_GET['shelf'];
?>

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
  <form action="../../api/shop/update.php" method="post" enctype="multipart/form-data">
    <div class="revamp public_two" style="display:block;margin-top:10%;">
        <p class="revamp_title">修改商品信息</p>
        <p>
            商品名称<span>*</span>：
            <input type="text" name="name" value="<?php echo $row['name']; ?>">
        </p>
        <p>
            商品原图：&nbsp;&nbsp;<img src="../../../public/uploads/thumb_<?php echo $row['img']; ?>" alt="" style="vertical-align:middle;width:100px;">
        </p>
        <p>
            商品图片<span>*</span>：
            <input type="text" id="change_t2" class="text"onfocus="this.blur()">
            <input type="text" value="选择图片" class="pic" onfocus="this.blur();" onclick="document.getElementById('change_a2').click();">
            <input type="file" id="change_a2" class="file" onchange="document.getElementById('change_t2').value=this.value;" name="img">
        </p>
        <p>
            商品价格<span>*</span>：
            <input type="text" class="money" name="price" value="<?php echo $row['price']; ?>"> 元
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
                            if($row['brand_id'] == $brandrow['id']){
                        ?>

                            <option selected="selected" value="<?php echo $brandrow['id']; ?>">
                                &nbsp;&nbsp;<?php echo $brandrow['name']; ?>
                            </option>
                            <?php }else{?> 
                                <option value="<?php echo $brandrow['id']; ?>">
                                &nbsp;&nbsp;<?php echo $brandrow['name']; ?>
                            </option>
                            <?php } ?>    
                        <?php }
                        ?>
                    </option>
                <?php } ?>
            </select>
        </p>
        <p>
            货&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;架<span>*</span>：
        <?php if($row['shelf']){ ?>
            <input type="radio" checked="checked" name="shelf" value="1" id="up" style="width:15px;height:15px;vertical-align:middle;">
            <label for="up" style="vertical-align:top;">上架</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="shelf" value="0" id="down" style="width:15px;height:15px;vertical-align:middle;">
            <label for="down" style="vertical-align:top;">下架</label>
        <?php }else{ ?>
            <input type="radio" name="shelf" value="1" id="up"  style="width:15px;height:15px;vertical-align:middle;">
            <label for="up" style="vertical-align:top;">上架</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" checked="checked" name="shelf" value="0" id="down" style="width:15px;height:15px;vertical-align:middle;">
            <label for="down" style="vertical-align:top;">下架</label>
        <?php } ?>
            
        </p>
        <p>
            库&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;存<span>*</span>：
            <input type="text" name="stock" value="<?php echo $row['stock']; ?>">
        </p>
        <p class="sure">
            <a href="../../product.php"class="del">取消</a>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>" style="display:none;">
            <input type="hidden" name="imgsrc" value="<?php echo $row['img']; ?>" style="display:none;">
            <input type="submit" value="确 认" class="ok" onfocus="this.blur();">
        </p>
    </div>
    </form>
    </div>
  </body>
</html>