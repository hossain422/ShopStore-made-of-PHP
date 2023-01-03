<?php 
    include 'inc/header.php';
    include 'inc/sidemenu.php';

    include '../class/Category.php';
    $cat = new Category();
    if(isset($_GET['delcategory'])){
        $delcategory = $_GET['delcategory'];
        $del_category = $cat->delCategory($delcategory);
    }    
?>
                <div class="col-md-10">
                    <div class="body_part">
                        <h4>Category List</h4>
                        <?php 
                            if(isset($del_category)){
                                echo $del_category;
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
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php              
                                $category = $cat->categoryList($cat);       
                                if($category){
                                    $i=1;
                                    while($result = $category->fetch_assoc()){
                            ?>
                                <tr>
                                    <td><?php echo $i++;?></td>
                                    <td><?php echo $result['name'] ?></td>
                                    <td><a href="edit_category.php?edit_cat=<?php echo $result['id']; ?>">Edit</a> || <a onclick = "return confirm('Are you sure to delete Category..?')" href="?delcategory=<?php echo $result['id']; ?>">Delete</a></td>
                                </tr>
                                <?php } }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php include 'inc/footer.php'; ?>