<?php 
    include 'inc/header.php';
    include 'inc/sidemenu.php';
?>

                <div class="col-md-10">
                    <div class="body_part">
                        <h4>Update Social Media Link</h4>
                        <form action="" method="POST">
                            <table class="mt-4">
                                <tr>
                                    <td>Facebook :</td>
                                    <td><input type="text" name="facebook"></td>
                                </tr>
                                <tr>
                                    <td>Twitter :</td>
                                    <td><input type="text" name="twitter"></td>
                                </tr>
                                <tr>
                                    <td>linkedIn :</td>
                                    <td><input type="text" name="linkedin"></td>
                                </tr>
                                <tr>
                                    <td>Google Plus :</td>
                                    <td><input type="text" name="google"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="update" value="Update"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
                <?php include 'inc/footer.php'; ?>