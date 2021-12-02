<?php 
    include 'lib/session.php';
    session::init();
?>
<?php 
// thêm class vào
 include_once 'lib/database.php';
 include_once 'helpers/format.php';

 spl_autoload_register(function($className){ 	
	 include_once "classes/".$className.".php";});
$db = new Database();
$fm = new Format();
$ct = new cart();
$us = new user();
$cat = new category();
$product = new product();
$cus = new customer();

?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE HTML>
<head>
<title>Shopping Online</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="https://icon-library.com/images/i-phone-icon/i-phone-icon-3.jpg" type="image/x-icon">
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Akronim&display=swap');
  .wrap .logo .title-header{
	font-family: 'Akronim', cursive;
	font-size: 25px;
	margin-bottom: 0;
  }
</style>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logoapple.png" alt="" height="100px"  style="margin-left:100px;"/></a>
				<p class="title-header" style="margin: 5px 0 0 60px">ShopOnline Nguyễn Nghĩa</p>
				
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form action="search.php" method="POST">
				    	<input type="text" placeholder="Tìm Kiếm Sản Phẩm " name="tukhoa">
						<input type="submit" name= "search_product" value="Tìm Kiếm">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product">
  									<?php 
									  // kiểm tra xem bên trong có sản phẩm nào được mua hay không
									  $check_cart = $ct->check_cart();
									  if($check_cart)
									  {
										$sum = session::get("sum");
										$qty = session::get("qty");
										
										  echo number_format($sum).' ' .'Đ ' .'(' .$qty.')';
									  }else{
										  echo 'Empty!';
									  }
									 	 
									?>
								</span>
							</a>
						</div>
			      </div>
				  <?php 
				  // nếu customer_id được get về thì sẽ hủy cái phiên làm việc với toàn bộ session đó 
				 	if(isset($_GET["customer_id"])) {
						 $customerId = $_GET['customer_id'];
						 $dellcart = $ct->dell_all_data_cart();
						 $dellcompare = $ct->dell_all_data_compare($customerId);
						 $dellcompare = $ct->dell_all_data_wishlist($customerId);
						 
						 session::destroy();// hủy session
					 } 
				  ?>
		   <div class="login">
				<?php 
					$login_check = session::get('customer_login');
					if($login_check == false){
						echo '<a href="login.php" class="login_form">Login</a></div>';
					}else{
						echo '<a href="?customer_id='.session::get('customer_id').'" class="login_form">Logout</a></div>';
					}
				?>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange" >
	  <li style="font-size: 10px;"><a href="index.php">Home</a></li>
	  <li><a href="products.php">Products</a> </li>
	  <li><a href="topbrands.php">Top Brands</a></li>
	  <!-- hiện thị  menu Cart khi trong giỏ hàng có sản phẩm   -->
	  <?php 
	 	$check_cart = $ct->check_cart() ;
		 if($check_cart){
			 echo '	  <li><a href="cart.php">Cart</a></li>';
		 }else{
			 echo "";
		 }
	  ?>
	<!--  Khi người dùng đã đặt hàng thì hiện thị  ordered -->
	<?php 

	    $customer_Id = session::get('customer_id');
	 	$check_order = $ct->check_ordered($customer_Id) ;
		 if($check_order){
			 echo '	  <li><a href="orderdetails.php">Ordered</a></li>';
		 }else{
			 echo "";
		 }
	  ?>
	  <li><a href="contact.php">Contact</a> </li>
	  <?php 
			$login_check = session::get('customer_login');
			if($login_check==false){
				echo "";
			} else{
				$customer_Id = session::get('customer_id');
				$check_compare = $ct->check_compare($customer_Id) ;
				if($check_compare){
					echo '<li><a href="compare.php">Compare</a> </li>';
				}else{
					echo "";
				}
			}
	 	?>
		 <?php 
			$login_check = session::get('customer_login');
			if($login_check==false){
				echo "";
			} else{
				$customer_Id = session::get('customer_id');
				$check_wishlist = $ct->check_wishlist($customer_Id) ;
				if($check_wishlist){
					echo '<li><a href="wishlist.php">Wishlist</a> </li>';
				}else{

					echo "";
				}
			}
	 	?>

	<!-- khi người dùng đã đăng nhập thì sẽ hiện thi menu  profile (thong tin khách hàng ) -->
	  <?php 
			$login_check = session::get('customer_login');
			if($login_check==false){
				echo "";
			} else{
				echo '	  <li><a href="profile.php">Profile</a></li>';
			}
	 	?>
	  <div class="clear"></div>

	</ul>
</div>