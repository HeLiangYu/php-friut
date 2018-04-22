<?php 
  include '../../../public/common/config.php';
  include '../../../public/common/adminsession.php';

  $id=$_GET['id'];
  $name = $_GET['name'];
  $class_id = $_GET['class_id'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">

  <link href="../../css/public.css" type="text/css" rel="stylesheet"/>
  <link href="../../css/business.css" type="text/css" rel="stylesheet"/>
</head>
<body>
  <div class="mask" style="display:block;">
        <form action="../../api/class/update.php" method="post" >
        <div class="recharge public_two"  style="display:block;margin-top:10%;">
          <p class="revamp_title">修改类别信息</p>
            <p>
                &nbsp;&nbsp;类别ID&nbsp;：
                &nbsp;&nbsp;<input type="text" name="id" value="<?php echo $id; ?>" onfocus="this.blur();">
            </p>
            <p>
                &nbsp;&nbsp;名&nbsp;&nbsp;&nbsp;称<span>*</span>：
                &nbsp;&nbsp;<input type="text" name="name" value="<?php echo $name; ?>">
            </p>
            <p>
                选择分类<span>*</span>：
                <?php 
                    $classql = "select * from class";
                    
                    $classrst = mysql_query($classql);  
                ?>
                <select name="class_id">
                  <?php while($classrow=mysql_fetch_assoc($classrst)){ 
                    if($class_id == $classrow['id']){ ?>
                      <option selected="selected" value="<?php echo $classrow['id']; ?>">
                          <?php echo $classrow['name']; ?>
                      </option>
                  <?php }else{  ?>
                    <option value="<?php echo $classrow['id']; ?>">
                          <?php echo $classrow['name']; ?>
                      </option>
                  <?php } ?>
                <?php } ?>
                </select>
            </p>
            <p class="sure">
                <a href="../../class.php" class="del">取消</a>
                <button class="ok" type="submit">确认</button>
        </div>
        </form>
    </div>
</body>
</html>
