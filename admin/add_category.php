<?php 
    include 'inc/header.php';
    include 'inc/sidemenu.php';

    include '../class/Category.php';
    $cat = new Category();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];

        $add_category = $cat->addCategory($name);
    }
?>

                <div class="col-md-10">
                    <div class="body_part">
                        <h4>Add New Category</h4>
                        <form action="" method="POST">
                            <table class="mt-4">
                                <?php 
                                    if(isset($add_category)){
                                        echo $add_category;
                                    }
                                ?>
                                <tr>
                                    <td>Add New :</td>
                                    <td><input type="text" name="name"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="update" value="Update"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
                
                <?php include 'inc/footer.php';?>