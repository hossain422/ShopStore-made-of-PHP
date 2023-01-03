<?php include 'inc/header.php'; ?>

<?php /*
    $login = Session::get('cusLogin');
    if($login == false){
        header('Location:login.php');
    }
    include_once 'class/Cart.php';
    $cart = new Cart();
    if(isset($_GET['delCart'])){
        $delCart = $_GET['delCart'];
        $del_cart = $cart->delCart($delCart);
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];
        $qty = $_POST['qty'];

        $update_cart = $cart->updateCart($id, $qty);
    }
*/
?>
        <div class="title">
            <h2>My Account</h2>
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
                <div class="col-md-8"></div>
            </div>
        </div>
    </div>
    
    <?php include 'inc/footer.php'; ?>

