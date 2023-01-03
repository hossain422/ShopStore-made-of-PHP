<?php 
    include 'inc/header.php';
    include 'inc/sidemenu.php';
    include '../class/Category.php';
    include '../class/Brand.php';
    include '../class/Product_back.php';

    $cat = new Category();
    $brand = new Brand();
    $pd = new Product();
    if(!isset($_GET['editpd']) OR $_GET['editpd'] == NULL){
        header('Location: category_list.php');
    }
    else{
        $id = $_GET['editpd'];
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $update_product = $pd->updateProduct($_POST, $_FILES, $id);
    }

?>
                <div class="col-md-10">
                    <div class="body_part">
                        <h4>Update Product</h4>
                        <?php 
                            if(isset($update_product)){
                                echo $update_product;
                            }
                        ?>
                        <?php              
                            $product = $pd->productView($id);
                            if($product){
                                while($value = $product->fetch_assoc()){
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <table class="mt-4">
                                <tr>
                                    <td>Title :</td>
                                    <td><input type="text" value="<?php echo $value['title']; ?>" name="title"></td>
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
                                        <option
                                                <?php
                                                    if($value['category'] == $result['id']){ ?>
                                                        selected = 'selected'
                                                    <?php } ?>
                                        value="<?php echo $result['id'] ?>"><?php echo $result['name'] ?></option>
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
                                        <option 
                                                <?php
                                                    if($value['brand'] == $result['id']){ ?>
                                                        selected = 'selected'
                                                    <?php } ?>
                                        value="<?php echo $result['id'] ?>"><?php echo $result['brand'] ?></option>
                                        <?php } }?>
                                    </select></td>
                                </tr>
                                <tr>
                                    <td>Discripion :</td>
                                    <td><textarea name="content" id="" cols="30" rows="6"><?php echo $value['content']; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>Price :</td>
                                    <td><input type="text" value="<?php echo $value['price'] ?>" name="price"></td>
                                </tr>
                                <tr>
                                    <td>Type :</td>
                                    <td><select name="type" id="">
                                        <option value="<?php echo $value['type'] ?>">
                                            <?php
                                                if($value['type'] == 1){
                                                    echo 'General';
                                                }
                                                elseif($value['type'] == 2){
                                                    echo 'Fetured';
                                                }
                                            ?>
                                        </option>
                                    </select></td>
                                </tr>
                                <tr>
                                    <td>Upload Image :</td>
                                    <td>
                                        <input type="file" name="image">
                                        <img width="60px" height="40" src="<?php echo $value['image'] ?>" alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="submit" value="Update"></td>
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