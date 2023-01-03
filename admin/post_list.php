<?php 
    include 'inc/header.php';
    include 'inc/sidemenu.php';

    include '../class/Product_back.php';
    $format = new Format();
    $pd = new Product();
    if(isset($_GET['delproduct'])){
        $delproduct = $_GET['delproduct'];
        $del_product = $pd->delProduct($delproduct);
    } 
?>

                <div class="col-md-10">
                    <div class="body_part">
                        <h4>Post List</h4>
                        <?php 
                            if(isset($del_product)){
                                echo $del_product;
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
                                    <th>Serial</th>
                                    <th>Post Title</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Price</th>    
                                    <th>Type</th>                                
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php              
                                    $product = $pd->productList($pd);     
                                    if($product){
                                        $i=1;
                                        while($result = $product->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><?php echo $i++?></td>
                                    <td><a style="text-decoration: none; color:#000; font-weight: 700;" href="edit_product.php?editpd=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></td>
                                    <td><?php echo $result['name']; ?></td>
                                    <td><?php echo $result['brand']; ?></td>
                                    <td>$<?php echo $result['price']; ?></td>
                                    <td>
                                            <?php
                                                if($result['type'] == 1){
                                                    echo 'General';
                                                }
                                                elseif($result['type'] == 2){
                                                    echo 'Fetured';
                                                }
                                            ?>
                                    </td>
                                    <td><img width="50px" height="40px" src="<?php echo $result['image']; ?>" alt=""></td>
                                    <td><a href="view_product.php?viewpd=<?php echo $result['id']; ?>">View </a> ||<a href="edit_product.php?editpd=<?php echo $result['id']; ?>"> Edit </a> || <a onclick = "return confirm('Are you sure to delete.?')" href="?delproduct=<?php echo $result['id']; ?>">Delete</a></td>
                                </tr>
                                <?php } }?>
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php include 'inc/footer.php'; ?>