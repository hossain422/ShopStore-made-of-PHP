<?php include 'inc/header.php'; ?>
<?php 
    include_once 'class/Product.php';
    include_once 'class/Font_Category.php';
    include_once 'class/Font_Brand.php';
    include_once 'class/Cart.php';
    $pd = new Product();
    $cat = new Category();
    $brand = new Brand();
    $cart = new Cart();

    if(!isset($_GET['cat']) OR $_GET['cat'] == NULL){
        header('Location: index.php');
    }
    else{
        $id = $_GET['cat'];
    }
?>

        <div class="title mt-3">
            <h2>Category Name is </h2>
        </div>
        <div class="row">
            <?php
                $category = $pd->byCategory($id);
                if($category){
                    while($result = $category->fetch_assoc()){
            ?>
            <div class="col-md-3">
            <div class="single_product">
                    <a href="details.php?dls=<?php echo $result['id'] ?>"><img width="200px" height="180px" src="admin/<?php echo $result['image']; ?>" alt=""></a>
                    <a href="details.php?dls=<?php echo $result['id'] ?>"><h5 style="color: #602D8D;"><?php echo $result['title']; ?></h5></a>
                    <p><span>$290</span>/ $<?php echo $result['price']; ?></p>
                    <a href="details.php?dls=<?php echo $result['id'] ?>"><button class="add_cart">Details</button></a>
                </div>
            </div>
            <?php } } else{
                echo '<h5 class="text-danger text-center mt-5 mb-5">Sorry! Product Not available this Category.</h5>';
             }?>
        </div>
        
    </div>

    <?php include 'inc/footer.php'; ?>

