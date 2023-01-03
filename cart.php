<?php include 'inc/header.php'; ?>

<?php
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

?>
        <div class="title">
            <h2>Your Cart</h2>
        </div>
        <?php 
            if(isset($del_cart)){
                echo $del_cart;
            }
            if(isset($update_cart)){
                echo $update_cart;
            }
        ?>
        <div class="cart pb-5">
            <table class="table border text-center table-hover table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Action</th>
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
                        <td><?php echo $i++ ; ?></td>
                        <td><?php echo $result['title']; ?></td>
                        <td><img src="admin/<?php echo $result['image']; ?>" alt=""></td>
                        <td>$<?php echo $result['price']; ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id" id="" value="<?php echo $result['id']; ?>">
                                <input type="number" name="qty" id="" value="<?php echo $result['qty']; ?>">
                                <input type="submit" value="Update">
                            </form>
                        </td>
                        <td>$<?php
                                $total = $result['price'] * $result['qty'];
                                echo $total; 
                            ?>
                        </td>
                        <td><a onclick = "return confirm('Are you sure to delete.?')" href="?delCart=<?php echo $result['id']; ?>">X</a></td>
                    </tr>
                    <?php
                        $sum = $sum + $total;
                    ?>
                    <?php } } else{ 
                        header('Location: index.php');
                    }?>
                </tbody>
                <table class="table text_right">
                    <tr>
                        <td>Sub Total : </td>
                        <td>$<?php echo $sum; ?></td>
                    </tr>
                    <tr>
                        <td>VAT : </td>
                        <td>10%</td>
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
            </table>
            <div class="row">
                <div class="col-md-6">
                    <div class="con_shopping text-center">
                        <a href="index.php"><img src="img/shop.png" alt=""></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="check_btn text-center">
                        <a href="payment.php"><img src="img/check.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include 'inc/footer.php'; ?>

