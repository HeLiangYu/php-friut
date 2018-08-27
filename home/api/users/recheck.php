<?php
  include '../../../public/common/config.php';
	session_start();
	$username = $_POST['username'];
	$password = $_POST['pass'];
	$repass = $_POST['repass'];

	if($password != $repass){
		echo '<script>alert("两次密码输入不一致，请重新输入");location="../../register.php";</script>';
	}else{
    $sql = "select * from users where username='{$username}'";
    if(mysql_fetch_assoc(mysql_query($sql))){
      echo '<script>alert("用户名已存在，请重新输入");location="../../register.php";</script>';
    }else{
      $newsql = "insert into users(username, password) values('{$username}', MD5('{$password}'))";
      if(mysql_query($newsql)){
        $_SESSION['home_username'] = $username;
        $_SESSION['home_userid'] = mysql_insert_id();
        echo $_SESSION['home_userid'];
        echo '<script>location="../../user.php";</script>';
      }
    }
  }
?>