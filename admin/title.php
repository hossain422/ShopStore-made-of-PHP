<?php 
    include 'inc/header.php';
    include 'inc/sidemenu.php';
?>

                <div class="col-md-10">
                    <div class="body_part">
                        <h4>Update Site Title and Discripion</h4>
                        <form action="" method="POST">
                            <table class="mt-4">
                                <tr>
                                    <td>Title :</td>
                                    <td><input type="text" name="title"></td>
                                </tr>
                                <tr>
                                    <td>Discription :</td>
                                    <td><input type="text" name="discription"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="update" value="Update"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
                <?php include 'inc/footer.php' ?>