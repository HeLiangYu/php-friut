<?php
	session_start();
	include '../public/common/config.php';
	if( !$_SESSION['home_userid']){
		echo '<script>location="./login.php";</script>';
		exit;
	}

	$shop_id = $_GET['shop_id'];

	$shosql = "select * from shop where id='{$shop_id}'";
	$shoprst = mysql_query($shosql);
	$shoprow = mysql_fetch_assoc($shoprst);
	if($shoprow){
		$_SESSION['shops'][$shop_id] = $shoprow;
		// if(sizeof($_SESSION['shops']) > 0){
		$_SESSION['shops'][$shop_id]['num'] = 1;
		// }
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>下单</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Best Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/new.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery.min.js"></script>
<!-- //js -->
<!-- cart -->
	<script src="js/simpleCart.min.js"> </script>
<!-- cart -->
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
</head>
	
<body>
<!-- header -->
<div class="header">
		<div class="container">
			<div class="header-grid">
				<div class="header-grid-left animated wow slideInLeft" data-wow-delay=".5s">
					<ul>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">23621@163.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 892</li>
						<?php if(!$_SESSION['home_userid']){ ?>
							<li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="login.php">登录</a></li>
							<li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="register.php">注册</a></li>
						<?php }else{ ?>
							<li><i class="glyphicon glyphicon-user" aria-hidden="true"></i><a href="register.php"><?php echo $_SESSION['home_username'];?></a></li>
							<li><i class="glyphicon glyphicon-log-out" aria-hidden="true"></i><a href="./api/logout.php" onclick="return confirm('确认退出系统账号吗？');">退出</a></li>
						<?php } ?>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="logo-nav">
				<div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
					<h1><a href="index.php"><img src="./images/logo.png" alt=""></a></h1>
				</div>
				<div class="logo-nav-left1">
					<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div> 
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav">
							<li class="active"><a href="index.php" class="act">首页</a></li>	
							<!-- Mega Menu -->
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">进口水果 <b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3">
									<div class="row">
										<div class="">
											<ul class="multi-column-dropdown">
												<h6>进口水果</h6>
												<?php foreach($jbrandarr as $jitem){ ?>
													<li><a href="products.php?brand_id=<?php echo $jitem['id'] ;?>&class_id=<?php echo $jitem['class_id']; ?>"><?php echo $jitem['name'] ;?></a></li>
												<?php } ?>
											</ul>
										</div>
										<div class="clearfix"></div>
									</div>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">国产水果 <b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3">
									<div class="row">
										<div>
											<ul class="multi-column-dropdown">
												<h6>国产水果</h6>
												<?php foreach($gbrandarr as $gitem){ ?>
													<li><a href="products.php?brand_id=<?php echo $gitem['id'] ;?>&class_id=<?php echo $gitem['class_id']; ?>"><?php echo $gitem['name'] ;?></a></li>
												<?php } ?>
											</ul>
										</div>
										<div class="clearfix"></div>
									</div>
								</ul>
							</li>
							<li><a href="user.php">个人中心</a></li>
						</ul>
					</div>
					</nav>
				</div>
				<div class="logo-nav-right">
					<div class="search-box">
				
					</div>
						<!-- search-scripts -->
						<script src="js/classie.js"></script>
						<script src="js/uisearch.js"></script>
							<script>
								new UISearch( document.getElementById( 'sb-search' ) );
							</script>
						<!-- //search-scripts -->
				</div>
				<div class="header-right">
					<div class="cart box_1">
						<a href="checkout.php">
							<h3> <div class="total">
								<span>￥<?php if($_SESSION['total']){ echo $_SESSION['total']; }else{echo 0;} ?></span> (<span id="simpleCart_quantity" ><?php if($_SESSION['num']){ echo $_SESSION['num']; }else{echo 0;} ?></span> items)</div>
							</h3>
						</a>
						<h3 style="margin-top:5px;">
							<p><a href="javascript:;" class="simpleCart_empty" style="color: #d8703f;"><i class="glyphicon glyphicon-shopping-cart" aria-hidden="true" style="color: #d8703f;"></i>&nbsp;&nbsp;购物车</a></p>
						</h3>
						<div class="clearfix"> </div>
					</div>	
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //header -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>首页</a></li>
				<li class="active">下单</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- checkout -->
  <form action="./api/order.php" method="post">
	<div class="checkout" id="order">
		<div class="container">
      <div class="addr animated wow slideInUp">
        <h4>确认收货地址（<a href="./user.php" style="color:#eee;">新增或修改地址</a>）</h4>
        <?php
          $userid = $_SESSION['home_userid'];
          $newsql = "select * from touch where user_id='{$userid}'";
          $newrst = mysql_query($newsql);
          while($newrow = mysql_fetch_assoc($newrst)){
            $newarr[] =$newrow; 
          }
          if($newarr){
            $i = 0;
            foreach($newarr as $additem)  {
              $i++;
          ?>
            <p>
              <span><input type="radio" <?php if($i==1) {echo 'checked';}?> name="addr" value="<?php echo $additem['id']; ?>" id="<?php echo $additem['id']; ?>"> </span>
              <label for="<?php echo $additem['id']; ?>">
                <span><?php echo $additem['addr'];?> </span>
                <span>（<?php echo $additem['name'];?> 收） </span>
                <span class="large"><?php echo $additem['tel'];?></span>
              </label>
            </p>
          <?php }}else{ ?>
            <p>您目前还没有收货地址，点击<a href="./user.php">此处</a>添加收货地址</p>
          <?php }
        ?>
        <div>
          <?php?>
        </div>
      </div>
			<div class="checkout-right animated wow slideInUp" data-wow-delay=".5s">
			<?php if($_SESSION['shops']){?>
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>商品图片</th>
							<th>商品名称</th>
              <th>商品单价</th>
              <th>商品数量</th>
							<th>总价</th>
						</tr>
					</thead>
          <?php
							foreach($_SESSION['shops'] as $shop){
					?>	
					<tr class="<?php echo $shop['id']; ?>">
						<td class="invert-image"><a href="single.html"><img src="../public/uploads/thumb_<?php echo $shop['img']; ?>" alt=" " class="img-responsive" /></a></td>
						<td class="invert"><?php echo $shop['name']; ?></td>
            <td class="invert">￥<?php echo $shop['price']; ?></td>
            <td><?php echo $shop['num'];?></td>
						<td class="invert">￥<?php echo $shop['price']*$shop['num']; ?></td>
					</tr>
					<?php } ?>
		
								<!--quantity-->
									<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script>
								<!--quantity-->
				</table>
        <?php }?>
        <div class="do-order">
          <span class="order-left">总合计：￥<?php echo $_SESSION['total'];?></span>
          <span class="order-right"><input type="submit" value="下单"></span>
        </div>
			</div>
			<div class="checkout-left">	
				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s" style="margin-top:2em;">
					<a href="index.php"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>继续购物</a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
  </div>
  </form>
<!-- //checkout -->
<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="footer-grids">
				<div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".5s">
					<h3>About Us</h3>
					<p>Duis aute irure dolor in reprehenderit in voluptate velit esse.<span>Excepteur sint occaecat cupidatat 
						non proident, sunt in culpa qui officia deserunt mollit.</span></p>
				</div>
				<div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".6s">
					<h3>Contact Info</h3>
					<ul>
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>1234k Avenue, 4th block, <span>New York City.</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
					</ul>
				</div>
				<div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".7s">
					<h3>Flickr Posts</h3>
					<div class="footer-grid-left">
						<a href="single.html"><img src="images/13.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="footer-grid-left">
						<a href="single.html"><img src="images/14.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="footer-grid-left">
						<a href="single.html"><img src="images/15.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="footer-grid-left">
						<a href="single.html"><img src="images/16.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="footer-grid-left">
						<a href="single.html"><img src="images/13.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="footer-grid-left">
						<a href="single.html"><img src="images/14.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="footer-grid-left">
						<a href="single.html"><img src="images/15.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="footer-grid-left">
						<a href="single.html"><img src="images/16.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="footer-grid-left">
						<a href="single.html"><img src="images/13.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="footer-grid-left">
						<a href="single.html"><img src="images/14.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="footer-grid-left">
						<a href="single.html"><img src="images/15.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="footer-grid-left">
						<a href="single.html"><img src="images/16.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".8s">
					<h3>Blog Posts</h3>
					<div class="footer-grid-sub-grids">
						<div class="footer-grid-sub-grid-left">
							<a href="single.html"><img src="images/9.jpg" alt=" " class="img-responsive" /></a>
						</div>
						<div class="footer-grid-sub-grid-right">
							<h4><a href="single.html">culpa qui officia deserunt</a></h4>
							<p>Posted On 25/3/2016</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="footer-grid-sub-grids">
						<div class="footer-grid-sub-grid-left">
							<a href="single.html"><img src="images/10.jpg" alt=" " class="img-responsive" /></a>
						</div>
						<div class="footer-grid-sub-grid-right">
							<h4><a href="single.html">Quis autem vel eum iure</a></h4>
							<p>Posted On 25/3/2016</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="footer-logo animated wow slideInUp" data-wow-delay=".5s">
				<h2><a href="index.php">Best Store <span>shop anywhere</span></a></h2>
			</div>
			<div class="copy-right animated wow slideInUp" data-wow-delay=".5s">
				<p>Copyright &copy; 2016.Company name All rights reserved.More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
			</div>
		</div>
	</div>
<!-- //footer -->
</body>
</html>