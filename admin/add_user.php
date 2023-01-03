<?php 
    include 'inc/header.php';
    include 'inc/sidemenu.php';
?>

                <div class="col-md-10">
                    <div class="body_part">
                        <h4>Add New User</h4>
                        <form action="" method="POST">
                            <table class="mt-4">
                                <tr>
                                    <td>Name :</td>
                                    <td><input type="text" name="name"></td>
                                </tr>
                                <tr>
                                    <td>Username :</td>
                                    <td><input type="text" name="username"></td>
                                </tr>
                                <tr>
                                    <td>Email :</td>
                                    <td><input type="email" name="email"></td>
                                </tr>
                                <tr>
                                    <td>Password :</td>
                                    <td><input type="password" name="password"></td>
                                </tr>
                                <tr>
                                    <td>Address :</td>
                                    <td><textarea name="address" id="" cols="30" rows="4"></textarea></td>
                                </tr>
                                <tr>
                                    <td>User Role :</td>
                                    <td>
                                        <select name="role" id="">
                                            <option value="1">Admin</option>
                                            <option value="2">Author</option>
                                            <option value="3">Editor</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="update" value="Create User"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
                <?php include 'inc/footer.php'; ?>