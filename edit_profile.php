<?php include 'inc/header.php'; ?>

<?php
    include_once 'class/Register.php';
    $rg = new Register();

    $login = Session::get('cusLogin');
    if($login == false){
        header('Location:login.php');
    }
    
    $id = Session::get('id');
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $update_profile = $rg->updateProfile($_POST, $id);
        Session::set('display', $id);
    }
    
?>
        <div class="title">
            <h2>Update Profile</h2>
        </div>
        <?php
            if(isset($update_profile)){
                echo $update_profile;
            }
        ?>
        <div class="account">
            <div class="row">
                <div class="col-md-4">
                    <table class="table border">
                        <tr>
                            <td><a href="account.php">Dashboard</a></td>
                        </tr>
                        <tr>
                            <td><a href="view_profile.php">View Details</a></td>
                        </tr>
                        <tr>
                            <td><a href="order_list.php">Order</a></td>
                        </tr>
                        <tr>
                            <td><a href="edit_profile.php">Update Profile</a></td>
                        </tr>
                        <tr>
                            <td><a href="change_pass.php">Change Password</a></td>
                        </tr>
                        <tr>
                            <?php
                                if(isset($_GET['action'])){
                                    $delData = $cart->delCustomer();
                                    Session::destroy();
                                }
                            ?>
                            <td><a href="?action=<?php Session::get('id');?>">Logout</a></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-8">
                    <?php
                        $profile = $rg->profileView($id);
                        if($profile){
                            while($result = $profile->fetch_assoc()){
                    ?>
                    <form action="" method="post">
                        <table class="table border">
                            <tr>
                                <td width="15%">Name</td>
                                <td>:</td>
                                <td><input style="width:400px;" type="text" name="name" value="<?php echo $result['name'] ;?>"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><input style="width:400px;" type="email" name="email" value="<?php echo $result['email'] ;?>"></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>:</td>
                                <td><input style="width:400px;" type="text" name="phone" value="<?php echo $result['phone'] ;?>"></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>:</td>
                                <td><textarea name="address" id="" cols="51" rows="3"><?php echo $result['address'] ;?></textarea></td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td>:</td>
                                <td><input style="width:400px;" type="text" name="city" value="<?php echo $result['city'] ;?>"></td>
                            </tr>
                            <tr>
                                <td>Zip Code</td>
                                <td>:</td>
                                <td><input style="width:400px;" type="text" name="zip" value="<?php echo $result['zip'] ;?>"></td>
                            </tr>
                            <tr>
                                <td>Country</td>
                                <td>:</td>
                                <td><input style="width:400px;" type="text" name="country" value="<?php echo $result['country'] ;?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><input type="submit" name="submit" value="Save Change"></td>
                            </tr>
                        </table>
                    </form>
                    <?php } }?>
                </div>
            </div>
        </div>
    </div>
    
    <?php include 'inc/footer.php'; ?>

