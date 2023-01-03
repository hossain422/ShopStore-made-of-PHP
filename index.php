<?php include 'inc/header.php'; ?>
<?php
    include_once 'class/Product.php';
    $pd = new Product();

?>

        <div class="slider_aria mt-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
                                <div class="single">
                                    <?php
                                        $oppo = $pd->oppo(); 
                                        if($oppo){
                                            while($result = $oppo->fetch_assoc()){
                                    ?>
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="details.php?dls=<?php echo $result['id'] ?>"><img src="admin/<?php echo $result['image'] ?>" alt=""></a>
                                        </div>
                                        <div class="col-8">
                                            <div class="title"><h5>Oppo</h5></div>
                                            <p><?php echo $format->shortText($result['content'], 40 ); ?></p>
                                            <a href="details.php?dls=<?php echo $result['id'] ?>" class="add_cart">Add To Cart</a>
                                        </div>
                                    </div>
                                    <?php } }?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box">
                                <div class="single">
                                    <?php
                                        $realmi = $pd->realmi(); 
                                        if($realmi){
                                            while($result = $realmi->fetch_assoc()){
                                    ?>
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="details.php?dls=<?php echo $result['id'] ?>"><img src="admin/<?php echo $result['image'] ?>" alt=""></a>
                                        </div>
                                        <div class="col-8">
                                            <div class="title"><h5>Realmi</h5></div>
                                            <p><?php echo $format->shortText($result['content'], 40 ); ?></p>
                                            <a href="details.php?dls=<?php echo $result['id'] ?>" class="add_cart">Add To Cart</a>
                                        </div>
                                    </div>
                                    <?php } }?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
                                <div class="single">
                                    <?php
                                        $dell = $pd->dell(); 
                                        if($dell){
                                            while($result = $dell->fetch_assoc()){
                                    ?>
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="details.php?dls=<?php echo $result['id'] ?>"><img height="80px" src="admin/<?php echo $result['image'] ?>" alt=""></a>
                                        </div>
                                        <div class="col-8">
                                            <div class="title"><h5>Dell</h5></div>
                                            <p><?php echo $format->shortText($result['content'], 40 ); ?></p>
                                            <a href="details.php?dls=<?php echo $result['id'] ?>" class="add_cart">Add To Cart</a>
                                        </div>
                                    </div>
                                    <?php } }?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box">
                                <div class="single">
                                    <?php
                                        $hp = $pd->hp(); 
                                        if($hp){
                                            while($result = $hp->fetch_assoc()){
                                    ?>
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="details.php?dls=<?php echo $result['id'] ?>"><img height="90px" src="admin/<?php echo $result['image'] ?>" alt=""></a>
                                        </div>
                                        <div class="col-8">
                                            <div class="title"><h5>HP</h5></div>
                                            <p><?php echo $format->shortText($result['content'], 38 ); ?></p>
                                            <a href="details.php?dls=<?php echo $result['id'] ?>" class="add_cart">Add To Cart</a>
                                        </div>
                                    </div>
                                    <?php } }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        </div>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="img/1.jpg" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="img/2.jpg" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="img/3.jpg" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="img/4.jpg" class="d-block w-100" alt="...">
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                </div>
            </div>
        </div>
        <div class="title">
            <h2>Feature Product</h2>
        </div>
        <div class="row">
            <?php
                $product = $pd->productFeture($pd); 
                if($product){
                    while($result = $product->fetch_assoc()){
            ?>
            <div class="col-md-3 mb-3">
                <div class="single_product">
                    <a href="details.php?dls=<?php echo $result['id'] ?>"><img width="200px" height="180px" src="admin/<?php echo $result['image']; ?>" alt=""></a>
                    <a href="details.php?dls=<?php echo $result['id'] ?>"><h5 style="color: #602D8D;"><?php echo $result['title']; ?></h5></a>
                    <p><span>$290</span>/ $<?php echo $result['price']; ?></p>
                    <a href="details.php?dls=<?php echo $result['id'] ?>"><button class="add_cart">Details</button></a>
                </div>
            </div>
            <?php } }?>
            
        </div>
        <div class="title mt-3">
            <h2>New Product</h2>
        </div>
        <div class="row mb-3">
            <?php
                $product = $pd->productGeneral($pd); 
                if($product){
                    while($result = $product->fetch_assoc()){
            ?>
            <div class="col-md-3 mb-3">
                <div class="single_product">
                    <a href="details.php?dls=<?php echo $result['id'] ?>"><img width="200px" height="180px" src="admin/<?php echo $result['image']; ?>" alt=""></a>
                    <a href="details.php?dls=<?php echo $result['id'] ?>"><h5 style="color: #602D8D;"><?php echo $result['title']; ?></h5></a>
                    <p><span>$290</span>/ $<?php echo $result['price']; ?></p>
                    <a href="details.php?dls=<?php echo $result['id'] ?>"><button class="add_cart">Details</button></a>
                </div>
            </div>
            <?php } }?>
            
        </div>
        
    </div>
    
    <?php include 'inc/footer.php'?>