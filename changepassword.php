<?php 
	include 'include/header.php';
	// include 'include/slider.php';
	
?>
<?php
    $login_check = session::get('customer_login');
    if($login_check == false){
        header('Localtion: login.php');
    }else{

    }
?>

 <div class="main">
    <div class="content">

    	<div class="section group">
        <div class="content_top">
    		<div class="heading">
                <h3> Change Password </h3>
            </div>
    		<div class="clear"></div>
    	</div>
        <form action="changepassword.php" method="POST">
     
     <table class="tblone"  width="50%">	
         <tr>
             <td>
                 <label>Old Password</label>
             </td>
             <td>
                 <input type="password"   name="old_password" class="medium"/>
             </td>
         </tr>
          <tr>
             <td>
                 <label>New Password</label>
             </td>
             <td>
                 <input type="password"  name="new_password" class="medium"/>
             </td>
         </tr>
         <tr>
             <td>
                 <label>Repeat Password</label>
             </td>
             <td>
                 <input type="password" name="repeat_password" class="medium"/>
             </td>
         </tr>
         
          <tr>
             <td colspan="2">
                 <input type="submit" name="submitpass" Value="Save Password" />
             </td>
         </tr>
     </table>

     </form>
        </div>
	 </div>
<?php 
	include 'include/footer.php';	
?>