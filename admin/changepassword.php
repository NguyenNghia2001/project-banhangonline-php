<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/user.php'?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Change Password</h2>
        <?php
                $admin = new user();
                if(isset($_POST['submitpass'])){
                    $check = $admin->CheckUserAdmin();
                    if($result = $check->fetch_assoc()){
                       $id = $result['adminid'];
                       $oldpass = $result['adminPass'];
                        $changepassword = $admin->changePassword($id,$oldpass,$_POST);
                    }
                }
            ?>
        <div class="block">     
               <?php
                if(isset($changepassword)){
                    echo $changepassword;
                }
               ?> 
         <form action="changepassword.php" method="POST">
     
            <table class="form" >	
			
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
                    <td></td>
                    <td>
                        <input type="submit" name="submitpass" Value="Update" />
                    </td>
                </tr>
            </table>

            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>