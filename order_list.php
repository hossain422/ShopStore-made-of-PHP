<?php include 'inc/header.php'; ?>

<?php 
    $login = Session::get('cusLogin');
    if($login == false){
        header('Location:login.php');
    }

    include_once 'help/Format.php';
    include_once 'class/Cart.php';
    $format = new Format();
    $cart = new Cart();
    

?>
        <div class="title">
            <h2>My Account</h2>
        </div>

        <div class="account">
            <div class="row">
                <div class="col-md-3">
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
                <div class="col-md-9">
                    <table class="table border">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Product</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $id = Session::get('id');
                                $order_list = $cart->orderList($id);
                                if($order_list){
                                    $i = 1;
                                    while($result = $order_list->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?php echo $i++ ;?></td>
                                <td><?php echo $result['pdname'] ?></td>
                                <td><img style="width: 60px !important; height: 40px;" src="admin/<?php echo $result['image'];?>" alt=""></td>
                                <td>$<?php 
                                    $price = $result['price'];
                                    $vat = $price * 0.10;
                                    echo $total = $price + $vat; 
                                ?></td>
                                <td><?php echo $result['qty'] ?></td>
                                <td><?php echo $format->dateFormat($result['date']); ?></td>
                                <td><?php
                                    if($result['status'] == 1){
                                        echo 'Pending';
                                    }
                                    elseif($result['status'] == 2){
                                        echo 'Completed';
                                    }
                                 ?></td>
                            </tr>
                            <?php } }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <?php include 'inc/footer.php'; ?>

