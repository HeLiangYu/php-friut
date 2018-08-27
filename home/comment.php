
<?php 
	session_start();
	include '../public/common/config.php';
	include './api/link.php';
	include './api/newp.php';
	include './api/photo.php';
	
	$userid = $_SESSION['home_userid'];
	$sql = "select * from users where id='{$userid}'";
	$sqlrst = mysql_query($sql);
	$row = mysql_fetch_assoc($sqlrst);
?>

<!DOCTYPE html>
<html>
<head>
<title>个人中心</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Best Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link rel="shortcut icon" href="./images/logo.ico">
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
							<li><i class="glyphicon glyphicon-user" aria-hidden="true"></i><a href="./user.php"><?php echo $_SESSION['home_username'];?></a></li>
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
							<li><a href="index.php">首页</a></li>	
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
							<li class="active"><a class="act" href="user.php">个人中心</a></li>
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
				<li class="active">商品评论</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<form action="./api/comment.php" method="post">
	<div class="" id="comment">
		<div class="container">
      <div class="comment">
        <?php
          $sql = "select shop.*, status.name statusname, indent.time, indent.num, indent.price from indent, shop, status where indent.code='{$_GET['code']}' and indent.status_id=status.id and indent.shop_id=shop.id";
          $rst = mysql_query($sql);
          while($orderg = mysql_fetch_assoc($rst)){
            $orderarr[] = $orderg;
          }
        ?>
        <table>
          <?php foreach($orderarr as $oitem){  ?>
          <tr>
            <td><img src="../public/uploads/thumb_<?php echo $oitem['img'];?>" alt=""></td>
            <td><?php echo $oitem['name'];?></td>
            <td><textarea name="<?php echo $oitem['id']; ?>" id="" cols="30" rows="10" placeholder="请输入您对该商品的评价"></textarea></td>
          </tr>
          <?php } ?>
        </table>
        <input type="hidden" name="code" value="<?php echo $_GET['code']; ?>">
        <p><input type="submit" value="发表评论"></p>
      </div>
    </div>
  </div>
</form>
<!-- //mail -->
<!-- footer -->
<div class="footer">
		<div class="container">
			<div class="footer-grids">
				<div class="col-md-4 footer-grid animated wow slideInLeft" data-wow-delay=".5s">
					<h3>关于我们</h3>
					<p style="margin-bottom:6px;">我们致力于做快捷、优惠的生鲜网站</p>
					<p style="margin-bottom:6px;">让您满意是我们的宗旨</p>
					<p style="margin-bottom:6px;">我们时刻为您提供最新鲜、最优质的食材</p>
					<p style="margin-bottom:6px;">我们致力于做快捷、优惠的生鲜网站</p>
					<p style="margin-bottom:6px;">让您满意是我们的宗旨</p>
					<p style="margin-bottom:6px;">我们时刻为您提供最新鲜、最优质的食材</p>
				</div>
				<div class="col-md-4 footer-grid animated wow slideInLeft" data-wow-delay=".6s">
					<h3>联系信息</h3>
					<ul>
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>1234k Avenue, 4th block, <span>New York City.</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:23621@163.com">23621@163.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
					</ul>
				</div>
				<div class="col-md-4 footer-grid animated wow slideInLeft" data-wow-delay=".7s">
					<h3>快速入口</h3>
					<?php for($i=0; $i<sizeof($shopnnewarr); $i++){ ?>
					<div class="footer-grid-left">
						<a href="single.php?shop_id=<?php echo $shopnewarr[$i]['id']; ?>"><img src="../public/uploads/<?php echo $shopnnewarr[$i]['img']; ?>" alt=" " class="img-responsive" style="width:100px;height:80px;" /></a>
					</div>
					<?php }?>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="footer-logo animated wow slideInUp" data-wow-delay=".5s">
				<h2><a href="index.php"><img src="./images/logo57.gif"></a></h2>
			</div>
		</div>
	</div>
</div>
<!-- //footer -->
</body>
</html>