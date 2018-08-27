<?php
	session_start();
	include '../public/common/config.php';
	include './api/adv.php';
	include './api/newp.php';
	include './api/photo.php';
	include './api/link.php';

	$shop_id = $_GET['shop_id'];

	$singlesql = "select shop.*, brand.name bname, class.name cname from shop, class, brand where shop.id='{$shop_id}' and shop.brand_id=brand.id and  brand.class_id=class.id group by shop.id";
	$singlerst = mysql_query($singlesql);

	$singlerow = mysql_fetch_assoc($singlerst);

	$commentsql = "select comment.*, users.username uname, users.img uimg from comment, users where comment.shop_id='{$shop_id}' and comment.user_id=users.id";
	$commentrst = mysql_query($commentsql);
	
	while($commentrow = mysql_fetch_assoc($commentrst)){
		$commentarr[] = $commentrow;
	};
	
	$commentnumsql = "select count(*) num from comment where shop_id='{$shop_id}'";
	$commentnumrst = mysql_query($commentnumsql);
	$commentnumrow = mysql_fetch_assoc($commentnumrst);
	if($commentnumrow){
		$commentnum = $commentnumrow['num'];
	}else{
		$commentnum = 0;
	}
 ?>

<!DOCTYPE html>
<html>
<head>
<title>商品详情</title>
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
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>首页</a></li>
				<li class="active">商品详情</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- single -->
	<div class="single">
		<div class="container">
		<div class="col-md-4 products-left">
				<div class="categories animated wow slideInUp" data-wow-delay=".5s" style="margin-top:0;">
					<h3>目 录</h3>
					<ul class="cate">
						<li><a href="javascript:">进口水果</a></li>
							<ul>
								<?php for($i=0; $i<sizeof($jbrandarr); $i++){?>
									<li><a href="products.php?brand_id=<?php echo $jbrandarr[$i]['id'] ;?>&class_id=<?php echo $jbrandarr[$i]['class_id']; ?>"><?php echo $jbrandarr[$i]['name']; ?></a></li>
								<?php } ?>
							</ul>
						<li><a href="javascript:">国产水果</a></li>
							<ul>
							<?php for($i=0; $i<sizeof($gbrandarr); $i++){?>
									<li><a href="products.php?brand_id=<?php echo $jbrandarr[$i]['id'] ;?>&class_id=<?php echo $jbrandarr[$i]['class_id']; ?>"><?php echo $gbrandarr[$i]['name'] ?></a></li>
								<?php } ?>
							</ul>
					</ul>
				</div>
				<div class="new-products animated wow slideInUp" data-wow-delay=".5s">
					<h3>新生鲜</h3>
					<div class="new-products-grids">
					<?php for($i=0; $i<sizeof($shopnewarr); $i++){ ?>
						<div class="new-products-grid" style="margin-bottom: 3em;">
							<div class="new-products-grid-left">
								<a href="single.php"><img style="height:120px;" src="../public/uploads/<?php echo $shopnewarr[$i]['img'];?>" alt=" " class="img-responsive" /></a>
							</div>
							<div class="new-products-grid-right">
								<h4><a href="single.php"><?php echo $shopnewarr[$i]['name'];?></a></h4>
								<div class="simpleCart_shelfItem new-products-grid-right-add-cart">
									<p> <span class="item_price">￥<?php echo $shopnewarr[$i]['price'];?></span><a class="item_add"  href="checkout.php?shop_id=<?php echo $shopnewarr[$i]['id']; ?>">添加到购物车</a></p>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					<?php }?>
					</div>
				</div>
				<div class="men-position animated wow slideInUp" data-wow-delay=".5s">
					<a href="single.php"><img src="../public/uploads/<?php echo $littleadvarr[1]['img'];?>" alt=" " class="img-responsive" /></a>
					<div class="men-position-pos">
						<h5><span>55%</span> Flat Discount</h5>
					</div>
				</div>
			</div>
			<div class="col-md-8 single-right">
				<div class="col-md-8 single-right-left animated wow slideInUp" data-wow-delay=".5s">
				<!-- <img src="../public/uploads/thumb_<?php echo $singlerow['img'];?>" alt="" style="width:400px;"> -->
					<div class="flexslider">
						<ul class="slides">
							<li data-thumb="../public/uploads/thumb_<?php echo $singlerow['img'];?>">
								<div class="thumb-image"> <img src="../public/uploads/thumb_<?php echo $singlerow['img'];?>" data-imagezoom="true" class="img-responsive"> </div>
							</li>
						</ul>
					</div>
					<!-- flixslider -->
						<script defer src="js/jquery.flexslider.js"></script>
						<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
						<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
						</script>
					<!-- flixslider -->
				</div>
				<div class="col-md-4 single-right-left simpleCart_shelfItem animated wow slideInRight" data-wow-delay=".5s">
					<h3><?php echo $singlerow['name'];?></h3>
					<h4><span class="item_price">￥<?php echo $singlerow['price']; ?></h4>
					<div class="description">
						<p>
							<span><?php echo $singlerow['cname']; ?></span>
							<span><?php echo $singlerow['bname']; ?></span>
						</p>
					</div>
					<div class="occasional">
						<h5 style="display:inline-block;">商品库存 :</h5>
						<span><?php echo $singlerow['stock'];?> kg</span>
					</div>
					<div class="occasion-cart">
						<a class="item_add" href="checkout.php?shop_id=<?php echo $singlerow['id']; ?>">添加到购物车 </a>
					</div>
				</div>
				<div class="clearfix"> </div>
				<div class="bootstrap-tab animated wow slideInUp" data-wow-delay=".5s">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">商品描述</a></li>
							<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">商品评论（<?php echo $commentnum; ?>）</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
								<h5>商品描述详情</h5>
								<p><?php echo $singlerow['content'];?></p>
							</div>
							<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
							<?php if($commentarr){
									 for($i=0; $i<sizeof($commentarr); $i++){?>
								<div class="bootstrap-tab-text-grids">
									<div class="bootstrap-tab-text-grid">
										<div class="bootstrap-tab-text-grid-left">
											<img src="../public/uploads/thumb_<?php echo $commentarr[$i]['uimg'];?>" style="border-radius:50%;border:1px solid #ddd;width:100px;height:100px;" alt=" " class="img-responsive" />
										</div>
										<div class="bootstrap-tab-text-grid-right">
											<ul>
												<li><a href="javascript:"><?php echo $commentarr[$i]['uname'];?></a></li>
											</ul>
											<p><?php echo $commentarr[$i]['content']; ?></p>
											<p><?php echo date("Y-m-d H:i", $commentarr[$i]['time']);?></p>
										</div>
										<div class="clearfix"> </div>
									</div>
								
								
								
								
								
								
								</div>
								<?php }} ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
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
<!-- zooming-effect -->
	<script src="js/imagezoom.js"></script>
<!-- //zooming-effect -->
</body>
</html>