<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
	$filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/cart.php');
	include_once ('../helpers/format.php');
?>
<?php 
// xử lý những đơn hàng mà khách hàng đã đặt 
	$cart = new cart();
    if(isset($_GET['shiftid'])){
		$id_shift = $_GET['shiftid'];
		$date_shift = $_GET['time'];
		$price_shift = $_GET['price'];
		$shifted_your_cart = $cart->shifted_your_cart($id_shift,$date_shift,$price_shift);
    }
	// xử lý remove khi admin đ
	if(isset($_GET['deleteid'])){
		$id_del = $_GET['deleteid'];
		$date_del = $_GET['time'];
		$price_del = $_GET['price'];
		$delete_your_cart = $cart->delete_your_cart($id_del,$date_del,$price_del);
    }
   
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">      
				<!-- hiện thị thông báo  -->
				<?php 
					if(isset($shifted_your_cart)){
						echo $shifted_your_cart;
					}
				?>  
				<?php 
					if(isset($delete_your_cart)){
						echo $delete_your_cart;
					}
				?>  
				
                    <table class="data display datatable" id="example">
					<thead>
		 				<tr>
							<th> No</th>
							<th>Order Time</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Customer</th>
							<th>Customer ID</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$cart = new cart();
						$fm = new Format();
						 $get_inbox_cart = $cart->Get_Inbox_Cart();
							if($get_inbox_cart){
								$i =0 ;
								while($result_inbox = $get_inbox_cart->fetch_assoc()){
									$i++;

					?>
						<tr class="odd gradeX">
							<td><?=$i?></td>
							<td><?=$fm->FormatDate($result_inbox['date_order']) ?></td>
							<td><?=$result_inbox['productName']?></td>
							<td><?=$result_inbox['quantity']?></td>
							<td><?=$fm->format_currency($result_inbox['price']) ?> VNĐ</td>
							<td><a href="customer.php?customerid=<?php echo  $result_inbox['customer_Id'] ?>">View Customer</a></td>
							<td><?=$result_inbox['customer_Id']?></td>
							<td>
									<?php
										if($result_inbox['status'] == '0'){
									?>
									<a href="?shiftid=<?php echo $result_inbox['id']?>&price=<?php echo $result_inbox['price']?>&time=<?php echo $result_inbox['date_order']?>">Shifted</a>
									<?php 
										}elseif($result_inbox['status']=='1'){
										?>
											<?php 
												echo "Shifting..."
											?>
										<?php 
										}elseif($result_inbox['status']=='2'){
										?>
									<a href="?deleteid=<?php echo $result_inbox['id'] ?>&price=<?php echo $result_inbox['price'] ?>&time=<?php echo $result_inbox['date_order'] ?>" onclick="return confirm('Bạn Có Muốn Xóa Đơn Hàng Này Không ? ') ">Remove</a>
									<?php 
											}
									?>
							 </td>
						</tr>
						<?php 
								}
							}

						?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
