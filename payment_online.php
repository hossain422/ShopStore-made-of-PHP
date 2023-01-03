<?php include 'inc/header.php'; ?>

<?php
    include_once 'class/Register.php';
    include_once 'class/Cart.php';
    $cart = new Cart();
    $rg = new Register();

    $login = Session::get('cusLogin');
    if($login == false){
        header('Location:login.php');
    }
    
    $id = Session::get('id');
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $update_profile = $rg->updateProfile($_POST, $id);
    }
    if(isset($_GET['orderid']) && $_GET['orderid'] == 'order'){
        $id = Session::get('id');
        $order = $cart->order($id);
        $delData = $cart->delCustomer();
        header('Location: success.php');
    }
    
?>
        <div class="title">
            <h2>Checkout</h2>
        </div>
        <div class="account">
            <div class="row pb-5">
                <div class="col-md-7">
                    <?php
                        $profile = $rg->profileView($id);
                        if($profile){
                            while($result = $profile->fetch_assoc()){
                    ?>
                    <form action="" method="post">
                        <h4>Billing Address</h4>
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
                        <a href="cart.php" style="text-decoration: none; color: #fe5800; border: 1px solid #CC3636; padding: 7px; padding-right:20px;
                           padding-left:20px; margin-bottom:20px; margin: 10px; font-weight: 700; width: 300px;">Go Back</a>
                    </form>
                    <?php } }?>
                </div>
                <div class="col-md-5">
                    <h4>Your Order</h4 >
                    <table class="table border text-center table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th></th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $buy = $cart->addBuy(); 
                                if($buy){
                                    $i = 1;
                                    $sum = 0;
                                    while($result = $buy->fetch_assoc()){
                            ?>
                            
                            <tr>
                                <td>Title : </td>
                                <td><?php echo $result['title']; ?></td>
                                <td>$<?php echo $result['price']; ?></td>
                            </tr>
                            <tr>
                                <td>Qty : </td>
                                <td></td>
                                <td><?php echo $result['qty']; ?></td>
                            </tr>
                            <tr>
                                <td>Total : </td>
                                <td></td>
                                <td>$<?php
                                        $total = $result['price'] * $result['qty'];
                                        echo $total; 
                                    ?>
                                </td>
                            </tr>
                            
                            <?php
                                $sum = $sum + $total;
                            ?>
                            <?php } } else{ 
                                header('Location: index.php');
                            }?>
                        </tbody>
                    </table>
                    <table class="table text_right">
                        <tr>
                            <td>Sub Total : </td>
                            <td>$<?php echo $sum; ?></td>
                        </tr>
                        <tr>
                            <td>VAT : </td>
                            <td>10% (<?php echo $vat = $sum * 0.10;?>)</td>
                        </tr>
                        <tr>
                            <td>Grand Total : </td>
                            <td>$<?php
                                $vat = $sum * 0.10;
                                $gtotal = $sum + $vat;
                                echo $gtotal;
                            ?></td>
                        </tr>
                    </table>
                    <a href="?orderid=order" style="text-decoration: none; color: #fe5800; border: 1px solid #CC3636; padding: 7px; padding-right:80px;
                           padding-left:80px; margin-bottom:20px; margin: 10px; font-weight: 700; width:100%;">Place Order</a>
                </div>
            </div>
        </div>
    </div>
    
    <?php include 'inc/footer.php'; ?>

