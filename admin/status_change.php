<?php 
    include 'inc/header.php';
    include 'inc/sidemenu.php';
    include_once '../help/Format.php';
    include_once '../class/Cart_back.php';
    $format = new Format();
    $cart = new Cart();

    if(!isset($_GET['statusid']) OR $_GET['statusid'] == NULL){
        header('Location: order_list.php');
    }
    else{
        $id = $_GET['statusid'];
    } 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $status = $_POST['status'];

        $update_status = $cart->updateStatus($status, $id);
    }

    
?>

                <div class="col-md-10">
                    <div class="body_part">
                        <h4>Order List</h4>
                        <?php 
                            if(isset($update_status)){
                                echo $update_status;
                            }
                        ?>
                        <div class="search_box">
                            <div class="show d-inline-flex">
                                <p>Show</p>
                                <select name="" id="">
                                    <option value="">10</option>
                                    <option value="">25</option>
                                    <option value="">50</option>
                                    <option value="">75</option>
                                    <option value="">100</option>
                                </select>
                                
                            </div>
                            <div class="search_inbox">
                                <form action="">
                                    <input type="search" name="" id="" placeholder="Search..">
                                    <input type="submit" value="Search">
                                </form>
                            </div>
                        </div>
                        <table class="table inbox_table border table-hover">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Product</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Address</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $order_list = $cart->statusList($id);
                                    if($order_list){
                                        $i = 1;
                                        while($result = $order_list->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><?php echo $i++ ;?></td>
                                    <td><?php echo $result['pdname'] ?></td>
                                    <td><img style="width: 60px !important; height: 40px;" src="<?php echo $result['image'];?>" alt=""></td>
                                    <td>$<?php 
                                        $price = $result['price'];
                                        $vat = $price * 0.10;
                                        echo $total = $price + $vat; 
                                    ?></td>
                                    <td><?php echo $result['qty'] ?></td>
                                    <td><a href="shop_address.php?cmrid=<?php echo $result['cmid'] ?>">Address</a></td>
                                    <td><?php echo $format->dateFormat($result['date']); ?></td>
                                    <td><?php
                                    if($result['status'] == 1){
                                        echo 'Pending';
                                    }
                                    elseif($result['status'] == 2){
                                        echo 'Completed';
                                    } ?>
                                    <form action="" method="post">
                                        <select name="status" id="">
                                            <option value="">Select Status</option>
                                            <option value="1">Pending</option>
                                            <option value="2">Completed</option>
                                        </select>
                                        <a href="status_change.php?statusid=<?php echo $result['id']; ?>"><input type="submit" value="Update"></a>
                                    </form>
                                    </td>
                                </tr>
                                <?php } }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php include 'inc/footer.php'; ?>