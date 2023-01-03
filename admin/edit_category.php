<?php 
    include 'inc/header.php';
    include 'inc/sidemenu.php';
    include '../class/Category.php';

?>
<?php
    if(!isset($_GET['edit_cat']) OR $_GET['edit_cat'] == NULL){
        header('Location: category_list.php');
    }
    else{
        $id = $_GET['edit_cat'];
    }

    $cat = new Category();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];

        $update_category = $cat->updateCategory($name, $id);
    }
?>
                <div class="col-md-10">
                    <div class="body_part">
                        <h4>Uptade Category</h4>
                        <form action="" method="POST">
                            <table class="mt-4">
                            
                                <?php              
                                    $category = $cat->CategoryShow($id);
                                    if($category){
                                        while($result = $category->fetch_assoc()){

                                ?>
                                <?php 
                                    if(isset($update_category)){
                                        echo $update_category;
                                    }
                                ?>
                                <tr>
                                    <td>Add New :</td>
                                    <td><input type="text" name="name" value="<?php echo $result['name'] ?>"></td>
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