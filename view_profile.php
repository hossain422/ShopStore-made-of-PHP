<?php include 'inc/header.php'; ?>

<?php
    include_once 'class/Register.php';
    $rg = new Register();
     
    $login = Session::get('cusLogin');
    if($login == false){
        header('Location:login.php');
    }

?>
        <div class="title">
            <h2>View Profile</h2>
        </div>

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
                        $id = Session::get('id');
                        $profile = $rg->profileView($id);
                        if($profile){
                            while($result = $profile->fetch_assoc()){
                    ?>
                    <table class="table border">
                        <tr>
                            <td width="15%">Name</td>
                            <td>:</td>
                            <td><?php echo $result['name'] ;?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $result['email'] ;?></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>:</td>
                            <td><?php echo $result['phone'] ;?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td><?php echo $result['address'] ;?></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>:</td>
                            <td><?php echo $result['city'] ;?></td>
                        </tr>
                        <tr>
                            <td>Zip Code</td>
                            <td>:</td>
                            <td><?php echo $result['zip'] ;?></td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>:</td>
                            <td><?php echo $result['country'] ;?></td>
                        </tr>
                    </table>
                    <?php } }?>
                </div>
            </div>
        </div>
    </div>
    
    <?php include 'inc/footer.php'; ?>

