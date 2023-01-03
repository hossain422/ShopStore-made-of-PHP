<?php 
    include 'inc/header.php';
    include 'inc/sidemenu.php';
?>
                <div class="col-md-10">
                    <div class="body_part">
                        <h4>Change Password</h4>
                        <form action="" method="POST">
                            <table class="mt-4">
                                <tr>
                                    <td>Old Password :</td>
                                    <td><input type="text" name="oldpassword"></td>
                                </tr>
                                <tr>
                                    <td>New Password :</td>
                                    <td><input type="text" name="password"></td>
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