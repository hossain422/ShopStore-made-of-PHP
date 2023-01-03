<?php 
    include 'inc/header.php';
    include 'inc/sidemenu.php';
    include '../class/Category.php';
    include '../class/Brand.php';
    include '../class/Product_back.php';

    $cat = new Category();
    $brand = new Brand();
    $pd = new Product();

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $add_product = $pd->addProduct($_POST, $_FILES);
    }

?>
                <div class="col-md-10">
                    <div class="body_part add_edit">
                        <h4>Add New Product</h4>
                        <?php 
                            if(isset($add_product)){
                                echo $add_product;
                            }
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <table class="mt-4">
                                <tr>
                                    <td>Title :</td>
                                    <td><input type="text" name="title"></td>
                                </tr>
                                <tr>
                                    <td>Category :</td>
                                    <td><select name="category" id="">
                                        <option value="">Select Category</option>
                                        <?php              
                                            $category = $cat->categoryList($cat);       
                                            if($category){
                                                while($result = $category->fetch_assoc()){

                                        ?>
                                        <option value="<?php echo $result['id'] ?>"><?php echo $result['name'] ?></option>
                                        <?php } }?>
                                    </select></td>
                                </tr>
                                <tr>
                                    <td>Brand :</td>
                                    <td><select name="brand" id="">
                                        <option value="">Select Brand</option>
                                        <?php              
                                            $brand = $brand->brandList($brand);       
                                            if($brand){
                                                $i=1;
                                                while($result = $brand->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $result['id'] ?>"><?php echo $result['brand'] ?></option>
                                        <?php } }?>
                                    </select></td>
                                </tr>
                                <tr>
                                    <td>Discripion :</td>
                                    <td><textarea name="content" id="" cols="30" rows="6"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Price :</td>
                                    <td><input type="text" name="price"></td>
                                </tr>
                                <tr>
                                    <td>Type :</td>
                                    <td><select name="type" id="">
                                        <option value="">Select Type</option>
                                        <option value="1">General</option>
                                        <option value="2">Fetured</option>
                                    </select></td>
                                </tr>
                                <tr>
                                    <td>Upload Image :</td>
                                    <td><input type="file" name="image"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="submit" value="Update"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
<?php include 'inc/footer.php';?>