<?php 
    include 'inc/header.php';
    include 'inc/sidemenu.php';
    include '../class/Brand.php';

?>
<?php
    if(!isset($_GET['edit_brand']) OR $_GET['edit_brand'] == NULL){
        header('Location: brand_list.php');
    }
    else{
        $id = $_GET['edit_brand'];
    }

    $brand = new Brand();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['brand'];

        $update_brand = $brand->updateBrand($name, $id);
    }
?>
                <div class="col-md-10">
                    <div class="body_part">
                        <h4>Uptade Brand</h4>
                        <form action="" method="POST">
                            <table class="mt-4">
                            
                                <?php              
                                    $brand = $brand->brandShow($id);
                                    if($brand){
                                        while($result = $brand->fetch_assoc()){

                                ?>
                                <?php 
                                    if(isset($update_brand)){
                                        echo $update_brand;
                                    }
                                ?>
                                <tr>
                                    <td>Add New :</td>
                                    <td><input type="text" name="brand" value="<?php echo $result['brand'] ?>"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="update" value="Update"></td>
                                </tr>
                                <?php } }?>
                            </table>
                        </form>
                    </div>
                </div>
                
                <?php include 'inc/footer.php';?>