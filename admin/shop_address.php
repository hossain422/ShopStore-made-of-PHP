<?php 
    include 'inc/header.php';
    include 'inc/sidemenu.php';

    include_once '../help/Format.php';
    include_once '../class/Cart_back.php';
    include_once '../class/Register_back.php';
    $format = new Format();
    $cart = new Cart();
    $rg = new Register();

    if(!isset($_GET['cmrid']) OR $_GET['cmrid'] == NULL){
        header('Location: order_list.php');
    }
    else{
        $id = $_GET['cmrid'];
    }



?>
                <div class="col-md-10">
                    <div class="body_part">
                        <h4>View Shipping Address</h4>
                        <?php              
                            $address = $rg->shipAddress($id);
                            if($address){
                                while($value = $address->fetch_assoc()){
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <table class="table border mt-4">
                                <tr>
                                    <td width="8%">Name</td>
                                    <td width="3%">:</td>
                                    <td><?php echo $value['name']; ?></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>:</td>
                                    <td><?php echo $value['phone']; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?php echo $value['email']; ?></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>:</td>
                                    <td><?php echo $value['address']; ?></td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td>:</td>
                                    <td><?php echo $value['city']; ?></td>
                                </tr>
                                <tr>
                                    <td>Zip Code</td>
                                    <td>:</td>
                                    <td><?php echo $value['zip']; ?></td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td>:</td>
                                    <td><?php echo $value['country']; ?></td>
                                </tr>
                               
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a class="btn btn-success" href="order_list.php">Go Back</a>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <?php } }?>
                    </div>
                </div>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
<?php include 'inc/footer.php';?>