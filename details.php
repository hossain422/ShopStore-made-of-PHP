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

    if(!isset($_GET['dls']) OR $_GET['dls'] == NULL){
        header('Location: index.php');
    }
    else{
        $id = $_GET['dls'];
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $qty = $_POST['qty'];

        $add_cart = $cart->addCart($qty, $id);
    }

?>

        <div class="row mt-4 pb-4">
            <div class="col-md-8">
                <?php
                    $product = $pd->productDls($id);
                    if($product){
                        while($result = $product->fetch_assoc()){
                ?>
                
                <?php
                    if(isset($add_cart)){
                        echo '<hr>';
                        echo '<span class="border bg-light p-2"> has been added to Cart Please!! </span> <a class="view_cart mx-4 btn btn-primary" href="cart.php">'.$add_cart.'</a>';
                        echo '<hr>';
                    }
                ?>
               
                <div class="row mb-3">
                    <div class="col-5">
                        <div class="details_img">
                            <img width="300px" height="300px" src="admin/<?php echo $result['image'];?>" alt="">
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="details_info">
                            <h4><?php echo $result['title'];?></h4>
                            <span>Price : <span>$<?php echo $result['price'];?></span></span>
                            <br>
                            <span>Category : <span><?php echo $result['name'];?></span></span>
                            <br>
                            <span>Brand : <span><?php echo $result['brand'];?></span></span>
                            <br>
                            <form class="d-inline-flex mb-3" action="" method="POST">
                                <input type="number" name="qty" id="" value="1">
                                <input type="submit" value="Buy Now">
                            </form>
                            
                            <!------<a style=" background-image: linear-gradient( #602d8d, #772fb6 ); display: block; margin-top:10px; color:#fff; padding:5px; padding-right:px; padding-left:px;  border-radius: 3px; text-decoration: none; width: 100px; text-align:center;
" href="">Buy Now</a>-------->
                        </div>
                    </div>
                </div>
                <div class="details_des">
                    <h5>Description</h5>
                    <p><?php echo $result['content'];?></p>
                </div>
                <?php } } else{ echo '<h4 class="text-danger mt-5 mb-5">Data Not Found !!</h4>'; }?>
                <div class="related_post">
                    <h5 class="related_title">Related Post</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
                                <div class="single">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="details.php"><img src="img/pic4.png" alt=""></a>
                                        </div>
                                        <div class="col-8">
                                            <div class="title"><h5>IPhone</h5></div>
                                            <p>Lorem ipsum dolor sit amet consectetur elit</p>
                                            <a href="details.php" class="add_cart">Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box">
                                <div class="single">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="details.html"><img src="img/pic3.png" alt=""></a>
                                        </div>
                                        <div class="col-8">
                                            <div class="title"><h5>IPhone</h5></div>
                                            <p>Lorem ipsum dolor sit amet consectetur elit</p>
                                            <a href="details.html" class="add_cart">Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
                                <div class="single">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="details.html"><img src="img/pic2.jpg" alt=""></a>
                                        </div>
                                        <div class="col-8">
                                            <div class="title"><h5>IPhone</h5></div>
                                            <p>Lorem ipsum dolor sit amet consectetur elit</p>
                                            <a href="details.html" class="add_cart">Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box">
                                <div class="single">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="details.php"><img src="img/pic1.png" alt=""></a>
                                        </div>
                                        <div class="col-8">
                                            <div class="title"><h5>IPhone</h5></div>
                                            <p>Lorem ipsum dolor sit amet consectetur elit</p>
                                            <a href="details.php" class="add_cart">Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="side_category">
                    <h6>Category</h6>
                    <ul>
                        <?php
                            $category = $cat->details();
                            if($category){
                                while($result = $category->fetch_assoc()){
                        ?>
                        <li><a href="category.php?cat=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></li>
                        
                        <?php } }?>
                    </ul>
                </div>
            </div>
        </div>

    </div>


    <?php include 'inc/footer.php'; ?>

