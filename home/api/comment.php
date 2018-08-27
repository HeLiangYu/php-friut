<?php
    session_start();
    include '../../public/common/config.php';
    $code = $_POST['code'];
    $time = time();
    $userid = $_SESSION['home_userid'];

    $sql = "select shop.id from indent, shop where indent.code='{$code}' and indent.shop_id=shop.id";

    $rst = mysql_query($sql);
    while($row=mysql_fetch_assoc($rst)){
      $arr[] = $row;
    }

    foreach($arr as $item){
      $id = $item['id'];
      $comment = $_POST[$id];
      if($comment == ''){
        $comment = '该用户户未做评价';
      }
      $csql = "insert into comment(user_id, time, content, shop_id) values('{$userid}', '{$time}', '{$comment}', '{$id}')";
      $ssql = "update indent set status_id=10 where code='{$code}'";
      mysql_query($csql);
      mysql_query($ssql);
    }

    echo "<script>location='../user.php'</script>";
?>