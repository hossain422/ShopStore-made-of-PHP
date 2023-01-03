<?php 
    include 'inc/header.php';
    include 'inc/sidemenu.php';

    include '../class/Brand.php';
    $brand = new Brand();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['brand'];

        $add_brand = $brand->addBrand($name);
    }
?>

                <div class="col-md-10">
                    <div class="body_part">
                        <h4>Add New Brand</h4>
                        <form action="" method="POST">
                            <table class="mt-4">
                                <?php 
                                    if(isset($add_brand)){
                                        echo $add_brand;
                                    }
                                ?>
                                <tr>
                                    <td>Add New :</td>
                                    <td><input type="text" name="brand"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="update" value="Update"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
                
                <?php include 'inc/footer.php';?>