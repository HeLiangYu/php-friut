<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div class="header">
		<p class="header_title">鲜果集后台管理系统</p>
    </div>
    
    <div class="content">
    	<div class="login">
    		<!--<div class="title_backgroud">
        		<p class="title"><!--后台管理系统</p>
        	</div>
		-->

		<form action="./api/check.php" method="post">
			<div class="login_content">
				<p>
					<img src="images/logo_username.png" />
					<input type="text" placeholder="请输入登录用户名" class="font_color" name="username" />
				</p>

				<p>
					<img src="images/logo_password.png" />
					<input type="password" placeholder="请输入登录密码"  class="font_color" name="password" />
				</p>

				<!-- <p>
					<img src="images/logo_code.png" />
					<input type="text" placeholder="请输入验证码"  class="code_font" />
					<input type="text" class="code_img_margin" onfocus="this.blur()"/>
				</p> -->
			</div>

        	<p class="submit">
						<input type="submit" value="登&nbsp;&nbsp;录" />
            	<!-- <a href="#">登&nbsp;&nbsp;录</a> -->
        	</p>
				</div>  
			</form> 
   </div>
</body>
</html>
