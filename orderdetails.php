<?php 
	include 'include/header.php';
	// include 'include/slider.php';
	
?>

<?php
		// xử lý phiên làm việc đối với trang đó 
	   $login_check = session::get("customer_login");
	   if($login_check == false){
		// session::destroy();
	   }
	//    xử lý đơn hàng đã nhận hay chưa và cần có sự xác nhận từ khách hàng
	   $cart = new cart();
	   if(isset($_GET['confirmid'])){
		   $id_confirm = $_GET['confirmid'];
		   $date_confirm = $_GET['time'];
		   $price_confirm = $_GET['price'];
		   $shifted_confirm  = $cart->shifted_confirm($id_confirm,$date_confirm,$price_confirm);
	   }
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h3>Your Order Details Cart</h3>
				
						<table class="tblone">
							<tr>
                                <th width="2%">No</th>
								<th width="20%" >Product Name</th>
								<th width="5%">Image</th>
								<th width="20%">Price</th>
								<th width="15%">Quantity</th>
                                <th width=27%>Date</th>
                                <th width="15%">Status</th>
								<th width="10%">Action</th>
							</tr>
							<?php 
                            $customer_Id = session::get('customer_id');
								$get_cart_order_details = $ct->get_cart_order_details($customer_Id);
								if($get_cart_order_details){
                                    $qty = 0;
                                    $i = 0;
									while($result_cart = $get_cart_order_details->fetch_assoc()){
                                        $i++;
							?>
							<tr>
                                <td><?php echo $i;?></td>
								<td > <?php echo $result_cart['productName']; ?></td>
								<td><img src="admin/uploads/<?php echo $result_cart['image'] ?>" alt=""/></td>
								<td><?php echo $fm->format_currency($result_cart['price']); ?> VNĐ</td>
								<td><?php echo $result_cart['quantity']; ?>  </td>
                                <td><?php echo $fm->FormatDate($result_cart['date_order']) ?></td>
                                <td>
                                    <?php 
									//nếu mà đơn hàng chưa được xử lý thì sẽ hiện ra processing 
									//  nếu mà admin đã xử lý rằng đơn hàng rồi thì sẽ hiện ra 
									// ngược lại thì là xác nhận  đã nhận được đơn hàng đó 
                                        if($result_cart['status'] == '0'){
                                            echo "Processing";
                                        }else if($result_cart['status'] == '1'){
										?>
											<span>Shipping</span>
										<?php 
                                        }else if($result_cart['status'] == '2'){
											echo "Received";
										}
                                    ?>
                                </td>
                                <!-- xử lý xóa  nếu tình trạng mà chưa xử lý thì là ko được xóa (N/A) và ngược lại -->
                                <?php 
                                    if($result_cart['status'] == '0'){
                                ?>
                                <td> <?php echo "N/A" ;?> </td>
                                <?php
                                    }elseif($result_cart['status'] == '1'){
                                ?>
								<td>	<a href="?confirmid=<?php echo $customer_Id ?>&price=<?php echo $result_cart['price']?>&time=<?php echo $result_cart['date_order']?>">Confirmed</a> </td>
								<?php 
									}else{  
								?>
								<td><?php  echo "Received";?></td>
                                <?php 
                                    }
                                ?>
                            </tr>
							<?php 
							$qty = $qty + $result_cart['quantity'];
									}
								}
							?>
							
						</table>
					
					
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

 <?php 
	include 'include/footer.php';	
?>


