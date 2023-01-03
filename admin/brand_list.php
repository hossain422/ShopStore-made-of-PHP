<?php 
    include 'inc/header.php';
    include 'inc/sidemenu.php';

    include '../class/Brand.php';
    $brand = new Brand();
    if(isset($_GET['delbrand'])){
        $delbrand = $_GET['delbrand'];
        $del_brand = $brand->delBrand($delbrand);
    }    
?>
                <div class="col-md-10">
                    <div class="body_part">
                        <h4>Brand List</h4>
                        <?php 
                            if(isset($del_brand)){
                                echo $del_brand;
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
                                    <th>Brand Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php              
                                $brand = $brand->brandList($brand);       
                                if($brand){
                                    $i=1;
                                    while($result = $brand->fetch_assoc()){

                            ?>
                                <tr>
                                    <td><?php echo $i++;?></td>
                                    <td><?php echo $result['brand'] ?></td>
                                    <td><a href="edit_brand.php?edit_brand=<?php echo $result['id']; ?>">Edit</a> || <a onclick = "return confirm('Are you sure to delete Category..?')" href="?delbrand=<?php echo $result['id']; ?>">Delete</a></td>
                                </tr>
                                <?php } }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php include 'inc/footer.php'; ?>